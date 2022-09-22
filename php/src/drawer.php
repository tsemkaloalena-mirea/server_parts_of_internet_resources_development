<?php
header("Content-type: image/png");

$num = $_GET['num'];
if (!empty($num)) {
	$color_r = $num & 0b11111111;
	$num = $num >> 7;
	$color_g = $num & 0b11111111;
	$num = $num >> 7;
	$color_b = $num & 0b11111111;
	$num = $num >> 7;
	$img_width = $num & 0b1111111111;
	$num = $num >> 9;
	$img_height = $num & 0b1111111111;
	$num = $num >> 9;

	// echo $color_r;
	// echo "\n";
	// echo $color_g;
	// echo "\n";
	// echo $color_b;
	// echo "\n";
	// echo $img_width;
	// echo "\n";
	// echo $img_height;
	// echo "\n";
	// echo $num;

	if ($img_width < 10) {
		$img_width = 256;
	}

	if ($img_height < 10) {
		$img_height = 256;
	}

	$img = imagecreatetruecolor($img_width, $img_height);
	$bg = imagecolorallocate($img, 255 - $color_r, 255 - $color_g, 255 - $color_b);
	imagefill($img, 0, 0, $bg);
	$color = imagecolorallocate($img, $color_r, $color_g, $color_b);

	if ($num % 3 == 0) {
		imagefilledpolygon($img, [$img_width*3/10, $img_height*2/10, $img_width*2/10, $img_height*5/10, $img_width*4/10, $img_height*5/10], 3, $color);
	} else if ($num % 3 == 1) {
		imagefilledrectangle($img, 0, 0, $img_width*0.8, $img_height*0.8, $color);
	} else {
		imagefilledarc($img, $img_width*0.5, $img_height*0.5, $img_width*0.8, $img_height*0.8,  0, 360, $color, IMG_ARC_PIE);
	}

	imagepng($img);
	imagedestroy($img);
}
?>

