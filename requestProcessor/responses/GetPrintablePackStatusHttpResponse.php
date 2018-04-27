<?php


namespace treatstock\api\v2\requestProcessor\responses;

use treatstock\api\v2\models\PrintablePackCost;
use treatstock\api\v2\models\responses\GetPrintablePackStatusResponse;

/**
 * Class GetPrintablePackStatusHttpResponse
 *
 * @property GetPrintablePackStatusResponse $model
 * @package treatstock\api\v2\requestProcessor\response
 */
class GetPrintablePackStatusHttpResponse extends BaseResponse
{

    public function getModelClass()
    {
        return GetPrintablePackStatusResponse::class;
    }

    /**
     * @param $data
     * @throws \ReflectionException
     */
    public function loadModel($data)
    {
        $attributes = [
            'id',
            'model3d_id'         => 'model3dId',
            'created_at'         => 'createdAt',
            'affiliate_price'    => 'affiliatePrice',
            'affiliate_currency' => 'affiliateCurrency'
        ];
        $this->loadAttributes($attributes, $this->model, $data);
        if (array_key_exists('calculated_min_cost', $data)) {
            if (is_array($data['calculated_min_cost'])) {
                $this->model->calculatedMinCost = new PrintablePackCost();

                $this->loadAttributes(
                    ['materialGroup', 'color', 'cost'],
                    $this->model->calculatedMinCost,
                    $data['calculated_min_cost']
                );
            } else {
                $this->model->calculatedMinCostEmptyReason = $data['calculated_min_cost'];
            }
        }
    }
}
