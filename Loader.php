<?php

include 'models/ModelValidatorInterface.php';
include 'models/PrintablePackPrice.php';
include 'models/ModelReflectionService.php';
include 'models/PriceInfo.php';
include 'models/MaterialGroupColor.php';
include 'models/Color.php';
include 'models/Model3dPart.php';
include 'models/PartSize.php';
include 'models/Texture.php';
include 'models/ClientLocation.php';
include 'models/ShippingAddress.php';
include 'models/ModelTextureInfo.php';
include 'models/PrintOffer.php';
include 'models/requests/CreatePrintablePackRequest.php';
include 'models/requests/ChangePrintablePackRequest.php';
include 'models/requests/GetPrintablePackStatusRequest.php';
include 'models/requests/GetPrintablePackPricesRequest.php';
include 'models/requests/PlaceOrderRequest.php';
include 'models/requests/GetPrintablePackOffersRequest.php';

include 'models/responses/CreatePrintablePackResponse.php';
include 'models/responses/SuccessFlagResponse.php';
include 'models/responses/GetPrintablePackStatusResponse.php';
include 'models/responses/GetPrintablePackPricesResponse.php';
include 'models/responses/GetMaterialGroupColorsResponse.php';
include 'models/responses/PlaceOrderResponse.php';
include 'models/responses/GetPrintablePackOffersResponse.php';

include 'requestProcessor/requests/BaseRequest.php';
include 'requestProcessor/requests/PlaceOrderHttpRequest.php';
include 'requestProcessor/requests/ChangePrintablePackHttpRequest.php';
include 'requestProcessor/requests/CreatePrintablePackHttpRequest.php';
include 'requestProcessor/requests/GetPrintablePackStatusHttpRequest.php';
include 'requestProcessor/requests/GetPrintablePackPricesHttpRequest.php';
include 'requestProcessor/requests/GetMaterialGroupColorsHttpRequest.php';
include 'requestProcessor/requests/GetPrintablePackOffersHttpRequest.php';

include 'requestProcessor/responses/BaseResponse.php';
include 'requestProcessor/responses/PlaceOrderHttpResponse.php';
include 'requestProcessor/responses/ChangePrintablePackHttpResponse.php';
include 'requestProcessor/responses/CreatePrintablePackHttpResponse.php';
include 'requestProcessor/responses/GetPrintablePackStatusHttpResponse.php';
include 'requestProcessor/responses/GetPrintablePackPricesHttpResponse.php';
include 'requestProcessor/responses/GetMaterialGroupColorsHttpResponse.php';
include 'requestProcessor/responses/GetPrintablePackOffersHttpResponse.php';

include 'requestProcessor/RequestProcessor.php';

include 'exceptions/InvalidAnswerException.php';
include 'exceptions/InvalidAnswerModelException.php';

include 'helpers/FormattedJson.php';


include 'TreatstockApiService.php';


