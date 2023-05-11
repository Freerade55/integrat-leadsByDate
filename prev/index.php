<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Выбор даты</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form>
    <label for="date">Выберите дату:</label>
    <input type="date" id="date" name="date">
    <button type="submit">Отправить</button>
</form>

<div id="loader" style="display: none;">
    <div id="overlay"></div>
    <div id="spinner">
        <img src="img/loading-gif.gif" alt="spinner">
        <p>Загрузка идет...</p>
    </div>
</div>



<script src="js/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

</body>
</html>