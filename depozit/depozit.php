<?php
$depozit_amount = $_POST['depozit_amount'];
$depozit_term = $_POST['depozit_term'];

$percent = file_get_contents('percent.txt');

$total_amount = $depozit_amount * (1 + $percent/100) * $depozit_term;

echo "Ваша общая сумма по вкладу:" . $total_amount;
?>