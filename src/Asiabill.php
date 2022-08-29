<?php

declare(strict_types=1);
/**
 * This file is part of szwtdl/laravel-asiabill
 * @link     https://www.szwtdl.cn
 * @contact  szpengjian@gmail.com
 * @license  https://github.com/szwtdl/laravel-asiabill/blob/master/LICENSE
 */
namespace Asiabill;

use Asiabill\Classes\AsiabillIntegration;

class asiabill
{
    protected $asiabill;

    public function __construct($gateway_no, $sign_key, $model = 'test')
    {
        $this->asiabill = new AsiabillIntegration($model, $gateway_no, $sign_key);
        return $this;
    }

    /**
     * 获取session token.
     * @throws \Exception
     * @return mixed|string
     */
    public function sessionToken()
    {
        return $this->asiabill->request('sessionToken');
    }

    /**
     * 创建用户.
     * @throws \Exception
     * @return mixed|string
     */
    public function customers(array $data)
    {
        return $this->asiabill->request('customers', ['body' => $data]);
    }

    /**
     * 用户列表.
     * @param $page
     * @param $limit
     * @throws \Exception
     * @return mixed|string
     */
    public function customersList($page = 1, $limit = 20)
    {
        return $this->asiabill->request('customers', [
            'query' => [
                'pageIndex' => $page,
                'pageSize' => $limit,
            ],
        ]);
    }

    /**
     * 发起支付.
     * @throws \Exception
     * @return mixed|string
     */
    public function pay(array $data)
    {
        return $this->asiabill->request('checkoutPayment', ['body' => $data]);
    }

    /**
     * 确认扣款.
     */
    public function confirm(array $data)
    {
        return $this->asiabill->request('confirmCharge', ['body' => $data]);
    }

    // 查询账单
    public function queryBill(string $customerPaymentMethodId)
    {
        return $this->asiabill->request('paymentMethods_query', ['path' => ['customerPaymentMethodId' => $customerPaymentMethodId]]);
    }

    /**
     * 修改账单信息.
     * @throws \Exception
     * @return mixed|string
     */
    public function updateBill(array $data)
    {
        return $this->asiabill->request('paymentMethods_update', ['body' => $data]);
    }

    /**
     * 更新物流信息.
     */
    public function updateShipping(array $data)
    {
        return $this->asiabill->openapi()->request('orderInfo', [
            'body' => $data,
        ]);
    }

    /**
     * 发起退款.
     */
    public function refund(array $data)
    {
        return $this->asiabill->openapi()->request('orderInfo', ['body' => $data]);
    }

    /**
     * 查询订单.
     * @throws \Exception
     * @return mixed|string
     */
    public function queryTradeNumber(string $tradeNo)
    {
        return $this->asiabill->openapi()->request('orderInfo', ['path' => [
            'tradeNo' => $tradeNo,
        ]]);
    }

    /**
     * 查询交易列表.
     * @param $start_time
     * @param $end_time
     * @throws \Exception
     * @return mixed|string
     */
    public function queryTradeTime($start_time, $end_time)
    {
        return $this->asiabill->openapi()->request('transactions', [
            'query' => [
                'endTime' => $start_time,
                'startTime' => $end_time,
            ],
        ]);
    }

    /**
     *  验证订单.
     * @return bool
     */
    public function verify()
    {
        return $this->asiabill->verification();
    }

    /**
     * 环境类型.
     * @return int
     */
    public function isMobile()
    {
        return $this->asiabill->isMobile();
    }
}
