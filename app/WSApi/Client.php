<?php declare(strict_types=1);

namespace App\WSApi;

final class Client
{
    public function __construct(
        private WSApiConfig $config,
    )
    {
    }

    public function getWsdlPath(): string
    {
        return $this->config->wsdlPath;
    }
}
