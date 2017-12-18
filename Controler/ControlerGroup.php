<?php

namespace MyClass\Controler;

use MyClass\Model\Group;
use MyClass\View\View;

class ControlerGroup
{
    private     $group;
 
    public function __construct()
    {
        $this->group = new Group();
    }
    
    public function displayGroupsNUsers()
    {
        $groupsNUsers = $this->group->getGroupsNUsers();
        $view = new view("Group");
        $view->generate(array('groupsNUsers' => $groupsNUsers));
    }
    public function displayWithFilter($filter)
    {
        $groupsNUsers = $this->group->getGroupsNUsersWithFilter($filter);
        if (empty($groupsNUsers))
        {
            header('location:index.php?filter=empty');
        }
        else
        {
            $view = new view("Group");
            $view->generate(array('groupsNUsers' => $groupsNUsers));
        }
    }
    public function getGroup($group)
    {
        $array_group_id = $this->group->requestGetGroup($group);
        return intval($array_group_id['id']);
    }
}