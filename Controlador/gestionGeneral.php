<?php

require '../Modelo/General.php';
require '../DAO/generalDAO.php';

isset($_REQUEST['id']) ? $id = $_REQUEST['id'] : $id = "";
isset($_REQUEST['page']) ? $page = $_REQUEST['page'] : $page = "";
isset($_REQUEST['type']) ? $accion = $_REQUEST['type'] : $accion = "";

$select = new General($id, $page);
$dao = new generalDAO();

switch ($accion) {
    case "municipio":
        $dao->listarMunicipio($select);
        break;
}
