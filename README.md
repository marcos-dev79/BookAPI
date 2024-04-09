# BOOK API

A simple CRUD API example with Laravel, with Authentication. The idea was to use the basic features of the Laravel framework, 
like Sanctum for authentication, and Eloquent for the many-to-many relationship. For the sake of simplicity, every time you consult the API, it already brings the related domain (In this case, Books and Stores).

I thought in adding a "Active" verification in the Stores model, but I ran out of time. I've been working a lot recently.

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
    "name": "Marcos R.",
    "email": "mrphp7@gmail.com",
    "password": "12345678"
}
```

Expect the following response: (with a diferent token)
```json
{
	"access_token": "1|7WQJL7ud9k67uV82ybgzNOvwwbSO4O0yHIqprpxQ",
	"token_type": "Bearer"
}
```

Once you register, automatically the API logins you in. You will use the access_token to connect to the api and use the CRUD features.

If you're using Postman or Insomnia, add Accept application/json header in order to work, and the bearer token.

## Login
POST to http://localhost:8989/api/login
```json
{
    "email": "mrphp7@gmail.com",
    "password": "12345678"
}
```

## Logout
POST to http://localhost:8989/api/logout 
* Need to add the bearer token

## Create, Update, Delete a Store
List: GET to http://localhost:8989/api/store/

Create: POST to http://localhost:8989/api/store
```json
{
	"name":"Book Store",
	"address": "Adress line 2",
	"active": 1
}
```

Update: PUT to http://localhost:8989/api/store/{id}
```json
{
	"name":"Book Store",
	"address": "Adress line 2",
	"active": 1
}
```

Delete: DELETE to http://localhost:8989/api/store/{id}

## Create, Update, Delete a Book
List: GET to http://localhost:8989/api/book/

Create: POST to http://localhost:8989/api/book
```json
{
	"name":"Voyage to the center of the Earth",
	"ISBN": 111111111,
	"value": 10.5,
	"store_id": 1
}
```

Update: PUT to http://localhost:8989/api/book/{id}
```json
{
	"name":"Voyage to the center of the Earth",
	"ISBN": 111111111,
	"value": 10.5,
	"store_id": 1
}
```

Delete: DELETE to http://localhost:8989/api/book/{id}

* Remember to add the bearer token in all api calls.

## Many to Many Relationship and Response Object

You can expect something like this when getting a response for a store listing:

```json
[
	{
		"id": 1,
		"name": "Book Store",
		"address": "Adress line 2",
		"active": 1,
		"created_at": "2024-04-09T22:34:28.000000Z",
		"updated_at": "2024-04-09T22:34:28.000000Z",
		"books": [
			{
				"id": 1,
				"name": "Les Miserables",
				"ISBN": 111111111,
				"value": "13.50",
				"created_at": "2024-04-09T22:34:52.000000Z",
				"updated_at": "2024-04-09T22:34:52.000000Z",
				"pivot": {
					"store_id": 1,
					"book_id": 1
				}
			},
			{
				"id": 2,
				"name": "Voyage to the center of the Earth",
				"ISBN": 111111111,
				"value": "10.50",
				"created_at": "2024-04-09T22:35:01.000000Z",
				"updated_at": "2024-04-09T22:53:20.000000Z",
				"pivot": {
					"store_id": 1,
					"book_id": 2
				}
			}
		]
	}
]
```