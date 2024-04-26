<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Телефонная книга</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='../www/js/main.js'></script>
    <script src="../www/js/jquery-3.7.1.min.js"></script>
    <script src="../controller/usercontroller.php"></script>
</head>
<body>

    <form id="reg">
        <label for="name">Введите имя</label>
        <input id="name" name="name" placeholder="Имя">  
        <label for="phone">Введите номер телефона</label>
        <input id="phone" name="phone" placeholder="Номер"> 
        <input type="button" value="Добавить" onclick="registerNewUser()"> 
    </form>
    <script>
        selectAllUsers();
    </script>
</body>
</html>