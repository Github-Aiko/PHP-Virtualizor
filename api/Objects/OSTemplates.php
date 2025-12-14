<?php
/**
 * OSTemplates Object Class
 *
 * @package    Virtualizor\Objects
 * @copyright  2025 Github-Aiko
 * @license    MIT
 * @link       https://github.com/Github-Aiko/PHP-Virtualizor
 */

namespace Virtualizor\Objects;

class OSTemplates {

    private $client;
    private $userClient;

    public function __construct($client, $userClient)
    {
        $this->client = $client;
        $this->userClient = $userClient;
        return $this;
    }

    public function getOSList(){
        return $this->client->list_distros();
    }
}