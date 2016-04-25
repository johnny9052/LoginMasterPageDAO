<?php

class LogIn {

    private $nickname;
    private $password;

    public function __construct($nickname, $password) {
        $this->nickname = $nickname;
        $this->password = $password;
    }

    public function getNickName() {
        return $this->nickname;
    }

    public function setNickName($nickname) {
        $this->nickname = $nickname;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

}
