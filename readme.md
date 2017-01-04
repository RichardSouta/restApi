PHP app with REST api
=================

This is a simple application using the [Nette](https://nette.org) and REST api.

##Requirements


PHP 5.6 or higher.


##To run locally:
To make a local copy of project, run this command in desired folder.
```
git clone https://github.com/RichardSouta/restApi.git restApi
```
Create database for project, import **user.sql** into it.

Create local config file in **app/config/config.local.neon** and add database connection.
```
database:
    dsn: 'mysql:host=localhost;dbname=dbname'
    user: user
    password: pass
```

##Usage:
This app supports ale 4 CRUD operations via REST Api.
All server responses are in JSON format. It is recommended to use JSON as well for PUT and POST operations with setting proper content-type.
###GET
For **all user data** run:
```
curl -X GET localhost/restapi/www/api/users
```
For a **specific user data** run:
```
curl -X GET localhost/restapi/www/api/users/<id>
```
GET user ID=1 example: 
```
curl -X GET localhost/restapi/www/api/users/1
```
###POST
For **inserting** new user run:
```
curl -X POST <data.json> localhost/restapi/www/api/users/
```
example:
```
curl -X POST -d @sample.json  -H 'Content-Type: application/json' localhost/restapi/www/api/users
```
###DELETE
For **deleting** a specific user run:
```
curl -X DELETE localhost/restapi/www/api/users/<id>
```
example:
```
curl -X DELETE localhost/restapi/www/api/users/15
```
###PUT
For **updating** a specific user run:
```
curl -X PUT <data.json> localhost/restapi/www/api/users/<id>
```
example:
```
curl -X PUT -d @sample.json  -H 'Content-Type: application/json' localhost/restapi/www/api/users/14
```