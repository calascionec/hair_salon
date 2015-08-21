<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */


    require_once "src/Stylist.php";
    //require_once "src/Client.php";

    $server = "mysql:host=localhost;dbname=hair_salon_test";
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class StylistTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        // {
        //     Stylist::deleteAll();
        //     Client::deleteAll();
        // }

        function test_getName()
        {
            //Arrange
            $name = "Bob";
            $test_Stylist = new Stylist($name);

            //Act
            $result = $test_Stylist->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_getId()
        {
            //Arrange
            $name = "Bob";
            $id = 21;
            $test_Stylist = new Stylist($name, $id);

            //Act
            $result = $test_Stylist->getId();

            //Assert
            $this->assertEquals($id, $result);
        }

        function test_setName()
        {
            //Arrange
            $name = "Bob";
            $new_name = "not bob";
            $test_Stylist = new Stylist($name);

            //Act
            $test_Stylist->setName($new_name);
            $result = $test_Stylist->getName();

            //Assert
            $this->assertEquals($new_name, $result);
        }

        function test_setId()
        {
            //Arrange
            $name = "Bob";
            $id = 21;
            $new_id = 31;
            $test_Stylist = new Stylist($name, $id);

            //Act
            $test_Stylist->setId($new_id);
            $result = $test_Stylist->getId($id);

            //Assert
            $this->assertEquals($new_id, $result);
        }

    }


 ?>
