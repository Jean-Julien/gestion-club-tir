<?php
    class Blog
    {
        private $id;
        private $title;
        private $content;
        private $image;
        private $datePublish;

        /**
         * Get the value of id
         */ 
        public function getId()
        {
            return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
            $this->id = $id;

            return $this;
        }

        /**
         * Get the value of title
         */ 
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * Set the value of title
         *
         * @return  self
         */ 
        public function setTitle($title)
        {
            $this->title = $title;

            return $this;
        }

        /**
         * Get the value of content
         */ 
        public function getContent()
        {
            return $this->content;
        }

        /**
         * Set the value of content
         *
         * @return  self
         */ 
        public function setContent($content)
        {
            $this->content = $content;

            return $this;
        }

        /**
         * Get the value of image
         */ 
        public function getImage()
        {
            return $this->image;
        }

        /**
         * Set the value of image
         *
         * @return  self
         */ 
        public function setImage($image)
        {
            $this->image = $image;

            return $this;
        }

        /**
         * Get the value of datePublish
         */ 
        public function getDatePublish()
        {
            return $this->datePublish;
        }

        /**
         * Set the value of datePublish
         *
         * @return  self
         */ 
        public function setDatePublish($datePublish)
        {
            $this->datePublish = $datePublish;

            return $this;
        }
    }
?>