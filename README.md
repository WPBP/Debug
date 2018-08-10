# Debug
[![License](https://img.shields.io/badge/License-GPL%20v3-blue.svg)](http://www.gnu.org/licenses/gpl-3.0)
![Downloads](https://img.shields.io/packagist/dt/wpbp/debug.svg) 

This package is a wrapper to Query Monitor for:

* Create a custom alternative panel for log stuff inside Query Monitor
* Add a timer method that use the Query Monitor internals
* Add a method to print in the internal log panel of Query Monitor

## Install

`composer require wpbp/debug:dev-master`

## Example

```php
$debug = new WPBP_Debug( __( 'Name of the panel', 'your-textdomain' ) );
$debug->log( __( 'Plugin Loaded', 'your-textdomain' ) );
$debug->qm_log( __( 'Error inside the log panel of Query Monitor', 'your-textdomain' ), 'error' );
$debug->qm_timer( 'profile_that_callback', function () { echo 'I need to be profiled!'; } );
```
