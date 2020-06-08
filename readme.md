# Blog php template

This is a litle blog project made with php in less than 10 days for my studies at Hetic.

## Features
- Read articles
- Write articles with an wysiwyg editor
- Login system
- SEO friendly with canonic URL
- Custom homemade router
- Oriented object code


## Instructions

Install dependencies into a webserver with php apache mysql

Import blog.sql to your database

Configure the database in /config/config.php

```
//Database configuration
define('DB_HOST', 'your_host');
define('DB_PORT', 'your_port');
define('DB_NAME', 'your_database_name');
define('DB_USER', 'your_database_user');
define('DB_PASS', 'your_database_password');
```

Go to yourwebsite/login to log you as admin
, user and password are: 
```
email: test@test.com
password: 123456
```

## Licence
```
MIT License

Copyright (c) 2020 Constant Gillet

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
```


## Thanks

- Thanks to https://fr.rbth.com/ for the database content
- Thanks to https://www.taniarascia.com/the-simplest-php-router/ for the router inspiration
- Thanks to https://www.codeofaninja.com/2017/02/create-simple-rest-api-in-php.html for the POO inspiration

