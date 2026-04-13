
<?php
include 'db.php';
$result=$conn->query("select * from book");
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $title=$_POST["title"];
    $author=$_POST["author"];
    $genre=$_POST["genre"];
    $totalc=$_POST["totalc"];
    $availc=$_POST["availc"];
    $sql=$conn->prepare("insert into book(book_title,author_name,genre,total_copies,available_copies)values (?,?,?,?,?)");
    $sql->bind_param("sssii",$title,$author,$genre,$totalc,$availc);
    if ($sql->execute()) {
        header ("Location:dash.php");
        exit();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
</head>

<body>
    <header>
 <header>
        <nav class="navbar navbar-expand-sm">
            <div class="container">
                <a class="navbar-brand" href="#">Book List</a>

                <button
                    class="navbar-toggler bg-light"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="addcart.php">Add Cart</a>
                        </li>
                    </ul>

                    <p class="welcome-text me-3">
                        Hello <?= isset($_SESSION["uname"]) ? $_SESSION["uname"] : "User"; ?>
                    </p>

                    <div class="d-flex flex-wrap gap-2 top-actions">

                    <a class="btn top-btn btn-pdf" href="pdf.php">Generate PDF</a>
                        <a class="btn top-btn btn-logout" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

</header>
    <main>

        <div class="container">
            <form action="" method="post">
                <div class="page-box">
                    <h2 class="section-title">Book Form & Table</h2>

                    <div class="form-card mb-4">
                        <form action="" method="post">
                            <div class="row g-3">

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="title" id="name"
                                            placeholder="Name" required>
                                        <label for="name">BookTitle</label>
                                    </div>
                                </div>
                                <div col-md-6>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="author" placeholder="Author name"
                                            required>
                                        <label for="name">Author Name</label>

                                    </div>
                                </div>
                                <div col-md-6>
                                    <div class="form-floating">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Gener</label>
                                            <select class="form-control form-select-lg" name="genre" id="">
                                                <option selected>Fantasy</option>
                                                <option value="horror">Horror</option>
                                                <option value="scifi">Sci-Fi</option>
                                                <option value="fiction">Fiction</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div col-md-6>
                                    <div class="form-floating">
                                        <input type="Number" class="form-control" name="totalc" placeholder="" required>
                                        <label for="name">Total Copies</label>

                                    </div>
                                </div>
                                <div col-md-6>
                                    <div class="form-floating">
                                        <input type="number" class="form-control" name="availc"
                                            placeholder="Author name" required>
                                        <label for="name">Available Copies</label>

                                    </div>
                                </div>
                                <div class="col-md-4 mx-auto">
                                    <button type="submit" class="submit-btn btn-primary w-100">Add Books</button>
                                </div>
</div>
                        </form>
                    </div>

                       <div class="table-card">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle text-center">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Book_Title</th>
                                    <th>Author_Name</th>
                                    <th>Genre</th>
                                    <th>Total copies</th>
                                    <th>Available Copies</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?= $row["book_id"] ?></td>
                                        <td><?= $row["book_title"] ?></td>
                                        <td><?= $row["author_name"] ?></td>
                                        <td><?= $row["genre"] ?></td>
                                        <td><?= $row["total_copies"] ?></td>
                                        <td><?= $row["available_copies"] ?></td>
                                        <td>
                                            <a href="edit.php?bookid=<?= $row["book_id"] ?>" class="action-link edit-btn">Edit</a>
                                            <a href="delete.php?bookid=<?= $row["book_id"] ?>" class="action-link delete-btn">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                    </div>
                    

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>