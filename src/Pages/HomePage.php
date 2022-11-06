<?php

namespace MyWebsite\Pages;

use Dupot\StaticGenerationFramework\Page\PageAbstract;
use Dupot\StaticGenerationFramework\Page\PageInterface;
use MyWebsite\Components\HomeWelcomeComponent;
use MyWebsite\Components\NavComponent;

class HomePage extends PageAbstract implements PageInterface
{
    protected $filename = 'index.html';

    public function render(): string
    {
        return $this->renderLayoutWithParamList(
            __DIR__ . '/layout/default.php',
            [
                'nav' => new NavComponent($this->filename),
                'contentList' => [
                    new HomeWelcomeComponent(),
                ]
            ]
        );
    }
}
