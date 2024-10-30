jQuery(document).ready(function(){

	// scroll egin orduko irudiak kargatu
	jQuery(window).scroll(function(){
		imageload();
	});

	imageload();
});

function imageload()
{
	var scrollTop = jQuery(window).scrollTop();
	var scrollBottom = scrollTop + jQuery(window).height();
	
	jQuery("img[src-data]").each(function(){
		var position = jQuery(this).offset();

		// bistan badago erakutsi
		if( position.top > scrollTop && position.top < scrollBottom )
		{
			var src = jQuery(this).attr("src-data");
			jQuery(this).removeAttr("src-data");
			
			jQuery(this).hide();
			jQuery(this).attr("src", src);
			
			jQuery(this).fadeIn("slow");
		}

	});
}