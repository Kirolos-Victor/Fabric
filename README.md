## How to Use

### Clone the repository

> git clone **https://github.com/Kirolos-Victor/Fabric.git**

### Install Via Composer

> composer install

### Generate Application Key

> php artisan key:generate

### Setup your .env file

> Rename .env.example to .env and modify the configuration to match your local machine.

### Run the database migrations (Set the database connection in .env before migrating)

> **php artisan migrate**
>
> Recommended: Use **php artisan migrate --seed** so you can access the website without having to register an
> account
>
> Email: test@fabric.com Password:password

### Install modules and Vue js

> run npm install & npm run dev to start using Vite

### Testing

> run **php artisan test**

### Task

> I have created a simple CRUD application, and included the three buttons to fetch the data from the three
> different websites like mentioned in the documentation also
> created a simple endpoint for movies, so you can fetch all the movies with one api **/api/movies**


