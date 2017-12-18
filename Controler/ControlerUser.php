<?php

namespace MyClass\Controler;

use MyClass\Model\User;
use MyClass\View\View;

class ControlerUser
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }
    public function addUser($group_id)
    {
        $date = \DateTime::createFromFormat('j/m/Y', $_POST['birth_date']);
        $dateFormat = date_format($date, 'Y-m-d');
        $this->user->requestAddUser($group_id, $dateFormat);
        header('location:index.php?user=add');
    }
    public function deleteUser($user)
    {
        $this->user->requestDeleteUser($user);
        header('location:index.php?user=deleted');
    }
    public function deleteUsers()
    {
        $delUsers = explode(",", $_POST['userToDel']);
        foreach($delUsers AS $userToDel)
        {
            $this->user->requestDeleteUser($userToDel);
            header('location:index.php?users=deleted');
        }
        
    }
}