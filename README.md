# imagickTool
imagick自定义工具类
> pdf转image
```
$pdf = '7f40511ad479e0d420a603aa1b13a438a22e3bd5.pdf';

$im = new tools\imagickTools($pdf);

$im->setFilename( 'test' );//文件名

$im->toImg( -1 ,5);
```