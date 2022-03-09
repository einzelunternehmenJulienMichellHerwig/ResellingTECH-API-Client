<?php

namespace ResellingTech\VirtualServer;

use GuzzleHttp\Exception\GuzzleException;
use ResellingTech\Exception\AssertNotImplemented;
use ResellingTech\ResellingTech;

class kvm
{
    private $ResellingTech;
    private $kvmBackupHandler;
    private $kvmNetworkHandler;
    private $kvmJobHandler;

    public function __construct(ResellingTech $ResellingTech)
    {
        $this->ResellingTech = $ResellingTech;
    }

    /**
     * @return kvmBackup
     */
    public function backup(): kvmBackup
    {
        if(!$this->kvmBackupHandler) $this->kvmBackupHandler = new kvmBackup($this->ResellingTech);
        return $this->kvmBackupHandler;
    }

    /**
     * @return kvmNetwork
     */
    public function network(): kvmNetwork
    {
        if(!$this->kvmNetworkHandler) $this->kvmNetworkHandler = new kvmNetwork($this->ResellingTech);
        return $this->kvmNetworkHandler;
    }

    /**
     * @return kvmJobs
     */
    public function job(): kvmJobs
    {
        if(!$this->kvmJobHandler) $this->kvmJobHandler = new kvmJobs($this->ResellingTech);
        return $this->kvmJobHandler;
    }

    /**
     * @return array|string
     * @throws GuzzleException
     */
    public function getTemplates()
    {
        if($this->ResellingTech->isSandbox() === true) {
            throw new AssertNotImplemented();
        }
        return $this->ResellingTech->post('rootserver/os/get', [ ]);
    }

    /**
     * @param string $server_id
     * @return array|string
     * @throws GuzzleException
     */
    public function getDetails(string $server_id)
    {
        if($this->ResellingTech->isSandbox() === true) {
            throw new AssertNotImplemented();
        }
        return $this->ResellingTech->post('rootserver/getDetails', [
            'vm_id' => $server_id
        ]);
    }

    /**
     * @param string $server_id
     * @return array|string
     * @throws GuzzleException
     */
    public function getStatus(string $server_id)
    {
        if($this->ResellingTech->isSandbox() === true) {
            throw new AssertNotImplemented();
        }
        return $this->ResellingTech->post('rootserver/getStatus', [
            'vm_id' => $server_id
        ]);
    }

    /**
     * @param string $server_id
     * @return array|string
     * @throws GuzzleException
     */
    public function getConfig(string $server_id)
    {
        if($this->ResellingTech->isSandbox() === true) {
            throw new AssertNotImplemented();
        }
        return $this->ResellingTech->post('rootserver/getConfig', [
            'vm_id' => $server_id
        ]);
    }

    /**
     * @param int $cores
     * @param int $memory   In Megabytes
     * @param int $disk     in Gigabytes
     * @param int $ips
     * @param string $os
     * @return array|string
     * @throws GuzzleException
     */
    public function order(int $cores, int $memory, int $disk, int $ips, string $os)
    {
        if($this->ResellingTech->isSandbox() === true) {
            throw new AssertNotImplemented();
        }
        return $this->ResellingTech->post('rootserver/order', [
            'cores' => $cores,
            'memory' => $memory,
            'disk' => $disk,
            'ips' => $ips,
            'os' => $os
        ]);
    }

    /**
     * @param string $server_id
     * @param int $cores
     * @param int $memory
     * @param int $disk
     * @param int $ips
     * @return array|string
     * @throws GuzzleException
     */
    public function change(string $server_id, int $cores, int $memory, int $disk, int $ips)
    {
        if($this->ResellingTech->isSandbox() === true) {
            throw new AssertNotImplemented();
        }
        //TODO: Server id nicht in API?
        return $this->ResellingTech->post('rootserver/change', [
            'vm_id' => $server_id,
            'cores' => $cores,
            'memory' => $memory,
            'disk' => $disk,
            'ips' => $ips
        ]);
    }

    /**
     * @param string $server_id
     * @param bool $force_delete
     * @return array|string
     * @throws GuzzleException
     */
    public function delete(string $server_id, bool $force_delete = false)
    {
        if($this->ResellingTech->isSandbox() === true) {
            throw new AssertNotImplemented();
        }
        return $this->ResellingTech->post('rootserver/delete', [
            'vm_id' => $server_id,
            'force' => $force_delete
        ]);
    }

    /**
     * @param string $server_id
     * @return array|string
     * @throws GuzzleException
     */
    public function start(string $server_id)
    {
        if($this->ResellingTech->isSandbox() === true) {
            throw new AssertNotImplemented();
        }
        return $this->ResellingTech->post('rootserver/manage/start', [
            'vm_id' => $server_id
        ]);
    }

    /**
     * @param string $server_id
     * @return array|string
     * @throws GuzzleException
     */
    public function shutdown(string $server_id)
    {
        if($this->ResellingTech->isSandbox() === true) {
            throw new AssertNotImplemented();
        }
        return $this->ResellingTech->post('rootserver/manage/shutdown', [
            'vm_id' => $server_id
        ]);
    }

    /**
     * @param string $server_id
     * @return array|string
     * @throws GuzzleException
     */
    public function stop(string $server_id)
    {
        if($this->ResellingTech->isSandbox() === true) {
            throw new AssertNotImplemented();
        }
        return $this->ResellingTech->post('rootserver/manage/stop', [
            'vm_id' => $server_id
        ]);
    }

    /**
     * @param string $server_id
     * @return array|string
     * @throws GuzzleException
     */
    public function reboot(string $server_id)
    {
        if($this->ResellingTech->isSandbox() === true) {
            throw new AssertNotImplemented();
        }
        return $this->ResellingTech->post('rootserver/manage/reboot', [
            'vm_id' => $server_id
        ]);
    }

    /**
     * @param string $server_id
     * @param string $server_os
     * @return array|string
     * @throws GuzzleException
     */
    public function reinstall(string $server_id, string $server_os)
    {
        if($this->ResellingTech->isSandbox() === true) {
            throw new AssertNotImplemented();
        }
        return $this->ResellingTech->post('rootserver/manage/reinstall', [
            'vm_id' => $server_id,
            'os' => $server_os
        ]);
    }

    /**
     * @param string $server_id
     * @return array|string
     * @throws GuzzleException
     */
    public function resetPassword(string $server_id)
    {
        if($this->ResellingTech->isSandbox() === true) {
            throw new AssertNotImplemented();
        }
        return $this->ResellingTech->post('rootserver/manage/reset', [
            'vm_id' => $server_id
        ]);
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