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

 -Username: demoadminapp
 -Email: demo@gmail.com
 -Password: Demo@123

- api : http://localhost:3044/document#/
- api : http://localhost:3044/
- api : http://localhost:3044/demo
- api : http://localhost:3044/v1/

![docker-1](https://github.com/user-attachments/assets/cdf37a0b-b56c-4f6b-8fdf-114d8069b607)

![web-1](https://github.com/user-attachments/assets/fb5f6be5-3754-40b5-b8c9-e9cbe37778f2)

![web-2](https://github.com/user-attachments/assets/4297c35a-0f18-4b1c-811b-68852340c23f)




