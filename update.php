<?php

include 'db.php';

$id=$_GET['id'];

$result=$conn->query("select * from courses where id=$id");

$row=$result->fetch_assoc();

if($_SERVER["REQUEST_METHOD"]==="POST"){

    $coursename=$_POST['coursename'];
    $description=$_POST['description'];
    $duration=$_POST['duration'];

    $sql=$conn->prepare("update courses set course_name=?,description=?,duration=? where id=?");

    $sql->bind_param(
        "sssi",
        $coursename,
        $description,
        $duration,
        $id
    );

    if($sql->execute()){
        header("location:view_courses.php");
    }else{
        echo "Data not updated";
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
               <h2 class="text-center">Update Course</h2>

            <form method="POST">

            <div class="mb-3">

            <label class="form-label">Course Name</label>

            <input
            type="text"
            name="coursename"
            class="form-control"
            value="<?php echo $row['course_name']; ?>"
            required
            >

            </div>

            <div class="mb-3">

            <label class="form-label">Description</label>

            <input
            type="text"
            name="description"
            class="form-control"
            value="<?php echo $row['description']; ?>"
            required
            >

            </div>

            <div class="mb-3">

            <label class="form-label">Duration</label>

            <input
            type="text"
            name="duration"
            class="form-control"
            value="<?php echo $row['duration']; ?>"
            required
            >

            </div>

            <button type="submit" class="btn btn-primary">
            Update
            </button>

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
