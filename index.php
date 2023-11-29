<?php
require_once 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$html_style = '
<html lang="ru-RU">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
<style>
    body {
        font-family: Geometria;
    }
</style>
</head>
';

$html_return = '
<body>
    <h2>Работает, вроде!?</h2>
</body>
</html>
';

$outputPath = "file.pdf";

$options = new Options();
//Опция для парсинга html5, иначе ничего не будет работать
$options->set('isHtml5ParserEnabled', true);
$options->set('logOutputFile', '');
//Опция на загрузку файлов из вне
$options->set('isRemoteEnabled', true);

$dompdf = new Dompdf($options);
$dompdf->loadHtml($html_style . $html_return);
$dompdf->render();

$file = $dompdf->output();
file_put_contents($outputPath, $file);