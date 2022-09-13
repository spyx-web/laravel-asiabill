<?php

use Asiabill\asiabill;

require_once __DIR__ . '/vendor/autoload.php';
$asiabill = new asiabill('12246001', '12H4567r', 'test'); # test or live


//获取sessiontoken
//$result = $asiabill->sessionToken();

// 创建用户
//$result = $asiabill->customers([
//    'email' => '123456@gmail.com',
//    'firstName' => 'zhang',
//    'lastName' => 'san',
//    'phone' => '13800013866',
//    'description' => '年会员',
//]);


// 发起支付
//$result = $asiabill->pay([
//    'billingAddress' => [
//        'address' => 'address',
//        'city' => 'BR',
//        'country' => 'country',
//        'email' => '123451234@email.com',
//        'firstName' => 'firstName',
//        'lastName' => 'lastName',
//        'phone' => '13800138000',
//        'state' => 'CE',
//        'zip' => '666666'
//    ],
//    'callbackUrl' => 'http://'.$_SERVER['HTTP_HOST'].'/Asiabill/return.php',
//    'customerId' => '', // asiabill创建的客户id，非网站用户id
//    'deliveryAddress' => [
//        'shipAddress' => 'mfdgohmqkpocemkqwtks',
//        'shipCity' => 'MQOHUPOX',
//        'shipCountry' => 'BR',
//        'shipFirstName' =>  'SFDMPG',
//        'shipLastName' =>  'USJAXT',
//        'shipPhone' => '62519594707',
//        'shipState' => 'WEWBZ',
//        'shipZip' => '512008'
//    ],
//    'goodsDetails' => [
//        [
//            'goodsCount' => '1',
//            'goodsPrice' => '6.00',
//            'goodsTitle' => 'goods_1'
//        ]
//    ],
//    'isMobile' => $asiabill->isMobile(), // 0:web, 1:h5, 2:app_SDK
//    'orderAmount' => '7.00',
//    'orderCurrency' => 'USD',
//    'orderNo' => date('YmdHis').mt_rand(1000,9999),
//    'paymentMethod' => 'Credit Card', // 其它支付方式请参考文档说明
//    'platform' => 'php_SDK', // 平台标识，用户自定义
//    'remark' => '', // 订单备注信息
//    'returnUrl' => 'http://'.$_SERVER['HTTP_HOST'].'/Asiabill/return.php',
//    'webSite' => $_SERVER['HTTP_HOST']
//]);

//查询订单
//$result = $asiabill->queryTradeNumber('2022082620385662370185');
// 会员列表
$result = $asiabill->customersList(1,100);

// 确认扣费
//$result = $asiabill->confirm([
//    'callbackUrl' => 'http://'.$_SERVER['HTTP_HOST'].'/Asiabill/return.php',
//    'customerId' => 'cus_1547102564926713856',
//    'customerPaymentMethodId' => 'pm_1547102612104245248',
//    'tokenType' => 'InitRecurring',
//    'goodsDetails' => [
//        array(
//            'goodsCount' => '1',
//            'goodsPrice' => 100.00,
//            'goodsTitle' => '超级会员年费'
//        )
//    ],
//    'isMobile' => "0",
//    'customerIp' => '170.106.2.846', //控制台必须填写IP
//    'orderAmount' => 600,
//    'orderCurrency' => 'USD',
//    'orderNo' => date('YmdHis').mt_rand(1000,9999),
//    'platform' => "php",
//    'remark' => 'Renewal',
//    'returnUrl' => 'http://'.$_SERVER['HTTP_HOST'].'/Asiabill/return.php',
//    'webSite' => $_SERVER['HTTP_HOST']
//]);
//$result = $asiabill->verify();

// 发起查询
//$result = $asiabill->queryTradeTime('2022-08-10T00:00:00','2022-08-12T00:00:00');

//$result = $asiabill->getCustomer('cus_1569518825626656768');
echo "<pre>";
print_r($result);