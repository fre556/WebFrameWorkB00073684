<?php

namespace Itb;
use Hdip\Controller\UserController;


class UserControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param $twig
     * @param $expectedResult
     * @dataProvider provideConstructorAndGetterIds
     */

    public  function testloginAction($id, $expectedResult){
        $expectedResult = 'login.html.twig';

         // act
        $result = UserController::loginAction();

        // assert
        $this->assertEquals($expectedResult, $result);
    }



    /**
     * @param $id
     * @param $expectedResult
     * @dataProvider provideConstructorAndGetterIds
     */
    public function testFunctionGetUserName(){
        // arrange
        // $account = new BankAccount(1);
        $user = new UserController();
        $expectedResult = null;

        // act
        //$result = $account->getId();
        $result = $user->getUsername();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @param $username $password
     * @param $expectedResult
     * @dataProvider tests user and password
     */
    public function testcanFindMatchingUsernameAndPassword($username, $password){

        $username='derek';
        $password='password';
        $test = new UserController();
        $expectedResult = true;

        //result
        $result =$test->canFindMatchingUsernameAndPassword($username,$password);

        //assert
        $this->assertEquals($expectedResult,$result);
    }

    /**
     * @param $username $password
     * @param $expectedResult
     * @dataProvider tests password setter
     */
    // arrange
    public function testsetPasseord($password){
        $test = new UserController();
        $password = 'password';
        // act
        $result = $test->setPassword($password);
        $expectedResult = 'password';
        // assert
        $this->assertEquals($expectedResult, $result);

    }


    /**
     * @param $role
     * @param $expectedResult
     * @dataProvider tests role setter
     */
    // arrange
    public function testSetRole($role){
        $test = new UserController();
        $role = 1;

        // act
        $result = $test->setRole($role);
        $expectedResult = 1;
        // assert
        $this->assertEquals($expectedResult, $result);

    }



    /**
     * @param $username
     * @param $expectedResult
     * @dataProvider tests username setter
     */
    // arrange
    public function testSetUsername($username){
        $test = new UserController();
        $username = 'derek';
        // act
        $result = $test->setUsername($username);
        $expectedResult = 'derek';
        // assert
        $this->assertEquals($expectedResult, $result);

    }






}


