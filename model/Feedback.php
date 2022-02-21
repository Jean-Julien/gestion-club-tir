<?php
    class Feedback
    {
        private $idFeedbcak;
        private $feedback;
        private $created_at;
        private $isRead;
        private $id_user_read;

    function __construct()
    {
        $this->id_user_read = 0;
    }

        /**
         * Get the value of idFeedbcak
         */ 
        public function getIdFeedback()
        {
                return $this->idFeedback;
        }

        /**
         * Set the value of idFeedbcak
         *
         * @return  self
         */ 
        public function setIdFeedback($idFeedback)
        {
                $this->idFeedback = $idFeedback;

                return $this;
        }

        /**
         * Get the value of feedback
         */ 
        public function getFeedback()
        {
                return $this->feedback;
        }

        /**
         * Set the value of feedback
         *
         * @return  self
         */ 
        public function setFeedback($feedback)
        {
                $this->feedback = $feedback;

                return $this;
        }

        /**
         * Get the value of created_at
         */ 
        public function getCreated_at()
        {
                return $this->created_at;
        }

        /**
         * Set the value of created_at
         *
         * @return  self
         */ 
        public function setCreated_at($created_at)
        {
                $this->created_at = $created_at;

                return $this;
        }

        /**
         * Get the value of isRead
         */ 
        public function getIsRead()
        {
                return $this->isRead;
        }

        /**
         * Set the value of isRead
         *
         * @return  self
         */ 
        public function setIsRead($isRead)
        {
                $this->isRead = $isRead;

                return $this;
        }

        /**
         * Get the value of id_user_read
         */ 
        public function getId_user_read()
        {
                return $this->id_user_read;
        }

        /**
         * Set the value of id_user_read
         *
         * @return  self
         */ 
        public function setId_user_read($id_user_read)
        {
                $this->id_user_read = $id_user_read;

                return $this;
        }
    }
?>