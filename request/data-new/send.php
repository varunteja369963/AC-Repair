<?php
ini_set ('display_errors', 'on');
ini_set ('log_errors', 'on');
ini_set ('display_startup_errors', 'on');
ini_set ('error_reporting', E_ALL);

date_default_timezone_set("Asia/Calcutta");

$appliance = $_REQUEST['appliance'];
$problem = $_REQUEST['problem'];
$mobile = $_REQUEST['mobile'];
$dateVisited = date("Y-m-d H:i:s");
$brand = $_REQUEST['brand'];
$path = $_REQUEST['path'];
$utm_source = $_REQUEST['utm_source'];
$utm_medium = $_REQUEST['utm_medium'];
$utm_network = $_REQUEST['utm_network'];
$utm_campaign = $_REQUEST['utm_campaign'];
$utm_adgroup = $_REQUEST['utm_adgroup'];
$utm_keyword = $_REQUEST['utm_keyword'];

require __DIR__ . '/vendor/autoload.php';


$client = new \Google_Client();

$client->setApplicationName('Ravi Lead Sheet');

$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);

$client->setAccessType('offline');

$client->setAuthConfig(__DIR__ . '/credentials.json');

$service = new Google_Service_Sheets($client);

$update_range = "Sheet1!A2:J5000";
$values = [
    [$dateVisited, $mobile, $appliance, $problem, $brand, $path, $utm_source, $utm_medium, $utm_network, $utm_campaign, $utm_adgroup, $utm_keyword]
];

$spreadsheetId = '18Mk_cDnxRK2bh2e3-zo9Nvsd_YaMCX6qZYglhiWV_lE';

$body = new Google_Service_Sheets_ValueRange([

    'values' => $values

  ]);

  $params = [
    'valueInputOption' => 'RAW'
  ];

  $update_sheet = $service->spreadsheets_values->append($spreadsheetId, $update_range, $body, $params);

?>