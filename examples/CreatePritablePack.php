<?php

include '../Loader.php';

$privateKey = '15ce76a20be443acfeae731cbc27dc';
$apiService = new \treatstock\api\v2\TreatstockApiService($privateKey);
//$apiService->setDebugMode(true);

// Try create printable pack
$createRequest = new \treatstock\api\v2\models\requests\CreatePrintablePackRequest();
$createRequest->filePaths[] = './test.stl';
$createRequest->locationCountryIso = 'US'; // Optional params: to get printable pack cost info

echo "\nSend create printable pack request...";
$createResponse = $apiService->createPrintablePack($createRequest);
echo "\nCreate printable pack responce:\n";
var_dump($createResponse);


// Try get status by previos printable pack
echo "\nGet printable pack status...";
$testStatusRequest = new \treatstock\api\v2\models\requests\GetPrintablePackStatusRequest();
$testStatusRequest->printablePackId = $createResponse->id;
$testStatusResponse = $apiService->getPrintablePackStatus($testStatusRequest);
echo "\nGet printable pack status:\n";
var_dump($testStatusResponse);

// Try get printable pack costs
echo "\nGet printable pack costs...";
$testStatusRequest = new \treatstock\api\v2\models\requests\GetPrintablePackCostsRequest();
$testStatusRequest->printablePackId = $createResponse->id;
if (0) { // Optional set location, you can skip this set, if $createRequest->locationCountryIso setted
    $location = new \treatstock\api\v2\models\Location();
    $location->country = 'US';
    $testStatusRequest->location = $location;
}
$testStatusResponse = $apiService->getPrintablePackCosts($testStatusRequest);
echo "\nGet printable pack status:\n";
var_dump($testStatusResponse);

