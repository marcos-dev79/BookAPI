# BOOK API

A simple CRUD API example with Laravel, with Authentication.


## Register a User

After running the docker-compose, and running the migration, just send a post request to:

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


## Create a Store


## Create a Book