<?php

include '../Loader.php';

$privateKey = '15ce76a20be443acfeae731cbc27dc';
$apiService = new \treatstock\api\v2\TreatstockApiService($privateKey);
//$apiService->setDebugMode(true);

// Try create printable pack
$createRequest = new \treatstock\api\v2\models\requests\CreatePrintablePackRequest();
$createRequest->filePaths[] = __DIR__.'/test.stl';
$createRequest->locationCountryIso = 'US'; // Optional params: to get printable pack price info

echo "\nSend create printable pack request...";
$createResponse = $apiService->createPrintablePack($createRequest);
echo "\nCreate printable pack response:\n";
echo \treatstock\api\v2\helpers\FormattedJson::encode($createResponse);

