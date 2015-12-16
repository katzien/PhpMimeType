# PhpMimeType
A PHP library to detect the mime type of a file.

[![Build Status](https://travis-ci.org/katzien/PhpMimeType.svg?branch=master)](https://travis-ci.org/katzien/PhpMimeType)
[![Coverage Status](https://coveralls.io/repos/katzien/PhpMimeType/badge.svg)](https://coveralls.io/r/katzien/PhpMimeType)
[![Dependency Status](https://www.versioneye.com/user/projects/550b541aa80b5fba79000164/badge.svg?style=flat)](https://www.versioneye.com/user/projects/550b541aa80b5fba79000164)

[![Latest Stable Version](https://poser.pugx.org/katzien/php-mime-type/v/stable.svg)](https://packagist.org/packages/katzien/php-mime-type)
[![Total Downloads](https://poser.pugx.org/katzien/php-mime-type/downloads.svg)](https://packagist.org/packages/katzien/php-mime-type)

[![License](https://poser.pugx.org/katzien/php-mime-type/license.svg)](https://packagist.org/packages/katzien/php-mime-type)

## Not invented here

This is a modernised version of [Jason Sheets's mimetype class](http://www.phpclasses.org/browse/file/2743.html).

## Installation

To add the PhpMimeType library to your project, simply run

```sh
composer require katzien/php-mime-type
```

from the directory where your composer.json file is.

See [Packagist](https://packagist.org/packages/katzien/php-mime-type) for more details.

##  Versions

1.* is compatible with PHP 5.3 - 5.5

2.* is compatible with PHP 5.6

changelog:
- use PHPUnit 5.* which requires PHP 5.6

## Usage

```php
$type = \MimeType\MimeType::getType('my-file.pdf'); // returns "application/pdf"
```
