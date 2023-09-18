=== Fix for Yoast SEO and qTranslate/qTranslateX ===

Contributors:      lupetalo
Plugin Name:       Fix for Yoast SEO and qTranslate/qTranslateX
Plugin URI:        http://wordpress.org/plugins/yoast-seo-fix-for-qtranslate/
Tags:              yoast, qTranslate
Author URI:        http://nextweb.rs
Author:            Luka Petrovic
Requires at least: 2.7
Tested up to:      4.3.1
Stable tag:        4.3.1
Version:           1.2.4

When using qTranslete with Yoast SEO plugin it outputs all languanges in 
title and meta description. This plugin fix this. Only current languange will be outputed. It runs filter that wraps $title and $metadesc into __(). I acctualy sugested to Joost to do this in his plugin (adding only 2 x 4 chars to file "class-frontend.php" at specific lines), but he replied: "I won't support qTranslate, sorry. It abuses the translation API in ways that breaks other stuff." Since it does not break stuff i made this extremly simple plugin.

== Description ==

When using qTranslete or qTranslateX with Yoast SEO plugim it outputs all languanges in title. This plugin fix this. Only current languange will be outputed. It runs filter that wraps $title into __() and fixes Yoast SEO plugin that outputs all languanges at once in Title. I acctualy sugested to Joost to do this in his plugin (adding only 4 chars to file "class-frontend.php" at specific line), but he replied: "I won’t support qTranslate, sorry. It abuses the translation API in ways that breaks other stuff." Since it does not break stuff i made this extreemly simple plugin.

== Installation ==

Upload, Activate

== Screenshots ==

No need...

== Changelog ==

= 1.0 =
* Initial release
= 1.1 = Readme Fix
= 1.2 = Added filter for meta Description (Thanks to ProX666)
= 1.2.1 = Readme and description fix
= 1.2.2 = Name changed according to new plugins naming guidelines. (Thanks to Pippin Williamson)
= 1.2.3 = Added function prefix fysq_ (Thanks to megamurmulis)
= 1.2.4 = deleted old file grom repo....