<?php

    class Client
    {

        private $name;
        private $phone_number;
        private $date_added;
        private $stylist_id;
        private $id;


        function __construct($name, $phone_number, $date_added, $stylist_id, $id)
        {

            $this->name = $name;
            $this->phone_number = $phone_number;
            $this->date_added = $date_added;
            $this->stylist_id = $stylist_id;
            $this->id = $id
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


    }

 ?>
