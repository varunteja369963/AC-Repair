<?php
date_default_timezone_set("Asia/Calcutta");
if(isset($_POST['submit'])) {
$name = $_POST['name'];
$phone = $_POST['phone'];
$utm_source = $_POST['utm_source'];
$utm_medium = $_POST['utm_medium'];
$utm_campaign = $_POST['utm_campaign'];
$ts = date('d-m-Y H:i:s');

$data =  <<<EOF
Name : $name
Phone : $phone
Timestamp : $ts
UTM_SOURCE : $utm_source
UTM_MEDIUM : $utm_medium
UTM_CAMPAIGN : $utm_campaign
Time : $ts
EOF;

$to ='ukleads@orientspectra.com';
// $to ='pavany@janaspandana.in';
$from='noreply@abroadconsultancy.in';
$headers = "From:<noreply@abroadconsultancy.in>";
$subject = "abroadconsultancy - New Lead";

$filename = "hello.csv";
$f_data= "
$name,$phone,$studies,$utm_source,$utm_medium,$utm_campaign,$ts";


// $menc = urlencode($message);
// $uri = "http://vasavigroup09.remserp.com/IVR_Inbound.aspx?UID=fourqt&PWD=wn9mxO76f34=&f=m&con=$phone&email=$email&name=$name&Remark=$menc&Proj=vasaviurban&src=GoogleAds&amob=&city=@city&location=@location&ch=GA" ;
//  $response = Request::get($uri)->send();


$file = fopen($filename, "a");
fwrite($file,$f_data);
fclose($file);

mail($to,$subject,$data,$headers);
require __DIR__ . '/vendor/autoload.php';


$client = new \Google_Client();

$client->setApplicationName('Google Sheets for shilpa group');

$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);

$client->setAccessType('offline');

$client->setAuthConfig(__DIR__ . '/credentials.json');

$service = new Google_Service_Sheets($client);

$update_range = "hello!A2:J5000";
$values = [
    [$ts, $name, $phone, "", $utm_source, $utm_medium, $utm_campaign]
];

$spreadsheetId = '13CmKtA_PGL6Q7-VHA3pMqunySvBhu6-WdMKmkzCcT60';

$body = new Google_Service_Sheets_ValueRange([

    'values' => $values

  ]);

  $params = [
    'valueInputOption' => 'RAW'
  ];

  $update_sheet = $service->spreadsheets_values->append($spreadsheetId, $update_range, $body, $params);
header("Location:https://abroadconsultancy.in/thank-you.html");
//   echo $data;
}
?>