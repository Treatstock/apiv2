<?php

include '../Loader.php';

$privateKey = '15ce76a20be443acfeae731cbc27dc';
$apiService = new \treatstock\api\v2\TreatstockApiService($privateKey);
//$apiService->setDebugMode(false);

echo "\nGet material group colors...";
$materialGroupColors = $apiService->getMaterialGroupColors();
echo "\nCreate printable pack responce:\n";
echo \treatstock\api\v2\helpers\FormattedJson::encode($materialGroupColors);
