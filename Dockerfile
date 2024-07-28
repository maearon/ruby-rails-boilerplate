FROM ruby:3.3.3

# Install node & yarn
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get update && \
    apt-get install -y \
    libvips-dev \
    nodejs \
    curl && \
    curl -fsSL https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - && \
    echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list && \
    apt-get update && \
    apt-get install -y yarn

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
RUN gem install bundler:2.5.11
RUN bundle config set without 'development test'
RUN bundle install ${BUNDLE_INSTALL_ARGS} \
  && rm -rf /usr/local/bundle/cache/* \
  && find /usr/local/bundle/gems/ -name "*.c" -delete \
  && find /usr/local/bundle/gems/ -name "*.o" -delete
COPY . /app/

# Compile assets
ARG RAILS_ENV=development
RUN if [ "$RAILS_ENV" = "production" ]; then SECRET_KEY_BASE=$(rake secret) bundle exec rake assets:precompile; fi

VOLUME /rails/db

EXPOSE 3000
CMD ["rails", "server", "-b", "0.0.0.0"]
