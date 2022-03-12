<?php

namespace ResellingTech\Domain;

use GuzzleHttp\Exception\GuzzleException;
use ResellingTech\Exception\AssertNotImplemented;
use ResellingTech\ResellingTech;

class DomainDNS
{
    private $ResellingTech;

    public function __construct(ResellingTech $ResellingTech)
    {
        $this->ResellingTech = $ResellingTech;
    }

    /**
     * @param string $domainName
     * @return array|string
     * @throws GuzzleException
     */
    public function get(string $domainName)
    {
        return $this->ResellingTech->post('dns/show', [
            'domainName' => $domainName
        ]);
    }

    /**
     * @param string $domainName
     * @param array $records
     * @return array|string
     * @throws GuzzleException
     */
    public function update(string $domainName, array $records)
    {
        return $this->ResellingTech->post('dns/update', [
            'domainName' => $domainName,
            'records' => $records
        ]);
    }

}