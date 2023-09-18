<?php
/*-----------------------------------------------------------------------------------*/
/*	Default Options
/*-----------------------------------------------------------------------------------*/


// Number of posts array
function magee_shortcodes_range ( $range, $all = true, $default = false, $range_start = 1 ) {
	if( $all ) {
		$number_of_posts['-1'] = __('All', 'magee-shortcodes-pro');
	}

	if( $default ) {
		$number_of_posts[''] = __('Default', 'magee-shortcodes-pro');
	}

	foreach( range( $range_start, $range ) as $number ) {
		$number_of_posts[$number] = $number;
	}

	return $number_of_posts;
}

//menus
function magee_shortcode_menus($name){
    $menus[''] = __('Default', 'magee-shortcodes-pro');
    if( $name !== ''){
	
	$menu = wp_get_nav_menus();
	    
		foreach ( $menu as $val){
		if(isset($val->name)){
			$menus[$val->name] = $val->name;
			}
		}	
		if(isset( $menus)){	
		return $menus;	
		}
    }

}
//widget list
function magee_get_sidebars() {
	global $wp_registered_sidebars;
    
	$sidebars = array();
    $sidebars[''] = __('Default', 'magee-shortcodes-pro'); 
	foreach( $wp_registered_sidebars as $sidebar_id => $sidebar ) {
		$sidebars[$sidebar_id] = $sidebar['name'];
	}
   
   return $sidebars;
}


global $magee_shortcodes,$magee_sliders,$magee_portfolios_cats;
$magee_sliders = Magee_Core::sliders_meta();
$googleFontArray =  Magee_Core::magee_countdowns_get_google_fonts();
$google_fonts    = array_merge(array('' => __( '-- None --', 'magee-shortcodes-pro' ) ), $googleFontArray['magee_of_family']);

$choices = array( 'yes' => __('Yes', 'magee-shortcodes-pro' ), 'no' => __('No', 'magee-shortcodes-pro')  );
$reverse_choices = array( 'no' => __('No', 'magee-shortcodes-pro'), 'yes' => __('Yes', 'magee-shortcodes-pro' ) );
$choices_with_default = array( '' => __('Default', 'magee-shortcodes-pro'), 'yes' => __('Yes', 'magee-shortcodes-pro' ), 'no' => __('No', 'magee-shortcodes-pro') );
$reverse_choices_with_default = array( '' => __('Default', 'magee-shortcodes-pro'), 'no' => __('No', 'magee-shortcodes-pro'), 'yes' => __('Yes', 'magee-shortcodes-pro' ) );
$leftright = array( 'left' => __('Left','magee-shortcodes-pro'), 'right' => __( 'Right', 'magee-shortcodes-pro' ) );
$textalign = array( 'left' => __( 'Left', 'magee-shortcodes-pro' ), 'center' => __( 'Center', 'magee-shortcodes-pro' ), 'right' => __( 'Right', 'magee-shortcodes-pro' ) );
$opacity = array('0' => '0', '0.1' => '0.1', '0.2' => '0.2', '0.3' => '0.3', '0.4' => '0.4', '0.5' => '0.5', '0.6' => '0.6', '0.7' => '0.7', '0.8' => '0.8', '0.9' => '0.9', '1' => '1');
$dec_numbers = array( '0.1' => '0.1', '0.2' => '0.2', '0.3' => '0.3', '0.4' => '0.4', '0.5' => '0.5', '0.6' => '0.6', '0.7' => '0.7', '0.8' => '0.8', '0.9' => '0.9', '1' => '1', '2' => '2', '2.5' => '2.5', '3' => '3' );
$animation_type = array('' => 'None',"bounce" => "bounce", "flash" => "flash", "pulse" => "pulse", "rubberBand" => "rubberBand", "shake" => "shake", "swing" => "swing", "tada" => "tada", "wobble" => "wobble", "bounceIn" => "bounceIn", "bounceInDown" => "bounceInDown", "bounceInLeft" => "bounceInLeft", "bounceInRight" => "bounceInRight", "bounceInUp" => "bounceInUp", "bounceOut" => "bounceOut", "bounceOutDown" => "bounceOutDown", "bounceOutLeft" => "bounceOutLeft", "bounceOutRight" => "bounceOutRight", "bounceOutUp" => "bounceOutUp", "fadeIn" => "fadeIn", "fadeInDown" => "fadeInDown", "fadeInDownBig" => "fadeInDownBig", "fadeInLeft" => "fadeInLeft", "fadeInLeftBig" => "fadeInLeftBig", "fadeInRight" => "fadeInRight", "fadeInRightBig" => "fadeInRightBig", "fadeInUp" => "fadeInUp", "fadeInUpBig" => "fadeInUpBig", "fadeOut" => "fadeOut", "fadeOutDown" => "fadeOutDown", "fadeOutDownBig" => "fadeOutDownBig", "fadeOutLeft" => "fadeOutLeft", "fadeOutLeftBig" => "fadeOutLeftBig", "fadeOutRight" => "fadeOutRight", "fadeOutRightBig" => "fadeOutRightBig", "fadeOutUp" => "fadeOutUp", "fadeOutUpBig" => "fadeOutUpBig", "flip" => "flip", "flipInX" => "flipInX", "flipInY" => "flipInY", "flipOutX" => "flipOutX", "flipOutY" => "flipOutY", "lightSpeedIn" => "lightSpeedIn", "lightSpeedOut" => "lightSpeedOut", "rotateIn" => "rotateIn", "rotateInDownLeft" => "rotateInDownLeft", "rotateInDownRight" => "rotateInDownRight", "rotateInUpLeft" => "rotateInUpLeft", "rotateInUpRight" => "rotateInUpRight", "rotateOut" => "rotateOut", "rotateOutDownLeft" => "rotateOutDownLeft", "rotateOutDownRight" => "rotateOutDownRight", "rotateOutUpLeft" => "rotateOutUpLeft", "rotateOutUpRight" => "rotateOutUpRight", "hinge" => "hinge", "rollIn" => "rollIn", "rollOut" => "rollOut", "zoomIn" => "zoomIn", "zoomInDown" => "zoomInDown", "zoomInLeft" => "zoomInLeft", "zoomInRight" => "zoomInRight", "zoomInUp" => "zoomInUp", "zoomOut" => "zoomOut", "zoomOutDown" => "zoomOutDown", "zoomOutLeft" => "zoomOutLeft", "zoomOutRight" => "zoomOutRight", "zoomOutUp" => "zoomOutUp", "slideInDown" => "slideInDown", "slideInLeft" => "slideInLeft", "slideInRight" => "slideInRight", "slideInUp" => "slideInUp", "slideOutDown" => "slideOutDown", "slideOutLeft" => "slideOutLeft", "slideOutRight" => "slideOutRight", "slideOutUp" => "slideOutUp");
$columns  = array(""=>"default","1"=>"1/12","2"=>"2/12","3"=>"3/12","4"=>"4/12","5"=>"5/12","6"=>"6/12","7"=>"7/12","8"=>"8/12","9"=>"9/12","10"=>"10/12","11"=>"11/12","12"=>"12/12");
// Fontawesome icons list

$icons = array('fa-glass'=>'\f000', 'fa-music'=>'\f001', 'fa-search'=>'\f002', 'fa-envelope-o'=>'\f003', 'fa-heart'=>'\f004', 'fa-star'=>'\f005', 'fa-star-o'=>'\f006', 'fa-user'=>'\f007', 'fa-film'=>'\f008', 'fa-th-large'=>'\f009', 'fa-th'=>'\f00a', 'fa-th-list'=>'\f00b', 'fa-check'=>'\f00c', 'fa-times'=>'\f00d', 'fa-search-plus'=>'\f00e', 'fa-search-minus'=>'\f010', 'fa-power-off'=>'\f011', 'fa-signal'=>'\f012', 'fa-cog'=>'\f013', 'fa-trash-o'=>'\f014', 'fa-home'=>'\f015', 'fa-file-o'=>'\f016', 'fa-clock-o'=>'\f017', 'fa-road'=>'\f018', 'fa-download'=>'\f019', 'fa-arrow-circle-o-down'=>'\f01a', 'fa-arrow-circle-o-up'=>'\f01b', 'fa-inbox'=>'\f01c', 'fa-play-circle-o'=>'\f01d', 'fa-repeat'=>'\f01e', 'fa-refresh'=>'\f021', 'fa-list-alt'=>'\f022', 'fa-lock'=>'\f023', 'fa-flag'=>'\f024', 'fa-headphones'=>'\f025', 'fa-volume-off'=>'\f026', 'fa-volume-down'=>'\f027', 'fa-volume-up'=>'\f028', 'fa-qrcode'=>'\f029', 'fa-barcode'=>'\f02a', 'fa-tag'=>'\f02b', 'fa-tags'=>'\f02c', 'fa-book'=>'\f02d', 'fa-bookmark'=>'\f02e', 'fa-print'=>'\f02f', 'fa-camera'=>'\f030', 'fa-font'=>'\f031', 'fa-bold'=>'\f032', 'fa-italic'=>'\f033', 'fa-text-height'=>'\f034', 'fa-text-width'=>'\f035', 'fa-align-left'=>'\f036', 'fa-align-center'=>'\f037', 'fa-align-right'=>'\f038', 'fa-align-justify'=>'\f039', 'fa-list'=>'\f03a', 'fa-outdent'=>'\f03b', 'fa-indent'=>'\f03c', 'fa-video-camera'=>'\f03d', 'fa-picture-o'=>'\f03e', 'fa-pencil'=>'\f040', 'fa-map-marker'=>'\f041', 'fa-adjust'=>'\f042', 'fa-tint'=>'\f043', 'fa-pencil-square-o'=>'\f044', 'fa-share-square-o'=>'\f045', 'fa-check-square-o'=>'\f046', 'fa-arrows'=>'\f047', 'fa-step-backward'=>'\f048', 'fa-fast-backward'=>'\f049', 'fa-backward'=>'\f04a', 'fa-play'=>'\f04b', 'fa-pause'=>'\f04c', 'fa-stop'=>'\f04d', 'fa-forward'=>'\f04e', 'fa-fast-forward'=>'\f050', 'fa-step-forward'=>'\f051', 'fa-eject'=>'\f052', 'fa-chevron-left'=>'\f053', 'fa-chevron-right'=>'\f054', 'fa-plus-circle'=>'\f055', 'fa-minus-circle'=>'\f056', 'fa-times-circle'=>'\f057', 'fa-check-circle'=>'\f058', 'fa-question-circle'=>'\f059', 'fa-info-circle'=>'\f05a', 'fa-crosshairs'=>'\f05b', 'fa-times-circle-o'=>'\f05c', 'fa-check-circle-o'=>'\f05d', 'fa-ban'=>'\f05e', 'fa-arrow-left'=>'\f060', 'fa-arrow-right'=>'\f061', 'fa-arrow-up'=>'\f062', 'fa-arrow-down'=>'\f063', 'fa-share'=>'\f064', 'fa-expand'=>'\f065', 'fa-compress'=>'\f066', 'fa-plus'=>'\f067', 'fa-minus'=>'\f068', 'fa-asterisk'=>'\f069', 'fa-exclamation-circle'=>'\f06a', 'fa-gift'=>'\f06b', 'fa-leaf'=>'\f06c', 'fa-fire'=>'\f06d', 'fa-eye'=>'\f06e', 'fa-eye-slash'=>'\f070', 'fa-exclamation-triangle'=>'\f071', 'fa-plane'=>'\f072', 'fa-calendar'=>'\f073', 'fa-random'=>'\f074', 'fa-comment'=>'\f075', 'fa-magnet'=>'\f076', 'fa-chevron-up'=>'\f077', 'fa-chevron-down'=>'\f078', 'fa-retweet'=>'\f079', 'fa-shopping-cart'=>'\f07a', 'fa-folder'=>'\f07b', 'fa-folder-open'=>'\f07c', 'fa-arrows-v'=>'\f07d', 'fa-arrows-h'=>'\f07e', 'fa-bar-chart'=>'\f080', 'fa-twitter-square'=>'\f081', 'fa-facebook-square'=>'\f082', 'fa-camera-retro'=>'\f083', 'fa-key'=>'\f084', 'fa-cogs'=>'\f085', 'fa-comments'=>'\f086', 'fa-thumbs-o-up'=>'\f087', 'fa-thumbs-o-down'=>'\f088', 'fa-star-half'=>'\f089', 'fa-heart-o'=>'\f08a', 'fa-sign-out'=>'\f08b', 'fa-linkedin-square'=>'\f08c', 'fa-thumb-tack'=>'\f08d', 'fa-external-link'=>'\f08e', 'fa-sign-in'=>'\f090', 'fa-trophy'=>'\f091', 'fa-github-square'=>'\f092', 'fa-upload'=>'\f093', 'fa-lemon-o'=>'\f094', 'fa-phone'=>'\f095', 'fa-square-o'=>'\f096', 'fa-bookmark-o'=>'\f097', 'fa-phone-square'=>'\f098', 'fa-twitter'=>'\f099', 'fa-facebook'=>'\f09a', 'fa-github'=>'\f09b', 'fa-unlock'=>'\f09c', 'fa-credit-card'=>'\f09d', 'fa-rss'=>'\f09e', 'fa-hdd-o'=>'\f0a0', 'fa-bullhorn'=>'\f0a1', 'fa-bell'=>'\f0f3', 'fa-certificate'=>'\f0a3', 'fa-hand-o-right'=>'\f0a4', 'fa-hand-o-left'=>'\f0a5', 'fa-hand-o-up'=>'\f0a6', 'fa-hand-o-down'=>'\f0a7', 'fa-arrow-circle-left'=>'\f0a8', 'fa-arrow-circle-right'=>'\f0a9', 'fa-arrow-circle-up'=>'\f0aa', 'fa-arrow-circle-down'=>'\f0ab', 'fa-globe'=>'\f0ac', 'fa-wrench'=>'\f0ad', 'fa-tasks'=>'\f0ae', 'fa-filter'=>'\f0b0', 'fa-briefcase'=>'\f0b1', 'fa-arrows-alt'=>'\f0b2', 'fa-users'=>'\f0c0', 'fa-link'=>'\f0c1', 'fa-cloud'=>'\f0c2', 'fa-flask'=>'\f0c3', 'fa-scissors'=>'\f0c4', 'fa-files-o'=>'\f0c5', 'fa-paperclip'=>'\f0c6', 'fa-floppy-o'=>'\f0c7', 'fa-square'=>'\f0c8', 'fa-bars'=>'\f0c9', 'fa-list-ul'=>'\f0ca', 'fa-list-ol'=>'\f0cb', 'fa-strikethrough'=>'\f0cc', 'fa-underline'=>'\f0cd', 'fa-table'=>'\f0ce', 'fa-magic'=>'\f0d0', 'fa-truck'=>'\f0d1', 'fa-pinterest'=>'\f0d2', 'fa-pinterest-square'=>'\f0d3', 'fa-google-plus-square'=>'\f0d4', 'fa-google-plus'=>'\f0d5', 'fa-money'=>'\f0d6', 'fa-caret-down'=>'\f0d7', 'fa-caret-up'=>'\f0d8', 'fa-caret-left'=>'\f0d9', 'fa-caret-right'=>'\f0da', 'fa-columns'=>'\f0db', 'fa-sort'=>'\f0dc', 'fa-sort-desc'=>'\f0dd', 'fa-sort-asc'=>'\f0de', 'fa-envelope'=>'\f0e0', 'fa-linkedin'=>'\f0e1', 'fa-undo'=>'\f0e2', 'fa-gavel'=>'\f0e3', 'fa-tachometer'=>'\f0e4', 'fa-comment-o'=>'\f0e5', 'fa-comments-o'=>'\f0e6', 'fa-bolt'=>'\f0e7', 'fa-sitemap'=>'\f0e8', 'fa-umbrella'=>'\f0e9', 'fa-clipboard'=>'\f0ea', 'fa-lightbulb-o'=>'\f0eb', 'fa-exchange'=>'\f0ec', 'fa-cloud-download'=>'\f0ed', 'fa-cloud-upload'=>'\f0ee', 'fa-user-md'=>'\f0f0', 'fa-stethoscope'=>'\f0f1', 'fa-suitcase'=>'\f0f2', 'fa-bell-o'=>'\f0a2', 'fa-coffee'=>'\f0f4', 'fa-cutlery'=>'\f0f5', 'fa-file-text-o'=>'\f0f6', 'fa-building-o'=>'\f0f7', 'fa-hospital-o'=>'\f0f8', 'fa-ambulance'=>'\f0f9', 'fa-medkit'=>'\f0fa', 'fa-fighter-jet'=>'\f0fb', 'fa-beer'=>'\f0fc', 'fa-h-square'=>'\f0fd', 'fa-plus-square'=>'\f0fe', 'fa-angle-double-left'=>'\f100', 'fa-angle-double-right'=>'\f101', 'fa-angle-double-up'=>'\f102', 'fa-angle-double-down'=>'\f103', 'fa-angle-left'=>'\f104', 'fa-angle-right'=>'\f105', 'fa-angle-up'=>'\f106', 'fa-angle-down'=>'\f107', 'fa-desktop'=>'\f108', 'fa-laptop'=>'\f109', 'fa-tablet'=>'\f10a', 'fa-mobile'=>'\f10b', 'fa-circle-o'=>'\f10c', 'fa-quote-left'=>'\f10d', 'fa-quote-right'=>'\f10e', 'fa-spinner'=>'\f110', 'fa-circle'=>'\f111', 'fa-reply'=>'\f112', 'fa-github-alt'=>'\f113', 'fa-folder-o'=>'\f114', 'fa-folder-open-o'=>'\f115', 'fa-smile-o'=>'\f118', 'fa-frown-o'=>'\f119', 'fa-meh-o'=>'\f11a', 'fa-gamepad'=>'\f11b', 'fa-keyboard-o'=>'\f11c', 'fa-flag-o'=>'\f11d', 'fa-flag-checkered'=>'\f11e', 'fa-terminal'=>'\f120', 'fa-code'=>'\f121', 'fa-reply-all'=>'\f122', 'fa-star-half-o'=>'\f123', 'fa-location-arrow'=>'\f124', 'fa-crop'=>'\f125', 'fa-code-fork'=>'\f126', 'fa-chain-broken'=>'\f127', 'fa-question'=>'\f128', 'fa-info'=>'\f129', 'fa-exclamation'=>'\f12a', 'fa-superscript'=>'\f12b', 'fa-subscript'=>'\f12c', 'fa-eraser'=>'\f12d', 'fa-puzzle-piece'=>'\f12e', 'fa-microphone'=>'\f130', 'fa-microphone-slash'=>'\f131', 'fa-shield'=>'\f132', 'fa-calendar-o'=>'\f133', 'fa-fire-extinguisher'=>'\f134', 'fa-rocket'=>'\f135', 'fa-maxcdn'=>'\f136', 'fa-chevron-circle-left'=>'\f137', 'fa-chevron-circle-right'=>'\f138', 'fa-chevron-circle-up'=>'\f139', 'fa-chevron-circle-down'=>'\f13a', 'fa-html5'=>'\f13b', 'fa-css3'=>'\f13c', 'fa-anchor'=>'\f13d', 'fa-unlock-alt'=>'\f13e', 'fa-bullseye'=>'\f140', 'fa-ellipsis-h'=>'\f141', 'fa-ellipsis-v'=>'\f142', 'fa-rss-square'=>'\f143', 'fa-play-circle'=>'\f144', 'fa-ticket'=>'\f145', 'fa-minus-square'=>'\f146', 'fa-minus-square-o'=>'\f147', 'fa-level-up'=>'\f148', 'fa-level-down'=>'\f149', 'fa-check-square'=>'\f14a', 'fa-pencil-square'=>'\f14b', 'fa-external-link-square'=>'\f14c', 'fa-share-square'=>'\f14d', 'fa-compass'=>'\f14e', 'fa-caret-square-o-down'=>'\f150', 'fa-caret-square-o-up'=>'\f151', 'fa-caret-square-o-right'=>'\f152', 'fa-eur'=>'\f153', 'fa-gbp'=>'\f154', 'fa-usd'=>'\f155', 'fa-inr'=>'\f156', 'fa-jpy'=>'\f157', 'fa-rub'=>'\f158', 'fa-krw'=>'\f159', 'fa-btc'=>'\f15a', 'fa-file'=>'\f15b', 'fa-file-text'=>'\f15c', 'fa-sort-alpha-asc'=>'\f15d', 'fa-sort-alpha-desc'=>'\f15e', 'fa-sort-amount-asc'=>'\f160', 'fa-sort-amount-desc'=>'\f161', 'fa-sort-numeric-asc'=>'\f162', 'fa-sort-numeric-desc'=>'\f163', 'fa-thumbs-up'=>'\f164', 'fa-thumbs-down'=>'\f165', 'fa-youtube-square'=>'\f166', 'fa-youtube'=>'\f167', 'fa-xing'=>'\f168', 'fa-xing-square'=>'\f169', 'fa-youtube-play'=>'\f16a', 'fa-dropbox'=>'\f16b', 'fa-stack-overflow'=>'\f16c', 'fa-instagram'=>'\f16d', 'fa-flickr'=>'\f16e', 'fa-adn'=>'\f170', 'fa-bitbucket'=>'\f171', 'fa-bitbucket-square'=>'\f172', 'fa-tumblr'=>'\f173', 'fa-tumblr-square'=>'\f174', 'fa-long-arrow-down'=>'\f175', 'fa-long-arrow-up'=>'\f176', 'fa-long-arrow-left'=>'\f177', 'fa-long-arrow-right'=>'\f178', 'fa-apple'=>'\f179', 'fa-windows'=>'\f17a', 'fa-android'=>'\f17b', 'fa-linux'=>'\f17c', 'fa-dribbble'=>'\f17d', 'fa-skype'=>'\f17e', 'fa-foursquare'=>'\f180', 'fa-trello'=>'\f181', 'fa-female'=>'\f182', 'fa-male'=>'\f183', 'fa-gratipay'=>'\f184', 'fa-sun-o'=>'\f185', 'fa-moon-o'=>'\f186', 'fa-archive'=>'\f187', 'fa-bug'=>'\f188', 'fa-vk'=>'\f189', 'fa-weibo'=>'\f18a', 'fa-renren'=>'\f18b', 'fa-pagelines'=>'\f18c', 'fa-stack-exchange'=>'\f18d', 'fa-arrow-circle-o-right'=>'\f18e', 'fa-arrow-circle-o-left'=>'\f190', 'fa-caret-square-o-left'=>'\f191', 'fa-dot-circle-o'=>'\f192', 'fa-wheelchair'=>'\f193', 'fa-vimeo-square'=>'\f194', 'fa-try'=>'\f195', 'fa-plus-square-o'=>'\f196', 'fa-space-shuttle'=>'\f197', 'fa-slack'=>'\f198', 'fa-envelope-square'=>'\f199', 'fa-wordpress'=>'\f19a', 'fa-openid'=>'\f19b', 'fa-university'=>'\f19c', 'fa-graduation-cap'=>'\f19d', 'fa-yahoo'=>'\f19e', 'fa-google'=>'\f1a0', 'fa-reddit'=>'\f1a1', 'fa-reddit-square'=>'\f1a2', 'fa-stumbleupon-circle'=>'\f1a3', 'fa-stumbleupon'=>'\f1a4', 'fa-delicious'=>'\f1a5', 'fa-digg'=>'\f1a6', 'fa-pied-piper'=>'\f1a7', 'fa-pied-piper-alt'=>'\f1a8', 'fa-drupal'=>'\f1a9', 'fa-joomla'=>'\f1aa', 'fa-language'=>'\f1ab', 'fa-fax'=>'\f1ac', 'fa-building'=>'\f1ad', 'fa-child'=>'\f1ae', 'fa-paw'=>'\f1b0', 'fa-spoon'=>'\f1b1', 'fa-cube'=>'\f1b2', 'fa-cubes'=>'\f1b3', 'fa-behance'=>'\f1b4', 'fa-behance-square'=>'\f1b5', 'fa-steam'=>'\f1b6', 'fa-steam-square'=>'\f1b7', 'fa-recycle'=>'\f1b8', 'fa-car'=>'\f1b9', 'fa-taxi'=>'\f1ba', 'fa-tree'=>'\f1bb', 'fa-spotify'=>'\f1bc', 'fa-deviantart'=>'\f1bd', 'fa-soundcloud'=>'\f1be', 'fa-database'=>'\f1c0', 'fa-file-pdf-o'=>'\f1c1', 'fa-file-word-o'=>'\f1c2', 'fa-file-excel-o'=>'\f1c3', 'fa-file-powerpoint-o'=>'\f1c4', 'fa-file-image-o'=>'\f1c5', 'fa-file-archive-o'=>'\f1c6', 'fa-file-audio-o'=>'\f1c7', 'fa-file-video-o'=>'\f1c8', 'fa-file-code-o'=>'\f1c9', 'fa-vine'=>'\f1ca', 'fa-codepen'=>'\f1cb', 'fa-jsfiddle'=>'\f1cc', 'fa-life-ring'=>'\f1cd', 'fa-circle-o-notch'=>'\f1ce', 'fa-rebel'=>'\f1d0', 'fa-empire'=>'\f1d1', 'fa-git-square'=>'\f1d2', 'fa-git'=>'\f1d3', 'fa-hacker-news'=>'\f1d4', 'fa-tencent-weibo'=>'\f1d5', 'fa-qq'=>'\f1d6', 'fa-weixin'=>'\f1d7', 'fa-paper-plane'=>'\f1d8', 'fa-paper-plane-o'=>'\f1d9', 'fa-history'=>'\f1da', 'fa-circle-thin'=>'\f1db', 'fa-header'=>'\f1dc', 'fa-paragraph'=>'\f1dd', 'fa-sliders'=>'\f1de', 'fa-share-alt'=>'\f1e0', 'fa-share-alt-square'=>'\f1e1', 'fa-bomb'=>'\f1e2', 'fa-futbol-o'=>'\f1e3', 'fa-tty'=>'\f1e4', 'fa-binoculars'=>'\f1e5', 'fa-plug'=>'\f1e6', 'fa-slideshare'=>'\f1e7', 'fa-twitch'=>'\f1e8', 'fa-yelp'=>'\f1e9', 'fa-newspaper-o'=>'\f1ea', 'fa-wifi'=>'\f1eb', 'fa-calculator'=>'\f1ec', 'fa-paypal'=>'\f1ed', 'fa-google-wallet'=>'\f1ee', 'fa-cc-visa'=>'\f1f0', 'fa-cc-mastercard'=>'\f1f1', 'fa-cc-discover'=>'\f1f2', 'fa-cc-amex'=>'\f1f3', 'fa-cc-paypal'=>'\f1f4', 'fa-cc-stripe'=>'\f1f5', 'fa-bell-slash'=>'\f1f6', 'fa-bell-slash-o'=>'\f1f7', 'fa-trash'=>'\f1f8', 'fa-copyright'=>'\f1f9', 'fa-at'=>'\f1fa', 'fa-eyedropper'=>'\f1fb', 'fa-paint-brush'=>'\f1fc', 'fa-birthday-cake'=>'\f1fd', 'fa-area-chart'=>'\f1fe', 'fa-pie-chart'=>'\f200', 'fa-line-chart'=>'\f201', 'fa-lastfm'=>'\f202', 'fa-lastfm-square'=>'\f203', 'fa-toggle-off'=>'\f204', 'fa-toggle-on'=>'\f205', 'fa-bicycle'=>'\f206', 'fa-bus'=>'\f207', 'fa-ioxhost'=>'\f208', 'fa-angellist'=>'\f209', 'fa-cc'=>'\f20a', 'fa-ils'=>'\f20b', 'fa-meanpath'=>'\f20c', 'fa-buysellads'=>'\f20d', 'fa-connectdevelop'=>'\f20e', 'fa-dashcube'=>'\f210', 'fa-forumbee'=>'\f211', 'fa-leanpub'=>'\f212', 'fa-sellsy'=>'\f213', 'fa-shirtsinbulk'=>'\f214', 'fa-simplybuilt'=>'\f215', 'fa-skyatlas'=>'\f216', 'fa-cart-plus'=>'\f217', 'fa-cart-arrow-down'=>'\f218', 'fa-diamond'=>'\f219', 'fa-ship'=>'\f21a', 'fa-user-secret'=>'\f21b', 'fa-motorcycle'=>'\f21c', 'fa-street-view'=>'\f21d', 'fa-heartbeat'=>'\f21e', 'fa-venus'=>'\f221', 'fa-mars'=>'\f222', 'fa-mercury'=>'\f223', 'fa-transgender'=>'\f224', 'fa-transgender-alt'=>'\f225', 'fa-venus-double'=>'\f226', 'fa-mars-double'=>'\f227', 'fa-venus-mars'=>'\f228', 'fa-mars-stroke'=>'\f229', 'fa-mars-stroke-v'=>'\f22a', 'fa-mars-stroke-h'=>'\f22b', 'fa-neuter'=>'\f22c', 'fa-genderless'=>'\f22d', 'fa-facebook-official'=>'\f230', 'fa-pinterest-p'=>'\f231', 'fa-whatsapp'=>'\f232', 'fa-server'=>'\f233', 'fa-user-plus'=>'\f234', 'fa-user-times'=>'\f235', 'fa-bed'=>'\f236', 'fa-viacoin'=>'\f237', 'fa-train'=>'\f238', 'fa-subway'=>'\f239', 'fa-medium'=>'\f23a', 'fa-y-combinator'=>'\f23b', 'fa-optin-monster'=>'\f23c', 'fa-opencart'=>'\f23d', 'fa-expeditedssl'=>'\f23e', 'fa-battery-full'=>'\f240', 'fa-battery-three-quarters'=>'\f241', 'fa-battery-half'=>'\f242', 'fa-battery-quarter'=>'\f243', 'fa-battery-empty'=>'\f244', 'fa-mouse-pointer'=>'\f245', 'fa-i-cursor'=>'\f246', 'fa-object-group'=>'\f247', 'fa-object-ungroup'=>'\f248', 'fa-sticky-note'=>'\f249', 'fa-sticky-note-o'=>'\f24a', 'fa-cc-jcb'=>'\f24b', 'fa-cc-diners-club'=>'\f24c', 'fa-clone'=>'\f24d', 'fa-balance-scale'=>'\f24e', 'fa-hourglass-o'=>'\f250', 'fa-hourglass-start'=>'\f251', 'fa-hourglass-half'=>'\f252', 'fa-hourglass-end'=>'\f253', 'fa-hourglass'=>'\f254', 'fa-hand-rock-o'=>'\f255', 'fa-hand-paper-o'=>'\f256', 'fa-hand-scissors-o'=>'\f257', 'fa-hand-lizard-o'=>'\f258', 'fa-hand-spock-o'=>'\f259', 'fa-hand-pointer-o'=>'\f25a', 'fa-hand-peace-o'=>'\f25b', 'fa-trademark'=>'\f25c', 'fa-registered'=>'\f25d', 'fa-creative-commons'=>'\f25e', 'fa-gg'=>'\f260', 'fa-gg-circle'=>'\f261', 'fa-tripadvisor'=>'\f262', 'fa-odnoklassniki'=>'\f263', 'fa-odnoklassniki-square'=>'\f264', 'fa-get-pocket'=>'\f265', 'fa-wikipedia-w'=>'\f266', 'fa-safari'=>'\f267', 'fa-chrome'=>'\f268', 'fa-firefox'=>'\f269', 'fa-opera'=>'\f26a', 'fa-internet-explorer'=>'\f26b', 'fa-television'=>'\f26c', 'fa-contao'=>'\f26d', 'fa-500px'=>'\f26e', 'fa-amazon'=>'\f270', 'fa-calendar-plus-o'=>'\f271', 'fa-calendar-minus-o'=>'\f272', 'fa-calendar-times-o'=>'\f273', 'fa-calendar-check-o'=>'\f274', 'fa-industry'=>'\f275', 'fa-map-pin'=>'\f276', 'fa-map-signs'=>'\f277', 'fa-map-o'=>'\f278', 'fa-map'=>'\f279', 'fa-commenting'=>'\f27a', 'fa-commenting-o'=>'\f27b', 'fa-houzz'=>'\f27c', 'fa-vimeo'=>'\f27d', 'fa-black-tie'=>'\f27e', 'fa-fonticons'=>'\f280');



