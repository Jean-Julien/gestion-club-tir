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
        </select> 
        <select class="form-control w-25" id="pastir">
            <option value="Pas de tir 1" disabled>Pas de tir 1</option>
            <option value="Pas de tir 2">Pas de tir 2</option>
        </select>  
        <button type="submit" class="btn btn-primary">Réserver</button>
    </form>
    
</div>
