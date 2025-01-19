# Use Ruby base image
FROM ruby:3.3.6

# Install Node.js and Yarn
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get update && \
    apt-get install -y \
    libvips-dev \
    nodejs \
    curl && \
    curl -fsSL https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - && \
    echo "deb https://dl.yarnpkg.com/debian/ stable main" > /etc/apt/sources.list.d/yarn.list && \
    apt-get update && \
    apt-get install -y yarn && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Install base dependencies or additional packages
ARG INSTALL_DEPENDENCIES
RUN apt-get update -qq && \
    apt-get install -y --no-install-recommends ${INSTALL_DEPENDENCIES} \
    build-essential \
    libpq-dev \
    git && \
    apt-get clean autoclean && \
    apt-get autoremove -y && \
    rm -rf /var/lib/apt/lists/*

# Set up application directory
RUN mkdir -p /app
WORKDIR /app

# Install Bundler and dependencies
COPY Gemfile Gemfile.lock /app/
RUN gem install bundler:2.6.2 && \
    bundle config set without 'development test' && \
    bundle install ${BUNDLE_INSTALL_ARGS:-"--jobs=4 --retry=3"} && \
    rm -rf /usr/local/bundle/cache/* && \
    find /usr/local/bundle/gems/ -name "*.c" -delete && \
    find /usr/local/bundle/gems/ -name "*.o" -delete

# Copy application code
COPY . /app/

# Compile assets for production
ARG RAILS_ENV=development
RUN if [ "$RAILS_ENV" = "production" ]; then \
      SECRET_KEY_BASE=$(rake secret) bundle exec rake assets:precompile; \
    fi

# Define a volume for persistent database storage
VOLUME /rails/db

# Expose the port for Rails
EXPOSE 3000

# Set the default command
CMD ["rails", "server", "-b", "0.0.0.0"]
