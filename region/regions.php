<?php

$filePath = 'regions.txt';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $region = $_POST['region'];
    $capital = $_POST['capital'];
    $population = $_POST['population'];
    $federalDistrict = $_POST['federalDistrict'];
    $data = $region . ';' . $capital . ';' . $population . ';' . $federalDistrict . "\n";

    
    $file = fopen($filePath, 'a');
    if ($file) {
       
        fwrite($file, $data);
        fclose($file);
    } else {
        echo 'Не удалось открыть файл для записи.';
    }
}

$fileContent = file($filePath);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Форма ввода данных о регионах</title>
    <style>
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h2>Форма ввода данных о регионах</h2>
    <form method="POST">
        <label>Название Региона:</label>
        <input type="text" name="region" required><br>
        <label>Столица региона:</label>
        <input type="text" name="capital" required><br>
        <label>Численность населения:</label>
        <input type="number" name="population" required><br>
        <label>Федеральный округ:</label>
        <select name="federalDistrict" required>
            <option value="Центральный">Центральный</option>
            <option value="Северо-Западный">Северо-Западный</option>
            <option value="Южный">Южный</option>
            <option value="Северный Кавказ">Северный Кавказ</option>
            <option value="Приволжский">Приволжский</option>
            <option value="Уральский">Уральский</option>
            <option value="Сибирский">Сибирский</option>
            <option value="Дальневосточный">Дальневосточный</option>
        </select><br>
        <input type="submit" value="Отправить">
    </form>

    <h2>Данные о регионах</h2>
    <table>
        <tr>
            <th>№</th>
            <th>Название Региона</th>
            <th>Столица региона</th>
            <th>Численность населения</th>
            <th>Федеральный округ</th>
        </tr>
        <?php foreach ($fileContent as $index => $line) : ?>
            <?php $data = explode(';', $line); ?>
            <tr>
                <td><?php echo $index + 1; ?></td>
                <td><?php echo $data[0]; ?></td>
                <td><?php echo $data[1]; ?></td>
                <td><?php echo $data[2]; ?></td>
                <td><?php echo $data[3]; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html
