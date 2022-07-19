# README

This README would normally document whatever steps are necessary to get the
application up and running.

Things you may want to cover:

* Ruby version

* System dependencies

* Configuration

* Database creation

* Database initialization

* How to run the test suite

* Services (job queues, cache servers, search engines, etc.)

* Deployment instructions

* ...

heroku login
heroku keys:add
heroku apps:create clotheshub
heroku create (create an with a random name)
git add . && git commit -m upgrade && 
git push -u heroku master -f && 
git push heroku api:master (for api branch)
heroku pg:reset && heroku run rails db:migrate && heroku run rails db:seed && heroku open

# switch database rails adapter googling
# rails db:system:change --to=mysql
# unknown attribute 'service_name' for ActiveStorage::Blob.
# rails active_storage:update
# rails db:migrate
