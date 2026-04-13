
<?php
include 'db.php';
if (isset($_GET["bookid"])) {
    $id=$_GET["bookid"];
    $sql=$conn->prepare("select * from book where book_id=?");
    $sql->bind_param("i",$id);
    $sql->execute();
    $user=$sql->get_result()->fetch_assoc();
}
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $book_id=$_POST["id"];
 $title=$_POST["title"];
    $author=$_POST["author"];
    $genre=$_POST["genre"];
    $totalc=$_POST["totalc"];
    $availc=$_POST["availc"];
    $sql=$conn->prepare("update book set book_title=?, author_name=?,genre=?,total_copies=?,available_copies=? where book_id=?");
    $sql->bind_param("sssiii",$title,$author,$genre,$totalc,$availc,$book_id);
    if ($sql->execute()) {
        header("Location:dash.php");
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
        <!-- place navbar here -->
    </header>
    <main>

        <div class="container col-3 my-5 p-3 border-rounded">
            <form action="" method="post">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="id" id="formId1" placeholder=""
                        value=<?= $user["book_id"] ?> />
                    <label for="formId1">Id</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="title" id="formId1" placeholder=""
                        value=<?= $user["book_title"] ?> />
                    <label for="formId1">Book_Title</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="author" id="formId1" placeholder=""
                        value=<?= $user["author_name"] ?> />
                    <label for="formId1">Author Name</label>
                </div>
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
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="totalc" id="formId1" placeholder=""
                            value=<?= $user["total_copies"] ?> />
                        <label for="formId1">Total Copies</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="availc" id="formId1" placeholder=""
                            value=<?= $user["available_copies"] ?> />
                        <label for="formId1">Available Copies</label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Submit
                    </button>

            </form>
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