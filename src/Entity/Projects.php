<?php

namespace Giaco\ProjetPoo\Entity;

use DateTime;
use Giaco\ProjetPoo\Entity\Model;


class Projects extends Model{

    private int $id;
    private string $title;
    private string $content;
    private DateTime $created_at;
    private int  $idAdmin;

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
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content): self
    {
        $this->content = $content;

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

    /**
     * Get the value of idAdmin
     */ 
    public function getIdAdmin(): int
    {
        return $this->idAdmin;
    }

    /**
     * Set the value of idAdmin
     *
     * @return  self
     */ 
    public function setIdAdmin($idAdmin): self
    {
        $this->idAdmin = $idAdmin;

        return $this;
    }
}