<?php

require '../Modelo/General.php';
require '../DAO/generalDAO.php';

isset($_POST['id']) ? $id = $_POST['id'] : $id = "";
isset($_POST['page']) ? $page = $_POST['page'] : $page = "";
isset($_POST['type']) ? $accion = $_POST['type'] : $accion = "";

$select = new General($id, $page);
$dao = new generalDAO();

switch ($accion) {
    case "municipio":
        $dao->listarMunicipio($select);
        break;
}
