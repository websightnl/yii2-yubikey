Yubikey Component for Yii2
===========================

### Setup


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

### Usage

```
$status = Yii::$app->yubikey->validate('tokenfromuser');
```
