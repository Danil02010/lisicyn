<form action="calculate.php" method="POST">
    <label for="depositAmount">Сумма вклада:</label>
    <input type="text" name="depositAmount" id="depositAmount">
    
    <label for="depositTerm">Срок депозита:</label>
    <select name="depositTerm" id="depositTerm">
        <option value="6">6 месяцев</option>
        <option value="9">9 месяцев</option>
        <option value="12">12 месяцев</option>
    </select>

    <input type="submit" value="Рассчитать">
</form>