    # Installation
    
    - php artisan migrate --seed
    
    # Authorization
    
    - php artisan auth
        - login: admin
        - password: password
    
    # Config
    
    - make .env and .env.testing from .env.example
        