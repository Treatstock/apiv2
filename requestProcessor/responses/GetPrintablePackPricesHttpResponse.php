<?php

namespace treatstock\api\v2\requestProcessor\responses;

use treatstock\api\v2\models\PriceInfo;
use treatstock\api\v2\models\responses\GetPrintablePackPricesResponse;


/**
 * Class GetPrintablePackStatusHttpResponse
 *
 * @property GetPrintablePackPricesResponse $model
 * @package treatstock\api\v2\requestProcessor\response
 */
class GetPrintablePackPricesHttpResponse extends BaseResponse
{
    public function getModelClass()
    {
        return GetPrintablePackPricesResponse::class;
    }

    /**
     * @param $data
     * @throws \ReflectionException
     */
    public function loadModel($data)
    {
        $pricesInfo = [];
        foreach ($data as $priceElement) {
            $priceInfo = new PriceInfo();
            $attributes = [
                'printablePackId',
                'url',
                'providerId',
                'materialGroup',
                'color',
                'price',
                'printer'
            ];
            $this->loadAttributes($attributes, $priceInfo, $priceElement);
            $pricesInfo[] = $priceInfo;
        }
        $this->model->pricesInfo = $pricesInfo;
    }
}
