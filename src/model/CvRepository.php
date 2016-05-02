<?php
namespace Itb;

use Monolog\Logger;
//use Hdip\Model\CvRepository;
class CvRepository
{
    /**
     * Class AdminController
     *
     * gets all the details from cv database

     * @package Hdip\Controller
     */
    public function getAll()
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $statement = $connection->prepare('SELECT * from cv');

        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Itb\\Cv');
        $statement->execute();

        $cv = $statement->fetchAll();

        return $cv;
    }

    /**
     * Class CvRepository
     *
     * gets the details of a person from id

     * @package Hdip\Controller
     */
    public function getOneById($id)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $statement = $connection->prepare('SELECT * from cv WHERE id=:id');
      ;
        $statement->bindParam(':id', $id);
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Itb\\Cv');
        $statement->execute();

        if ($cv = $statement->fetch()) {
            return $cv;
        } else {
            return null;
        }
    }

}