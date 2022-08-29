# asiabill

### 初始sdk

```bash
use Asiabill\asiabill;
$asiabill = new asiabill('12246001', '12H4567r','test'); # test or live

```

### laravel 集成 `config/services.php`

```bash
'asiabill' => [
    'gateway_no' => '12246001',
    'sign_key' => '12H4567r',
    'model' => 'test',
]
$result = app('asiabill')->sessionToken(); # $asiabill = app('asiabill');
```

### 生成token

```bash
$asiabill->sessionToken();
```

### 创建用户

```bash
$asiabill->customers([
    'email' => '123456@gmail.com',
    'firstName' => 'zhang',
    'lastName' => 'san',
    'phone' => '13800013866',
    'description' => '年会员',
]);
```

### 用户列表

```bash
$result = $asiabill->customersList(1,20);
```

### 发起支付
```bash
$result = $asiabill->pay([
    'billingAddress' => [
        'address' => 'address',
        'city' => 'BR',
        'country' => 'country',
        'email' => '123451234@email.com',
        'firstName' => 'firstName',
        'lastName' => 'lastName',
        'phone' => '13800138000',
        'state' => 'CE',
        'zip' => '666666'
    ],
    'callbackUrl' => 'http://'.$_SERVER['HTTP_HOST'].'/Asiabill/return.php',
    'customerId' => '', #asiabill创建的客户id，非网站用户id
    'deliveryAddress' => [
        'shipAddress' => 'mfdgohmqkpocemkqwtks',
        'shipCity' => 'MQOHUPOX',
        'shipCountry' => 'BR',
        'shipFirstName' =>  'SFDMPG',
        'shipLastName' =>  'USJAXT',
        'shipPhone' => '62519594707',
        'shipState' => 'WEWBZ',
        'shipZip' => '512008'
    ],
    'goodsDetails' => [
        [
            'goodsCount' => '1',
            'goodsPrice' => '6.00',
            'goodsTitle' => 'goods_1'
        ]
    ],
    'isMobile' => $asiabill->isMobile(), #// 0:web, 1:h5, 2:app_SDK
    'orderAmount' => '7.00',
    'orderCurrency' => 'USD',
    'orderNo' => date('YmdHis').mt_rand(1000,9999),
    'paymentMethod' => 'Credit Card', # 其它支付方式请参考文档说明
    'platform' => 'php_SDK', # 平台标识，用户自定义
    'remark' => '', # 订单备注信息
    'returnUrl' => 'http://'.$_SERVER['HTTP_HOST'].'/Asiabill/return.php',
    'webSite' => $_SERVER['HTTP_HOST']
]);
```
### 确认扣款
```bash
$result = $asiabill->confirm([
    'callbackUrl' => 'http://'.$_SERVER['HTTP_HOST'].'/Asiabill/return.php',
    'customerId' => 'cus_1547102564926713856',
    'customerPaymentMethodId' => 'pm_1547102612104245248',
    'tokenType' => 'InitRecurring',
    'goodsDetails' => [
        array(
            'goodsCount' => '1',
            'goodsPrice' => 100.00,
            'goodsTitle' => '超级会员年费'
        )
    ],
    'isMobile' => "0",
    'customerIp' => '170.106.2.846', //控制台必须填写IP
    'orderAmount' => 600,
    'orderCurrency' => 'USD',
    'orderNo' => date('YmdHis').mt_rand(1000,9999),
    'platform' => "php",
    'remark' => 'Renewal',
    'returnUrl' => 'http://'.$_SERVER['HTTP_HOST'].'/Asiabill/return.php',
    'webSite' => $_SERVER['HTTP_HOST']
]);
```
### 循环扣款
```bash

$result = $asiabill->confirm([
    'callbackUrl' => 'http://'.$_SERVER['HTTP_HOST'].'/Asiabill/return.php',
    'customerId' => 'cus_1547102564926713856',
    'customerPaymentMethodId' => 'pm_1547102612104245248',
    'tokenType' => 'Recurring', # 二次循环扣费，的参数
    'goodsDetails' => [
        array(
            'goodsCount' => '1',
            'goodsPrice' => 100.00,
            'goodsTitle' => '超级会员年费'
        )
    ],
    'isMobile' => "0",
    'customerIp' => '170.106.2.846', //控制台必须填写IP
    'orderAmount' => 600,
    'orderCurrency' => 'USD',
    'orderNo' => date('YmdHis').mt_rand(1000,9999),
    'platform' => "php",
    'remark' => 'Renewal',
    'returnUrl' => 'http://'.$_SERVER['HTTP_HOST'].'/Asiabill/return.php',
    'webSite' => $_SERVER['HTTP_HOST']
]);
```
### 验证
```bash
$result = $asiabill->verify();
```
### 退款
```bash
$result = $asiabill->refund([
    'merTrackNo' => '454515154',
    'refundAmount' => '10.22',
    'refundReason' => '退款',
    'refundType' => '1',
    'remark' => '',
    'tradeNo' => '2021092810011380477264'
]);
```
### 查询订单

```bash
$result = $asiabill->queryTradeNumber('2022082620385662370185');
```
### 按时间查询订单

```bash
$result = $asiabill->queryTradeTime('2022-03-26T00:00:00','2022-03-24T00:00:00');
```
