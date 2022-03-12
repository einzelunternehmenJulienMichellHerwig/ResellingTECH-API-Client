<?php

namespace ResellingTech\DedicatedServer;

use GuzzleHttp\Exception\GuzzleException;
use ResellingTech\Exception\AssertNotImplemented;
use ResellingTech\ResellingTech;

class dedicated
{
    private $ResellingTech;

    public function __construct(ResellingTech $ResellingTech)
    {
        $this->ResellingTech = $ResellingTech;
    }


    /**
     * @param string $server_id
     * @return array|string
     * @throws GuzzleException
     */
    public function noVNC(string $server_id)
    {
        if($this->ResellingTech->isSandbox() === true) {
            throw new AssertNotImplemented();
        }
        return $this->ResellingTech->post('rootserver/console/get', [
            'vm_id' => $server_id
        ]);
    }

}