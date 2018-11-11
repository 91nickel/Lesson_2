<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

$continents = [
    'europe' => ['europe', 'Lepus timidus', 'Rangifer tarandus', 'Ursus arctos'],
    'northAmerica' => ['northAmerica', 'Lynx canadensis', 'Cervus elaphus subspp', 'Gulo gulo luscus'],
    'southAmerica' => ['southAmerica', 'Thylacosmilus atrox', 'Leopardus pajeros', 'Cebuella pygmaea'],
    'africa' => ['africa', 'Loxodonta africana', 'Panthera leo persica', 'Hyaena brunnea Thunberg'],
    'australia' => ['australia', 'Phascolarctos cinereus', 'Lasiorhinus krefftii', 'Sarcophilus harrisii'],
    'antarctica' => ['antarctica', 'Hydrurga leptonyx', 'Lobodon carcinophaga', 'Megaptera novaeangliae']
];
echo 'Все животные' . '<br />';
foreach ($continents as $continent) {
    echo '<br />' . $continent[0] . '<br />';
    for ($i = 1; $i < count($continent); $i++) {
        echo $continent[$i] . '<br />';
    }
}

$i = -1;

foreach ($continents as $animalList) {//цикл перебирает континенты
    $c = 0;
    $i++;
    foreach ($animalList as $animal) {//цикл перебирает животных внутри континента
        $c++;
        if ($c == 1) {
            continue;
        }
        $nameParts = explode(' ', $animal);//разбивает имя зверушки на сколько-то частей
        if (count($nameParts) == 2) {//считаем сколько частей, если частей две, то идем дальше
            //echo $animal[0] . ' ' . $animal . '<br/>'; //выводим все, что из двух слов
            $namesTwoWords[] = $animal . '<br/>'; // наполняем список из двухловных зверушек для последующего вывода
            $animalWord1[] = $nameParts[0];//формируем массив с первыми словами
            $animalWord2[] = $nameParts[1];//формируем массив со вторыми словами
        }
    }
}
shuffle($animalWord1);
foreach ($animalWord1 as $word) {
    $fantasticNames[] = $word;
}
shuffle($animalWord2);
foreach ($animalWord2 as $word) {
    $fantasticSurnames[] = $word;
}
//var_dump($fantasticNames);
//var_dump($fantasticSurnames);

for ($i = 0; $i < count($animalWord1); $i++) {
    $final[$i] = $fantasticNames[$i] . ' ' . $fantasticSurnames[$i];
}
//var_dump($final);
?>

<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>PHP-27-1</title>
    <style>
        body {
            font-family: sans-serif;
        }
    </style>
</head>
<body>
<h2>Названия, состоящие из двух слов:</h2>
<p><?php foreach ($namesTwoWords as $name) {
        echo $name . '<br />';
    } ?></p>
<h2>"Фантазийные" названия:</h2>
<p><?php
    foreach ($final as $name) {
        echo $name . '<br />';
    }
    ?>
</p>
</body>
</html>