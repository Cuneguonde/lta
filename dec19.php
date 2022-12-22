<?php
var_dump($xy_tab);
//0.1 Declaration de variables 
$height = 0;
$txt = '';
$num = 0;
$sum = 0;
$bp = 0;
// 1.1 Ouverture du dossier 
if ($dh = opendir($argv[1])) {
    while (($file = readdir($dh)) !== false) {
        $mime_type[] = array(mime_content_type($file), $file);
    }
}
// 1.2 Filtre des fichiers
foreach ($mime_type as $content) {
    if (preg_match('/png$/', $content[0]) == 1) {
        $Image_name[] = $content[1];
    } 
}
// 1.3 Creation et ?copie? des images
foreach ($Image_name as $content) {
    $xy_tab[] = getimagesize($content);
}
// 1.4 Listages des "hauteurs" et "largeurs" dans les tableaux x/y
$y = array_column($xy_tab, 1);
$x = array_column($xy_tab, 0);
$j = array(0);
$z = array_merge($j,$x);
//var_dump($z);
//Sum of the values for obtain the higgest width
$width = array_sum($x);
//Comparing value for obtain the higgest height
foreach ($y as $value) {
    if ($value > $height)
        $height = $value;
}
// 2.1 Creation d'un alpha, d' une image "d' accueil" pour notre sprite


$dest = imagecreatetruecolor($width, $height);
$background = imagecolorallocatealpha($dest, 255, 255, 255, 127);
imagefill($dest, 0, 0, $background);
imagealphablending($dest, false);
imagesavealpha($dest, true);
// $img1 = imagecreatefrompng($content);
$handle = fopen('../paf.png', "w+");
var_dump($Image_name);
for ($i = 0; $i < count($Image_name); $i++) {
    $sum = $sum + $z[$i];
    $img = imagecreatefrompng($Image_name[$i]);
    imagecopy($dest, $img, $sum,0, 0,0,$x[$i], $y[$i]);
}
$generate_css = fopen("stylesheet.css","w+");
//Finish
imagepng($dest, $handle);
$txt_canvas = ".sprite { \n" . "width: $width" . "px;\n" . "height:$height" . "px;\n}\n";
fwrite($generate_css, $txt_canvas);

foreach ($Image_name as $image) {
    $size = getimagesize($image);
    fwrite($generate_css, 
        ".sprite-$image{
        wdith : $size[0]px;
        heigth : $size[1]px;
        background-position:" . $bp . "px 0px;\n");
    $bp += $size[0];
}
   
/*
for ($j = 0; $j < count($x); $j++) {
    $txt = $txt . "." . $Image_name[$j] . "\n";
    $txt = $txt . "width" . ": " . $x[$j] . "px;" . "\n";
    $txt = $txt . "height"  . ": " . $y[$j] . "px;" . "\n";
    fwrite($generate_css, 'toto');
}
fwrite($generate_css, $txt);
 */

/*
    foreach ($Image_name as $content) {
        // implode(string $separator, array $array): string 
        $img = imagecreatefrompng($content);
        imagecopy($dest,$img, 0, 0, 20, 12, 80, 40);
    } 
 */
