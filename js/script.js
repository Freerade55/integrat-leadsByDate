const dateForm = document.querySelector('#dateForm');
const buttonDate = document.querySelector('#buttonDate');





const loader = document.getElementById("loader");

dateForm.addEventListener('submit', (event) => {
    event.preventDefault();
    const date = document.querySelector('#date').value;


    if(date !== "") {

        buttonDate.disabled = true;
        buttonDate.style.backgroundColor = "#aea9a9";

        loader.style.display = "block";


        $.ajax({
            url: 'https://hub.integrat.pro/api/leadsByDate/getDate.php', // Указываем URL обработчика на сервере
            method: 'POST',
            dataType: 'json',
            data: { inputData: date },
            success: function(response) { // Функция, которая будет выполнена при успешном выполнении запроса
                const url = 'https://hub.integrat.pro/api/leadsByDate/show.php?resultData=' + encodeURIComponent(JSON.stringify(response))
                    + '&date=' + date;

                buttonDate.disabled = false;
                buttonDate.style.backgroundColor = "#0069d9";

                loader.style.display = "none";


                window.open(url, '_blank');
            },
            error: function(jqXHR, textStatus, errorThrown) { // Функция, которая будет выполнена при ошибке запроса
                console.log(textStatus + ': ' + errorThrown); // Выводим ошибку в консоль
            }
        });

    }


});


const dateTimeForm = document.querySelector('#dateTimeForm');
const buttonDatetime = document.querySelector('#buttonDatetime');





dateTimeForm.addEventListener('submit', (event) => {

    event.preventDefault();
    const date = document.querySelector('#datetime').value;



        if(date !== "") {


            buttonDatetime.disabled = true;
            buttonDatetime.style.backgroundColor = "#aea9a9";

            loader.style.display = "block";


            $.ajax({
                url: 'https://hub.integrat.pro/api/leadsByDate/getDate.php', // Указываем URL обработчика на сервере
                method: 'POST',
                dataType: 'json',
                data: { inputData: date },
                success: function(response) { // Функция, которая будет выполнена при успешном выполнении запроса


                    if(typeof response === "string") {

                        alert("История лидов доступна с " + response);

                    } else {


                        const url = 'https://hub.integrat.pro/api/leadsByDate/show.php?resultData=' + encodeURIComponent(JSON.stringify(response))
                            + '&date=' + date;


                        window.open(url, '_blank');

                    }

                    loader.style.display = "none";

                    buttonDatetime.disabled = false;
                    buttonDatetime.style.backgroundColor = "#0069d9";






                },
                error: function(jqXHR, textStatus, errorThrown) { // Функция, которая будет выполнена при ошибке запроса
                    console.log(textStatus + ': ' + errorThrown); // Выводим ошибку в консоль
                }
            });

    }











});






















