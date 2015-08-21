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
        protected function tearDown()
        {
            Stylist::deleteAll();
            //Client::deleteAll();
        }

        function test_getName()
        {
            //Arrange
            $name = "Bob";
            $test_stylist = new Stylist($name);

            //Act
            $result = $test_stylist->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_getId()
        {
            //Arrange
            $name = "Bob";
            $id = 21;
            $test_stylist = new Stylist($name, $id);

            //Act
            $result = $test_stylist->getId();

            //Assert
            $this->assertEquals($id, $result);
        }

        function test_setName()
        {
            //Arrange
            $name = "Bob";
            $new_name = "not bob";
            $test_stylist = new Stylist($name);

            //Act
            $test_stylist->setName($new_name);
            $result = $test_stylist->getName();

            //Assert
            $this->assertEquals($new_name, $result);
        }

        function test_setId()
        {
            //Arrange
            $name = "Bob";
            $id = 21;
            $new_id = 31;
            $test_stylist = new Stylist($name, $id);

            //Act
            $test_stylist->setId($new_id);
            $result = $test_stylist->getId($id);

            //Assert
            $this->assertEquals($new_id, $result);
        }

        function test_save()
        {
            //Arrange
            $name = "Bob";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals($test_stylist, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $name = "Bob";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $name2 = "Alice";
            $test_stylist2 = new Stylist($name);
            $test_stylist2->save();

            //Act
            $result = Stylist ::getAll();

            //Assert
            $this->assertEquals([$test_stylist, $test_stylist2], $result);

        }

        function test_deleteAll()
        {
            //Arrange
            $name = "Bob";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $name2 = "Alice";
            $test_stylist2 = new Stylist($name);
            $test_stylist2->save();

            //Act
            Stylist::deleteAll();
            $result = Stylist ::getAll();

            //Assert
            $this->assertEquals([], $result);

        }

        function test_update()
        {
            //Arrange
            $name = "Bob";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $new_name = "Alice";

            //Act
            $test_stylist->update($new_name);

            //Assert
            $this->assertEquals("Alice", $test_stylist->getName());
        }

        function test_delete()
        {
            //Arrange
            $name = "Bob";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $name2 = "Alice";
            $test_stylist2 = new Stylist($name);
            $test_stylist2->save();

            //Act
            $test_stylist->delete();

            //Assert
            $this->assertEquals([$test_stylist2], Stylist::getAll());
        }

        function test_find()
        {
            //Arrange
            $name = "Bob";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $name2 = "Alice";
            $test_stylist2 = new Stylist($name);
            $test_stylist2->save();

            //Act
            $result = Stylist::find($test_stylist->getId());

            //Assert
            $this->assertEquals($test_stylist, $result);
        }

        function test_getClients()
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

            $name2 = "Bob";
            $phone_number2 = "7777777777";
            $date_added2 = "2011-08-20";
            $test_client2 = new Client($name2, $phone_number2, $date_added2, $stylist_id);
            $test_client2->save();

            //Act
            $result = $test_stylist->getClients();

            //Arrange
            $this->assertEquals([$test_client, $test_client2], $result);

        }

    }


 ?>
