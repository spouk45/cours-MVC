<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 12/04/18
 * Time: 18:37
 */

namespace Model;


class SocketManager extends AbstractManager
{
    const TABLE = 'socket';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function selectColor(){
        $sql = 'SELECT color FROM socket';
        $statement = $this->pdoConnection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $statement->execute();
        $data=$statement->fetchAll();
        var_dump($data);

        return $data;

    }

    public function insertSocket(string $name, string $color)
    {
        $sql='INSERT INTO socket (name,color) VALUES (:name,:color)';
        $statement = $this->pdoConnection->prepare($sql);
       // $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':color', $color);
        $statement->execute();
    }
}