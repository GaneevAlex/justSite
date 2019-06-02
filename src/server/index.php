<?php
include 'controllers\LoginController.php';

error_reporting(0);
$dbconn = pg_connect("host=localhost dbname=users user=postgres password=''") or die("Не удалось соединиться");
$stat = pg_connection_status($dbconn);

if ($stat !== PGSQL_CONNECTION_OK) {
    echo 'Статус соединения: разорвано';
}

$loginController = new LoginController();

if ($_POST['c'] === 'login') {
    if ($_POST['a'] === 'save') {
        if ($loginController->saveLoginAction()) {
            echo 'Вы успешно зарегистрировались';

        } else {
            echo 'Такой логин уже есть';
        }
    }

    if ($_POST['a'] === 'get') {
        $loginList = $loginController->getLoginListAction();
        $result = [];

        foreach ($loginList as $login) {
            $result[$login['login']] = $login['password'];
        }

        echo json_encode($result);
    }
}