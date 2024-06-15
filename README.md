# How to Use

1. Ensure you have Docker and Laravel Sail installed.
2. Run the following commands in your terminal to start the Docker containers and set up the project:

    ```sh
    git clone https://github.com/orange-manul/blog-admin-panel.git
    cd <project directory>
    cp .env.example .env
    composer install
    composer update
    ./vendor/bin/sail up -d
    ./vendor/bin/sail artisan key:generate
    ./vendor/bin/sail npm install
    ./vendor/bin/sail npm run dev
    ```

3. **Look through Docker containers to find your project container**:

    ```sh
    docker ps
    ```

4. **Example command to enter the container**:

    ```sh
    docker exec -it blog-admin-panel_laravel.test_1 bash
    ```

5. **Inside the container, run the following commands**:

    ```sh
    php artisan migrate
    php artisan db:seed
    ```
