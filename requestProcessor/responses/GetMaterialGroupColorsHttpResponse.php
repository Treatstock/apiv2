<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 27.04.18
 * Time: 16:54
 */

namespace treatstock\api\v2\requestProcessor\responses;

use treatstock\api\v2\models\Color;
use treatstock\api\v2\models\MaterialGroupColor;
use treatstock\api\v2\models\responses\GetMaterialGroupColorsResponse;

/**
 * Class GetMaterialGroupColorsHttpResponse
 *
 * @package treatstock\api\v2\requestProcessor\responses
 * @property GetMaterialGroupColorsResponse $model
 */
class GetMaterialGroupColorsHttpResponse  extends BaseResponse
{
    public function getModelClass()
    {
        return GetMaterialGroupColorsResponse::class;
    }

    /**
     * @param $data
     * @throws \ReflectionException
     */
    public function loadModel($data)
    {
        $materialGroupColors = [];
        $attributes = [
            'code',
            'description',
        ];
        $colorAttributes = [
            'code',
            'rgb'
        ];
        foreach ($data as $materialGroupElement) {
            $materialGroupColor = new MaterialGroupColor();
            $this->loadAttributes($attributes, $materialGroupColor, $materialGroupElement);
            $materialGroupColor->colors = [];
            foreach ($materialGroupElement['colors'] as $colorElement) {
                $color = new Color();
                $this->loadAttributes($colorAttributes, $color, $colorElement);
                $materialGroupColor->colors[] = $color;
            }
            $materialGroupColors[] = $materialGroupColor;
        }
        $this->model->materialGroupColors = $materialGroupColors;
    }

}