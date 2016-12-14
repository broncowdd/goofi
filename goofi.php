<?php 
header("Content-Type: text/css");
$font_folder='fonts';
if (!empty($_GET['family'])){
	if (!is_dir($font_folder)){mkdir($font_folder);}
	$family=strip_tags($_GET['family']);
	$css_filename=urlencode($family).'.css';
	$css_file_url='http://fonts.googleapis.com/css?family='.urlencode($family);
	if (!is_file($css_filename)){
		$css=file_get_contents($css_file_url);
		
		preg_match_all("#font-family: '(?P<name>[^']+)[^^]*?url\((?P<url>[^\)]+)\)#", $css, $urls);

		foreach($urls['url'] as $nb=>$url){
			$font_file=$urls['name'][$nb].basename($url);
			if (!is_file($font_folder.'/'.$font_file)){
				$font=file_get_contents($url);
				file_put_contents($font_folder.'/'.$font_file, $font);
			}
			$css=str_replace($url,$font_folder.'/'.$font_file,$css);
		}
		file_put_contents($css_filename,$css );
	}else{
		$css=file_get_contents($css_filename);
	}
	exit($css);
}
