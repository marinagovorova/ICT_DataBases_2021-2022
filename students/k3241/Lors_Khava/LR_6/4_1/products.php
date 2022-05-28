<?php
$tomatoes = 10; //кол-во в штуках
$cucumbers = 15; //кол-во в штуках
$apples = 20; //кол-во в штуках
$weight_tomato = 150; //вес одной шт. в граммах
$weight_cucumber = 100; //вес одной шт. в граммах
$weight_apple = 200; //вес одной шт. в граммах
$text1 = 'total products = ';

//простой массив c циклом for и подсчетом количества

$products_array = ['tomatoes', 'cucumbers', 'apples'];
$array_lenght = count($products_array);
for ($i = 0; $i < $array_lenght; ++$i) {
    echo $products_array[$i];
    echo '<br>';
}
$message = $text1.$array_lenght;
print_r($products_array);
echo'<br>';
echo($message);
echo'<br><br>';

//сложный массив c циклом foreach

$products_weight = [
    $products_array[0] => $weight_tomato,
    $products_array[1] => $weight_cucumber, 
    $products_array[2] => $weight_apple
];
foreach ($products_weight as $key => $value) {
  echo $key . ' : ' . $value;
  echo '<br>';
}

//условный оператор if

if ($tomatoes>$cucumbers && $tomatoes>$apples)
{
    echo "tomatoes are more, tomatoes = ".$tomatoes;
} 
else if($cucumbers>$tomatoes && $cucumbers>$apples)
{
    echo 'cucumbers are more, cucumbers = '.$cucumbers;
} 
else if($apples>$tomatoes && $apples>$cucumbers)
{
    echo 'apples are more, apples = '.$apples;
}
else
{
    echo 'equal values';
}

echo'<br><br>';

//условный оператор switch

switch($weight_tomato)
{
    case $weight_tomato < 200 :
        echo 'normal tomato';
    break;
    case $weight_tomato > 150 :
        echo 'big tomato';
    break;
    case $weight_tomato < 150 :
        echo 'small tomato';
    break;
}

echo'<br><br>';

//функция и цикл while 

function weight_tomatoes()
{
    global $tomatoes, $weight_tomato;
    $i = 0;
    while ($i <= $tomatoes)
    {
        $i++;
        echo "Total weight = ".$i*$weight_tomato; //общий вес продукта
        echo '<br />';

    }
    echo $total = $i*$weight_tomato;
    return $total;
    
}
$total_ = weight_tomatoes();

echo'<br><br>';

//функция и цикл do

function weight_cucumbers()
{
    global  $weight_cucumber, $cucumbers;
    $j = 0;
    do{
        $j++;
        echo "Total weight = ".$j*$weight_cucumber; //общий вес продукта
        echo '<br />';
    } while ($j <= $cucumbers);
}

weight_cucumbers();

echo'<br><br>';

//сесии

session_start();
$_SESSION["products"] = "tomato";
$_SESSION["weight"] = $total_;
echo "The data is saved in the session";

?>


