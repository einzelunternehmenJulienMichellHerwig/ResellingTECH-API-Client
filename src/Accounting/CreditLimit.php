<?php

namespace ResellingTech\Accounting;

use ResellingTech\ResellingTech;

class CreditLimit
{
    private $resellingTech;

    public function __construct(ResellingTech $resellingTech)
    {
        $this->resellerServices = $resellingTech;
    }

}