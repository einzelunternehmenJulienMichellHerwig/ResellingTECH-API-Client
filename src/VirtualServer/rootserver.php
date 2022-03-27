<?php

namespace ResellingTech\VirtualServer;

use GuzzleHttp\Exception\GuzzleException;
use ResellingTech\Exception\AssertNotImplemented;
use ResellingTech\ResellingTech;

class rootserver
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
    public function getTemplates()
    {
        return $this->ResellingTech->post('rootserver/templates');
    }

    /**
     * @param string $server_id
     * @return array|string
     * @throws GuzzleException
     */
    public function getConfig(string $server_id)
    {
        return $this->ResellingTech->post('rootserver/show', [
            'vmid' => $server_id
        ]);
    }

    /**
     * @param string $server_id
     * @return array|string
     * @throws GuzzleException
     */
    public function getStatus(string $server_id)
    {
        return $this->ResellingTech->post('rootserver/status', [
            'vmid' => $server_id
        ]);
    }

    /**
     * @param string $server_id
     * @return array|string
     * @throws GuzzleException
     */
    public function noVNC(string $server_id)
    {
        return $this->ResellingTech->post('rootserver/vnc', [
            'vmid' => $server_id
        ]);
    }

    /**
     * @param string $server_id
     * @param string $startdate
     * @param string $enddate
     * @param string $groupBy
     * @return array|string
     * @throws GuzzleException
     */
    public function getTraffic(string $server_id, string $startdate, string $enddate, string $groupBy = null)
    {
        return $this->ResellingTech->post('rootserver/traffic', array(
            'vmid' => $server_id,
            'startDate' => $startdate,
            'endDate' => $enddate,
            'groupBy' => $groupBy
        ));
    }

    /**
     * @param string $server_id
     * @return array|string
     * @throws GuzzleException
     */
    public function getAddresses(string $server_id)
    {
        return $this->ResellingTech->post('rootserver/addresses', [
            'vmid' => $server_id
        ]);
    }

    /**
     * @param string $server_id
     * @return array|string
     * @throws GuzzleException
     */
    public function getDDoSAttacks(string $server_id)
    {
        return $this->ResellingTech->post('rootserver/ddosAttacks', [
            'vmid' => $server_id
        ]);
    }

    /**
     * @param string $server_id
     * @param string $timeframe     Zeitraum (hour, day, week, month, year)
     * @param string $cf            Werte-Typ (AVERAGE, MAX)
     * @return array|string
     * @throws GuzzleException
     */
    public function getGraph(string $server_id, string $timeframe = null, string $cf = null)
    {
        return $this->ResellingTech->post('rootserver/graph', [
            'vmid' => $server_id,
            'timeframe' => $timeframe,
            'cf' => $cf
        ]);
    }

    /**
     * @param string $server_id
     * @param string $timeframe     Zeitraum (hour, day, week, month, year)
     * @param string $cf            Werte-Typ (AVERAGE, MAX)
     * @param array $ds            Array Werte (maxcpu, cpu, maxmem, mem, maxdisk, disk, netin, netout, diskread, diskwrite)
     * @return array|string
     * @throws GuzzleException
     */
    public function getGraphImage(string $server_id, string $timeframe = null, string $cf = null, array $ds = null)
    {
        return $this->ResellingTech->post('rootserver/graphimage', [
            'vmid' => $server_id,
            'timeframe' => $timeframe,
            'cf' => $cf,
            'ds' => $ds
        ]);
    }

    /**
     * @param string $server_id
     * @return array|string
     * @throws GuzzleException
     */
    public function getUpdates(string $server_id)
    {
        return $this->ResellingTech->post('rootserver/getUpdates', [
            'vmid' => $server_id
        ]);
    }

    /**
     * @param string $server_id
     * @return array|string
     * @throws GuzzleException
     */
    public function installUpdates(string $server_id)
    {
        return $this->ResellingTech->post('rootserver/installUpdates', [
            'vmid' => $server_id
        ]);
    }

    /**
     * @param string $cores             Anzahl Kerne
     * @param string $memory            RAM in MB
     * @param string $disk              Speicher in GB
     * @param string $ip_addresses      Anzahl IP-Adressen
     * @param string $ip6_addresses     Anzahl IPv6-Adressen
     * @param string $backups           Anzahl Backups
     * @param string $os_template       OS-Template
     * @param string $hostname          Hostname
     * @param string $rootpasswort      Root-Passwort
     * @return array|string
     * @throws GuzzleException
     */
    public function create(string $cores, string $memory, string $disk, string $ip_addresses, string $ip6_addresses, string $backups, string $os_template, string $hostname = null, string $rootpasswort = null)
    {
        return $this->ResellingTech->post('rootserver/create', [
            'cores' => $cores,
            'memory' => $memory,
            'disk' => $disk,
            'ip_addresses' => $ip_addresses,
            'ip6_addresses' => $ip6_addresses,
            'backups' => $backups,
            'template' => $os_template,
            'hostname' => $hostname,
            'passwort' => $rootpasswort
        ]);
    }

    /**
     * @param string $server_id
     * @return array|string
     * @throws GuzzleException
     */
    public function delete(string $server_id)
    {
        return $this->ResellingTech->post('rootserver/delete', [
            'vmid' => $server_id
        ]);
    }

    /**
     * @param string $vmid              VM-ID
     * @param string $cores             Anzahl Kerne
     * @param string $memory            RAM in MB
     * @param string $disk              Speicher in GB
     * @param string $ip_addresses      Anzahl IP-Adressen
     * @param string $ip6_addresses     Anzahl IPv6-Adressen
     * @param string $backups           Anzahl Backups
     * @return array|string
     * @throws GuzzleException
     */
    public function upgrade(string $vmid, string $cores, string $memory, string $disk, string $ip_addresses, string $ip6_addresses, string $backups)
    {
        return $this->ResellingTech->post('rootserver/upgrade', [
            'vmid' => $vmid,
            'cores' => $cores,
            'memory' => $memory,
            'disk' => $disk,
            'ip_addresses' => $ip_addresses,
            'ip6_addresses' => $ip6_addresses,
            'backups' => $backups
        ]);
    }


    /**
     * @param string $server_id
     * @return array|string
     * @throws GuzzleException
     */
    public function start(string $server_id)
    {
        return $this->ResellingTech->post('rootserver/start', [
            'vmid' => $server_id
        ]);
    }

    /**
     * @param string $server_id
     * @return array|string
     * @throws GuzzleException
     */
    public function shutdown(string $server_id)
    {
        return $this->ResellingTech->post('rootserver/shutdown', [
            'vmid' => $server_id
        ]);
    }

    /**
     * @param string $server_id
     * @return array|string
     * @throws GuzzleException
     */
    public function stop(string $server_id)
    {
        return $this->ResellingTech->post('rootserver/stop', [
            'vmid' => $server_id
        ]);
    }

    /**
     * @param string $server_id
     * @return array|string
     * @throws GuzzleException
     */
    public function reboot(string $server_id)
    {
        return $this->ResellingTech->post('rootserver/reboot', [
            'vmid' => $server_id
        ]);
    }

    /**
     * @param string $server_id
     * @param string $server_os
     * @param string|null $hostname
     * @param string|null $rootpassword
     * @return array|string
     */
    public function reinstall(string $server_id, string $server_os, string $hostname = null, string $rootpassword = null)
    {
        return $this->ResellingTech->post('rootserver/reinstall', [
            'vmid' => $server_id,
            'template' => $server_os,
            'hostname' => $hostname,
            'rootpassword' => $rootpassword
        ]);
    }

    /**
     * @param string $server_id
     * @param string $rootpassword
     * @return array|string
     * @throws GuzzleException
     */
    public function resetPassword(string $server_id, string $rootpassword = null)
    {
        return $this->ResellingTech->post('rootserver/passwordreset', [
            'vmid' => $server_id,
            'rootpassword' => $rootpassword
        ]);
    }

}