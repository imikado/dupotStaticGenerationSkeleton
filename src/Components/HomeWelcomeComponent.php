<?php

namespace MyWebsite\Components;

use Dupot\StaticGenerationFramework\Component\ComponentAbstract;
use Dupot\StaticGenerationFramework\Component\ComponentInterface;

class HomeWelcomeComponent extends ComponentAbstract implements ComponentInterface
{
    public function render(): string
    {
        return $this->renderViewWithParamList(
            __DIR__ . '/Home/welcome.php',
            []
        );
    }
}
