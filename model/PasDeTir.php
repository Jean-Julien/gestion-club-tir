<?php
    class PasDeTir
    {
        private $data = array();
        
        private $idPasDeTir;
        private $nomPasDeTir;
        private $idTaille;
        private $descriptionPdt;

        /**
         * Get the value of id
         */ 
        public function getId()
        {
            return $this->idPasDeTir;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
            $this->idPasDeTir = $id;

            return $this;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
            return $this->nomPasDeTir;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
            $this->nomPasDeTir = $name;

            return $this;
        }  

        /**
         * Get the value of idTaille
         */ 
        public function getIdTaille()
        {
            return $this->idTaille;
        }

        /**
         * Set the value of idTaille
         *
         * @return  self
         */ 
        public function setIdTaille($idTaille)
        {
            $this->idTaille = $idTaille;

            return $this;
        }


        /**
         * Get the value of descriptionPdt
         */ 
        public function getDescriptionPdt()
        {
            return $this->descriptionPdt;
        }

        /**
         * Set the value of descriptionPdt
         *
         * @return  self
         */ 
        public function setDescriptionPdt($descriptionPdt)
        {
            $this->descriptionPdt = $descriptionPdt;

            return $this;
        }
    }
?>