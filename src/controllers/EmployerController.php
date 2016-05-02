<?php

namespace Hdip\Controller;

use Itb\CvRepository;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

//use Hdip\Model\CvRepository;

/**
 * Class AdminController
 *
 * simple authentication using Silex session object
 * $app['session']->set('isAuthenticated', false);
 *

 * @package Hdip\Controller
 */
class EmployerController extends DatabaseTable
{
    public function isAuthenticated()
    {

    }





    /**
     * Class AdminController
     *
     * update action

     * @package Hdip\Controller
     */
    public function employedstudentsAction(Request $request, Application $app)
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
        $templateName = 'admin/employedstudents';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    /**
     * Class AdminController
     *
     * upload photo action

     * @package Hdip\Controller
     */
    public function unemployedstudentsAction(Request $request, Application $app)
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
        $templateName = 'admin/unemployed';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }



    /**
     * Class AdminController
     *
     * view open jobs
     * @package Hdip\Controller
     */
    public function createjobAction(Request $request, Application $app)
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
        $templateName = 'admin/createjob';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    /**
     * Class AdminController
     *
     * view open jobs
     * @package Hdip\Controller
     */
    public function expiredjobsAction(Request $request, Application $app)
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
        $templateName = 'admin/expiredjobs';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * Class AdminController
     *
     * view open jobs
     * @package Hdip\Controller
     */
    public function lectcommentAction(Request $request, Application $app)
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
        $templateName = 'admin/cvcomments';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    /**
     * Class AdminController
     *
     * view open jobs
     * @package Hdip\Controller
     */
    public function deleteAction(Request $request, Application $app)
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
        $templateName = 'admin/delete';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * Class AdminController
     *
     * view open jobs
     * @package Hdip\Controller
     */
    public function viewstudentscvAction(Request $request, Application $app)
    {
        // test if 'username' stored in session ...
        $username = getAuthenticatedUserName($app);

        // check we are authenticated --------
        $isAuthenticated = (null != $username);

        if(!$isAuthenticated){
            // not authenticated, so redirect to LOGIN page
            return $app->redirect('/login');
        }

        $cvRepository = new CvRepository();
        $cv = $cvRepository->getAll();


        // store username into args array
        $argsArray = array(
            'username' => $username,
            'cv' => $cv,
        );

        // render (draw) template
        // ------------
        $templateName = 'admin/viewstudentscv';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    //start employer controller
    public function downloadcvsAction(Request $request, Application $app)
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
        $templateName = 'admin/download';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }


}