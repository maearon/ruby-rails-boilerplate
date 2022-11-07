# RESTful API Rails Server Boilerplate

[![Build Status](https://travis-ci.org/hagopj13/node-express-boilerplate.svg?branch=master)](https://travis-ci.org/hagopj13/node-express-boilerplate)
[![Coverage Status](https://coveralls.io/repos/github/hagopj13/node-express-boilerplate/badge.svg?branch=master)](https://coveralls.io/github/hagopj13/node-express-boilerplate?branch=master)
[![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat-square)](http://makeapullrequest.com)

A boilerplate/starter project for quickly building RESTful APIs using Rails, and Postgres.

By running a single command, you will get a production-ready Node.js app installed and fully configured on your machine. The app comes with many built-in features, such as authentication using JWT, request validation, unit and integration tests, continuous integration, docker support, API documentation, pagination, etc. For more details, check the features list below.

## Quick Start

To create a project, simply run:

```bash
rails new sample_app --database=postgresql --api
```

Or

```bash
rails new <project-name> --database=postgresql --api
```

## Manual Installation

If you would still prefer to do the installation manually, follow these steps:

Clone the repo:

```bash
git clone --depth 1 https://github.com/nickeryno/sample_app.git
cd sample_app
npx rimraf ./.git
```

Install the dependencies:

```bash
https://github.com/Hygieia/Hygieia/issues/3145
docker build -t nickeryno-sample_app .
docker-compose build
docker network create --driver bridge sample_app
docker-compose run --rm web db:create && db:migrate
docker-compose up
```

Set the environment variables:

```bash
docker-compose exec web bash
rails db:create && rails db:migrate && rails db:seed
docker exec -it sample_app.api bash
cp .env.example .env
cp config/master.key.example config/master.key

# open .env and modify the environment variables (if needed)
```

## Information Technology

- Ruby `3.1.2`
- Rails `7.0.4`
- Postgresql `13`

## Table of Contents

- [Features](#features)
- [Commands](#commands)
- [Environment Variables](#environment-variables)
- [Project Structure](#project-structure)
- [API Documentation](#api-documentation)
- [Error Handling](#error-handling)
- [Validation](#validation)
- [Authentication](#authentication)
- [Authorization](#authorization)
- [Logging](#logging)
- [Custom Mongoose Plugins](#custom-mongoose-plugins)
- [Linting](#linting)
- [Contributing](#contributing)

## Features

- **NoSQL database**: [MongoDB](https://www.mongodb.com) object data modeling using [Mongoose](https://mongoosejs.com)
- **Authentication and authorization**: using [passport](http://www.passportjs.org)
- **Validation**: request data validation using [Joi](https://github.com/hapijs/joi)
- **Logging**: using [winston](https://github.com/winstonjs/winston) and [morgan](https://github.com/expressjs/morgan)
- **Testing**: unit and integration tests using [Jest](https://jestjs.io)
- **Error handling**: centralized error handling mechanism
- **API documentation**: with [swagger-jsdoc](https://github.com/Surnet/swagger-jsdoc) and [swagger-ui-express](https://github.com/scottie1984/swagger-ui-express)
- **Process management**: advanced production process management using [PM2](https://pm2.keymetrics.io)
- **Dependency management**: with [Yarn](https://yarnpkg.com)
- **Environment variables**: using [dotenv](https://github.com/motdotla/dotenv) and [cross-env](https://github.com/kentcdodds/cross-env#readme)
- **Security**: set security HTTP headers using [helmet](https://helmetjs.github.io)
- **Santizing**: sanitize request data against xss and query injection
- **CORS**: Cross-Origin Resource-Sharing enabled using [cors](https://github.com/expressjs/cors)
- **Compression**: gzip compression with [compression](https://github.com/expressjs/compression)
- **CI**: continuous integration with [Travis CI](https://travis-ci.org)
- **Docker support**
- **Code coverage**: using [coveralls](https://coveralls.io)
- **Code quality**: with [Codacy](https://www.codacy.com)
- **Git hooks**: with [husky](https://github.com/typicode/husky) and [lint-staged](https://github.com/okonet/lint-staged)
- **Linting**: with [ESLint](https://eslint.org) and [Prettier](https://prettier.io)
- **Editor config**: consistent editor configuration using [EditorConfig](https://editorconfig.org)

## Commands

Running locally:

```bash
yarn dev
```

Running in production:

```bash
yarn start
```

Testing:

```bash
# run all tests
yarn test

# run all tests in watch mode
yarn test:watch

# run test coverage
yarn coverage
```

Docker:

```bash
# run docker container in development mode
yarn docker:dev

# run docker container in production mode
yarn docker:prod

# run all tests in a docker container
yarn docker:test
```

Linting:

```bash
# run Rubocop
gem install rubocop
bundle exec rubocop -a

# fix ESLint errors
yarn lint:fix

# run prettier
yarn prettier

# fix prettier errors
yarn prettier:fix
```

## Environment Variables

The environment variables can be found and modified in the `.env` file. They come with these default values:

```bash
# Port number
PORT=3000

# URL of the Mongo DB
MONGODB_URL=mongodb://127.0.0.1:27017/node-boilerplate

# JWT
# JWT secret key
JWT_SECRET=thisisasamplesecret
# Number of minutes after which an access token expires
JWT_ACCESS_EXPIRATION_MINUTES=30
# Number of days after which a refresh token expires
JWT_REFRESH_EXPIRATION_DAYS=30

# SMTP configuration options for the email service
# For testing, you can use a fake SMTP service like Ethereal: https://ethereal.email/create
SMTP_HOST=email-server
SMTP_PORT=587
SMTP_USERNAME=email-server-username
SMTP_PASSWORD=email-server-password
EMAIL_FROM=support@yourapp.com
```

## Project Structure

```
src\
 |--config\         # Environment variables and configuration related things
 |--controllers\    # Route controllers (controller layer)
 |--docs\           # Swagger files
 |--middlewares\    # Custom express middlewares
 |--models\         # Mongoose models (data layer)
 |--routes\         # Routes
 |--services\       # Business logic (service layer)
 |--utils\          # Utility classes and functions
 |--validations\    # Request data validation schemas
 |--app.js          # Express app
 |--index.js        # App entry point
```

## API Documentation

To view the list of available APIs and their specifications, run the server and go to `http://localhost:3000/rails/info/routes` in your browser. This documentation page is automatically generated using the [swagger](https://swagger.io/) definitions written as comments in the route files.
https://editor.swagger.io/ coppy from swagger.yaml

### API Endpoints

List of available routes:

**Auth routes**:\
`POST /v1/auth/register` - register\
`POST /v1/auth/login` - login\
`POST /v1/auth/logout` - logout\
`POST /v1/auth/refresh-tokens` - refresh auth tokens\
`POST /v1/auth/forgot-password` - send reset password email\
`POST /v1/auth/reset-password` - reset password\
`POST /v1/auth/send-verification-email` - send verification email\
`POST /v1/auth/verify-email` - verify email

**User routes**:\
`POST /v1/users` - create a user\
`GET /v1/users` - get all users\
`GET /v1/users/:userId` - get user\
`PATCH /v1/users/:userId` - update user\
`DELETE /v1/users/:userId` - delete user

## Error Handling

The app has a centralized error handling mechanism.

Controllers should try to catch the errors and forward them to the error handling middleware (by calling `next(error)`). For convenience, you can also wrap the controller inside the catchAsync utility wrapper, which forwards the error.

```javascript
const catchAsync = require('../utils/catchAsync');

const controller = catchAsync(async (req, res) => {
  // this error will be forwarded to the error handling middleware
  throw new Error('Something wrong happened');
});
```

The error handling middleware sends an error response, which has the following format:

```json
{
  "code": 404,
  "message": "Not found"
}
```

When running in development mode, the error response also contains the error stack.

The app has a utility ApiError class to which you can attach a response code and a message, and then throw it from anywhere (catchAsync will catch it).

For example, if you are trying to get a user from the DB who is not found, and you want to send a 404 error, the code should look something like:

```javascript
const httpStatus = require('http-status');
const ApiError = require('../utils/ApiError');
const User = require('../models/User');

const getUser = async (userId) => {
  const user = await User.findById(userId);
  if (!user) {
    throw new ApiError(httpStatus.NOT_FOUND, 'User not found');
  }
};
```

## Validation

Request data is validated using [Joi](https://joi.dev/). Check the [documentation](https://joi.dev/api/) for more details on how to write Joi validation schemas.

The validation schemas are defined in the `src/validations` directory and are used in the routes by providing them as parameters to the `validate` middleware.

```javascript
const express = require('express');
const validate = require('../../middlewares/validate');
const userValidation = require('../../validations/user.validation');
const userController = require('../../controllers/user.controller');

const router = express.Router();

router.post('/users', validate(userValidation.createUser), userController.createUser);
```

## Authentication

To require authentication for certain routes, you can use the `auth` middleware.

```javascript
const express = require('express');
const auth = require('../../middlewares/auth');
const userController = require('../../controllers/user.controller');

const router = express.Router();

router.post('/users', auth(), userController.createUser);
```

These routes require a valid JWT access token in the Authorization request header using the Bearer schema. If the request does not contain a valid access token, an Unauthorized (401) error is thrown.

**Generating Access Tokens**:

An access token can be generated by making a successful call to the register (`POST /v1/auth/register`) or login (`POST /v1/auth/login`) endpoints. The response of these endpoints also contains refresh tokens (explained below).

An access token is valid for 30 minutes. You can modify this expiration time by changing the `JWT_ACCESS_EXPIRATION_MINUTES` environment variable in the .env file.

**Refreshing Access Tokens**:

After the access token expires, a new access token can be generated, by making a call to the refresh token endpoint (`POST /v1/auth/refresh-tokens`) and sending along a valid refresh token in the request body. This call returns a new access token and a new refresh token.

A refresh token is valid for 30 days. You can modify this expiration time by changing the `JWT_REFRESH_EXPIRATION_DAYS` environment variable in the .env file.

## Authorization

The `auth` middleware can also be used to require certain rights/permissions to access a route.

```javascript
const express = require('express');
const auth = require('../../middlewares/auth');
const userController = require('../../controllers/user.controller');

const router = express.Router();

router.post('/users', auth('manageUsers'), userController.createUser);
```

In the example above, an authenticated user can access this route only if that user has the `manageUsers` permission.

The permissions are role-based. You can view the permissions/rights of each role in the `src/config/roles.js` file.

If the user making the request does not have the required permissions to access this route, a Forbidden (403) error is thrown.

## Logging

Import the logger from `src/config/logger.js`. It is using the [Winston](https://github.com/winstonjs/winston) logging library.

Logging should be done according to the following severity levels (ascending order from most important to least important):

```javascript
const logger = require('<path to src>/config/logger');

logger.error('message'); // level 0
logger.warn('message'); // level 1
logger.info('message'); // level 2
logger.http('message'); // level 3
logger.verbose('message'); // level 4
logger.debug('message'); // level 5
```

In development mode, log messages of all severity levels will be printed to the console.

In production mode, only `info`, `warn`, and `error` logs will be printed to the console.\
It is up to the server (or process manager) to actually read them from the console and store them in log files.\
This app uses pm2 in production mode, which is already configured to store the logs in log files.

Note: API request information (request url, response code, timestamp, etc.) are also automatically logged (using [morgan](https://github.com/expressjs/morgan)).

## Custom Mongoose Plugins

The app also contains 2 custom mongoose plugins that you can attach to any mongoose model schema. You can find the plugins in `src/models/plugins`.

```javascript
const mongoose = require('mongoose');
const { toJSON, paginate } = require('./plugins');

const userSchema = mongoose.Schema(
  {
    /* schema definition here */
  },
  { timestamps: true }
);

userSchema.plugin(toJSON);
userSchema.plugin(paginate);

const User = mongoose.model('User', userSchema);
```

### toJSON

The toJSON plugin applies the following changes in the toJSON transform call:

- removes \_\_v, createdAt, updatedAt, and any schema path that has private: true
- replaces \_id with id

### paginate

The paginate plugin adds the `paginate` static method to the mongoose schema.

Adding this plugin to the `User` model schema will allow you to do the following:

```javascript
const queryUsers = async (filter, options) => {
  const users = await User.paginate(filter, options);
  return users;
};
```

The `filter` param is a regular mongo filter.

The `options` param can have the following (optional) fields:

```javascript
const options = {
  sortBy: 'name:desc', // sort order
  limit: 5, // maximum results per page
  page: 2, // page number
};
```

The plugin also supports sorting by multiple criteria (separated by a comma): `sortBy: name:desc,role:asc`

The `paginate` method returns a Promise, which fulfills with an object having the following properties:

```json
{
  "results": [],
  "page": 2,
  "limit": 5,
  "totalPages": 10,
  "totalResults": 48
}
```

## Linting

Linting is done using [ESLint](https://eslint.org/) and [Prettier](https://prettier.io).

In this app, ESLint is configured to follow the [Airbnb JavaScript style guide](https://github.com/airbnb/javascript/tree/master/packages/eslint-config-airbnb-base) with some modifications. It also extends [eslint-config-prettier](https://github.com/prettier/eslint-config-prettier) to turn off all rules that are unnecessary or might conflict with Prettier.

To modify the ESLint configuration, update the `.eslintrc.json` file. To modify the Prettier configuration, update the `.prettierrc.json` file.

To prevent a certain file or directory from being linted, add it to `.eslintignore` and `.prettierignore`.

To maintain a consistent coding style across different IDEs, the project contains `.editorconfig`

## Contributing

Contributions are more than welcome! Please check out the [contributing guide](CONTRIBUTING.md).

## Inspirations

- [danielfsousa/express-rest-es2017-boilerplate](https://github.com/danielfsousa/express-rest-es2017-boilerplate)
- [madhums/node-express-mongoose](https://github.com/madhums/node-express-mongoose)
- [kunalkapadia/express-mongoose-es6-rest-api](https://github.com/kunalkapadia/express-mongoose-es6-rest-api)

## License

[MIT](LICENSE)

node-boilerplate> db.users.find().limit(1)
[
  {
    _id: ObjectId("624a52224f2baf43ba0e2f7c"),
    role: 'user', ----> only can edit by MongoDB Compass to role: 'admin'
    isEmailVerified: true,
    name: 'Example User',
    email: 'example@railstutorial.org',
    password: '$2a$08$FRw.nF76cCtONtbbf2zfdOonuuOXp.O1baAJdWABvGH.8nnqWt0SG',
    createdAt: ISODate("2022-04-04T02:04:18.837Z"),
    updatedAt: ISODate("2022-04-05T06:31:32.527Z"),
    __v: 0
  }
]

mongosh
show databases
use node-boilerplate
db
db.tokens.insertOne()
db.tokens.insertMany()
node-boilerplate> db.tokens
node-boilerplate.tokens
show collections
let name = "shaul"
name
node-boilerplate.tokens.find()
help
exit
cls
https://github.com/iamshaunjp/complete-mongodb
https://www.youtube.com/watch?v=bJSj1a84I20&list=PL4cUxeGkcC9h77dJ-QJlwGlZlTd4ecZOA&index=4
https://www.mongodb.com/docs/manual/tutorial/install-mongodb-on-ubuntu/
https://www.mongodb.com/docs/compass/current/install/

use MongoDB Compass set role to admin and isEmailVerified to true

# https://myaccount.google.com/lesssecureapps
# https://accounts.google.com/DisplayUnlockCaptcha
# https://support.google.com/mail/answer/185833?hl=en

heroku git:clone -a warm-forest-46962
  609  git add .
  610  git commit --amend
  611  sudo heroku container:push web --app sleepy-dawn-64450
  612  sudo heroku container:release web --app sleepy-dawn-64450
  613  sudo $ heroku addons:create heroku-postgresql:hobby-dev --app sleepy-dawn-64450
  614  sudo heroku addons:create heroku-postgresql:hobby-dev --app sleepy-dawn-64450
sudo heroku config:set PORT=3000 REDIS_URL=redis://localhost:6379/1 RAILS_MAX_THREADS=5 DB_HOST=db DB_USERNAME=postgres DB_PASSWORD=password RAILS_ENV=production PIDFILE=tmp/pids/server.pid --app sleepy-dawn-64450
  617  sudo heroku run rails db:migrate --app sleepy-dawn-64450
  618  sudo heroku run rails db:migrate --app sleepy-dawn-64450
  619  sudo heroku run rails db:seed --app sleepy-dawn-64450
  620  sudo heroku logs --tail --app sleepy-dawn-64450
  621  history
https://gist.github.com/masutaka/d05c3908c3bef80788b8ee5b0ef7b3ba
https://qiita.com/fukazawashun/items/412bcac29cabc36da6fa#%EF%BC%94%E3%83%9E%E3%83%8B%E3%83%95%E3%82%A7%E3%82%B9%E3%83%88
https://viblo.asia/p/deploy-mot-ung-dung-rails-don-gian-voi-docker-Eb85o4e4K2G
https://stackoverflow.com/questions/9202324/execjs-could-not-find-a-javascript-runtime-but-execjs-and-therubyracer-are-in
https://semaphoreci.com/community/tutorials/dockerizing-a-ruby-on-rails-application


# README 2022

Rails Tutorial + REST API + GraphQL

sudo apt-get install libmagickwand-dev

This README would normally document whatever steps are necessary to get the
application up and running.

Things you may want to cover:

* Ruby version 3.1.2 Rails 7.0.3

* System dependencies
https://gorails.com/setup/ubuntu/21.04
https://www.digitalocean.com/community/tutorials/how-to-install-mysql-on-ubuntu-18-04
```
sudo mysql
SELECT user,authentication_string,plugin,host FROM mysql.user;
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';
FLUSH PRIVILEGES;
```
THEN ADD PASSWORD is password SETED in config/database.yml: password: password 
https://www.digitalocean.com/community/tutorials/how-to-install-postgresql-on-ubuntu-20-04-quickstart
ERROR Original Error: ImageMagick/GraphicsMagick is not installed
=====>
```
sudo apt-get install libmagickwand-dev
sudo apt-get install imagemagick
rails active_storage:update
bundle exec rake webpacker:install
Add gem 'graphql' to Gemfile
bundle
bundle exec rails generate graphql:install
rails g graphql:object UserType id:ID! name:String! email:String! admin:Boolean! microposts:[Micropost]
```
https://graphql.org/graphql-js/basic-types/
http://localhost:3000/graphiql
[https://www.howtographql.com/graphql-ruby/2-queries/ 
| https://graphql-ruby.org/getting_started
| https://github.com/howtographql/graphql-ruby
| https://github.com/howtographql/graphql-ruby/blob/master/README.md]
```graphql
{
  allUsers {
    id
    name
    email
    admin
    createdAt
    updatedAt
    microposts {
      id
      content
      createdAt
      updatedAt
      postedBy{
        id
        name
        createdAt
        updatedAt
      }
    }
  }
}
```
----> Before Run This Need Run signinUser to get token
```graphql
mutation {
  createUserMicropost(input: {content: "Fourth Post"}) {
    id
    content
    createdAt
    updatedAt
    postedBy {
      id
      name
      createdAt
      updatedAt
    }
  }
}
```
Add app/graphql/mutations/create_user_micropost_test.rb
bundle exec rails test
```graphql
mutation {
  createUser(input: {
    name: "Test User",
    authProvider: {
      credentials: {
        email: "email@example.com",
        password: "123456"
      }
  	}
  }) {
    id
    name
    email
  }
}
```
https://www.howtographql.com/graphql-ruby/4-authentication/
```graphql
mutation {
  signinUser(input: {
    credentials: {
      email: "example@railstutorial.org"
      password: "foobar"
    }
  }) {
    token
    user {
      id
    }
  }
}
```
https://www.howtographql.com/graphql-ruby/5-connecting-nodes/
```graphql
mutation {
  createRelationship(input: {
    followedId: 2
  }) {
    followerId {
      id
      name
      email
      admin
      createdAt
      updatedAt
    }
    followedId {
      id
      name
      email
      admin
      createdAt
      updatedAt
    }
  }
}
```
```
mutation {
  createRelationship(input: {
    followedId: 2
  }) {
    id
  }
}
```
```graphql
mutation {
  deleteRelationship(input: {
    id: 2
  }) {
    followerId {
      id
      name
      email
      admin
      createdAt
      updatedAt
    }
    followedId {
      id
      name
      email
      admin
      createdAt
      updatedAt
    }
  }
}
```
```
mutation {
  deleteRelationship(input: {
    id: 2
  }) {
    id
  }
}
```

* Configuration
rackcors
kaminari
gmail

* Database creation
```
rails db:create
rails db:setup for seed data
rails db:migrate
rails db:migrate:reset for rollback all migrations
rake db:rollback STEP=1 for number migration want reset
```
* Database initialization
```
rails db:seed
```
* How to run the test suite
```
rails t or rails test
rails c or rails console
rails s or rails server
```

* Services (job queues, cache servers, search engines, etc.)

* Deployment instructions
```
sudo snap install --classic heroku
```
or
error: cannot communicate with server: Post http://localhost/v2/snaps/heroku: dial unix /run/snapd.socket: connect: no such file or directory ==>
```
curl https://cli-assets.heroku.com/install.sh | sh
```
add existing heroku remote
```
git remote add heroku https://git.heroku.com/railstutorialapi.git
git push heroku develop:main -f
```
* ...
