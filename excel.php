<?php

include 'db.php';
$result=$conn->query("select * from employee");
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $name=$_POST["name"];
    $age=$_POST["age"];
    $sal=$_POST["sal"];
    $email=$_POST["email"];
    $years=$_POST["years"];
    $sql=$conn->prepare("insert into employee(name,age,salary,email,years_of_experience)values (?,?,?,?,?)");
    $sql->bind_param("sidsi",$name,$age,$sal,$email,$years);
    if ($sql->execute()) {
        header ("Location:addcart.php");
        exit();
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Employee Dashboard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: "Segoe UI", sans-serif;
            background: linear-gradient(-45deg, #0f2027, #203a43, #2c5364, #5f2c82, #49a09d, #ff6a88);
            background-size: 400% 400%;
            animation: bodyMove 12s ease infinite;
            position: relative;
        }

        @keyframes bodyMove {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .navbar {
            background: rgba(255, 255, 255, 0.10) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.18);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .navbar-brand,
        .nav-link,
        .welcome-text {
            color: #ffffff !important;
            font-weight: 600;
        }

        .nav-link:hover {
            color: #ffe082 !important;
        }

        .page-box {
            margin-top: 40px;
            margin-bottom: 40px;
            padding: 25px;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.18);
            animation: fadeUp 0.8s ease;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section-title {
            color: #ffffff;
            font-weight: 700;
            text-align: center;
            margin-bottom: 25px;
            letter-spacing: 0.5px;
        }

        .form-card {
            padding: 25px;
            border-radius: 22px;
            background: rgba(255, 255, 255, 0.14);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.16);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }

        .form-floating > .form-control {
            border-radius: 14px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            background: rgba(255, 255, 255, 0.18);
            color: #fff;
        }

        .form-floating > .form-control:focus {
            background: rgba(255, 255, 255, 0.22);
            color: #fff;
            border-color: #80d8ff;
            box-shadow: 0 0 0 0.2rem rgba(128, 216, 255, 0.18);
        }

        .form-floating > label {
            color: rgba(255, 255, 255, 0.82);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .top-btn,
        .submit-btn,
        .action-link {
            border: none;
            border-radius: 12px;
            font-weight: 600;
            transition: 0.35s ease;
        }

        .top-btn:hover,
        .submit-btn:hover,
        .action-link:hover {
            transform: translateY(-2px) scale(1.03);
        }

        .btn-excel {
            background: linear-gradient(135deg, #00c853, #43a047);
            color: white !important;
        }

        .btn-pdf {
            background: linear-gradient(135deg, #2979ff, #1565c0);
            color: white !important;
        }

        .btn-logout {
            background: linear-gradient(135deg, #ff5f6d, #d32f2f);
            color: white !important;
        }

        .submit-btn {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: white;
            padding: 12px;
            width: 100%;
        }

        .table-card {
            margin-top: 30px;
            padding: 20px;
            border-radius: 22px;
            background: rgba(255, 255, 255, 0.14);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.16);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }

        .table {
            overflow: hidden;
            border-radius: 18px;
            margin-bottom: 0;
        }

        .table thead th {
            background: linear-gradient(135deg, #141e30, #243b55);
            color: #fff;
            border: none;
            padding: 14px;
            font-size: 15px;
        }

        .table tbody tr {
            transition: 0.35s ease;
        }

        .table tbody tr:nth-child(odd) {
            background: rgba(255, 255, 255, 0.12);
        }

        .table tbody tr:nth-child(even) {
            background: rgba(255, 255, 255, 0.20);
        }

        .table tbody tr:hover {
            background: rgba(255, 255, 255, 0.28);
            transform: scale(1.01);
        }

        .table tbody td {
            color: black;
            border-color: rgba(255, 255, 255, 0.12);
            padding: 14px 10px;
            transition: 0.35s ease;
        }

        .table tbody td:hover {
            background: rgba(255, 255, 255, 0.22);
            color: #ffe082;
            transform: translateY(-2px) scale(1.02);
            font-weight:bold;
        }

        .action-link {
            text-decoration: none;
            padding: 7px 14px;
            display: inline-block;
            margin: 2px;
            color: #fff;
        }

        .edit-btn {
            background: linear-gradient(135deg, #ffb300, #fb8c00);
        }

        .delete-btn {
            background: linear-gradient(135deg, #ff4b91, #c2185b);
        }

        .welcome-text {
            margin-bottom: 0;
        }

        @media (max-width: 768px) {
            .page-box {
                padding: 15px;
            }

            .form-card,
            .table-card {
                padding: 15px;
            }

            .top-actions {
                margin-top: 15px;
                gap: 10px;
            }
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm">
            <div class="container">
                <a class="navbar-brand" href="#">Employee List</a>

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
                        <a class="btn top-btn btn-excel" href="excel.php">Generate Excel</a>
                        <a class="btn top-btn btn-pdf" href="pdf.php">Generate PDF</a>
                        <a class="btn top-btn btn-logout" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <div class="page-box">
                <h2 class="section-title">Employee Form & Table</h2>

                <div class="form-card mb-4">
                    <form action="" method="post">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                                    <label for="name">Name</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="age" id="age" placeholder="Age" required>
                                    <label for="age">Age</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" step="0.01" class="form-control" name="sal" id="salary" placeholder="Salary" required>
                                    <label for="salary">Salary</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="years" id="years" placeholder="Years of experience" required>
                                    <label for="years">Years of Experience</label>
                                </div>
                            </div>

                            <div class="col-md-4 mx-auto">
                                <button type="submit" class="submit-btn">Add Employee</button>
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
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Salary</th>
                                    <th>Email</th>
                                    <th>Years Of Experience</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?= $row["id"] ?></td>
                                        <td><?= $row["name"] ?></td>
                                        <td><?= $row["age"] ?></td>
                                        <td><?= $row["salary"] ?></td>
                                        <td><?= $row["email"] ?></td>
                                        <td><?= $row["years_of_experience"] ?></td>
                                        <td>
                                            <a href="edit.php?id=<?= $row["id"] ?>" class="action-link edit-btn">Edit</a>
                                            <a href="delete.php?id=<?= $row["id"] ?>" class="action-link delete-btn">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>