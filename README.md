# Admin Footer Version (rebranded)

[![Build Status](https://travis-ci.org/luciano-croce/admin-footer-version-rebranded.svg?branch=master)](https://travis-ci.org/luciano-croce/admin-footer-version-rebranded)

Show the **rebranded version** in the admin footer, (dashboard) when it is activated, or automatically, if it is in mu-plugins directory. Expand, secure, enhance, core code on /wp-admin/includes/update.php

Available only on https://wordpress.org/plugins/admin-footer-version-rebranded/

Expand:

Necessary

* Same dashboard messages for all WordPress releases.
* All readable text of this plugin are code free.
* Same code work from WP 2.3+ to 4.9+ ~ 5.0-alpha
* Centralized deployments and development for all installations.

Enhance:

Includes

* Visual colour messages for: development, upgrade, latest.    
* Support Single, Multiuser (MU) and Multisite (MS) release.
* Checking PHP and WP requirements before plugin activation.
* No HTML tags was inserted (showed) on Text Domain strings.

Secure:

Provides

* Disables for all users except administrators the ability to visualize version.
* Only the user roles can manage options or core have the permission to update WordPress.
* Corrected the missing user role code for core updates.
* Corrected the missing user role code for development updates.
* Secured the user roles that can update WordPress.
* Only users that have manage_options capability (WP 2.3+ to 2.9+)
* Only users that have update_core capability (WP 3.0+ to 4.9+ ~ 5.0-alpha)

Table of classifications:

WordPress

 * Legacy version 2.3+ to 2.6+ - red color highlighted
 * Oldest version 2.7+ to 2.9+ - red color highlighted
 * Old version 3.0+ to 3.6+ - red color highlighted
 * Supported version 3.7+ to 4.8+ - orange color highlighted
 * Latest version 4.9+ - black color highlighted
 * Development version 5.0-alpha - orange color highlighted

PHP

 * 5.2+ slow - deprecated version red color highlighted
 * 5.3+ slow - deprecated version red color highlighted
 * 5.4+ slow - deprecated version red color highlighted
 * 5.5+ slow - deprecated version red color highlighted
 * 5.6+ slow - acceptable version orange color highlighted
 * 7.0+ fast - supported version black color highlighted
 * 7.1+ fast - supported version black color highlighted
 * 7.2+ fast - supported version black color highlighted
 * 7.3+ fast - development version orange color highlighted

(available on development version)

MySQL

 * 5.0+ oldest version red color highlighted
 * 5.1+ old version red color highlighted
 * 5.5+ acceptable version orange color highlighted
 * 5.6+ current version black color highlighted
 * 5.7+ development version orange color highlighted

(available on development version) 

MariaDB

 * 5.5+ acceptable version orange color highlighted
 * 10.0+ current version black color highlighted

(available on development version)
