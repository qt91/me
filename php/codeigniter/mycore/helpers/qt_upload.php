<?php
/**
 * Decode end Save file image from string base 64
 * @param string $$base64img String file image encode base 64
 * @param string $path_save Path save file with Name file
 * @return string path save
 */
function upload_image_base64($base64img, $path_save){
    //$base64img = str_replace('data:image/jpeg;base64,', '', $base64img);
    $base64img = str_replace('data:image/png;base64,', '', $base64img);
    file_put_contents($path_save, base64_decode($base64img));
    //$ifp = fopen($path_save, "wb"); 

    //$data = explode(',', $base64img);
    //echo $data[1];
    //fwrite($ifp, base64_decode($base64img)); 
    //fclose($ifp); 
    /*
    list($type, $base64img) = explode(';', $base64img);
    list(, $base64img)      = explode(',', $base64img);
    $data = base64_decode($base64img);

    file_put_contents($path_save, $data);
    */

    return $path_save; 
}