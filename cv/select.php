<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Select Book Data</title>
</head>
<body>

<?php
$username = "root"; 
$password = "";     
$database = new PDO("mysql:host=localhost;dbname=book;charset=utf8;",$username,$password);

$auther_name = "Ali Ahmad";
$addData = $database->prepare("SELECT * FROM bookdata WHERE AutherName = :auther_name");
$addData->bindParam(":auther_name", $auther_name);
$addData->execute();

$result = $addData->fetchAll(PDO::FETCH_ASSOC);


?>

<div class="container mt-3">
        <h1 class="text-center">Select Books data</h1>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>BookNo</th>
                    <th>BookName</th>
                    <th>AutherName</th>
                    <th>Year</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // عرض البيانات المسترجعة في صفوف الجدول
                    foreach($result as $row){
                        echo "<tr>
                                <td>".$row['BookNo']."</td>
                                <td>".$row['BookName']."</td>
                                <td>".$row['AutherName']."</td>
                                <td>".$row['Year']."</td>
                              </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>






