<?php

namespace Giaco\ProjetPoo\Entity;

use PDO;
use DateTime;
use Giaco\ProjetPoo\Entity\Model;

class Users extends Model{

    private int $id;
    private string $name;

    /**
     * Email unique
     * Create constrain in BDD 
     * ALTER TABLE users ADD UNIQUE (email);
     * @var string
     */
    private string $email;
    private string $password;
    private DateTime $created_at;


    /**
     * Verifed if unique e-mail
     *
     * @param [type] $user
     * @param [type] $email
     * @return void
     */
    public static function emailUnique($email)
    {
        return Model::getByEmail($email) ? true : false;
    }

    /**
     * Get the value of id
     */ 
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at(): ?DateTime
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
