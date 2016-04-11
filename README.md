# Geo Ip For Laravel 5.2
Geo Ip took all available information from an Ip Address. Work with Laravel 5.2 (tested). Geo IP use [Geoplugin](http://www.geoplugin.net) to gather information.


## Install
You can install Logger via [composer](https://getcomposer.org/).

``
$ composer require sabartampubolon/geoip
``

Requires Laravel Framework 5.2 and PHP 5.5.9 or newer. Visit GeoIp repository at [Packagist](https://packagist.org/packages/sabartampubolon/geoip).


## Usage

To use GeoIp, you can simply inject GeoIp instance into Laravel controller

```php
<?php

use Sabartampubolon\Geoip\Geoip;

// Use destination Ip
$geoip = new Geoip('8.8.8.8');

// Or just let it blank to automatic use client ip address
$geoip = new Geoip();



// Gather information from ip address
$info = $geoip->getInfo();

```

The code above will give a result in json format like this (use ip 8.8.8.8):

```
{"ip_address":"8.8.8.8","country_code":"US","country_name":"United States","city":"Mountain View","region":"CA","region_name":"California","region_code":"CA","latitude":"37.3845","longitude":"-122.0881"}
```
