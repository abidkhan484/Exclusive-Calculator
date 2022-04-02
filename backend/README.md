## Installation

Inside this directory, run the below command to start Backend server
_Cross check yourself that you are in the backend directory._
```sh
docker-compose up -d
```

To migrate db
```sh
sail artisan migrate
```

Open browser and run the application with the below URL
```sh
http://localhost:7007
```
## Insert data inside database
It is recommanded to insert data in the emoji operator table. An admin panel is required to create the table.

```sh
# update the password accordingly. better if you will skip inline password
docker exec -it backend_mysql_1 mysql -usail -ppassword exclusive_calculator
```

Insert into database table
```sh
INSERT INTO `emoji_operators` 
    (`title`,`emoji_code`,`arithmetic_operator`) 
    VALUES ('alien','f09f91bd','+'),
    ('skull','f09f9280','-'),
    ('ghost','f09f91bb','*'),
    ('scream','f09f98b1','/');
```
## Useful commands
Some useful sail commands
```sh
# To test both unit and feature
sail artisan test
# To clear cache
sail artisan cache:clear
```

To solve composer dependency
```sh
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```
