# Rails REST API + NextJS boilerplate 🇻🇳
## Description

Rails REST API boilerplate for typical project can connect and interact with Posgres default by Prisma

## Table of Contents

- [Features](#features)
- [Quick run](#quick-run)
- [Comfortable development](#comfortable-development)
- [Links](#links)
- [Automatic update of dependencies](#automatic-update-of-dependencies)
- [Database utils](#database-utils)
- [Tests](#tests)

## Features

- [x] Database ([activerecord](https://guides.rubyonrails.org/active_record_basics.html)).
- [x] Seeding.
- [x] Config Service ([rails/config](https://guides.rubyonrails.org/configuring.html)).
- [x] Mailing ([activemail](https://guides.rubyonrails.org/action_mailer_basics.html)).
- [x] Sign in and sign up via email.
- [x] Social sign in (Apple, Facebook, Google, Twitter).
- [x] Admin and User roles.
- [x] I18N ([rails-i18n](https://guides.rubyonrails.org/i18n.html)).
- [x] File uploads. Support local and Amazon S3 drivers.
- [x] Swagger.
- [x] E2E and units tests.
- [x] Docker.
- [x] CI (Github Actions).

## Quick run

```bash
git clone --depth 1 git@github.com:maearon/rails-boilerplate.git my-app
cd my-app/
cp env-example .env
docker compose up -d
```

For check status run

```bash
docker compose logs
```

## Comfortable development

```bash
git clone --depth 1 https://github.com/brocoders/nestjs-boilerplate.git my-app
cd my-app/
cp .env-example .env
cp client/env-example client/.env
```

Change `DATABASE_HOST=postgres` to `DATABASE_HOST=localhost`

Change `MAIL_HOST=maildev` to `MAIL_HOST=localhost`

Run additional container:

```bash
docker compose up -d postgres redis
```

```bash
bundle

rails db:drop

cd client &&
npx prisma generate && 
npx prisma migrate dev (rails db:migrate)

manhpc@manhpc-B660M-D3H-DDR4:~/code/ruby-rails-boilerplate/client$ npx prisma migrate dev
Environment variables loaded from .env
Prisma schema loaded from prisma/schema.prisma
Datasource "db": PostgreSQL database "verceldb", schema "public" at "ep-bold-voice-a4yp8xc9.us-east-1.aws.neon.tech:5432"

Applying migration `20240722050134_ruby_rails_boilerplate_development`

The following migration(s) have been applied:

migrations/
  └─ 20240722050134_ruby_rails_boilerplate_development/
    └─ migration.sql



Your database is now in sync with your schema.

Running generate... (Use --skip-generate to skip the generators)

✔ Generated Prisma Client (v5.17.0) to ./node_modules/@prisma/client in 130ms


manhpc@manhpc-B660M-D3H-DDR4:~/code/ruby-rails-boilerplate/client$ 
 1953  git checkout 6757f51096580846978602258ea87eabee204ef2 -- Dockerfile
 1954  git status
 1955  git checkout 6757f51096580846978602258ea87eabee204ef2 -- docker-compose.yml


rails db:seed (prisma introspect && npx prisma db pull && npx prisma db push)
cd ..
rails s -p 3001
(git checkout 1242dc57c527178d6bffd6980c884ba4478bafd4 -- db/migrate)
(rails status code symbol: https://gist.github.com/mlanett/a31c340b132ddefa9cca)
```

## Links

- Routes: http://localhost:3001/rails/info/routes
- Adminer (client for DB): http://127.0.0.1/pgadmin4/browser/ (npx prisma studio)
- Maildev: http://localhost:3001/letter_opener

## Automatic update of dependencies

If you want to automatically update dependencies, you can connect [Depfu](https://github.com/marketplace/depfu) for your project.

## Database utils

Generate migration

```bash
rails generate migration CreateNameTable 
```

Run migration

```bash
rails db:migrate
```

Revert migration

```bash
rails db:migrate:reset
```

Drop all tables in database

```bash
rails db:drop
```

Run seed

```bash
rails db:seed
```

## Tests

```bash
# unit tests
rails t

# e2e tests
./node_modules/.bin/cypress run
```

## Tests in Docker

```bash
docker compose -f docker-compose.ci.yaml --env-file env-example -p ci up --build --exit-code-from api && docker compose -p ci rm -svf
```

## Test benchmarking

```bash
docker run --rm jordi/ab -n 100 -c 100 -T application/json -H "Authorization: Bearer USER_TOKEN" -v 2 http://<server_ip>:3001/api/v1/users
```
