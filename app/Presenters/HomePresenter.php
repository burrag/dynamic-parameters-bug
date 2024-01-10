<?php

declare(strict_types=1);

namespace App\Presenters;

use App\WSApi\Client;
use Nette;


final class HomePresenter extends Nette\Application\UI\Presenter
{
    public function __construct(
        private Client $client,
    )
    {
        parent::__construct();
    }

    public function actionDefault(): void
    {
        dump($this->client->getWsdlPath());
    }
}
