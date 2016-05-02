<?php

namespace Hdip\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

use Hdip\Model\DvdRepository;

/**
 * Class AdminController
 *
 * simple authentication using Silex session object
 * $app['session']->set('isAuthenticated', false);
 *
 * but the propert way to do it:
 * https://gist.github.com/brtriver/1740012
 *
 * @package Hdip\Controller
 */
class AdminController extends DatabaseTable
{
    public function isAuthenticated()
    {

    }

    // action for route:    /admin
    // will we allow access to the Admin home?
    public function indexAction(Request $request, Application $app)
    {
        // test if 'username' stored in session ...
        $username = getAuthenticatedUserName($app);

        // check we are authenticated --------
        $isAuthenticated = (null != $username);
        if(!$isAuthenticated){
            // not authenticated, so redirect to LOGIN page
            return $app->redirect('/login');
        }

        // store username into args array
        $argsArray = array(
            'username' => $username
        );

        // render (draw) template
        // ------------
        $templateName = 'admin/index';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    // action for route:    /adminCodes
    // will we allow access to the Admin home?
    public function codesAction(Request $request, Application $app)
    {
        // test if 'username' stored in session ...
        $username = getAuthenticatedUserName($app);

        // check we are authenticated --------
        $isAuthenticated = (null != $username);
        if(!$isAuthenticated){
            // not authenticated, so redirect to LOGIN page
            return $app->redirect('/login');
        }

        // store username into args array
        $argsArray = array(
            'username' => $username
        );

        // render (draw) template
        // ------------
        $templateName = 'admin/codes';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }



    /**
     * Class AdminController
     *
     * update action

     * @package Hdip\Controller
     */
    public function updateAction(Request $request, Application $app)
    {
        // test if 'username' stored in session ...
        $username = getAuthenticatedUserName($app);

        // check we are authenticated --------
        $isAuthenticated = (null != $username);
        if(!$isAuthenticated){
            // not authenticated, so redirect to LOGIN page
            return $app->redirect('/login');
        }

        // store username into args array
        $argsArray = array(
            'username' => $username
        );

        // render (draw) template
        // ------------
        $templateName = 'admin/update';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }



    /**
     * Class AdminController
     *
     * update action

     * @package Hdip\Controller
     */

    /**
     * Class AdminController
     *
     * call admin links

     * @package Hdip\Controller
     */
    public static function adminNavLinks(){
        $student = array("update"=>"/update", "upload photo"=>"/uploadphoto", "comments"=>"/comments", "View Jobs"=>"/viewjobs","Expired Jobs"=>"/expiredjobs" );
        $lecturer = array("Employed"=>"/employed", "Unemployed"=>"/unemployed", "View Cvs"=>"/viewcvs", "comment"=>"/viewjobs","Expired Jobs"=>"/expiredjobs","Delete "=>"/delete","Update"=>"/update","Delete"=>"/delete" );
        $employer = array("Download CVs"=>"/download" );

        $db = new DatabaseManager();
        $connection = $db->getDbh();
        $query = 'SELECT userid FROM users WHERE username=:username';
        $result = mysql_query($query);



        $role = $result;
        return $result;

        $navHTML = null;



        if($result = 2){
            foreach ($student as $nav => $link) {
                echo "<a href=". $link. ">". $nav."</a>"."<br>";
                //return $navHTML .=
            }
        }
        else if($result = 1){
            foreach ($lecturer as $nav => $link) {
                echo "<a href=". $link. ">". $nav."</a>"."<br>";
               // return $navHTML .= "<a href=". $link. ">". $nav."</a>"."<br>";
            }

        }
        else if($result = 3){
            foreach ($employer as $nav => $link) {
                echo "<a href=". $link. ">". $nav."</a>"."<br>";
               // return $navHTML .= "<a href=". $link. ">". $nav."</a>"."<br>";
            }
        };



    }

}