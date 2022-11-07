FROM ruby:3.1.2

# Install node & yarn
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -
RUN apt-get install -y nodejs
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list
RUN apt-get update && apt-get install -y yarn

# Install base deps or additional (e.g. tesseract)
ARG INSTALL_DEPENDENCIES
RUN apt-get update -qq \
  && apt-get install -y --no-install-recommends ${INSTALL_DEPENDENCIES} \
    build-essential libpq-dev git \
  && apt-get clean autoclean \
  && apt-get autoremove -y \
  && rm -rf \
    /var/lib/apt \
    /var/lib/dpkg \
    /var/lib/cache \
    /var/lib/log

# Install deps with bundler
RUN mkdir /app
WORKDIR /app
COPY Gemfile* /app/
ARG BUNDLE_INSTALL_ARGS
RUN gem install bundler:2.3.25
RUN bundle config set without 'development test'
RUN bundle install ${BUNDLE_INSTALL_ARGS} \
  && rm -rf /usr/local/bundle/cache/* \
  && find /usr/local/bundle/gems/ -name "*.c" -delete \
  && find /usr/local/bundle/gems/ -name "*.o" -delete
COPY . /app/

# Compile assets
ARG RAILS_ENV=development
RUN if [ "$RAILS_ENV" = "production" ]; then SECRET_KEY_BASE=$(rake secret) bundle exec rake assets:precompile; fi
