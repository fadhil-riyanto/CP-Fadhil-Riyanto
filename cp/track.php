<?php
function getPlatform() {
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $platform = 'Unknown';
 
    //Get the platform
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    } elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }
    
    return $platform;
}
$system= getPlatform();
$refferer = @$_SERVER['HTTP_REFERER']?$_SERVER['HTTP_REFERER']:'No Refferer';
$ip = @$_SERVER['REMOTE_ADDR'];
$tanggal = @date('Y-m-d H:i:s');
$data = @"System: ".$system."_____". "Tanggal Akses: ".$tanggal."_____". "IP: ".$ip."_____"."Refferer: ".$refferer."\r\n";
@file_put_contents('log.txt', $data, FILE_APPEND);
?>