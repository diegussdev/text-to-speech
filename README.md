# Text-to-Speech - Google Cloud

# Technologies
- Docker
- PHP
- Google Cloud

# How to use
- Clone the repository
- Access the project directory
- Grant permission to the directory `chmod -R 777 ./`
- Rename the `key.example.json` file to `key.example.json` and set Google Cloud Credentials
- Start Docker and run `docker-compose up -d`
- Access the application container `docker exec -it php bash`
- Run `composer install`
- Run `php index.php "YOUR TEXT HERE"`
- The audio file will be saved in the `storage` directory