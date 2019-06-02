<?php
include '\repositories\LoginRepository.php';

class LoginController {
    public function __construct () {
        $this->loginRepository = new LoginRepository();
    }

    public function saveLoginAction () {

        return $this->loginRepository->save($_POST['login'], $_POST['password']);
    }

    public function getLoginListAction () {
        return $this->loginRepository->findAll();
    }
}