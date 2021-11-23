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
        <div class="mt-2">
            <input type="text" class="form-control w-25" id="pseudo" placeholder="Pseudo">
        </div>

        <div class="mt-2">
            <input type="date" class="form-control w-25" id="reservation">
        </div>

        <div class="mt-2">
            <select class="form-control w-25 mt-2" id="horaire">
                <option value="08:00">08:00 - 08:30</option>
                <option value="08:30">08:30 - 09:00</option>
                <option value="09:00">09:00 - 09:30</option>
                <option value="09:30">09:30 - 10:00</option>
                <option value="10:00">10:00 - 10:30</option>
                <option value="10:30">10:30 - 10:00</option>
                <option value="11:00">11:00 - 11:30</option>
                <option value="11:30">11:30 - 11:00</option>
                <option value="12:00">12:00 - 12:30</option>
                <option value="12:30">12:30 - 12:00</option>
                <option value="13:00">13:00 - 13:30</option>
                <option value="13:30">13:30 - 13:00</option>
                <option value="14:00">14:00 - 14:30</option>
                <option value="14:30">14:30 - 14:00</option>
                <option value="15:00">15:00 - 15:30</option>
                <option value="15:30">15:30 - 15:00</option>
                <option value="16:00">16:00 - 16:30</option>
                <option value="16:30">16:30 - 17:00</option>
                <option value="17:00">17:00 - 17:30</option>
                <option value="17:30">17:30 - 18:00</option>
                <option value="18:00">18:00 - 18:30</option>
                <option value="18:30">18:30 - 19:00</option>
                <option value="19:00">19:00 - 19:30</option>
                <option value="19:30">19:30 - 20:00</option>
                <option value="20:00">20:00 - 20:30</option>
                <option value="20:30">20:30 - 21:00</option>
            </select> 
        </div>

        <div class="mt-2">
            <select class="form-control w-25" id="pastir">
                <option value="1">Pas de tir 1</option>
                <option value="2">Pas de tir 2</option>
                <option value="3">Pas de tir 3</option>
                <option value="4">Pas de tir 4</option>
                <option value="5">Pas de tir 5</option>
                <option value="6">Pas de tir 6</option>
                <option value="7">Pas de tir 7</option>
                <option value="8">Pas de tir 8</option>
                <option value="9">Pas de tir 9</option>
                <option value="10">Pas de tir 10</option>
                <option value="11">Pas de tir 11</option>
                <option value="12">Pas de tir 12</option>
                <option value="13">Pas de tir 13</option>
                <option value="14">Pas de tir 14</option>
                <option value="15">Pas de tir 15</option>
                <option value="16">Pas de tir 16</option>
                <option value="17">Pas de tir 17</option>
                <option value="18">Pas de tir 18</option>
                <option value="19">Pas de tir 19</option>
                <option value="20">Pas de tir 20</option>
            </select>  
        </div>

        <div class="mt-2">
            <button type="submit" class="btn btn-primary">Réserver</button>
        </div>
    </form>
    
</div>
