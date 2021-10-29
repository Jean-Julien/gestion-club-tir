<div class="jumbotron">
    <h1>
        Projet analyse : Tiche Ket Team
    </h1>

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