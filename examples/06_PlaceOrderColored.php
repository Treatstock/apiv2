<?php

include '../Loader.php';

$privateKey = '15ce76a20be443acfeae731cbc27dc';
$apiService = new \treatstock\api\v2\TreatstockApiService($privateKey);

// Try create printable pack
$createRequest = new \treatstock\api\v2\models\requests\CreatePrintablePackRequest();
$createRequest->filePaths[] = __DIR__.'/test.stl';
$createRequest->filePaths[] = __DIR__.'/test2.stl';
$createRequest->locationCountryIso = 'US'; // Optional params: to get printable pack price info

echo "\nSend create printable pack request...";
$createResponse = $apiService->createPrintablePack($createRequest);
echo "\nCreated, printable pack id: " . $createResponse->id . "\n";

$partId1 = $createResponse->parts[0];
$partId1Uid = $partId1->uid;
$partId2 = $createResponse->parts[1];
$partId2Uid = $partId2->uid;

// Change printable pack color for all model
$changePackRequest = new \treatstock\api\v2\models\requests\ChangePrintablePackRequest();
$changePackRequest->printablePackId = $createResponse->id;
$changePackRequest->textureInfo = new \treatstock\api\v2\models\ModelTextureInfo();
$changePackRequest->textureInfo->isOneMaterialForKit = 0;
$changePackRequest->textureInfo->partsMaterial = [];
$changePackRequest->textureInfo->partsMaterial[$partId1Uid] = new \treatstock\api\v2\models\Texture();
$changePackRequest->textureInfo->partsMaterial[$partId1Uid]->materialGroup = 'PLA'; // This is case sensitive, you can get with codes using example 10_GetMaterialGroupColors.php
$changePackRequest->textureInfo->partsMaterial[$partId1Uid]->color = 'Red';
$changePackRequest->textureInfo->partsMaterial[$partId2Uid] = new \treatstock\api\v2\models\Texture();
$changePackRequest->textureInfo->partsMaterial[$partId2Uid]->materialGroup = 'PLA'; // This is case sensitive, you can get with codes using example 10_GetMaterialGroupColors.php
$changePackRequest->textureInfo->partsMaterial[$partId2Uid]->color = 'Blue';
echo "\nChange printable pack colors request.\n";
$changePrintablePackResponse = $apiService->changePrintablePack($changePackRequest); // If request failed, it will have exception
echo "Changed.\n";

// Sleep 5 sec, waiting for model size calculations
sleep(5);

// Try get printable pack prices
echo "\nGet printable pack offers...";
$offersRequest = new \treatstock\api\v2\models\requests\GetPrintablePackOffersRequest();
$offersRequest->printablePackId = $createResponse->id;
$offersResponse = $apiService->getPrintablePackOffers($offersRequest);
echo "\nGet printable pack offers response:\n";
echo \treatstock\api\v2\helpers\FormattedJson::encode($offersResponse);


echo "\n\nMake order...";

$placeOrderRequest = new \treatstock\api\v2\models\requests\PlaceOrderRequest();
$placeOrderRequest->printablePackId = $createResponse->id;
$placeOrderRequest->modelTextureInfo = $offersResponse->modelTextureInfo;
$firstOffer = reset($offersResponse->offersList);
$placeOrderRequest->providerId = $firstOffer->providerId;
$placeOrderRequest->comment = 'Please print it as fast as possible.';
$placeOrderRequest->location = new \treatstock\api\v2\models\ClientLocation();
$placeOrderRequest->location->company = 'Big company';
$placeOrderRequest->location->email   = 'test@company.com';
$placeOrderRequest->shippingAddress = new \treatstock\api\v2\models\ShippingAddress();
$placeOrderRequest->shippingAddress->country = 'US';
$placeOrderRequest->shippingAddress->state ='DC';
$placeOrderRequest->shippingAddress->street = '727 C ST SE';
$placeOrderRequest->shippingAddress->city = 'WASHINGTON';
$placeOrderRequest->shippingAddress->firstName = 'Bill';
$placeOrderRequest->shippingAddress->lastName = 'Jobs';
$placeOrderRequest->shippingAddress->zip = '20003';
$placeOrderResponse = $apiService->placeOrder($placeOrderRequest);
echo "\nPlace order response:\n";
echo \treatstock\api\v2\helpers\FormattedJson::encode($placeOrderResponse);