$checklist_icons = array ( 'icon-check' => '\f00c', 'icon-star' => '\f006', 'icon-angle-right' => '\f105', 'icon-asterisk' => '\f069', 'icon-remove' => '\f00d', 'icon-plus' => '\f067' );

/*-----------------------------------------------------------------------------------*/
/*	Shortcode Selection Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['shortcode-generator'] = array(
	'no_preview' => true,
	'params' => array(),
	'shortcode' => '',
	'popup_title' => ''
);


/*-----------------------------------------------------------------------------------*/
/*	Accordion Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['accordion'] = array(
	'no_preview' => true,
	'icon' => 'fa-list-ul',
	'params' => array(
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro' )
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro' )
		),	
		'style' => array(
			'type' => 'select',
			'std' => 'simple',
			'label' => __( 'Style', 'magee-shortcodes-pro' ),
			'desc' => __( 'The "simple" doesn\'t have a border in the whole accordion, and the "boxed" has.','magee-shortcodes-pro'),
			'options' => array(
				'simple' => __( 'Simple Style', 'magee-shortcodes-pro' ),
				'boxed' => __( 'Boxed Style', 'magee-shortcodes-pro' ),
				'spacing' => __( 'Spacing Style', 'magee-shortcodes-pro' ),
			)
		),
		'type' => array(
			'type' => 'select',
			'label' => __( 'Type', 'magee-shortcodes-pro' ),
			'desc' => __( 'The differance is in the right of accordion, "1" is a down arrow, and the "2" is a plus in a box','magee-shortcodes-pro'),
			'std' => '1',
			'options' => array(
				'1' => __( 'Type 1', 'magee-shortcodes-pro' ),
				'2' => __( 'Type 2', 'magee-shortcodes-pro' ),
				'3' => __( 'None Type', 'magee-shortcodes-pro' ),
			)
		),
		
		),
	'child_shortcode' => array(
		'params' => array(
						  
		'title' => array(
			'std' => 'Title',
			'type' => 'text',
			'label' => __( 'Title', 'magee-shortcodes-pro'),
			'desc' => __( 'Insert the title for the accordion item.', 'magee-shortcodes-pro'),
		),	
		'color' => array(
			'std' => '',
			'type' => 'colorpicker',
			'label' => __( 'Title Color', 'magee-shortcodes-pro'),
			'desc' => __( 'Insert the color for the title.', 'magee-shortcodes-pro'),
		),	
		'background_color' => array(
			'std' => '',
			'type' => 'colorpicker',
			'label' => __( 'Title Background Color', 'magee-shortcodes-pro'),
			'desc' => __( 'Insert the background color for the title.', 'magee-shortcodes-pro'),
		),	
		'content' => array(
			'std' => 'Your Content Goes Here',
			'type' => 'textarea',
			'label' => __( 'Text', 'magee-shortcodes-pro'),
			'desc' => __( 'Insert the content for the accordion item.', 'magee-shortcodes-pro'),
		),	
		'status' => array(
			'std' => 'close',
			'type' => 'select',
			'label' => __( 'Status', 'magee-shortcodes-pro'),
			'desc' =>  __( 'Choose to have the accordion open or close when page loads.', 'magee-shortcodes-pro'),
			'options' => array("close"=>__('Close','magee-shortcodes-pro'),"open"=>__('Open','magee-shortcodes-pro') )
		),
		'close_icon' => array(
			'type' => 'iconpicker',
			'label' => __( 'Select Close Status Icon', 'magee-shortcodes-pro'),
			'desc' => __( 'Click an icon to select, click again to deselect', 'magee-shortcodes-pro'),
			'options' => $icons
		),
		'open_icon' => array(
			'type' => 'iconpicker',
			'label' => __( 'Select Open Status Icon', 'magee-shortcodes-pro'),
			'desc' => __( 'Click an icon to select, click again to deselect', 'magee-shortcodes-pro'),
			'options' => $icons
		),
           )
		,
	'shortcode' => "[ms_accordion_item title=\"{{title}}\" color=\"{{color}}\" background_color=\"{{background_color}}\" close_icon=\"{{close_icon}}\" open_icon=\"{{open_icon}}\" status=\"{{status}}\"]{{content}}[/ms_accordion_item]\r\n",	
		),	
	'shortcode' => "[ms_accordion style=\"{{style}}\" type=\"{{type}}\"  class=\"{{class}}\" id=\"{{id}}\"]\r\n{{child_shortcode}}[/ms_accordion]",
	'popup_title' => __( 'Accordion Shortcode', 'magee-shortcodes-pro' ),
    'name' => __('accordions-shortcode/','magee-shortcodes-pro'),

);


/*-----------------------------------------------------------------------------------*/
/*	Alert Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['alert'] = array(
	'no_preview' => true,
	'icon' => 'fa-exclamation-circle',
	'params' => array(
		'icon' => array(
			'type' => 'iconpicker',
			'label' => __( 'Icon', 'magee-shortcodes-pro' ),
			'desc' => __( 'Click an icon to select, click again to deselect.', 'magee-shortcodes-pro' ),
			'options' => $icons
			),
		
		'content' => array(
			'std' => __('Warning! Better check yourself, you\'re not looking too good.', 'magee-shortcodes-pro'),
			'type' => 'textarea',
			'label' => __( 'Alert Content', 'magee-shortcodes-pro' ),
			'desc' => __( 'Insert the content for the alert.', 'magee-shortcodes-pro' ),
		),
		
		'background_color' => array(
			'std' => '#f5f5f5',
			'type' => 'colorpicker',
			'label' => __( 'Background Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set background color for alert box.', 'magee-shortcodes-pro' ),
		),
		'text_color' => array(
			'std' => '',
			'type' => 'colorpicker',
			'label' => __( 'Text Color', 'magee-shortcodes-pro' ),
			'desc' =>__( 'Set content color & border color for alert box.', 'magee-shortcodes-pro' ),
		),
	
		
		'border_width' => array(
			'std' => '0',
			'type' => 'number',
			'max' => '50',
			'min' => '0',
			'label' => __( 'Border Width', 'magee-shortcodes-pro' ),
			'desc' => __('In pixels (px), eg: 1px.', 'magee-shortcodes-pro')
		),
		
		'border_radius' => array(
			'std' => '0',
			'type' => 'number',
			'max' => '50',
			'min' => '0',
			'label' => __( 'Border Radius', 'magee-shortcodes-pro' ),
			'desc' => __('In pixels (px), eg: 1px.', 'magee-shortcodes-pro')
		),
		
		'box_shadow' => array(
			'std' => '',
			'type' => 'choose',
			'label' => __( 'Box Shadow', 'magee-shortcodes-pro' ),
			'desc' => __( 'Display a box shadow for alert.', 'magee-shortcodes-pro' ),
			'options' => $reverse_choices 
		),	
		'dismissable' => array(
			'std' => '',
			'type' => 'choose',
			'label' => __( 'Dismissable', 'magee-shortcodes-pro' ),
			'desc' => __( 'The alert box is dismissable.', 'magee-shortcodes-pro' ),
			'options' =>  $reverse_choices 
		),	
		
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),		
	),
	'shortcode' => '[ms_alert icon="{{icon}}" background_color="{{background_color}}"  text_color="{{text_color}}"  border_width="{{border_width}}"  border_radius="{{border_radius}}" box_shadow="{{box_shadow}}" dismissable="{{dismissable}}" class="{{class}}" id="{{id}}"]{{content}}[/ms_alert]',
	'popup_title' => __( 'Alert Shortcode', 'magee-shortcodes-pro' ),
	'name' => __('alert-shortcode/','magee-shortcodes-pro'),
);
/*-----------------------------------------------------------------------------------*/
/*	Animation Config
/*-----------------------------------------------------------------------------------*/
$magee_shortcodes['animation'] = array(
    'no_preview' => true,
	'icon' => 'fa-bolt', 
	'params' => array(
		'animation_speed' => array(
			'type' => 'select',
			'label' => __( 'Animation Speed', 'magee-shortcodes-pro'),
			'desc' => __( 'Type in speed of animation in seconds.', 'magee-shortcodes-pro'),
			'std'=>'0.9',
			'options' => $dec_numbers
		),
		'animation_type' => array(
			'type' => 'select',
			'label' => __( 'Animation Type', 'magee-shortcodes-pro'),
			'desc' =>  __( 'Select the type of animation.', 'magee-shortcodes-pro'),
			'options' => $animation_type
		),
		'image_animation' => array(
			'type' => 'choose',
			'label' => __( 'Image Animation', 'magee-shortcodes-pro'),
			'desc' => __('Only images from content to be animated.','magee-shortcodes-pro'),
			'options' => $reverse_choices
		),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),	
		'content' => array(
			'std' => __('Your Content Goes Here', 'magee-shortcodes-pro'),
			'type' => 'textarea',
			'label' => __( 'Animation Content', 'magee-shortcodes-pro'),
			'desc' => __( 'Insert the content to be animated.', 'magee-shortcodes-pro'),
		),
		
	),
	'shortcode' => '[ms_animation animation_speed="{{animation_speed}}" animation_type="{{animation_type}}"  image_animation="{{image_animation}}" class="{{class}}" id="{{id}}"]{{content}}[/ms_animation]',
	'popup_title' => __( 'Animation Shortcode', 'magee-shortcodes-pro')
);	

/*-----------------------------------------------------------------------------------*/
/*	Audio Config
/*-----------------------------------------------------------------------------------*/
$magee_shortcodes['audio'] = array(
	'no_preview' => true,
	'icon' => 'fa-play-circle-o',
	'params' => array(
	    'style' => array(
			'std' => '',
			'type' => 'select',
			'label' => __( 'Audio Style', 'magee-shortcodes-pro'),
			'desc' => __( 'Choose style for audio to show', 'magee-shortcodes-pro'),
			'options' => array('dark'=>__('Dark Style', 'magee-shortcodes-pro'),'light'=>__('Light Style', 'magee-shortcodes-pro'))
		),
	    'mp3' => array(
			'std' => '',
			'type' => 'link',
			'label' => __( 'Mp3 URL', 'magee-shortcodes-pro'),
			'desc' => __( 'Add the URL of audio in MP3 format.', 'magee-shortcodes-pro')
		),
		'ogg' => array(
			'std' => '',
			'type' => 'link',
			'label' => __( 'Ogg URL', 'magee-shortcodes-pro'),
			'desc' => __( 'Add the URL of audio in OGG format.', 'magee-shortcodes-pro')
		),
		'wav' => array(
			'std' => '',
			'type' => 'link',
			'label' => __( 'Wav URL', 'magee-shortcodes-pro'),
			'desc' => __( 'Add the URL of audio in WAV format.', 'magee-shortcodes-pro')
		),
		'mute' => array(
		    'type' => 'choose',
		    'label' => __( 'Mute Audio','magee-shortcodes-pro'),
		    'desc' => __('Choose to mute the audio.','magee-shortcodes-pro'), 
		    'options' =>  $reverse_choices,
		),
		'autoplay' => array(
		    'type' => 'choose',
		    'label' => __( 'Autoplay Audio','magee-shortcodes-pro'),
		    'desc' => __('Choose to autoplay the audio.','magee-shortcodes-pro'), 
		    'options' =>  $choices,
		),
		'loop' => array(
		    'type' => 'choose',
		    'label' => __( 'Loop Audio','magee-shortcodes-pro'),
		    'desc' => __('Choose to loop the audio.','magee-shortcodes-pro'), 
		    'options' =>  $choices,
		),
		'controls' => array(
		    'type' => 'choose',
		    'label' => __( 'Controls Audio','magee-shortcodes-pro'),
		    'desc' => __('Choose to display controls of the audio.','magee-shortcodes-pro'), 
		    'options' =>  $choices,
		),
	    'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
	),   
    'shortcode' => '[ms_audio style="{{style}}" mp3="{{mp3}}" ogg="{{ogg}}" wav="{{wav}}" mute="{{mute}}" autoplay="{{autoplay}}" loop="{{loop}}" controls="{{controls}}" class="{{class}}" id="{{id}}"]' ,
	'popup_title' => __( 'Audio Shortcode','magee-shortcodes-pro'),
	'name' => __('audio-shortcode/','magee-shortcodes-pro'),
);

/*-----------------------------------------------------------------------------------*/
/*	Blog Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['blog'] = array(
	'no_preview' => true,
	'icon' => 'fa-pencil-square-o',
	'params' => array(
					  
	'style' => array(
			'type' => 'select',
			'label' => __( 'List Style', 'magee-shortcodes-pro'),
			'desc' => __( 'Style1: Image above content. Style2: Image beside content.', 'magee-shortcodes-pro'),
			'options' => array( '1' => __( 'Style 1', 'magee-shortcodes-pro' ), '2' => __( 'Style 2', 'magee-shortcodes-pro' ), '3' => __( 'Style 3', 'magee-shortcodes-pro' ), '4' => __( 'Style 4 ( Timeline )', 'magee-shortcodes-pro' ) )
		),

	'num' => array(
			'type' => 'number',
			'label' => __( 'List Num', 'magee-shortcodes-pro'),
			'desc' => __( 'Number of posts displayed.', 'magee-shortcodes-pro'),
			"std"=>'10',
			'max' => '100',
			'min' => '0',
		),
	'column' => array(
			'type' => 'select',
			'label' => __( 'Column', 'magee-shortcodes-pro'),
			'desc' => __( 'Choose column number for blog list.', 'magee-shortcodes-pro'),
			'std' => '3',
			'options' => array( '1' => '1', '2' => '2', '3' => '3', '4' => '4' )
		),
	
	'category' => array(
			'type' => 'select',
			'label' => __( 'Category', 'magee-shortcodes-pro'),
			'desc' => __( 'Choose a category of blog posts to display.', 'magee-shortcodes-pro'),
			'options' => Magee_Core::magee_shortcodes_categories('category',true),
		),
	'page_nav' => array(
			'type' => 'choose',
			'label' => __( 'Display Page Navigation', 'magee-shortcodes-pro'),
			'desc' => __( 'Choose to show page navigation for blog list.', 'magee-shortcodes-pro'),
			'std' => 'no',
			'options' => $choices
		),
		'offset' => array(
		    'std' => '0',
			'min' => '0',
			'max' => '50',
			'type' => 'number',
			'label' => __( 'Post Offset','magee-shortcodes-pro'),
		    'desc' => __( 'The number of posts to skip. ex: 1.','magee-shortcodes-pro')
		),
		'exclude_category' => array(
		    'std' => '',
			'type' => 'select',
			'label' => __( 'Exclude Categories','magee-shortcodes-pro'),
			'desc' => __( 'Select a category to exclude.','magee-shortcodes-pro'),
            'options' => Magee_Core::magee_shortcodes_categories('category',true),
		),
		'display_title' => array(
		    'type' => 'choose',
			'label' => __( 'Display Title','magee-shortcodes-pro'),
			'desc' => __( 'Choose to display the post title.','magee-shortcodes-pro'),
			'options' => $choices
		),
		'display_meta' => array(
		    'type' => 'choose',
			'label' => __( 'Display Meta','magee-shortcodes-pro'),
			'desc' => __( 'Choose to show all meta data.','magee-shortcodes-pro'),
			'options' => $choices
		),
		'display_excerpt' => array(
		    'type' => 'choose',
			'label' => __( 'Display Excerpt','magee-shortcodes-pro'),
			'desc' => __( 'Choose to display the post excerpt.','magee-shortcodes-pro'),
			'options' => $choices
		),
		'excerpt_length' => array(
		    'std' => '',
		    'type' => 'text',
			'label' => __( 'Excerpt Length','magee-shortcodes-pro'),
			'desc' => __( 'Insert the number of words/characters you want to show in the excerpt.','magee-shortcodes-pro')
		),
		'strip' => array(
			'type' => 'choose',
			'label' => __( 'Strip HTML','magee-shortcodes-pro'),
			'desc' => __( 'Strip HTML from the post excerpt.','magee-shortcodes-pro'),
			'options' => $choices
		),
		
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
	),
	'shortcode' => '[ms_blog num="{{num}}"  style="{{style}}" column="{{column}}" category="{{category}}" page_nav="{{page_nav}}"  class="{{class}}" id="{{id}}" offset="{{offset}}" exclude_category="{{exclude_category}}" display_title="{{display_title}}" display_meta="{{display_meta}}" display_excerpt="{{display_excerpt}}" excerpt_length="{{excerpt_length}}" strip="{{strip}}"]',
	'popup_title' => __( 'Blog Shortcode', 'magee-shortcodes-pro')
);

/*******************************************************
 *	Button Config
 ********************************************************/

$magee_shortcodes['button'] = array(
	'no_preview' => true,
	'icon' => 'fa-hand-o-up',
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __( 'Button Style', 'magee-shortcodes-pro' ),
			'desc' => __( 'Select the button\'s default style.', 'magee-shortcodes-pro' ),
			'options' => array(
				'normal' => __('Normal', 'magee-shortcodes-pro'),
				'dark' => __('Dark', 'magee-shortcodes-pro'),
				'light' => __('Light', 'magee-shortcodes-pro'),
				'2d' => __('2d', 'magee-shortcodes-pro'),
				'3d' => __('3d', 'magee-shortcodes-pro'),
				'line' => __('Line', 'magee-shortcodes-pro'),
				'line_dark' => __('Line Dark', 'magee-shortcodes-pro'),
				'line_light' => __('Line Light', 'magee-shortcodes-pro'),
				
			)
		),
		'link' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Button URL', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add the button\'s url eg: http://example.com.', 'magee-shortcodes-pro' )
		),
		'size' => array(
			'type' => 'select',
			'std' =>'medium',
			'label' => __( 'Button Size', 'magee-shortcodes-pro' ),
			'desc' => __( 'Select the button\'s size.', 'magee-shortcodes-pro' ),
			'options' => array(
				'small' => __('Small', 'magee-shortcodes-pro'),
				'medium' => __('Medium', 'magee-shortcodes-pro'),
				'large' => __('Large', 'magee-shortcodes-pro'),
				'xlarge' => __('XLarge', 'magee-shortcodes-pro'),
			)
		),
		
		'border_width' => array(
			'std' => '0',
			'type' => 'number',
			'max' => '50',
			'min' => '0',
			'label' => __('Border Width', 'magee-shortcodes-pro'),
			'desc' => __('In pixels (px), default: 2px.', 'magee-shortcodes-pro'),
		),
	
		'shape' => array(
			'type' => 'select',
			'label' => __( 'Button Shape', 'magee-shortcodes-pro' ),
			'desc' => __( 'Select the button\'s shape. Choose default for theme option selection.', 'magee-shortcodes-pro' ),
			'options' => array(
				'' => __('Default', 'magee-shortcodes-pro'),
				'square' => __('Square', 'magee-shortcodes-pro'),
				'rounded' => __('Rounded', 'magee-shortcodes-pro'),
				'full-rounded' => __('Full Rounded', 'magee-shortcodes-pro'),
			)
		),
		'shadow' => array(
			'type' => 'choose',
			'label' => __( 'Text Shadow', 'magee-shortcodes-pro' ),
			'desc' => __( 'Display shadow for button text.', 'magee-shortcodes-pro' ),
			'options' => $reverse_choices
		),
		'gradient' => array(
			'type' => 'choose',
			'label' => __( 'Gradient', 'magee-shortcodes-pro' ),
			'desc' => __( 'Display gradient for button.', 'magee-shortcodes-pro' ),
			'options' => $reverse_choices
		),
		'block' => array(
			'type' => 'choose',
			'label' => __( 'Block Button', 'magee-shortcodes-pro' ),
			'desc' => __( 'Display in full width.', 'magee-shortcodes-pro' ),
			'options' => $reverse_choices
		),
		
		'target' => array(
			'type' => 'choose',
			'label' => __( 'Button Target', 'magee-shortcodes-pro' ),
			'desc' => __( '_self = open in same window <br />_blank = open in new window.', 'magee-shortcodes-pro' ),
			'options' => array(
				'_self' => '_self',
				'_blank' => '_blank'
			)
		),
	
		'content' => array(
			'std' => __('Button Text', 'magee-shortcodes-pro'),
			'type' => 'text',
			'label' => __( 'Button\'s Text', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add the text that will display in the button.', 'magee-shortcodes-pro' ),
		),
		
		'color' => array(
			'type' => 'colorpicker',
			'desc' => __( 'Set background color for button.', 'magee-shortcodes-pro' ),
			'label' => __( 'Button Color', 'magee-shortcodes-pro' ),
			'std' => ''
		),
		
		'textcolor' => array(
			'type' => 'colorpicker',
			'std' => '#ffffff',
			'label' => __( 'Text Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set content color & border color for button.', 'magee-shortcodes-pro' )
		),
		
		'icon' => array(
			'type' => 'iconpicker',
			'label' => __( 'Button Icon', 'magee-shortcodes-pro' ),
			'desc' => __( 'Click an icon to select, click again to deselect.', 'magee-shortcodes-pro' ),
			'options' => $icons
		),
		
		'iconanimationtype' => array(
			'type' => 'select',
			'label' => __( 'Icon Animation Type', 'magee-shortcodes-pro' ),
			'desc' => __( 'Select the type of animation to use on the button icon.', 'magee-shortcodes-pro' ),
			'options' => $animation_type
		),
		
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),			
	),
	'shortcode' => '[ms_button style="{{style}}" link="{{link}}" size="{{size}}" shape="{{shape}}" shadow="{{shadow}}" block="{{block}}" target="{{target}}" gradient="{{gradient}}" color="{{color}}"  text_color="{{textcolor}}" icon="{{icon}}" icon_animation_type="{{iconanimationtype}}" border_width="{{border_width}}" class="{{class}}" id="{{id}}"]{{content}}[/ms_button]',
	'popup_title' => __( 'Button Shortcode', 'magee-shortcodes-pro'),
	'name' => __('buttons-shortcode/','magee-shortcodes-pro'),
);

