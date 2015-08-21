<?php

    class Client
    {

        private $name;
        private $phone_number;
        private $date_added;
        private $stylist_id;
        private $id;


        function __construct($name, $phone_number, $date_added, $stylist_id, $id = null)
        {

            $this->name = $name;
            $this->phone_number = $phone_number;
            $this->date_added = $date_added;
            $this->stylist_id = $stylist_id;
            $this->id = $id;
        }

        function getName()
        {
            return $this->name;
        }

        function getPhoneNumber()
        {
            return $this->phone_number;
        }

        function getDateAdded()
        {
            return $this->date_added;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }

        function getId()
        {
            return $this->id;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function setPhoneNumber($new_phone_number)
        {
            $this->phone_number = $new_phone_number;
        }

        function setDateAdded($new_date_added)
        {
            $this->date_added = $new_date_added;
        }

        function setStylistId($new_stylist_id)
        {
            $this->stylist_id = $new_stylist_id;
        }

        function setId($new_id)
        {
            $this->id = $new_id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO clients (name, phone_number, date_added, stylist_id) VALUES ('{$this->getName()}', {$this->getPhoneNumber()}, '{$this->getDateAdded()}', {$this->getStylistId()});");
            $result_id = $GLOBALS['DB']->lastInsertId();
            $this->setId($result_id);
        }

        function update($column_update, $new_info)
        {
            $GLOBALS['DB']->exec("UPDATE clients SET {$column_update} = '{$new_info}' WHERE id = {$this->getId()};");
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients WHERE id = {$this->getId()};");
        }


        //Static functions

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = array();
            foreach($returned_clients as $client) {
                $name = $client['name'];
                $phone_number = $client['phone_number'];
                $date_added = $client['date_added'];
                $stylist_id = $client['stylist_id'];
                $id = $client['id'];
                $new_client = new Client($name, $phone_number, $date_added, $stylist_id, $id);
                array_push($clients, $new_client);
            }
            return $clients;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients;");
        }


    }

 ?>
