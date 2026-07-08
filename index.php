<?php
session_start();

$route=$_GET['page']??'Home';
require_once 'config/helper.php';

switch ($route){
    case'home':
        require_once 'actions/home.action.php';
        include 'views/home.view.php';
        break;
         case'show':
        require_once 'actions/show.action.php';
        include 'views/show.view.php';
        break;
     case'create':
        require_once 'actions/create.action.php';
        include 'views/create.view.php';
         break;
          case'edit':
        require_once 'actions/edit.action.php';
        include 'views/edit.view.php';
        break;
        case'delete':
        require_once 'actions/delete.action.php';
        break;
    case'login':
        require_once 'actions/login.action.php';
        include 'views/login.view.php';
        break;
    case'register':
        require_once 'actions/register.action.php';
        include 'views/register.view.php';
        break;

    case'dashboard':
        require_once 'actions/delete.action.php';
        require_once 'actions/dashboard.action.php';
        include 'views/dashboard.view.php';
        break;

    case'admin_users':
        require_once 'actions/admin/users.action.php';
        include 'views/admin/users.view.php';
        break;
    case'delete_user':
        require_once 'actions/admin/delete.action.php';
        break;
    case 'change_role':
        require_once 'actions/admin/change_role.action.php';
        break;
        case 'add_raiting':
        require_once 'actions/add_raiting.action.php';
        break;
        case 'delete_raiting':
        require_once 'actions/delete_raiting.action.php';
        break;
        case 'edit_raiting':
        require_once 'actions/edit_raiting.action.php';
        include 'views/edit_raiting.view.php';
        break;
    case 'dashboard':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?page=login");
            exit;
        }
        break;
    case 'logout':
        require_once 'actions/logout.action.php';
        break;
    default:
       echo "<h2>Xəta 404: Belə bir səhifə mövcud deyil!</h2>";
        break;
}