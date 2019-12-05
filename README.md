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

git init

git add .

git commit -am "first commit"

git push -u origin master

sudo snap install heroku --classic

heroku --version

heroku login

heroku keys:add

git remote rm heroku

heroku create

heroku run rails db:migrate

heroku pg:reset

heroku logs -t

heroku run rake db:version

heroku restart

git add . && git commit --amend && git push -u heroku master -f && heroku pg:reset && heroku run rails db:migrate && heroku open
