<p align="center">
  <a href="http://nestjs.com/" target="blank"><img src="https://nestjs.com/img/logo-small.svg" width="200" alt="Nest Logo" /></a>
</p>

[circleci-image]: https://img.shields.io/circleci/build/github/nestjs/nest/master?token=abc123def456
[circleci-url]: https://circleci.com/gh/nestjs/nest

  <p align="center">This template serves as a boiler plate for nestjs application with authentication feature with postgres using typeorm.</p>
    <p align="center">
<a href="https://www.npmjs.com/~nestjscore" target="_blank"><img src="https://img.shields.io/npm/v/@nestjs/core.svg" alt="NPM Version" /></a>
<a href="https://www.npmjs.com/~nestjscore" target="_blank"><img src="https://img.shields.io/npm/l/@nestjs/core.svg" alt="Package License" /></a>
<a href="https://www.npmjs.com/~nestjscore" target="_blank"><img src="https://img.shields.io/npm/dm/@nestjs/common.svg" alt="NPM Downloads" /></a>
<a href="https://circleci.com/gh/nestjs/nest" target="_blank"><img src="https://img.shields.io/circleci/build/github/nestjs/nest/master" alt="CircleCI" /></a>
<a href="https://coveralls.io/github/nestjs/nest?branch=master" target="_blank"><img src="https://coveralls.io/repos/github/nestjs/nest/badge.svg?branch=master#9" alt="Coverage" /></a>
<a href="https://discord.gg/G7Qnnhy" target="_blank"><img src="https://img.shields.io/badge/discord-online-brightgreen.svg" alt="Discord"/></a>
<a href="https://opencollective.com/nest#backer" target="_blank"><img src="https://opencollective.com/nest/backers/badge.svg" alt="Backers on Open Collective" /></a>
<a href="https://opencollective.com/nest#sponsor" target="_blank"><img src="https://opencollective.com/nest/sponsors/badge.svg" alt="Sponsors on Open Collective" /></a>
  <a href="https://paypal.me/kamilmysliwiec" target="_blank"><img src="https://img.shields.io/badge/Donate-PayPal-ff3f59.svg"/></a>
    <a href="https://opencollective.com/nest#sponsor"  target="_blank"><img src="https://img.shields.io/badge/Support%20us-Open%20Collective-41B883.svg" alt="Support us"></a>
  <a href="https://twitter.com/nestframework" target="_blank"><img src="https://img.shields.io/twitter/follow/nestframework.svg?style=social&label=Follow"></a>
