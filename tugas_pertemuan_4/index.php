<?php
require_once 'config/database.php';
require_once 'app/controllers/usercontroller.php';

// Connect to the database
$dbconnection = getdbconnection();

// Get the action parameter from the URL
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

// Create an instance of usercontroller
$controller = new usercontroller($dbconnection);

// Switch between different actions
switch ($action) {
    case 'detail':
        $controller->show($id);
        break;
    case 'edit':
        $controller->edit($id);
        break;
    case 'delete':
        $controller->delete($id);
        break;
    case 'index':
    default:
        $controller->index();
        break;
}
?>
