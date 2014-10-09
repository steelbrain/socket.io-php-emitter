Socket.io Emitter for PHP
=========================

Dead Simple Socket.io Emitter for PHP (HHVM Compatible). It makes use of Redis to communicate with Socket.io instances. This library is a cleanup and rewrite of [socket.io-php-emitter](https://github.com/rase-/socket.io-php-emitter).

##Installation
If you are running hhvm or php 5.6 just include `emitter-php5.6.php`.
If you have php v5.4 >= v5.5 then `emitter-php5.4.php`. Otherwise `emitter-php5.php` would work good for you.

Note: This library makes use of [msgpack](http://msgpack.org). So, If you have `msgpack` pecl extension installed then it's good otherwise you will also need to include the `emitter-msgpack.php`.
##Usage
###Initalization:
####Using [Credis](https://github.com/colinmollenhour/credis):
```php
$redis = new Credis_Client('localhost',6379);
Socket_Emitter::init($redis);
```
####Using [phpredis](https://github.com/nicolasff/phpredis):
```php
$redis = new Redis();
$redis->connect('localhost',6379);
Socket_Emitter::init($redis);
```
###Emitting:
####To a single client:
```php
// Do some processing above
// This example assumes that you already have client's socket.io unique identifier stored in $user_id
Socket_Emitter::emit(
    [$client_id],
    ['message', 'Hello Hello, this is a message']
);
// Do some processing below
```
####In a room:
```php
// Do some processing above
// This example assumes that you already have client's socket.io unique identifier stored in $user_id
Socket_Emitter::emit(
    ["DeRoom"],
    ['message', 'Hello Hello, this is a message']
);
// Do some processing below
```
###In multiple rooms:
```php
// Do some processing above
// This example assumes that you already have client's socket.io unique identifier stored in $user_id
Socket_Emitter::emit(
    ["room1","room2"],
    ['message', 'Hello Hello, this is a message']
);
// Do some processing below
```
