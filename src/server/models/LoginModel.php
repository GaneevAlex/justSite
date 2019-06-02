<?php

// TODO Начать использовать модель в репозитории
class LoginModel {
    protected $id = -1;

    public function __construct ($login, $password) {
        $this->login = $login;
        $this->password = $password;
    }

    public function setId ($id) {
        $this->id = $id;
    }

    public function getId () {
        return $this->id;
    }

    public function toJson () {
        return [
            'id' => $this->id,
            'login' => $this->login,
            'password' => $this->password,
        ];
    }
}