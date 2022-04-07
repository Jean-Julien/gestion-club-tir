<?php
    class PasDeTir
    {
        private $data = array();
        
        private $idPasDeTir;
        private $nomPasDeTir;
        private $idTaille;
        private $descriptionPdt;

        public function __get($attribute)
        {
            return $this->data[$attribute];
        }

        public function __set($attribute, $value)
        {
            $this->data[$attribute] = $value;
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