# Use stable Ruby image
FROM ruby:3.4.2

# Install Node.js and Yarn using corepack
RUN apt-get update && apt-get install -y curl \
    && curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && corepack enable

# Install base dependencies
RUN apt-get install -y \
    libvips-dev \
    build-essential \
    libpq-dev \
    git && \
    apt-get clean autoclean && \
    apt-get autoremove -y && \
    rm -rf /var/lib/apt/lists/*

# Create a non-root user
RUN adduser --disabled-login --gecos "" appuser

# Create app directory and set permissions
RUN mkdir -p /app && chown -R appuser:appuser /app
WORKDIR /app

# Copy Gemfile first to leverage caching
COPY Gemfile Gemfile.lock ./
RUN gem install bundler && bundle install --jobs=4 --retry=3

# Copy remaining app files
COPY . .

# Change ownership to appuser after copying files
RUN chown -R appuser:appuser /app

# Copy entrypoint
COPY ./entrypoint.sh /usr/bin/entrypoint.sh
RUN chmod +x /usr/bin/entrypoint.sh

# Use entrypoint to handle pid cleanup
ENTRYPOINT ["/usr/bin/entrypoint.sh"]

# Precompile assets if production
ARG RAILS_ENV=development
ENV RAILS_ENV=${RAILS_ENV}
RUN if [ "$RAILS_ENV" = "production" ]; then \
      SECRET_KEY_BASE=f2dc6dd1e38c7a0368dcd4c6298cd86af6bd5735cb4e7cf2f0a8dfceeaf47a59eb36906aac1f7003dad1c019c731d0016b58ad5e7c6268b9b4b1fca43a07f7d7 bundle exec rake assets:precompile; \
    fi

# Switch to non-root user
USER appuser

# Expose port
EXPOSE 3000

# Default command
CMD ["rails", "server", "-b", "0.0.0.0"]

# Healthcheck for production
HEALTHCHECK --interval=30s --timeout=10s --start-period=10s --retries=3 \
    CMD curl -f http://localhost:3000/up || exit 1
