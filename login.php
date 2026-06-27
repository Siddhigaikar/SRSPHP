<?php
session_start();
include "db.php";

$error="";

if($_SERVER['REQUEST_METHOD']==="POST"){

    $email=$_POST["email"];
    $password=$_POST["password"];

    $sql=$conn->prepare("SELECT id,name,password FROM users WHERE email=?");
    $sql->bind_param('s',$email);
    $sql->execute();
    $sql->store_result();

    if($sql->num_rows > 0){

        $sql->bind_result($id,$name,$hashed_password);
        $sql->fetch();

        if(password_verify($password,$hashed_password)){
            $_SESSION["user_id"]=$id;
            $_SESSION["name"]=$name;
            header("location:home.php");
            exit();
        } else {
            $error="Invalid Email or Password";
        }

    } else {
        $error="Invalid Email or Password";
    }
}
?>


<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
             <h1 style="text-align:center">LOGIN</h1>
             <div
                class="container text-center border shadow p-4"
             >
                <?php if($error!=""){ ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <?php echo $error; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php } ?>

                <form method="post">

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" required>
                        <label>Email</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" required>
                        <label>Password</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>

                </form>

             </div>
             
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>



