# Exclusive Calculator
The project is designed to be built in a different repository. But to set up easier, it is shown in the shared repo.
## Prerequisites

Check if `docker` & `docker-compose` is already installed by entering the following command : 

```sh
which docker
which docker-compose
```

To run the docker commands without using **sudo** you must add the **docker** group to **your-user**:

```
sudo usermod -aG docker your-user
```

## Setup
1. Clone the repository and goto the project directory
```sh
git clone https://github.com/abidkhan484/Exclusive-Calculator.git && cd Exclusive-Calculator
```

2. Set the execute permission to the `runserver.sh` file and execute it with the below commands.

```sh
# set the current working directory
root_directory=${PWD}
# update env variable accordingly
cp $root_directory/backend/.env.example backend/.env
cp $root_directory/frontend/.env.example frontend/.env
# set the execute permission and run the script
chmod +x runserver.sh
./runserver.sh
```

In case, `bash` is not accessible then the below command is required to run in the folders `backend` and `frontend` individually.

```sh
docker-compose up -d
```

3. Set the write permission to the storage folder in the backend. 
```sh
chmod 777 -R $root_directory/backend/storage
```

4. Execute the migrate command.
_It will be better to manage the arithmetic operator with an admin panel._
```sh
cd $root_directory/backend && sail artisan migrate
```

5. **Please insert the minimal data into database with [Backend Readme](backend/README.md#insert-data-inside-database).** The `Arithmetic Operators` are managed by the `emoji_operators` table.

6. Run the below command to cross check npm install for the frontend
```sh
docker exec -it calculator npm install
```

7. Run Test of the backend
```sh
cd $root_directory/backend && sail artisan test
```


## Run the application

### Frontend
```sh
http://localhost:7777
```

### Backend
```sh
http://localhost:7007
```

## Conclusion
For more info goto the [backend readme](backend/README.md) or [frontend readme](frontend/README.md).
It is also recommended to check the [Github wiki page](https://github.com/abidkhan484/Exclusive-Calculator/wiki) of the repository.
