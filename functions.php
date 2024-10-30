<?php 

/**
 * Replace image tags to tag optimized for js.
 * @param string $html
 * @return string
 */
function jil_img_tag_replace( $html ) {
	
	$wpx = plugins_url( 'images/w-px.gif' , __FILE__ );
	
	$htmlend = $html;
	
	if (preg_match_all('/(<img[^>]+>)/', $html, $imgtags)) {
		
		foreach($imgtags[0] as $imgtag) {
			if (preg_match('/src="([^"]+)"/', $imgtag, $src)) {
				
				// generate image tag
				$rep = sprintf('src-data="%s" src="%s"', $src[1], $wpx);
				$img = str_replace($src[0], $rep, $imgtag);
				$img .= sprintf('<noscript>%s</noscript>', $imgtag); 
				
				// replace on content
				$htmlend = str_replace($imgtag, $img, $htmlend);
			}
			
			if (preg_match("/src='([^']+)'/", $imgtag, $src)) {
		
				// generate image tag
				$rep = sprintf('src-data="%s" src="%s"', $src[1], $wpx);
				$img = str_replace($src[0], $rep, $imgtag);
				$img .= sprintf('<noscript>%s</noscript>', $imgtag);
		
				// replace on content
				$htmlend = str_replace($imgtag, $img, $htmlend);
			}
		}
	}
	return $htmlend;
}

/**
 * Add javascripts
 */
function jil_add_scripts()
{
	// jquery kargatu
	wp_enqueue_script('jquery');

	// debug?
	$script_name = (DEBUG_MODE)? 'image-loader.js' : 'image-loader.min.js';

	// scripta erregistratu
	wp_register_script('image-loader', WP_PLUGIN_URL . '/javascript-image-loader/'. $script_name);

	// kargatzeko ilaran jarri
	wp_enqueue_script('image-loader');
}

/**
 * ob for replace html
 */
function jil_ob_start()
{
	ob_start('jil_ob_end');
}

/**
 * ob for replace html
 * @see jil_ob_start
 */
function jil_ob_end($html)
{
	return jil_img_tag_replace($html);
}