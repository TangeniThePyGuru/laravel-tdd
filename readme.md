<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Setting up the testing sqlite database
- Got to phpunit.xml file and add the following two tags
```xml
<env name="DB_CONNECTION" value="sqlite"/>
<env name="DB_DATABASE" value=":memory:"/>
```

- make sure that you have an sqlite database created under your database dir


## Attaching Laravel Dusk
- run the following composer command to install, dusk Dusk should not be available in production
```php
composer require --dev laravel/dusk
```

- run the following command to install dusk and scarffoled dusk 
```php
php artisan dusk:install
```

- Whenever you need to test with dusk, run the following command, make sure that you set your APP_URL in the .env file
dusk uses this url for testing
```php
php artisan dusk
```

- Create dusk test cases with the following command
```php
php artisan dusk:make LoginTest
```

- use the phpunit.dusk.xml file for faster tests and add the code below after the filter closing tag
```xml
    <php>
        <env name="APP_ENV" value="testing"/>
        <env name="BCRYPT_ROUNDS" value="4"/>
        <env name="CACHE_DRIVER" value="array"/>
        <env name="SESSION_DRIVER" value="array"/>
        <env name="QUEUE_DRIVER" value="sync"/>
        <env name="MAIL_DRIVER" value="array"/>
        <env name="DB_CONNECTION" value="sqlite"/>
        <env name="DB_DATABASE" value=":memory:"/>
    </php>
```