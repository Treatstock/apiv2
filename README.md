<h1>Treatstock API</h>


<h2>Introduction</h2>

With Treatstock API you can upload 3D models, get their size and weight estimation, calculate 3D printing prices and place orders.

The simplest way to use our solution is to create a printable pack via API and then redirect your client using treatstock.api url.

At first, you should clone this project from git. In the "examples" folder you can find 01_CreatePrintablePack.php. We recommend you to try running this sample code. 

All API requests should be processed through "TreatstockApiService" class.
Class constructor contains parameter $privateKey, which is your personal company key for API access to Treatstock.
To get one you should contact support@treatstock.com.

<h2>Create Printable Pack</h2>

Creating instance of this class:

<pre>
$apiService = new \treatstock\api\v2\TreatstockApiService($privateKey);
</pre>

Additionally, you can set a debug mode to output all http info requests:
<pre>
$apiService->setDebugMode(true);
</pre>

Let's make a simple request for creating a printable pack. The request must contain files path and client’s potential location on a country level. The default location is the US (United States of America).

<pre>
$createRequest = new \treatstock\api\v2\models\requests\CreatePrintablePackRequest();
$createRequest->filePaths[] = __DIR__.'/test.stl';
$createRequest->locationCountryIso = 'US'; // Optional params: to get printable pack price info
echo "\nSend create printable pack request...";
$createResponse = $apiService->createPrintablePack($createRequest);
echo "\nCreate printable pack response:\n";
echo \treatstock\api\v2\helpers\FormattedJson::encode($createResponse);
</pre>

Output example:
<pre>
Send create printable pack request...
Create printable pack response:
{
    "id": 200010,
    "redir": "https://www.treatstock.com/catalog/model3d/preload-printable-pack?packPublicToken=ee13f4e-4873bd7-424b569",
    "widgetUrl": "https://www.treatstock.com/api/v2/printable-pack-widget/?apiPrintablePackToken=ee13f4e-4873bd7-424b569",
    "widgetHtml": "<!-- ApiWidget: ee13f4e-4873bd7-424b569 --><link href=\"https://www.treatstock.com/css/embed-user.css\" rel=\"stylesheet\" /><iframe class=\"ts-embed-userwidget\" width=\"100%\" height=\"650px\" src=\"https://www.treatstock.com/api/v2/printable-pack-widget/?apiPrintablePackToken=ee13f4e-4873bd7-424b569\" frameborder=\"0\"></iframe>",
    "parts": [
        {
            "uid": "MP:1609949",
            "name": "test.stl",
            "qty": 1,
            "hash": "7e02f089e3e508459c967de27c10d45c",
            "size": null,
            "originalSize": null,
            "weight": null,
            "texture": null
        }
    ]
}
</pre>

<b>id</b>           - printable pack id<br>
<b>redir</b>        - url for a page with a 3D model<br>
<b>widgetUrl</b>    - can be used for iframe with custom settings<br>
<b>widgetHtml</b>   - an html code with ready to use iframe<br>
<b>parts</b>        - list of information on model3d parts<br>

You can use parts information to change qty (quantity), color(s) and material(s) choice, get data on a possible weight of model(s).
If you engage visitors to place orders via our API, you will get an affiliate reward for each completed order.


<h2>Colors and Prices</h2>
To get a list of prices for 3D printing with different colors and materials, run the following price request - 04_GetPrintablePackPrices.php

This should be used after a printable pack created and contain the printablePackId:
<pre>
// Try get printable pack prices
echo "\nGet printable pack prices...";
$pricesRequest = new \treatstock\api\v2\models\requests\GetPrintablePackPricesRequest();
$pricesRequest->printablePackId = $createResponse->id;
$pricesResponse = $apiService->getPrintablePackPrices($pricesRequest);
echo "\nGet printable pack prices response:\n";
</pre>

Output example:
<pre>
Get printable pack prices response:
{
    "pricesInfo": [
        {
            "printablePackId": 200596,
            "materialGroup": "ABS",
            "printer": "Schmidt Proto: JGAURORA Desktop 3D Printer",
            "providerId": 4084,
            "rating": 0,
            "reviewsCount": 0,
            "color": "VeryDarkBrown",
            "price": 12.99,
            "url": "http://ts.h3.tsdev.work/model3d/preload-printable-pack?packPublicToken=dd7774d-14cd878-ed2a9ab&printerMaterialGroupId=18&printerColorId=82"
        },
        {
            "printablePackId": 200596,
            "materialGroup": "Resin",
            "printer": "Modern Blacksmith 3D Printing Services: Photon",
            "providerId": 4274,
            "rating": 4.8,
            "reviewsCount": 47,
            "color": "Yellow",
            "price": 13.33,
            "url": "http://ts.h3.tsdev.work/model3d/preload-printable-pack?packPublicToken=dd7774d-14cd878-ed2a9ab&printerMaterialGroupId=5&printerColorId=4"
        }
     ....
     ]
}  
</pre>

The url received can be used for placing an order with a specific vendor with selected parameters (material and color) for the estimated price.

<h2>Make order</h2>

For partners capable of generating 3D printing order flow we have an API for creating orders.
Example: 05_PlaceOrder.php

To make it work, you must set information about the client’s location, phone number, material(s) and color(s) choice as well as select a 3D printer to send the order to.

Output example: 
<pre>
{
    "orderId": 44649,
    "total": 10.24,
    "url": "http://ts.h3.tsdev.work/workbench/order/view/44649"
}</pre>

