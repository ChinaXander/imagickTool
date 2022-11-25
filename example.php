<?php

use Xander\imagickTools;

require "vendor/autoload.php";

$pdf = 'E:\PyWork\sku_v2\download\pdf\7f40511ad479e0d420a603aa1b13a438a22e3bd5.pdf';

$im = new imagickTools($pdf);

//转化后的图片名称，多页转换后名称格式为 第一页(test-0) 第二页(test-1) 第三页(test-2)
$im->setFilename( 'test' );

//图片格式 默认png
$im->setSub('png');

//转换1-5页
$im->toImg( -1 ,5);

//转换1-5页
$im->toImg( 0 ,5);

//转换2-6页
$im->toImg( 100 );


echo '<pre>';
var_dump($im->getImageData());
echo '</pre>';



