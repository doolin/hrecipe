=== hRecipe ===
Contributors: doolin
Tags: hrecipe, editor, microformat
Requires at least: 3.0
Tested up to: 3.1
Stable tag: 0.5.4.5

This is a plugin to allow the easy entry of microformat content for
recipes (i.e. the hRecipe microformat) in WordPress pages and
posts. 


== Description ==


hRecipe gives you fast, efficient recipe formatting...
with an SEO advantage.  Your recipes look good,
and search engines will like them better too.

= Supporters =

Each of the following people have donated to help hRecipe to continue development:

* Susan Voisin http://http://sbvdesigns.com/ and http://blog.fatfreevegan.com/
* Anon: http://transcriptionconnections.com/
* Anne Bender: http://annebender.com/
* Branson Sparks: http://bransonsparks.com/
* Lizzy R: http://mpdcooks.com/

Many thanks!

= Translators = 

This is a partial list, more coming soon:

* Roberto Koci http://robertokoci.com/ for the Hungarian translation.
* Rene from WP Web Shop http://wpwebshop.com/ sent in a native Dutch translation.
* Russian translation courtesy of Fat Cow web hosting: http://www.fatcow.com/
* Jean-Philippe Daigle sent in the French translation http://friendfeed.com/jpdaigle
* Danish translation coming from http://www.kokkekniven.com/ Kristian Petersen
* Thanks to Carsten Peters http://www.rodrigues-peters.com/ for Brazilian Portuguese and German translations.

I know there are more. If you weren't listed, contact me, I'll add you in.

= Contributors = 

* Anu Kumar of the The Spicy Yatra http://thespiceyatra.com sent some options coding for Vietnamese and Marathi cuisine.
*Javascript for post boxes fixed, courtesy of MicroMedia Websites http://micromediawebsites.com



= How hRecipe benefits you =

The magic happens using "microformats," technology 
invisible to you, but friendly to search engines.

The hRecipe plugin shows a popup windows with text fields and text
areas that allow the author to conveniently enter the various parts of
the hRecipe microformat, then inserts a formatted recipe into the page
or post. The formatting has the hRecipe class specifications.

There is a growing list of options to control how your recipes 
are displayed:

 * Ingredients lists formatting can be either by number or by bullet point.
 * The background color of the formatted recipe can be specified to match or offset the background color of the enclosing web page.
 * The display text for many sections of recipes may be specified.
 * International support is growing rapidly.
 

== Installation ==

1. Unzip the plugin into your wp-content/plugins/ directory. It should
automatically create an hrecipe/ subdirectory.

2. In your WordPress admin page, go to the Plugins section and
Activate the "hRecipe" plugin.

3. When you go to "Write Post" or "Write Page", click on the star logo
to pop-up a simple form.  (Or hRecipe button for text formatting)

4. Fill in the fields of the form. 

5. Click Insert and the contents of the fields will be inserted into
the page or post you were composing, but marked up using the hRecipe
microformat.


== Changelog ==

= 0.5.4.6 =
* Updated from rss to simplepie feed reader
* Fixed index error associated with null index in GET for donation support
* Updated css to match current WordPress media popup for tabs, much cleaner now
* Synchronised bottom button navigation with sidemenu tabs

= 0.5.4.5 =
* Scripting cleanup including s/$/jQuery/ and enqueueing script with variables now localized.

= 0.5.4.4 =
* Changed Plugin URI to point to http://hrecipe.com/
* Spiffy new icon for visual editor
* Javascript cleanup, removed php calls for future script enqueue.

= 0.5.4.3 = 
* Fixed a broken link for http://annebender.com

= 0.5.4.2 =
* Donation from http://transcriptionconnection.com/
* Removed redundant Javascript code for recip.ly.


= 0.5.4.1 =
* Added icons for various RSS feeds in the admin interface.
* Started http://recip.ly integration.

= 0.5.4 = 
* hRecipe formatting now displays properly in Google Rich Snippets.  Thanks to Michael Allen Smith for investigating ad proposing a fix. (Credits coming.)

= 0.5.3.4 = 
* Reworked the administration interface, postbox toggled and dragging now work
* Added news feeds, thanks yoast.com!

= 0.5.3.3 = 
* Skipped.


= 0.5.3.2 =
* Forgot, will need to look at revision history.

= 0.5.3.1 = 
* Fixed path typo


= 0.5.3 =
* Restructured WordPress options table handling.
* Fixed "Tested up to:" tag.

