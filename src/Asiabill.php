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

class Asiabill
{
    protected $asiabill;

    /**
     * @throws \Exception
     */
    public function __construct($gateway_no, $sign_key, $model = 'test')
    {
        $this->asiabill = new AsiabillIntegration($model, $gateway_no, $sign_key);
        return $this;
    }

    public function logs(string $dirname)
    {
        $this->asiabill->startLogger(true, $dirname);
        return $this;
    }

    public function sessionToken()
    {
        return $this->asiabill->request('sessionToken');
    }

    public function customers(array $data)
    {
        return $this->asiabill->request('customers', ['body' => $data]);
    }

    public function getCustomer(string $customer_id)
    {
        return $this->asiabill->request('customers', ['path' => [
            'customerId' => $customer_id,
        ]]);
    }

    public function customersList($page = 1, $limit = 20)
    {
        return $this->asiabill->request('customers', [
            'query' => [
                'pageIndex' => $page,
                'pageSize' => $limit,
            ],
        ]);
    }

    public function pay(array $data)
    {
        return $this->asiabill->request('checkoutPayment', ['body' => $data]);
    }

    public function confirm(array $data)
    {
        return $this->asiabill->request('confirmCharge', ['body' => $data]);
    }

    public function queryBill(string $customerPaymentMethodId)
    {
        return $this->asiabill->request('paymentMethods_query', ['path' => ['customerPaymentMethodId' => $customerPaymentMethodId]]);
    }

    public function updateBill(array $data)
    {
        return $this->asiabill->request('paymentMethods_update', ['body' => $data]);
    }

    public function updateShipping(array $data)
    {
        return $this->asiabill->openapi()->request('orderInfo', [
            'body' => $data,
        ]);
    }

    public function refund(array $data)
    {
        return $this->asiabill->openapi()->request('orderInfo', ['body' => $data]);
    }

    public function queryTradeNumber(string $tradeNo)
    {
        return $this->asiabill->openapi()->request('orderInfo', ['path' => [
            'tradeNo' => $tradeNo,
        ]]);
    }

    public function queryTradeTime($start_time, $end_time)
    {
        return $this->asiabill->openapi()->request('transactions', [
            'query' => [
                'endTime' => $end_time,
                'startTime' => $start_time,
            ],
        ]);
    }

    public function verify()
    {
        return $this->asiabill->verification();
    }

    public function isMobile()
    {
        return $this->asiabill->isMobile();
    }
}
