<?php


namespace treatstock\api\v2\requestProcessor\responses;

use treatstock\api\v2\models\Model3dPart;
use treatstock\api\v2\models\PartSize;
use treatstock\api\v2\models\PrintablePackPrice;
use treatstock\api\v2\models\responses\GetPrintablePackStatusResponse;
use treatstock\api\v2\models\Texture;

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
            'model3d_id'      => 'model3dId',
            'created_at'      => 'createdAt',
            'affiliate_price' => 'modelPrice',
            'scaleUnit'       => 'scaleUnit',
        ];
        $this->loadAttributes($attributes, $this->model, $data);
        if (array_key_exists('calculated_min_price', $data) && is_array($data['calculated_min_price'])) {
            $this->model->calculatedMinPrice = new PrintablePackPrice();

            $this->loadAttributes(
                ['materialGroup', 'color', 'price'],
                $this->model->calculatedMinPrice,
                $data['calculated_min_price']
            );
        } else {
            $this->model->calculatedMinPriceEmptyReason = $data['calculated_min_price']?$data['calculated_min_price']:$data['calculatedMinPriceEmptyReason'];
        }

        $this->initClassAttributes(PartSize::class, $this->model->largestPartSize, $data['largestPartSize']);

        foreach ($data['parts'] as $partInfo) {
            $this->initClassAttributes(Model3dPart::class, $model3dPart, $partInfo);
            $this->initClassAttributes(PartSize::class, $model3dPart->size, $partInfo['size']);
            $this->initClassAttributes(PartSize::class, $model3dPart->originalSize, $partInfo['originalSize']);
            $this->initClassAttributes(Texture::class, $model3dPart->texture, $partInfo['texture']);

            $this->model->parts[$model3dPart->uid] = $model3dPart;
        }
    }
}
