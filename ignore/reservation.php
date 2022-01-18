
<?php include_once "fmh.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>reservation</title>
</head>
<body>
<?php 
   $reservation = new Reservation();
   $chk;
  if(isset($_POST["submit"])){
          $chk = $reservation->checkR($_POST["pas_de_tir"],$_POST["period"]);

          if(!$chk){  
                  $reservation->reserve($_POST["pseudo"],$_POST["pas_de_tir"],$_POST["period"]);
          }
          else {
                 echo "sorry you can't reserve this shooting range for the selected date and time";
          }  

  }
  ?>
       
        <form action="reservation.php" method="post">
            <p><input type="text" name="pseudo"></p>
            <p><input type="datetime-local" name="period"></p>
            <p><select name="pas_de_tir">
                    <option value="1">pt1</option>
                    <option value="2">pt2</option>
                    <option value="3">pt3</option>
            </select></p>
            <p><input type="submit" name="submit" value="submit"></p>
        </form>

        <?php 
        
        ?>
</body>
</html>