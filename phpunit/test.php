<?php

define('WP_USE_THEMES', false);

include dirname(__FILE__) . '/../../../../wp-load.php';
include_once dirname(__FILE__) . '/../functions.php';

class test extends PHPUnit_Framework_TestCase
{
	function test_jil_img_tag_replace() {
		
		$html = '<html><img src="url.jpg"></html>';
		$e = '<html><img src-data="url.jpg" src="http://localhost/wordpress/wp-content/plugins/javascript-image-loader/images/w-px.gif"><noscript><img src="url.jpg"></noscript></html>';
		$r = jil_img_tag_replace($html);
		$this->assertEquals($e, $r);
		
		$html = '<html><img src="url.jpg"><img src="url2.jpg"><img src="url3.jpg"></html>';
		$e = '<html><img src-data="url.jpg" src="http://localhost/wordpress/wp-content/plugins/javascript-image-loader/images/w-px.gif"><noscript><img src="url.jpg"></noscript><img src-data="url2.jpg" src="http://localhost/wordpress/wp-content/plugins/javascript-image-loader/images/w-px.gif"><noscript><img src="url2.jpg"></noscript><img src-data="url3.jpg" src="http://localhost/wordpress/wp-content/plugins/javascript-image-loader/images/w-px.gif"><noscript><img src="url3.jpg"></noscript></html>';
		$r = jil_img_tag_replace($html);
		$this->assertEquals($e, $r);
		
		$html = "<html><img src='url.jpg'></html>";
		$e = '<html><img src-data="url.jpg" src="http://localhost/wordpress/wp-content/plugins/javascript-image-loader/images/w-px.gif"><noscript><img src=\'url.jpg\'></noscript></html>';
		$r = jil_img_tag_replace($html);
		$this->assertEquals($e, $r);
		
		$html = '<html><img src="url.jpg" other="ddd"></html>';
		$e = '<html><img src-data="url.jpg" src="http://localhost/wordpress/wp-content/plugins/javascript-image-loader/images/w-px.gif" other="ddd"><noscript><img src="url.jpg" other="ddd"></noscript></html>';
		$r = jil_img_tag_replace($html);
		$this->assertEquals($e, $r);
	}
}