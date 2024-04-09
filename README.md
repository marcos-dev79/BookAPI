# BOOK API

A simple CRUD API example with Laravel, with Authentication.

## Setup
After cloning the project, run the following commands:
```bash
docker-compose build
docker-compose up -d
docker exec app php artisan migrate
```
After running those commands, you should have a container running the application and another one running mysql database, and a Nginx server.
You can test by running:

http://localhost:8989/

## Register a User

After running the docker-compose, and running the migration, just send a post request to: (you can use postman or insomnia)

http://localhost:8989/api/register

And then, post the following body as the example:

```json
{
    "name": "Marcos",
    "email": "mrphp7@gmail.com",
    "password": "12345678"
}
```

Expect the following response:
```json
{
	"access_token": "1|7WQJL7ud9k67uV82ybgzNOvwwbSO4O0yHIqprpxQ",
	"token_type": "Bearer"
}
```

Once you register, automatically the API logins you in. You will use the access_token to connect to the api and use the CRUD features.

## Login


## Logout


## Create, Update, Delete a Store


## Create, Update, Delete a Book
```json
{
	"name":"Voyage to the center of the Earth",
	"ISBN": 111111111,
	"value": 10.5,
	"store_id": 1
}
```