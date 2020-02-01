<?php
/**
 * Run this code in your main hosting (NOT LOCAL SERVER)
 */

$url =
'https://www.youtube.com/get_video_info?c=web&el=embedded&hl=en_US&cver=html5&html5=1&asv=3&video_id=YQHsXMglC9A&iframe=1';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
    'Accept-Language: en-US,en;q=0.5',
    'Referer: https://youtube.com',
    "X-Forwarded-For: {$_SERVER['REMOTE_ADDR']}" 
]);
curl_setopt($ch, CURLOPT_TIMEOUT, 80);
$output = curl_exec($ch);
$httpcode = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpcode === 200) {
    echo "YouTube downloader endpoint is accessible from your server IP.";
} else {
    echo "Your server IP is blacklisted by YouTube.";
}
