<!DOCTYPE html>
<html>
    <head>
        <title>Igra</title>
    </head>
<body>
    <h1>Новый пользователь</h1>
    <p style="font-size: 30px">
        Добрый день, {{ $user->student->parent_surname .' '. $user->student->parent_name }}

        Вас добавили в нашей системе Театральная школа "Игра".<br>

        Вы можете зайти под этим логином {{ $user->email }} <br>
        Ваш пароль - {{ $password }}

        вы можете зайти через наше мобильное приложение <br>
        any button where redirect to app store or play market <br>
        OR two button to each one
    </p>
</body>
</html>
