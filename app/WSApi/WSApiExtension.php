<?php declare(strict_types=1);

namespace App\WSApi;

use Nette;
use Nette\DI\CompilerExtension;
use Nette\Schema\Expect;

final class WSApiExtension extends CompilerExtension
{
    public function getConfigSchema(): Nette\Schema\Schema
    {
        return Expect::structure([
            'debugMode' => Expect::anyOf(Expect::int(0), Expect::bool(false))->dynamic(),
            'wsApi' => Expect::structure([
                'wsdlPath' => Expect::string()->dynamic()->required(),
            ])->castTo(WSApiConfig::class),
        ])->castTo(ExtensionConfig::class);
    }

    public function loadConfiguration(): void
    {
        /** @var ExtensionConfig $config */
        $config = $this->getConfig();

        $builder = $this->getContainerBuilder();
        $builder->addDefinition($this->prefix('ws.api'))
            ->setFactory(Client::class, ['config' => $config->wsApi]);
    }
}
