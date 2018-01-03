# Admin Footer Version (rebranded)

[![Build Status](https://travis-ci.org/luciano-croce/admin-footer-version-rebranded.svg?branch=master)](https://travis-ci.org/luciano-croce/admin-footer-version-rebranded)

Show rebranded version in admin footer (dashboard backend) when is activated, or automatically, if it is in mu-plugins directory. Expand, secure, enhance, core code, on /wp-admin/includes/update.php

* Expand (necessary)

  * Same dashboard messages for all WordPress releases.
  * All readable text of this plugin are code free.
  * Same code work with WP 2.3+ to 4.9+ ~ 5.0-alpha future builds.
  * Centralized deployment and development for installations.
  * Writed with a compatible editor UTF-8 without BOM and Unix LF.

* Enhance (includes)

 * Visual color messages for: development, upgrade, latest.
 * Support for Single, Multiuser (MU) and Multisite (MS) release.
 * Checking PHP and WP requirements before plugin activation.
 * No HTML tags was inserted (showed) on Text Domain strings.

* Secure (provides)

 * Disables for all users except administrators the ability to visualize version.
 * Fixed missed user role code for core updates.
 * Fixed missed user role code for development updates.
 * Secured the user roles that can update WordPress:
 * Only users that have manage_options capability WP 2.3+ to 2.9+
 * Only users that have update_core capability WP 3.0+ to 4.9+ ~ 5.0-alpha
