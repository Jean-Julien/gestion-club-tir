<?php

namespace Calendrier;

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
        if ($month === null || $month < 1 || $month > 12) {
            $month = intval(date('m'));
        }
        if ($year === null) {
            $year = intval(date('Y'));
        }

        $this->month = $month;
        $this->year = $year;
    }

    /**
     * Undocumented function
     *
     * @return \DateTime
     */
    public function getStartingDay() : \DateTimeInterface
    {
        return new \DateTimeImmutable("{$this->year}-{$this->month}-01");
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
        $end = $start->modify('+1 month -1 day');
        $startWeek = intval($start->format('W'));
        $endWeek = intval($end->format('W'));

        if ($endWeek === 1) {
            $endWeek = intval($end->modify('-7 days')->format('W')) + 1;
        }

        $weeks = $endWeek - $startWeek + 1;

        if ($weeks < 0) {
            $weeks = intval($end->format('W'));
        }

        return $weeks;
    }

    /**
     * Undocumented function
     *
     * @param \DateTimeImmutable $date
     * @return bool
     */    
    public function withinMonth(\DateTimeInterface $date)
    {
        return $this->getStartingDay()->format('Y-m') === $date->format('Y-m');
    }

    /**
     * Renvoie le mois suivant
     * @return Month
     */
    public function nextMonth(): Month
    {
        // test 
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
