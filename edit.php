<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "practice";

$connection = new mysqli($servername, $username, $password, $database);

$name = "";
$email = "";
$address = "";
$Number = "";



$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        header("location: /practice/index.php");
        exit;
    }

    $id = $_GET["id"];

    $sql = "SELECT * FROM users WHERE id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: /practice/index.php");
        exit;
    }
} else {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $Number = $_POST["Number"];
    

    if (empty($id) || empty($name) || empty($email) || empty($Number) || empty($address)) {
        $errorMessage = "All the fields are required";
    } else {
        $sql = "UPDATE users SET 
            name = ?, 
            email = ?, 
            Number = ?, 
            address = ? 
            WHERE id = ?";

        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssssi", $name, $email, $Number, $address, $id);
        $result = $stmt->execute();

        if (!$result) {
            $errorMessage = "Invalid" . $stmt->error;
        } else {
            $successMessage = "Updated";
            header("location: /practice/index.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lists</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Edit Information</h2>
        <?php
        if (!empty($errorMessage)) {
            echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            ";
        }

        if (!empty($successMessage)) {
            echo "
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>$successMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            ";
        }
        ?>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Number</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Number" value="<?php echo $row['Number']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>">
                </div>
            </div>
    

            <div class="row mb-3">
        <div class="offset-sm-3 col-sm-6">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
    </div>
</body>
</html>
