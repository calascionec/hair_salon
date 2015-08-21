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
        protected function tearDown()
        {
            Stylist::deleteAll();
            Client::deleteAll();
        }

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

        function test_setName()
        {
            //Arrange
            $name = "Chris";
            $phone_number = "9999999999";
            $date_added = "2015-08-20";
            $stylist_id = 2;
            $test_client = new Client($name, $phone_number, $date_added, $stylist_id);

            $new_name = "Tom";

            //Act
            $test_client->setName($new_name);
            $result = $test_client->getName();

            //Arrange
            $this->assertEquals($new_name, $result);
        }

        function test_setPhoneNumber()
        {
            //Arrange
            $name = "Chris";
            $phone_number = "9999999999";
            $date_added = "2015-08-20";
            $stylist_id = 2;
            $test_client = new Client($name, $phone_number, $date_added, $stylist_id);

            $new_phone_number = "5555555555";

            //Act
            $test_client->setPhoneNumber($new_phone_number);
            $result = $test_client->getPhoneNumber();

            //Arrange
            $this->assertEquals($new_phone_number, $result);
        }

        function test_setDateAdded()
        {
            //Arrange
            $name = "Chris";
            $phone_number = "9999999999";
            $date_added = "2015-08-20";
            $stylist_id = 2;
            $test_client = new Client($name, $phone_number, $date_added, $stylist_id);

            $new_date_added = "2014-09-01";

            //Act
            $test_client->setDateAdded($new_date_added);
            $result = $test_client->getDateAdded();

            //Arrange
            $this->assertEquals($new_date_added, $result);
        }

        function test_setStylistId()
        {
            //Arrange
            $name = "Chris";
            $phone_number = "9999999999";
            $date_added = "2015-08-20";
            $stylist_id = 2;
            $test_client = new Client($name, $phone_number, $date_added, $stylist_id);

            $new_stylist_id= 3;

            //Act
            $test_client->setStylistId($new_stylist_id);
            $result = $test_client->getStylistId();

            //Arrange
            $this->assertEquals($new_stylist_id, $result);
        }

        function test_setId()
        {
            //Arrange
            $name = "Chris";
            $phone_number = "9999999999";
            $date_added = "2015-08-20";
            $stylist_id = 2;
            $id = 4;
            $test_client = new Client($name, $phone_number, $date_added, $stylist_id, $id);

            $new_id = 1;

            //Act
            $test_client->setId($new_id);
            $result = $test_client->getId();

            //Arrange
            $this->assertEquals($new_id, $result);
        }

        function test_save()
        {
            //Arrange
            $name = "Chris";
            $phone_number = "9999999999";
            $date_added = "2015-08-20";
            $stylist_id = 2;
            $id = 4;
            $test_client = new Client($name, $phone_number, $date_added, $stylist_id, $id);

            //Act
            $test_client->save();

            //Assert
            $result = Client::getAll();
            $this->assertEquals($test_client, $result[0]);

        }

        function test_getAll()
        {
            //Arrange
            $name = "Chris";
            $phone_number = "9999999999";
            $date_added = "2015-08-20";
            $stylist_id = 2;
            $id = 4;
            $test_client = new Client($name, $phone_number, $date_added, $stylist_id, $id);
            $test_client->save();

            $name2 = "Chris";
            $phone_number2 = "9999999999";
            $date_added2 = "2015-08-20";
            $stylist_id2 = 2;
            $id2 = 4;
            $test_client2 = new Client($name2, $phone_number2, $date_added2, $stylist_id2, $id2);
            $test_client2->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $name = "Chris";
            $phone_number = "9999999999";
            $date_added = "2015-08-20";
            $stylist_id = 2;
            $id = 4;
            $test_client = new Client($name, $phone_number, $date_added, $stylist_id, $id);
            $test_client->save();

            $name2 = "Chris";
            $phone_number2 = "9999999999";
            $date_added2 = "2015-08-20";
            $stylist_id2 = 2;
            $id2 = 4;
            $test_client2 = new Client($name2, $phone_number2, $date_added2, $stylist_id2, $id2);
            $test_client2->save();

            //Act
            Client::deleteAll();

            //Assert
            $result = Client::getAll();
            $this->assertEquals([], $result);
        }

        function testUpdateName()
        {
            //Arrange
            $name = "Chris";
            $phone_number = "9999999999";
            $date_added = "2015-08-20";
            $stylist_id = 2;
            $id = 4;
            $test_client = new Client($name, $phone_number, $date_added, $stylist_id, $id);
            $test_client->save();

            $new_name = "Tom";
            $column_update = "name";

            //Act
            $test_client->update($column_update, $new_name);

            //Assert
            $result = Client::getAll();
            $this->assertEquals("Tom", $result[0]->getName());
        }

        function testUpdatePhoneNumber()
        {
            //Arrange
            $name = "Chris";
            $phone_number = "9999999999";
            $date_added = "2015-08-20";
            $stylist_id = 2;
            $id = 4;
            $test_client = new Client($name, $phone_number, $date_added, $stylist_id, $id);
            $test_client->save();

            $new_phone_number = "8888888888";
            $column_update = "phone_number";

            //Act
            $test_client->update($column_update, $new_phone_number);

            //Assert
            $result = Client::getAll();
            $this->assertEquals("8888888888", $result[0]->getPhoneNumber());
        }

        function testUpdateDateAdded()
        {
            //Arrange
            $name = "Chris";
            $phone_number = "9999999999";
            $date_added = "2015-08-20";
            $stylist_id = 2;
            $id = 4;
            $test_client = new Client($name, $phone_number, $date_added, $stylist_id, $id);
            $test_client->save();

            $new_date_added = "2013-01-01";
            $column_update = "date_added";

            //Act
            $test_client->update($column_update, $new_date_added);

            //Assert
            $result = Client::getAll();
            $this->assertEquals("2013-01-01", $result[0]->getDateAdded());
        }

        function testDelete()
        {
            //Arrange
            $name = "Bob";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $stylist_id = $test_stylist->getId();

            $name = "Chris";
            $phone_number = "9999999999";
            $date_added = "2015-08-20";
            $test_client = new Client($name, $phone_number, $date_added, $stylist_id);
            $test_client->save();

            $name2 = "Chris";
            $phone_number2 = "9999999999";
            $date_added2 = "2015-08-20";
            $test_client2 = new Client($name2, $phone_number2, $date_added2, $stylist_id);
            $test_client2->save();

            //Act
            $test_client->delete();

            //Assert
            $this->assertEquals([$test_client2], Client::getAll());
        }



    }


 ?>
