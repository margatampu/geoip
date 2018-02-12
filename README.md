# Geo IP

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Geo Ip took all available information from an Ip Address using data from [GeoPlugin](http://www.geoplugin.net). 

Work with Laravel 5.5 (tested). 

Geo IP use [Geoplugin](http://www.geoplugin.net) to gather information.


## Install

You can install GeoIp via [composer](https://getcomposer.org/). 

``` bash
$ composer require sabartampubolon/geoip
```
Requires Laravel Framework 5.5 and PHP 5.5.9 or newer. Visit GeoIp repository at [Packagist](https://packagist.org/packages/sabartampubolon/geoip).

## Usage

To use GeoIp, you can simply inject GeoIp instance into Laravel controller

``` php
<?php

use Sabartampubolon\Geoip\Geoip;

// Use destination Ip
$geoip = new Geoip('8.8.8.8');
 
// Or just let it blank to automatic use client ip address
$geoip = new Geoip();
 
  
// Gather information from ip address
$info = $geoip->getInfo();
```

The code above will give a result in json format like this (use IP Address 8.8.8.8):

``` json
{"ip_address":"8.8.8.8","country_code":"US","country_name":"United States","city":"Mountain View","region":"CA","region_name":"California","region_code":"CA","latitude":"37.3845","longitude":"-122.0881"}
```
<!--

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email sabartampubolon@gmail.com instead of using the issue tracker.
-->

## Credits

- [sabartampubolon][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/sabartampubolon/geoip.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/sabartampubolon/geoip/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/sabartampubolon/geoip.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/sabartampubolon/geoip.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/sabartampubolon/geoip.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/sabartampubolon/geoip
[link-travis]: https://travis-ci.org/sabartampubolon/geoip
[link-scrutinizer]: https://scrutinizer-ci.com/g/sabartampubolon/geoip/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/sabartampubolon/geoip
[link-downloads]: https://packagist.org/packages/sabartampubolon/geoip
[link-author]: https://github.com/sabartampubolon
[link-contributors]: ../../contributors