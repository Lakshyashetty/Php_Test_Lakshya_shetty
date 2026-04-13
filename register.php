<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $fname=$_POST["fname"];
    $uname=$_POST["uname"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $pass= password_hash($_POST["pass"],PASSWORD_DEFAULT);
    $sql=$conn->prepare("insert into bookregi (fullname,username,email,phone,password) value (?,?,?,?,?)");
    $sql->bind_param("sssss",$fname,$uname,$email,$phone,$pass);
    if ($sql->execute()) {
        header("Location:login.php");
    }
    else {
        echo"Error ";
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
            
            <div
                class="container my-5 p-3 border-rounded shadow   "
            >
<form action="" method="post">
    <h3 class="text-center text-primary">Register Form</h3>
    <div class="form-floating mb-3">
        <input
            type="text"
            class="form-control"
            name="fname"
            id="formId1"
            placeholder=""
            Required
        />
        <label for="formId1">FullName</label>
    </div>
    
    <div class="form-floating mb-3">
        <input
            type="text"
            class="form-control"
            name="uname"
            id="formId1"
            placeholder=""
            Required
        />
        <label for="formId1">UserName</label>
    </div>
    <div class="form-floating mb-3">
        <input
            type="email"
            class="form-control"
            name="email"
            id="formId1"
            placeholder=""
             Required
        />
        <label for="formId1">Email</label>
    </div>
    <div class="form-floating mb-3">
        <input
            type="tel"
            class="form-control"
            name="tel"
            id="formId1"
            placeholder=""
             Required
        />
        <label for="formId1">Phone Number</label>
    </div>
    <div class="form-floating mb-3">
        <input
            type="password"
            class="form-control"
            name="pass"
            id="formId1"
            placeholder=""
             Required
        />
        <label for="formId1">Password</label>
    </div>
    <button
        type="submit"
        class="btn btn-primary w-100"
    >
        Submit
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
