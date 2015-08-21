<?php


    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Client.php";
    require_once "src/Stylist.php";

    $server = 'mysql:host=localhost;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);




    class ClientTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        // {
        //     Stylist::deleteAll();
        //     Client::deleteAll();
        // }

        function test_getName()
        {
            //Arrange
            $name = "Chris";
            $phone_number = "9999999999";
            $date_added = "2015-08-20";
            $stylist_id = 2;
            $test_client = new Client($name, $phone_number, $date_added, $stylist_id);

            //Act
            $result = $test_client->getName();

            //Arrange
            $this->assertEquals($name, $result);
        }

        function test_getPhoneNumber()
        {
            //Arrange
            $name = "Chris";
            $phone_number = "9999999999";
            $date_added = "2015-08-20";
            $stylist_id = 2;
            $test_client = new Client($name, $phone_number, $date_added, $stylist_id);

            //Act
            $result = $test_client->getPhoneNumber();

            //Arrange
            $this->assertEquals($phone_number, $result);
        }

        function test_getDateAdded()
        {
            //Arrange
            $name = "Chris";
            $phone_number = "9999999999";
            $date_added = "2015-08-20";
            $stylist_id = 2;
            $test_client = new Client($name, $phone_number, $date_added, $stylist_id);

            //Act
            $result = $test_client->getDateAdded();

            //Arrange
            $this->assertEquals($date_added, $result);
        }

        function test_getStylistId()
        {
            //Arrange
            $name = "Chris";
            $phone_number = "9999999999";
            $date_added = "2015-08-20";
            $stylist_id = 2;
            $test_client = new Client($name, $phone_number, $date_added, $stylist_id);

            //Act
            $result = $test_client->getStylistId();

            //Arrange
            $this->assertEquals($stylist_id, $result);
        }

        function test_getId()
        {
            //Arrange
            $name = "Chris";
            $phone_number = "9999999999";
            $date_added = "2015-08-20";
            $stylist_id = 2;
            $id = 4;
            $test_client = new Client($name, $phone_number, $date_added, $stylist_id, $id);

            //Act
            $result = $test_client->getId();

            //Arrange
            $this->assertEquals($id, $result);
        }


    }


 ?>
