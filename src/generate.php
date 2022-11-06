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
