<?php
    class TaillePdt
    {
           private $id;
           private $description;
           

           /**
            * Get the value of id
            */ 
           public function getIdTaillePdt()
           {
                      return $this->id;
           }

           /**
            * Set the value of id
            *
            * @return  self
            */ 
           public function setIdTaillePdt($id)
           {
                      $this->id = $id;

                      return $this;
           }

           /**
            * Get the value of description
            */ 
           public function getDescription()
           {
                      return $this->description;
           }

           /**
            * Set the value of description
            *
            * @return  self
            */ 
           public function setDescription($description)
           {
                      $this->description = $description;

                      return $this;
           }
    }
