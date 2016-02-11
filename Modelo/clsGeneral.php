<?php

class clsGeneral {

    private $id;
    private $page;

    function clsGeneral($id, $page) {
        $this->id = $id;
        $this->page = $page;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getPage() {
        return $this->page;
    }

    public function setPage($page) {
        $this->page = $page;
    }

}
