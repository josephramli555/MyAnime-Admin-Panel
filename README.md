# MyAnimeList Admin Panel

Simple myAnime Admin Panel that allows you to CRUD into your collection of Anime and also Adding the Admin

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites
1. This project is created using Codeigniter 4.0 	
2. Before starting make sure you already start your xampp server and turn on APACHE and MYSQL MODULE
3. Create database with name db_anime and leave it empty, we will populate them in the next step



### Installing

A step by step series of examples that tell you how to get a development env running

We will insert table into our db_anime by opening your cli inside folder project, then run this command

```
php spark migrate
```

after running that command you will see table users and anime inside your db_anime, to populate the data inside that table
run this command in your cli

```
php spark db:seed AnimeSeeder
php spark db:seed UserSeeder
```

After filling the table with dummy data, your project is ready to run, open your cli and run this command
```
php spark serve
```

run into your localhost address, if asked to login, you can use the first user_id and password in your database
```
user_id: admin
password : password
```

Have some fun with this project, and contribution ^_^


