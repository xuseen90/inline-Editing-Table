<?php include('connection.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inline Editing Table </title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <script src="jquery/jquery.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="title text-center mt-3">inline Editing Table</h1>
        <br>
        <br>
        <br>
        <br>

        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FristName</th>
                    <th>LastName</th>
                    <th>Tell</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $query = "SELECT * FROM empoloyee";
                $result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $id = $row['id'];
                    $FristName = $row['FristName'];
                    $LastName = $row['LastName'];
                    $Tell = $row['Tell'];
                ?>
                    <tr>
                        <td> <?php echo $id ?></td>
                        <td contenteditable="true" onblur="updateValue(this ,'FristName','<?php echo $id ?>')"> <?php echo $FristName ?></td>
                        <td contenteditable="true" onblur="updateValue(this ,'lastName','<?php echo $id ?>')"> <?php echo $LastName ?></td>
                        <td contenteditable="true" onblur="updateValue(this ,'tell','<?php echo $id ?>')"> <?php echo $Tell ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<script>
    function updateValue(element, column, id) {
        var value = element.innerText

        $.ajax({
            url: 'updateValue.php',
            type: 'post',
            data: {
                value: value,
                column: column,
                id: id
            },
            success: function(data) {
                console.log(data);
            }
        })
    }
</script>