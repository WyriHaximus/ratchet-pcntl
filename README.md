HtmlCompress
============

[![Build Status](https://travis-ci.org/WyriHaximus/ratchet-pcntl.png)](https://travis-ci.org/WyriHaximus/ratchet-pcntl)
[![Latest Stable Version](https://poser.pugx.org/WyriHaximus/ratchet-pcntl/v/stable.png)](https://packagist.org/packages/WyriHaximus/ratchet-pcntl)
[![Total Downloads](https://poser.pugx.org/wyrihaximus/ratchet-pcntl/downloads.png)](https://packagist.org/packages/wyrihaximus/ratchet-pcntl)
[![Code Coverage](https://scrutinizer-ci.com/g/WyriHaximus/ratchet-pcntl/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/WyriHaximus/ratchet-pcntl/?branch=master)
[![License](https://poser.pugx.org/wyrihaximus/ratchet-pcntl/license.png)](https://packagist.org/packages/wyrihaximus/ratchet-pcntl)
[![PHP 7 ready](http://php7ready.timesplinter.ch/WyriHaximus/ratchet-pcntl/badge.svg)](https://travis-ci.org/WyriHaximus/ratchet-pcntl)

## Installation ##

To install via [Composer](http://getcomposer.org/), use the command below, it will automatically detect the latest version and bind it with `~`.

```
composer require wyrihaximus/ratchet-pcntl 
```

## Bootstrap CLI ##

Add the following to your `config/bootstrap_cli.php` to load the plugin.

```php
Plugin::load('WyriHaximus/Ratchet/PCNTL', [
    'bootstrap' => true,
]);
```

## License ##

Copyright 2015 [Cees-Jan Kiewiet](http://wyrihaximus.net/)

Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following
conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.
