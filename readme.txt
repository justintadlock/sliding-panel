=== Sliding Panel ===
Contributors: greenshady
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=3687060
Tags: widget, jquery, javascript
Requires at least: 2.8
Tested up to: 2.8
Stable tag: 0.1.0

Adds a jQuery-based, fully-widgetized sliding panel to your WordPress-powered site.

== Description ==

The *Sliding Panel* plugin adds a panel that opens and closes to the top of your WordPress-powered blog. If you're in need of an area to house more content yet not get in the way, this is the ideal plugin.

The plugin is built off the wonderful jQuery library and is fully widgetized, so you can add any content you want. If you want a login form. Add it. If you want welcome text. No problem. Category list? You're covered.

**This plugin is for WordPress 2.8+ only.**

**Features**

* Uses widgets, so you can add pretty much anything.
* Uses the WordPress-packaged jQuery.
* Will auto-insert itself into the <a href="http://themehybrid.com/themes/hybrid" title="Hybrid WordPress theme framework">Hybrid</a>, <a href="http://themeshaper.com/thematic" title="Thematic WordPress theme">Thematic</a>, and Prodigy WordPress themes.
* Easy style-override system.

Full instructions for use can be found in the plugin's `readme.html` file, which is included with the plugin download.

== Installation ==

1. Upload `sliding-panel.zip` to the `/wp-content/plugins/` directory.
2. Activate the plugin through the *Plugins* menu in WordPress.
3. Add widgets to the *Sliding Panel* widget area from the *Widgets* panel.

More detailed instructions can be found in the plugin's `readme.html` file.

== Frequently Asked Questions ==

= Why create this plugin? =

I added a sliding panel to my site at <a href="http://themehybrid.com" title="Theme Hybrid">Theme Hybrid</a>.  After numerous requests for the code, I thought it'd be best to package it up as a plugin and share with the community.

= What does this plugin do, exactly? =

It adds a panel that opens and closes at the top of the site.  This allows users to easily add additional information without crowding the rest of their theme.

= How do I use it? =

If you're using the <a href="http://themehybrid.com/themes/hybrid" title="Hybrid WordPress theme framework">Hybrid</a>, <a href="http://themeshaper.com/thematic" title="Thematic WordPress theme">Thematic</a>, or Prodigy WordPress theme, you only need to add widgets to the *Sliding Panel* widget area.

If not using one of those themes, you need to add this code after the opening `<body>` tag in your theme's `header.php` file:

`
<?php if ( function_exists( 'get_sliding_panel' ) ) get_sliding_panel(); ?>
`

Full instructions are located in the plugin's `readme.html` file.

== Screenshots ==

1. Sliding panel in its closed state.
2. Sliding pane in its open state.

== Changelog ==

**Version 0.1**

* Plugin launch.  Everything's new!