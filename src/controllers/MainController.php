<?php

namespace Hdip\Controller;

use Itb\CvRepository;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;


class MainController
{
    // action for route:    /
    public function indexAction(Request $request, Application $app)
    {
        // test if 'username' stored in session ...
        $username = getAuthenticatedUserName($app);
        $role = AdminController::adminNavLinks($app);

        $argsArray = array(
            'username' => $username,
            'role' => $role
        );

        // get reference to our repository
        //$cvRepository = new CvRepository();

        // add to args array
        // ------------
        //$argsArray['cv'] = $cvRepository->getAll();

        // render (draw) template
        // ------------
        $templateName = 'index';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    // action for route:    /about
    public function aboutAction(Request $request, Application $app)
    {

        // test if 'username' stored in session ...
        $username = getAuthenticatedUserName($app);
        $role = AdminController::adminNavLinks();

        $argsArray = array(
            'username' => $username,
            'role' => $role
        );

        // render (draw) template
        // ------------
        $templateName = 'about';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }



    public function detailAction(Request $request, Application $app, $id)
    {
        $cvRepository = new CvRepository();
        $cv = $cvRepository->getOneById($id);

        $argsArray = [
            'cv' => $cv,
        ];

        $template = 'detail';
        return $app['twig']->render($template . '.html.twig', $argsArray);
    }




}