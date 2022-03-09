<?php

namespace ResellingTech\VirtualServer;

use GuzzleHttp\Exception\GuzzleException;
use ResellingTech\Exception\AssertNotImplemented;
use ResellingTech\ResellingTech;

class kvmJobs
{
    private $ResellingTech;

    public function __construct(ResellingTech $ResellingTech)
    {
        $this->ResellingTech = $ResellingTech;
    }

    /**
     * @param string $job_id
     * @return array|string
     * @throws GuzzleException
     */
    public function get(string $job_id)
    {
        return $this->ResellingTech->post('rootserver/job/get', [
            'job_id' => $job_id
        ]);
    }

}