<?php

include 'models/ModelValidatorInterface.php';
include 'models/PrintablePackCost.php';
include 'models/ModelReflectionService.php';
include 'models/CostInfo.php';
include 'models/MaterialGroupColor.php';
include 'models/Color.php';
include 'models/Location.php';
include 'models/requests/CreatePrintablePackRequest.php';
include 'models/requests/GetPrintablePackStatusRequest.php';
include 'models/requests/GetPrintablePackCostsRequest.php';

include 'models/responses/CreatePrintablePackResponse.php';
include 'models/responses/GetPrintablePackStatusResponse.php';
include 'models/responses/GetPrintablePackCostsResponse.php';
include 'models/responses/GetMaterialGroupColorsResponse.php';

include 'requestProcessor/requests/BaseRequest.php';
include 'requestProcessor/requests/CreatePrintablePackHttpRequest.php';
include 'requestProcessor/requests/GetPrintablePackStatusHttpRequest.php';
include 'requestProcessor/requests/GetPrintablePackCostsHttpRequest.php';
include 'requestProcessor/requests/GetMaterialGroupColorsHttpRequest.php';

include 'requestProcessor/responses/BaseResponse.php';
include 'requestProcessor/responses/CreatePrintablePackHttpResponse.php';
include 'requestProcessor/responses/GetPrintablePackStatusHttpResponse.php';
include 'requestProcessor/responses/GetPrintablePackCostsHttpResponse.php';
include 'requestProcessor/responses/GetMaterialGroupColorsHttpResponse.php';

include 'requestProcessor/RequestProcessor.php';

include 'exceptions/InvalidAnswerException.php';
include 'exceptions/InvalidAnswerModelException.php';




include 'TreatstockApiService.php';


