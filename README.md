# WebApp Using Laravel

## Description 
A simple web page design where user can register, login, update and delete the list.
All the data will be stored in your local database. For example, using MySQL Workbench. Therefore, you need to connect to your database software. 

## How to use this source code

### Requirements:
1. A localhost Web Server for example XAMPP [download XAMPP](https://www.apachefriends.org/download.html)
2. Composer [download Composer](https://getcomposer.org/download/)

### 1. Clone repo 
```
git clone https://github.com/ainacodes/SimpleWebApp
```
- move the folder to ...\xampp\htdocs
- open the file in your editor for example VScode.


### 2. Connect to your own database
In `.env` folder at line 11 add your database credentials.
Currently Laravel support: `MySQL`, `Posrgres`, `SQLite` and `SQL Server`
In this example I'm using `MySQL`
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

### 3. Create Table for the database
In `database/migrations` directory:
```
php artisan migrate
```

### 4. Start server
```
php artisan serve
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
