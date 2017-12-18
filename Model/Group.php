<?php

namespace MyClass\Model;

use MyClass\Model\Model;

class Group extends Model
{
    public function getGroupsNUsers()
    {
        $sql = 
            'SELECT g.groupe_name groupe, u.nom nom, u.prenom prenom, u.email email, u.birth_date birth_date
            FROM groupe g
            INNER JOIN user u
            ON g.id = u.groupe_id
            ORDER BY groupe';
        $groupsNUsers = $this->executeRequest($sql);
        return $groupsNUsers->fetchAll();
    }
    public function getGroupsNUsersWithFilter($filter)
    {
        $sql = 
            "SELECT g.groupe_name groupe, u.nom nom, u.prenom prenom, u.email email, u.birth_date birth_date
            FROM groupe g
            INNER join user u
            ON g.id = u.groupe_id
            WHERE groupe_name = \"$filter\" OR nom = \"$filter\" 
            ORDER BY groupe";
        $groupsNUsers = $this->executeRequest($sql);
        return $groupsNUsers->fetchAll();
    }
    public function requestGetGroup($group)
    {
        $sql = 'SELECT id FROM groupe WHERE groupe_name = ?';
        $array_group_id = $this->executeRequest($sql, array($group));
        return $array_group_id->fetch();
    }
}