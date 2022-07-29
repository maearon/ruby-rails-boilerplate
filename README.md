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
