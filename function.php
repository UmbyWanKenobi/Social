//


function Social_sharing_buttons($content) {
	
	global $post;
		if(is_singular() || is_home()){
	// Set address for feedburner
		$Social_Name = "IF YOU SERVE";
		
	// Get current page URI 
		$Social_URI = urlencode(get_permalink());
 
	// Get current page title
		$Social_Title = str_replace( ' ', '%20', get_the_title());
		
	// Get Post Thumbnail 
		$Social_Thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	 
	// Construct sharing URI 
		$twitter_URI  = '//twitter.com/intent/tweet?text='.$Social_Title.'&amp;url='.$Social_URI.'&amp;via=IF YOU WANT';
		$facebook_URI = '//www.facebook.com/sharer/sharer.php?u='.$Social_URI;
		$google_URI   = '//plus.google.com/share?url='.$Social_URI;
		$buffer_URI   = '//bufferapp.com/add?url='.$Social_URI.'&amp;text='.$Social_Title;
		$whatsapp_URI = '//whatsapp://send?text='.$Social_Title . ' ' . $Social_URI;
		$linkedIn_URI = '//www.linkedin.com/shareArticle?mini=true&url='.$Social_URI.'&amp;title='.$Social_Title;
 		$tumblr_URI   = '//www.tumblr.com/share?canonicalurl='.$Social_URI;
		$reddit_URI   = '//reddit.com/submit?_URI='.$Social_URI.'&amp;text='.$Social_Title;
		$pinterest_URI = '//pinterest.com/pin/create/button/?url='.$Social_URI.'&amp;media='.$Social_Thumbnail[0].'&amp;description='.$Social_Title;
		$feedburner_URI = '//feeds.feedburner.com/'.$Social_Name;


	// Add sharing button at the end of page/page content
		$content .= '<div id="social">';
		$content .= '<h3><strong>Condividi:<strong></h3> 
			<ul id="social">
				<li><a href="'.$twitter_URI.'" id="twitter" rel="me" title="Twitter" target="_blank">Twitter</a></li>
				<li><a href="'.$facebook_URI.'" id="facebook" rel="me" title="Faceboook" target="_blank">Facebook</a></li>
				<li><a href="'.$google_URI.'" id="googleplus" rel="me" title="Google+" target="_blank">Google+</a></li>
				<li><a href="'.$tumblr_URI.'" id="tumblr" rel="me" title="Tumblr" target="_blank">Tumblr</a></li>
				<li><a href="'.$linkedIn_URI.'" id="linkedin" rel="me" title="Linkedin" target="_blank">Linkedin</a></li>
				<li><a href="'.$pinterest_URI.'" id="pinterest" rel="me" title="Pinterest" target="_blank">Pinterest</a></li>
				<li><a href="'.$whatsapp_URI.'" id="whatsapp" rel="me" title="Whatsapp" target="_blank">Whatsapp</a></li>
				<li><a href="'.$reddit_URI.'" id="reddit" rel="me" title="Reddit" target="_blank">Reddit</a></li>
				<li><a href="'.$feedburner_URI.'" id="rss" rel="me" title="RSS feed" target="_blank">RSS</a></li>
				<li><a href="javascript:window.print()" id="print" rel="me" title="Print this page">Print This Page</a></li>
			</ul>
		';
		$content .= '</div>';
			return $content;
		}else{
	// if not a post/page then don't include sharing button
		return $content;
		}
	};
add_shortcode( 'social', 'Social_sharing_buttons' );
