<?php

namespace App\Models;

use MF\Model\Model;

class User extends Model
{

    private $id;
    private $name;
    private $mail;
    private $password;

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    
    //salvar
    public function registerUser()
    {

        $query = "INSERT INTO users(name, mail, password)values(:name, :mail, :password)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':name', $this->__get('name'));
        $stmt->bindValue(':mail', $this->__get('mail'));
        $stmt->bindValue(':password', md5($this->__get('password'))); //md5() -> hash 32 caracteres
        $stmt->execute();

        return $this;
    }

    public function getUserByMail()
    {
        $query =  "SELECT name, mail FROM users WHERE mail = :mail";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':mail', $this->__get('mail'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function authenticate()
    {

        $query = "SELECT id, name, mail FROM users WHERE mail = :mail AND password = :password";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':mail', $this->__get('mail'));
        $stmt->bindValue(':password', md5($this->__get('password')));
        $stmt->execute();

        $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!empty($usuario['id']) && !empty($usuario['name'])) {
            $this->__set('id', $usuario['id']);
            $this->__set('name', $usuario['name']);
        }

        return $this;
    }
}
