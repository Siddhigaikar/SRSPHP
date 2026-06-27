<?php
include "db.php";
session_start();

if(!isset($_SESSION["user_id"])){
    header("location:login.php");
    exit();
}

$sql=$conn->query("select * from courses");
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
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container">

                <a class="navbar-brand" href="home.php">Course System</a>

                <div class="collapse navbar-collapse">

                    <ul class="navbar-nav me-auto">

                        <li class="nav-item">
                            <a class="nav-link active" href="home.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="insert.php">Add Course</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="view_courses.php">View Courses</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="pdf.php">Export Data</a>
                        </li>

                    </ul>

                    <form action="logout.php" method="post">
                        <button class="btn btn-danger" type="submit">Logout</button>
                    </form>

                </div>
            </div>
        </nav>
        
        </header>
        <main>
            <div
                class="container"
            >
                <h2 class="text-center mb-4">Available Courses</h2>

            <div class="row">

                <?php while($row=$sql->fetch_assoc()){ ?>

                <div class="col-md-4 mb-4">

                    <div class="card shadow">

                        <img src="uploads/<?php echo $row['image']; ?>" class="card-img-top" height="200">

                        <div class="card-body">

                            <h5 class="card-title">
                                <?php echo $row['course_name']; ?>
                            </h5>

                            <p class="card-text">
                                <?php echo $row['description']; ?>
                            </p>

                            <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">
                                Delete
                            </a>

                        </div>

                    </div>

                </div>

                <?php } ?>

            </div>
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
