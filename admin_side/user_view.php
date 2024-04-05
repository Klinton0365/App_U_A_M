<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Users</title>
</head>

<body>
<? include '../backend/Database.class.php'; ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User view
                            <a href="admin_panel.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_GET['Id'])) {
                            $student_id = mysqli_real_escape_string(Database::getConnection(), $_GET['Id']);
                            $query = "SELECT * FROM user_deal WHERE Id='$student_id' ";
                            $query_run = mysqli_query(Database::getConnection(), $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $student = mysqli_fetch_array($query_run);
                        ?>
                                <form action="" method="">
                                    <input type="hidden" name="student_id" value="<?= $student['Id']; ?>">

                                    <div class="mb-3">
                                        <label>User Name</label>
                                        <input type="text" name="name" value="<?= $student['name']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>User Email</label>
                                        <input type="email" name="email" value="<?= $student['email']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>User Phone</label>
                                        <input type="text" name="mobile" value="<?= $student['mobile']; ?>" class="form-control">
                                    </div>

                                </form>
                        <?php
                            } else {
                                echo "<h4>No SUCH I'd found.</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>