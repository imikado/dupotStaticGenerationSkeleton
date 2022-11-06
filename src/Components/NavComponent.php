<?php

namespace MyWebsite\Components;

use Dupot\StaticGenerationFramework\Component\ComponentAbstract;
use Dupot\StaticGenerationFramework\Component\ComponentInterface;

class NavComponent extends ComponentAbstract implements ComponentInterface
{

    protected $pageSelected;

    public function __construct($pageSelected)
    {
        $this->pageSelected = $pageSelected;
    }

    public function render(): string
    {
        $linkList = [
            'Home' => 'index.html',

        ];

        return $this->renderViewWithParamList(
            __DIR__ . '/Nav/nav.php',
            [
                'linkList' => $linkList,
                'pageSelected' => $this->pageSelected
            ]
        );
    }
}
