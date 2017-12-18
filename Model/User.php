<?php

namespace MyClass\Model;

use MyClass\Model\Model;

class User extends Model
{
    public function requestAddUser($group_id, $dateFormat)
    {
        $sql = 
            'INSERT INTO user(nom, prenom, email, birth_date, groupe_id)
            VALUES(:nom, :prenom, :email, :birth_date, :groupe)';
        $this->executeRequest($sql, array(
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'email' => $_POST['email'],
            'birth_date' => $dateFormat,
            'groupe' => $group_id
        ));
    }
    public function requestDeleteUser($user)
    {
        $sql = 
            'DELETE FROM user WHERE email = ?';
        $this->executeRequest($sql, array($user));
    }
}