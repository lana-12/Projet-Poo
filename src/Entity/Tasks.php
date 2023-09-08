<?php

namespace Giaco\ProjetPoo\Entity;

use DateTime;


class Tasks extends Model {

    private int $id;
    private string $title;
    private string $content;
    private string $id_status;
    private string $id_priority;
    private string $id_user;
    private string $id_project;
    private DateTime $created_at;


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
     * Get the value of id_status
     */ 
    public function getId_status(): int 
    {
        return $this->id_status;
    }

    /**
     * Set the value of id_status
     *
     * @return  self
     */ 
    public function setId_status($id_status): self
    {
        $this->id_status = $id_status;

        return $this;
    }

    /**
     * Get the value of id_priority
     */ 
    public function getId_priority(): int 
    {
        return $this->id_priority;
    }

    /**
     * Set the value of id_priority
     *
     * @return  self
     */ 
    public function setId_priority($id_priority): self
    {
        $this->id_priority = $id_priority;

        return $this;
    }

    /**
     * Get the value of id_user
     */ 
    public function getId_user(): int 
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function setId_user($id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of id_project
     */ 
    public function getId_project(): int 
    {
        return $this->id_project;
    }

    /**
     * Set the value of id_project
     *
     * @return  self
     */ 
    public function setId_project($id_project): self
    {
        $this->id_project = $id_project;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at(): DateTime 
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