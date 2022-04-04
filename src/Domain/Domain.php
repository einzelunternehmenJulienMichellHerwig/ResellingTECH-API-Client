<?php

namespace ResellingTech\Domain;

use GuzzleHttp\Exception\GuzzleException;
use ResellingTech\Exception\AssertNotImplemented;
use ResellingTech\Knowlagebase\Knowlagebase;
use ResellingTech\ResellingTech;

class Domain
{
    private $ResellingTech;
    private $nameserverHandler;
    private $domainHandle;
    private $domainDNS;
    private $knowlagebase;

    public function __construct(ResellingTech $ResellingTech)
    {
        $this->ResellingTech = $ResellingTech;
    }

    /**
     * @return Nameserver
     */
    public function nameserver(): Nameserver
    {
        if(!$this->nameserverHandler) $this->nameserverHandler = new Nameserver($this->ResellingTech);
        return $this->nameserverHandler;
    }

    /**
     * @return DomainHandle
     */
    public function handle(): DomainHandle
    {
        if(!$this->domainHandle) $this->domainHandle = new DomainHandle($this->ResellingTech);
        return $this->domainHandle;
    }

    /**
     * @return DomainDNS
     */
    public function dns(): DomainDNS
    {
        if(!$this->domainDNS) $this->domainDNS = new DomainDNS($this->ResellingTech);
        return $this->domainDNS;
    }

    /**
     * @return Knowlagebase
     */
    public function knowlagebase(): Knowlagebase
    {
        if(!$this->knowlagebase) $this->knowlagebase = new Knowlagebase($this->ResellingTech);
        return $this->knowlagebase;
    }

    /**
     * @return array|string
     * @throws GuzzleException
     */
    public function getPricelist()
    {
        if($this->ResellingTech->isSandbox() === true) {
            throw new AssertNotImplemented();
        }
        return $this->ResellingTech->post('domain/getPricelist');
    }

    /**
     * @param string $tld   de | eu | com | net etc...
     * @return array|string
     * @throws GuzzleException
     */
    public function getPrice(string $tld)
    {
        return $this->ResellingTech->post('domain/getPrice', [
            'tld' => $tld
        ]);
    }

    /**
     * @param string $domainName    domain.de
     * @return array|string
     * @throws GuzzleException
     */
    public function check(string $domainName)
    {
        return $this->ResellingTech->post('domain/check', [
            'domainName' => $domainName
        ]);
    }

    /**
     * @param string $domainName    domain.de
     * @return array|string
     * @throws GuzzleException
     */
    public function slowCheck(string $domainName)
    {
        return $this->ResellingTech->post('domain/slowCheck', [
            'domainName' => $domainName
        ]);
    }

    /**
     * @param string $domainName    domain.de
     * @return array|string
     * @throws GuzzleException
     */
    public function get(string $domainName)
    {
        return $this->ResellingTech->post('domain/get', [
            'domainName' => $domainName
        ]);
    }

    /**
     * @param string $domainName    domain.de
     * @return array|string
     * @throws GuzzleException
     */
    public function getAll()
    {
        return $this->ResellingTech->post('domain/getAll');
    }

    /**
     * @param string $domainName            domain.de
     * @param string $ownerContact          TEST5
     * @param string $adminContact          TEST5
     * @param string $technicianContact     TEST5
     * @param string $zoneContact           TEST5
     * @param string $ns1                   ns1.reselling.tech
     * @param string $ns2                   ns2.reselling.tech
     * @param string $ns3                   ns3.reselling.tech
     * @param string $ns4                   ns4.reselling.tech
     * @param string $ns5                   ns5.reselling.tech
     * @return array|string
     * @throws GuzzleException
     */

    public function register(string $domainName, string $ownerContact, string $adminContact, string $technicianContact,
                             string $zoneContact, string $ns1, string $ns2, string $ns3, string $ns4, string $ns5)
    {
        return $this->ResellingTech->post('domain/register', [
            'domainName' => $domainName,
            'ownerC' => $ownerContact,
            'adminC' => $adminContact,
            'techC' => $technicianContact,
            'zoneC' => $zoneContact,
            'ns1' => $ns1,
            'ns2' => $ns2,
            'ns3' => $ns3,
            'ns4' => $ns4,
            'ns5' => $ns5,
        ]);
    }

    /**
     * @param string $domainName            domain.de
     * @param string $ownerContact          TEST5
     * @param string $adminContact          TEST5
     * @param string $technicianContact     TEST5
     * @param string $zoneContact           TEST5
     * @param string $ns1                   ns1.reselling.tech
     * @param string $ns2                   ns2.reselling.tech
     * @param string $ns3                   ns3.reselling.tech
     * @param string $ns4                   ns4.reselling.tech
     * @param string $ns5                   ns5.reselling.tech
     * @param string $authCode              test1234
     * @return array|string
     * @throws GuzzleException
     */
    public function transfer(string $domainName, string $ownerContact, string $adminContact, string $technicianContact, string $zoneContact,
                             string $ns1, string $ns2, string $ns3, string $ns4, string $ns5, string $authCode)
    {
        if($this->ResellingTech->isSandbox() === true) {
            throw new AssertNotImplemented();
        }
        return $this->ResellingTech->post('domain/transfer', [
            'domainName' => $domainName,
            'ownerC' => $ownerContact,
            'adminC' => $adminContact,
            'techC' => $technicianContact,
            'zoneC' => $zoneContact,
            'ns1' => $ns1,
            'ns2' => $ns2,
            'ns3' => $ns3,
            'ns4' => $ns4,
            'ns5' => $ns5,
            'authcode' => $authCode
        ]);
    }

    /**
     * @param string $domainName            domain.de
     * @param string $ownerContact          TEST5
     * @param string $adminContact          TEST5
     * @param string $technicianContact     TEST5
     * @param string $zoneContact           TEST5
     * @param string $ns1                   ns1.reselling.tech
     * @param string $ns2                   ns2.reselling.tech
     * @param string $ns3                   ns3.reselling.tech
     * @param string $ns4                   ns4.reselling.tech
     * @param string $ns5                   ns5.reselling.tech
     * @return array|string
     * @throws GuzzleException
     */
    public function update(string $domainName, string $ownerContact, string $adminContact, string $technicianContact,
                           string $zoneContact, string $ns1, string $ns2, string $ns3, string $ns4, string $ns5)
    {
        return $this->ResellingTech->post('domain/update', [
            'domainName' => $domainName,
            'ownerC' => $ownerContact,
            'adminC' => $adminContact,
            'techC' => $technicianContact,
            'zoneC' => $zoneContact,
            'ns1' => $ns1,
            'ns2' => $ns2,
            'ns3' => $ns3,
            'ns4' => $ns4,
            'ns5' => $ns5
        ]);
    }

    /**
     * @param string $domainName    domain.de
     * @param string $date          yyyy-mm-dd  (2021-10-12)
     * @return array|string
     * @throws GuzzleException
     */
    public function delete(string $domainName, string $date)
    {
        return $this->ResellingTech->post('domain/delete', [
            'domainName' => $domainName,
            'date' => $date
        ]);
    }

    /**
     * @param string $domainName    domain.de
     * @return array|string
     * @throws GuzzleException
     */
    public function undelete(string $domainName)
    {
        return $this->ResellingTech->post('domain/undelete', [
            'domainName' => $domainName
        ]);
    }

}