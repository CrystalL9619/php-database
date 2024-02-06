<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Catalog</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="display-5 mt-4 mb-4">Student Catalog</h1>
            </div>
        </div>
        <div class="row">
            <?php
            $connect = mysqli_connect('localhost', 'root', 'root', 'HTTP5225');
            $query = 'SELECT id, fname, lname, marks, imageURL FROM students';
            $result = mysqli_query($connect, $query);
            if (!$result) {
                die('Query failed: ' . mysqli_error($connect));
            }

            $count = 0;
            while ($student = mysqli_fetch_assoc($result)) {
                if ($count % 3 == 0 && $count != 0) {
                    echo '</div><div class="row">';
                }
                echo '<div class="col-md-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="' . $student['imageURL'] . '" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">' . $student['fname'] . ' ' . $student['lname'] . '</h5>
                                <p class="card-text">Marks: ' . $student['marks'] . '</p>
                            </div>
                        </div>
                    </div>';
                $count++;
            }

            mysqli_free_result($result);
            mysqli_close($connect);
            ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>