=== Term Management Tools ===

Allows you to merge terms, set term parents in bulk, and swap term taxonomies.

== Description ==

If you need to reorganize your tags and categories, this plugin will make it easier for you. It adds two new options to the Bulk Actions dropdown on term management pages:

* Merge - combine two or more terms into one
* Set parent - set the parent for one or more terms (for hierarchical taxonomies)
* Change taxonomy - convert terms from one taxonomy to another

It works with tags, categories and [custom taxonomies](http://codex.wordpress.org/Custom_Taxonomies).

= Usage =

1. Go to `WP-Admin -> Posts -> Categories`.
2. Find the Bulk Actions dropdown.
3. Reorganize away.

== Changelog ==

= 1.0.5 =
* improved taxonomy cache cleaning. props Mustafa Uysal
* added 'term_management_tools_term_changed_taxonomy' action hook. props Daniel Bachhuber
* fixed redirection for taxonomies attached to custom post types. props Thomas Bartels
* added Japanese translation. props mt8

= 1.0.4 =
* preserve term hierarchy when switching taxonomies. props Chris Caller

= 1.0.3 =
* added 'term_management_tools_term_merged' action hook. props Amit Gupta

= 1.0.2 =
* fixed error notices
* added Persian translation

= 1.0.1 =
* added 'Change taxonomy' action

= 1.0.0 =
* initial release
* [more info](http://scribu.net/wordpress/term-management-tools/tmt-1-0.html)

