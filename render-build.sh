# exit on error
set -o errexit

bundle install
# bundle exec rails assets:precompile
# bundle exec rails assets:clean
bundle exec rails credentials:edit --environment production
# bundle exec rails db:drop
# bundle exec rails db:create
bundle exec rails db:migrate
bundle exec rails assets:clean
bundle exec rails assets:precompile
# bundle exec rails db:seed

#if you have seeds to run add:
# bundle exec rails db:seed
