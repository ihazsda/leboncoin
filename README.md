LeBonCoin Copy
=======================================

LeBonCoin is a clone of leboncoin.fr. It uses Symfony 4.2.3

## Installation

 * composer install
 * bin/console doctrine:database:create
 * bin/console doctrine:schema:update --force
 * bin/console doctrine:fixtures:load -n
 * bin/console server:run



## Features

  ## User
    
    * register user, login, logout
    * my account  

  ## Ads
      
      * create ads (sell|buy type) with 1-3 images uploads
      * list sell|buy ads
      * filter ads by category, city and title
      
  ## Content manangement
  
      * Login on /admin with admin/adminpass
      * CRUD operations on users, cities, categories, ads
      * Search users by 'username', 'email'
      * Search cities by 'name', 'zipcode'
      


## Libraries

  * FOSUserBundle for user manangement
  * EasyAdminBundle for backend management
  * VichUploaderBundle for image uploads
  * DoctrineFixturesBundle for cities and categories 
  * EasyAdminBundle for backend management

## Skipped functionalities (unfortunately not enough time)
  * Forgot password
  * Favorite ads
  * Localisation
  * Messages
  * Ad detail page

