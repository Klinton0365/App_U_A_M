<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Users</title>
</head>
<body>
    
<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}

// Include Database class
include '../backend/Database.class.php';

// Fetch submitted data from the database
// $conn = Database::getConnection();
// $sql = "SELECT * FROM user_deal";
// $result = $conn->query($sql);
?>

<div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User Records
                        <a href="logout.php" class="btn btn-danger float-end">Logout</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM user_deal";
                                $query_run = mysqli_query(Database::getConnection(), $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $student) {
                                ?>
                                        <tr>
                                            <td><?= $student['Id']; ?></td>
                                            <td><?= $student['name']; ?></td>
                                            <td><?= $student['mobile']; ?></td>
                                            <td><?= $student['email']; ?></td>
                                            <td>
                                                <a href="user_view.php?Id=<?= $student['Id']; ?>" class="btn btn-info btn-sm">View</a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<h5> No Record Found </h5>";
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?
// Close connection
$conn->close();
?>
</body>