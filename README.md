Yubikey Component for Yii2
===========================

### Setup

Get your API key and client ID from https://upgrade.yubico.com/getapikey/.

```
// app/config/main.php
return [
    ...
    'components' => [
        ...
        'yubikey' => [
            'class' => 'websightnl\yii2yubikey\Yubikey',
            'apiKey' => '',
            'clientId' => '',
        ]
        ...
    ]
    ...
];
```

### Basic Usage

```
$status = Yii::$app->yubikey->validate('tokenfromuser');
```

### Settings

The component supports most of the parameters of the original library. For more information, please see https://github.com/enygma/yubikey.

```
// app/config/main.php
return [
    ...
    'components' => [
        ...
        'yubikey' => [
            'class' => 'websightnl\yii2yubikey\Yubikey',
            'apiKey' => '',
            'clientId' => '',
            // Enable HTTPS for the connection (defaults to true)
            'secure' => true,
            // Custom list of validation hosts
            'hosts' => ['validate1.example.org', 'validate2.example.org'],
            // Additonally, the library also supports simultaneous connections to multiple servers.
            'multiServer' => false
            // Additionally, you can also switch on and off this aggregation of the results and go with only the "first in" response
            'firstIn' => true
        ]
        ...
    ]
    ...
];
```