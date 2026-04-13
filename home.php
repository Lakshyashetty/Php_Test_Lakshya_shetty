<?php
include 'db.php';
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
<nav
    class="navbar navbar-expand-sm navbar-light bg-light"
>
    <div class="container">
        <button
            class="navbar-toggler d-lg-none"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId"
            aria-controls="collapsibleNavId"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="home.php" aria-current="page"
                        >Home
                        <span class="visually-hidden">(current)</span></a
                    >
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dash.php">Add </a>
                </li>
                
            </ul>
            <p>
            Hello <?= isset($_SESSION["uname"]) ? $_SESSION["uname"] : "User"; ?>
</p>
                
<a
    name=""
    id=""
    class="btn btn-primary"
    href="pdf.php"
    role="button"
    >GeneratePdf</a
>

<a
                    name=""
                    id=""
                    class="btn btn-danger"
                    href="logout.php"
                    role="button"
                    >Logout</a
                >
                
            </form>
        </div>
    </div>
</nav>
        </header>
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
                src="https://media.teaching.com.au/uploads/bloo669k/zoom/bloo669k_harry-potter-book-pack_v2_1.webp"
                class="w-100 d-block"
                alt="First slide"
            />
        </div>
        <div class="carousel-item">
            <img
                src="https://assets.penguinrandomhouse.com/wp-content/uploads/2018/10/02143623/PRH_Site_1200x628_pageturner.jpg"
                class="w-100 d-block"
                alt="Second slide"
            />
        </div>
        <div class="carousel-item">
            <img
src=" https://images.squarespace-cdn.com/content/v1/5bb8ae8daf468381c6ce0109/1598935174544-2BM0QB6IBS6C80DEJVQQ/30+Fantasy+Series.png"
            class="w-100 d-block"
                alt="Third slide"
            />
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
