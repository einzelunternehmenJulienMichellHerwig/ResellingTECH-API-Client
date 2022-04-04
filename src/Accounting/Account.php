<?php

namespace ResellingTech\Accounting;

use ResellingTech\ResellingTech;

class Account
{
    private $ResellingTech;
    private $invoiceHandler;

    public function __construct(ResellingTech $ResellingTech)
    {
        $this->ResellingTech = $ResellingTech;
    }


    /**
     * @return array|string
     * @throws GuzzleException
     */
    public function getCreditLimit()
    {
        return $this->ResellingTech->post('accounting/creditLimit');
    }

    /**
     * @return array|string
     * @throws GuzzleException
     */
    public function get()
    {
        return $this->ResellingTech->post('accounting/get');
    }


}