/*-----------------------------------------------------------------------------------*/
/*	Carousel Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['carousel'] = array(
	'no_preview' => true,
	'icon' => 'fa-picture-o',
	'params' => array(
		'style' => array(
				'type' => 'select',
				'std' => '1',
				'label' => __( 'Style', 'magee-shortcodes-pro'),
				'desc' => __( 'Select the display style of carousel navigation.', 'magee-shortcodes-pro'),
				'options' =>array(		
					'1' => __( 'Style 1', 'magee-shortcodes-pro'),
					'2' => __( 'Style 2', 'magee-shortcodes-pro'),
					'3' => __( 'Style 3', 'magee-shortcodes-pro'),
				),
			),
		'columns' => array(
				'type' => 'select',
				'std' => '4',
				'label' => __( 'Columns', 'magee-shortcodes-pro'),
				'desc' => __( 'Choose column number for carousel.', 'magee-shortcodes-pro'),
				'options' =>array(		
					'1' => __( '1 Column', 'magee-shortcodes-pro'),
					'2' => __( '2 Columns', 'magee-shortcodes-pro'),
					'3' => __( '3 Columns', 'magee-shortcodes-pro'),
					'4' => __( '4 Columns', 'magee-shortcodes-pro'),
					'5' => __( '5 Columns', 'magee-shortcodes-pro'),
					'6' => __( '6 Columns', 'magee-shortcodes-pro'),
					'7' => __( '7 Columns', 'magee-shortcodes-pro'),
					'8' => __( '8 Columns', 'magee-shortcodes-pro'),
				),
			),
		'autoplay' => array(
			'std' => 'no',
			'type' => 'choose',
			'label' => __( 'Autoplay', 'magee-shortcodes-pro'),
			'desc' => __( 'Choose to autoplay the carousel.', 'magee-shortcodes-pro'),
			'options' => $reverse_choices 
		),	
		
		'autoplaytimeout' => array(
			'std' => '5000',
			'type' => 'text',
			'label' => __( 'Autoplay Timeout', 'magee-shortcodes-pro'),
			'desc' => __( 'Set timeout for autoplay.', 'magee-shortcodes-pro'),
		),
		'display_nav' => array(
			'std' => 'yes',
			'type' => 'choose',
			'label' => __( 'Display Navigation', 'magee-shortcodes-pro'),
			'desc' =>  __( 'Choose to display navigation for carousel', 'magee-shortcodes-pro'),
			'options' => $choices 
		),	
		'pag_style' => array(
			'std' => '',
			'type' => 'select',
			'label' => __( 'Pagination Style', 'magee-shortcodes-pro'),
			'desc' =>  __( 'Choose pagination style for carousel', 'magee-shortcodes-pro'),
			'options' => array(
			    ' ' =>  __( 'None', 'magee-shortcodes-pro'),
			    'style1' =>  __( 'Style 1', 'magee-shortcodes-pro'),
				'style2' =>  __( 'Style 2', 'magee-shortcodes-pro'),
				'style3' =>  __( 'Style 3', 'magee-shortcodes-pro'),
				'style4' =>  __( 'Style 4', 'magee-shortcodes-pro'),
			),
		),	
		'nav_color' => array(
			'std' => '',
			'type' => 'colorpicker',
			'label' => __( 'Nav Color', 'magee-shortcodes-pro'),
			'desc' => __( 'Set color for carousel navigation.', 'magee-shortcodes-pro'),
		),
		'nav_shape' => array(
				'type' => 'select',
				'std' => '1',
				'label' => __( 'Navigation Shape', 'magee-shortcodes-pro'),
				'desc' => __( 'Set shape for carousel navigation.', 'magee-shortcodes-pro'),
				'options' =>array(		
					'square' => __( 'Square', 'magee-shortcodes-pro'),
					'rounded' => __( 'Rounded', 'magee-shortcodes-pro'),
					'circle' => __( 'Circle', 'magee-shortcodes-pro'),
				),
			),
		'nav_size' => array(
				'type' => 'select',
				'std' => '1',
				'label' => __( 'Navigation Size', 'magee-shortcodes-pro'),
				'desc' => __( 'Set size for carousel navigation.', 'magee-shortcodes-pro'),
				'options' =>array(		
					'small' => __( 'Small', 'magee-shortcodes-pro'),
					'middle' => __( 'Middle', 'magee-shortcodes-pro'),
					'large' => __( 'Large', 'magee-shortcodes-pro'),
				),
			),
		
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
				
	),
	'shortcode' => "[ms_carousel style=\"{{style}}\" columns=\"{{columns}}\" display_nav=\"{{display_nav}}\" pag_style=\"{{pag_style}}\" autoplay=\"{{autoplay}}\" autoplaytimeout=\"{{autoplaytimeout}}\"  nav_color=\"{{nav_color}}\" nav_shape=\"{{nav_shape}}\" nav_size=\"{{nav_size}}\" class=\"{{class}}\" id=\"{{id}}\"]\r\n{{child_shortcode}}[/ms_carousel]",
	'popup_title' => __( 'Carousel Shortcode', 'magee-shortcodes-pro'),
	'child_shortcode' => array(
		'params' => array(
		
		'content' => array(
			'std' => __('Carousel Item Content', 'magee-shortcodes-pro'),
			'type' => 'textarea',
			'label' => __( 'Carousel Item Content', 'magee-shortcodes-pro'),
			'desc' => '',
		)
		
		),	
		
	'shortcode' => "[ms_carousel_item]{{content}}[/ms_carousel_item]\r\n",
		),
	'name' => __('carousel-shortcode/','magee-shortcodes-pro'),
);

/*-----------------------------------------------------------------------------------*/
/*	Chart Bar Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['chart_bar'] = array(
	'no_preview' => true,
	'icon' => 'fa-bar-chart',
	'params' => array(
	    'width' => array(
		    'std' => '600',
			'type' => 'number',
			'max' => '1000',
			'min' => '0', 
			'label' => __( 'Canvas Width','magee-shortcodes-pro'),
			'desc' => '',
		),
		'height' => array(
		    'std' => '400',
			'type' => 'number',
			'max' => '1000',
			'min' => '0', 
			'label' => __( 'Canvas Height','magee-shortcodes-pro'),
			'desc' => '',
		),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
        'label' => array(
		    'std' => "'January','February','March','April','May','June'",
			'type' => 'text',
			'label' => __('Label For Line','magee-shortcodes-pro') ,
			'desc' => __( 'separate multiple tags added to chart line with commas','magee-shortcodes-pro')
		),  
	),
	'shortcode' => "[ms_chart_bar width=\"{{width}}\" height=\"{{height}}\" class=\"{{class}}\" id=\"{{id}}\" label=\"{{label}}\"]\r\n{{child_shortcode}}[/ms_chart_bar]",	
	'popup_title' => __( 'Chart Bar Shortcode', 'magee-shortcodes-pro'),
	'child_shortcode' => array(
	'params' => array(		
	     'data' => array(
		     'std' => '456,479,324,569,702,600',
			 'type' => 'text',
			 'label' => __( 'Data','magee-shortcodes-pro'),
			 'desc' => __( 'separate values for each set of data with commas','magee-shortcodes-pro')
		 ),
		 'fillcolor' => array(
		     'std' => '#ACC284',  
		     'type' => 'colorpicker',
			 'label' => __( 'Fill Color','magee-shortcodes-pro'), 
			 'desc' => '', 
		 ),
		 'fillopacity' => array(
		      'std' => '0.4',
			  'type' => 'select',
			  'label' => __( 'Fill Opacity','magee-shortcodes-pro') ,
			  'desc' => '',
			  'options' => $opacity 
		 ),
		 'strokecolor' => array(
		     'std' => '#ACC26D',  
		     'type' => 'colorpicker',
			 'label' => __( 'Stroke Color','magee-shortcodes-pro'), 
			 'desc' => '', 
		 ),
		 'strokeopacity' => array(
		      'std' => '0.4',
			  'type' => 'select',
			  'label' => __( 'Stroke Opacity','magee-shortcodes-pro') ,
			  'desc' => '',
			  'options' => $opacity 
		 ),
	),
	'shortcode' => "[ms_bar data=\"{{data}}\" fillcolor=\"{{fillcolor}}\" fillopacity=\"{{fillopacity}}\" strokecolor=\"{{strokecolor}}\" strokeopacity=\"{{strokeopacity}}\"][/ms_bar]\r\n",	
	)
);

/*-----------------------------------------------------------------------------------*/
/*	Chart Doughnut Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['chart_doughnut'] = array(
	'no_preview' => true,
	'icon' => 'fa-circle-o-notch',
	'params' => array(
	    'width' => array(
		    'std' => '600',
			'type' => 'number',
			'max' => '1000',
			'min' => '0', 
			'label' => __( 'Canvas Width','magee-shortcodes-pro'),
			'desc' => '',
		),
		'height' => array(
		    'std' => '400',
			'type' => 'number',
			'max' => '1000',
			'min' => '0', 
			'label' => __( 'Canvas Height','magee-shortcodes-pro'),
			'desc' => '',
		),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'content' => array(  
		    'std' => "[ms_doughnut value=\"20\" color=\"#878BB6\"]\r\n[ms_doughnut value=\"40\" color=\"#4ACAB4\"]\r\n[ms_doughnut value=\"10\" color=\"#FF8153\"]\r\n[ms_doughnut value=\"30\" color=\"#FFEA88\"]\r\n",
			'type' => 'textarea',
			'label' => __( 'Content', 'magee-shortcodes-pro'),
		    'desc' => '', 
		),
	),
	'shortcode' => "[ms_chart_doughnut width=\"{{width}}\" height=\"{{height}}\" class=\"{{class}}\" id=\"{{id}}\"]\r\n{{content}}[/ms_chart_doughnut]",	
	'popup_title' => __( 'Chart Doughnut Shortcode', 'magee-shortcodes-pro'),
);

/*-----------------------------------------------------------------------------------*/
/*	Chart Line Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['chart_line'] = array(
	'no_preview' => true,
	'icon' => 'fa-line-chart',
	'params' => array(
	    'width' => array(
		    'std' => '600',
			'type' => 'number',
			'max' => '1000',
			'min' => '0', 
			'label' => __( 'Canvas Width','magee-shortcodes-pro'),
			'desc' => '',
		),
		'height' => array(
		    'std' => '400',
			'type' => 'number',
			'max' => '1000',
			'min' => '0', 
			'label' => __( 'Canvas Height','magee-shortcodes-pro'),
			'desc' => '',
		),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
        'label' => array(
		    'std' => "'January','February','March','April','May','June'",
			'type' => 'text',
			'label' => __('Label For Line','magee-shortcodes-pro') ,
			'desc' => ''
		),  
	),
	'shortcode' => "[ms_chart_line width=\"{{width}}\" height=\"{{height}}\" class=\"{{class}}\" id=\"{{id}}\" label=\"{{label}}\"]\r\n{{child_shortcode}}[/ms_chart_line]",	
	'popup_title' => __( 'Chart Line Shortcode', 'magee-shortcodes-pro'),
	'child_shortcode' => array(
	'params' => array(		
	     'data' => array(
		     'std' => '203,156,99,251,305,247',
			 'type' => 'text',
			 'label' => __( 'Data','magee-shortcodes-pro'),
			 'desc' => __( 'separate values for each set of data with commas','magee-shortcodes-pro')
		 ),
		 'fillcolor' => array(
		     'std' => '#ACC284',  
		     'type' => 'colorpicker',
			 'label' => __( 'Fill Color','magee-shortcodes-pro'), 
			 'desc' => '', 
		 ),
		 'fillopacity' => array(
		      'std' => '0.4',
			  'type' => 'select',
			  'label' => __( 'Fill Opacity','magee-shortcodes-pro') ,
			  'desc' => '',
			  'options' => $opacity 
		 ),
		 'strokecolor' => array(
		     'std' => '#ACC26D',  
		     'type' => 'colorpicker',
			 'label' => __( 'Stroke Color','magee-shortcodes-pro'), 
			 'desc' => '', 
		 ),
		 'pointcolor' => array(
		     'std' => '#ffffff',  
		     'type' => 'colorpicker',
			 'label' => __( 'Point Color','magee-shortcodes-pro'), 
			 'desc' => '', 
		 ),
		 'pointstrokecolor' => array(
		     'std' => '#9DB86D',  
		     'type' => 'colorpicker',
			 'label' => __( 'Point Stroke Color','magee-shortcodes-pro'), 
			 'desc' => '', 
		 ),
	),
	'shortcode' => "[ms_line data=\"{{data}}\" fillcolor=\"{{fillcolor}}\" fillopacity=\"{{fillopacity}}\" strokecolor=\"{{strokecolor}}\" pointcolor=\"{{pointcolor}}\" pointstrokecolor=\"{{pointstrokecolor}}\"][/ms_line]\r\n",	
	)
);
	
/*-----------------------------------------------------------------------------------*/
/*	Chart Pie Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['chart_pie'] = array(
	'no_preview' => true,
	'icon' => 'fa-pie-chart',
	'params' => array(
	    'width' => array(
		    'std' => '600',
			'type' => 'number',
			'max' => '1000',
			'min' => '0', 
			'label' => __( 'Canvas Width','magee-shortcodes-pro'),
			'desc' => ''
		),
		'height' => array(
		    'std' => '400',
			'type' => 'number',
			'max' => '1000',
			'min' => '0', 
			'label' => __( 'Canvas Height','magee-shortcodes-pro'),
			'desc' => ''
		),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'content' => array(  
		    'std' => "[ms_pie value=\"20\" color=\"#878BB6\"]\r\n[ms_pie value=\"40\" color=\"#4ACAB4\"]\r\n[ms_pie value=\"10\" color=\"#FF8153\"]\r\n[ms_pie value=\"30\" color=\"#FFEA88\"]\r\n",
			'type' => 'textarea',
			'label' => __( 'Content', 'magee-shortcodes-pro'),
		    'desc' => '', 
		),
	),
	'shortcode' => "[ms_chart_pie width=\"{{width}}\" height=\"{{height}}\" class=\"{{class}}\" id=\"{{id}}\"]\r\n{{content}}[/ms_chart_pie]",	
	'popup_title' => __( 'Chart Pie Shortcode', 'magee-shortcodes-pro')
);
	
/*******************************************************
 *	Columns Config
 ********************************************************/

$magee_shortcodes['column'] = array(
	'no_preview' => true,
	'icon' => 'fa-columns',
	'params' => array(
	
	),
	'shortcode' => "[ms_row]\r\n{{child_shortcode}}[/ms_row]",	
	'popup_title' => __( 'Column Shortcode', 'magee-shortcodes-pro'),	
	'name' => __('columns-shortcode/','magee-shortcodes-pro'),
	'child_shortcode' => array(
	'params' => array(				  
		'style' => array(
			'type' => 'select',
			'label' => __( 'Column Style', 'magee-shortcodes-pro'),
			'desc' => __( 'Select the size of column.', 'magee-shortcodes-pro'),
			'options' => array(
				'1/1' => __('1/1', 'magee-shortcodes-pro'),
				'1/2' => __('1/2', 'magee-shortcodes-pro'),
				'1/3' => __('1/3', 'magee-shortcodes-pro'),
				'1/4' => __('1/4', 'magee-shortcodes-pro'),
				'1/5' => __('1/5', 'magee-shortcodes-pro'),
				'1/6' => __('1/6', 'magee-shortcodes-pro'),
				'2/3' => __('2/3', 'magee-shortcodes-pro'),
				'2/5' => __('2/5', 'magee-shortcodes-pro'),
				'3/4' => __('3/4', 'magee-shortcodes-pro'),
				'3/5' => __('3/5', 'magee-shortcodes-pro'),
				'4/5' => __('4/5', 'magee-shortcodes-pro'),
				'5/6' => __('5/6', 'magee-shortcodes-pro'),
			)
		),
	
		'content' => array(
			'std' => __('Column Content', 'magee-shortcodes-pro'),
			'type' => 'textarea',
			'label' => __( ' Column Content', 'magee-shortcodes-pro'),
			'desc' => __( 'Insert the column\'s content', 'magee-shortcodes-pro'),
		),	
		'align' => array(
			'std' => __('left', 'magee-shortcodes-pro'),
			'type' => 'select',
			'label' => __( 'Content Align', 'magee-shortcodes-pro'),
			'desc' => '',
			'options' => array(
			    'left' => __( 'Left', 'magee-shortcodes-pro'),
			    'center' => __( 'Center', 'magee-shortcodes-pro'),
				'right' => __( 'Right', 'magee-shortcodes-pro'),
			),
		),		
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
	),	
	'shortcode' =>"[ms_column style=\"{{style}}\" align=\"{{align}}\" class=\"{{class}}\" id=\"{{id}}\"]{{content}}[/ms_column]\r\n",
	)
	
);

/*-----------------------------------------------------------------------------------*/
/*	Contact Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['contact'] = array(
	'no_preview' => true,
	'icon' => 'fa-envelope',
	'params' => array(
		
		
	'receiver' => array(
			'type' => 'text',
			'label' => __( 'Receiver Email', 'magee-shortcodes-pro'),
			'desc' =>  __( 'Set receiver email address for contact form.', 'magee-shortcodes-pro'),
			"std"=> get_option( 'admin_email' )
			
		),
	
	'style' => array(
			'type' => 'select',
			'label' => __( 'Style', 'magee-shortcodes-pro'),
			'desc' => __( 'Choose style for contact form.', 'magee-shortcodes-pro'),
			'options' => array( 
							   'normal' => __( 'Normal Style', 'magee-shortcodes-pro'),
							   'classic' =>  __( 'Classic Style', 'magee-shortcodes-pro'),
							   'outline' => __( 'Outline Style', 'magee-shortcodes-pro'),
							   'background' => __( 'Background Style', 'magee-shortcodes-pro')
							   )
		),

	'color' => array(
			'type' => 'colorpicker',
			'label' => __( 'Button / Border Color', 'magee-shortcodes-pro'),
			'desc' => __( 'Set main color for contact form.', 'magee-shortcodes-pro'),
			'std' => '#963'
		),
	'terms' =>array(
			'type' => 'choose',
			'label' => __( 'Display Terms Check Box', 'magee-shortcodes-pro'),
			'desc' => __( 'Choose to display terms check box.', 'magee-shortcodes-pro'),
			'std' => 'yes',
			'options' => array( 'yes' => __('Yes','magee-shortcodes-pro'), 'no' => __('No' ,'magee-shortcodes-pro') )
		),
     'content' => array(
			'std' => 'I have read and understood your reasonable terms <span class="required">*</span>',
			'type' => 'textarea',
			'label' => __( 'Terms Text', 'magee-shortcodes-pro'),
			'desc' => __( 'Insert content for terms of contact form.', 'magee-shortcodes-pro'),
		),	
	    'display_fields' => array(
		    'sid' => 'display_fields',
		    'type' => 'checkbox',
			'label' => __( 'Display More Fields' ,'magee-shortcodes-pro'),
			'desc'  => __( 'Choose more fields to be displayed','magee-shortcodes-pro'),
			'options' => array(
				'country'   => array('checked'=>'','checkbox_text'=>__('Country','magee-shortcodes-pro')),
				'city'      => array('checked'=>'','checkbox_text'=>__('City','magee-shortcodes-pro')),
				'telephone' => array('checked'=>'','checkbox_text'=>__('Telephone','magee-shortcodes-pro')),
				'company'   => array('checked'=>'','checkbox_text'=>__('Company','magee-shortcodes-pro')),
				'website'   => array('checked'=>'','checkbox_text'=>__('Website','magee-shortcodes-pro')),
			)
		),
		'required_fields' => array(
		    'sid' => 'required_fields',
		    'type' => 'checkbox',
			'label' => __( 'Required Fields' ,'magee-shortcodes-pro'),
			'desc'  => __( 'Choose fields to be required','magee-shortcodes-pro'),
			'options' => array(
			    'name'      => array('checked'=>__('checked','magee-shortcodes-pro'),'checkbox_text'=>__('Name','magee-shortcodes-pro')),
				'email'     => array('checked'=>__('checked','magee-shortcodes-pro'),'checkbox_text'=>__('Email','magee-shortcodes-pro')),
				'country'   => array('checked'=>'','checkbox_text'=>__('Country','magee-shortcodes-pro')),
				'city'      => array('checked'=>'','checkbox_text'=>__('City','magee-shortcodes-pro')),
				'telephone' => array('checked'=>'','checkbox_text'=>__('Telephone','magee-shortcodes-pro')),
				'company'   => array('checked'=>'','checkbox_text'=>__('Company','magee-shortcodes-pro')),
				'website'   => array('checked'=>'','checkbox_text'=>__('Website','magee-shortcodes-pro')),
				'subject'   => array('checked'=>'','checkbox_text'=>__('Subject','magee-shortcodes-pro')),
				'message'   => array('checked'=>__('checked','magee-shortcodes-pro'),'checkbox_text'=>__('Message','magee-shortcodes-pro')),
			)
		),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		)
		
		
	),
	'shortcode' => '[ms_contact receiver="{{receiver}}"  style="{{style}}" color="{{color}}"  terms="{{terms}}" display_fields="{{display_fields}}" required_fields="{{required_fields}}" class="{{class}}" id="{{id}}"]{{content}}[/ms_contact]',
	'popup_title' => __( 'Contact Form Shortcode', 'magee-shortcodes-pro')
);

/*-----------------------------------------------------------------------------------*/
/*	Countdowns Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['countdowns'] = array(
	'no_preview' => true,
	'icon' => 'fa-calendar',
	'params' => array(
		
    'type' => array(
	      'std' => '',
		  'type' => 'select',
		  'label' => __( 'Type', 'magee-shortcodes-pro' ),
		  'desc' => __('Select type for countdown to show.', 'magee-shortcodes-pro'),
		  'options' => array(
		      'normal' => __('Normal','magee-shortcodes-pro'),
		      'circle' => __('Circle','magee-shortcodes-pro')
		  )
	 ),
	'endtime' => array(
			'std' => date('d-m-Y H:i',strtotime(' 1 month')),
			'type' => 'datepicker',
			'label' => __( 'Set end time for countdown.', 'magee-shortcodes-pro' ),
			'desc' => '',

		),
		'day_field_text' => array(
		    'std' => 'Days',
			'type' => 'text',
			'label' => __( 'Day Field Text','magee-shortcodes-pro' ),
			'desc' => '',   
		),
		'hours_field_text' => array(
		    'std' => 'Hours',
			'type' => 'text',
			'label' => __( 'Hours Field Text','magee-shortcodes-pro' ),
			'desc' => '',   
		),
		'minutes_field_text' => array(
		    'std' => 'Minutes',
			'type' => 'text',
			'label' => __( 'Minutes Field Text','magee-shortcodes-pro' ),
			'desc' => '',   
		),
		'seconds_field_text' => array(
		    'std' => 'Seconds',
			'type' => 'text',
			'label' => __( 'Seconds Field Text','magee-shortcodes-pro' ),
			'desc' => '',   
		),
	    'fontcolor' => array(
		    'std' => '',
			'type' => 'colorpicker',
			'label' => __( 'Font Color','magee-shortcodes-pro' ),
			'desc' => __( 'Set font color for countdown.', 'magee-shortcodes-pro')
		
		), 	
		'backgroundcolor' => array(
		     'std' => '',
			 'type' => 'colorpicker',
			 'label' => __( 'Background Color','magee-shortcodes-pro'),
			 'desc' => __( 'Set background color for countdown.','magee-shortcodes-pro')
		
		),
		'google_fonts' => array(
		     'std' => '',
			 'type' => 'more_select',
			 'label' => __( 'Google Fonts','magee-shortcodes-pro'),
			 'desc' => __( 'Choose google fonts for countdown.','magee-shortcodes-pro'),
			 'options' => $google_fonts,
		),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro' )
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro' )
		),
		'circle_type_day_color' => array(
		    'std' => '#1abc9c',
			'type' => 'colorpicker',
			'label' => __( 'Circle Type Day Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'If type is circle,the color to be countdowns day nav.', 'magee-shortcodes-pro' ) 
		),
		'circle_type_hours_color' => array(
		    'std' => '#2980b9',
			'type' => 'colorpicker',
			'label' => __( 'Circle Type Hours Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'If type is circle,the color to be countdowns hours nav.', 'magee-shortcodes-pro' ) 
		),
		'circle_type_minutes_color' => array(
		    'std' => '#8e44ad',
			'type' => 'colorpicker',
			'label' => __( 'Circle Type Minutes Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'If type is circle,the color to be countdowns minutes nav.', 'magee-shortcodes-pro' ) 
		),
		'circle_type_seconds_color' => array(
		    'std' => '#f39c12',
			'type' => 'colorpicker',
			'label' => __( 'Circle Type Seconds Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'If type is circle,the color to be countdowns seconds nav.', 'magee-shortcodes-pro' ) 
		),
		
	),
	'shortcode' => '[ms_countdowns type="{{type}}" nowtime="'.time().'" endtime="{{endtime}}" day_field_text="{{day_field_text}}" hours_field_text="{{hours_field_text}}" minutes_field_text="{{minutes_field_text}}" seconds_field_text="{{seconds_field_text}}" fontcolor="{{fontcolor}}" backgroundcolor="{{backgroundcolor}}" google_fonts="{{google_fonts}}" class="{{class}}" id="{{id}}" circle_type_day_color="{{circle_type_day_color}}" circle_type_hours_color="{{circle_type_hours_color}}" circle_type_minutes_color="{{circle_type_minutes_color}}" circle_type_seconds_color="{{circle_type_seconds_color}}"]',
	'popup_title' => __( 'Countdowns Shortcode', 'magee-shortcodes-pro' ),
	'name' => __('countdowns-shortcode/','magee-shortcodes-pro'),
);


/*-----------------------------------------------------------------------------------*/
/*	Counter Box Config
/*-----------------------------------------------------------------------------------*/


$magee_shortcodes['counter'] = array(
	'no_preview' => true,
	'icon' => 'fa-calculator',
	'params' => array(
		
	),
	'shortcode' => "[ms_row]\r\n{{child_shortcode}}[/ms_row]",
	'child_shortcode' => array(
		'params' => array(	
		    'box_width' => array(
			       'std' => '1/4',
			       'type' => 'select',
				   'label' => __( 'Box Width', 'magee-shortcodes-pro' ),
				   'desc' => __( 'Select size of counter box', 'magee-shortcodes-pro' ),
				   'options' => array(
						'1/1' => __('1/1', 'magee-shortcodes-pro'),
						'1/2' => __('1/2', 'magee-shortcodes-pro'),
						'1/3' => __('1/3', 'magee-shortcodes-pro'),
						'1/4' => __('1/4', 'magee-shortcodes-pro'),
						'1/5' => __('1/5', 'magee-shortcodes-pro'),
						'1/6' => __('1/6', 'magee-shortcodes-pro'),
						'2/3' => __('2/3', 'magee-shortcodes-pro'),
						'2/5' => __('2/5', 'magee-shortcodes-pro'),
						'3/4' => __('3/4', 'magee-shortcodes-pro'),
						'3/5' => __('3/5', 'magee-shortcodes-pro'),
						'4/5' => __('4/5', 'magee-shortcodes-pro'),
						'5/6' => __('5/6', 'magee-shortcodes-pro'),
					)
			   ),	
		    'top_icon' => array(
					'type' => 'iconpicker',
					'label' => __( 'Top Icon', 'magee-shortcodes-pro' ),
					'desc' => __( 'Click an icon to select, click again to deselect.', 'magee-shortcodes-pro' ),
					'options' => $icons
				),
			'top_icon_color' => array(
					'std' => '',
					'type' => 'colorpicker',
					'label' => __( 'Top Icon Color', 'magee-shortcodes-pro'),  
					'desc' => __( 'Set color for top icon.','magee-shortcodes-pro') 
			
				),
			'middle_left_icon' => array(
					'type' => 'iconpicker',
					'label' => __( 'Middle Left Icon', 'magee-shortcodes-pro' ),
					'desc' =>  __( 'Insert text before the number.', 'magee-shortcodes-pro' ),
					'options' => $icons
				),
				
				'middle_left_text' => array(
					'std' => '',
					'type' => 'text',
					'label' => __( 'Middle Left Text', 'magee-shortcodes-pro' ),
					'desc' => __( 'Left text of counter num', 'magee-shortcodes-pro' ),
				),
				
				'counter_num' => array(
					'std' => '100',
					'type' => 'number',
					'max' => '200',
					'min' => '0',
					'label' => __( 'Counter Num', 'magee-shortcodes-pro' ),
					'desc' => __( 'The animated counter number.', 'magee-shortcodes-pro' ),
				),
				'middle_right_text' => array(
					'std' => '',
					'type' => 'text',
					'label' => __( 'Middle Right Text', 'magee-shortcodes-pro' ),
					'desc' =>  __( 'Insert text after the number.', 'magee-shortcodes-pro' ),
				),
				
				'bottom_title' => array(
					'std' => '',
					'type' => 'text',
					'label' => __( 'Bottom Title', 'magee-shortcodes-pro' ),
					'desc' => __( 'Insert Title for counter.', 'magee-shortcodes-pro' ),
				),
				
				'border' => array(
					'type' => 'choose',
					'label' => __( 'Display Border', 'magee-shortcodes-pro' ),
					'desc' =>  __( 'Choose to display border for counter.', 'magee-shortcodes-pro' ),
					'options' => array( 
									   'no' => __('No', 'magee-shortcodes-pro' ),  
									   'yes' => __('Yes', 'magee-shortcodes-pro' ),  
									   )
									   
				),
			'class' => array(
				'std' => '',
				'type' => 'text',
				'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
				'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro' )
			),
			'id' => array(
				'std' => '',
				'type' => 'text',
				'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
				'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro' )
			)
		),
		'shortcode' => "[ms_counter box_width=\"{{box_width}}\" top_icon=\"{{top_icon}}\" top_icon_color=\"{{top_icon_color}}\" middle_left_icon=\"{{middle_left_icon}}\" counter_num=\"{{counter_num}}\"  middle_left_text=\"{{middle_left_text}}\" middle_right_text=\"{{middle_right_text}}\" bottom_title=\"{{bottom_title}}\" border=\"{{border}}\" class=\"{{class}}\" id=\"{{id}}\"]\r\n",
	),	
	'popup_title' => __( 'Counter Shortcode', 'magee-shortcodes-pro' ),
	'name' => __('counter-box-shortcode/','magee-shortcodes-pro'),
);

/*******************************************************
 *	Custom Box Config
 ********************************************************/
$magee_shortcodes['custom_box'] = array(
	'no_preview' => true,
	'icon' => 'fa-list-alt',
	'params' => array(
		'content' => array(
			'std' => __('Custom Box Content', 'magee-shortcodes-pro'),
			'type' => 'textarea',
			'label' => __( 'Content', 'magee-shortcodes-pro' ),
			'desc' => __( 'Insert content for custom box.', 'magee-shortcodes-pro' ),
		),
		'backgroundimage' => array(
				'type' => 'uploader',
				'label' => __( 'Background Image', 'magee-shortcodes-pro' ),
				'desc' => __( 'Upload an image to display in background of custom box.', 'magee-shortcodes-pro' ),
			), 
		'fixed_background' => array(
		        'type' => 'choose',
			    'std' => 'yes',
				'label' => __( 'Fixed Background', 'magee-shortcodes-pro' ),
				'desc' => __( 'Choose to fixed Background Image', 'magee-shortcodes-pro' ),
				'options' => $choices,
		   ),	
		'background_position' => array(
		    'type' => 'select',    
		    'std' => 'top left',
			'label' => __( 'Background Position' , 'magee-shortcodes-pro'), 
		    'desc' => __( 'Choose the postion of the background image' , 'magee-shortcodes-pro'),
			'options' => array(
							  'top left' => __( 'Top Left', 'magee-shortcodes-pro' ),
							  'top center' => __( 'Top Center', 'magee-shortcodes-pro' ),
							  'top right' => __( 'Top Right', 'magee-shortcodes-pro' ),
							  'center left' => __( 'Center Left', 'magee-shortcodes-pro' ),
							  'center center' => __( 'Center Center', 'magee-shortcodes-pro' ),
							  'center right' => __( 'Center Right', 'magee-shortcodes-pro' ),
							  'bottom left' => __( 'Bottom Left', 'magee-shortcodes-pro' ),
							  'bottom center' => __( 'Bottom Center', 'magee-shortcodes-pro' ),
							  'bottom right' => __( 'Bottom Right', 'magee-shortcodes-pro' )
							   )
		   ),
		'padding' => array(
			'std' => '30',
			'type' => 'number',
			'min' => '0',
			'max' => '100',
			'label' => __( 'Padding', 'magee-shortcodes-pro' ),
			'desc' => __( 'Content Padding. eg:30px', 'magee-shortcodes-pro')
		),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),			
	),
	'shortcode' => '[ms_custom_box  backgroundimage="{{backgroundimage}}" fixed_background="{{fixed_background}}" background_position="{{background_position}}" padding="{{padding}}" class="{{class}}" id="{{id}}"]{{content}}[/ms_custom_box]',
	'popup_title' => __( ' Custom Box Shortcode', 'magee-shortcodes-pro'),
	'name' => __('custom-box-shortcode/','magee-shortcodes-pro'),
);

