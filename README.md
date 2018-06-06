# Admin Footer Version (rebranded)

[![Build Status](https://travis-ci.org/luciano-croce/admin-footer-version-rebranded.svg?branch=master)](https://travis-ci.org/luciano-croce/admin-footer-version-rebranded)

Disclaimer: this is the dev version, is more different to the original package, and is possible that not work as expected!

Available only on https://wordpress.org/plugins/admin-footer-version-rebranded/

Plugin approved in the repository of the plugin directory on 2017-12-25

Development for this plugin takes place at [GitHub](https://github.com/luciano-croce/admin-footer-version-rebranded/) and [Travis CI](https://travis-ci.org/luciano-croce/admin-footer-version-rebranded/).

Compatible with [GlotPress Translations](https://translate.wordpress.org/projects/wp-plugins/admin-footer-version-rebranded). 

Show the **rebranded version** in the admin footer, (dashboard) when it is activated, or automatically, if it is in mu-plugins directory. Expand, secure, enhance, core code on /wp-admin/includes/update.php

**This WordPress plugin expand, secure, enhance, core code on /wp-admin/includes/update.php**

Expand

Necessary

* Same dashboard messages for all WordPress releases.
* All readable text of this plugin are code free.
* Same code work from WP 2.3+ to 4.9+ ~ 5.0-alpha
* Centralized deployments and development for all installations.

Enhance

Includes

* Visual color messages for: development, upgrade, latest.
* Support Single, Multiuser (MU) and Multisite (MS) release.
* Checking PHP and WP requirements before plugin activation.
* No HTML tags have inserted (showing) in Text Domain strings.

Secure

Provides

* Disabled for all users except admins, ability to visualize version.
* Only user roles manage options or core can update WordPress.
* Corrected the missing user role code for core updates.
* Corrected the missing user role code for development updates.
* Secured the user roles that can update WordPress.
* Only users with manage_options capability (WP 2.3+ to 2.9+)
* Only users with update_core capability (WP 3.0+ to 4.9+ ~ 5.0-α)

Table of classifications

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

Tips

A neat trick, is to put this single file admin-footer-version-rebranded.php (not its parent directory) in the /wp-content/mu-plugins/ directory (create it if not exists) so you won't even have to enable it, and will be loaded by default, also, since first step installation of WordPress setup!

Also, for translation functionality, put all files of the single languages (admin-footer-version-rebranded-en_US.mo for example) that you need (not its parent directory) in the /wp-content/mu-plugins/ directory (create it if not exists) and will be loaded by default, they also, since first step installation of WordPress setup!

About it

The code of this plugin, is not written with a PHP framework, but with a simple PHP editor, manually, compatible UTF-8 without BOM, and Unix LF. To avoid code corruption, do not edit it with WordPress embedded editor, or with any specifications incompatible editor.

Translation

Translated by [Luciano Croce](https://profiles.wordpress.org/luciano-croce/) on 14 languages and related formal/informal variants.

Available in English, French, German, Italian, Portuguese, Spanish, and more other languages coming soon.

Acknowledgements

Thanks for the corrections, suggestions, and translation approval to

Team

 * de_CH
 * de_DE
 * en_AU
 * en_CA
 * en_GB
 * en_NZ
 * en_ZA
 * es_ES
 * fr_BE
 * fr_CA
 * fr_FR
 * it_IT
 * pt_BR
 * pt_PT

People

 * [Andrea Gandino](https://profiles.wordpress.org/andg/)
 * [Daniel James](https://profiles.wordpress.org/danieltj/)
 * [Fernando Tellado](https://profiles.wordpress.org/fernandot/)
 * [Felipe Elia](https://profiles.wordpress.org/felipeelia/)
 * [FX Bérnard](https://profiles.wordpress.org/fxbenard/)
 * [Garrett Hyder](https://profiles.wordpress.org/garrett-eclipse/)
 * [Gary Jones](https://profiles.wordpress.org/garyj/)
 * [Laura Sacco](https://profiles.wordpress.org/lasacco/)
 * [Pascal Birchler](https://profiles.wordpress.org/swissspidy/)
 * [Pascal Casier](https://profiles.wordpress.org/casiepa/)
 * [Pedro Mendonça](https://profiles.wordpress.org/pedromendonca/)
 * [Petya Raykovska](https://profiles.wordpress.org/petya/)
 * [Presskopp](https://profiles.wordpress.org/presskopp/)
 * [Stephen Edgar](https://profiles.wordpress.org/netweb/)
 * [Johannes Jülg](https://profiles.wordpress.org/timse201/)
 * [WebAware](https://profiles.wordpress.org/webaware/)
 * [Naoko Takano](https://profiles.wordpress.org/nao/)

Disclaimer

With the exception of the main descriptions, it is considered a good practice, not to translate the readme.txt file in the various languages different from en_US (except for the other english languages derived from english) to standardize the understanding of its technical content, and not to introduce new errors due to the misunderstanding of its correct translation.
