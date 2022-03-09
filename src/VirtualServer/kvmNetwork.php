<?php

namespace ResellingTech\VirtualServer;

use GuzzleHttp\Exception\GuzzleException;
use ResellingTech\Exception\AssertNotImplemented;
use ResellingTech\ResellingTech;

class kvmNetwork
{
    private $ResellingTech;

    public function __construct(ResellingTech $ResellingTech)
    {
        $this->ResellingTech = $ResellingTech;
    }

    /**
     * @param string $server_id
     * @param string $ip_address
     * @param string $rdns
     * @return array|string
     * @throws GuzzleException
     */
    public function setRDNS(string $server_id, string $ip_address, string $rdns)
    {
        if($this->ResellingTech->isSandbox() === true) {
            throw new AssertNotImplemented();
        }
        return $this->ResellingTech->post('rootserver/ip/setRDNS', [
            'vm_id' => $server_id,
            'ip' => $ip_address,
            'rdns' => $rdns
        ]);
    }

}