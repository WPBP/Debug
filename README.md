# Debug
[![License](https://img.shields.io/badge/License-GPL%20v3-blue.svg)](http://www.gnu.org/licenses/gpl-3.0)
![Downloads](https://img.shields.io/packagist/dt/wpbp/debug.svg) 

Add to your plugin the Debug Bar support (work also on Query Monitor) with a simple way to log the activity

## Install

`composer require wpbp/debug:dev-master`

[composer-php52](https://github.com/composer-php52/composer-php52) supported.

## Example

```php
$debug = new WPBP_Debug( );
$debug->log( __( 'Plugin Loaded', 'your-textdomain' ) );
```
