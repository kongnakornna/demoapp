# cmonproject

1. PS demoapp> cd api    
 - PS demoapp\api> docker-compose up
 - PS demoapp\api> docker ps


# webapp Image
3. PS demoapp> cd webapp    
 - PS demoapp\webapp> docker-compose up
 - PS demoapp\webapp> docker ps


# mongo Image
3. PS demoapp> cd mongo    
 - PS demoapp\mongo> docker-compose up
 - PS demoapp\mongo> docker ps
 

# webconf
 - demoapp\webapp\public\application\config\callapi.php
 
        $config['allow_sign_up_from']='1';
        $config['api_call_time']='45000';  
        $config['api_url']='http://YouIP:3044/v1/';
        $config['api_url2']='http://YouIP/api';

        $config['api_auth_signin']='auth/signin';
        $config['api_auth_signinuser']='auth/signinuser';
        $config['api_auth_signinapp']='auth/signinapp';
        $config['api_auth_users_logout']='users/logout';
        $config['api_auth_users_profile']='users/profile';
        $config['api_auth_signup']='auth/signup';
        # api_url
        $config['api_forgot_password']='users/forgot-password';
        $config['api_resetpassword']='users/resetpassword';
        $config['api_updateprofile']='users/updateprofile';
        $config['api_signinotp']='auth/signinotp';
        $config['api_verificationotp']='auth/verifyuserotp';


# file   : DATABASE  => demoapp\public.sql

# TEST 

- fontend : http://localhost:8099/
 - http://localhost:8099/user/signup
 - http://localhost:8099/pricecing

 -Username: demoadminapp
 -Email: demo@gmail.com
 -Password: Demo@123

- api : http://localhost:3044/document#/
- api : http://localhost:3044/
- api : http://localhost:3044/demo
- api : http://localhost:3044/v1/
# API
![api-1](https://github.com/user-attachments/assets/469a156e-1e7f-44b2-a203-c2993aa70b72)
![api-2](https://github.com/user-attachments/assets/de0cb173-1f73-44b3-85d0-9ca183cad34f)

# Database
![db-1](https://github.com/user-attachments/assets/0d901527-b2f9-4267-929c-6eb6bae6f2c6)

# Docker

![docker-1](https://github.com/user-attachments/assets/cdf37a0b-b56c-4f6b-8fdf-114d8069b607)

 # Web
![web-1](https://github.com/user-attachments/assets/fb5f6be5-3754-40b5-b8c9-e9cbe37778f2)

![web-2](https://github.com/user-attachments/assets/4297c35a-0f18-4b1c-811b-68852340c23f)

![web-3](https://github.com/user-attachments/assets/3d60d7af-b2e4-4e98-bd18-243f3a5caf9d)

![web-4](https://github.com/user-attachments/assets/c4fded3b-c927-43ca-b545-e1e28219694c)


![web-5](https://github.com/user-attachments/assets/0345d9b7-0b70-4d6d-85ad-afaf0bdfd3bf)

# Redis
![redis-1](https://github.com/user-attachments/assets/e4b441dc-5ca4-4d9d-b0d7-a65fd7099941)

# Postman

![postman-1](https://github.com/user-attachments/assets/0cf4601d-c1f3-49f4-8f8a-9780a8532ac2)

