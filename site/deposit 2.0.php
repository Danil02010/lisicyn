<?php
$percent = file_get_contents('percent.txt');
$depositAmount = isset($_POST['deposit_amount']) ? $_POST['deposit_amount'] : 0;
$depositTerm = isset($_POST['deposit_term']) ? $_POST['deposit_term'] : 6;
$totalAmount = $depositAmount * (1 + ($percent / 100) * $depositTerm);
echo "Общая сумма, возвращаемая по вкладу: ". $totalAmount;
?>
<!DOCTYPE html>
<html>
<head>
<title>Расчет дохода по депозиту</title>
</head>
<body>
<h2>Введите сумму вклада и выберите срок депозита:</h2>
<form method="POST" action="">
<label>Сумма вклада:</label>
<input type="text" name="deposit_amount" required><br><br>
<label>Срок депозита:</label>
<select name="deposit_term" required>
<option value="6">6 месяцев</option>
<option value="9">9 месяцев</option>
<option value="12">12 месяцев</option>
</select><br><br>
<input type="submit" value="Рассчитать">
</form>
</body>
</html>
