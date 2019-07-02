<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 27.06.19
 * Time: 13:57
 */

namespace treatstock\api\v2\requestProcessor\responses;

use treatstock\api\v2\models\ModelTextureInfo;
use treatstock\api\v2\models\PrintOffer;
use treatstock\api\v2\models\responses\GetPrintablePackOffersResponse;
use treatstock\api\v2\models\Texture;

/**
 * Class GetPrintablePackOffersHttpResponse
 *
 * @property GetPrintablePackOffersResponse $model
 * @package treatstock\api\v2\requestProcessor\responses
 */
class GetPrintablePackOffersHttpResponse extends BaseResponse
{
    public function getModelClass()
    {
        return GetPrintablePackOffersResponse::class;
    }

    /**
     * @param $data
     * @throws \ReflectionException
     */
    public function loadModel($data)
    {
        $this->initClassAttributes(ModelTextureInfo::class, $this->model->modelTextureInfo, $data['modelTextureInfo']);
        if (array_key_exists('modelTexture', $data['modelTextureInfo'])) {
            $this->initClassAttributes(Texture::class, $this->model->modelTextureInfo->modelTexture, $data['modelTextureInfo']['modelTexture']);
        }
        if (array_key_exists('partsMaterial', $data['modelTextureInfo'])) {
            $this->model->modelTextureInfo->partsMaterial = [];
            foreach ($data['modelTextureInfo']['partsMaterial'] as $partUid => $partMaterial) {
                $this->initClassAttributes(Texture::class, $partTexture, $partMaterial);
                $this->model->modelTextureInfo->partsMaterial[$partUid] = $partTexture;
            }
        }

        $this->model->offersList = [];
        foreach ($data['offersList'] as $offer) {
            $this->initClassAttributes(PrintOffer::class, $printOffer, $offer);
            $this->model->offersList[] = $printOffer;
        }
    }
}
