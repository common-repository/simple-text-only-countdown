=== Simple Text Only Countdown ===
Contributors: deuts
Donate link: http://chesshive.com/donate/
Tags: countdown, php, text-only, simple
Requires at least: 3.0
Tested up to: 4.9.8
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Stable tag: 1.2.0

A simple countdown shortcode plugin that displays just the text. No flash nor javascript for live timer effect, nor styles, just plain text. Perfect for in-line text-based countdown timer.

== Description ==

A simple countdown shortcode plugin that displays just the text. No flash nor javascript for live timer effect, nor styles, just plain text. Perfect for in-line text-based countdown timer. Visitors need to refresh the browsers in order to update the countdown. 

= USAGE =
When you're done installing the plugin, just put a `[cntdwn todate="9 January 2019 08:00" timeoff="0"]` shortcode into your content. Make sure to change the `todate` parameter to your target date, and `timeoff` to the GMT offset (in hours) of the time indicated in the `todate`.

Anything that can be parsed by the `strtotime` php function can be used in the `todate` parameter. But in order to avoid confusion, it's better to stick with the format as the sample above.

See the Frequently Asked Questions for the complete parameters available and their default values.

== Installation ==

1. Upload the `simple-text-only-countdown` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in your WordPress installation.

== Frequently Asked Questions ==

= How to use this plugin? =
* When you're done installing the plugin, just put a `[cntdwn todate="9 January 2019 08:00" timeoff="0"]` shortcode into your content. Make sure to change the `todate` parameter to your target date, and `timeoff` to the GMT offset (in hours) of the time indicated in the `todate`.

= What are the other parameters available? =
The complete parameters that you may use in the shortcode, and their default values, are:

* `todate` -> target date to where we're counting down to;
* `timeoff` -> GMT offset time. Default is 0 or UTC;
* `sep` -> the separator to use in between days, hours, etc. Default is `', '`. Feel free to change it to `<br />` or otherwise.
* `showhours` -> Show number of hours remaining? Default is `1` for true. The `todate` may be too far in the future that render hours irrelevant.
* `showmins` -> Show number of minutes remaining? Default is `1` for true. See `showhours` above.
* `showsecs` -> Show number of seconds remaining? Default is `0` for false. Seconds may only be relevant for countdowns with live timers.
* `pretext` -> The text before the countdown text. Default is `'The event starts in '`;
* `posttext` -> The text following the countdown text. Default is `'.'`;
* `donemsg` -> The text message when the countdown is done. Default is `'The countdown is done.'`.

= What's the standard format for the `todate` parameter? =
* Anything that can be parsed by the `strtotime` php function can be used in the `todate` parameter. But in order to avoid confusion, it's better to stick with the format as the sample above.

= How to put the countdown in my theme files? =
* The do_shortcode() can do that for you.

= Is there a widget available for the sidebar? =
* No. But [this article](http://www.wpbeginner.com/wp-tutorials/how-to-use-shortcodes-in-your-wordpress-sidebar-widgets/) can show you how to use a shortcode in the sidebar widget.

= Is there a working demo for this plugin? =
* If the target date hasn't come yet, you might see a working demo of the plugin at [ChessHive](http://chesshive.com/working-demo-of-simple-text-only-countdown-plugin/).

== Screenshots ==
If the target date hasn't come yet, you might see a working demo of the plugin at [ChessHive](http://chesshive.com/working-demo-of-simple-text-only-countdown-plugin/).

== Changelog ==

= 1.2.0 =
* Bug fix to get rid of "A non well formed numeric value encountered" error.
* Updated descriptions.

= 1.1.0 =
* Changed function name to make it more unique and avoid conflicting with other functions.

= 1.0 =
* Original version.

== Upgrade Notice ==

= 1.0 =
Upgrade if you're afraid of bugs.