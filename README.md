# Omnipay: iPay88

**iPay88 driver for the Omnipay PHP payment processing library**

<!--[![Build Status](https://travis-ci.org/thephpleague/omnipay-iPay88.png?branch=master)](https://travis-ci.org/thephpleague/omnipay-iPay88)-->
<!--[![Latest Stable Version](https://poser.pugx.org/omnipay/iPay88/version.png)](https://packagist.org/packages/omnipay/iPay88)-->
<!--[![Total Downloads](https://poser.pugx.org/omnipay/iPay88/d/total.png)](https://packagist.org/packages/omnipay/iPay88)-->

[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP 5.3+. This package implements iPay88 support for Omnipay.

## Installation

Omnipay is installed via [Composer](http://getcomposer.org/). 

Run on cmd
```
composer require miowng/ipay88 3.1.1
```

## Reminder
Don't forget to set your merchantKey, merchantCode and backendUrl on Gateway.php

file location is ipay88/src/Gateway.php

## Basic Usage

The following methods are provided by this package:

+ purchase
+ completePurchase

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay)
repository.


## Support

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you want to keep up to date with release anouncements, discuss ideas for the project,
or ask more detailed questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which
you can subscribe to.

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/dilab/omnipay-ipay88/issues),
or better yet, fork the library and submit a pull request.
