<?php

namespace App\Models;

use MF\Model\Model;

class Customer extends Model
{
    private $id;
    private $name;
    private $birth_date;
    private $cpf;
    private $phone;
    private $email;

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }


    //salvar
    public function customerRegistration()
    {
        $query = "INSERT INTO customers(name, birth_date, cpf, phone, email)values(:name, :birth_date, :cpf, :phone, :email)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':name', $this->__get('name'));
        $stmt->bindValue(':birth_date', $this->__get('birth_date'));
        $stmt->bindValue(':cpf', str_replace('-', '', str_replace('.', '', $this->__get('cpf'))));
        $stmt->bindValue(':phone', $this->__get('phone'));
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->execute();

        return $this;
    }

    public function allCustomers()
    {
        $query = "SELECT id, name, birth_date, cpf, phone, email, register_Date FROM customers";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function specificCustomer()
    {
        $query = "SELECT id, name, birth_date, cpf, phone, email, register_Date FROM customers WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function conferenceCPF()
    {
        $query =  "SELECT cpf FROM customers WHERE cpf = :cpf";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':cpf', str_replace('-', '', str_replace('.', '', ($this->__get('cpf')))));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
