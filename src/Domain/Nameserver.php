<?php
/*
 * Copyright (c) 2021, Bastian Leicht <mail@bastianleicht.de>
 *
 * PDX-License-Identifier: BSD-2-Clause
 */

namespace ResellingTech\Domain;

use GuzzleHttp\Exception\GuzzleException;
use ResellingTech\ResellingTech;

class Nameserver
{
    private $ResellingTech;

    public function __construct(ResellingTech $ResellingTech)
    {
        $this->ResellingTech = $ResellingTech;
    }

    /**
     * @param string $nameserver    ns1.reselling.network
     * @return array|string
     * @throws GuzzleException
     */
    public function create(string $nameserver)
    {
        return $this->ResellingTech->post('domain/nameserver/create', [
            'nameserver' => $nameserver
        ]);
    }

    /**
     * @param string $nameserver    ns1.reselling.network
     * @return array|string
     * @throws GuzzleException
     */
    public function delete(string $nameserver)
    {
        return $this->ResellingTech->post('domain/nameserver/delete', [
            'nameserver' => $nameserver
        ]);
    }

}