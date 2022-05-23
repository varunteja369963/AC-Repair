<?php
ini_set ('display_errors', 'on');
ini_set ('log_errors', 'on');
ini_set ('display_startup_errors', 'on');
ini_set ('error_reporting', E_ALL);

date_default_timezone_set("Asia/Calcutta");
if(isset($_POST['submit'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$utm_source = $_POST['utm_source'];
$utm_medium = $_POST['utm_medium'];
$utm_campaign = $_POST['utm_campaign'];
$ts = date('d-m-Y H:i:s');


$data =  <<<EOF
Name : $name
Email : $email
Phone : $phone
Message: $message
Timestamp : $ts
UTM_SOURCE : $utm_source
UTM_MEDIUM : $utm_medium
UTM_CAMPAIGN : $utm_campaign
Time : $ts
EOF;

//echo "<pre>";print_r($data);echo "</pre>";die();

$to ='srcbricon@gmail.com';
// $to ='pavany@janaspandana.in';
$from='noreply@sairaghavendraconstructions.com';
$headers = "From:<noreply@sairaghavendraconstructions.in>";
$subject = "sairaghavendraconstructions - New Lead";

$filename = "hello.csv";
$f_data= "
$name,$email,$phone,$utm_source,$utm_medium,$utm_campaign,$ts";


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

$update_range = "icon_msg!A2:J5000";
$values = [
    [$ts, $name,$email, $phone, $message, $utm_source, $utm_medium, $utm_campaign]
];

$spreadsheetId = '14RQG-0RExlJIRDyQrMgXGWG623dg5HCdZI_8U9nrg7Y';

$body = new Google_Service_Sheets_ValueRange([

    'values' => $values

  ]);

  $params = [
    'valueInputOption' => 'RAW'
  ];

  $update_sheet = $service->spreadsheets_values->append($spreadsheetId, $update_range, $body, $params);
header("Location:https://sairaghavendraconstructions.com/thank-you.php");
//   echo $data;
}
?>