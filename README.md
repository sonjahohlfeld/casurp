 # Casurp
 
 ## About
 Casurp is a software for managing the cash register of a coffee machine and can be used in work groups or small
 companies.
 
 The software includes a web interface for managing products and the credits of all users.
 Additionally, consumption is measured based on a NFC reader for student cards.
 
 
 ## Local Setup
 
 For running the web interface you have to execute the follwoing commands
 
``git clone https://github.com/sonjahohlfeld/casurp.git``
``cd casurp`` 
``composer install``
``yarn install``
``./node_modules/.bin/encore dev``
``php bin/console server:run``