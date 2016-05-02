<?php

namespace Hdip\Controller;

use Itb\checkuser;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

use Hdip\CvRepository;

/**
 * Class UserController
 *
 * simple authentication using Silex session object*
 * @package Hdip\Controller
 */
class UserController extends DatabaseTable
{

    // action for POST route:    /processLogin
    public function processLoginAction(Request $request, Application $app)
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $isLoggedIn = false;
        //session logged in
        $isLoggedIn = self::canFindMatchingUsernameAndPassword($username,$password);

        // authenticate!
        if ($isLoggedIn == true) {
            // store username in 'user' in 'session'
            $app['session']->set('user', array('username' => $username) );

            // success - redirect to the secure admin home page
            return $app->redirect('/admin');
        }

        // login page with error message
        // ------------
        $templateName = 'login';
        $argsArray = array(
            'errorMessage' => 'bad username or password - please re-enter'
        );
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    // action for route:    /login
    public function loginAction(Request $request, Application $app)
    {
        // logout any existing user
        $app['session']->set('user', null );

        // build args array
        // ------------
        $argsArray = [];

        // render (draw) template
        // ------------
        $templateName = 'login';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    // action for route:    /logout
    public function logoutAction(Request $request, Application $app)
    {
        // logout any existing user
        $app['session']->set('user', null );

        // redirect to home page
//        return $app->redirect('/');

        // render (draw) template
        // ------------
        $templateName = 'index';
        return $app['twig']->render($templateName . '.html.twig', []);

    }


    ////////////////////////////////////////////////////////
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

        $user = self::getOneByUsername($username);


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
        //$sql = 'SELECT * FROM users WHERE username=:username';
        //$result =mysql_query();
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



}