<?php

namespace treatstock\api\v2\requestProcessor\responses;

use treatstock\api\v2\models\CostInfo;
use treatstock\api\v2\models\responses\GetPrintablePackCostsResponse;


/**
 * Class GetPrintablePackStatusHttpResponse
 *
 * @property GetPrintablePackCostsResponse $model
 * @package treatstock\api\v2\requestProcessor\response
 */
class GetPrintablePackCostsHttpResponse extends BaseResponse
{
    public function getModelClass()
    {
        return GetPrintablePackCostsResponse::class;
    }

    /**
     * @param $data
     * @throws \ReflectionException
     */
    public function loadModel($data)
    {
        $costsInfo = [];
        foreach ($data as $costElement) {
            $costInfo = new CostInfo();
            $attributes = [
                'printablePackId',
                'url',
                'materialGroup',
                'color',
                'price',
                'printer'
            ];
            $this->loadAttributes($attributes, $costInfo, $costElement);
            $costsInfo[] = $costInfo;
        }
        $this->model->costsInfo = $costsInfo;
    }
}