/*-----------------------------------------------------------------------------------*/
/*	Dailymotion Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['dailymotion'] = array(
    'no_preview' => true,
	'icon' => 'fa-video-camera',
    'params' => array(
	
		'link' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Dailymotion URL', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add the URL the video will link to, ex: http://example.com.', 'magee-shortcodes-pro' ),
		),
		'width' => array(
		    'std' => '100%',
			'type' => 'text',
			'label' => __('Width','magee-shortcodes-pro'),
			'desc' => __('In pixels (px), eg:1px.','magee-shortcodes-pro'),
		),
	    'height' => array(
		    'std' => '100%',
			'type' => 'text',
			'label' => __('Height','magee-shortcodes-pro'),
			'desc' => __('In pixels (px), eg:1px.','magee-shortcodes-pro'), 
		),
		'mute' => array( 
		    'std' => '',  
		    'type' => 'choose',
			'label' => __('Mute Video' ,'magee-shortcodes-pro'),
			'desc' => __('Choose to mute the video.','magee-shortcodes-pro'), 
			'options' => $reverse_choices	 
		),
	    'autoplay' =>array(
		    'std' => '',
		    'type' => 'choose',
			'label' => __('Autoplay Video','magee-shortcodes-pro'),
			'desc' => __('Choose to autoplay the video.','magee-shortcodes-pro'), 
			'options' => array(
			    'yes' => __('Yes','magee-shortcodes-pro'), 
			    'no' => __('No','magee-shortcodes-pro'),
			)
		),
		'loop' =>array(
		    'std' => '',
		    'type' => 'choose',
			'label' => __('Loop Video','magee-shortcodes-pro'),
			'desc' => __('Choose to loop the video.','magee-shortcodes-pro'), 
			'options' => array(
			    'yes' => __('Yes','magee-shortcodes-pro'), 
			    'no' => __('No','magee-shortcodes-pro')
			)
		),
		'controls' =>array(
		    'std' => '',
		    'type' => 'choose',
			'label' => __('Show Controls','magee-shortcodes-pro'),
			'desc' => __('Choose to display controls for the video player.','magee-shortcodes-pro'), 
			'options' => array(
			    'yes' => __('Yes','magee-shortcodes-pro'), 
			    'no' => __('No','magee-shortcodes-pro')
			)
		),
		'highlight' => array(
		    'std' => '#3377dd',
			'type' => 'colorpicker',
			'label' => __( 'Highlight Color','magee-shortcodes-pro'),
			'desc' => __('Set color for highlights','magee-shortcodes-pro') ,  
		),
		'logo' => array(
		    'std' => 'yes',
			'type' => 'choose',
			'label' => __( 'Show Logo','magee-shortcodes-pro'),
			'desc' => __('Choose to display logo ','magee-shortcodes-pro') ,  
			'options' => $choices
		),
		'info' => array(
		    'std' => 'yes',
			'type' => 'choose',
			'label' => __( 'Show Info','magee-shortcodes-pro'),
			'desc' => __('Choose to display video info','magee-shortcodes-pro') ,  
			'options' => $choices
		),
		'related' => array(
		    'std' => 'no',
			'type' => 'choose',
			'label' => __( 'Show Related Videos','magee-shortcodes-pro'),
			'desc' => __('Choose to display related videos','magee-shortcodes-pro') ,  
			'options' => $choices
		),
		'quality' => array(
		    'std' => '1080',
			'type' => 'select',
			'label' => __( 'Quality','magee-shortcodes-pro'),
			'desc' => __('Select the default video playback quality','magee-shortcodes-pro') ,  
			'options' => array(
			      '240' => __( '240','magee-shortcodes-pro'),
			      '380' => __( '380','magee-shortcodes-pro'),
				  '480' => __( '480','magee-shortcodes-pro'),
				  '720' => __( '720','magee-shortcodes-pro'),  
				  '1080' => __( '1080','magee-shortcodes-pro'),
			      )
		),
	    'class' =>array(
		    'std' => '',
			'type' => 'text',
			'label' => __('CSS Class','magee-shortcodes-pro'),
			'desc' => __('Add a class to the wrapping HTML element.','magee-shortcodes-pro') 
		),   
	    'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
	),
	'shortcode' => '[ms_dailymotion link="{{link}}"  width="{{width}}" height="{{height}}" mute="{{mute}}" autoplay="{{autoplay}}" loop="{{loop}}" controls="{{controls}}" highlight="{{highlight}}" logo="{{logo}}" info="{{info}}" related="{{related}}" quality="{{quality}}" class="{{class}}" id="{{id}}"][/ms_dailymotion]',   
    'popup_title' => __( 'Dailymotion Shortcode', 'magee-shortcodes-pro' ),
	'name' => __('dailymotion-shortcode/','magee-shortcodes-pro'),
);       


/*******************************************************
 *	Divider Config
 ********************************************************/

$magee_shortcodes['divider'] = array(
	'no_preview' => true,
	'icon' => 'fa-ellipsis-h',
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __( 'Divider Style', 'magee-shortcodes-pro' ),
			'desc' => __( 'Select the Divider\'s Style.', 'magee-shortcodes-pro' ),
			'options' => array(
				'normal' => __('Normal', 'magee-shortcodes-pro'),
				'shadow' => __('Shadow', 'magee-shortcodes-pro'),
				'dashed' => __('Dashed', 'magee-shortcodes-pro'),
				'dotted' => __('Dotted', 'magee-shortcodes-pro'),
				'double_line' => __('Double Line', 'magee-shortcodes-pro'),
				'double_dashed' => __('Double Dashed', 'magee-shortcodes-pro'),
				'double_dotted' => __('Double Dotted', 'magee-shortcodes-pro'),
				'image' => __('Image', 'magee-shortcodes-pro'),
				'icon' => __('Icon', 'magee-shortcodes-pro'),
				'back_to_top' => __('Back to Top', 'magee-shortcodes-pro'),
			)
		),
		'width' => array(
			'std' => '100%',
			'type' => 'text',
			'label' => __( 'Width', 'magee-shortcodes-pro' ),
			'desc' => __( 'In pixels. Default: 100%', 'magee-shortcodes-pro' ),
		),
		'align' => array(
			'type' => 'select',
			'label' => __( 'Align', 'magee-shortcodes-pro' ),
			'desc' => __( 'When the width is not 100%.', 'magee-shortcodes-pro' ),
			'options' => array(
				'left' => __('Left', 'magee-shortcodes-pro'),
				'center' => __('Center', 'magee-shortcodes-pro'),
			)
		),
		'margin_top' => array(
			'std' => '30',
			'type' => 'number',
			'min' => '0',
			'max' => '100',
			'label' => __( 'Margin Top', 'magee-shortcodes-pro' ),
			'desc' => __( 'Spacing above the separator. In pixels.', 'magee-shortcodes-pro' ),
		),
		'margin_bottom' => array(
			'std' => '30',
			'type' => 'number',
			'max' => '100',
			'min' => '0',
			'label' => __( 'Margin Bottom', 'magee-shortcodes-pro' ),
			'desc' => __( 'Spacing under the separator. In pixels.', 'magee-shortcodes-pro' ),
		),
		
		'border_size' => array(
				'std' => '5',
				'type' => 'number',
				'max' => '50',
				'min' => '0',
				'label' => __( 'Border Size', 'magee-shortcodes-pro' ),
				'desc' => __( 'In pixels (px), eg: 1px. ', 'magee-shortcodes-pro' ),
		 ),
		'border_color' => array(
		        'std' => '#f2f2f2',
				'type' => 'colorpicker',
				'label' => __( 'Border Color', 'magee-shortcodes-pro' ),
				'desc' => __( 'Set the border color.', 'magee-shortcodes-pro' )
			),
		
		'icon' => array(
				'type' => 'iconpicker',
				'label' => __( 'Icon', 'magee-shortcodes-pro' ),
				'desc' => __( 'Click an icon to select, click again to deselect.', 'magee-shortcodes-pro' ),
				'options' => $icons
			),	
	
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),			
	),
	'shortcode' => '[ms_divider style="{{style}}" align="{{align}}"  width="{{width}}"  margin_top="{{margin_top}}" margin_bottom="{{margin_bottom}}" border_size="{{border_size}}" border_color="{{border_color}}" icon="{{icon}}" class="{{class}}" id="{{id}}"][/ms_divider]',
	'popup_title' => __( 'Divider Shortcode', 'magee-shortcodes-pro'),
	'name' => __('divider-shortcode/','magee-shortcodes-pro'),
);

/*-----------------------------------------------------------------------------------*/
/*	Document Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['document'] = array(
    'no_preview' => true,
	'icon' => 'fa-file-text-o',
	'params' => array(
	    'url' => array(
		     'std' => '', 
		     'type' => 'link',
			 'label' => __( 'Doc URL','magee-shortcodes-pro'), 
		     'desc' => __( 'Upload document to display. Supported formats: doc, xls, pdf etc.','magee-shortcodes-pro')
		),
		'width' => array(
			'std' => '300',
			'type' => 'number',
			'max' => '1000',
			'min' => '0',
			'label' => __( 'Width', 'magee-shortcodes-pro'),
			'desc' => __( 'Set width for doc.', 'magee-shortcodes-pro')
		),
		'height' => array(
			'std' => '300',
			'type' => 'number',
			'max' => '1000',
			'min' => '0',
			'label' => __( 'Height', 'magee-shortcodes-pro'),
			'desc' => __( 'Set height for doc.', 'magee-shortcodes-pro')
		),
		'responsive' => array(
			'type' => 'choose',
			'label' => __( 'Responsive','magee-shortcodes-pro'),
		    'desc' => __( 'Choose to responsive or not', 'magee-shortcodes-pro'),
			'options' => $choices
		),
		'viewer' => array(
		    'type' => 'select',
			'label' => __('Viewer','magee-shortcodes-pro'),
		    'desc' => __( 'Choose viewer for document.','magee-shortcodes-pro'),
			'options' => array(
			    'google' => __( 'Google','magee-shortcodes-pro'),
			    'microsoft' => __( 'Microsoft','magee-shortcodes-pro'),
			)  
		),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
	),
	'shortcode' => '[ms_document url="{{url}}" width="{{width}}" height="{{height}}" responsive="{{responsive}}" viewer="{{viewer}}" class="{{class}}" id="{{id}}"][/ms_document]',
    'popup_title' => __( 'Document Shortcode','magee-shortcodes-pro'),
	'name' => __('document-shortcode/','magee-shortcodes-pro'),
);	

/*-----------------------------------------------------------------------------------*/
/*	Dropcap Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['dropcap'] = array(
	'no_preview' => true,
	'icon' => 'fa-square',
	'params' => array(
		'content' => array(
			'std' => 'A',
			'type' => 'textarea',
			'label' => __( 'Dropcap Letter', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add the letter to be used as dropcap', 'magee-shortcodes-pro' ),
		),
		'color' => array(
			'type' => 'colorpicker',
			'label' => __( 'Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Controls the color of the dropcap letter. Leave blank for theme option selection.', 'magee-shortcodes-pro')
		),		
		'boxed' => array(
			'type' => 'choose',
			'label' => __( 'Boxed Dropcap', 'magee-shortcodes-pro' ),
			'desc' => __( 'Choose to get a boxed dropcap.', 'magee-shortcodes-pro' ),
			'options' => $reverse_choices
		),
		'boxedradius' => array(
			'std' => '8',
			'type' => 'number',
			'max' => '50',
			'min' => '0',
			'label' => __( 'Box Radius', 'magee-shortcodes-pro' ),
			'desc' => __('Choose the radius of the boxed dropcap. In pixels (px), eg: 1px', 'magee-shortcodes-pro')
		),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
	),
	'shortcode' => '[ms_dropcap color="{{color}}" boxed="{{boxed}}" boxed_radius="{{boxedradius}}" class="{{class}}" id="{{id}}"]{{content}}[/ms_dropcap]',
	'popup_title' => __( 'Dropcap Shortcode', 'magee-shortcodes-pro' ),
	'name' => __('dropcap-shortcode/','magee-shortcodes-pro'),
);

/*-----------------------------------------------------------------------------------*/
/*	Dummy_image Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['dummy_image'] = array(
    'no_preview' => true,
	'icon' => 'fa-picture-o',
	'params' => array(
	    'style' =>array(
		    'type' => 'select',
			'label' => __( 'Style','magee-shortcodes-pro'),
		    'desc' => __( 'Select style for dummy image','magee-shortcodes-pro'),
			'options' => array(
			    'any'       => __( 'Any', 'magee-shortcodes-pro' ),
				'transport' => __( 'Transport', 'magee-shortcodes-pro' ),
				'technics'  => __( 'Technics', 'magee-shortcodes-pro' ),
				'people'    => __( 'People', 'magee-shortcodes-pro' ),
				'sports'    => __( 'Sports', 'magee-shortcodes-pro' ),
				'cats'      => __( 'Cats', 'magee-shortcodes-pro' ),
				'city'      => __( 'City', 'magee-shortcodes-pro' ),
				'food'      => __( 'Food', 'magee-shortcodes-pro' ),
				'nightlife' => __( 'Night life', 'magee-shortcodes-pro' ),
				'fashion'   => __( 'Fashion', 'magee-shortcodes-pro' ),
				'animals'   => __( 'Animals', 'magee-shortcodes-pro' ),
				'business'  => __( 'Business', 'magee-shortcodes-pro' ),
				'nature'    => __( 'Nature', 'magee-shortcodes-pro' ),
				'abstract'  => __( 'Abstract', 'magee-shortcodes-pro' ),
			)
		), 
		'width' => array(
			'std' => '500',
			'type' => 'number',
			'max' => '1000',
			'min' => '0' ,
			'label' => __( 'Width', 'magee-shortcodes-pro'),
			'desc' => __( 'Set width for image.', 'magee-shortcodes-pro')
		),
		'height' => array(
			'std' => '300',
			'type' => 'number',
			'max' => '1000',
			'min' => '0',
			'label' => __( 'Height', 'magee-shortcodes-pro'),
			'desc' => __( 'Set height for image.', 'magee-shortcodes-pro')
		),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
	
	),
	'shortcode' => '[ms_dummy_image style="{{style}}" width="{{width}}" height="{{height}}" class="{{class}}" id="{{id}}"][/ms_dummy_image]' ,
    'popup_title' => __( 'Dummy Image Shortcode','magee-shortcodes-pro'),
	'name' => __('dummy-image-shortcode/','magee-shortcodes-pro'),
);
	

/*-----------------------------------------------------------------------------------*/
/*	Dummy_text Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['dummy_text'] = array(
    'no_preview' => true,
	'icon' => 'fa-text-height',
	'params' => array(
	    'style' =>array(
		    'type' => 'select',
			'label' => __( 'Style','magee-shortcodes-pro'),
		    'desc' => __( 'Select text type.','magee-shortcodes-pro'),
			'options' => array(
			    'paras' => __( 'Paragraphs', 'magee-shortcodes-pro' ),
				'words' => __( 'Words', 'magee-shortcodes-pro' ),
				'bytes' => __( 'Bytes', 'magee-shortcodes-pro' ),
			)
		), 
		'amount' => array(
		    'std' => '3',
			'type' => 'number',
			'max' => '100',
			'min' => '0',
			'label' => __( 'Amount','magee-shortcodes-pro'),
			'desc' => __( 'Choose how many paragraphs or words to show','magee-shortcodes-pro')
		),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
	),
	'shortcode' => '[ms_dummy_text style="{{style}}" amount="{{amount}}" class="{{class}}" id="{{id}}"][/ms_dummy_text]' ,
    'popup_title' => __( 'Dummy Text Shortcode','magee-shortcodes-pro'),
	'name' => __('dummy-text-shortcode/','magee-shortcodes-pro'),
);
	

/*-----------------------------------------------------------------------------------*/
/*	Expand Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['expand'] = array(
    'no_preview' => true,
	'icon' => 'fa-sort-amount-asc',
	'params' => array(
	    'more_icon' => array(
			'type' => 'iconpicker',
			'label' => __('More Icon' ,'magee-shortcodes-pro'),
			'desc' => __('Set icon for expand title. Click an icon to select, click again to deselect.','magee-shortcodes-pro'),
			'options' => $icons
		),
		'more_icon_color' => array(
		    'std' => '', 
			'type' => 'colorpicker',
			'label' => __('More Icon Color' ,'magee-shortcodes-pro'),
			'desc' => __('Set color for more icon.','magee-shortcodes-pro'),			
		),
	    'more_text' => array(
		    'std' => '',
			'type' => 'text',
			'label' => __( 'More Text', 'magee-shortcodes-pro'),
			'desc' => __( 'Set text for expand title.', 'magee-shortcodes-pro'),
		),
		'less_icon' => array(
			'type' => 'iconpicker',
			'label' => __('Less Icon' ,'magee-shortcodes-pro'),
			'desc' => __('Set icon for fold title. Click an icon to select, click again to deselect.','magee-shortcodes-pro'),
			'options' => $icons
		),
		'less_icon_color' => array(
		    'std' => '', 
			'type' => 'colorpicker',
			'label' => __('Less Icon Color' ,'magee-shortcodes-pro'),
			'desc' => __('Set color for less icon.','magee-shortcodes-pro'),			
		),
	    'less_text' => array(
		    'std' => '',
			'type' => 'text',
			'label' => __( 'Less Text', 'magee-shortcodes-pro'),
			'desc' => __( 'Set text for fold title. ', 'magee-shortcodes-pro'),
		), 
	    'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __( 'Content', 'magee-shortcodes-pro'),
			'desc' => __( 'This text block can be expanded.', 'magee-shortcodes-pro')
		),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
	),
    'shortcode' => '[ms_expand class="{{class}}" id="{{id}}" more_icon="{{more_icon}}" more_icon_color="{{more_icon_color}}" more_text="{{more_text}}" less_icon="{{less_icon}}" less_icon_color="{{less_icon_color}}" less_text="{{less_text}}"]{{content}}[/ms_expand]',
	'popup_title' => __( 'Expand Shortcode', 'magee-shortcodes-pro'),
	'name' => __('expand-shortcode/','magee-shortcodes-pro'),
);

/*-----------------------------------------------------------------------------------*/
/*	Feature Boxes Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['featurebox'] = array(
	'no_preview' => true,
	'icon' => 'fa-list-alt',
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __( 'Feature Box Style', 'magee-shortcodes-pro' ),
			'desc' => __( 'Select the Feature Box\'s Style.', 'magee-shortcodes-pro' ),
			'options' => array(
				'1' => __('Icon on Top of Title', 'magee-shortcodes-pro'),
				'2' => __('Icon Beside Title and Content', 'magee-shortcodes-pro'),
				'3' => __('Icon Beside Title', 'magee-shortcodes-pro'),
				'4' => __('Boxed', 'magee-shortcodes-pro'),
			)
		),
		
		'title' => array(
				'std' => 'Feature Box',
				'type' => 'text',
				'label' => __( 'Title', 'magee-shortcodes-pro' ),
				'desc' => __( 'Insert title for feature box.', 'magee-shortcodes-pro' ),
		 ),
		
		'title_font_size' => array(
				'std' => '18',
				'type' => 'number',
				'max' => '50',
				'min' => '0',
				'label' => __( 'Title Font Size', 'magee-shortcodes-pro' ),
				'desc' => __( 'Set font size for title of feature box.', 'magee-shortcodes-pro' ),
		 ),
		'title_color' => array(
			'type' => 'colorpicker',
			'label' => __( 'Title Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set color for title of feature box.', 'magee-shortcodes-pro' ),
			),
		'icon_animation_type' => array(
			'type' => 'select',
			'label' => __( 'Icon Hover Animation', 'magee-shortcodes-pro' ),
			'desc' => __( 'Select the Icon\'s Animation.', 'magee-shortcodes-pro' ),
			'options' => $animation_type
		),
		'icon' => array(
			'type' => 'icon',
			'label' => __( 'Icon', 'magee-shortcodes-pro' ),
			'desc' => __( 'Click an icon to select, click again to deselect.', 'magee-shortcodes-pro' ),
			'options' => $icons
			),
		 'icon_size' => array(
				'std' => '46',
				'type' => 'number',
				'max' => '100',
				'min' => '0',
				'label' => __( 'Icon Size', 'magee-shortcodes-pro' ),
				'desc' =>  __( 'Set size for icon of feature box.', 'magee-shortcodes-pro' ),
		 ),
		'icon_color' => array(
			'type' => 'colorpicker',
			'label' => __( 'Icon Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set color for icon of feature box.', 'magee-shortcodes-pro' ),
			),
		'icon_border_color' => array(
			'type' => 'colorpicker',
			'label' => __( 'Icon Border Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set border color for icon of feature box.', 'magee-shortcodes-pro' ),
			),
		'icon_border_width' => array(
				'std' => '0',
				'type' => 'number',
				'max' => '50',
				'min' => '0',
				'label' => __( 'Icon Border Width', 'magee-shortcodes-pro' ),
				'desc' =>  __( 'Set border width for icon of feature box.', 'magee-shortcodes-pro' ),
		 ),
		
		'flip_icon' => array(
			'std' => '',
			'type' => 'select',
			'label' => __( 'Flip Icon', 'magee-shortcodes-pro' ),
			'desc' => __( 'Choose to flip the icon of feature box.', 'magee-shortcodes-pro' ),
			'options' => array(
				'none' => __('None', 'magee-shortcodes-pro'),
				'horizontal' => __('Horizontal', 'magee-shortcodes-pro'),
				'vertical' => __('Vertical', 'magee-shortcodes-pro'),
		     )
			),
			
		'spinning_icon' => array(
			'std' => '',
			'type' => 'choose',
			'label' => __( 'Spinning Icon', 'magee-shortcodes-pro' ),
			'desc' => __( 'Choose to spin the icon of feature box.', 'magee-shortcodes-pro' ),
			'options' => $reverse_choices 
		),	
		
		 'icon_background_color' => array(
			'type' => 'colorpicker',
			'label' => __( 'Icon Circle Background Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set background for icon circle of feature box.', 'magee-shortcodes-pro' ),
		),
		 
		'alignment' => array(
			'std' => '',
			'type' => 'choose',
			'label' => __( 'Icon Alignment', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set alignment for style2/style3 of feature box.', 'magee-shortcodes-pro' ),
			'options' => array(
				'left' => __('Left', 'magee-shortcodes-pro'),
				'right' => __('Right', 'magee-shortcodes-pro'),
		
			)
		),	
		'icon_circle' => array(
			'std' => '',
			'type' => 'choose',
			'label' => __( 'Icon Circle', 'magee-shortcodes-pro' ),
			'desc' => __( 'Choose to display icon of feature box in circle.', 'magee-shortcodes-pro' ),
			'options' => $reverse_choices 
		),	
		
		'icon_image' => array(
				'std' => '',
				'type' => 'uploader',
				'label' => __( 'Icon Image', 'magee-shortcodes-pro' ),
				'desc' => __( 'To upload your own icon image, remember to deselect icon above.', 'magee-shortcodes-pro' ),
		 ),
		'icon_image_width' => array(
				'std' => '0',
				'type' => 'number',
				'max' => '1000',
				'min' => '0',
				'label' => __( 'Icon Image Width', 'magee-shortcodes-pro' ),
				'desc' => __( 'If using custom icon image, set icon image width. In percentage of pixels (px), eg: 1px.', 'magee-shortcodes-pro' ),
		 ),
		'icon_image_height' => array(
				'std' => '',
				'type' => 'number',
				'max' => '1000',
				'min' => '0',
				'label' => __( 'Icon Image Height', 'magee-shortcodes-pro' ),
				'desc' => __( 'If using custom icon image, set icon image height. In percentage of pixels (px), eg: 1px.', 'magee-shortcodes-pro' ),
		 ),
		
		
		'link_url' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Link URL', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set link for feature box, eg: http://example.com.', 'magee-shortcodes-pro' ),
		),	
		'link_target' => array(
			'std' => '',
			'type' => 'choose',
			'label' => __( 'Link Target', 'magee-shortcodes-pro' ),
			'desc' => __( '_self = open in same window _blank = open in new window.', 'magee-shortcodes-pro' ),
			'options' => array(
				'_blank' => __('_blank', 'magee-shortcodes-pro'),
				'_self' => __('_self', 'magee-shortcodes-pro'),
		
			)
		),	
		'link_text' => array(
				'std' => 'Read More',
				'type' => 'text',
				'label' => __( 'Link Text', 'magee-shortcodes-pro' ),
				'desc' => __( 'Insert link text for feature box. It would not display if you leave it as blank.', 'magee-shortcodes-pro' ),
		 ),
		'link_color' => array(
			'type' => 'colorpicker',
			'label' => __( 'Link Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set color for link of feature box.', 'magee-shortcodes-pro' ),
		),
		'content_color' => array(
			'type' => 'colorpicker',
			'label' => __( 'Content Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set color for content of feature box.', 'magee-shortcodes-pro' ),
		),
		'content_box_background_color' => array(
			'type' => 'colorpicker',
			'label' => __( 'Set box background color for Boxed Style.', 'magee-shortcodes-pro' ),
			'desc' => __( 'For Boxed Style', 'magee-shortcodes-pro' ),
		),

		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),	
		'content' => array(
			'std' => __('Your Content Goes Here', 'magee-shortcodes-pro'),
			'type' => 'textarea',
			'label' => __( 'Feature Box Content', 'magee-shortcodes-pro' ),
			'desc' => '',
		),
	),
	'shortcode' => '[ms_featurebox style="{{style}}" title_font_size="{{title_font_size}}" title_color="{{title_color}}" icon_circle="{{icon_circle}}" icon_size="{{icon_size}}" title="{{title}}" icon="{{icon}}" alignment="{{alignment}}" icon_animation_type="{{icon_animation_type}}" icon_color="{{icon_color}}" icon_background_color="{{icon_background_color}}" icon_border_color="{{icon_border_color}}" icon_border_width="{{icon_border_width}}"  flip_icon="{{flip_icon}}" spinning_icon="{{spinning_icon}}" icon_image="{{icon_image}}" icon_image_width="{{icon_image_width}}" icon_image_height="{{icon_image_height}}" link_url="{{link_url}}" link_target="{{link_target}}" link_text="{{link_text}}" link_color="{{link_color}}" content_color="{{content_color}}" content_box_background_color="{{content_box_background_color}}" class="{{class}}" id="{{id}}"]{{content}}[/ms_featurebox]',
	'popup_title' => __( 'Feature Box Shortcode', 'magee-shortcodes-pro'),
	'name' => __('feature-box-shortcode/','magee-shortcodes-pro'),
);


/*******************************************************
 *	Flip Box Config
 ********************************************************/

$magee_shortcodes['flip_box'] = array(
	'no_preview' => true,
	'icon' => 'fa-list-alt',
	'params' => array(
		'direction' => array(
			'type' => 'select',
			'label' => __( 'Direction', 'magee-shortcodes-pro' ),
			'desc' => __( 'Select flip directioon.', 'magee-shortcodes-pro' ),
			'options' => array(
				'horizontal' => __('Horizontal', 'magee-shortcodes-pro'),
				'vertical' => __('Vertical', 'magee-shortcodes-pro'),
				'flip-left' => __('Flip Left', 'magee-shortcodes-pro'),
				'flip-right' => __('Flip Right', 'magee-shortcodes-pro'),
				'flip-top' => __('Flip Top', 'magee-shortcodes-pro'),
				'flip-bottom' => __('Flip Bottom', 'magee-shortcodes-pro'),
				'slide-left' => __('Slide Left', 'magee-shortcodes-pro'),
				'slide-right' => __('Slide Right', 'magee-shortcodes-pro'),
				'slide-top' => __('Slide Top', 'magee-shortcodes-pro'),
				'slide-bottom' => __('Slide Bottom', 'magee-shortcodes-pro'),
			)			
		),
		'front_paddings' => array(
				'std' => '15',
				'type' => 'number',
				'max' => '100',
				'min' => '0',
				'label' => __( 'Front Container Paddings', 'magee-shortcodes-pro' ),
				'desc' => __( 'Set paddings for front container of flip box.', 'magee-shortcodes-pro' ),
			),
		'front_background' => array(
			'type' => 'colorpicker',
			'std'=>'#6ab1c9',
			'label' => __( 'Front Background Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set background color for front container of flip box.', 'magee-shortcodes-pro')
		),
		'front_color' => array(
			'type' => 'colorpicker',
			'std' => '#ffffff',
			'label' => __( 'Front Font Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Custom setting only. Set the background color for custom alert boxes.', 'magee-shortcodes-pro')
		),
		'front_content' => array(
			'std' => __('Front Content', 'magee-shortcodes-pro'),
			'type' => 'textarea',
			'label' => __( 'Front content.', 'magee-shortcodes-pro' ),
			'desc' => __( 'Insert content for front container of flip box.', 'magee-shortcodes-pro' ),
		),
		'back_paddings' => array(
				'std' => '15',
				'type' => 'number',
				'max' => '100',
				'min' => '0',
				'label' => __( 'Back Container Paddings', 'magee-shortcodes-pro' ),
				'desc' => __( 'Set paddings for back container of flip box.', 'magee-shortcodes-pro' ),
			),
		'back_background' => array(
			'std'=>'#538b9d',
			'type' => 'colorpicker',
			'label' => __( 'Back Background Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set background color for back container of flip box.', 'magee-shortcodes-pro')
		),
		'back_color' => array(
			'std' =>'#ffffff',
			'type' => 'colorpicker',
			'label' => __( 'Back Font Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Custom setting only. Set the background color for custom alert boxes.', 'magee-shortcodes-pro')
		),
		'back_content' => array(
			'std' => __('Back Content', 'magee-shortcodes-pro'),
			'type' => 'textarea',
			'label' => __( 'Back Content.', 'magee-shortcodes-pro' ),
			'desc' => __('Insert content for back container of flip box.', 'magee-shortcodes-pro'),
		),
		
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),			
	),
	'shortcode' => '[ms_flip_box direction="{{direction}}" front_paddings="{{front_paddings}}"  front_background="{{front_background}}" front_color="{{front_color}}" back_paddings="{{back_paddings}}" back_background="{{back_background}}" back_color="{{back_color}}" class="{{class}}" id="{{id}}"]{{front_content}}|||{{back_content}}[/ms_flip_box]',
	'popup_title' => __( 'Flip Box Shortcode', 'magee-shortcodes-pro'),
	'name' => __('flip-box-shortcode/','magee-shortcodes-pro'),
);

