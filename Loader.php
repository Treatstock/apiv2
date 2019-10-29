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
include 'models/ValidatedAddress.php';
include 'models/ModelTextureInfo.php';
include 'models/PrintOffer.php';
include 'models/MsgTopic.php';
include 'models/MsgMessage.php';
include 'models/MsgMessageFile.php';

include 'models/requests/CreatePrintablePackRequest.php';
include 'models/requests/ChangePrintablePackRequest.php';
include 'models/requests/GetPrintablePackStatusRequest.php';
include 'models/requests/GetPrintablePackPricesRequest.php';
include 'models/requests/PlaceOrderRequest.php';
include 'models/requests/GetPrintablePackOffersRequest.php';
include 'models/requests/PayOrderRequest.php';
include 'models/requests/ReceiptRequest.php';
include 'models/requests/SendMessageRequest.php';
include 'models/requests/GetMessagesRequest.php';
include 'models/requests/OrderStatusRequest.php';
include 'models/ShippingOrderInfo.php';

include 'models/responses/CreatePrintablePackResponse.php';
include 'models/responses/SuccessFlagResponse.php';
include 'models/responses/GetPrintablePackStatusResponse.php';
include 'models/responses/GetPrintablePackPricesResponse.php';
include 'models/responses/GetMaterialGroupColorsResponse.php';
include 'models/responses/PlaceOrderResponse.php';
include 'models/responses/GetPrintablePackOffersResponse.php';
include 'models/responses/PayOrderResponse.php';
include 'models/responses/ReceiptResponse.php';
include 'models/responses/SendMessageResponse.php';
include 'models/responses/GetMessagesResponse.php';
include 'models/responses/OrderStatusResponse.php';

include 'requestProcessor/requests/BaseRequest.php';
include 'requestProcessor/requests/PlaceOrderHttpRequest.php';
include 'requestProcessor/requests/ChangePrintablePackHttpRequest.php';
include 'requestProcessor/requests/CreatePrintablePackHttpRequest.php';
include 'requestProcessor/requests/GetPrintablePackStatusHttpRequest.php';
include 'requestProcessor/requests/GetPrintablePackPricesHttpRequest.php';
include 'requestProcessor/requests/GetMaterialGroupColorsHttpRequest.php';
include 'requestProcessor/requests/GetPrintablePackOffersHttpRequest.php';
include 'requestProcessor/requests/PayOrderHttpRequest.php';
include 'requestProcessor/requests/ReceiptHttpRequest.php';
include 'requestProcessor/requests/SendMessageHttpRequest.php';
include 'requestProcessor/requests/GetMessagesHttpRequest.php';
include 'requestProcessor/requests/OrderStatusHttpRequest.php';

include 'requestProcessor/responses/BaseResponse.php';
include 'requestProcessor/responses/PlaceOrderHttpResponse.php';
include 'requestProcessor/responses/ChangePrintablePackHttpResponse.php';
include 'requestProcessor/responses/CreatePrintablePackHttpResponse.php';
include 'requestProcessor/responses/GetPrintablePackStatusHttpResponse.php';
include 'requestProcessor/responses/GetPrintablePackPricesHttpResponse.php';
include 'requestProcessor/responses/GetMaterialGroupColorsHttpResponse.php';
include 'requestProcessor/responses/GetPrintablePackOffersHttpResponse.php';
include 'requestProcessor/responses/PayOrderHttpResponse.php';
include 'requestProcessor/responses/ReceiptHttpResponse.php';
include 'requestProcessor/responses/SendMessageHttpResponse.php';
include 'requestProcessor/responses/GetMessagesHttpResponse.php';
include 'requestProcessor/responses/OrderStatusHttpResponse.php';

include 'requestProcessor/RequestProcessor.php';

include 'exceptions/TreatstockException.php';
include 'exceptions/InvalidAnswerException.php';
include 'exceptions/InvalidAnswerModelException.php';
include 'exceptions/UnSuccessException.php';

include 'helpers/FormattedJson.php';


include 'TreatstockApiService.php';


