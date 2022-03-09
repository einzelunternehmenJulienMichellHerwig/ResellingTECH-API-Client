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
     * @return CreditLimit
     */
    public function creditlimit(): CreditLimit
    {
        if(!$this->invoiceHandler) $this->invoiceHandler = new CreditLimit($this->ResellingTech);
        return $this->invoiceHandler;
    }

}