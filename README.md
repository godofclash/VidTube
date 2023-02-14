# Welcome to VidTube

VidTube is a youtube clone with some of it's features like seeing views and likes of the video, the author, creation date and much more. 

## Setup VidTube

### Install Software

In order to setup VidTube you first will have to install [node](https://nodejs.org/en/download/), [php](https://www.php.net/downloads.php), [MySQL](https://www.mysql.com/downloads/) and [composer](https://getcomposer.org/download/) in order to use this project. 
Head over to their sites and download those, then come back and follow the steps downwards. 

### Install Dependencies

After installing the software you need to install the dependencies for the project
- `npm install` 
- `composer install` 

### Run VidTube

If you run the project for the first time, you will have to change the name of the `.env.example` file to example and change the mysql dependencies according to your database. 
If you haven't created a database already in **MySQL** open MySQL terminal and type in your password. Now you just have to run the command `CREATE DATABASE [YOUR DATABASE NAME]`. Now change the dependencies in the .env file. 

If you want to run the project, you will have to follow these steps everytime you want to run it. You will have to run these commands both in a seperate terminal in your project folder in order to use the project

- `npm run dev`
- `php artisan serve`

Now just open your browser and type in the url `localhost:8000`
