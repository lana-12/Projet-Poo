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


    public static function getAll()
    {
            $sql = "select * from " . self::getEntityName();
            MyFunction::dump($sql);
            return self::Execute($sql)->fetchAll(\PDO::FETCH_CLASS, self::getClassName());
    }


    public static function getProjectUser(int $idUser)
    {
            $sql = "select * from " . self::getEntityName() . " where id_user=$idUser" ;
            $result = self::Execute($sql)->fetchAll(\PDO::FETCH_CLASS, self::getClassName());
            return $result;
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

        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO " . self::getEntityName() . " ($columns) VALUES ($placeholders)";
        var_dump($sql);
        return self::Execute($sql, $data);
    }

    public static function delete(int $id)
    {
        $sql = "delete from " . self::getEntityName() . " where id= ?";
        return self::Execute($sql, [$id]);
    }

    //Faire comme la create
    public static function update(int $id, array $data)
    {

        $db = Database::getInstance();
        $sql = "UPDATE " . self::getEntityName() . " SET name= :name, email= :email, password= :password WHERE id= :id";
        $stmt = $db->prepare($sql);

        $stmt->bindValue(':name', $data['name'],PDO::PARAM_STR);
        $stmt->bindValue(':email', $data['email'],PDO::PARAM_STR);
        $stmt->bindValue(':password', $data['password'],PDO::PARAM_STR);
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