/*-----------------------------------------------------------------------------------*/
/*	Google Map Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['google_map'] = array(
	'no_preview' => true,
	'icon' => 'fa-globe',
	'params' => array(
		'type' => array(
			'type' => 'select',
			'label' => __( 'Map Type', 'magee-shortcodes-pro'),
			'desc' => __( 'Select the type of google map to display.', 'magee-shortcodes-pro'),
			'options' => array(
				'roadmap' => __('Roadmap', 'magee-shortcodes-pro'),
				'satellite' => __('Satellite', 'magee-shortcodes-pro'),
				'hybrid' => __('Hybrid', 'magee-shortcodes-pro'),
				'terrain' => __('Terrain', 'magee-shortcodes-pro')
			)
		),
		'width' => array(
			'std' => '100%',
			'type' => 'text',
			'label' => __( 'Map Width', 'magee-shortcodes-pro'),
			'desc' => __( 'Map width in percentage or pixels. ex: 100%, or 940px.', 'magee-shortcodes-pro')
		),
		'height' => array(
			'std' => '300px',
			'type' => 'text',
			'label' => __( 'Map Height', 'magee-shortcodes-pro'),
			'desc' => __( 'Map height in pixels. ex: 300px', 'magee-shortcodes-pro')
		),
		'zoom' => array(
			'std' => 14,
			'type' => 'select',
			'label' => __( 'Zoom Level', 'magee-shortcodes-pro'),
			'desc' => __( 'Higher number will be more zoomed in.', 'magee-shortcodes-pro'),
			'options' => magee_shortcodes_range( 25, false )
		),
		'scrollwheel' => array(
			'type' => 'choose',
			'label' => __( 'Scrollwheel on Map', 'magee-shortcodes-pro'),
			'desc' => __( 'Enable zooming using a mouse\'s scroll wheel.', 'magee-shortcodes-pro'),
			'options' => $choices
		),
		'scale' => array(
			'type' => 'choose',
			'label' => __( 'Show Scale Control on Map', 'magee-shortcodes-pro'),
			'desc' => __( 'Display the map scale.', 'magee-shortcodes-pro'),
			'options' => $choices
		),
		'zoom_pancontrol' => array(
			'type' => 'choose',
			'label' => __( 'Show Pan Control on Map', 'magee-shortcodes-pro'),
			'desc' => __( 'Displays pan control button.', 'magee-shortcodes-pro'),
			'options' => $choices
		),
		'animation' => array(
			'type' => 'choose',
			'label' => __( 'Address Pin Animation', 'magee-shortcodes-pro'),
			'desc' => __( 'Choose to animate the address pins when the map first loads.', 'magee-shortcodes-pro'),
			'options' => $choices
		),		
		'popup' => array(
			'type' => 'choose',
			'label' => __( 'Show tooltip by default', 'magee-shortcodes-pro'),
			'desc' => __( 'Display or hide the tooltip when the map first loads.', 'magee-shortcodes-pro'),
			'options' => $choices
		),

		'overlaycolor' => array(
			'type' => 'colorpicker',
			'label' => __( 'Map Overlay Color', 'magee-shortcodes-pro'),
			'desc' => __( 'Custom styling setting only. Pick an overlaying color for the map. Works best with "roadmap" type.', 'magee-shortcodes-pro')
		),
		
		'infoboxcontent' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __( 'Infobox Content', 'magee-shortcodes-pro'),
			'desc' => __( 'Custom styling setting only. Type in custom info box content to replace address string. For multiple addresses, separate info box contents by using the | symbol. ex: InfoBox 1|InfoBox 2|InfoBox 3', 'magee-shortcodes-pro'),
		),		
		'infoboxtextcolor' => array(
			'type' => 'colorpicker',
			'label' => __( 'Info Box Text Color', 'magee-shortcodes-pro'),
			'desc' => __( 'Custom styling setting only. Pick a color for the info box text.', 'magee-shortcodes-pro')
		),
		'infoboxbackgroundcolor' => array(
			'type' => 'colorpicker',
			'label' => __( 'Info Box Background Color', 'magee-shortcodes-pro'),
			'desc' => __( 'Custom styling setting only. Pick a color for the info box background.', 'magee-shortcodes-pro')
		),
		'icon' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __( 'Custom Marker Icon', 'magee-shortcodes-pro'),
			'desc' => __( 'Custom styling setting only. Use full image urls for custom marker icons or input "theme" for our custom marker. For multiple addresses, separate icons by using the | symbol or use one for all. ex: Icon 1|Icon 2|Icon 3', 'magee-shortcodes-pro'),
		),
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __( 'Address', 'magee-shortcodes-pro'),
			'desc' => __( 'Add address to the location which will show up on map. For multiple addresses, separate addresses by using the | symbol. <br />ex: Address 1|Address 2|Address 3', 'magee-shortcodes-pro'),
		),
		'api_key' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Google Map API Key', 'magee-shortcodes-pro'),
			'desc' => '',
		),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro'),
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro'),
		)
	),
	'shortcode' => '[ms_google_map address="{{content}}" type="{{type}}" overlay_color="{{overlaycolor}}" infobox_background_color="{{infoboxbackgroundcolor}}" infobox_text_color="{{infoboxtextcolor}}" infobox_content="{{infoboxcontent}}" icon="{{icon}}" width="{{width}}" height="{{height}}" zoom="{{zoom}}" scrollwheel="{{scrollwheel}}" scale="{{scale}}" zoom_pancontrol="{{zoom_pancontrol}}" popup="{{popup}}" animation="{{animation}}" api_key="{{api_key}}" class="{{class}}" id="{{id}}"][/ms_google_map]',
	'popup_title' => __( 'Google Map Shortcode', 'magee-shortcodes-pro')
);

/*-----------------------------------------------------------------------------------*/
/*	Heading Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['heading'] = array(
    'icon' => 'fa-header',
	'no_preview' => true,
	'params' => array(
					  
		'title' => array(
			'std' => 'Title Text',
			'type' => 'text',
			'label' => __( 'Title', 'magee-shortcodes-pro'),
            'desc' => __( 'Insert heading text', 'magee-shortcodes-pro')
		),
					  
		'style' => array(
			'type' => 'select',
			'label' => __( 'Style', 'magee-shortcodes-pro'),
			'std' => 'border',
            'desc' => __( 'Choose a heading style. Leave blank as default.', 'magee-shortcodes-pro'),
			'options' => array(
			    'none' => __('None','magee-shortcodes-pro'),
				'border' => __('Border','magee-shortcodes-pro'),
				'boxed' => __('Boxed','magee-shortcodes-pro'),
				'boxed-reverse' => __('Boxed-reverse','magee-shortcodes-pro'),
				'doubleline' => __('Doubleline','magee-shortcodes-pro')
			)
		),
		
		'color' => array(
			'type' => 'colorpicker',
			'label' => __( 'Font Color', 'magee-shortcodes-pro'),
            'desc' => __( 'Set color for heading text.', 'magee-shortcodes-pro'),
			),	
		'border_color' => array(
			'type' => 'colorpicker',
			'label' => __( 'Border Color', 'magee-shortcodes-pro'),
            'desc' => __( 'Set border color for heading.', 'magee-shortcodes-pro'),
			),
		
		'text_align' => array(
			'type' => 'select',
			'label' => __( 'Text Align', 'magee-shortcodes-pro'),
            'desc' => __( 'Set text align for this heading.', 'magee-shortcodes-pro'),
			'options' => $textalign
		),
		'font_weight' => array(
			'type' => 'select',
			'std' => '400',
			'label' => __( 'Font Weight', 'magee-shortcodes-pro'),
            'desc' => __( 'Set font weight for heading text.', 'magee-shortcodes-pro'),
			'options' => array(
							   '100' => '100',
							   '200' => '200',
							   '300' => '300',
							   '400' => '400',
							   '500' => '500',
							   '600' => '600',
							   '700' => '700',
							   '800' => '800',
							   '900' => '900',
							   )
		),
		
		'font_size' => array(
			'std' => '36',
			'type' => 'number',
			'max' => '50',
			'min' => '0',
			'label' => __( 'Font Size', 'magee-shortcodes-pro'),
            'desc' => __( 'Set font size for heading text. In pixels (px), eg: 1px.', 'magee-shortcodes-pro'),
		),
		'margin_top' => array(
			'std' => '0',
			'type' => 'number',
			'max' => '100',
			'min' => '0',
			'label' => __( 'Margin Top', 'magee-shortcodes-pro'),
            'desc' => __( 'In pixels (px), eg: 1px.', 'magee-shortcodes-pro'),
		),
		'margin_bottom' => array(
			'std' => '0',
			'type' => 'number',
			'max' => '100',
			'min' => '0',
			'label' => __( 'Margin Bottom', 'magee-shortcodes-pro'),
            'desc' => __( 'In pixels (px), eg: 1px.', 'magee-shortcodes-pro'),
		),
		'border_width' => array(
			'std' => '5',
			'type' => 'number',
			'max' => '50',
			'min' => '0',
			'label' => __( 'Border Width', 'magee-shortcodes-pro'),
            'desc' => __( 'In pixels (px), eg: 1px.', 'magee-shortcodes-pro'),
		),
        'responsive_text' => array(
		    'std' => '',
			'type' => 'choose',
			'label' => __( 'Responsive Text','magee-shortcodes-pro'),
            'desc' => __( 'Choose to display responsive text.', 'magee-shortcodes-pro'),
			'options' => $reverse_choices		
		),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),	
		
		
		),
	'shortcode' => '[ms_heading style="{{style}}" color="{{color}}" border_color="{{border_color}}" text_align="{{text_align}}" font_weight="{{font_weight}}" font_size="{{font_size}}" margin_top="{{margin_top}}" margin_bottom="{{margin_bottom}}" border_width="{{border_width}}" responsive_text="{{responsive_text}}"  class="{{class}}" id="{{id}}"]{{title}}[/ms_heading]',
	'popup_title' => __( 'Heading Shortcode', 'magee-shortcodes-pro'),
    'name' => __('heading-shortcode/','magee-shortcodes-pro'),  
);

/*-----------------------------------------------------------------------------------*/
/*	Highlight Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['highlight'] = array(
	'no_preview' => true,
	'icon' => 'fa-magic',
	'params' => array(

		'background_color' => array(
			'type' => 'colorpicker',
			'label' => __( 'Background Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set background color for highlight item.', 'magee-shortcodes-pro')
		),
		'border_radius' => array(
			'type' => 'number',
			'std' =>'5',
			'max' => '50',
			'min' => '0',
			'label' => __( 'Border Radius', 'magee-shortcodes-pro' ),
			'desc' => __( 'In pixels (px), eg: 1px.', 'magee-shortcodes-pro' ),
		),
		'color' => array(
			'type' => 'colorpicker',
			'label' => __( 'Font Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set font color for highlight item.', 'magee-shortcodes-pro')
		),
		'content' => array(
			'std' => __('Your Content Goes Here', 'magee-shortcodes-pro'),
			'type' => 'textarea',
			'label' => __( 'Content to Higlight', 'magee-shortcodes-pro' ),
			'desc' => __( 'Insert content to highlight.', 'magee-shortcodes-pro' ),
		),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),			

	),
	'shortcode' => '[ms_highlight background_color="{{background_color}}" border_radius="{{border_radius}}" color="{{color}}" class="{{class}}" id="{{id}}"]{{content}}[/ms_highlight]',
	'popup_title' => __( 'Highlight Shortcode', 'magee-shortcodes-pro' ),
	'name' => __('highlight-shortcode/','magee-shortcodes-pro'),
);


/*-----------------------------------------------------------------------------------*/
/*	Icon Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['icon'] = array(
	'icon' => 'fa-flag',
	'no_preview' => true,
	'params' => array(

	'icon' => array(
			'type' => 'icon',
			'label' => __( 'Icon', 'magee-shortcodes-pro'),
			'desc' => __( 'Click an icon to select, click again to deselect.', 'magee-shortcodes-pro'),
			'options' => $icons
			),
	'size' => array(
			'type' => 'number',
			'std' => '14',
			'max' => '50',
			'min' => '0',
			'label' => __( 'Icon Size', 'magee-shortcodes-pro'),
			'desc' => __( 'Set text size for item.', 'magee-shortcodes-pro'),
			),
	'color' => array(
			'type' => 'colorpicker',
			'std' => '#fdd200',
			'label' => __( 'Icon Color', 'magee-shortcodes-pro'),
			'desc' =>  __( 'Set color for icon.', 'magee-shortcodes-pro'),
		),
    'icon_box' => array(
	        'std' => '',  
	        'type' => 'choose',
	        'label' => __( 'Icon Box', 'magee-shortcodes-pro'),
            'desc' => __( 'Choose to display boxed icon.', 'magee-shortcodes-pro'),
			'options' => $reverse_choices
	    ),		
	'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
	'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),			

	),
	'shortcode' => '[ms_icon icon="{{icon}}" size="{{size}}" color="{{color}}" icon_box="{{icon_box}}" class="{{class}}" id="{{id}}"]',
	'popup_title' => __( 'Icon Shortcode', 'magee-shortcodes-pro'),
	'name' => __('icon-shortcode/','magee-shortcodes-pro'),
);

/*-----------------------------------------------------------------------------------*/
/*	Image Banner Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['image_banner'] = array(
	'no_preview' => true,
	'icon' => 'fa-file-image-o',
	'params' => array(
		
		'image' => array(
				'type' => 'uploader',
				'label' => __( 'Image', 'magee-shortcodes-pro'),
				
			), 
			'link' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Image Link', 'magee-shortcodes-pro'),
			
		),		
			
		'target' => array(
			'type' => 'choose',
			'label' => __( 'Link Target', 'magee-shortcodes-pro'),
			'options' => array(
				'_blank' => __('_blank', 'magee-shortcodes-pro'),
				'_self' => __('_self', 'magee-shortcodes-pro'),
			)
		),
		
		'horizontal_align' => array(
			'type' => 'select',
			'label' => __( 'Horizontal Align', 'magee-shortcodes-pro'),
			'desc' => __( 'Content horizontal align.', 'magee-shortcodes-pro'),
			'options' => array(
				'center' => __('Center', 'magee-shortcodes-pro'),
				'left' => __('Left', 'magee-shortcodes-pro'),
				'right' => __('Right', 'magee-shortcodes-pro'),
			)
		),
		'vertical_align' => array(
			'type' => 'select',
			'label' => __( 'Vertical Align', 'magee-shortcodes-pro'),
			'desc' => __( 'Content vertical align.', 'magee-shortcodes-pro'),
			'options' => array(
				'middle' => __('Middle', 'magee-shortcodes-pro'),
				'top' => __('Top', 'magee-shortcodes-pro'),
				'bottom' => __('Bottom', 'magee-shortcodes-pro'),
			)
		),
		
		'zoom_effect' => array(
			'type' => 'select',
			'label' => __( 'Zoom Effect', 'magee-shortcodes-pro'),
			'desc' => __( 'Image zoom effect.', 'magee-shortcodes-pro'),
			'options' => array(
				'in' => __('In', 'magee-shortcodes-pro'),
				'out' => __('Out', 'magee-shortcodes-pro'),
			)
		),
		
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		
		'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => __( 'Content', 'magee-shortcodes-pro'),
			)
	),

	'shortcode' => '[ms_image_banner image="{{image}}" link="{{link}}" target="{{target}}" horizontal_align="{{horizontal_align}}" vertical_align="{{vertical_align}}" zoom_effect="{{zoom_effect}}" class="{{class}}" id="{{id}}"]{{content}}[/ms_image_banner]',
	'popup_title' => __( 'Image Banner Shortcode', 'magee-shortcodes-pro'),

);

/*-----------------------------------------------------------------------------------*/
/*	Image Compare Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['image_compare'] = array(
    'icon' => 'fa-file-image-o',
	'no_preview' => true,
	'params' => array(
	    'style' => array(
			'type' => 'select',
			'std' => 'horizontal',
			'label' => __( 'Style', 'magee-shortcodes-pro'),
			'desc' => __( 'Select how the image compare display.', 'magee-shortcodes-pro'),
			'options' => array(
				'horizontal' => __('Horizontal','magee-shortcodes-pro'),
				'vertical' => __('Vertical','magee-shortcodes-pro')
			)
		),
		 'percent' => array(
			'type' => 'select',
			'std' => '0.5',
			'label' => __( 'Percent', 'magee-shortcodes-pro'),
			'desc' => __( 'Choose default offset pct', 'magee-shortcodes-pro'),
			'options' => $opacity
		),
	    'image_left' => array(
		    'std' => '',
			'type' => 'uploader',
			'label' => __( 'Image Left', 'magee-shortcodes-pro' ),
			'desc' => __( 'Insert the image displayed in the left.', 'magee-shortcodes-pro')
		),
		'image_right' => array(
		    'std' => '',
			'type' => 'uploader',
			'label' => __( 'Image Right', 'magee-shortcodes-pro' ),
			'desc' => __( 'Insert the image displayed in the right.', 'magee-shortcodes-pro')
		),
	    'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
				'std' => '',
				'type' => 'text',
				'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
				'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),    
	),
    'shortcode' => '[ms_image_compare style="{{style}}" percent="{{percent}}" image_left="{{image_left}}" image_right="{{image_right}}" class="{{class}}" id="{{id}}"]',
	'popup_title' => __( 'Image Compare Shortcode', 'magee-shortcodes-pro' ),
	'name' => __('image-compare-shortcode/','magee-shortcodes-pro'),
);

/*-----------------------------------------------------------------------------------*/
/*	Image Frame Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['image_frame'] = array(
     'icon' => 'fa-file-image-o',
	'no_preview' => true,
	'params' => array(

	'src' => array(
			'type' => 'uploader',
			'label' => __( 'Image', 'magee-shortcodes-pro' ),
			'desc' => __( 'Upload an image to display.', 'magee-shortcodes-pro' ),
		),
		'link' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Image Link URL', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add the URL the picture will link to, ex: http://example.com.', 'magee-shortcodes-pro' ),
		),
	'link_target' => array(
			'std' => '',
			'type' => 'choose',
			'label' => __( 'Link Target', 'magee-shortcodes-pro' ),
			'desc' => __( '_self = open in same window _blank = open in new window.', 'magee-shortcodes-pro' ),
			'options' => array(
				'_blank' => __('_blank', 'magee-shortcodes-pro'),
				'_self' => __('_self', 'magee-shortcodes-pro'),
		
			),
			),
	'border_radius' => array(
			'std' => '0',
			'type' => 'number',
			'max' => '50',
			'min' => '0' ,
			'label' => __( 'Border Radius', 'magee-shortcodes-pro' ),
			'desc' => __( 'Choose the border radius of the image frame. In pixels (px), ex: 1px, or "round".  Leave blank for theme option selection.', 'magee-shortcodes-pro' ), 	         
	    ),	
	'light_box' => array(
	        'std' => '',
			'type' => 'choose' ,
			'label' => __( 'Light Box','magee-shortcodes-pro'),
            'desc' => __( 'Choose to display light box once click.', 'magee-shortcodes-pro'),
			'options' => $reverse_choices	
	    ),	
	'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
	'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),			

	),
	'shortcode' => '[ms_image_frame src="{{src}}" border_radius="{{border_radius}}" link="{{link}}" link_target="{{link_target}}" light_box="{{light_box}}" class="{{class}}" id="{{id}}"]',
	'popup_title' => __( 'Image Frame Shortcode', 'magee-shortcodes-pro' ),
	'name' => __('image-frame-shortcode/','magee-shortcodes-pro'),
);


/*-----------------------------------------------------------------------------------*/
/*	Label Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['label'] = array(
    'no_preview' => true,
	'icon' => 'fa-bookmark',    
    'params' => array(
	    
		'content' => array(
		    'std' => '',
			'type' => 'text',
			'label' => __( 'Text', 'magee-shortcodes-pro' ),
		    'desc' => __( 'Insert text to be displayed in label.','magee-shortcodes-pro')
		),  
	    'background_color' => array(
		    'std' => '',
			'type' => 'colorpicker',
		    'label' => __( 'Background Color' , 'magee-shortcodes-pro'),
			'desc' => __( 'Set background color for label.','magee-shortcodes-pro')
		),
	),
	'shortcode' => '[ms_label background_color="{{background_color}}" ]{{content}}[/ms_label]',
    'popup_title' => __( 'Label Shortcode', 'magee-shortcodes-pro' ),
	'name' => __('label-shortcode/','magee-shortcodes-pro'), 
);

/*******************************************************
 *	List Config
 ********************************************************/
 $magee_shortcodes['list'] = array(
	'no_preview' => true,
	'icon' => 'fa-list',
	'params' => array(
		'item_border' => array(
			'type' => 'choose',
			'label' => __( 'Item Border', 'magee-shortcodes-pro' ),
			'desc' => __( 'Choose to display item border for list.', 'magee-shortcodes-pro'),
			'options' =>array(
				'no' => __('No','magee-shortcodes-pro'),
				'yes' => __('Yes','magee-shortcodes-pro'),)
			),
		'item_size' => array(
			'type' => 'number',
			'std'  => '12',
			'max' => '50',
			'min' => '0',
			'label' => __( 'Item Size', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set text font size for item.', 'magee-shortcodes-pro'),
			),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),	
	),
	'shortcode' => "[ms_list item_border=\"{{item_border}}\" item_size=\"{{item_size}}\" class=\"{{class}}\" id=\"{{id}}\"]\r\n{{child_shortcode}}[/ms_list]",
	'child_shortcode' => array(
		'params' => array(		
		    'icon' => array(
			'type' => 'iconpicker',
			'label' => __( 'Icon', 'magee-shortcodes-pro' ),
			'desc' => __( 'Click an icon to select, click again to deselect.', 'magee-shortcodes-pro' ),
			'options' => $icons
			),
			'icon_color' => array(
				'type' => 'colorpicker',
				'label' => __( 'Icon Color', 'magee-shortcodes-pro' ),
				'desc' => __( 'Set color fo list icon.', 'magee-shortcodes-pro')
				),
			'icon_boxed' => array(
				'type' => 'choose',
				'label' => __( 'Icon Boxed', 'magee-shortcodes-pro' ),
				'desc' => __( 'Choose to set icon boxed.', 'magee-shortcodes-pro'),
				'options' =>array(
					'no' => __('No','magee-shortcodes-pro'),
					'yes' => __('Yes','magee-shortcodes-pro'),)
				),
			 'background_color' => array(
				'type' => 'colorpicker',
				'label' => __( 'Icon Circle Background Color', 'magee-shortcodes-pro' ),
				'desc' => __( 'Set background color for list icon.', 'magee-shortcodes-pro')
			),
			'boxed_shape' => array(
				'type' => 'select',
				'label' => __( 'Boxed Shape', 'magee-shortcodes-pro' ),
				'desc' => __( 'Choose boxed shape for list icon.', 'magee-shortcodes-pro'),
				'options' =>array(
					'square' => __('Square','magee-shortcodes-pro'),
					'circle' => __('Circle','magee-shortcodes-pro'),)
				), 				  
			'content' => array(
				'std' => 'list item',
				'type' => 'text',
				'label' => __( 'Title', 'magee-shortcodes-pro'),
				'desc' =>  __( 'Insert title for list item.', 'magee-shortcodes-pro')
				),					
	  ),		
	'shortcode' => "[ms_list_item icon=\"{{icon}}\" icon_color=\"{{icon_color}}\" icon_boxed=\"{{icon_boxed}}\" background_color=\"{{background_color}}\" boxed_shape=\"{{boxed_shape}}\"]{{content}}[/ms_list_item]\r\n",
	),	
	'popup_title' => __( 'List Shortcode', 'magee-shortcodes-pro' ),
	'name' => __('list-shortcode/','magee-shortcodes-pro'),
);

/*******************************************************
 *	Modal Config
 ********************************************************/

