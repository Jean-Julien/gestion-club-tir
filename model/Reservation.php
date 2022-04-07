<?php



class Reservation
{

    private $id;
    private $datetime;
    private $pseudo;
    private $pasTir_id;
    private $user_id;
    private $pasTir_name;
    private $taillePdt_description;


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
     * Get the value of datetime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set the value of datetime
     *
     * @return  self
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get the value of pseudo
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of pasTir_id
     */
    public function getPasTir_id()
    {
        return $this->pasTir_id;
    }

    /**
     * Set the value of pasTir_id
     *
     * @return  self
     */
    public function setPasTir_id($pasTir_id)
    {
        $this->pasTir_id = $pasTir_id;

        return $this;
    }

    /**
     * Get the value of user_id
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of pasTir_name
     */
    public function getPasTir_name()
    {
        return $this->pasTir_name;
    }

    /**
     * Set the value of pasTir_name
     *
     * @return  self
     */
    public function setPasTir_name($pasTir_name)
    {
        $this->pasTir_name = $pasTir_name;

        return $this;
    }

    /**
     * Get the value of taillePdt_description
     */
    public function getTaillePdt_description()
    {
        return $this->taillePdt_description;
    }

    /**
     * Set the value of taillePdt_description
     *
     * @return  self
     */
    public function setTaillePdt_description($taillePdt_description)
    {
        $this->taillePdt_description = $taillePdt_description;

        return $this;
    }
}
