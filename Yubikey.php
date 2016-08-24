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

    public function init()
    {
        if (strlen($this->apiKey) === 0) {
            throw new \yii\base\InvalidConfigException("Yubikey 'apiKey' configuration option is required");
        }
        if (strlen($this->clientId) === 0) {
            throw new \yii\base\InvalidConfigException("Yubikey 'clientId' configuration option is required");
        }

        parent::init();
    }

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