<?php

namespace App\src\DAO;

use App\src\model\User;

class UserDAO extends DAO
{

    public function getUser($email){
        $sql = 'SELECT * FROM user WHERE email = ?';
        $result = $this->sql($sql, [$email]);
        $author = [];
        foreach ($result as $row) {
            $authorId = $row['id'];
            $author[$authorId] = $this->buildObject($row);
        }
        return $author;
    }

    public function getName($email){
        $sql = 'SELECT username FROM user WHERE email = ?';
        $result = $this->sql($sql,[$email]);
        $username = $result->fetch();
        return $username[0];
    }
    public function getUserId($email){
        $sql = 'SELECT id FROM user WHERE email = ?';
        $result = $this->sql($sql,[$email]);
        $id = $result->fetch();
        return $id[0];

    }


    public function getPrivilege(){
        $sql = 'SELECT * FROM user WHERE privilege = ?';
        $result = $this->sql($sql, ['In Progress']);
        $privileges = [];
        foreach ($result as $row) {
            $userId = $row['id'];
            $privileges[$userId] = $this->buildObject($row);
        }
        return $privileges;
    }

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

    public function getAuthor(){
        $sql = 'SELECT * FROM user WHERE role = ?';
        $result = $this->sql($sql, ['administrator']);
        $author = [];
        foreach ($result as $row) {
            $authorId = $row['id'];
            $author[$authorId] = $this->buildObject($row);
        }
        return $author;
    }


    public function declineUser($id)
    {
        // update privilege a éxécuté

        $sql = 'UPDATE user SET privilege = ? WHERE id = ?';
        $this->sql($sql, ['Done', $id]);
    }
    public function acceptUser($id)
    {
        $sql = 'UPDATE user SET privilege = ? WHERE id = ?';
        $this->sql($sql, ['Done', $id]);
        // set status a admin
        $sql = 'UPDATE user SET role = ? WHERE id = ?';
        $this->sql($sql, ['administrator', $id]);
    }

    public function requestUser($id)
    {
        $sql = 'UPDATE user SET privilege = ? WHERE id = ?';
        $this->sql($sql, ['In Progress', $id]);
    }

    public function adminCount()
    {
        $sql = 'SELECT * FROM user WHERE role = ?';
        $result = $this->sql($sql,['administrator']);

        $admin = [];
        $x = 0;
        foreach ($result as $row) {
            $adminId = $row['id'];
            $admin[$adminId] = $this->buildObject($row);
            $x = $x + 1 ;
        }
        return $x;
    }

    public function adminWaitCount()
    {
        $sql = 'SELECT * FROM user WHERE role = ? AND privilege = ?';
        $result = $this->sql($sql,['member','In progress']);

        $adminWait = [];
        $x = 0;
        foreach ($result as $row) {
            $adminWaitId = $row['id'];
            $adminWait[$adminWaitId] = $this->buildObject($row);
            $x = $x + 1 ;
        }
        return $x;
    }

    private function buildObject(array $row)
    {
        $user = new User();
        $user->setId($row['id']);
        $user->setUsername($row['username']);
        $user->setEmail($row['email']);
        $user->setPassword($row['password']);
        $user->setRole($row['role']);
        $user->setPrivilege($row['privilege']);
        return $user;
    }
}
