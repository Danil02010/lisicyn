<?php
$host = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Функция для получения списка марок автомобилей и соответствующих моделей
function getCarList($conn)
{
    $sql = "SELECT auto_marks.mark_id, auto_marks.mark_name, GROUP_CONCAT(auto_models.model_name SEPARATOR '<br>') AS models
            FROM auto_marks
            LEFT JOIN auto_models ON auto_marks.mark_id = auto_models.mark_id
            GROUP BY auto_marks.mark_id";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Марка</th>
                    <th>Модели</th>
                </tr>";
                    
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['mark_name']."</td>
                    <td>".$row['models']."</td>
                </tr>";
        }
        
        echo "</table>";
    } else {
        echo "Нет данных";
    }
}

// Функция для добавления новой марки автомобиля
function addCarMark($conn, $mark_name)
{
    $sql = "INSERT INTO auto_marks (mark_name) VALUES ('$mark_name')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Марка автомобиля добавлена успешно";
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
}

// Функция для добавления новой модели автомобиля к существующей марке
function addCarModel($conn, $mark_id, $model_name)
{
    $sql = "INSERT INTO auto_models (mark_id, model_name) VALUES ('$mark_id', '$model_name')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Модель автомобиля добавлена успешно";
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
}

// Обработка формы добавления новой марки автомобиля
if (isset($_POST['add_mark']) && !empty($_POST['mark_name'])) {
    $mark_name = $_POST['mark_name'];
    addCarMark($conn, $mark_name);
}

// Обработка формы добавления новой модели автомобиля
if (isset($_POST['add_model']) && !empty($_POST['model_name']) && !empty($_POST['mark_id'])) {
    $model_name = $_POST['model_name'];
    $mark_id = $_POST['mark_id'];
    addCarModel($conn, $mark_id, $model_name);
}

// Вывод списка марок автомобилей и соответствующих моделей
getCarList($conn);

// Форма добавления новой марки автомобиля
echo "<h2>Добавить марку автомобиля</h2>";
echo "<form method='POST'>
        <input type='text' name='mark_name' placeholder='Наименование марки' required>
        <input type='submit' name='add_mark' value='Добавить'>
    </form>";

// Форма добавления новой модели автомобиля
echo "<h2>Добавить модель автомобиля</h2>";
echo "<form method='POST'>
        <select name='mark_id' required>
            <option value='' disabled selected>Выберите марку</option>";
            
$sql = "SELECT * FROM auto_marks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value='".$row['mark_id']."'>".$row['mark_name']."</option>";
    }
}

echo "</select>
        <input type='text' name='model_name' placeholder='Наименование модели' required>
        <input type='submit' name='add_model' value='Добавить'>
    </form>";

$conn->close();
?>