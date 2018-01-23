[![Author](https://img.shields.io/badge/author-Daniel%20M.%20Hendricks-lightgrey.svg?colorB=9900cc)](https://www.danhendricks.com)
[![Latest Version](https://img.shields.io/github/release/dmhendricks/wordpress-toolkit.svg)](https://github.com/dmhendricks/wordpress-toolkit/releases)
[![Packagist](https://img.shields.io/packagist/v/dmhendricks/wordpress-toolkit.svg)](https://packagist.org/packages/dmhendricks/wordpress-toolkit)
[![Total Downloads](https://img.shields.io/packagist/dt/dmhendricks/wordpress-toolkit.svg)](https://packagist.org/packages/dmhendricks/wordpress-toolkit)
[![GitHub License](https://img.shields.io/badge/license-GPLv2-yellow.svg)](https://raw.githubusercontent.com/dmhendricks/wordpress-toolkit/master/LICENSE)
[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://paypal.me/danielhendricks)
[![WP Engine](https://img.shields.io/badge/WP%20Engine-Compatible-orange.svg)](http://bit.ly/WPEnginePlans)
[![Twitter](https://img.shields.io/twitter/url/https/github.com/dmhendricks/wordpress-toolkit.svg?style=social)](https://twitter.com/danielhendricks)

# WordPress Tool Kit

A collection of classes that I use in my WordPress projects & plugins.

### Contributing

If you can make the code better or recommend/contribute code that would be useful to include, [please let me know](https://github.com/dmhendricks/wordpress-toolkit/issues).

## Features

* [ConfigRegistry](https://github.com/dmhendricks/wordpress-toolkit/wiki/ConfigRegistry) class - Loads plugin/theme settings from an array or JSON file.
* [Licensing](https://github.com/dmhendricks/wordpress-toolkit/wiki/Licensing) class - Currently only support license code validation via the [Software Licensing](https://www.whmcs.com/software-licensing/) addon for WHMCS.
* [ObjectCache](https://github.com/dmhendricks/wordpress-toolkit/wiki/ObjectCache) class - A wrapper for setting/fetching values from the WordPress object cache, where available.
* [PluginTools](https://github.com/dmhendricks/wordpress-toolkit/wiki/PluginTools) class - A class for retrieving data and performing various tasks on plugins.
* [ScriptObject](https://github.com/dmhendricks/wordpress-toolkit/wiki/ScriptObject) class - Inject JavaScript variables or CSS into the page head or write/enqueue external files.

## Installation

### Requirements

* WordPress 4.5 or higher
* PHP 5.6.4 or higher
* Composer 1.6 or higher

### Install with Composer

```
composer require dmhendricks/wordpress-toolkit
```

### Usage

Please see the [Documentation](https://github.com/dmhendricks/wordpress-toolkit/wiki) page.

## Change Log

Release changes are be noted on the [Releases](https://github.com/dmhendricks/wordpress-toolkit/releases) page.

#### Branch: `master`

* Added `is_ajax()` method
* Updated Composer license to conform to new SPDX identifiers
* Added [phpdotenv](https://github.com/etelford/phpdotenv) support ([reference](https://github.com/dmhendricks/wordpress-toolkit/wiki/ToolKit))