$magee_shortcodes['modal'] = array(
	'no_preview' => true,
	'icon' => 'fa-comment-o',
	'params' => array(
		'modal_anchor_text' => array(
			'std' => 'Modal Anchor Text',
			'type' => 'textarea',
			'label' => __( 'Modal Anchor Text', 'magee-shortcodes-pro' ),
			'desc' => __( 'Insert anchor text for the modal.', 'magee-shortcodes-pro' ),
		),
		'effect' => array(
		    'std' => 'effect-1',
			'type' => 'select',
			'label' => __( 'Modal Show Effect', 'magee-shortcodes-pro' ),
			'desc' => __( 'Choose one effect to show the modal.', 'magee-shortcodes-pro' ),
			'options' => array(	    
				'effect-1' => __('Effect 1 ( Slide Right )','magee-shortcodes-pro'),
				'effect-2' => __('Effect 2 ( Slide Bottom )','magee-shortcodes-pro'),
				'effect-3' => __('Effect 3 ( Slide Left )','magee-shortcodes-pro'),
				'effect-4' => __('Effect 4 ( Slide Top )','magee-shortcodes-pro'),
				'effect-5' => __('Effect 5 ( Scale Up )','magee-shortcodes-pro'),
				'effect-6' => __('Effect 6 ( 3D Flip Horizontal )','magee-shortcodes-pro'),
				'effect-7' => __('Effect 7 ( 3D Flip Vertical )','magee-shortcodes-pro'),
				'effect-8' => __('Effect 8 ( 3D Sign )','magee-shortcodes-pro'),
				'effect-9' => __('Effect 9 ( 3D Rotate In Left )','magee-shortcodes-pro'),
				'effect-10' => __('Effect 10 ( 3D Rotate In Bottom )','magee-shortcodes-pro'),
				'effect-11' => __('Effect 11 ( 3D Slit )','magee-shortcodes-pro'),
				'effect-12' => __('Effect 12 ( Newspaper )','magee-shortcodes-pro'),
				'effect-13' => __('Effect 13 ( Fall )','magee-shortcodes-pro'),
				'effect-14' => __('Effect 14 ( Side Fall )','magee-shortcodes-pro'),
				'effect-15' => __('Effect 15 ( Super Scaled )','magee-shortcodes-pro'),
			),
		),
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Modal Heading Title', 'magee-shortcodes-pro' ),
			'desc' => __( 'Insert heading title for the modal.', 'magee-shortcodes-pro' ),
		),	
		'title_color' => array(
			'std' => '',
			'type' => 'colorpicker',
			'label' => __( 'Modal Heading Title Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set color for the modal heading title.', 'magee-shortcodes-pro' ),
		),	
		'heading_background' => array(
			'std' => '',
			'type' => 'colorpicker',
			'label' => __( 'Modal Heading Background', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set background for the modal heading.', 'magee-shortcodes-pro' ),
		),
		'close_icon' => array(
		    'std' => 'yes',
			'type' => 'choose',
			'label' => __( 'Close Icon', 'magee-shortcodes-pro' ),
			'desc' => __( 'Choose close icon to show in modal heading.', 'magee-shortcodes-pro' ), 
			'options' => $choices
		),	
		'content' => array(
			'std' => __('Your Content Goes Here', 'magee-shortcodes-pro'),
			'type' => 'textarea',
			'label' => __( 'Contents of Modal', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add your content to be displayed in modal.', 'magee-shortcodes-pro' ),
		),
		'background' => array(
		    'std' => '',
			'type' => 'colorpicker',
			'label' => __( 'Modal Background', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set background for the modal.', 'magee-shortcodes-pro' ),
		),
		'color' => array(
		    'std' => '',
			'type' => 'colorpicker',
			'label' => __( 'Modal Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set color for the modal.', 'magee-shortcodes-pro' ),
		),
		'width' => 	array(
		    'std' => '',
			'type' => 'number',
			'label' => __( 'Modal Width', 'magee-shortcodes-pro' ),
			'desc' => '', 
			'min'  => '0',
			'max'  => '1000'
		),	
		'height' => 	array(
		    'std' => '',
			'type' => 'number',
			'label' => __( 'Modal Height', 'magee-shortcodes-pro' ),
			'desc' => '', 
			'min'  => '0',
			'max'  => '500'
		),	
		'overlay_color' => array(
		    'std' => '',
			'type' => 'colorpicker',
			'label' => __( 'Overlay Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set background color for the modal overlay.', 'magee-shortcodes-pro' ),
		),
		'overlay_opacity' => array(
		    'std' => '0',
			'type' => 'select',
			'label' => __( 'Overlay Color Opacity', 'magee-shortcodes-pro' ),
			'desc' => __( 'Choose background color opacity for the modal overlay.', 'magee-shortcodes-pro' ),
			'options' => $opacity
		),	
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro' )
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro' )
		),			
	),
	'shortcode' => "[ms_modal effect=\"{{effect}}\" title=\"{{title}}\" title_color=\"{{title_color}}\" heading_background=\"{{heading_background}}\"  close_icon =\"{{close_icon}}\" background=\"{{background}}\" color=\"{{color}}\" width=\"{{width}}\" height=\"{{height}}\" overlay_color=\"{{overlay_color}}\" overlay_opacity=\"{{overlay_opacity}}\" class=\"{{class}}\" id=\"{{id}}\"]\r\n[ms_modal_anchor_text]{{modal_anchor_text}}[/ms_modal_anchor_text]\r\n[ms_modal_content]{{content}}[/ms_modal_content]\r\n[/ms_modal]",
	'popup_title' => __( 'Modal Shortcode', 'magee-shortcodes-pro' ),
	'name' => __('modal-shortcode/','magee-shortcodes-pro'),
);

/*-----------------------------------------------------------------------------------*/
/*	Menu Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['menu'] = array(
	'no_preview' => true,
	'icon' => 'fa-bars',
	'params' => array(
	    'menu' => array(
		    'std' => '',
			'type' => 'select',
			'label' => __( 'Select a menu','magee-shortcodes-pro'),
		    'options' =>  magee_shortcode_menus('name') 
		),
	    'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
	),
    'shortcode' => '[ms_menu menu="{{menu}}" class="{{class}}" id="{{id}}"]' ,
	'popup_title' => __( 'Menu Shortcode', 'magee-shortcodes-pro'),
);	

/*-----------------------------------------------------------------------------------*/
/* Magee Separator Config
/*-----------------------------------------------------------------------------------*/
/*
$magee_shortcodes['separator'] = array(
	'no_preview' => true,
	'params' => array(
		'style' => array(
			'std' => '',
			'type' => 'select',
			'label' => __( 'Style', 'magee-shortcodes-pro'),
			'desc' => '',
			'options' => array(
				'bigTriangleColor' => __('bigTriangleColor', 'magee-shortcodes-pro'),
				'curveUpColor' => __('curveUpColor', 'magee-shortcodes-pro'),
				'curveDownColor' => __('curveDownColor', 'magee-shortcodes-pro'),
				'bigHalfCircle' => __('bigHalfCircle', 'magee-shortcodes-pro'),
				'bigTriangleShadow' => __('bigTriangleShadow', 'magee-shortcodes-pro'),
				'slit' => __('Slit', 'magee-shortcodes-pro'),
				'stamp' => __('Stamp', 'magee-shortcodes-pro'),
				'clouds' => __('Clouds', 'magee-shortcodes-pro'),
			)
		),		
		'height' => array(
			'std' => '100',
			'type' => 'text',
			'label' => __( 'Height', 'magee-shortcodes-pro'),
			'desc' =>'',
		),	
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		
	),),
	'shortcode' => '[ms_separator style="{{style}}" height="{{height}}" class="{{class}}"]',
	'popup_title' => __( 'Separator', 'magee-shortcodes-pro')
	
);

/*-----------------------------------------------------------------------------------*/
/*	panel Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['panel'] = array(
	'no_preview' => true,
	'icon' => 'fa-list-alt',
	'params' => array(
		
		'title' => array(
			'std' =>  'Panel title',
			'type' => 'text',
			'label' => __( 'Title', 'magee-shortcodes-pro' ),
			'desc' => __( 'Insert title for panel.', 'magee-shortcodes-pro' ),
		),
		'content' => array(
			'std' => __('Panel content.', 'magee-shortcodes-pro'),
			'type' => 'textarea',
			'label' => __( 'Panel Content', 'magee-shortcodes-pro' ),
			'desc' => __( 'Insert content for panel.', 'magee-shortcodes-pro' ),
		),
		
		
		'title_color' => array(
			'std' => '#000',
			'type' => 'colorpicker',
			'label' => __( 'Title Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set color for panel title.', 'magee-shortcodes-pro' ),
		),
		'border_color' => array(
			'std' => '#ddd',
			'type' => 'colorpicker',
			'label' => __( 'Border Color', 'magee-shortcodes-pro' ),
			'desc' =>  __( 'Set color for panel border.', 'magee-shortcodes-pro' ),
		),
		
		'title_background_color' => array(
			'std' => '#f5f5f5',
			'type' => 'colorpicker',
			'label' => __( 'Title Background Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set background color for panel title.', 'magee-shortcodes-pro' ),
		),		
		'border_radius' => array(
			'std' => '0',
			'type' => 'number',
			'max' => '50',
			'min' => '0',
			'label' => __( 'Border Radius', 'magee-shortcodes-pro' ),
			'desc' => __('In pixels (px), eg: 1px.', 'magee-shortcodes-pro')
		),				
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),		
	),
	'shortcode' => '[ms_panel title="{{title}}" title_color="{{title_color}}" border_color="{{border_color}}"  title_background_color="{{title_background_color}}" border_radius="{{border_radius}}"  class="{{class}}" id="{{id}}"]{{content}}[/ms_panel]',
	'popup_title' => __( 'Panel Shortcode', 'magee-shortcodes-pro' ),
	'name' => __('panel-shortcode/','magee-shortcodes-pro'),
);

/*-----------------------------------------------------------------------------------*/
/*	Person Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['person'] = array(
	'no_preview' => true,
	'icon' => 'fa-user',
	'params' => array(
	    'style' => array(
		    'std' => '',
		    'type' => 'select',
			'label' => __( 'Style', 'magee-shortcodes-pro'),
			'desc' => __( 'Choose to display info below or beside the image.','magee-shortcodes-pro'),
			'options' => array(
			    'below' => __('Below', 'magee-shortcodes-pro')  ,
				'beside' => __('Beside', 'magee-shortcodes-pro'),
			),
		),
		'name' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Name', 'magee-shortcodes-pro' ),
			'desc' => __( 'Insert the name of the person.', 'magee-shortcodes-pro' ),
		),
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Title', 'magee-shortcodes-pro' ),
			'desc' => __( 'Insert the title of the person', 'magee-shortcodes-pro' ),
		),
		'link_target' => array(
			'std' => '',
			'type' => 'choose',
			'label' => __( 'Link Target', 'magee-shortcodes-pro' ),
			'desc' => __( '_self = open in same window _blank = open in new window.', 'magee-shortcodes-pro' ),
			'options' => array(
				'_blank' => __('_blank', 'magee-shortcodes-pro'),
				'_self' => __('_self', 'magee-shortcodes-pro'),
		
			),
			),
		'overlay_color' => array(
		    'std' => '',
			'type' => 'colorpicker',
			'label' => __('Image Overlay Color','magee-shortcodes-pro'),
			'desc' => __('Select a hover color to show over the image as an overlay.','magee-shortcodes-pro')
		),	
		'overlay_opacity' => array(
		    'std' => '0.5',
			'type' => 'select',
			'label' => __('Image Overlay Opacity', 'magee-shortcodes-pro'),
			'desc' => __('Opacity ranges between 0 (transparent) and 1 (opaque). ex: .5','magee-shortcodes-pro'),
			'options' => $opacity
		),
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __( 'Profile Description', 'magee-shortcodes-pro' ),
			'desc' => __( 'Insert profile description.', 'magee-shortcodes-pro' )
		),
		'picture' => array(
			'type' => 'uploader',
			'label' => __( 'Picture', 'magee-shortcodes-pro' ),
			'desc' => __( 'Upload an image to display.', 'magee-shortcodes-pro' ),
		),
		'piclink' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Picture Link URL', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add the URL the picture will link to, ex: http://example.com.', 'magee-shortcodes-pro' ),
		),
		'picborder' => array(
			'std' => '0',
			'type' => 'number',
			'max' => '50',
			'min' => '0',
			'label' => __( 'Picture Border Size', 'magee-shortcodes-pro' ),
			'desc' => __( 'In pixels (px), ex: 1px. Leave blank for theme option selection.', 'magee-shortcodes-pro' ),
		),
		'picbordercolor' => array(
			'type' => 'colorpicker',
			'label' => __( 'Picture Border Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Controls the picture\'s border color. Leave blank for theme option selection.', 'magee-shortcodes-pro' ),
		),
		'picborderradius' => array(
			'std' => '0',
			'type' => 'number',
			'max' => '50',
			'min' => '0',
			'label' => __( 'Picture Border Radius', 'magee-shortcodes-pro' ),
			'desc' => __( 'Choose the border radius of the person image. In pixels (px), ex: 1px, or "round".  Leave blank for theme option selection.', 'magee-shortcodes-pro' ),
		),				
		'iconboxedradius' => array(
			'std' => '4',
			'type' => 'number',
			'max' => '50',
			'min' => '0',
			'label' => __( 'Social Icon Box Radius', 'magee-shortcodes-pro' ),
			'desc' => __( 'Choose the border radius of the boxed icons. In pixels (px), ex: 1px, or "round". Leave blank for theme option selection.', 'magee-shortcodes-pro' ),
		),		
		'iconcolor' => array(
			'std' => '',
			'type' => 'colorpicker',
			'label' => __( 'Social Icon Custom Colors', 'magee-shortcodes-pro' ),
			'desc' => __( 'Controls the Icon\'s border color. Leave blank for theme option selection.', 'magee-shortcodes-pro' ),
		),
		'icon1' => array(
				'type' => 'icon',
				'label' => __( 'Icon1', 'magee-shortcodes-pro' ),
				'desc' => __( 'Click an icon to select, click again to deselect.', 'magee-shortcodes-pro' ),
				'options' => $icons
			),
		'link1' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Link1 ', 'magee-shortcodes-pro' ),
			'desc' => __( 'The Icon1 Link ', 'magee-shortcodes-pro' ),
		),
		'icon2' => array(
				'type' => 'icon',
				'label' => __( 'Icon2', 'magee-shortcodes-pro' ),
				'desc' => __( 'Click an icon to select, click again to deselect.', 'magee-shortcodes-pro' ),
				'options' => $icons
			),
		'link2' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Link2 ', 'magee-shortcodes-pro' ),
			'desc' => __( 'The Icon2 Link ', 'magee-shortcodes-pro' ),
		),
		'icon3' => array(
				'type' => 'icon',
				'label' => __( 'Icon3', 'magee-shortcodes-pro' ),
				'desc' => __( 'Click an icon to select, click again to deselect.', 'magee-shortcodes-pro' ),
				'options' => $icons
			),
		'link3' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Link3 ', 'magee-shortcodes-pro' ),
			'desc' => __( 'The Icon3 Link ', 'magee-shortcodes-pro' ),
		),
		'icon4' => array(
				'type' => 'icon',
				'label' => __( 'Icon4', 'magee-shortcodes-pro' ),
				'desc' => __( 'Click an icon to select, click again to deselect.', 'magee-shortcodes-pro' ),
				'options' => $icons
			),
		'link4' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Link4', 'magee-shortcodes-pro' ),
			'desc' => __( 'The Icon4 Link ', 'magee-shortcodes-pro' ),
		),
		'icon5' => array(
				'type' => 'icon',
				'label' => __( 'Icon5', 'magee-shortcodes-pro' ),
				'desc' => __( 'Click an icon to select, click again to deselect.', 'magee-shortcodes-pro' ),
				'options' => $icons
			),
		'link5' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Link5', 'magee-shortcodes-pro' ),
			'desc' => __( 'The Icon5 Link ', 'magee-shortcodes-pro' ),
		),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro' )
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro' )
		),
	),
	'shortcode' => '[ms_person name="{{name}}" style="{{style}}" title="{{title}}" link_target="{{link_target}}" overlay_color="{{overlay_color}}" overlay_opacity="{{overlay_opacity}}" picture="{{picture}}" piclink="{{piclink}}" picborder="{{picborder}}" picbordercolor="{{picbordercolor}}" picborderradius="{{picborderradius}}" iconboxedradius="{{iconboxedradius}}" iconcolor="{{iconcolor}}" icon1="{{icon1}}" icon2="{{icon2}}" icon3="{{icon3}}" icon4="{{icon4}}" icon5="{{icon5}}" link1="{{link1}}" link2="{{link2}}" link3="{{link3}}" link4="{{link4}}" link5="{{link5}}" class="{{class}}" id="{{id}}"]{{content}}[/ms_person]',
	'popup_title' => __( 'Person Shortcode', 'magee-shortcodes-pro' ),
	'name' => __('person-shortcode/','magee-shortcodes-pro'),
);

/*-----------------------------------------------------------------------------------*/
/*	Piechart Config
/*-----------------------------------------------------------------------------------*/


$magee_shortcodes['piechart'] = array(
	'no_preview' => true,
	'icon' => 'fa-circle-o-notch',
	'params' => array(
    'line_cap' => array(
			'std' => 'round',
			'type' => 'select',
			'label' => __( 'Line Cap', 'magee-shortcodes-pro' ),
			'desc' => __( 'Select how the ending of the bar line looks like.', 'magee-shortcodes-pro' ),
            'options' => array(
			    'round' => __( 'Round','magee-shortcodes-pro') ,
			    'butt' => __( 'Butt','magee-shortcodes-pro') ,
				'square' => __( 'Square','magee-shortcodes-pro') ,
			),  
		),
	'percent' => array(
			'std' => '80',
			'type' => 'number',
			'max' => '100',
			'min' => '0',
			'label' => __( 'Percent', 'magee-shortcodes-pro' ),
			'desc' => __( 'From 1 to 100.', 'magee-shortcodes-pro' ),

		),
	
	
	'content' => array(
			'std' => '80%',
			'type' => 'textarea',
			'label' => __( 'Title', 'magee-shortcodes-pro' ),
			'desc' => __( 'Insert title for piechart. It need to be short.', 'magee-shortcodes-pro' ),

		),
	'size' => array(
			'std' => '200',
			'type' => 'number',
			'max' => '500',
			'min' => '0',
			'label' => __( 'Size', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set size for piechart.', 'magee-shortcodes-pro' ),

		),
	'font_size' => array(
			'std' => '40',
			'type' => 'number',
			'max' => '50',
			'min' => '0',
			'label' => __( 'Font Size', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set font size for piechart title.', 'magee-shortcodes-pro' ),

		),
	'filledcolor' => array(
			'type' => 'colorpicker',
			'label' => __( 'Filled Color', 'magee-shortcodes-pro' ),
			'desc' =>  __( 'Set color for filled area in piechart.', 'magee-shortcodes-pro' ),
			'std' => '#fdd200'
		),
	'unfilledcolor' => array(
			'type' => 'colorpicker',
			'label' => __( 'Unfilled Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set color for unfilled area in piechart.', 'magee-shortcodes-pro' ),
			'std' => '#f5f5f5'
		),
	
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro' )
		),
	
	), 
	'shortcode' => '[ms_piechart line_cap="{{line_cap}}" percent="{{percent}}"  filledcolor="{{filledcolor}}" size="{{size}}" font_size="{{font_size}}" unfilledcolor="{{unfilledcolor}}" class="{{class}}" ]{{content}}[/ms_piechart]',
	'popup_title' => __( 'Piechart Shortcode', 'magee-shortcodes-pro' ),
	'name' => __('piechart-shortcode/','magee-shortcodes-pro'),
);

/*-----------------------------------------------------------------------------------*/
/*	Popover Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['popover'] = array(
	'no_preview' => true,
	'icon' => 'fa-comment-o',
	'params' => array(
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Popover Heading', 'magee-shortcodes-pro' ),
			'desc' => __( 'Insert heading text of the popover.', 'magee-shortcodes-pro' ),
		),
		'triggering_text' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __( 'Triggering Text', 'magee-shortcodes-pro' ),
			'desc' => __( 'Content that will trigger the popover.', 'magee-shortcodes-pro' ),
		),
		
	
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __( 'Contents Inside Popover', 'magee-shortcodes-pro' ),
			'desc' => __( 'Text to be displayed inside the popover.', 'magee-shortcodes-pro' ),
		),

		'trigger' => array(
			'type' => 'select',
			'label' => __( 'Popover Trigger Method', 'magee-shortcodes-pro' ),
			'desc' => __( 'Choose mouse action to trigger popover.', 'magee-shortcodes-pro' ),
			'options' => array(
				'click' => __('Click', 'magee-shortcodes-pro'),
				'hover' => __('Hover', 'magee-shortcodes-pro'),
			)
		),
		'placement' => array(
			'type' => 'select',
			'label' => __( 'Popover Position', 'magee-shortcodes-pro' ),
			'desc' => __( 'Choose the display position of the popover.', 'magee-shortcodes-pro' ),
			'options' => array(
				'top' => __('Top', 'magee-shortcodes-pro'),
				'bottom' => __('Bottom', 'magee-shortcodes-pro'),
				'left' => __('Left', 'magee-shortcodes-pro'),
				'Right' => __('Right', 'magee-shortcodes-pro'),
			)
		),
	
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro' )
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro' )
		),			
	),
	'shortcode' => '[ms_popover title="{{title}}" triggering_text="{{triggering_text}}" trigger="{{trigger}}" placement="{{placement}}" class="{{class}}" id="{{id}}"]{{content}}[/ms_popover]', // as there is no wrapper shortcode
	'popup_title' => __( 'Popover Shortcode', 'magee-shortcodes-pro' ),
	'name' => __('popover-shortcode/','magee-shortcodes-pro'),
);

/*-----------------------------------------------------------------------------------*/
/*	Portfolio Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['portfolio'] = array(
	'no_preview' => true,
	'icon' => 'fa-th',
	'params' => array(
		
	
	'num' => array(
			'std' => '10',
			'min' => '0',
			'max' => '100',
			'type' => 'number',
			'label' => __( 'List Num', 'magee-shortcodes-pro'),
			'desc' => __( 'Set list number for portfolios.', 'magee-shortcodes-pro'),
		),
	'category' => array(
			'type' => 'select',
			'label' => __( 'Category', 'magee-shortcodes-pro'),
			'desc' => __( 'Choose a category to display.', 'magee-shortcodes-pro'),
			'options' => $magee_portfolios_cats
		),
	'layout' => array(
	        'type' => 'select',
			'label' => __( 'Layout','magee-shortcodes-pro'),
			'desc' => __( 'Choose to display portfolios in grid or carousel layout.', 'magee-shortcodes-pro'),
			'options' => array(
			      'grid' => __( 'Grid','magee-shortcodes-pro'),
				  'carousel' => __( 'Carousel','magee-shortcodes-pro'),
			)
	),
	'style' => array(
			'type' => 'select',
			'label' => __( 'Style', 'magee-shortcodes-pro'),
			'desc' => __( 'Choose to display portfolios in normal/full style.', 'magee-shortcodes-pro'),
			'options' => array( 
							   '1' => __( 'Normal Style', 'magee-shortcodes-pro'),
							   '2' => __( 'Full Width', 'magee-shortcodes-pro'),
							  )
		),
	'columns' => array(
			'type' => 'select',
			'label' => __( 'Columns', 'magee-shortcodes-pro'),
			'desc' => __( 'Choose column number for portfolio list.', 'magee-shortcodes-pro'),
			'std' => '3',
			'options' => array( 
							   '2' => __( '2 Columns', 'magee-shortcodes-pro'),
							   '3' => __( '3 Columns', 'magee-shortcodes-pro'),
							   '4' => __( '4 Columns', 'magee-shortcodes-pro'),
							   '5' => __( '5 Columns', 'magee-shortcodes-pro'),
							   '6' => __( '6 Columns', 'magee-shortcodes-pro')
							  )
		),
			
	
	'overlay_content' => array(
			'type' => 'select',
			'label' => __( 'Overlay Content', 'magee-shortcodes-pro'),
			'desc' =>  __( 'Select overlay content for portfolios.', 'magee-shortcodes-pro'),
			'options' => array( 
							   '1' => __( 'Button', 'magee-shortcodes-pro'), 
							   '2' => __( 'Title', 'magee-shortcodes-pro'),
							   '3' => __( 'Title & Tags', 'magee-shortcodes-pro'),
							   '4' => __( 'Link Light', 'magee-shortcodes-pro'),
							   '5' => __( 'Image Zoom In', 'magee-shortcodes-pro'),
							   )
							  
		),
	
	'overlay_color' => array(
			'type' => 'colorpicker',
			'label' => __( 'Overlay Color', 'magee-shortcodes-pro'),
			'desc' => __( 'Set overlay background color.', 'magee-shortcodes-pro')
			),	
	'overlay_opacity' => array(
			'type' => 'select',
			'std' => '0.5',
			'label' => __( 'Overlay Opacity', 'magee-shortcodes-pro'),
			'desc' => '',
			'options' => $opacity
		),
			
	'orientation' => array(
			'type' => 'select',
			'label' => __( 'Orientation', 'magee-shortcodes-pro'),
			'desc' =>  __( 'Select orientation for overlay animation.', 'magee-shortcodes-pro'),
			'options' => array( 
							   'top' => __('Top','magee-shortcodes-pro'), 
							   'left' => __('Left','magee-shortcodes-pro'),
							   'right' => __('Right','magee-shortcodes-pro'),
							   'bottom' => __('Bottom','magee-shortcodes-pro')
							   )
							  
		),
	'page_nav' => array(
			'type' => 'choose',
			'label' => __( 'Display Page Nav', 'magee-shortcodes-pro'),
			'desc' => __( 'Choose to display page navigation for portolio list.', 'magee-shortcodes-pro'),
			'options' => $reverse_choices
		),
	'filter' => array(
			'type' => 'choose',
			'label' => __( 'Filter', 'magee-shortcodes-pro'),
			'desc' => __( 'Choose to display filter for portolio list.', 'magee-shortcodes-pro'),
			'options' => $reverse_choices
		),
	'offset' => array(
	        'std' => '',
	        'type' => 'text', 
			'label' => __( 'Post Offset','magee-shortcodes-pro'),
	        'desc' => __( 'Choose to display filter for portolio list.eg:1.','magee-shortcodes-pro')
	    ),
    'exclude_category' => array(
	        'type' => 'select',
			'label' => __( 'Exclude Categories','magee-shortcodes-pro'),
			'desc' => __( 'Select a category to exclude.','magee-shortcodes-pro'),
			'options' => $magee_portfolios_cats
	    ),		
	'align' => array(
	        'type' => 'select',
			'label' => __( 'Info Align','magee-shortcodes-pro'),
			'desc' => __( 'Set align of portoflio info.','magee-shortcodes-pro'),
			'options' => array(
			                   'left' => __( 'Left','magee-shortcodes-pro'),
							   'center' => __( 'Center','magee-shortcodes-pro'),
							   'right' => __( 'Right','magee-shortcodes-pro'),
			                   )
	    ),	
    'display_title' => array(
	        'type' => 'choose',
			'label' => __( 'Display Title','magee-shortcodes-pro'),
			'desc' => __( 'Choose to display the portfolio title below the featured image','magee-shortcodes-pro'),
			'options' => $choices	
	    ),		
    'display_tags' => array(
	        'type' => 'choose',
			'label' => __( 'Display Tags','magee-shortcodes-pro'),
			'desc' => __( 'Choose to show portfolio tags.','magee-shortcodes-pro'),
			'options' => $choices
	    ),	
    'display_excerpt' => array(
	        'type' => 'choose',
			'label' => __( 'Display Excerpt','magee-shortcodes-pro'),
			'desc' => __( 'Choose to display the portfolio excerpt.','magee-shortcodes-pro'),
			'options' => $choices
	    ),	
    'excerpt_length' => array(
	        'std' => '',
	        'type' => 'text',
			'label' => __( 'Excerpt Length','magee-shortcodes-pro'),
			'desc' => __( 'Insert the number of words/characters you want to show in the excerpt.','magee-shortcodes-pro')
	    ),	
	'strip' => array(
	        'type' => 'choose',
			'label' => __( 'Strip HTML','magee-shortcodes-pro'),
			'desc' => __( 'Strip HTML from the post excerpt','magee-shortcodes-pro'),
			'options' => $choices
	    ),				
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		)
		
		
	),
	'shortcode' => '[ms_portfolio num="{{num}}" category="{{category}}" layout="{{layout}}" style="{{style}}" columns="{{columns}}" overlay_content="{{overlay_content}}" overlay_color="{{overlay_color}}" overlay_opacity="{{overlay_opacity}}" orientation="{{orientation}}" page_nav="{{page_nav}}" filter="{{filter}}" offset="{{offset}}" exclude_category="{{exclude_category}}" align="{{align}}" display_title="{{display_title}}" display_tags="{{display_tags}}" display_excerpt="{{display_excerpt}}" excerpt_length="{{excerpt_length}}" strip ="{{strip}}" class="{{class}}" id="{{id}}"]',
	'popup_title' => __( 'Portfolio Shortcode', 'magee-shortcodes-pro')
);

/*-----------------------------------------------------------------------------------*/
/*	Pricing Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['pricing'] = array(
    'icon' => 'fa-money' ,
	'no_preview' => true,
	'params' => array(
					  
		'style' => array(
			'type' => 'select',
			'label' => __( 'Style', 'magee-shortcodes-pro'),
			'desc' => __( 'Select display style for pricing table.', 'magee-shortcodes-pro'),
			'std' => 'flat',
			'options' => array(
				'flat' => 'Flat',
				'box' => 'Box',
				'table' => 'Table',
			)
		),
		
		'columns' => array(
			'type' => 'select',
			'label' => __( 'Columns', 'magee-shortcodes-pro'),
			'desc' => __( 'Set number of pricing boxes.', 'magee-shortcodes-pro'),
			'std' => '3',
			'options' => array(
				'2' => __('2 Columns','magee-shortcodes-pro'),
				'3' => __('3 Columns','magee-shortcodes-pro'),
				'4' => __('4 Columns','magee-shortcodes-pro'),
				'5' => __('5 Columns','magee-shortcodes-pro'),
				'6' => __('6 Columns','magee-shortcodes-pro')
			)
		),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),	
		),
	'shortcode' => "[ms_pricing style=\"{{style}}\" columns=\"{{columns}}\" class=\"{{class}}\" id=\"{{id}}\"]\r\n{{child_shortcode}}[/ms_pricing]",
	'popup_title' => __( 'Pricing Shortcode', 'magee-shortcodes-pro'),
	'child_shortcode' => array(
		'params' => array(
		

	'icon' => array(
			'type' => 'iconpicker',
			'label' => __( 'Icon', 'magee-shortcodes-pro'),
			'desc' => __( 'Click an icon to select, click again to deselect.', 'magee-shortcodes-pro'),
			'std' => '',
			'options' => $icons
		),
	
	'title' => array(
			'std' =>  'Standard',
			'type' => 'text',
			'label' => __( 'Title', 'magee-shortcodes-pro'),
			'desc' => __( 'Insert title for pricing box.', 'magee-shortcodes-pro'),
		),
	'price' => array(
			'std' => '39.99',
			'type' => 'text',
			'label' => __( 'Price', 'magee-shortcodes-pro'),
			'desc' => __( 'Inser number for pricing box.', 'magee-shortcodes-pro'),
		),
	'currency' => array(
			'std' => '$',
			'type' => 'text',
			'label' => __( 'Currency', 'magee-shortcodes-pro'),
			'desc' => __( 'Inser currency for pricing box.', 'magee-shortcodes-pro'),
		),
	'unit' => array(
			'std' =>'year',
			'type' => 'text',
			'label' => __( 'Unit', 'magee-shortcodes-pro'),
			'desc' => __( 'Inser unit for pricing box.', 'magee-shortcodes-pro'),
		),
	'buttontext' => array(
			'std' => 'Buy Now',
			'type' => 'text',
			'label' => __( 'Button Text', 'magee-shortcodes-pro'),
			'desc' => __( 'Inser text for button of pricing box.', 'magee-shortcodes-pro'),
		),
	'buttonlink' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Button Link', 'magee-shortcodes-pro'),
			'desc' => __( 'Inser link for button of pricing box, eg: http://example.com.', 'magee-shortcodes-pro'),
		),
	
	'linktarget' => array(
			'type' => 'choose',
			'label' => __( 'Link Target', 'magee-shortcodes-pro'),
			'desc' => __( '_self = open in same window, _blank = open in new window.', 'magee-shortcodes-pro'),
			'std' => 'flat',
			'options' => array(
				'_blank' => __('_blank','magee-shortcodes-pro'),
				'_self' => __('_self','magee-shortcodes-pro')
				
			)
		),
	
	'featured' => array(
			'type' => 'choose',
			'label' => __( 'Featured', 'magee-shortcodes-pro'),
			'desc' => __( 'Choose to set pricing box as featured.', 'magee-shortcodes-pro'),
			'std' => 'no',
			'options' => $reverse_choices
		),
	
	'standout' => array(
			'type' => 'choose',
			'label' => __( 'Standout', 'magee-shortcodes-pro'),
			'desc' => __( 'Choose to set pricing box as standout.', 'magee-shortcodes-pro'),
			'std' => 'no',
			'options' => $reverse_choices
		),
	
	'color' => array(
	        'std' => '#fdd200', 
			'type' => 'colorpicker',
			'label' => __( 'Color', 'magee-shortcodes-pro'),
			'desc' => __( 'Set primary color for pricing box.', 'magee-shortcodes-pro'),
		),

		
		'is_label' => array(
			'type' => 'choose',
			'label' => __( 'Is Label? (For table style)', 'magee-shortcodes-pro'),
			'desc' =>  __( 'Choose to set pricing box as label for table style.', 'magee-shortcodes-pro'),
			'std' => 'no',
			'options' => $reverse_choices
		),
		'content' => array(
			'std' => "[ms_pricing_item_features]8 GB Bandwidth[/ms_pricing_item_features]\n[ms_pricing_item_features]2 GB[/ms_pricing_item_features]\n[ms_pricing_item_features]16 GB Storage[/ms_pricing_item_features]\n[ms_pricing_item_features]Limited[/ms_pricing_item_features]\n[ms_pricing_item_features]2 Projects[/ms_pricing_item_features]\n",
			'type' => 'textarea',
			'label' => __( 'Features', 'magee-shortcodes-pro'),
			'desc' => __( 'Insert features for pricing box. Each feature between [ms_pricing_item_features][/ms_pricing_item_features].', 'magee-shortcodes-pro'),
		),	
		
		
           )
		,
	'shortcode' => "[ms_pricing_item icon=\"{{icon}}\"  title=\"{{title}}\" price=\"{{price}}\" currency=\"{{currency}}\" unit=\"{{unit}}\" buttontext=\"{{buttontext}}\" buttonlink=\"{{buttonlink}}\" linktarget=\"{{linktarget}}\" featured=\"{{featured}}\" standout=\"{{standout}}\" color=\"{{color}}\" is_label=\"{{is_label}}\"  ]\n{{content}}[/ms_pricing_item]\n",
		
		)

);

/*-----------------------------------------------------------------------------------*/
/*	Process Steps Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['process_steps'] = array(
    'icon' => 'fa-repeat', 
	'no_preview' => true,
	'params' => array(
					  
		'style' => array(
			'type' => 'select',
			'std' => 'horizontal',
			'label' => __( 'Style', 'magee-shortcodes-pro'),
			'desc' => __( 'Select how the process steps display.', 'magee-shortcodes-pro'),
			'options' => array(
				'horizontal' => __('Horizontal','magee-shortcodes-pro'),
				'vertical' => __('Vertical','magee-shortcodes-pro')
			)
		),
		'columns' => array(
			'type' => 'select',
			'label' => __( 'Columns', 'magee-shortcodes-pro'),
			'desc' => __( 'Set columns for horizontal style.', 'magee-shortcodes-pro'),
			'std' => '4',
			'options' => array(
				'3' => __('3 Columns', 'magee-shortcodes-pro'),
				'4' => __('4 Columns', 'magee-shortcodes-pro')
			)
		),

		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),	
		
		
		),
	'shortcode' => "[ms_process_steps style=\"{{style}}\" columns=\"{{columns}}\"  class=\"{{class}}\" id=\"{{id}}\"]\r\n{{child_shortcode}}[/ms_process_steps]",
	'popup_title' => __( 'Process Steps Shortcode', 'magee-shortcodes-pro'),
		// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
		
		'icon' => array(
			'std' => '',
			'type' => 'iconpicker',
			'label' => __( 'Select Icon', 'magee-shortcodes-pro'),
			'desc' => __( 'Click an icon to select, click again to deselect', 'magee-shortcodes-pro'),
			'options' => $icons
		),
		
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Title', 'magee-shortcodes-pro'),
			'desc' => __( 'Insert title for process steps item.', 'magee-shortcodes-pro'),
		),	
		
		'content' => array(
			'std' => 'Your Content Goes Here',
			'type' => 'textarea',
			'label' => __( 'Text', 'magee-shortcodes-pro'),
			'desc' => __( 'Insert description for process steps item.', 'magee-shortcodes-pro'),
		),	
		
		
           )
		,
	'shortcode' => "[ms_process_steps_item title=\"{{title}}\" icon=\"{{icon}}\"]{{content}}[/ms_process_steps_item]\r\n",
		)

);

/*-----------------------------------------------------------------------------------*/
/*	Progress Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['progress'] = array(
	'no_preview' => true,
	'icon' => 'fa-tasks',
	'params' => array(
'style'   => array(
			'type' => 'select',
			'label' => __( 'Style', 'magee-shortcodes-pro' ),
			'desc' => __( 'Choose the show of progress bar.', 'magee-shortcodes-pro' ),
			'options' => array( 
							   'normal' => __( 'Normal Style', 'magee-shortcodes-pro' ),
							   'circle' => __( 'Circle Style', 'magee-shortcodes-pro' ),
							   )
							  
		), 
'striped' => array(
			'type' => 'select',
			'label' => __( 'Striped', 'magee-shortcodes-pro' ),
			'desc' => __( 'Choose to get the filled area striped.', 'magee-shortcodes-pro' ),
			'options' => array( 
							   'none' => __( 'None Striped', 'magee-shortcodes-pro' ),
							   'striped' => __( 'Striped', 'magee-shortcodes-pro' ),
							   'striped animated' => __( 'Striped Animated', 'magee-shortcodes-pro' ),
							   )
							  
		),
'rounded' => array(
			'type' => 'select',
			'label' => __( 'Rounded', 'magee-shortcodes-pro' ),
			'desc' => __( 'Choose to set the progress bar as rounded.', 'magee-shortcodes-pro' ),
			'options' => array( 
							   'on' => __( 'On', 'magee-shortcodes-pro' ),
							   'off' => __( 'Off', 'magee-shortcodes-pro' ),
							   )
							  
		),
	'number' => array(
			'type' => 'choose',
			'label' => __( 'Display  Number', 'magee-shortcodes-pro' ),
			'desc' => __( 'Choose to diplay number for progress bar.', 'magee-shortcodes-pro' ),
			'options' =>$choices 
							  
		),
	
	'percent' => array(
			'std' => '50',
			'type' => 'number',
			'max' => '100',
			'min' => '0',
			'label' => __( 'Percent', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set percentage for progress bar. 0~100.', 'magee-shortcodes-pro' )
		),
	
	'text' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Text', 'magee-shortcodes-pro' ),
			'desc' => __( 'Insert text for progress bar.', 'magee-shortcodes-pro' ),
		),
	
	'height' => array(
			'std' => '30',
			'type' => 'number',
			'max' => '200',
			'min' => '0',
			'label' => __( 'Height', 'magee-shortcodes-pro' ),
			'desc' =>__( 'Set height for progress bar.', 'magee-shortcodes-pro' ),
		),
	
	

	'color' => array(
			'type' => 'colorpicker',
			'label' => __( 'Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set background color for filled area in progress bar.', 'magee-shortcodes-pro' ),
			'std' => ''
		),
	'textposition' => array(
			'type' => 'select',
			'label' => __( 'Text Position', 'magee-shortcodes-pro' ),
			'desc' => __( 'Choose text position for progress bar.', 'magee-shortcodes-pro' ),
			'options' => array( 
							   '1' => __('Text on Progress bars', 'magee-shortcodes-pro' ),  
							   '2' => __('Text above progress bars', 'magee-shortcodes-pro' ),  
							   )
							   
		),
				
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro' )
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro' )
		)
		
		
	),
	'shortcode' => '[ms_progress style="{{style}}" striped="{{striped}}" rounded="{{rounded}}" number="{{number}}"  percent="{{percent}}" text="{{text}}"  height="{{height}}" color="{{color}}"  textposition="{{textposition}}" class="{{class}}" id="{{id}}"]',
	'popup_title' => __( 'Progress Shortcode', 'magee-shortcodes-pro' ),
	'name' => __('progress-bar-shortcode/','magee-shortcodes-pro'),
);

/*-----------------------------------------------------------------------------------*/
/* Promo_box Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['promo_box'] = array(
	'no_preview' => true,
	'icon' => 'fa-tag',
	'params' => array(

		'style' => array(
			'type' => 'select',
			'label' => __( 'Style', 'magee-shortcodes-pro' ),
			'desc' => __( 'Select style for promo box.', 'magee-shortcodes-pro' ),
			'options' => array(
				'normal' => __('Normal', 'magee-shortcodes-pro'),
				'boxed' => __('Boxed', 'magee-shortcodes-pro'),
			)
		),		
		'border_color' => array(
			'type' => 'colorpicker',
			'std' => '#fdd200',
			'label' => __( 'Border Color', 'magee-shortcodes-pro' ),
			'desc' =>  __( 'Set color for highlight border of promo box.', 'magee-shortcodes-pro' ),
		),
		'border_width' => array(
			'std' => '1',
			'type' => 'number',
			'max' => '50',
			'min' => '0',
			'label' => __( 'Border Width', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set width for highlight border of promo box.', 'magee-shortcodes-pro' ),
		),
	
		'border_position' => array(
			'type' => 'select',
			'label' => __( 'Border Position', 'magee-shortcodes-pro' ),
			'desc' => __( 'Choose position for highlight border of promo box.', 'magee-shortcodes-pro' ),
			'options' => array(
				'left' => __('Left', 'magee-shortcodes-pro'),
				'right' => __('Right', 'magee-shortcodes-pro'),
				'top' => __('Top', 'magee-shortcodes-pro'),
				'bottom' => __('Bottom', 'magee-shortcodes-pro'),
				
			)
		),
		'background_color' => array(
			'type' => 'colorpicker',
			'std' =>'#f5f5f5',
			'label' => __( 'Icon Circle Background Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set background color for promo box.', 'magee-shortcodes-pro' ),
		),
		'button_color' => array(
			'type' => 'colorpicker',
			'std' =>'',
			'label' => __( 'Button Color', 'magee-shortcodes-pro' ),
			'desc' => '',
		),
		
		'button_text' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Button Text', 'magee-shortcodes-pro' ),
			'desc' => __( 'Inser text for button of promo box.', 'magee-shortcodes-pro' ),
		),	
		'button_text_color' => array(
			'std' => '#ffffff',
			'type' => 'colorpicker',
			'label' => __( 'Button Text Color', 'magee-shortcodes-pro' ),
		),	
		'button_link' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Button Link URL', 'magee-shortcodes-pro' ),
			'desc' => __( 'Inser link for button of promo box, eg: http://example.com.', 'magee-shortcodes-pro' ),
		),	
		'button_icon' => array(
				'type' => 'iconpicker',
				'label' => __( 'Button Icon', 'magee-shortcodes-pro' ),
				'desc' => __( 'Click an icon to select, click again to deselect.', 'magee-shortcodes-pro' ),
				'options' => $icons
			),
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __( 'Content', 'magee-shortcodes-pro' ),
			'desc' => __( 'Insert content for promo box.', 'magee-shortcodes-pro' ),
		),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro' )
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro' )
		),
	),
	'shortcode' => '[ms_promo_box style="{{style}}" border_color="{{border_color}}" border_width="{{border_width}}" border_position="{{border_position}}" background_color="{{background_color}}" button_color="{{button_color}}" button_link="{{button_link}}" button_icon="{{button_icon}}" button_text="{{button_text}}" button_text_color="{{button_text_color}}" class="{{class}}" id="{{id}}"]{{content}}[/ms_promo_box]',
	'popup_title' => __( 'Promo Box Shortcode', 'magee-shortcodes-pro' ),
	'name' => __('promo-box-shortcode/','magee-shortcodes-pro'),
);

/*-----------------------------------------------------------------------------------*/
/*	Pullquote Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['pullquote'] = array(
	'no_preview' => true,
	'icon' => 'fa-quote-left',
	'params' => array(
	    'align' => array(
			'type' => 'select',
			'label' => __('Align', 'magee-shortcodes-pro'),
			'desc' => __('Set alignment for pullquote.','magee-shortcodes-pro'),
			'options' => array(
			    'left' => __('Left', 'magee-shortcodes-pro') ,
				'right' => __('Right', 'magee-shortcodes-pro'),
			)
		),
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __( 'Content', 'magee-shortcodes-pro'),
			'desc' => __( 'Insert content for pullquote.', 'magee-shortcodes-pro')
		),
	    'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		), 
		
	),
    'shortcode' => '[ms_pullquote align="{{align}}" class="{{class}}" id="{{id}}"]{{content}}[/ms_pullquote]',
	'popup_title' =>__('Pullquote Shortcode','magee-shortcodes-pro'),
	'name' => __('pullquote-shortcode/','magee-shortcodes-pro'),
);	

/*-----------------------------------------------------------------------------------*/
/*	QR Code Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['QRCode'] = array(
    'no_preview' => true,
	'icon' => 'fa-qrcode',    
    'params' => array(
	
	    'content' =>array(
		    'std' => '',
			'type' => 'text',
			'label' => __( 'Content', 'magee-shortcodes-pro' ),
		    'desc' => __( 'The text to store within the QR code. Any text or URL is available.', 'magee-shortcodes-pro' ),
		),
		'alt' => array(
			'std' => 'scan QR code',
			'type' => 'text',
			'label' => __( 'Alternative text', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set image alt for QR code.', 'magee-shortcodes-pro' ),
		),
		'size' => array(
		    'std' => '100',
			'type' => 'number',
			'max' => '200',
			'min' => '0',
			'label' => __('Size in pixel','magee-shortcodes-pro'),
			'desc' => __('Image width and height.','magee-shortcodes-pro'),
		),
		'click' => array(
		    'std' => 'no',
			'type' => 'choose',
			'label' => __('QRCode clickable?','magee-shortcodes-pro'),
			'desc' => __('Choose to make this QR code clickable.','magee-shortcodes-pro'), 
			'options' => array(
				'no' => __( 'No', 'magee-shortcodes-pro' ),
				'yes' => __( 'Yes', 'magee-shortcodes-pro' ),
			)
		),
		'fgcolor' => array( 
		    'std' => '#000000',  
		    'type' => 'colorpicker',
			'label' => __('Foreground Color' ,'magee-shortcodes-pro'),
			'desc' => __('Set foreground Color for QR code.' ,'magee-shortcodes-pro'),
		),
	    'bgcolor' =>array(
		    'std' => '#FFFFFF',
		    'type' => 'colorpicker',
			'label' => __('Background Color','magee-shortcodes-pro'),
			'desc' => __('Set background Color for QR code.' ,'magee-shortcodes-pro'),
		),
	),
	'shortcode' => '[ms_qrcode alt="{{alt}}" size="{{size}}" click="{{click}}" fgcolor="{{fgcolor}}" bgcolor="{{bgcolor}}"]{{content}}[/ms_qrcode]',
    'popup_title' => __( 'QR Code Shortcode', 'magee-shortcodes-pro' ),
	'name' => __('qr-code-shortcode/','magee-shortcodes-pro'),
); 

/*-----------------------------------------------------------------------------------*/
/*	Quote Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['quote'] = array(
	'no_preview' => true,
	'icon' => 'fa-quote-right',    
	'params' => array(
	    'cite' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Cite', 'magee-shortcodes-pro'),
			'desc' => __( 'Author name for quote.', 'magee-shortcodes-pro')
		),
		'url' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Cite Link', 'magee-shortcodes-pro'),
			'desc' => __( 'Insert Url for the quote author. Leave empty to disable hyperlink.', 'magee-shortcodes-pro')
		),
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __( 'Content', 'magee-shortcodes-pro'),
			'desc' => __( 'Insert content for the quote.', 'magee-shortcodes-pro')
		),
	    'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		), 
	),
    'shortcode' =>  '[ms_quote cite="{{cite}}" url="{{url}}" class="{{class}}" id="{{id}}"]{{content}}[/ms_quote]',
	'popup_title' =>__('Quote Shortcode','magee-shortcodes-pro'),
	'name' => __('quote-shortcode/','magee-shortcodes-pro'),
);	

/*-----------------------------------------------------------------------------------*/
/*	RSS Feed Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['rss_feed'] = array(
	'no_preview' => true,
	'icon' => 'fa-rss' ,
	'params' => array(
	      
		'url' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Feed URL', 'magee-shortcodes-pro'),
			'desc' => __( 'Url of RSS Feed.', 'magee-shortcodes-pro')
		),  
		'number' => array(
			'std' => '3',
			'type' => 'number',
			'max' => '20',
			'min' => '0',
			'label' => __( 'Number to Display', 'magee-shortcodes-pro'),
			'desc' => __( 'Number of items to show.', 'magee-shortcodes-pro')
		),  
	    'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),   
	),
	'shortcode' => '[ms_rss_feed url="{{url}}" number="{{number}}" class="{{class}}" id="{{id}}"][/ms_rss_feed]',
	'popup_title' =>__('RSS Feed Shortcode','magee-shortcodes-pro'),
	'name' => __('rss-feed-shortcode/','magee-shortcodes-pro'),
);	


/*-----------------------------------------------------------------------------------*/
/*	Scheduled_content Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['scheduled_content'] = array(
    'no_preview' => true,
	'icon' => 'fa-clock-o',
	'params' => array(
	    'time' => array(
			'std' => '6-12,13-16',
			'type' => 'text',
			'label' => __( 'Time', 'magee-shortcodes-pro'),
			'desc' => __( 'Select an random time in one day to show content.</br>Example: 6-12,13-16  show content from  6:00 to 12:00 and from 13:00 to 16:00', 'magee-shortcodes-pro')
		),
		'day_week' => array(
			'std' => '1-5,7',
			'type' => 'text',
			'label' => __( 'Days of Week', 'magee-shortcodes-pro'),
			'desc' => __( 'Select days from one week to show content.</br>1 => Monday </br>2 => Tuesday  </br> 3 => Wednesday</br> 4 => Thursday  </br> 5 => Friday  </br> 6 => Saturday </br>  7 => Sunday </br>Examples:1-5,7 =>show content at Sunday and from Monday to Friday', 'magee-shortcodes-pro')
		),
		'day_month' =>array(
		    'std' => '10-15,20-25',
			'type' => 'text',
			'label' => __( 'Days of Month', 'magee-shortcodes-pro'), 
			'desc' => __('Select days from one month to show content.</br>Examples:</br>1 => show content only at first day of  month </br> 10-25 => show content from 10th to 25th </br> 10-15,20-25 => show content from 10th to 15th and from 20th to 25th','magee-shortcodes-pro')
		),
		'months' => array(
		    'std' => '1,5,8-9',
			'type' => 'text',
			'label' => __('Months','magee-shortcodes-pro'),
			'desc' => __('Select months from a year to show content.</br>Examples:</br>1 => show content in January </br> 3-6 => show content from March to June </br> 1,5,8-9 => show content in January,May and from August to September','magee-shortcodes-pro') 
		),
		'years' => array(
		    'std' => '2016,2017,2345-2666',
			'type' => 'text',
			'label' => __('Years','magee-shortcodes-pro'),  
		    'desc' => __( 'Select years to show content.</br>Examples:</br> 2016 => show content in 2016 </br>2014-2016 => show content from 2014 to 2016 </br> 2016,2017,2345-2666 => show content in 2016,2017 and from 2345 to 2666','magee-shortcodes-pro')
		),
	    'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
	    'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		), 
		'content' => array(
		    'std' => '',
			'type' => 'textarea',
			'label' => __( 'Content', 'magee-shortcodes-pro'),
			'desc' => __( 'Insert scheduled content.', 'magee-shortcodes-pro') 
		)   
	),
	'shortcode' => '[ms_scheduled_content time="{{time}}" day_week="{{day_week}}" day_month="{{day_month}}" months="{{months}}" years="{{years}}" class="{{class}}" id="{{id}}"]{{content}}[/ms_scheduled_content]',
	'popup_title' => __( 'Scheduled Shortcode','magee-shortcodes-pro'),
	'name' => __('scheduled-shortcode/','magee-shortcodes-pro'),
);	

/*-----------------------------------------------------------------------------------*/
/*	Section Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['section'] = array(
	'no_preview' => true,
	'icon' => 'fa-list-alt',
	'params' => array(

		'background_color' => array(
			'std' => '',
			'type' => 'colorpicker',
			'label' => __( 'Background Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set background for section. Leave blank for transparent.', 'magee-shortcodes-pro' ),
		),
		
		'background_image' => array(
			'std' => '',
			'type' => 'uploader',
			'label' => __( 'Background Image', 'magee-shortcodes-pro' ),
			'desc' => __( 'Upload an image to display in the background.', 'magee-shortcodes-pro' ),
		),
		'background_repeat' => array(
			'type' => 'select',
			'label' => __( 'Background Repeat', 'magee-shortcodes-pro' ),
			'desc' =>__( 'Choose repeat style for the background image.', 'magee-shortcodes-pro' ),
			'std' => '',
			'options' => array(
							  'repeat' => __( 'Repeat', 'magee-shortcodes-pro' ),
							  'repeat-x' => __( 'Repeat-x', 'magee-shortcodes-pro' ),
							  'repeat-y' => __( 'Repeat-y', 'magee-shortcodes-pro' ),
							  'no-repeat' => __( 'No-repeat', 'magee-shortcodes-pro' ),
							  'inherit' => __( 'Inherit', 'magee-shortcodes-pro' )
							   )
		),
		
		'background_position' => array(
			'type' => 'select',
			'label' => __( 'Background Position', 'magee-shortcodes-pro' ),
			'desc' => __( 'Choose the postion of the background image.', 'magee-shortcodes-pro' ),
			'std' => '',
			'options' => array(
							  'top left' => __( 'Top Left', 'magee-shortcodes-pro' ),
							  'top center' => __( 'Top Center', 'magee-shortcodes-pro' ),
							  'top right' => __( 'Top Right', 'magee-shortcodes-pro' ),
							  'center left' => __( 'Center Left', 'magee-shortcodes-pro' ),
							  'center center' => __( 'Center Center', 'magee-shortcodes-pro' ),
							  'center right' => __( 'Center Right', 'magee-shortcodes-pro' ),
							  'bottom left' => __( 'Bottom Left', 'magee-shortcodes-pro' ),
							  'bottom center' => __( 'Bottom Center', 'magee-shortcodes-pro' ),
							  'bottom right' => __( 'Bottom Right', 'magee-shortcodes-pro' )
							   )
		),
		'background_parallax' => array(
			'type' => 'choose',
			'label' => __( 'Background Parallax', 'magee-shortcodes-pro' ),
			'desc' => __( 'Choose how the background image scrolls and responds.', 'magee-shortcodes-pro' ),
			'std' => 'no',
			'options' => $reverse_choices
		),
		'border_size' => array(
			'std' => '0',
			'type' => 'number',
			'max' => '50',
			'min' => '0',
			'label' => __( 'Border Size', 'magee-shortcodes-pro' ),
			'desc' =>__( 'In pixels (px), eg: 1px.', 'magee-shortcodes-pro' ),
		),
		
		'border_color' => array(
			'std' => '',
			'type' => 'colorpicker',
			'label' => __( 'Border Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set border color for section.', 'magee-shortcodes-pro' ),
		),
		'border_style' => array(
			'type' => 'select',
			'label' => __( 'Border Style', 'magee-shortcodes-pro' ),
			'desc' => __( 'Select border style for section', 'magee-shortcodes-pro' ),
			'std' => '',
			'options' => array(
							  'none' => __( 'None', 'magee-shortcodes-pro' ),
							  'hidden' => __( 'Hidden', 'magee-shortcodes-pro' ),
							  'dotted' => __( 'Dotted', 'magee-shortcodes-pro' ),
							  'dashed' => __( 'Dashed', 'magee-shortcodes-pro' ),
							  'solid' => __( 'Solid', 'magee-shortcodes-pro' ),
							  'double' => __( 'Double', 'magee-shortcodes-pro' ),
							  'groove' => __( 'Groove', 'magee-shortcodes-pro' ),
							  'ridge' => __( 'Ridge', 'magee-shortcodes-pro' ),
							  'inset' => __( 'Inset', 'magee-shortcodes-pro' ),
							  'outset' => __( 'Outset', 'magee-shortcodes-pro' ),
							  'initial' => __( 'Initial', 'magee-shortcodes-pro' ),
							  'inherit' => __( 'Inherit', 'magee-shortcodes-pro' ),
							 
							   )
		),
		
		'padding_top' => array(
			'std' => '10',
			'type' => 'number',
			'max' => '100',
			'min' => '0',
			'label' => __( 'Padding Top', 'magee-shortcodes-pro' ),
			'desc' =>  __( 'In pixels (px), eg: 1px.', 'magee-shortcodes-pro' ),
		),
		'padding_bottom' => array(
			'std' => '10',
			'type' => 'number',
			'max' => '100',
			'min' => '0',
			'label' => __( 'Padding Bottom', 'magee-shortcodes-pro' ),
			'desc' => __( 'In pixels (px), eg: 1px.', 'magee-shortcodes-pro' ),
		),
		'padding_left' => array(
			'std' => '10',
			'type' => 'number',
			'max' => '100',
			'min' => '0',
			'label' => __( 'Padding Left', 'magee-shortcodes-pro' ),
			'desc' => __( 'In pixels (px), eg: 1px.', 'magee-shortcodes-pro' ),
		),
		'padding_right' => array(
			'std' => '10',
			'type' => 'number',
			'max' => '100',
			'min' => '0',
			'label' => __( 'Padding Right', 'magee-shortcodes-pro' ),
			'desc' => __( 'In pixels (px), eg: 1px.', 'magee-shortcodes-pro' ),
		),
		'contents_in_container' => array(
			'type' => 'choose',
			'label' => __( 'Contents in Container ?', 'magee-shortcodes-pro' ),
			'desc' =>  __( 'Put the content in container.', 'magee-shortcodes-pro' ),
			'std' => 'no',
			'options' => $reverse_choices
		),
		
		'content' => array(
			'std' => __('Section content.', 'magee-shortcodes-pro'),
			'type' => 'textarea',
			'label' => __( 'Section Content', 'magee-shortcodes-pro' ),
			'desc' => __( 'Insert content for section.', 'magee-shortcodes-pro' ),
		),
		
		'top_separator' => array(
			'std' => 'yes',
			'type' => 'select',
			'label' => __( 'Top Separator', 'magee-shortcodes-pro' ),
			'desc' => '',
			'options' => array(
				'' => __('None', 'magee-shortcodes-pro'),
				'triangle' => __('Triangle', 'magee-shortcodes-pro'),
				'doublediagonal' => __('Doublediagonal', 'magee-shortcodes-pro'),
				'halfcircle' => __('Halfcircle', 'magee-shortcodes-pro'),
				'bigtriangle' => __('Bigtriangle', 'magee-shortcodes-pro'),
				'bighalfcircle' => __('Bighalfcircle', 'magee-shortcodes-pro'),
				'curl' => __('Curl', 'magee-shortcodes-pro'),
				'multitriangles' => __('Multitriangles', 'magee-shortcodes-pro'),
				'roundedsplit' => __('Roundedsplit', 'magee-shortcodes-pro'),
				'boxes' => __('Boxes', 'magee-shortcodes-pro'),
				'zigzag' => __('Zigzag', 'magee-shortcodes-pro'),
				'clouds' => __('Clouds', 'magee-shortcodes-pro'),
			)
		),
		'bottom_separator' => array(
			'std' => 'yes',
			'type' => 'select',
			'label' => __( 'Bottom Separator', 'magee-shortcodes-pro' ),
			'desc' => '',
			'options' => array(
				'' => __('None', 'magee-shortcodes-pro'),
				'triangle' => __('Triangle', 'magee-shortcodes-pro'),
				'halfcircle' => __('Halfcircle', 'magee-shortcodes-pro'),
				'bigtriangle' => __('Bigtriangle', 'magee-shortcodes-pro'),
				'bighalfcircle' => __('Bighalfcircle', 'magee-shortcodes-pro'),
				'curl' => __('Curl', 'magee-shortcodes-pro'),
				'multitriangles' => __('Multitriangles', 'magee-shortcodes-pro'),
				'roundedcorners' => __('Roundedcorners', 'magee-shortcodes-pro'),
				'foldedcorner' => __('Foldedcorner', 'magee-shortcodes-pro'),
				'boxes' => __('Boxes', 'magee-shortcodes-pro'),
				'zigzag' => __('Zigzag', 'magee-shortcodes-pro'),
				'stamp' => __('Stamp', 'magee-shortcodes-pro'),
			)
		),
		'full_height' => array(
		    'std' => '',
			'type' => 'choose',
			'label' => __('Full Height' , 'magee-shortcodes-pro'),
			'desc' => __('Choose to set the section height same as browser window.' , 'magee-shortcodes-pro'),
			'options' => $reverse_choices
		),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),		
	),
	'shortcode' => '[ms_section background_color="{{background_color}}" background_image="{{background_image}}" background_repeat="{{background_repeat}}" background_position="{{background_position}}" background_parallax="{{background_parallax}}" border_size="{{border_size}}" border_color="{{border_color}}" border_style="{{border_style}}" padding_top="{{padding_top}}" padding_bottom="{{padding_bottom}}" padding_left="{{padding_left}}" padding_right="{{padding_right}}" contents_in_container="{{contents_in_container}}" top_separator="{{top_separator}}" bottom_separator="{{bottom_separator}}" full_height="{{full_height}}" class="{{class}}" id="{{id}}"]{{content}}[/ms_section]',
	'popup_title' => __( 'Section Shortcode', 'magee-shortcodes-pro' ),
	'name' => __('section-shortcode/','magee-shortcodes-pro'),
);

/*-----------------------------------------------------------------------------------*/
/* Magee Slider Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['ms_slider'] = array(
	'no_preview' => true,
	'icon' => 'fa-sliders',
	'params' => array(
  
		'id' => array(
			'std' => '',
			'type' => 'select',
			'label' => __( 'Slider', 'magee-shortcodes-pro' ),
			'desc' => '',
			'options' => $magee_sliders
		),		
		
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro' )
		
	),),
	'shortcode' => '[ms_slider id="{{id}}" class="{{class}}"]',
	'popup_title' => __( 'Slider', 'magee-shortcodes-pro' ),
	'name' => __('slider-shortcode/','magee-shortcodes-pro'),
);

/*-----------------------------------------------------------------------------------*/
/* Social Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['social'] = array(
	'no_preview' => true,
	'icon' => 'fa-twitter',
	'params' => array(

		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Title ', 'magee-shortcodes-pro' ),
			'desc' => __( 'Insert the title for the social icon.', 'magee-shortcodes-pro' ),
			),
		'icon' => array(
			'type' => 'iconpicker',
				'label' => __( 'Icon', 'magee-shortcodes-pro' ),
				'desc' => __( 'Click an icon to select, click again to deselect.', 'magee-shortcodes-pro' ),
				'options' => $icons
			),
		'icon_size' => array(
			'std' => '13',
			'type' => 'number',
			'max' => '100',
			'min' => '0',
			'label' => __( 'Icon Size', 'magee-shortcodes-pro' ),
			'desc' => __( 'In pixels (px), eg: 13px.', 'magee-shortcodes-pro')
		),	
		'iconcolor' => array(
			'type' => 'colorpicker',
			'label' => __( 'Icon Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set color for icon.', 'magee-shortcodes-pro')
			),
		 'backgroundcolor' => array(
			'type' => 'colorpicker',
			'label' => __( 'Icon Circle Background Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set background color for icon.', 'magee-shortcodes-pro')
		),
		 'effect_3d' => array(
		 	'std'=>'no',
			'type' => 'choose',
			'label' => __( 'Icon 3D effect' , 'alchem-pro'),
			'desc' => __( 'Display box shadow for icon.', 'magee-shortcodes-pro'),
			'options' => array(
				'yes' => __('Yes', 'magee-shortcodes-pro'),
				'no' => __('No', 'magee-shortcodes-pro'),
			)	
		),		
		'iconboxedradius' => array(
			'type' => 'select',
			'label' => __( 'Icon Box Radius Style', 'magee-shortcodes-pro' ),
			//'desc' => __( '', 'magee-shortcodes-pro' ),
			'options' => array(
				'normal' => __('Normal', 'magee-shortcodes-pro'),
				'boxed' => __('Boxed', 'magee-shortcodes-pro'),
				'rounded' => __('Rounded', 'magee-shortcodes-pro'),
				'circle' => __('Circle ', 'magee-shortcodes-pro'),				
			)
		),
		'iconlink' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Icon Link URL', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add the icon\'s url eg: http://example.com.', 'magee-shortcodes-pro' ),
		),	
		'icontarget' => array(
			'type' => 'choose',
			'label' => __( 'Icon Target', 'magee-shortcodes-pro' ),
			'desc' => __( '_self = open in same window <br />_blank = open in new window.', 'magee-shortcodes-pro' ),
			'options' => array(
				'_self' => __('_self','magee-shortcodes-pro'),
				'_blank' => __('_blank','magee-shortcodes-pro')
			)
		),	
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro' )
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro' )
		),
	),
	'shortcode' => '[ms_social icon_size="{{icon_size}}" title="{{title}}" icon="{{icon}}" iconcolor="{{iconcolor}}" effect_3d="{{effect_3d}}" backgroundcolor="{{backgroundcolor}}" iconboxedradius="{{iconboxedradius}}" iconlink="{{iconlink}}" icontarget="{{icontarget}}" class="{{class}}" id="{{id}}"][/ms_social]',
	'popup_title' => __( 'Social Shortcode', 'magee-shortcodes-pro' ),
	'name' => __('social-shortcode/','magee-shortcodes-pro'),
);

/*-----------------------------------------------------------------------------------*/
/*	Table Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['table'] = array(
	'no_preview' => true,
	'icon' => 'fa-table',
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __( 'Style', 'magee-shortcodes-pro'),
			'desc' => __( 'Select table style.', 'magee-shortcodes-pro'),
			'options' => array(
				'simple' => __('Simple Style', 'magee-shortcodes-pro'),
				'normal' => __('Normal Style', 'magee-shortcodes-pro'),
			)
		),
		'striped' => array(
			'type' => 'select',
			'label' => __( 'Striped', 'magee-shortcodes-pro'),
			'options' => array(
				'yes' => __('Yes', 'magee-shortcodes-pro'),
				'no' => __('No', 'magee-shortcodes-pro'),
			)
		),	
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro'),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro'),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
		
		'content' => array(
				'std' => '<table>
                                        <thead>
                                            <tr>
                                                <th>Column 1</th>
                                                <th>Column 2</th>
                                                <th>Column 3</th>
                                                <th>Column 4</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Item #1</td>
                                                <td>Description</td>
                                                <td>Subtotal:</td>
                                                <td>$1.00</td>
                                            </tr>
                                            <tr>
                                                <td>Item #2</td>
                                                <td>Description</td>
                                                <td>Discount:</td>
                                                <td>$2.00</td>
                                            </tr>
                                            <tr>
                                                <td><strong>All Items</strong></td>
                                                <td><strong>Description</strong></td>
                                                <td><strong>Your Total:</strong></td>
                                                <td><strong>$3.00</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>',
				'type' => 'textarea',
				'label' => __( 'Table HTML Content', 'magee-shortcodes-pro'),
			//	'desc' => __( 'Insert content for Table.', 'magee-shortcodes-pro')
			)
	),

	'shortcode' => '[ms_table style="{{style}}" striped="{{striped}}" class="{{class}}" id="{{id}}"]{{content}}[/ms_table]',
	'popup_title' => __( 'Table Shortcode', 'magee-shortcodes-pro'),

);

/*-----------------------------------------------------------------------------------*/
/*	Tabs Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['tabs'] = array(
	'no_preview' => true,
	'icon' => 'fa-list-alt',
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __( 'Style', 'magee-shortcodes-pro' ),
			'desc' => __( 'Select tabs\' style.', 'magee-shortcodes-pro' ),
			'options' => array(
				'simple' => __('Simple Style', 'magee-shortcodes-pro'),
				'simple justified' => __('Simple Style Justified', 'magee-shortcodes-pro'),
				'button' => __('Button Style', 'magee-shortcodes-pro'),
				'button justified' => __('Button Style Justified', 'magee-shortcodes-pro'),
				'normal' => __('Normal Style', 'magee-shortcodes-pro'),
				'normal justified' => __('Normal Style Justified', 'magee-shortcodes-pro'),
				'vertical' => __('Vertical Style', 'magee-shortcodes-pro'),
				'vertical right' => __('Vertical Style Right', 'magee-shortcodes-pro'),
			)
		),
		'title_color' => array(
			'type' => 'colorpicker',
			'label' => __( 'Title Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set color for tab item\'s title.', 'magee-shortcodes-pro')
			),		
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro' )
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro' )
		),
	),
	'popup_title' => __( 'Tab Shortcode', 'magee-shortcodes-pro' ),
	'name' => __('tabs-shortcode/','magee-shortcodes-pro'),
	'shortcode' => "[ms_tabs style=\"{{style}}\" title_color=\"{{title_color}}\" class=\"{{class}}\" id=\"{{id}}\"]\r\n{{child_shortcode}}[/ms_tabs]",

	'child_shortcode' => array(
		'params' => array(
			'title' => array(
				'std' => __('Title', 'magee-shortcodes-pro'),
				'type' => 'text',
				'label' => __( 'Tab Title', 'magee-shortcodes-pro'),
				'desc' => __( 'Insert title for tab item.', 'magee-shortcodes-pro'),
			),
			'icon' => array(
				'type' => 'icon',
				'label' => __( 'Tab Title Icon', 'magee-shortcodes-pro'),
				'desc' => __( 'Click an icon to select, click again to deselect.', 'magee-shortcodes-pro'),
				'options' => $icons
			),			
			'content' => array(
				'std' => __('Tab Content', 'magee-shortcodes-pro'),
				'type' => 'textarea',
				'label' => __( 'Tab Content', 'magee-shortcodes-pro'),
				'desc' => __( 'Insert content for tab item.', 'magee-shortcodes-pro')
			)
		),
		'shortcode' => "[ms_tab title=\"{{title}}\" icon=\"{{icon}}\"]{{content}}[/ms_tab]\r\n",
	)

);

/*-----------------------------------------------------------------------------------*/
/*	Targeted_content Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['targeted_content'] = array(
    'no_preview' => true,
	'icon' => 'fa-eye' ,
    'params' => array(
	    'type' => array(
		    'type' => 'select',
			'label' => __( 'Type', 'magee-shortcodes-pro'),
			'desc' => __( 'Select visible permissions.Private for author only. Members for logged-in users. Guests for users not logged in.', 'magee-shortcodes-pro'),
			'options' => array(
			    'private' => __( 'Private','magee-shortcodes-pro'),
				'members' => __( 'Members','magee-shortcodes-pro'),
				'guests' => __('Guests','magee-shortcodes-pro'),
			)
		),
		'content' => array(
			'std' => 'note text',
			'type' => 'textarea',
			'label' => __( 'Content', 'magee-shortcodes-pro'),
			'desc' => __( 'Set content for targeted users.', 'magee-shortcodes-pro')
		),
		'alternative' => array(
			'std' => 'alternative text',
			'type' => 'textarea',
			'label' => __( 'Alternative Content', 'magee-shortcodes-pro'),
			'desc' => __( 'Set content for other users.', 'magee-shortcodes-pro')
		),
	),
    'shortcode' => '[ms_targeted_content type="{{type}}" alternative="{{alternative}}"]{{content}}[/ms_targeted_content]',
	'popup_title' => __( 'Targeted Shortcode','magee-shortcodes-pro'),
	'name' => __('targeted-shortcode/','magee-shortcodes-pro'),
);

/*-----------------------------------------------------------------------------------*/
/* testimonial Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['testimonial'] = array(
	'no_preview' => true,
	'icon' => 'fa-commenting',
	'params' => array(
		'style' => array(
			'std' => '',
			'type' => 'select',
			'label' => __( 'Style ', 'magee-shortcodes-pro' ),
			'desc' => __( 'Select testimonial\'s style', 'magee-shortcodes-pro' ),
			'options' => array(
				'normal' => __('Normal', 'magee-shortcodes-pro') ,
				'box' => __('Box', 'magee-shortcodes-pro') ,
				),
			),
		'name' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Name', 'magee-shortcodes-pro' ),
			'desc' => __( 'Name of testimonial\'s author.', 'magee-shortcodes-pro' ),
			),
		'byline' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Byline', 'magee-shortcodes-pro' ),
			'desc' => __( 'Byline of testimonial\'s author.', 'magee-shortcodes-pro' ),
			),
		'avatar' => array(
				'type' => 'link',
				'label' => __( 'Avatar', 'magee-shortcodes-pro' ),
				'desc' => __( 'Avatar of testimonial\'s author.', 'magee-shortcodes-pro' ),
			),

		 'alignment' => array(
			'std' => '',
			'type' => 'select',
			'label' => __( 'Alignment', 'magee-shortcodes-pro' ),
			'desc' => __( 'Select the content\'s alignment.', 'magee-shortcodes-pro' ),
			'options' => array(
				'none' => __('None', 'magee-shortcodes-pro') ,
				'center' => __('Center', 'magee-shortcodes-pro') ,
				),
			),
		'content' => array(
				'std' => __('Testimonial Content', 'magee-shortcodes-pro'),
				'type' => 'textarea',
				'label' => __( 'Testimonial Content', 'magee-shortcodes-pro' ),
				'desc' => __( 'Insert content for testimonial.', 'magee-shortcodes-pro' )
			),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro' )
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro' )
		),
	),
	'shortcode' => '[ms_testimonial style="{{style}}" name="{{name}}" avatar="{{avatar}}" byline="{{byline}}" alignment="{{alignment}}" class="{{class}}" id="{{id}}"]{{content}}[/ms_testimonial]',
	'popup_title' => __( 'Testimonial Shortcode', 'magee-shortcodes-pro' ),
	'name' => __('testimonial-shortcode/','magee-shortcodes-pro'),
);


/*-----------------------------------------------------------------------------------*/
/*	Timeline Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['timeline'] = array(
	'no_preview' => true,
	'icon' => 'fa-history',
	'params' => array(
					  
		'columns' => array(
			'type' => 'select',
			'label' => __( 'Columns', 'magee-shortcodes-pro' ),
			'desc' =>__( 'Number of items.', 'magee-shortcodes-pro' ),
			'std' => '4',
			'options' => array(
				'2' => __( '2 columns', 'magee-shortcodes-pro' ),
				'3' => __( '3 columns', 'magee-shortcodes-pro' ),
				'4' => __( '4 columns', 'magee-shortcodes-pro' ),
				'5' => __( '5 columns', 'magee-shortcodes-pro' )
			)
		),

		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro' )
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro' )
		),	
		),
	'shortcode' => "[ms_timeline columns=\"{{columns}}\"  class=\"{{class}}\" id=\"{{id}}\"]\r\n{{child_shortcode}}[/ms_timeline]",
	'popup_title' => __( 'Timeline Shortcode', 'magee-shortcodes-pro' ),
    'name' => __('timeline-shortcode/','magee-shortcodes-pro'),
    // child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
						  
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Title', 'magee-shortcodes-pro'),
			'desc' => __( 'Insert title for timeline item.', 'magee-shortcodes-pro'),
		),
		'time' => array(
			'std' => date('Y'),
			'type' => 'text',
			'label' => __( 'Time', 'magee-shortcodes-pro'),
			'desc' => __( 'Insert time for timeline item.', 'magee-shortcodes-pro'),
		),
		'content' => array(
			'std' => 'Your Content Goes Here',
			'type' => 'textarea',
			'label' => __( 'Text', 'magee-shortcodes-pro'),
			'desc' => __( 'Insert description for timeline item.', 'magee-shortcodes-pro'),
		),	
		
		
           )
		,
	'shortcode' => "[ms_timeline_item title=\"{{title}}\" time=\"{{time}}\"]{{content}}[/ms_timeline_item]\r\n",	
		)
);

/*-----------------------------------------------------------------------------------*/
/*	Tooltip Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['tooltip'] = array(
	'no_preview' => true,
	'icon' => 'fa-comment-o',
	'params' => array(

		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Tooltip Text', 'magee-shortcodes-pro' ),
			'desc' => __( 'Insert the text that displays in the tooltip', 'magee-shortcodes-pro' )
		),
		'background_color' => array(
			'type' => 'colorpicker',
			'std' => '',
			'label' => __( 'Tooltip Background Color', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set Background Color for the text.', 'magee-shortcodes-pro' ),
		),
		'border_radius' => array(
			'type' => 'number',
			'std' => '0',
			'max' => '100',
			'min' => '0',
			'label' => __( 'Tooltip Border Radius', 'magee-shortcodes-pro' ),
			'desc' => __( 'Set Border Radius for the text.', 'magee-shortcodes-pro' ),
		),		
		'placement' => array(
			'type' => 'select',
			'label' => __( 'Tooltip Position', 'magee-shortcodes-pro' ),
			'desc' => __( 'Choose the display position.', 'magee-shortcodes-pro' ),
			'options' => array(
				'top' => __('Top', 'magee-shortcodes-pro'),
				'bottom' => __('Bottom', 'magee-shortcodes-pro'),
				'left' => __('Left', 'magee-shortcodes-pro'),
				'right' => __('Right', 'magee-shortcodes-pro'),
			)
		),
		'trigger' => array(
			'type' => 'select',
			'label' => __( 'Tooltip Trigger', 'magee-shortcodes-pro' ),
			'desc' => __( 'Choose action to trigger the tooltip.', 'magee-shortcodes-pro' ),
			'options' => array(
				'hover' => __('Hover', 'magee-shortcodes-pro'),
				'click' => __('Click', 'magee-shortcodes-pro'),
			)
		),	
		
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __( 'Content', 'magee-shortcodes-pro' ),
			'desc' => __( 'Insert the text that will activate the tooltip hover', 'magee-shortcodes-pro' )
		),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS Class', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add a class to the wrapping HTML element.', 'magee-shortcodes-pro' )
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro' )
		),			
	),
	'shortcode' => '[ms_tooltip title="{{title}}" background_color="{{background_color}}" border_radius="{{border_radius}}" placement="{{placement}}" trigger="{{trigger}}" class="{{class}}" id="{{id}}"]{{content}}[/ms_tooltip]',
	'popup_title' => __( 'Tooltip Shortcode', 'magee-shortcodes-pro' ),
	'name' => __('tooltip-shortcode/','magee-shortcodes-pro'),
);


/*-----------------------------------------------------------------------------------*/
/*	Video Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['video'] = array(
    'no_preview' => true,
	'icon' => 'fa-play-circle-o',    
    'params' => array(
	
	    'mp4_url' => array(
            'std' => '',
            'type' => 'link',
            'label' => __( 'Mp4 Video Url','magee-shortcodes-pro'),
            'desc' => __( 'Add the URL of video in MPEG4 format. WebM and MP4 format must be included to render your video with cross browser compatibility. OGV is optional.', 'magee-shortcodes-pro' ),  
        
        ),  
        'ogv_url' => array(
            'std' => '',
            'type' => 'link',
            'label' => __( 'Ogv Video Url','magee-shortcodes-pro'),
            'desc' => __( 'Add the URL of video in OGV format. WebM and MP4 format must be included to render your video with cross browser compatibility. OGV is optional.', 'magee-shortcodes-pro' ),  
        
        ),
        'webm_url' => array(
            'std' => '',
            'type' => 'link',
            'label' => __( 'Webm Video Url','magee-shortcodes-pro'),
            'desc' => __( 'Add the URL of video in webm format. WebM and MP4 format must be included to render your video with cross browser compatibility. OGV is optional.', 'magee-shortcodes-pro' ),  
        
        ),  
        'poster' => array(
            'std' => '',
            'type' => 'uploader',
            'label' => __( 'Poster','magee-shortcodes-pro'),
            'desc' => __( 'Display a image when browser does not support HTML5 format.','magee-shortcodes-pro'),
        
        ),		
		'width' => array(
		    'std' => '100%',
			'type' => 'text',
 			'label' => __('Width','magee-shortcodes-pro'),
			'desc' => __('In pixels (px), eg: 1px.','magee-shortcodes-pro'),
		),
	    'height' => array(
		    'std' => '100%',
		    'type' => 'text',
			'label' => __('Height','magee-shortcodes-pro'),
			'desc' => __('In pixels (px), eg: 1px.','magee-shortcodes-pro'), 
		),
		'mute' => array( 
		    'std' => '',  
		    'type' => 'choose',
			'label' => __('Mute Video' ,'magee-shortcodes-pro'),
			'desc' => __('Choose to mute the video.','magee-shortcodes-pro'), 
			'options' => $reverse_choices	 
		),
	    'autoplay' =>array(
		    'std' => '',
		    'type' => 'choose',
			'label' => __('Autoplay Video','magee-shortcodes-pro'),
			'desc' => __('Choose to autoplay the video.','magee-shortcodes-pro'), 
			'options' => array(
			    'yes' => __('Yes','magee-shortcodes-pro'), 
			    'no' => __('No','magee-shortcodes-pro'),
			)
		),
		'loop' =>array(
		    'std' => '',
		    'type' => 'choose',
			'label' => __('Loop Video','magee-shortcodes-pro'),
			'desc' => __('Choose to loop the video.','magee-shortcodes-pro'), 
			'options' => array(
			    'yes' => __('Yes','magee-shortcodes-pro'), 
			    'no' => __('No','magee-shortcodes-pro')
			)
		),
		'controls' =>array(
		    'std' => '',
		    'type' => 'choose',
			'label' => __('Show Controls','magee-shortcodes-pro'),
			'desc' => __('Choose to display controls for the video player.','magee-shortcodes-pro'), 
			'options' => array(
			    'yes' => __('Yes','magee-shortcodes-pro'), 
			    'no' => __('No','magee-shortcodes-pro')
			)
		),
	    'class' =>array(
		    'std' => '',
			'type' => 'text',
			'label' => __('CSS Class','magee-shortcodes-pro'),
			'desc' => __('Add a class to the wrapping HTML element.','magee-shortcodes-pro') 
		),   
	    'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
	),
	'shortcode' => '[ms_video mp4_url="{{mp4_url}}" ogv_url="{{ogv_url}}" webm_url="{{webm_url}}" poster="{{poster}}"  width="{{width}}" height="{{height}}" mute="{{mute}}" autoplay="{{autoplay}}" loop="{{loop}}" controls="{{controls}}" class="{{class}}" id="{{id}}"][/ms_video]',   
    'popup_title' => __( 'Video Shortcode', 'magee-shortcodes-pro' ),
	'name' => __('video-shortcode/','magee-shortcodes-pro'),
);       
       

/*-----------------------------------------------------------------------------------*/
/*	Vimeo Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['vimeo'] = array(
    'no_preview' => true,
	'icon' => 'fa-vimeo-square',    
    'params' => array(
		'link' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Vimeo URL', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add the URL the video will link to, ex: http://example.com.', 'magee-shortcodes-pro' ),
		),
		'width' => array(
		    'std' => '100%',
			'type' => 'text',
			'label' => __('Width','magee-shortcodes-pro'),
			'desc' => __('In pixels (px), eg:1px.','magee-shortcodes-pro'),
		),
	    'height' => array(
		    'std' => '100%',
			'type' => 'text',
			'label' => __('Height','magee-shortcodes-pro'),
			'desc' => __('In pixels (px), eg:1px.','magee-shortcodes-pro'), 
		),
		'mute' => array( 
		    'std' => '',  
		    'type' => 'choose',
			'label' => __('Mute Video' ,'magee-shortcodes-pro'),
			'desc' => __('Choose to mute the video.','magee-shortcodes-pro'), 
			'options' => $reverse_choices	 
		),
	    'autoplay' =>array(
		    'std' => '',
		    'type' => 'choose',
			'label' => __('Autoplay Video','magee-shortcodes-pro'),
			'desc' => __('Choose to autoplay the video.','magee-shortcodes-pro'), 
			'options' => array(
			    'yes' => __('Yes','magee-shortcodes-pro'), 
			    'no' => __('No','magee-shortcodes-pro'),
			)
		),
		'loop' =>array(
		    'std' => '',
		    'type' => 'choose',
			'label' => __('Loop Video','magee-shortcodes-pro'),
			'desc' => __('Choose to loop the video.','magee-shortcodes-pro'), 
			'options' => array(
			    'yes' => __('Yes','magee-shortcodes-pro'), 
			    'no' => __('No','magee-shortcodes-pro')
			)
		),
		'controls' =>array(
		    'std' => '',
		    'type' => 'choose',
			'label' => __('Show Controls','magee-shortcodes-pro'),
			'desc' => __('Choose to display controls for the video player.','magee-shortcodes-pro'), 
			'options' => array(
			    'yes' => __('Yes','magee-shortcodes-pro'), 
			    'no' => __('No','magee-shortcodes-pro')
			)
		),
	    'class' =>array(
		    'std' => '',
			'type' => 'text',
			'label' => __('CSS Class','magee-shortcodes-pro'),
			'desc' => __('Add a class to the wrapping HTML element.','magee-shortcodes-pro') 
		),   
	    'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
	),
	'shortcode' => '[ms_vimeo link="{{link}}"  width="{{width}}" height="{{height}}" mute="{{mute}}" autoplay="{{autoplay}}" loop="{{loop}}" controls="{{controls}}" class="{{class}}" id="{{id}}"][/ms_vimeo]',   
    'popup_title' => __( 'Vimeo Shortcode', 'magee-shortcodes-pro' ),
	'name' => __('vimeo-shortcode/','magee-shortcodes-pro'),
);       
/*-----------------------------------------------------------------------------------*/
/*	Youtube Config
/*-----------------------------------------------------------------------------------*/

$magee_shortcodes['youtube'] = array(
    'no_preview' => true,
	'icon' => 'fa-youtube-square',    
    'params' => array(
	
		'link' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Youtube URL', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add the URL the video will link to, ex: http://example.com.', 'magee-shortcodes-pro' ),
		),
		'width' => array(
		    'std' => '100%',
			'type' => 'text',
			'label' => __('Width','magee-shortcodes-pro'),
			'desc' => __('In pixels (px), eg:1px.','magee-shortcodes-pro'),
		),
	    'height' => array(
		    'std' => '100%',
			'type' => 'text',
			'label' => __('Height','magee-shortcodes-pro'),
			'desc' => __('In pixels (px), eg:1px.','magee-shortcodes-pro'), 
		),
		'mute' => array( 
		    'std' => '',  
		    'type' => 'choose',
			'label' => __('Mute Video' ,'magee-shortcodes-pro'),
			'desc' => __('Choose to mute the video.','magee-shortcodes-pro'), 
			'options' => $reverse_choices	 
		),
	    'autoplay' =>array(
		    'std' => '',
		    'type' => 'choose',
			'label' => __('Autoplay Video','magee-shortcodes-pro'),
			'desc' => __('Choose to autoplay the video.','magee-shortcodes-pro'), 
			'options' => array(
			    'yes' => __('Yes','magee-shortcodes-pro'), 
			    'no' => __('No','magee-shortcodes-pro'),
			)
		),
		'loop' =>array(
		    'std' => '',
		    'type' => 'choose',
			'label' => __('Loop Video','magee-shortcodes-pro'),
			'desc' => __('Choose to loop the video.','magee-shortcodes-pro'), 
			'options' => array(
			    'yes' => __('Yes','magee-shortcodes-pro'), 
			    'no' => __('No','magee-shortcodes-pro')
			)
		),
		'controls' =>array(
		    'std' => '',
		    'type' => 'choose',
			'label' => __('Show Controls','magee-shortcodes-pro'),
			'desc' => __('Choose to display controls for the video player.','magee-shortcodes-pro'), 
			'options' => array(
			    'yes' => __('Yes','magee-shortcodes-pro'), 
			    'no' => __('No','magee-shortcodes-pro')
			)
		),
	    'class' =>array(
		    'std' => '',
			'type' => 'text',
			'label' => __('CSS Class','magee-shortcodes-pro'),
			'desc' => __('Add a class to the wrapping HTML element.','magee-shortcodes-pro') 
		),   
	    'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
	),
	'shortcode' => '[ms_youtube link="{{link}}"  width="{{width}}" height="{{height}}" mute="{{mute}}" autoplay="{{autoplay}}" loop="{{loop}}" controls="{{controls}}" class="{{class}}" id="{{id}}"][/ms_youtube]',   
    'popup_title' => __( 'Youtube Shortcode', 'magee-shortcodes-pro' ),
	'name' => __('youtube-shortcode/','magee-shortcodes-pro'),
);  

