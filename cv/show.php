<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Show Books data</title>
</head>
<body>
    <?php
        // اسم المستخدم وكلمة المرور واسم قاعدة البيانات
        $username = "root"; 
        $password = "";     
        $database = new PDO("mysql:host=localhost;dbname=book;charset=utf8;",$username,$password);

        // استعلام لاسترجاع بيانات الكتب من جدول bookdata
        $addData = $database->prepare("SELECT * FROM bookdata");
        $addData->execute();
    ?>

    <div class="container mt-3">
        <h1 class="text-center">Books data</h1>
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
                    foreach($addData as $result) {
                        echo "<tr>
                                <td>".$result['BookNo']."</td>
                                <td>".$result['BookName']."</td>
                                <td>".$result['AutherName']."</td>
                                <td>".$result['Year']."</td>
                              </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
