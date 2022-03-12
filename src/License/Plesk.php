<?php

namespace ResellingTech\License;

use GuzzleHttp\Exception\GuzzleException;
use ResellingTech\Exception\AssertNotImplemented;
use ResellingTech\ResellingTech;

class Plesk
{
    private $ResellingTech;

    public function __construct(ResellingTech $ResellingTech)
    {
        $this->ResellingTech = $ResellingTech;
    }

    /**
     * @return array|string
     * @throws GuzzleException
     */
    public function getPricelist()
    {
        return $this->ResellingTech->get('plesk/getPriceList');
    }

    /**
     * @return array|string
     * @throws GuzzleException
     */
    public function getLicenses()
    {
        return $this->ResellingTech->get('plesk/getLicenses');
    }

    /**
     * @param string $license
     * @return array|string
     * @throws GuzzleException
     */
    public function getLicense(string $license)
    {
        return $this->ResellingTech->post('plesk/getLicense', [
            'license' => $license
        ]);
    }


    /**
     * @param string $license_type  PLSK_12_ADMIN_VPS | PLSK_12_PRO_VPS | PLSK_12_HOST_VPS | PLSK_12_ADMIN | PLSK_12_PRO | PLSK_12_HOST
     * @return array|string
     * @throws GuzzleException
     */
    public function order(string $license_type)
    {
        return $this->ResellingTech->post('plesk/order', [
            'type' => $license_type
        ]);
    }


    /**
     * @param string $license    PLSK.00000000
     * @param string $date          yyyy-mm-dd  (2021-10-12)
     * @return array|string
     * @throws GuzzleException
     */
    public function delete(string $license, string $date)
    {
        return $this->ResellingTech->post('plesk/delete', [
            'license' => $license,
            'date' => $date
        ]);
    }

    /**
     * @param string $license    PLSK.00000000
     * @return array|string
     * @throws GuzzleException
     */
    public function getIpBinding(string $license)
    {
        if($this->ResellingTech->isSandbox() === true) {
            throw new AssertNotImplemented();
        }
        return $this->ResellingTech->post('plesk/getIPBinding', [
            'license' => $license
        ]);
    }

    /**
     * @param string $license    PLSK.00000000
     * @param string $ip_address    1.1.1.1
     * @return array|string
     * @throws GuzzleException
     */
    public function setIpBinding(string $license, string $ip_address)
    {
        if($this->ResellingTech->isSandbox() === true) {
            throw new AssertNotImplemented();
        }
        return $this->ResellingTech->post('plesk/setIPBinding', [
            'license' => $license,
            'address' => $ip_address
        ]);
    }




}