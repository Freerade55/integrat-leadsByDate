<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Выбор даты</title>
    <link rel="stylesheet" href="css/style.css?v=3">
</head>
<body>

<div class="forms">
    <div class="title">Отчет по дате</div>


    <form id="dateForm">
        <label for="date">Выберите дату:</label>
        <input type="date" id="date" name="date">
        <button type="submit" id="buttonDate">Отправить</button>
    </form>



    <div class="title2">История лидов</div>

    <form id="dateTimeForm">
        <label for="datetime">Выберите дату и время:</label>
        <input type="datetime-local" id="datetime" name="datetime">
        <button type="submit" id="buttonDatetime">Отправить</button>
    </form>



    <div id="loader" style="display: none;">
        <div id="overlay"></div>
        <div id="spinner">
            <img src="img/loading-gif.gif" alt="spinner">
            <p>Загрузка идет...</p>
        </div>
    </div>









</div>




<script src="js/script.js?v=4"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

</body>
</html>