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

// Try get printable pack prices
echo "\nGet printable pack prices...";
$pricesRequest = new \treatstock\api\v2\models\requests\GetPrintablePackPricesRequest();
$pricesRequest->printablePackId = $createResponse->id;
$pricesResponse = $apiService->getPrintablePackPrices($pricesRequest);
echo "\nFirst printable pack price response:\n";
$firstPrice = reset($pricesResponse->pricesInfo);
echo \treatstock\api\v2\helpers\FormattedJson::encode($firstPrice);

$placeOrderRequest =new \treatstock\api\v2\models\requests\PlaceOrderRequest();
$placeOrderRequest->printablePackId =$createResponse->id;
$placeOrderRequest->modelTextureInfo = new \treatstock\api\v2\models\ModelTextureInfo();
$placeOrderRequest->modelTextureInfo->modelTexture = new \treatstock\api\v2\models\Texture();
$placeOrderRequest->modelTextureInfo->modelTexture->color = $firstPrice->color;
$placeOrderRequest->modelTextureInfo->modelTexture->materialGroup = $firstPrice->materialGroup;
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
$placeOrderRequest->providerId = $firstPrice->providerId;
$placeOrderResponse = $apiService->placeOrder($placeOrderRequest);
echo "\nPlace order response:\n";
echo \treatstock\api\v2\helpers\FormattedJson::encode($placeOrderResponse);

// Not published yet
/*
$payOrderRequest = new \treatstock\api\v2\models\requests\PayOrderRequest();
$payOrderRequest->orderId = $placeOrderResponse->orderId;
$payOrderRequest->total = $placeOrderResponse->total;
$payOrderResponse = $apiService->payOrder($payOrderRequest);
echo "\nPay order response:\n";
echo \treatstock\api\v2\helpers\FormattedJson::encode($payOrderResponse);
*/