    # About Project
    
        This project can authorize with console
    and get a json file using generated token.
    Then you can change and delete these json files.
   
    # Installation
    
    - php artisan migrate --seed
    
    # Authorization
    
    - php artisan auth
        - login: admin
        - password: password
    
    # Config
    
    - make .env and .env.testing from .env.example
    
    # Report Path
    
    -  report -> Report.xlsx
    
    # Nginx
    
    /* Auth detail 
    #Need create file (.htpasswd) on sites-enabled directory with content: 
     
    admin:$apr1$EtH2tUQq$zpHsVT3OWLzV0ndSUZQOR0 
     
    #Login: admin 
    #Password: qq0410601307qq 
    */ 
     
    server { 
        listen 80; 
        server_name localhost default; 
        root /var/www/task-json-parse; 
     
        add_header X-Frame-Options "SAMEORIGIN"; 
        add_header X-XSS-Protection "1; mode=block"; 
        add_header X-Content-Type-Options "nosniff"; 
     
        index index.html index.htm index.php; 
     
        charset utf-8; 
     
     auth_basic "Need AUTH"; 
        auth_basic_user_file /etc/nginx/sites-enabled/.htpasswd;  
      
        location / { 
            try_files $uri $uri/ /index.php?$query_string; 
        } 
     
        location = /favicon.ico { access_log off; log_not_found off; } 
        location = /robots.txt  { access_log off; log_not_found off; } 
     
        error_page 404 /index.php; 
     
        location ~ \.php$ { 
            fastcgi_pass unix:/var/run/php/php7.4-fpm.sock; 
            fastcgi_index index.php; 
            fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name; 
            include fastcgi_params; 
        } 
    }    