<?php
header("Content-Type: text/html; charset=UTF-8");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSON</title>
        <script type="text/javascript" src="jquery.js"></script>
        <style type="text/css">
            #button
            {
               border: 0px;
               background-color: #11cff7;
               height: 22px;
            }
             #button:hover
            {
               background-color: #063b46;
               color: #fff;
            }
        </style>

        <script type="text/javascript">

    function json()
    {
        var val; // Переменная для хранения строки

        $('#md5').each(function(){ // Получаем строку для шифрования
            val=this.value
        });

        if(val == '') { //Проверка заполнил ли пользователь поле для ввода текста
            $('#notice').html('Нужно ввести строку!'); // Если нет то выводим предупреждение
        }
        else {
            $('#notice').empty();



            // Отправляем json запрос

            $.getJSON('json.php', {v: val}, function(obj){
                 $('#md5').attr('value',obj[1]);

            });


    }

    }

        </script>

    </head>
    <body>


        <div align="center" style="margin-top: 20%">
        <h2>Шифрование стрddокиd:<?php echo time(); ?></h2>

        <input type="text" name="md5" id="md5" size="50"> <br/>
        <div id="notice"></div> <br/>
        <input type="button" value="Пуск" id="button" onclick="json()">

        
    </div>

    </body>
</html>
