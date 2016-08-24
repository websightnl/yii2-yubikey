<?php

namespace websightnl\yii2yubikey;

use yii\base\Component;
use Yubikey\Validate;

class Yubikey extends Component
{
    /**
     * @var string
     */
    public $apiKey;

    /**
     * @var string
     */
    public $clientId;

    /**
     * @var bool
     */
    public $secure = true;

    /**
     * @var array|null
     */
    public $hosts = null;

    /**
     * @var bool
     */
    public $multiServer = false;

    /**
     * @var bool
     */
    public $firstIn = true;

    public function validate($input)
    {
        $validator = new Validate($this->apiKey, $this->clientId);
        $validator->setUseSecure($this->secure);
        if ($this->hosts !== null) {
            $validator->setHosts($this->hosts);
        }
        $response = $validator->check($input, $this->multiServer);

        return $response->success($this->firstIn);
    }
}