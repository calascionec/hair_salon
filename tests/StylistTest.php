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

        function test_save()
        {
            //Arrange
            $name = "Bob";
            $test_Stylist = new Stylist($name);
            $test_Stylist->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals($test_Stylist, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $name = "Bob";
            $test_Stylist = new Stylist($name);
            $test_Stylist->save();

            $name2 = "Alice";
            $test_Stylist2 = new Stylist($name);
            $test_Stylist2->save();

            //Act
            $result = Stylist ::getAll();

            //Assert
            $this->assertEquals([$test_Stylist, $test_Stylist2], $result);

        }

        function test_deleteAll()
        {
            //Arrange
            $name = "Bob";
            $test_Stylist = new Stylist($name);
            $test_Stylist->save();

            $name2 = "Alice";
            $test_Stylist2 = new Stylist($name);
            $test_Stylist2->save();

            //Act
            Stylist::deleteAll();
            $result = Stylist ::getAll();

            //Assert
            $this->assertEquals([], $result);

        }

        function testUpdate()
        {
            //Arrange
            $name = "Bob";
            $test_Stylist = new Stylist($name);
            $test_Stylist->save();

            $new_name = "Alice";

            //Act
            $test_Stylist->update($new_name);

            //Assert
            $this->assertEquals("Alice", $test_Stylist->getName());
        }

        function testDelete()
        {
            //Arrange
            $name = "Bob";
            $test_Stylist = new Stylist($name);
            $test_Stylist->save();

            $name2 = "Alice";
            $test_Stylist2 = new Stylist($name);
            $test_Stylist2->save();

            //Act
            $test_Stylist->delete();

            //Assert
            $this->assertEquals([$test_Stylist2], Stylist::getAll());
        }

    }


 ?>
