<?php

namespace ResellingTech\VirtualServer;

use GuzzleHttp\Exception\GuzzleException;
use ResellingTech\Exception\AssertNotImplemented;
use ResellingTech\ResellingTech;

class kvmBackup
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
    public function list(string $server_id)
    {
        if($this->ResellingTech->isSandbox() === true) {
            throw new AssertNotImplemented();
        }
        return $this->ResellingTech->post('rootserver/backups/list', [
            'vm_id' => $server_id
        ]);
    }

    /**
     * @param string $server_id
     * @return array|string
     * @throws GuzzleException
     */
    public function create(string $server_id)
    {
        if($this->ResellingTech->isSandbox() === true) {
            throw new AssertNotImplemented();
        }
        return $this->ResellingTech->post('rootserver/backups/create', [
            'vm_id' => $server_id
        ]);
    }

    /**
     * @param string $server_id
     * @param string $backup
     * @return array|string
     * @throws GuzzleException
     */
    public function restore(string $server_id, string $backup)
    {
        if($this->ResellingTech->isSandbox() === true) {
            throw new AssertNotImplemented();
        }
        return $this->ResellingTech->post('rootserver/backups/restore', [
            'vm_id' => $server_id,
            'backup' => $backup
        ]);
    }

    /**
     * @param string $server_id
     * @return array|string
     * @throws GuzzleException
     */
    public function status(string $server_id)
    {
        if($this->ResellingTech->isSandbox() === true) {
            throw new AssertNotImplemented();
        }
        return $this->ResellingTech->post('rootserver/backups/status', [
            'vm_id' => $server_id
        ]);
    }

}