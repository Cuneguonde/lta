    <?php
function my_merge_image(){
    $a = 0;
$img1 = imagecreatefrompng('dd.png');
$img2 = imagecreatefrompng('tomato.png'); 
    $lgbt[] = getimagesize('dd.png');
    $lgbt[] = getimagesize('tomato.png');
    $height = array_column($lgbt,1);
    $width = array_column($lgbt,0);
    $final_width = array_sum($width);
foreach ($height as $value){ 
    if ($value > $a) 
        $a = $value; 
} 

echo $a;
echo $final_width;
$img1 = imagecreatefrompng('dd.png');
$img2 = imagecreatefrompng('tomato.png'); 
$dest=imagecreatetruecolor($final_width,$a);
imagealphablending($dest, false); 
$background = imagecolorallocatealpha($dest,255,255,255,127);
    imagefill($dest,0,0,$background);
imagesavealpha($dest, true);
imagecopy($dest, $img1, 0, 0, 20, 13, 1000, 1000); 
imagecopy($dest, $img2, 800, 0, 20, 13, 1000, 1000);
$handle = fopen('paf',"w+");
imagepng($dest, $handle);
}
my_merge_image();