/*-----------------------------------------------------------------------------------*/
/*	Weather Config
/*-----------------------------------------------------------------------------------*/   

$magee_shortcodes['weather'] = array(
    'no_preview' => true,
	'icon' => 'fa-skyatlas',    
    'params' => array(
	    'api_key' => array(
		    'std' => '0af9d367c2b965bb80281fab5fdaa44a',
			'type' => 'text',
			'label' => __('API Key','magee-shortcodes-pro'),
			'desc' => __('As of October 2015, OpenWeatherMap requires an APP ID key to access their weather data. <a href="http://openweathermap.org/appid" target="_blank">Get your APPID</a>','magee-shortcodes-pro'),
		),
		'location' => array(
		    'std' => '',
			'type' => 'text',
			'label' => __('Location','magee-shortcodes-pro'),
			'desc' => __('Set city name or ID which will show weather.eg: London or 2643743','magee-shortcodes-pro'),
		),
		'units' => array(
		    'std' => '',
			'type' => 'select',
			'label' =>  __('Temperature Units','magee-shortcodes-pro'),
			'desc' => __( 'Metric: Celsius, Imperial: Fahrenheit.', 'magee-shortcodes-pro'),
			'options' => array(
			    'metric' => __( 'Metric','magee-shortcodes-pro'),
				'imperial' => __( 'Imperial','magee-shortcodes-pro')
			)
		),
		'weather_detail' => array(
		    'std' => '',
			'type' => 'choose',
			'label' =>  __('Disable Weather Detail','magee-shortcodes-pro'),
			'desc' => __( 'Choose to show current weather detail.', 'magee-shortcodes-pro'),
			'options' => $choices
		),
		'forecast' => array(
		    'std' => '',
			'type' => 'choose',
			'label' =>  __('Forecast','magee-shortcodes-pro'),
			'desc' => __( 'Choose to show forecast weather.', 'magee-shortcodes-pro'),
			'options' => $choices
		),
		'forecast_cnt' => array(
		    'std' => '4',
			'type' => 'number',
			'max' => '16',
			'min' => '1',
			'label' =>  __('Forecast Cnt','magee-shortcodes-pro'),
			'desc' => __( 'Choose number of days for forecast weather.', 'magee-shortcodes-pro'),	
		),
		'background_color' => array(
		    'std' => '',
			'type' => 'colorpicker',
			'label' =>  __('Background Color','magee-shortcodes-pro'),
			'desc' => __( 'Set background color for weather', 'magee-shortcodes-pro'),
		),
		'background_img' => array(
		    'std' => '',
			'type' => 'uploader',
			'label' =>  __('Background Image','magee-shortcodes-pro'),
			'desc' => __( 'Set background image for weather', 'magee-shortcodes-pro'),
		),
		'width' => array(
		    'std' => '300',
			'type' => 'number',
			'max' => '500',
			'min' => '0',
			'label' =>  __('Weather Width','magee-shortcodes-pro'),
		),
		'height' => array(
		    'std' => '',
			'type' => 'number',
			'max' => '500',
			'min' => '0',
			'label' =>  __('Weather Height','magee-shortcodes-pro'),
		),
	    'class' =>array(
		    'std' => '',
			'type' => 'text',
			'label' => __('CSS Class','magee-shortcodes-pro'),
			'desc' => __('Add a class to the wrapping HTML element.','magee-shortcodes-pro') 
		),   
	    'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
	),
    'shortcode' => '[ms_weather api_key="{{api_key}}" location="{{location}}" units="{{units}}" background_color="{{background_color}}" background_img="{{background_img}}" weather_detail="{{weather_detail}}" forecast="{{forecast}}" forecast_cnt="{{forecast_cnt}}" width="{{width}}" height="{{height}}" class="{{class}}" id="{{id}}"]',
    'popup_title' => __( 'Weather Shortcode', 'magee-shortcodes-pro' ),

);  

