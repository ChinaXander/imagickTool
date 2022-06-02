<?php

require "vendor/autoload.php";

$pdf = 'E:\PyWork\sku_v2\download\pdf\7f40511ad479e0d420a603aa1b13a438a22e3bd5.pdf';

$im = new tools\imagickTools($pdf);

$im->setFilename( 'test' );

$im->toImg( -1 ,5);
