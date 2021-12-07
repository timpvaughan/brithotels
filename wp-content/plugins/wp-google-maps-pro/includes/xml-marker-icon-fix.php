<?php

namespace WPGMZA;

function xml_marker_icon_fix($document)
{
	global $wpdb;
	global $wpgmza_tblname_categories;
	
	$iconsByCategoryID = array();
	
	foreach($wpdb->get_results("SELECT id, category_icon FROM $wpgmza_tblname_categories") as $obj)
		$iconsByCategoryID[$obj->id] = $obj->category_icon;
	
	$markers = $document->querySelectorAll('marker');
	
	foreach($markers as $node)
	{
		$icon		= $node->querySelector('icon');
		
		if(preg_match('/[^\s]/', $icon->textContent))
			continue;	// The marker has it's own icon
		
		$category	= $node->querySelector('category');
		
		if(!preg_match('/\d+/', $category->textContent, $m))
			continue;	// No categories present on this marker
		
		$categories = $m;
		
		foreach($categories as $id)
		{
			if(empty($iconsByCategoryID[$id]))
				continue;	// No icon set for this category
			
			$icon->appendText($iconsByCategoryID[$id]);
			break;
		}
	}
	
	return $document;
}

add_filter('wpgmza_xml_cache_generated', 'WPGMZA\\xml_marker_icon_fix');