/*-----------------------------------------------------------------------------------*/
/*	Widget Area
/*-----------------------------------------------------------------------------------*/   

$magee_shortcodes['widget_area'] = array(
    'no_preview' => true,
	'icon' => 'fa-cog',    
    'params' => array(
	    'name' => array(
		    'std' => '',
			'type' => 'select',
			'label' => __('Name','magee-shortcodes-pro'),
			'desc' => __('Choose widget name to show','magee-shortcodes-pro'),
			'options' => magee_get_sidebars(),
		),
		'background_color' => array(
		    'std' => '',
			'type' => 'colorpicker',
			'label' => __('Background Color','magee-shortcodes-pro'),
			'desc' => __('Set background color for widget area','magee-shortcodes-pro'),
		),
		'padding' => array(
		    'std' => '0',
			'max' => '200',
			'min' => '0',
			'type' => 'number',
			'label' =>  __('Padding','magee-shortcodes-pro'),
		),
	    'class' =>array(
		    'std' => '',
			'type' => 'text',
			'label' => __('CSS Class','magee-shortcodes-pro'),
			'desc' => __('Add a class to the wrapping HTML element.','magee-shortcodes-pro') 
		),   
	    'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'CSS ID', 'magee-shortcodes-pro' ),
			'desc' => __( 'Add an ID to the wrapping HTML element.', 'magee-shortcodes-pro')
		),
	),
    'shortcode' => '[ms_widget_area name="{{name}}"  background_color="{{background_color}}" padding="{{padding}}" class="{{class}}" id="{{id}}"][/ms_widget_area]',
    'popup_title' => __( 'Widget Area Shortcode', 'magee-shortcodes-pro' ),

);