#!/bin/bash

# Set some global variables
BASE_NAME="base"
APP_NAME="myapp"
OP="run"
BASE_IMAGE_NAME="rails_web"
DB_PATH="tmp/db"
PARAMS=""

ECHO="echo -e"

# Define correct usage
usage ()
{
  ${ECHO} " ${cc_blue}Usage:${cc_normal}"
  ${ECHO}
  ${ECHO} " ${0} [options] <operation> [op-params]"
  ${ECHO}
  ${ECHO} " ${cc_blue}<operation> possibilities:${cc_normal}"
  ${ECHO} "  setup                               Initial setup"
  ${ECHO} "  update                              Update gems with new Gemfile"
  ${ECHO} "  up                                  Runs the app. If setup wasn't run first it will do that as well if needed."
  ${ECHO} "                                      Default operation."
  ${ECHO} "  run [op-params]                     Executes a command on the rails container with the given op-params"
  ${ECHO} "  down                                Powers down the app"
  ${ECHO} "  clean                               Remove last app"
  ${ECHO} "  clean-all                           Remove all including base image"
  ${ECHO}
  ${ECHO} " ${cc_blue}Options:${cc_normal}"
  ${ECHO} "  --app-name <your_app_name>          Defines the name of the app, container and directory for the app"
  ${ECHO} "                                      Defaults to 'myapp'"
  ${ECHO} "  --help                              This usage information"
  ${ECHO}
  ${ECHO} " e.g. ${0} --app-name awesome-app setup"
  ${ECHO}
  exit 1
}

# Check the parameters
while [ $# -gt 0 ]; do
  case "${1}" in
    --app-name)
      if [ -n "${2}" ]; then
        APP_NAME=${2}
        shift
      else
        usage
      fi
      ;;
    setup)
      OP="setup"
      shift
      ;;
    update)
      OP="update"
      shift
      ;;
    up)
      OP="up"
      shift
      ;;
    down)
      OP="down"
      shift
      ;;
    clean)
      OP="clean"
      shift
      ;;
    clean-all)
      OP="clean-all"
      shift
      ;;
    run)
      OP="run"
      shift
      while [ $# -gt 0 ]; do
        PARAMS="${PARAMS} ${1}"
        shift
      done
      break 2
      ;;
    --help)
      usage
      exit 0
      ;;
    *)
      usage
      ;;
  esac
  shift
done

if [ -z "${OP}" ]; then
    ${ECHO} " ${cc_red}No valid operation given!${cc_normal}"
    usage
    exit 0
fi

if [ -z "${APP_NAME}" ]; then
    ${ECHO} " ${cc_red}No valid app-name given! Please just leave the option off to use the default name 'myapp'. ${cc_normal}"
    usage
    exit 0
fi

test_base_image ()
{
    ${ECHO} "Testing for base image \"${BASE_IMAGE_NAME}\""
    TEST=`docker image ls | grep ${BASE_IMAGE_NAME}`
    if [ -n "${TEST}" ]; then
      ${ECHO} "Found"
      return 1
    fi
    ${ECHO} "None found"
    return 0
}

test_app_exists ()
{
    ${ECHO} "Testing \"${APP_NAME}\" existence"
    APP_EXISTS=`ls | grep ${APP_NAME}`
    if [ -n "$APP_EXISTS" ]; then
      ${ECHO} "Found"
      return 1
    fi
    ${ECHO} "None found"
    return 0
}

test_db_exists ()
{
    ${ECHO} "Testing \"${APP_NAME}\" DB existence"
    DBP_EXISTS=`sudo ls ${APP_NAME}/${DB_PATH}/pg_hba.conf`
    if [ $? == 0 ]; then
      ${ECHO} "Found"
      return 1
    fi
    ${ECHO} "None found"
    return 0
}

