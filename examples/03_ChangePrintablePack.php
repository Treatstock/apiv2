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
echo "\nCreated, printable pack id: ".$createResponse->id."\n";


// Sleep 5 sec, waiting for model calculations
sleep(5);

// Change printable pack Qty
$changePackRequest = new \treatstock\api\v2\models\requests\ChangePrintablePackRequest();
$firstPart = reset($createResponse->parts);
$changePackRequest->printablePackId = $createResponse->id;
$changePackRequest->qty =
[
    $firstPart->uid => 5
];
echo "\nChange printable pack qty request.\n";
$changePrintablePackResponse = $apiService->changePrintablePack($changePackRequest); // If request failed, it will have exception
echo "\nChanged.\n";

// Change printable pack scale
$changePackRequest = new \treatstock\api\v2\models\requests\ChangePrintablePackRequest();
$changePackRequest->printablePackId = $createResponse->id;
//$changePackRequest->scaleUnit = \treatstock\api\v2\models\requests\ChangePrintablePackRequest::SCALE_UNIT_IN;
$changePackRequest->scale = 0.5;
echo "\nChange printable pack scale request.\n";
$changePrintablePackResponse = $apiService->changePrintablePack($changePackRequest); // If request failed, it will have exception
echo "\nChanged.\n";

// If you want, you can check it by get current status
echo "\nGet printable pack status...";
$testStatusRequest = new \treatstock\api\v2\models\requests\GetPrintablePackStatusRequest();
$testStatusRequest->printablePackId = $createResponse->id;
$testStatusResponse = $apiService->getPrintablePackStatus($testStatusRequest);
echo "\nGet printable pack status response:\n";
echo \treatstock\api\v2\helpers\FormattedJson::encode($testStatusResponse);



