<?php

namespace treatstock\api\v2\requestProcessor\requests;

use treatstock\api\v2\models\requests\CreatePrintablePackRequest;

/**
 * Class CreatePrintablePackRequest
 *
 * @package treatstock\apiv2\requests
 * @property CreatePrintablePackRequest $model
 */
class CreatePrintablePackHttpRequest extends BaseRequest
{
    /**
     * Form request url
     *
     * @return string
     */
    public function getRequestUrl()
    {
        return $this->baseUrl.'printable-packs?private-key=' . $this->privateKey;
    }

    /**
     * Form post params for request
     *
     * @return array
     * @throws \InvalidArgumentException
     */
    public function getPostParams()
    {
        $post = [
            'affiliate_currency' => $this->model->affiliateCurrency,
            'affiliate_price'    => $this->model->affiliatePrice,
            'title'              => $this->model->title,
            'print_instructions' => $this->model->printInstructions,
            'description'        => $this->model->description,
            'location[ip]'       => $this->model->locationIp,
            'location[country]'  => $this->model->locationCountryIso,
            'model3d_cae'        => $this->model->model3dCae,
        ];

        $i = 0;
        foreach ($this->model->filePaths as $filePath) {
            if (!file_exists($filePath)) {
                throw new \InvalidArgumentException('File not exists: ' . $filePath);
            }
            $file = curl_file_create($filePath);
            $post['files[' . $i . ']'] = $file;
            $i++;
        }
        $i=0;
        foreach ($this->model->fileUrls as $fileUrl) {
            $post['file-urls[' . $i . ']'] = $fileUrl;
            $i++;
        }

        return $this->cleanEmptyParams($post);
    }
}