Parser
======

Project based on Symfony 3

**How to create the database**

- First we have to create an new empty schema;
- Configure accessing parameters at app/config/parameters.yml file
- Execute this command:


    php bin/console doctrine:schema:create

**How to execute command**

    php bin/console app:parser:import http://www.example.com/feed/products

============

*Kevin Murillo Fernández*