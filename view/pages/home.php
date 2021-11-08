<div class="jumbotron">
    <h1>
        Projet analyse : Tiche Ket Team
    </h1>

    <h2>Page d'accueil</h2>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Content</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($params as $content) {
                echo '<tr><td>' . $content->getContent() . ' </td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<div class="container">
    
    <form role="form" action="myaction.php" method="post">
        <input type="date" class="form-control w-25" id="reservation">
        <select class="form-control w-25" id="horaire">
            <option value="horaire1">08:00 - 08:30</option>
            <option value="horaire2" disabled>09:00 - 09:30</option>
            <option value="horaire3" >10:00 - 10:30</option>
            <option value="horaire4" >11:00 - 11:30</option>
            <option value="horaire5" >12:00 - 12:30</option>
            <option value="horaire6" >13:00 - 13:30</option>
            <option value="horaire7" >14:00 - 14:30</option>
            <option value="horaire8" >15:00 - 15:30</option>
            <option value="horaire9" >16:00 - 16:30</option>
        </select> 
        <select class="form-control w-25" id="pastir">
            <option value="Pas de tir 1" disabled>Pas de tir 1</option>
            <option value="Pas de tir 2">Pas de tir 2</option>
            <option value="Pas de tir 3">Pas de tir 3</option>
            <option value="Pas de tir 4">Pas de tir 4</option>
            <option value="Pas de tir 5">Pas de tir 5</option>
            <option value="Pas de tir 6">Pas de tir 6</option>
            <option value="Pas de tir 7">Pas de tir 7</option>
            <option value="Pas de tir 8">Pas de tir 8</option>
            <option value="Pas de tir 9">Pas de tir 9</option>
            <option value="Pas de tir 10">Pas de tir 10</option>
            <option value="Pas de tir 11">Pas de tir 11</option>
            <option value="Pas de tir 12">Pas de tir 12</option>
            <option value="Pas de tir 13">Pas de tir 13</option>
            <option value="Pas de tir 14">Pas de tir 14</option>
            <option value="Pas de tir 15">Pas de tir 15</option>
            <option value="Pas de tir 16">Pas de tir 16</option>
            <option value="Pas de tir 17">Pas de tir 17</option>
            <option value="Pas de tir 18">Pas de tir 18</option>
            <option value="Pas de tir 19">Pas de tir 19</option>
            <option value="Pas de tir 20">Pas de tir 20</option>
        </select>  
        <button type="submit" class="btn btn-primary">Réserver</button>
    </form>
    
</div>
