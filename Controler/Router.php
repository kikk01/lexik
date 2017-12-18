<?php

namespace MyClass\Controler;

use MyClass\Controler\ControlerUser;
use MyClass\Controler\ControlerGroup;
use MyClass\View\View;


class Router
{
    protected   $ctrlUser,
                $ctrlGroup;

    public function __construct()
    {
        $this->ctrlGroup = new ControlerGroup();
        $this->ctrlUser = new ControlerUser();
    }
    public function routeRequete()
    {
        try
        {
            // request with filter
            if(isset($_POST['filter']))
            {
                $this->ctrlGroup->displayWithFilter($_POST['filter']);
            }
            // if request with filter is empty
            elseif(isset($_GET['filter']))
            {
                if($_GET['filter'] === 'empty')
                {
                    $groupsNUsers = $this->ctrlGroup->displayGroupsNUsers();
                }
            }
            // add user
            elseif(isset($_POST['email']))
            {
                if(!empty($_POST['email']))
                {
                    $group_id = $this->ctrlGroup->getGroup($_POST['group']); // return id of user group 
                    $this->ctrlUser->addUser($group_id);
                }                
            }
            
            // Delete some user
            elseif(isset($_POST['userToDel']))
            {
                $this->ctrlUser->deleteUsers();
            }
            // Delete some users 
            elseif(isset($_GET['delete']))
            {
                $this->ctrlUser->deleteUser($_GET['delete']);
            }
            // Display table with all users and groups
            else
            {
                $groupsNUsers = $this->ctrlGroup->displayGroupsNUsers();
            }
        }
        catch(\Exception $e)
        {
            $this->error($e->getMessage());
        }

    }        
    private function error($msgError)
    {
        $vue = new View("Error");
        $vue->generate(array('msgError' => $msgError));       
    }
}


