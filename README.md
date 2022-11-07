# Dupot static-generation-framework Skeleton

Skeleton to create a static-generation-framework website

# Usage

Installation

```bash
composer create-project dupot/static-generation-skeleton myWebsite
```

Generation

```bash
docker-compose exec web php src/generate.php
```

Display the result

```bash
docker-compose up
```

Then open your browser on http://localhost/ url

# How to use

Create your pages as class in Pages folder

- Each page will use a layout and load component list
- Each page will be generated as html page in docs folder, so don't miss to add in this folder all css/js dependances

Create components used by your pages in Components folder

- Each component will use views

# Example of use

## You homepage

src/Pages/HomePage.php

```php
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

```

## Your components included in your page

src/Components/NavComponent.php

```php
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

```

view used by your component

src/Components/Nav/nav.php

```php
<nav class="navbar navbar-wrapper navbar-default navbar-fade is-transparent" role="navigation" aria-label="main navigation">

    <div class="navbar-brand">
        <a class="navbar-item" href="index.html">
            <img src="css/images/logo.png" width="112" height="28">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbar-menu">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div class="navbar-menu  " id="navbar-menu">

        <?php foreach ($this->paramList['linkList'] as $label => $link) : ?>
            <a class="navbar-item <?php if ($link == $this->paramList['pageSelected']) : ?>is-active<?php endif; ?>" href="<?php echo $link ?>"><?php echo $label ?></a>
        <?php endforeach; ?>

    </div>

</nav>
```

## Generate script

Last but not least: don't miss to fill in generation script your page class list

```php
<?php

use MyWebsite\Pages\HomePage;

require __DIR__ . '/../vendor/autoload.php';

$pagesList = [

    new HomePage(),
    //new OtherPage()

];

foreach ($pagesList as $pageLoop) {
    print("Generate " . $pageLoop->getFilename() . "\n");
    $pageLoop->generateTo(__DIR__ . '/../docs/');
}

```
