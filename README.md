# Debug
[![License](https://img.shields.io/badge/License-GPL%20v3-blue.svg)](http://www.gnu.org/licenses/gpl-3.0)
![Downloads](https://img.shields.io/packagist/dt/wpbp/debug.svg) 

Add your plugin to Query Monitor with a simple way to log the activity.  
Automatically will add a new panel and a menu entry with a counter of every item added.

## Install

`composer require wpbp/debug:dev-master`

## Example

```php
$debug = new WPBP_Debug( __( 'Name of the panel', 'your-textdomain' ) );
$debug->log( __( 'Plugin Loaded', 'your-textdomain' ) );
$debug->qm_log( __( 'Error inside the log panel of Query Monitor', 'your-textdomain' ), 'error' );
```
