<?php

namespace Giaco\ProjetPoo\Entity;

use PDO;
use Giaco\ProjetPoo\Kernel\DataBase;
use Giaco\ProjetPoo\Utils\MyFunction;

class Model  {

    public static $className;

    protected static function getEntityName()
    {
        $classname = static::class;
        $tab = explode('\\', $classname);
        $entity = $tab[count($tab) - 1];
        return $entity;
    }

    protected static function getClassName()
    {
        return static::class;
    }


    protected static function Execute($sql, array $attributes =null)
    {
        $db = DataBase::getInstance();

        if($attributes !==null){
            $query = $db->prepare($sql);
            $query->execute($attributes);
            return $query;
        } else {
            return $db->query($sql);
        }
    }


    public static function getAll(int $limit = null, int $offset = 0)
    {
        // $db = DataBase::getInstance();
        //return par order By Asc
        if(!is_null($limit)) {
            $sql = "select * from " . self::getEntityName() . " ORDER BY name LIMIT $limit OFFSET $offset";
            return self::Execute($sql)->fetchAll(\PDO::FETCH_CLASS, self::getClassName());

        }
        //return all books par ordre alphabétique
        $sql = "select * from " . self::getEntityName() ." ORDER BY name";
        return self::Execute($sql)->fetchAll(\PDO::FETCH_CLASS, self::getClassName());
    }


    public static function getById(int $id)
    {
            $sql = "select * from " . self::getEntityName() . " where id=$id";
            $result =  self::Execute($sql)->fetchAll(PDO::FETCH_CLASS, self::getClassName());
            //Comme fetchAll [0] on récupère le premier élément sinon c'est $result
            return $result[0];

    }

    public static function getByEmail(string $email)
    {
        $sql = "select * from " . self::getEntityName() . " where email = ?";
        $result =  self::Execute($sql, [$email])->fetchAll(PDO::FETCH_CLASS, self::getClassName());
        return $result[0];

    }

    public static function create($data)
    {
        $db = Database::getInstance();
        $sql = "INSERT INTO " . self::getEntityName() . "(title, author, type, description) VALUES (:title, :author, :type, :description)";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':title', $data['title'], PDO::PARAM_STR);
        $stmt->bindParam(':author', $data['author'], PDO::PARAM_STR);
        $stmt->bindParam(':type', $data['type'], PDO::PARAM_STR);
        $stmt->bindParam(':description', $data['description'], PDO::PARAM_STR);

        return $stmt->execute();
    }


    public static function delete(int $id)
    {
        $sql = "delete from " . self::getEntityName() . " where id= ?";
        return self::Execute($sql, [$id]);
    }

    public static function update(int $id, array $data)
    {

        $db = Database::getInstance();
        $sql = "UPDATE " . self::getEntityName() . " SET title= :title, author= :author, type= :type, description = :description WHERE id= :id";
        $stmt = $db->prepare($sql);

        $stmt->bindValue(':title', $data['title'],PDO::PARAM_STR);
        $stmt->bindValue(':author', $data['author'],PDO::PARAM_STR);
        $stmt->bindValue(':type', $data['type'],PDO::PARAM_STR);
        $stmt->bindValue(':description', $data['description'],PDO::PARAM_STR);
        $stmt->bindValue(':id', $id ,PDO::PARAM_STR);

        return $stmt->execute();
    }

    // public static function hydrate($datas)
    // {
    //     foreach ($datas as $key => $value) {
    //         //Récupère le nom du setter correspondant à la clé
    //         //title ->setTitle 
    //         $setter = 'set' . ucfirst($key);

    //         //Verification di le setter existe
    //         if (method_exists($this, $setter)) {
    //             //Appelle le setter
    //             $this->$setter($value);
    //         }
    //     }
    //     return $this;
    // }        
}