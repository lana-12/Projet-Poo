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
            // MyFunction::dump($sql);
            return self::Execute($sql)->fetchAll(\PDO::FETCH_CLASS, self::getClassName());
    }


/**
 * Request for get all projects by User
 *
 * @param integer $idUser
 * @return void
 */
    public static function getProjectUser(int $idUser)
    {
            $sql = "select * from " . self::getEntityName() . " where id_user=$idUser" ;
            $result = self::Execute($sql)->fetchAll(\PDO::FETCH_CLASS, self::getClassName());
            return $result;
    }

    public static function getTaskUser(int $idUser)
    {
        $sql = "select * from " . self::getEntityName() . " where id_user=$idUser";
        $result = self::Execute($sql)->fetchAll(\PDO::FETCH_CLASS, self::getClassName());
        return $result;
    }

    /**
     * Request for get all tasks by project
     *
     * @param integer $idProjet
     * @return void
     */
    public static function getProjectTask(int $idProjet)
    {
            // $sql = "select * from " . self::getEntityName() . " where id_project=$idProjet" ;
            $sql = "
                SELECT *, tasks.id, status.name, priority.name As name_prio , users.name As name_user 
                from tasks, status, priority, users
                WHERE tasks.id_project = $idProjet
                AND tasks.id = tasks.id 
                AND tasks.id_status = status.id
                AND tasks.id_priority = priority.id
                AND tasks.id_user = users.id
                " ;
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


    public static function getByIdTask(int $id)
    {
        $sql = "
            SELECT *, tasks.id, status.name, priority.name As name_prio , users.name As name_user 
            from tasks, status, priority, users
            WHERE tasks.id = $id 
            AND tasks.id = tasks.id
            AND tasks.id_status = status.id
            AND tasks.id_priority = priority.id
            AND tasks.id_user = users.id";
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


    public static function getIdByName($name)
    {
        $sql = "SELECT id FROM " . self::getEntityName() . " WHERE name = ? ";
        $result =  self::Execute($sql, [$name])->fetchAll(PDO::FETCH_CLASS, self::getClassName());
        return $result[0];
    }

    public static function create($data)
    {

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


    public static function update($id, $data)
    {
        $setClause = '';
        $params = [];

        foreach ($data as $key => $value) {
            $setClause .= $key . ' = :' . $key . ', ';
            $params[':' . $key] = $value;
        }

        // Supprimez la virgule finale et ajoutez la condition WHERE
        $setClause = rtrim($setClause, ', ');

        $params[':id'] = $id;

        $sql = "UPDATE " . self::getEntityName() . " SET $setClause WHERE id = :id";
MyFunction::dump($sql);
        return self::Execute($sql, $params);
    }



    //////////////////////////////////////////
    /////////////////////////////////////////
    // First test for get statusName, userName and PriorityName but Inconclusive
    /**
     * Request for get NameStatus by task
     *
     * @param integer $id_status
     */
    public static function getNameStatus(int $id_status)
    {
        $sql = "SELECT DISTINCT tasks.id_status, status.name 
            FROM tasks 
            INNER JOIN status ON tasks.id_status = status.id 
            WHERE tasks.id_status = $id_status";
        // MyFunction::dump($sql);
        $result = self::Execute($sql)->fetchAll(\PDO::FETCH_CLASS, self::getClassName());
        // if ($result) {
        //     return $result['name'];
        // } else {
        //     return null; 
        // }
        return $result;
    }

    /**
     * Request for get NamePriority by task
     *
     * @param integer $id_priority
     */
    public static function getNamePriority(int $id_priority)
    {
        $sql = "SELECT DISTINCT  tasks.id_priority, priority.name 
            FROM tasks 
            INNER JOIN priority ON tasks.id_priority = priority.id 
            WHERE tasks.id_priority = $id_priority";
        $result = self::Execute($sql)->fetchAll(\PDO::FETCH_CLASS, self::getClassName());
        // if ($result) {
        //     return $result['name'];
        // } else {
        //     return null; 
        // }
        return $result;
    }

    /**
     * Request for get NameUser by task
     *
     * @param integer $id_user
     */
    public static function getNameUser(int $id_user)
    {
        $sql = "SELECT DISTINCT  tasks.id_user, users.name 
            FROM tasks 
            INNER JOIN users ON tasks.id_user = users.id 
            WHERE tasks.id_user = $id_user";
        $result = self::Execute($sql)->fetchAll(\PDO::FETCH_CLASS, self::getClassName());
        // if ($result) {
        //     return $result['name'];
        // } else {
        //     return null; 
        // }
        return $result;
    }
}