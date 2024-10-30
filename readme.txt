=== Plugin Name ===
Contributors: blpiltin
Donate link: http://brianpiltin.com
Tags: links, bookmarks, admin, administrator, hidden, private, show, hide
Requires at least:
Tested up to: 2.6
Stable tag: 1.1.0

A sidebar widget that allows for a special links/bookmarks category for admins which will 
only show up when an administrator is logged on.

== Description ==

A sidebar widget that adds functionality to the basic links widget by 
allowing users to create a special links category for admins which will 
only show up when an administrator is logged on. Optionally allows for 
invisible or private links to be shown for administrators. Simply 
create a links category that begins with the word "Admin" (case insensitive) 
and any links belonging to that category will only show up when anyone 
having administrator rights is logged on (userlever_8 or above). 

== Installation ==

1. Upload `bp_linksplus.php` to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Under the 'Manage->Link Categories' administration page, create at least one link category that begins with the word 'Admin' (case insensitive). The name can be followed by any other text.
1. Add some links to the new 'admin' category that you'd only want administrators to see. The dashboard is always a good one to start with. Note: Be sure they don't belong to any other categories.
1. Under the 'Design->Widgets' administration page, drag to the sidebar you would like the widget to appear on and click "Save Changes".
1. There is a widget option to allow for the showing/hiding of private or hidden links, by default this is off, but you can turn it on if you would like any administrators to see hidden or private bookmarks.

== Frequently Asked Questions ==

= What is the point of this plugin? =

I developed this plugin because I created a website for my church using Wordpress. I wanted to give the person who is going to administer the website (hopefully it's not me) links to some important administration features and then to hide those links for regular users... that's it in a nutshell. I use it on my personal site as well.

= Do you offer support for this plugin? =

Not really. I don't have much time in the way of enhancing, supporting, or developing these things, but feel free to modify it and distribute it freely. If you make some good changes that can be incorporated into my version then please let me know and you can take over support/development of the plugin.

= Why not release this plugin under the GPL? =

Honestly I have no idea what the GPL entails and I didn't have the patience to read through it, but I wanted to give this away nonetheless. I'm not going to come after anyone for taking this code and doing what they will with it. They can even take credit for it for all I care.

== Screenshots ==

1. Screen shot of links where administrator is logged in (look under "Admin Resources"). These are followed by the ordinary bookmarks (which I named "Resources".)
2. Screen shot of links where no one is logged in, notice only the regular "Resources" bookmarks appear.

== Change History ==

v1.1.0
* Fixed a bug that would cause a crash if links belonged to more than one link category.
* Allowed for the word "admin" to be case insensitive. 

v1.0.0
* Initial release.
