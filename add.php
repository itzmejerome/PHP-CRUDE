<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "practice";

 $connection = new mysqli($servername, $username, $password, $database);

// connect sa value sa html
$name = "";
$email = "";
$address = "";
$Number = "";


// if empty mag display error message
$errorMessage = "";

// if maka add mag display success mesagge
$successMessage = "";

// sa post form sa html ni pag nay e add 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name =$_POST["name"];
    $email = $_POST["email"];
    $Number =$_POST["Number"];
    $address =$_POST["address"];



    do {

        // error message if empty
        if (empty($name) || empty($email) || empty($Number) || empty($address)) {
            $errorMessage = "All the fields are required";
            break;
        }

        // mag add data sa database

        $sql = "INSERT INTO users(name, email, Number, address)" . 
        " VALUES ('$name', '$email', '$Number', '$address')";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "invalid query:" . $connection->error;
            break;
        }


        // if ma add

        $successMessage = "Added successfully";

        
        


    } while (false);
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
        <h2>Add New People</h2>
        <?php
        if (!empty($errorMessage)){
            echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            ";
        }

        if (!empty($successMessage)){
            echo "
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>$successMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            ";
        }
        ?>

        <form method="post">
         
        
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
    
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Number</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Number" value="<?php echo $Number; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-6">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-danger" onclick="window.location.href='/practice/index.php'">Back</button>
                </div>
                
            </div>

        </form>
       
    </div>
</body>
</html>
