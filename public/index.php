<?php
// autoloader& other functions to include
// ---------------------------------------
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/utility/helperFunctions.php';

//require_once __DIR__. '/../src/controllers/checkuser.php';
// load all our Silex / Twig setup etc.
require_once __DIR__ . '/../app/config.php';

//-------------------------------------------
// map routes to controller class/method
//-------------------------------------------

$app->get('/',      controller('Hdip\Controller', 'main/index'));
$app->get('/about',      controller('Hdip\Controller', 'main/about'));

// ------ SECURE PAGES ----------
$app->get('/admin',  controller('Hdip\Controller', 'admin/index'));
$app->get('/adminCodes',  controller('Hdip\Controller', 'admin/codes'));

// ------ SECURE PAGES  Student Admin ----------
$app->get('/studentupdate',  controller('Hdip\Controller', 'student/studentupdate'));
$app->get('/uploadphoto',  controller('Hdip\Controller', 'student/uploadphoto'));
$app->get('/cvcomments',  controller('Hdip\Controller', 'student/cvcomments'));
$app->get('/openjobs',  controller('Hdip\Controller', 'student/openjobs'));
$app->get('/expiredjobs',  controller('Hdip\Controller', 'student/expiredjobs'));
$app->get('/update',  controller('Hdip\Controller', 'student/studentupdate'));



// ------ SECURE PAGES  lectureer Admin ----------
$app->get('/employedstudents',  controller('Hdip\Controller', 'employer/employedstudents'));
$app->get('/unemployedstudents',  controller('Hdip\Controller', 'employer/unemployedstudents'));
$app->get('/createjob',  controller('Hdip\Controller', 'employer/createjob'));
$app->get('/viewstudentscv',  controller('Hdip\Controller', 'employer/viewstudentscv'));
$app->get('/lectcomment',  controller('Hdip\Controller', 'employer/lectcomment'));
$app->get('/delete',  controller('Hdip\Controller', 'employer/delete'));

//---- SECURE PAGES  employer Admin ----------
$app->get('/downloadcvs',  controller('Hdip\Controller', 'employer/downloadcvs'));

// ------ login routes GET ------------
$app->get('/login',  controller('Hdip\Controller', 'user/login'));
$app->get('/logout',  controller('Hdip\Controller', 'user/logout'));

// ------ login routes POST (process submitted form)     ------------
$app->post('/login',  controller('Hdip\Controller', 'user/processLogin'));


/*
 * $student = array("update"=>"/update", "upload photo"=>"/uploadphoto", "comments"=>"/comments", "View Jobs"=>"/viewjobs","Expired Jobs"=>"/expiredjobs" );
        $lecturer = array("Employed"=>"/employed", "Unemployed"=>"/unemployed", "View Cvs"=>"/viewcvs", "comment"=>"/viewjobs","Expired Jobs"=>"/expiredjobs","Delete "=>"/delete","Update"=>"/update","Delete"=>"/delete" );
        $employer = array("Download CVs"=>"/download" )
 *
 */


// go - process request and decide what to do
//---------------------------------------------

$app->run();
