<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <?php
                    if (!empty($_SESSION['error'])) {
                        echo "<div class='alert alert-danger' role='alert'>" . $_SESSION['error'] . "</div>";
                    }
                ?>

                <form accept="" class="shadow p-4" method="POST" action="index.php?r=connect">
                    <div class="mb-3">
                        <h3>Login</h3>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    
                    <label class="mb-3">
                        <input class="form-check-input" type="checkbox" name="RememberMe"> Remember Me
                    </label>

                    <a href="#" class="float-end text-decoration-none">Reset Password</a>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>

                    <hr>

                    <p class="text-center mb-0">If you don't have an account, <a href="#">register now</a>.</p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
unset($_SESSION['error']);
?>