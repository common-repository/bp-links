<?php
/*
Plugin Name: BP Links+
Plugin URI: http://www.brianpiltin.com/development/bp-links-wordpress-widget/
Description: A sidebar widget that adds functionality to the basic links widget by allowing users to create a special links category for admins which will only show up when an administrator is logged on. Optionally allows for invisible or private links to also be shown for administrators.
Author: Brian Piltin
Version: 1.1.0
Author URI: http://brianpiltin.com/

    I am the owner of the copyright of this work and I reserve no rights to it. You  can modify it, copy it, distribute it, and even take credit for it at will... God bless you.

    This is a WordPress plugin and widget (http://wordpress.org) 
	
*/

function widget_bp_linksplus($args) {

	global $wpdb;
	
	extract($args, EXTR_SKIP);

	$options = get_option("widget_bp_linksplus");
	$bp_show_private = $options['show_private'] ? '1' : '0';
	$bp_hide_invisible = !$bp_show_private;
	
  	if (current_user_can('level_8')) {
		$before_widget = preg_replace('/id="[^"]*"/','id="%id"', $before_widget);
		echo wp_list_bookmarks(apply_filters('widget_links_args', array(
			'title_before' => $before_title, 'title_after' => $after_title,
			'category_before' => $before_widget, 'category_after' => $after_widget,
			'show_images' => true, 'class' => 'linkcat widget', 
			'hide_invisible' => $bp_hide_invisible, 'show_private' => $bp_show_private
		)));
	} else {
	
		// Seperate out all of the link categories that begin with "Admin or admin" and create a list of unique link category ids.
		$links_array = get_bookmarks();
		$unique_link_categories = array();
		
		foreach ($links_array as $link) {
		
			$link_categories = wp_get_object_terms($link->link_id, 'link_category', 'fields=all');
			
			foreach ($link_categories as $link_category) {
			
				if (!preg_match('/admin+/', strtolower($link_category->name ))) {
				
					// Add the category ID as one of our categorys if it's not already in the list of IDs.
					if (!in_array($link_category->term_id, $unique_link_categories)) {
						array_push($unique_link_categories, $link_category->term_id);
						$category_param .= $link_category->term_id . ',';
					}
				}
			}
		}
	
		$before_widget = preg_replace('/id="[^"]*"/','id="%id"', $before_widget);
		echo wp_list_bookmarks(apply_filters('widget_links_args', array(
				'title_before' => $before_title, 'title_after' => $after_title,
				'category_before' => $before_widget, 'category_after' => $after_widget,
				'show_images' => true, 'class' => 'linkcat widget', 'category' => $category_param
		)));
	}
}

function bp_linksplus_control() 
{
	$options = $new_options = get_option("widget_bp_linksplus");
	if ( !is_array($options) ) 
		$options = array( 'show_private' => 0 );
		
	if ( $_POST['bp-linksplus-options-submitted'] )
	{
		$options['show_private'] = $_POST['bp-linksplus-show_private'];
		
		update_option("widget_bp_linksplus", $options);
	}
		
	$bp_show_private = $options['show_private'] ? 'checked="checked"' : '';
	
	echo '<p>
		<label for="bp-linksplus-show_private">Show Private Links: </label>
		<input class="checkbox" type="checkbox" ' . $bp_show_private . ' id="bp-linksplus-show_private" name="bp-linksplus-show_private" value="1" />
		<input type="hidden" id="bp-linksplus-options-submitted" name="bp-linksplus-options-submitted" value="1" />
	</p>';
}

function bp_linksplus_init()
{
	register_sidebar_widget(__('BP Links+'), 'widget_bp_linksplus');   
	register_widget_control(   'BP Links+', 'bp_linksplus_control', 300, 200 );  
}

add_action("plugins_loaded", "bp_linksplus_init");
?>