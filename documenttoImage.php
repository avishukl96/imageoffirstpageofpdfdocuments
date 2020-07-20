<?php
$fileName = $record['id'].'.'.$record['extension'];   //pdf documents file name
$imagePath = DOCUMENTS_PATH.'docImage/'; 			  // folder of image in which want to store  
$imageName = $record['id'];							  // image name without extension 
if(!file_exists($imagePath.$imageName.'.jpeg')){
$pdfPath = DOCUMENTS_PATH . '/' . $fileName;          // pdf documents folder path
$im = new imagick();
$im->setResolution(300, 300);
$im->readImage($pdfPath.'[0]');
$im->setImageFormat('jpeg');                          // image format 
$im->setImageCompression(imagick::COMPRESSION_JPEG);
$im->setImageCompressionQuality(100);
$im = $im->flattenImages();
$im->writeImage($imagePath.$imageName.'.jpeg');
$im->clear();
$im->destroy();
}

//image url looks like this
$image_url = $imagefolderPath/'.$record['id'].'.jpeg';

?>