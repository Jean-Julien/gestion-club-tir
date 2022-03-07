<?php
include_once 'dbh.php';
class Reservation extends Dbh
{
        
        public function checkR($pas_de_tir,$period)
        {
                

                $conn = $this->connect();
                $pas_de_tir = $_POST['pas_de_tir'];
        
        
                $sql = "SELECT * from reservation where pas_de_tir = ? and (period = ? OR (date(period) = date(?)AND abs(TIME_TO_SEC(timediff(period, ?)))/60 < 30))";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$pas_de_tir, $period, $period, $period]);
                $res = $stmt->fetchAll();
                $nRows = count($res);
                
                return $nRows;
                
                
        }

        public function reserve($pseudo, $pas_de_tir, $period)
        {
                $conn = $this->connect();
                $sql = "INSERT into reservation values(?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$pseudo, $pas_de_tir, $period]);
                echo "you've successfully reserve your a shooting range ";
                
        }




}




