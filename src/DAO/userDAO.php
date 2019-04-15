<?php

namespace App\src\DAO;

use App\src\model\User;

class UserDAO extends DAO
{
    public function verificationBDD($login,$password)
    {
        $sql = 'SELECT * FROM user WHERE email = ? AND password = ?';
        $result = $this->sql($sql,[$login,$password]);
        $row = $result->fetch();
        return $row;
    }
    public function verifyRole($email){
        $sql = 'SELECT role FROM user WHERE email = ?';
        $result = $this->sql($sql,[$email]);
        $role = $result->fetch();
        return $role;
    }
    public function getHash($email){
        $sql = 'SELECT password FROM user WHERE email = ?';
        $result = $this->sql($sql,[$email]);
        $hash = $result->fetch();
        return $hash;
    }

    public function addUser($email, $password, $username){
        $sql = 'INSERT INTO user (email,password,username) VALUES(?, ?, ?)';
        $this->sql($sql, [$email,$password, $username]);
        return;
        }

    // hydratation
    private function buildObject(array $row)
    {
        $user = new User();
        $user->setId($row['id']);
        $user->setUsername($row['username']);
        $user->setEmail($row['email']);
        $user->setPassword($row['password']);
        $user->setRole($row['role']);
        return $user;
    }
}
