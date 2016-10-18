# Vehicle System

This guide provides the setup instructions to get the system up and running, and also information on how to interface with the API.

## Setup

- Clone the repo.
- CD into the applciation directory.
- Cope the `.env.example` file to `.env`, then update the database information to point to your mysql database. 
- Migrate the database using the `php artisan migrate` command. 
- Next, seed the database using the `php artisan db:seed` command. 
- Lastly, generate an application key using the `php artisan key:generate` command.

Now, using `php artisan serve` you should be all set to run the application.

The login credentials are username:**admin@gmail.com** and password:**admin**

## The API

The API exposes 5 endpoints;
- GET -`/api/vehicles` -> Gets all the vehicles in the system.
- GET -`/api/vehicles/{id}` -> Get a specific vehicle by passing in the ID.
- POST -`/api/addvehicle` -> Add a new vehicle
- `POST -/api/updatevehicle/{id}` -> Update a vehicle, passing in the vehicle ID.
- GET -`/api/removevehicle/{id}` -> Soft delete a vehicle from the system.  

When the login user is seeded, an api token is created. This must be used when making requests. Pass the api token as a GET parameter in the URL, `eg. /api/vehicles?api_token=YOUR_TOKEN_HERE`

Additionaly, the api response format can be changed by passing the `format` GET parameter. Available formats are `xml` and `json`. The system defaults to `json`.  `eg. /api/vehicles?api_token=YOUR_TOKEN_HERE&format=FORMAT`