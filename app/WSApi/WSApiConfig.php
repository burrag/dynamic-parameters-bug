<?php declare(strict_types=1);

namespace App\WSApi;

use Nette\Schema\DynamicParameter;

final class WSApiConfig
{
    /** @var string|DynamicParameter */
    public $wsdlPath;
}
