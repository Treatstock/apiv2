<?php

include '../Loader.php';

$privateKey = '15ce76a20be443acfeae731cbc27dc';
$apiService = new \treatstock\api\v2\TreatstockApiService($privateKey);
$apiService->setDebugMode(true);

// Try create printable pack
$createRequest = new \treatstock\api\v2\models\requests\CreatePrintablePackRequest();
$createRequest->filePaths[] = __DIR__.'/test.stl';
$createRequest->locationCountryIso = 'US'; // Optional params: to get printable pack price info

echo "\nSend create printable pack request...";
$createResponse = $apiService->createPrintablePack($createRequest);
echo "\nCreated, printable pack id: ".$createResponse->id."\n";


// Try get status printable pack
echo "\nGet printable pack status...";
$testStatusRequest = new \treatstock\api\v2\models\requests\GetPrintablePackStatusRequest();
$testStatusRequest->printablePackId = $createResponse->id;
$testStatusResponse = $apiService->getPrintablePackStatus($testStatusRequest);
echo "\nGet printable pack status response:\n";
echo \treatstock\api\v2\helpers\FormattedJson::encode($testStatusResponse);

