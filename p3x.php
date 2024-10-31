<?php
/*
Plugin Name: p3x formation web
Plugin URI: https://www.p3x.fr/formation-internet
Description: Affichez les dernières formations Web sur votre site Internet (Ecoles, universités, centre de formation, etc...).
Author: p3x
Version: 1.0
Author URI: https://www.p3x.fr
*/

add_shortcode('p3x_formation', 'p3x_formation');

function p3x_formation()
{
	$html = '<h2>Formations du Web</h2>
			<ul>';
	
	$xmlfile = 'https://www.p3x.fr/formation.xml';
	$xml = simplexml_load_file($xmlfile);
	
	foreach($xml->channel->item as $item)
	{
		$html .= '<li><a href="'.$item->link.'" target="_blank">'.$item->title.'</a></li>';
	}
	
	$html .= '</ul>';
	
	return $html;
}