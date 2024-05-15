<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <!-- ✘ボタン -->
        <div class="row justify-content-end">
            <div class="col-12 col-md-2">
                <div class="row">
                    <br>
                    <a href="top.php">
                        <button type="submit" class="btn btn-outline-dark userinfoButton">×
                        </button>
                    </a>
                </div>
            </div>
        </div>
 <?php
        echo '<h2 class="text-center mt-5">○○さんからもらった返事</h2>';

       
        
        echo '<form action="Binkaisyu-output.php" method="post">';
        echo '<div class="row justify-content-center mt-5">';
        echo '<div class="col-6">';

        echo '<p>"返事の内容"</p>';

        echo '</div>';
        echo '</div>';

        echo '<br><br>';

        echo '<div class="row justify-content-center">';
        echo '<div class="text-center col-6">';
        echo '<button type="submit" class="btn btn-outline-dark userinfoButton">瓶を回収';
        echo '</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';


        echo '</div>';
        ?>
</body>
</html>
