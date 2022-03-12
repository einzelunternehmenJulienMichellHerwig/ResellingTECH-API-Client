<?php

namespace ResellingTech\Knowlagebase;

use GuzzleHttp\Exception\GuzzleException;
use ResellingTech\Exception\AssertNotImplemented;
use ResellingTech\ResellingTech;

class Knowlagebase
{
    private $ResellingTech;

    public function __construct(ResellingTech $ResellingTech)
    {
        $this->ResellingTech = $ResellingTech;
    }

    /**
     * @param string $tld
     * @return array|string
     * @throws GuzzleException
     */
    public function show(string $tld)
    {
        return $this->ResellingTech->post('knowledgebase/show', [
            'tld' => $tld
        ]);
    }

    /**
     * @return array|string
     * @throws GuzzleException
     */
    public function showAll()
    {
        return $this->ResellingTech->post('knowledgebase/showAll');
    }

}