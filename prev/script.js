const form = document.querySelector('form');
const button = document.querySelector('button');

const loader = document.getElementById("loader");

form.addEventListener('submit', (event) => {
    event.preventDefault();
    const date = document.querySelector('#date').value;


    if(date !== "") {

        button.disabled = true;
        button.style.backgroundColor = "#aea9a9";

        loader.style.display = "block";


        $.ajax({
            url: 'https://hub.integrat.pro/api/leadsByDate/getDate.php', // Указываем URL обработчика на сервере
            method: 'POST',
            dataType: 'json',
            data: { inputData: date },
            success: function(response) { // Функция, которая будет выполнена при успешном выполнении запроса
                var url = 'https://hub.integrat.pro/api/leadsByDate/show.php?resultData=' + encodeURIComponent(JSON.stringify(response))
                    + '&date=' + date;

                button.disabled = false;
                button.style.backgroundColor = "#0069d9";

                loader.style.display = "none";


                window.open(url, '_blank');
            },
            error: function(jqXHR, textStatus, errorThrown) { // Функция, которая будет выполнена при ошибке запроса
                console.log(textStatus + ': ' + errorThrown); // Выводим ошибку в консоль
            }
        });

    }


});