= 0.5.2 = 
* Added Italian translation courtesy of Manuel Seschi (Scrumptious: http://www.ghiottone.org/)
* More cleanups.

= 0.5.1.2 = 
* Removed hrecipeinput.php and hrecipe_options.php, this code has been moved to view.


= 0.5.1.1
* Fixed Stable tag for release.

= 0.5.1 =
* Integrated inheritance from plugin base class using Redirection code.
* Added Paypal donate button.

= 0.5.0.2 = 
* Added options page screen icon.

= 0.5.0.1 = 
* Extensive updates for readme.txt
* All new screenshots
* Swedish translation from no1troca (no link given).

= 0.5 =
* MicroMedia Websites  http://micromediawebsites.com (Exceptional Website Design Services) rewrote the CSS and Javascript using JQuery to support a new editing interface.
* Updated hRecipe web pages.
* Added more help text in the options page.

= 0.4.4 =
* Added options for Variations.
* Added a load of text formatting options
* Separated style, structure and labeling.
* Javascript for post boxes fixed, courtesy of http://micromediawebsites.com


= 0.4.3.3 = 
* Added Quick Notes section.

= 0.4.3.2 =
* Changed from image stars to html char stars.  These can be styled with css.
* Commented out FirePHP code until it's bracketed for conditional execution.

= 0.4.3.1 =
* Fixed a php variable bug.

= 0.4.3 = 
* Cleaned up css handling, more modern now.
* Added Settings link to plugin entry.

= 0.4.2.2 = 
* Default enclosure is now a <div> element rather than a <fieldset> element.  User option for choosing is implemented.  Text for "Instructions" is now a user option.
* Anu Kumar of the (The Spicy Yatra: http://thespiceyatra.com) sent some options coding for Vietnamese and Marathi cuisine.
* Cleanup on the hRecipe options page.  Split structure and styling into different sections.
* Started adding help text toggles on admin page.  
* Russian translation courtesy of (Fat Cow web hosting: http://www.fatcow.com).

= 0.4.2.0 =
* Moved options html to hrecipe_otions.php to clean up base file.
* Moved Javascript formatting code to it's own file.
* Added activation/deactivation hooks, moved initialization calls.
* Implemented hrecipe php class.
* Added author byline field


= 0.4.1.1 =
* New Changelog system implemented in readme.txt


= 0.4.1.0 =
* Internationalization (i18n) implemented
* Brazilian Portuguese (Thanks to Carsten Peters: http://www.rodrigues-peters.com/)
* German (Thanks to Carsten Peters: http://www.rodrigues-peters.com/)
* French (Thanks to Jean-Philippe Daigle: http://friendfeed.com/jpdaigle)

= 0.4 =
* Refactored formatting code.
* hRecipe Link Love added as option on admin page.
* Copyright field added to options

= 0.3.4 = 
* Worked out new parameter passing scheme in backend
* added Yield as "Number of Servings"

= 0.3.3 =
* Fixed css path issue, added cooking time.

= 0.3.2 =
* admin footer credit deleted, too obnoxious
* See plugin home page

= 0.3.1 = 
* Ingredients list may be formatted using bullets or numnbers 
* diet type (vegetarian, vegan, etc) added
* admin footer credit added.

= 0.3 =
* Added "Meal type" field 
* fixed some problems in the css file.

= 0.2.4.1 =
* Fixed path issue for rating stars.

= 0.2.4 =
Worked out procedure for moving stable into tagged branch instead of trunk.

= 0.2 =
* Fixed recipe label in editor. 
* Changed enclosing block to fieldset element. 
* Added "Culinary Tradition" selection.

= 0.1 = 
* Initial release


== Frequently Asked Questions ==


= Why would I want to use hRecipe? =


When your recipes are displayed on your blog using the hRecipe
microformat, it makes it very easy for search engines to find and do
special things with them. 


= What is a microformat? =

A microformat is a way of using CSS styles to add 
semantic information to web pages.  The style not only directs
how the information is displayed, but what kind of informatiin
is displayed.

There are different microformats for different types of
information. This plugin uses the hRecipe microformat for recipe type
information. For more information, see to <a
href="http://microformats.org">the main microformats site</a>.




== Screenshots ==


1. Blue Corn Pozole recipe displayed with hRecipe formatting in post.
2. Adding general information about your recipe.
3. Listing the ingredients and explaining how to prepare your recipe.
4. Helpful information for your readers.
5. Formatting support options to control how your recipe is displayed.
6. Control how your recipe is structured.

== You can help! ==

There's lots of ways to help make hRecipe exactly what 
you need for beautiful, fast, accurate recipe display 
on your WordPress blog. Contributing to open source 
software is easy and fun.  Check out these 
[contributors to hRecipe](http://website-in-a-weekend.net/hrecipe/hrecipe-contributors/).


= Request features =

Do you need something hRecipe doesn't have?  
[Request a feature](http://website-in-a-weekend.net/hrecipe/hrecipe-feature-requests).

= Report bugs =

Find a bug?  
[Report it here](http://website-in-a-weekend.net/hrecipe/hrecipe-bugs/).


= Help translate =

hRecipe has been translated into several languages, 
including Spanish, Danish, French, Portuguese and others. 
[Help translate hRecipe into your language](http://website-in-a-weekend.net/hrecipe/hrecipe-translation/). 

= Contribute design =

Don't like the current layout and styling?  

No problem.  

Make the changes you need into hrecipe.css
and send it in.

We'll code your changes as options for display, 
and distribute it along with credit (links!) for your 
contribution.  Seriously, a selection of styles would 
really rock!


= Contribute code =

There is A LOT that could done with the hRecipe plugin.  The surface has barely been scratched.  If you have a particular itch you want scratched, say something, we'll see about making it happen.

= Coding (and styling) review = 

hRecipe would really benefit from a code review, especially from a 
PHP/WordPress expert.   The primary concern right now is ensuring that 
the Javascript and CSS are handled in an optimal manner.  Contact the 
author if you would to like to help by reading through the code.




== Contributors ==
* no1troca for the new Swedish translation.
* [MicroMedia Websites](http://micromediawebsites.com)  - Exceptional Website Design Services - fixed the javascript for post boxes on the options page. and rewrote the CSS and Javascript using JQuery to support a new editing interface.
* Russian translation courtesy of [Fat Cow Web Hosting](http://www.fatcow.com).
* Anu Kumar of [The Spicy Yatra](http://thespiceyatra.com) sent some options coding for Vietnamese and Marathi cuisine.
* [Jean-Philippe Daigle](http://friendfeed.com/jpdaigle) sent in the French translation.
* Danish translation from [Kristian Petersen](http://www.kokkekniven.com/).
* Thanks to Carsten Peters http://www.rodrigues-peters.com/ for Brazilian Portuguese and German translations.


Should you be on this list?  Contact me and let me know.


== More info ==

* For more info, version history, etc. check out the page on Website In A Weekend about the [hRecipe Plugin for WordPress](http://website-in-a-weekend.net/hrecipe/).


