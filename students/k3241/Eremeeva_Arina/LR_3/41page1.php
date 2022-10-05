<?php

function total_number_articles($staff): int
{
    $count = 1;
    foreach ($staff as $employee) {
        $count += $employee['number_of_articles'];
    }
    return $count;
}

function payback_quarter($investment, $profits): int
{
    $quarter = 0;
    $sum = 0;
    while ($sum < $investment && $quarter <= 3) {
        $sum += $profits[$quarter++];
    }
    if ($sum < $investment)
        return 0;
    else return $quarter;
}

function plan_execution($staff, $plan): bool
{
    $count = 0;
    $i = 0;
    do {
        $count += $staff[$i++]['number_of_articles'];
    } while ($count < $plan && $i <= 3);
    if ($count < $plan)
        return false;
    else return true;
}

$profit_quarters = [100000, 150000, 75000, 200000];

$staff = [
    [
        'name' => 'Наташа',
        'number_of_articles' => 7
    ],
    [
        'name' => 'Вадим',
        'number_of_articles' => 5
    ],
    [
        'name' => 'Аня',
        'number_of_articles' => 3
    ],
    [
        'name' => 'Кирилл',
        'number_of_articles' => 2
    ],
];

$investment = 5000000;
$name_company = "Физика для математиков";

$quarter = payback_quarter($investment, $profit_quarters);

session_start();
$_SESSION['name'] = "дорогой читатель";
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <title>Отчетность компании за 2021 год.</title>
</head>
<body>
<h1>
    Отчетность компании "<?= $name_company ?>" за 2021 год.
</h1>
<h3>Суммарное количество статей: <?= total_number_articles($staff) ?></h3>
<h3>Срок окупаемости инвестиций:
    <?=
    match ($quarter) {
        1 => $quarter . " квартал",
        2, 3, 4 => $quarter . " квартала",
        default => "не окупились",
    };
    ?>
</h3>
<h3>3 лучших сотрудника по количеству публикаций:</h3>
<?php
for ($i = 0; $i < 3; $i++) {
    ?>
    <div>
        <?= $staff[$i]['name'] ?>
    </div>
    <?php
}
?>
<h3>План по количеству статей:
    <?php
    if (plan_execution($staff, 30))
        echo "выполнен";
    else echo "не выполнен";
    ?>
</h3>
<form method="post" action="41page2.php">
    <div>
        <button type="submit">
            Озанакомился
        </button>
        </div>
</form
</body>
