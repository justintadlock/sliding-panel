=== Sliding Panel ===

Contributors: greenshady
Donate link: http://themehybrid.com/donate
Tags: widget, sidebar, slider, jquery, javascript, html5
Requires at least: 3.6
Tested up to: 3.7
Stable tag: 0.2.0

Adds a responsive sliding panel to the top of your WordPress-powered site.

== Description ==

The Sliding Panel plugin creates a new sidebar for your site that allows you to add widgets.  These widgets appear within a responsive sliding panel at the top of your site on the front end.

### Features

* It's a jQuery-powered sliding panel.  That's a feature in-and-of itself, right?
* Uses widgets, so you can add pretty much anything you can add to any other sidebar.
* Uses the WordPress-packaged jQuery.
* Will automatically display with any correctly-coded theme.
* Supports HTML5 and Schema.org microdata.
* It's responsive, so it'll look good on any device.

### Professional Support

If you need professional plugin support from me, the plugin author, you can access the support forums at [Theme Hybrid](http://themehybrid.com/support), which is a professional WordPress help/support site where I handle support for all my plugins and themes for a community of 40,000+ users (and growing).

### Plugin Development

If you're a theme author, plugin author, or just a code hobbyist, you can follow the development of this plugin on it's [GitHub repository](https://github.com/justintadlock/sliding-panel). 

### Donations

Yes, I do accept donations.  If you want to buy me a beer or whatever, you can do so from my [donations page](http://themehybrid.com/donate).  I appreciate all donations, no matter the size.  Further development of this plugin is not contingent on donations, but they are always a nice incentive.

== Installation ==

1. Unzip the `sliding-panel.zip` folder.
2. Upload the `sliding-panel` folder to your `/wp-content/plugins` directory.
3. In your WordPress admin, head over to the "Plugins" screen.
4. Activate the "Sliding Panel" plugin.
5. Go to your "Widgets" screen in the admin and add widgets to the "Sliding Panel" sidebar.

== Frequently Asked Questions ==

### Why create this plugin?

When I originally launched my theme and plugin site, [Theme Hybrid](http://themehybrid.com), I had a sliding panel at the top of the site (no longer in use this on the site).  After numerous requests for the code, I thought it'd be best to package it up as a plugin and share with the community.

### What does this plugin do, exactly?

The plugin adds a panel that opens and closes at the top of the site.  It creates a new "sidebar" that you can add widgets to, which will fill the sliding panel.

### How do I use it?

After activating the plugin, go to the "Widgets" screen in your WordPress admin.  On that page, there will be a new sidebar called "Sliding Panel".  You can add any widget to that sidebar.

This panel is optimized for displaying three widgets.  You might need to make custom CSS adjustments for any other number of widgets.

### Is it responsive?

Yes, it is responsive.  However, you need to keep in mind that different designs have different breakpoints (the points where the design changes based on screen size).  This plugin's breakpoints are merely based on common desktop, tablet, and phone screen sizes, which may or may not flow well with your theme's design.

### Is it HTML5?

Yes, absolutely.  It uses the most current HTML5 *standard* elements available?

### Does it support microdata?

Yes, the plugin supports [Schema.org's](http://schema.org) microdata vocabulary.  Of course, it's up to your theme to fully support microdata.

### Does it work with the toolbar (admin bar)?

Yes, this plugin has been tested with the default WordPress toolbar both on and off.  For [MP6 plugin](http://wordpress.org/plugins/mp6) users, I've also tested with its toolbar design.

### How do I change the "Open" and "Close" labels?

Under the "Appearance" menu in the WordPress admin, look for the "Sliding Panel" menu item.  Clicking on that will take you to the settings page for the plugin and allow you to change the labels.

### Why does it look weird with my theme?

It's impossible for a plugin like this to be designed to appear correctly with every theme on the planet.  I've done some testing with various themes to make the design work to a degree.  However, you might need to write some custom CSS in your theme (or child theme) to make it look better.

### I can't click my theme's menu links at the very top of the page. How do I fix that?

This is because the sliding panel is technically sitting on top of your menu.  Even if you can see the links but not click them, the panel is still there.  The only way to really fix this is to adjust the CSS in your theme to move your theme's menu down.

Keep in mind that something like a sliding panel at the top of the page simply won't be a good feature with every theme on every site.  Something like this needs to really fit in with your design to be worth using on your site.

### When I click open/close, nothing happens. What gives?

99.9% of the time, this is because of a JavaScript conflict.  Often, it's because your theme or another plugin is doing something incorrectly.  There's not really anything I can do to "fix" that.  You'll need to figure out the theme/plugin causing the conflict and deactivate it.

### The sliding panel doesn't appear on my site. Where is it?

Did you add widgets (as described above) to the "Sliding Panel" sidebar.  You'll need to do that.  If you did, there's other potential issues as follows.

#### Your theme doesn't use the wp_footer hook.

Most often, this will be the problem.  Your theme's `footer.php` should look like this at the very bottom of the file:

		<?php wp_footer(); ?>
	</body>
	</html>

If you don't see that `wp_footer` code, you'll either need to add it or have your theme author add it.

#### Your theme has conflicting CSS rules.

Sometimes, themes just overwrite a lot of stuff globally.  You can talk to your theme author about it or stop by my support forums and see if we can figure it out together.

### How do I add custom styles?

All you need to do is open your theme's `style.css` file and add them in (I recommend  at the bottom of the file).  Here's some basic CSS to get you started.

	/* Container */
	#sidebar-sliding-panel {}

		/* Inside wrapper. */
		.sp-wrap {}
	
			/* Container for widgets. */
			.sp-content {}
	
				/* Inside wrapper for widgets. */
				.sp-content-wrap {}
	
					/* Individual widgets. */
					.sp-content .widget {}
					.sp-content .widget-title {}
	
			/* Toggle button. */
			.sp-toggle {}
	
				/* Toggle button link. */
				.sp-toggle a {}

### Are there plans for more features?

Yes.  One thing I'd like to do in the next major version is to allow you to add custom colors and other design-related features, which should be easier than mucking about in CSS code.

But, I'd really love to hear from you.  What features would you like to see in the next version?

== Upgrade Notice ==

As of version 0.2.0, this plugin will automatically display with all themes. Users of older versions should remove the `get_sliding_panel()` function from their themes.

== Screenshots ==

1. Sliding panel in its closed state.
2. Sliding pane in its open state.

== Changelog ==

### Version 0.2.0

* Recoded the entire plugin from the ground up.
* Plugin now displays with all correctly-coded themes.
* Added an admin settings page to customize the open/close labels.

### Version 0.1.0

* Plugin launch.  Everything's new!