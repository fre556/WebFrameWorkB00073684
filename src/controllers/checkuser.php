<?php
namespace Itb;



use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

class checkuser extends DatabaseTable
{
    const ROLE_USER = 1;
    const ROLE_ADMIN = 2;

    private $id;
    private $username;
    private $password;
    private $role;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * hash the password before storing ...
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $this->password = $hashedPassword;
    }

    /**
     * return success (or not) of attempting to find matching username/password in the repo
     * @param $username
     * @param $password
     *
     * @return bool
     */
    public static function canFindMatchingUsernameAndPassword($username, $password)
    {

        $user = User::getOneByUsername($username);

        // if no record has this username, return FALSE
        if($user == null || $password == null){
            return false;
        }


        $hashedStoredPassword = $user->getPassword();

        if($password == $hashedStoredPassword){
            return true;
        }

    }

    /**
     * if record exists with $username, return User object for that record
     * otherwise return 'null'
     *
     * @param $username
     *
     * @return mixed|null
     */
    public static function getOneByUsername($username)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = 'SELECT * FROM users WHERE username=:username';
        $statement = $connection->prepare($sql);
        $statement->bindParam(':username', $username, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
        $statement->execute();

        if ($object = $statement->fetch()) {
            return $object;
        } else {
            return null;
        }
    }



    public static function makerole(){
        /*
        $student = array("update"=>"/update", "upload photo"=>"/uploadphoto", "comments"=>"/comments", "View Jobs"=>"/viewjobs","Expired Jobs"=>"/expiredjobs" );
        $lecturer = array("Employed"=>"/employed", "Unemployed"=>"/unemployed", "View Cvs"=>"/viewcvs", "comment"=>"/viewjobs","Expired Jobs"=>"/expiredjobs","Delete "=>"/delete","Update"=>"/update","Delete"=>"/delete" );
        $employer = array("Download CVs"=>"/download" );
        */

        $db = new DatabaseManager();
        $connection = $db->getDbh();
        $result = 'SELECT userid FROM users WHERE username=:username';
        $result;

        setRole($result);

    }







}