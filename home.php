<?php
session_start();

if(!isset($_SESSION["user_id"])){
    header("location:login.php");
    exit();
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
                    <style>
            .carousel-caption {
                color: black;
            }
            </style>
                <style>
                .dashboard-header th{
                    color: white;
                    background: linear-gradient(270deg, #ff4e50, #1f1c2c, #24c6dc);
                    background-size: 600% 600%;
                    animation: move 6s ease infinite;
                }

                @keyframes move{
                    0%{
                        background-position: 0% 50%;
                    }
                    50%{
                        background-position: 100% 50%;
                    }
                    100%{
                        background-position: 0% 50%;
                    }
                }


                .course-table{
                    margin-top: 30px;
                }

                .course-table table{
                    width: 100%;
                    border-collapse: collapse;
                    text-align: center;
                }

                .course-table td, .course-table th{
                    padding: 12px;
                    border: 1px solid #ddd;
                }

                /* Hover effect */
                .course-table tbody tr:hover{
                    background-color: #f2f2f2;
                    transition: 0.3s;
                }

                /* Responsive */
                @media(max-width:768px){
                    .course-table table{
                        font-size: 12px;
                    }
                }
                </style>
        </header>
        <br>
        <main>
            <div
                class="container"
            >
                <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li
                            data-bs-target="#carouselId"
                            data-bs-slide-to="0"
                            class="active"
                            aria-current="true"
                            aria-label="First slide"
                        ></li>
                        <li
                            data-bs-target="#carouselId"
                            data-bs-slide-to="1"
                            aria-label="Second slide"
                        ></li>
                        <li
                            data-bs-target="#carouselId"
                            data-bs-slide-to="2"
                            aria-label="Third slide"
                        ></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img
                                src="https://www.psychologicalscience.org/redesign/wp-content/uploads/2011/04/ThinkstockPhotos-504382222-1024x683.jpg"
                                
                                class="w-100 d-block"
                                alt="First slide"
                                height=500
                                width=900
                            />
                            <div class="carousel-caption">
                                <h3>Smart Education System</h3>
                                <p>Technology-driven learning environment</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img
                                src="https://media.licdn.com/dms/image/v2/D5612AQGtf9ZMTF6zQw/article-cover_image-shrink_600_2000/article-cover_image-shrink_600_2000/0/1693141672751?e=2147483647&v=beta&t=Cr_TY-xwxY1FNNwUxRfX2AMdl1M9-8yTUlwl5hB0EWw"
                                class="w-100 d-block"
                                alt="Second slide"
                                height=500
                                width=900
                            />
                            <div class="carousel-caption">
                                <h3>Course Management</h3>
                                <p>Manage and organize educational courses easily</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img
                                src="https://media.istockphoto.com/id/1059510610/vector/it-communication-e-learning-internet-network-as-knowledge-base.jpg?s=612x612&w=0&k=20&c=QEyHx6JnZleLmW9lYgpzvLv765rizr__5zwwKylo300="
                                class="w-100 d-block"
                                alt="Third slide"
                                height=500
                                width=900
                            />
                            <div class="carousel-caption">
                                <h3>Online Learning</h3>
                                <p>Students learning through digital platforms</p>
                            </div>
                        </div>
                    </div>
                    <button
                        class="carousel-control-prev"
                        type="button"
                        data-bs-target="#carouselId"
                        data-bs-slide="prev"
                    >
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button
                        class="carousel-control-next"
                        type="button"
                        data-bs-target="#carouselId"
                        data-bs-slide="next"
                    >
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                
            </div>
            <br> 
            <br>

            <div
                class="container"
            >
                <table class="table table-bordered table-hover text-center">

            <thead class="dashboard-header">
                <tr>
                    <th>ID</th>
                    <th>Course Name</th>
                    <th>Description</th>
                    <th>Duration</th>
                </tr>
            </thead>

                <tbody>

                <?php
                include "db.php";

                $sql = $conn->query("SELECT * FROM courses");

                while($row = $sql->fetch_assoc()){
                ?>

                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['course_name']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['duration']; ?></td>
                </tr>

                <?php } ?>

                </tbody>

        </table>
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
