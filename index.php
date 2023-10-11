<?php
session_start();

// Include necessary files and define your routes
require './app/models/UserModel.php';
require './app/controllers/UserController.php';
require './app/controllers/AuthController.php';

$controller = '';
$action = '';


if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    header('Location: app/views/home.php');

}
$userController = new UserController(new UserModel());

// Route requests to the appropriate controllers and actions
switch ($action) {

    case 'register':
        $userController->register();
        break;
    case 'login':
        $authController = new AuthController();

        $authController->login();
        break;

    case 'logout':
        $authController = new AuthController();

        $authController->logout();
        break;

    case 'edit':

        $userController->edit();
        break;
    case 'delete':
        if (isset($_GET['id'])) {
            $userController->delete($_GET['id']);
        }
        break;
    case 'allUsers':
        $userController->allUsers();
        break;

    case 'admin':
        include "./app/views/adminDash.php";
        break;

    default:
        // Redirect to the login page or home page
        include "./app/views/404.php";
        break;
}