<h2>Make an Order for different colors</h2>

For printing model3d in different colors, use the example: 06_PlaceOrderColored.php

Use the following codes:
1. $apiService->createPrintablePack - create printable pack
2. $apiService->changePrintablePack - sets colors and materials manually for a specific 3dmodel
3. $apiService->getPrintablePackOffers -  gets actual offers for 3D printing from different service providers on Treatstock

Output example:
<pre>
{
    "modelTextureInfo": {
        "isOneMaterialForKit": false,
        "modelTexture": null,
        "partsMaterial": {
            "1536027": {
                "color": "Red",
                "materialGroup": "PLA",
                "material": null
            },
            "1536028": {
                "color": "Blue",
                "materialGroup": "PLA",
                "material": null
            }
        }
    },
    "offersList": [
        {
            "providerId": 934,
            "printPrice": 7.04
        },
        {
            "providerId": 3174,
            "printPrice": 8.39
        },
        {
            "providerId": 2421,
            "printPrice": 8.39
        },
        ....
    ]
}
</pre>

4. $apiService->placeOrder - places an order using a specific offer from the previous request
Output example:
<pre>
{
    "orderId": 44650,
    "total": 7.04,
    "url": "http://ts.h3.tsdev.work/workbench/order/view/44650"
}
</pre>

<h2>Pay order</h2>
You can pay order using treatstock account balance.
This should be used after a order created:
<pre>
$payOrderRequest = new \treatstock\api\v2\models\requests\PayOrderRequest();
$payOrderRequest->orderId = $placeOrderResponse->orderId;
$payOrderRequest->total = $placeOrderResponse->total;
$payOrderResponse = $apiService->payOrder($payOrderRequest);
echo "\nPay order response:\n";
echo \treatstock\api\v2\helpers\FormattedJson::encode($payOrderResponse);
</pre>

Output example:
<pre>
Pay order response:
{
    "orderId": 46004,
    "total": 12.26,
    "invoiceUuid": "7PBR4J"
}
</pre>


<h2>Send and Receive messages</h2>
After order is payed, you can contact via messages with Printing company.

Receive messages example:

<pre>
$getMessagesRequest = new \treatstock\api\v2\models\requests\GetMessagesRequest();
$getMessagesRequest->orderId = $placeOrderResponse->orderId;
$getMessagesResponse = $apiService->getMessages($getMessagesRequest);
echo "\n\nGet messages response:\n";
echo \treatstock\api\v2\helpers\FormattedJson::encode($getMessagesResponse);
</pre>

Output example:
<pre>
Get messages response:
{
    "topics": [
        {
            "id": 38386,
            "creatorUid": "pXL9Hv",
            "creatorTitle": "nikolaj",
            "createdAt": "2019-07-26 13:37:07",
            "title": "Order #46005",
            "lastMessageTime": "2019-07-26 13:37:07",
            "orderId": 46005,
            "messages": [
                {
                    "id": 114989,
                    "userUid": "pXL9Hv",
                    "userTitle": "nikolaj",
                    "createdAt": "2019-07-26 13:37:07",
                    "text": "Hi! What about my order?",
                    "topicId": 38386,
                    "files": null
                }
            ]
        }
    ]
}
</pre>

You will receive list of topics with attached messages.  


Sending message example:

<pre>
$sendMessageRequest = new \treatstock\api\v2\models\requests\SendMessageRequest();
$sendMessageRequest->orderId = $placeOrderResponse->orderId;
$sendMessageRequest->messageText = 'Hi! What about my order?';
$sendMessageResponse = $apiService->sendMessage($sendMessageRequest);
echo "\nSend message response:\n";
echo \treatstock\api\v2\helpers\FormattedJson::encode($sendMessageResponse);
</pre>

Output example:
<pre>
{
    "id": 114989,
    "userUid": "pXL9Hv",
    "userTitle": "nikolaj",
    "createdAt": "2019-07-26 13:37:07",
    "text": "Hi! What about my order?",
    "topicId": 38386,
    "files": []
}
</pre>

Every message attached to message topic. If printing company will be changed, you will have second message topic.
Files list contains filename, and download file url (available for one hour).


<h2>Additional Features</h2>

* You can use the code "material" instead of "materialGroup" for printing a specific material rather than placing an order for any available material in the group (for example, to narrow your choice to “PLA+” instead of every filament in the range of “PLA”).
* You can override the "RequestProcessor" class for network or log control.

Example:
<pre>
class RequestProcessorExt extends \treatstock\api\v2\requestProcessor\RequestProcessor
{
    protected function debugWrite($params)
    {
       // Insert log into files
    }
}

$apiService->requestProcessor  = new RequestProcessorExt();
...
$createResponse = $apiService->createPrintablePack($createRequest);
</pre>

* Treatsock can also autodetect client’s location by their IP. To do so, replace the code:  
<pre>$createRequest->locationCountryIso = 'US'</pre>
instead of
<pre>$createRequest->locationIp = '000.000.000.000';</pre> 


* It is possible to use zip files and URLs for large 3D models, so Treatsock will download the files via links provided. To use this feature, replace the following code:
<pre>
$createRequest->filePaths[] = __DIR__.'/test.stl';
</pre>

instead of 

<pre>
$createRequest->fileUrls[] = 'http://mysite.com/test.stl';
</pre>
or 
<pre>
$createRequest->fileUrls[] = 'http://mysite.com/test.zip';
</pre>