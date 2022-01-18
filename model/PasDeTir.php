<?php
    class PasDeTir
    {
        private $data = array();
        
        private $idPasDeTir;
        private $nomPasDeTir;

        public function __get($attribute)
        {
            return $this->data[$attribute];
        }

        public function __set($attribute, $value)
        {
            $this->data[$attribute] = $value;
        }   
    }
?>