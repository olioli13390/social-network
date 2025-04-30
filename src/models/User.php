<?php

class User extends UserRepositorie
{
    private $id;
    private $FirstName;
    private $LastName;
    private $email;
    private $password;

    public function __construct($id, $FirstName, $LastName, $email, $password)
    {
        $this->setId($id);
        $this->setNom($FirstName);
        $this->setPrenom($LastName);
        $this->setEmail($email);
        $this->setPassword($password);
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getNom()
    {
        return $this->FirstName;
    }
    public function setNom($FirstName)
    {
        $this->FirstName = $FirstName;
    }
    public function getPrenom()
    {
        return $this->LastName;
    }
    public function setPrenom($LastName)
    {
        $this->LastName = $LastName;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
}
