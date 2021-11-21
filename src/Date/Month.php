<?php

class Month
{

    public $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

    private $months = [
        'Janvier', 'Février', 'Mars', 'Avril',
        'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
    ];

    public $month;
    public $year;


    /**
     * Undocumented function
     *
     * @param integer $month Le mois compris entre 1 et 12
     * @param integer $year L'année
     * @throws \Exception
     */
    public function __construct(?int $month = null, ?int $year = null) // les ? sont pour annuler le typage si null
    {
        if ($month === null) {
            $month = intval(date('m'));
        }
        if ($year === null) {
            $year = intval(date('Y'));
        }
        if ($month < 1 || $month > 12) {
            throw new \Exception("Le mois n'est pas valide");
        }
        if ($year < 1970) {
            throw new \Exception("L'année est inférieur à 1970");
        } else {
            $this->month = $month;
            $this->year = $year;
        }
    }

    /**
     * Undocumented function
     *
     * @return \DateTime
     */
    public function getStartingDay()
    {
        return new \DateTime("{$this->year}-{$this->month}-01");
    }

    /**
     * Undocumented function
     * Retourne le mois en lettre.
     * @return string
     */
    public function toString()
    {
        return $this->months[$this->month - 1] . ' ' . $this->year;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getWeeks()
    {
        $start = $this->getStartingDay();
        $end = (clone $start)->modify('+1 month -1 day');
        $weeks = intval($end->format('W')) - intval($start->format('W')) + 1;

        if ($weeks < 0) {
            $weeks = intval($end->format('W'));
        }
        return $weeks;
    }

    /**
     * Undocumented function
     *
     * @param \DateTime $date
     * @return bool
     */
    public function withinMonth(\DateTime $date)
    {
        return $this->getStartingDay()->format('Y-m') === $date->format('Y-m');
    }

    /**
     * Renvoie le mois suivant
     * @return Month
     */
    public function nextMonth(): Month
    {
        $month = $this->month + 1;
        $year = $this->year;
        if ($month > 12) {
            $month = 1;
            $year += 1;
        }
        return new Month($month, $year);
    }

    /**
     * Renvoie le mois précédent
     * @return Month
     */
    public function previousMonth(): Month
    {
        $month = $this->month - 1;
        $year = $this->year;
        if ($month < 1) {
            $month = 12;
            $year -= 1;
        }
        return new Month($month, $year);
    }
}
