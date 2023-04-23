<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <!-- font awesome cdn link  -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    
    <title>Insert Books data</title>
</head>
<body>
    <?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "book";
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

    try {
        $database = new PDO($dsn, $username, $password);
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die();
    }

    if (isset($_POST['send'])) {
        $BookNo = $_POST['BookNo'];
        $BookName = $_POST['BookName'];
        $AutherName = $_POST['AutherName'];
        $Year = $_POST['Year'];

        $addData = $database->prepare("INSERT INTO bookdata(BookNo,BookName,AutherName,Year)
        VALUE(:BookNo,:BookName,:AutherName,:Year)");

        $addData->bindParam(":BookNo", $BookNo);
        $addData->bindParam(":BookName", $BookName);
        $addData->bindParam(":AutherName", $AutherName);
        $addData->bindParam(":Year", $Year);

        if ($addData->execute()) {
            echo '
           <h3> <div class="alert alert-success container mt-3" role="alert">
                تم إرسال البيانات بنجاح 
            </div> </h3>';
        } else {
            echo '
            <div class="alert alert-danger  container mt-3" role="alert">
                فشل في إرسال البيانات 
            </div>';
        }
    }
    ?>

    <form method="POST" class="container mt-5">
      <h3>Book Number:</h3> <input type="number" name="BookNo" required class="form-control" />
        <br>
        <h3>Book Name:</h3> <input type="text" name="BookName" required class="form-control" />
        <br>
        <h3>Auther Name:</h3> <input type="text" name="AutherName" required class="form-control" />
        <br>
        <h3>Year:</h3> <input type="number" name="Year" required class="form-control" />
        <br>
        <button type="submit" name="send" class="btn">Insert Book</button>
    </form>
</body>
</html>