</p>
  <!--[![Backers on Open Collective](https://opencollective.com/nest/backers/badge.svg)](https://opencollective.com/nest#backer)
  [![Sponsors on Open Collective](https://opencollective.com/nest/sponsors/badge.svg)](https://opencollective.com/nest#sponsor)-->

## Description
# 
[Nest](https://github.com/nestjs/nest) framework TypeScript starter repository.

## Installation

```bash
$ nvm ls   
$ node -v  
- v21.1.0
$ npm -v
- 10.2.0
$ npm install  
$ npm i -g @nestjs/cli
$ npm audit fix --force
$ npm fund
$ npm install --save @nestjs/typeorm typeorm pg

  "scripts": {
    "prebuild": "rimraf dist",
    "build": "nest build",
    "format": "prettier --write \"src/**/*.ts\" \"test/**/*.ts\"",
    "start": "nest start",
    "start:dev": "nest start --watch",
    "start:debug": "nest start --debug --watch",
    "start:prod": "node dist/src/main",
    "test": "jest",
    "test:watch": "jest --watch",
    "test:cov": "jest --coverage",
    "test:debug": "node --inspect-brk -r tsconfig-paths/register -r ts-node/register node_modules/.bin/jest --runInBand",
    "test:e2e": "jest --config ./test/jest-e2e.json",
    "lint": "eslint ./src -c .eslintrc.json --max-warnings=0",
    "lint:fix": "eslint ./src -c .eslintrc.json --fix",
    "typeorm": "typeorm-ts-node-commonjs -d src/config/db/orm.config.ts",
    "migration:run": "npm run typeorm migration:run",
    "migration:revert": "npm run typeorm migration:revert",
    "migration:generate": "npm run typeorm migration:generate ./migrations/$npm_config_key",
    "migration:create": "typeorm migration:create ./migrations/$npm_config_key",
    "migration:show": "npm run typeorm migration:show",
    "prepare": "husky install",
    "heroku-postbuild": "npm run build --only=dev"
  },
  
- .env
API_URL=http://localhost:3003
HOST=localhost
PORT=3003
SECRET_KEY=Na@0955##
APP_SECRET=Na@0988
DATABASE_HOST=localhost
DATABASE_NAME=nest_cmon
DATABASE_USERNAME=postgres
DATABASE_PASSWORD=root
DATABASE_PORT=5432 
RUN_MIGRATIONS=true
RUN_MIGRATIONS=true
MODE=DEV

{
  "userName": "kongnakornna",
  "email": "kongnakornna@gmail.com",
  "password": "Na@0955",
  "isActive": true,
  "status": "supervisor",
  "lastLogin": null
}
```
## Database
```bash
  - postgres
  - Sqllite
  - redis cache
  - InfluxDB
  - MongoDB

``

## Running the app

Before running the npm commands, please make sure you have the Node and npm versions described in package.json

```bash
# development
$ npm run start

# watch mode
$ npm run start:dev

# production mode
$ npm run start:prod
```

- node v v22.12.0
- npm -v  10.9.0
## Dockerfile

```bash
FROM node:22-alpine

WORKDIR /app

COPY package*.json ./

RUN npm install --only=production

COPY . .

RUN npm run build

EXPOSE 3004

CMD ["npm", "run", "start:prod"]

```
## docker-compose.yml
```bash
version: '3'
services:
  nestjs-app:
    build: .
    ports:
      - "3004:3000"
    environment:
      - NODE_ENV=production


```

## Test

```bash
# unit tests
$ npm run test:e2e

# e2e tests
$ npm run test:e2e

# test coverage
$ npm run test:cov
 
$  npm run lint
$  npm run format


```


## Support

Nest is an MIT-licensed open source project. It can grow thanks to the sponsors and support by the amazing backers. If you'd like to join them, please [read more here](https://docs.nestjs.com/support).

## Deployment

This application is also deployed on [vercel](https://nestjs-jwt-auth-postgres-type-jmeslp9d4.vercel.app/api)

## Stay in touch

- Author - [Bilal ur Rehman](https://github.com/BilalurRehman-27)
- LinkedIn - [BilalurRehman](https://www.linkedin.com/in/bilal-ur-rehman/)

## License

Nest is [MIT licensed](LICENSE).

# http://localhost:3003

```bash

UPDATE "public"."user" SET "isActive" = '1',email='kongnakornna@gmail.com' WHERE "id" = 'a114a71f-8dca-4004-b468-59797cb34d53'

{{base_url}}/v1/users/me

npm i @nestjs/mongoose argon2  cache-manager-redis-yet mongoose redis reflect-metadata @nestjs/cache-manager cache-manager -S
npm i cache-manager-redis-store -S    
npm i util axios redis ioredis ioredis-timeout moment -S
npm i --save @nestjs/event-emitter
npm install --save swagger-jsdoc@latest swagger-ui-express@latest

npm install --save  @nestjs-modules/mailer
npm install --save @nestjs-modules/mailer nodemailer
npm install --save-dev @types/nodemailer
npm install --save @nestjs-modules/mailer @nestjs/cache-manager @nestjs/common @nestjs/config @nestjs/core @nestjs/event-emitter @nestjs/jwt @nestjs/mapped-types @nestjs/mongoose @nestjs/passport @nestjs/platform-express @nestjs/swagger @nestjs/typeorm 
npm audit fix
npm i --save @influxdata/influxdb-client
npm i --save @influxdata/influxdb-client-apis
npm install --save @nestjs/common @nestjs/core @nestjs/platform-express @influxdata/influxdb-client


- Node-Red

 
node-red-node-random
node-red-contrib-influxdb
node-red-dashboard
node-red-contrib-mdashboard

 
http://192.168.1.37:1880/ui/
-----------------

EMAIL_HOST=smtp.gmail.com
EMAIL_PORT=587
EMAIL_ID=cmoniots@gmail.com
EMAIL_PASS=cmoniots@0955#

EMAIL_HOST=smtp.office365.com
EMAIL_PORT=587
EMAIL_ID=kongnakornjantakun@outlook.com
EMAIL_PASS=Pumipat@0955

 
export INFLUX_URL=https://cloud2.influxdata.com
export INFLUX_TOKEN=API_TOKEN
export INFLUX_ORG=ORG_ID
export INFLUX_BUCKET=BUCKET_NAME

# https://typeorm.io/


# pm2
pm2 start npm --name cmonapi -- start --port 3004
pm2 list
pm2 start npm run start:dev --name cmonapidev
 
pm2 start "npm run dev" --name "nextjs server"

and whenever I need to check logs i do

pm2 logs "nexjs server"

if i update files sometimes it automatically propagates when i use git but sometimes it does not so you can do

pm2 restart cmonapidev server

or

pm2 stop cmonapidev server

pm2 start cmonapidev server


pm2 logs cmonapidev

pm2 delete cmonapidev


With NPM
$ npm install pm2 -g
With Bun
$ bun install pm2 -g
To list all running applications:

$ pm2 list
Managing apps is straightforward:

$ pm2 stop     <app_name|namespace|id|'all'|json_conf>
$ pm2 restart  <app_name|namespace|id|'all'|json_conf>
$ pm2 delete   <app_name|namespace|id|'all'|json_conf>
To have more details on a specific application:

$ pm2 describe <id|app_name>

To monitor logs, custom metrics, application information:

$ pm2 monit
Starting a Node.js application in cluster mode that will leverage all CPUs available:

$ pm2 start api.js -i <processes>
Zero Downtime Reload

Hot Reload allows to update an application without any downtime:

$ pm2 reload all

More informations about how PM2 make clustering easy

Container Support
With the drop-in replacement command for node, called pm2-runtime, run your Node.js application in a hardened production environment. Using it is seamless:

RUN npm install pm2 -g
CMD [ "pm2-runtime", "npm", "--", "start" ]
Read More about the dedicated integration

Host monitoring speedbar
PM2 allows to monitor your host/server vitals with a monitoring speedbar.

To enable host monitoring:

$ pm2 set pm2:sysmonit true
$ pm2 update
o consult logs just type the command:

$ pm2 logs
Standard, Raw, JSON and formated output are available.

Examples:
nestjs docker   Dockerfile docker-compose  nustjs ไม่ใช่ nextjs

$ pm2 logs APP-NAME       # Display APP-NAME logs
$ pm2 logs --json         # JSON output
$ pm2 logs --format       # Formated output

$ pm2 flush               # Flush all logs
$ pm2 reloadLogs          # Reload all logs
To enable log rotation install the following module

$ pm2 install pm2-logrotate

pm2 start <ชื่อไฟล์ entry point>.js
pm2 start dist/src/main.js
pm2 delete dist/src/main.js
pm2 delete cmonapidev



yarn global add pm2

# Stop services only
docker-compose stop

# Stop and remove containers, networks..
docker-compose down 
docker-compose down --rmi cmonapis-nestjs-app


# Down and remove volumes
docker-compose down --volumes 

# Down and remove images
docker-compose down --rmi <all|local> 

docker compose sqlite nestjs nodejs 22.12 +github

search: nodejs version v22 +NustJS +docker compose+ sqlite3 +gihhub


# AI  ollama run deepseek-r1:7b

``` 