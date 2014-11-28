<?php

function _curl($url,$post = false,$usecookie = false, $headers = false) {
    $ch = curl_init();
    if($post) {
        curl_setopt($ch, CURLOPT_POST ,1);
        curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
    }
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:8.0) Gecko/20100101 Firefox/8.0");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    if ($usecookie) {
        curl_setopt($ch, CURLOPT_COOKIEJAR, $usecookie);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $usecookie);
    }
    if($headers){
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        //curl_setopt($ch, CURLOPT_HEADER, 1);
    }
    curl_setopt($ch, CURLOPT_TIMEOUT,10);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,10);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    $result=curl_exec ($ch);
    curl_close ($ch);
    return $result;
}