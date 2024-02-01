<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container my-5"> 
    <h2>List of People</h2>

    <div class="row">
        <div class="col-md-6">
            <a class='btn btn-primary' href="/PRACTICE/add.php" role="button">Add new people</a>
        </div>
        <div class="col-md-6 text-end">
            <form method="POST">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." name="search">
                    <button class="btn btn-primary" type="submit" name="search_btn">Search</button>
                </div>
            </form>
        </div>
    </div>

    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Date Added</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "practice";

            //connect sa database

            $connection = new mysqli($servername, $username, $password, $database);

            // check if mag error

            if ($connection->connect_error) {
                die("Failed" . $connection->connect_error);
            }

            // chechs kung ang value dli null

            if (isset($_POST['search_btn'])) {

                // escape string preventing sql injections
                // magkuha data sa post

                $search = $connection->real_escape_string($_POST['search']);

                // sql function para sa pag search

                $sql = "SELECT * FROM users WHERE name LIKE '%$search%' OR email LIKE '%$search%' OR address LIKE '%$search%' OR Number LIKE '%$search%'";

                // pag wala nag search display tanan data

            } else {
                $sql = "SELECT * FROM users";
            }

            
            $result = $connection->query($sql);

            // checks kng query sakto

            if (!$result) {
                die("Invalid" . $connection->error);
            }

            // Display data sa html tables
            while($row = $result->fetch_assoc()){
                echo "
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[email]</td>
                        <td>$row[address]</td>
                        <td>$row[Number]</td>
                        <td>$row[created_at]</td>
                        <td>
                            <a class='btn btn-warning btn-sm' href='/practice/edit.php?id=$row[id]'>edit</a>
                            <a class='btn btn-danger btn-sm' href='/practice/delete.php?id=$row[id]'>delete</a>
                        </td>
                    </tr>
                ";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
