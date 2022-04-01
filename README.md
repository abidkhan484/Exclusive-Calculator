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
1. Clone the repository.
```sh
git clone https://github.com/abidkhan484/Exclusive-Calculator.git
```

2. Set the execute permission to the `runserver.sh` file and execute it with the below commands.

```sh
chmod +x runserver.sh
./runserver.sh
```

In case, `bash` is not accessible then the below command is required to run in the folders `backend` and `frontend` individually.

```sh
docker-compose up -d
```

3. Set the write permission to the storage folder in the backend. 
```sh
chmod 777 -R backend/storage
```

4. Execute the migrate command
```sh
sail artisan migrate
```

5. Run Test
```sh
sail artisan test
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
