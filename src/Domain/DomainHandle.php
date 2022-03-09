<?php

namespace ResellingTech\Domain;

use GuzzleHttp\Exception\GuzzleException;
use ResellingTech\Exception\AssertNotImplemented;
use ResellingTech\ResellingTech;

class DomainHandle
{
    private $ResellingTech;

    public function __construct(ResellingTech $ResellingTech)
    {
        $this->ResellingTech = $ResellingTech;
    }

    /**
     * @param string $handle_id     BJSC65
     * @return array|string
     * @throws GuzzleException
     */
    public function get(string $handle_id)
    {
        return $this->ResellingTech->post('domain/handle/get', [
            'handle_id' => $handle_id
        ]);
    }

    /**
     * @param string $type          PERS | ORG | ROLE
     * @param string $sex           MALE | FEMALE
     * @param string $organisation  Reseller-Services
     * @param string $firstname     Max
     * @param string $lastname      Mustermann
     * @param string $street        Musterstraße
     * @param int $number           1
     * @param int $postcode         99999
     * @param string $city          Musterstadt
     * @param string $region        Hessen
     * @param string $country       DE
     * @param string $email         max.mustermann@email.com
     * @param string|null $phone    +49 1234567
     * @return array|string
     * @throws GuzzleException
     */
    public function create(string $type, string $sex, string $organisation, string $firstname, string $lastname, string $street,
                           int $number, int $postcode, string $city, string $region, string $country, string $email, string $phone = null)
    {
        return $this->ResellingTech->post('domain/handle/create', [
            'type' => $type,
            'sex' => $sex,
            'organisation' => $organisation,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'street' => $street,
            'number' => $number,
            'postcode' => $postcode,
            'city' => $city,
            'region' => $region,
            'country' => $country,
            'email' => $email,
            'phone' => $phone
        ]);
    }

    /**
     * @param string $handle_id     BJSC65
     * @return array|string
     * @throws GuzzleException
     */
    public function delete(string $handle_id)
    {
        return $this->ResellingTech->post('domain/handle/delete', [
            'handle_id' => $handle_id
        ]);
    }

}