run_setup ()
{
    ${ECHO} "Setting up..."
    test_base_image
    if [ $? == 0 ]; then
      ${ECHO} "Base image \"${BASE_IMAGE_NAME}\" doesn't exist. Running setup."
      BASE_PATH=${PWD} APP_NAME=${APP_NAME} docker-compose build
    else
      ${ECHO} "Base image \"${BASE_IMAGE_NAME}\" exists."
    fi
    test_app_exists
    if [ $? == 0 ]; then
      ${ECHO} "Creating \"${APP_NAME}\" directory."
      mkdir ${APP_NAME}
      cp Gemfile* ${APP_NAME}/
      chmod a+w ${APP_NAME}/Gemfile.lock
      BASE_PATH=${PWD} APP_NAME=${APP_NAME} docker-compose run --rm --no-deps web rails new . --force --database=postgresql
      if [ $? == 0 ]; then
        ${ECHO} "Need to ensure all files of newly created app \"${APP_NAME}\" are owned by user \"${USER}\""
        sudo chown -R $USER:$USER ${APP_NAME}
        cp database.yml ${APP_NAME}/config/database.yml
        sed -i 's@APP_NAME@'"${APP_NAME}"'@g' ${APP_NAME}/config/database.yml
        test_db_exists
        if [ $? == 0 ]; then
          ${ECHO} "Need to ensure database for \"${APP_NAME}\" exists and are owned by \"postgres\""
          mkdir -p ${APP_NAME}/${DB_PATH}
          sudo chown -R postgres:postgres ${APP_NAME}/${DB_PATH}
        fi
        ${ECHO} "Fixing view files monitoring"
        sed -i 's/EventedFileUpdateChecker/FileUpdateChecker/g' ${APP_NAME}/config/environments/development.rb
      fi
    else
      ${ECHO} "${APP_NAME} directory exists."
    fi

    ${ECHO} "Setup done"
    ${ECHO}
}

run_update ()
{
  ${ECHO} "Updating..."
  test_base_image
  if [ $? == 0 ]; then
    ${ECHO} "Base image \"${BASE_IMAGE_NAME}\" doesn't exist. Run setup instead."
    exit 0
  else
    ${ECHO} "Base image \"${BASE_IMAGE_NAME}\" exists."
    test_app_exists
    if [ $? == 0 ]; then
      ${ECHO} "${APP_NAME} directory doesn't exist. Run setup instead."
      exit 0
    else
      ${ECHO} "${APP_NAME} directory exists."
      docker container prune -f
      docker image rm ${BASE_IMAGE_NAME}:latest
      cp ${APP_NAME}/Gemfile ./
      cp ${APP_NAME}/Gemfile.lock ./
      BASE_PATH=${PWD} APP_NAME=${APP_NAME} docker-compose up --force-recreate  --no-start
    fi
  fi
  ${ECHO} "Update done"
  ${ECHO}
}

run_app ()
{
    ${ECHO} "Running App \"${APP_NAME}\""
    BASE_PATH=${PWD} APP_NAME=${APP_NAME} docker-compose up
    ${ECHO} "\"${APP_NAME}\" done"
    ${ECHO}
}

run_down ()
{
    ${ECHO} "Downing App \"${APP_NAME}\""
    BASE_PATH=${PWD} APP_NAME=${APP_NAME} docker-compose down
    ${ECHO} "\"${APP_NAME}\" done"
    ${ECHO}
}

run_exec ()
{
    ${ECHO} "Executing the rails container with \"${PARAMS}\""
    test_app_exists
    if [ $? == 1 ]; then
      # BASE_PATH=${PWD} APP_NAME=${APP_NAME} docker-compose run --rm --service-ports web ${PARAMS}
      BASE_PATH=${PWD} APP_NAME=${APP_NAME} docker-compose run --rm web ${PARAMS}
    fi

    ${ECHO} "Execution done"
    ${ECHO}
}

run_clean ()
{
    ${ECHO} "Cleaning \"${APP_NAME}\" "
    test_app_exists
    if [ $? == 1 ]; then
      sudo rm -rf ${APP_NAME}
    fi
    ${ECHO} "Cleaning done"
    ${ECHO}
}

run_clean_all ()
{
    run_clean
    ${ECHO} "Cleaning all "
    test_base_image
    if [ $? == 1 ]; then
      docker image rm ${BASE_IMAGE_NAME}
    fi
    ${ECHO} "Cleaning all done"
    ${ECHO}
}

fix_unix_style ()
{
    FILES_TO_CHECK="Gemfile* entrypoint.sh Dockerfile *.yml"
    NOT_UNIX=`file ${FILES_TO_CHECK} | grep CRLF`
    if [ -n "${NOT_UNIX}" ]; then
      ${ECHO} "Making sure all files have proper Linux line endings"
      dos2unix ${FILES_TO_CHECK}
      ${ECHO} "Done"
    fi
}

fix_unix_style

case "${OP}" in
    setup)
        run_setup
    ;;
    update)
        run_update
    ;;
    up)
        run_setup
        run_app
    ;;
    run)
        run_exec
    ;;
    down)
        run_down
    ;;
    clean)
        run_clean
    ;;
    clean-all)
        run_clean_all
    ;;
esac