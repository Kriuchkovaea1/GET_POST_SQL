<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Выбери</title>
</head>
<?php
require_once 'config/connect.php';
$connect = new mysqli('localhost', 'root', '', 'get_post_test');

?>
<body>
<div class="container">
    <div class="row-mt-10">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Car</th>
                <th scope="col">Ice Cream</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <?php
            $persons = mysqli_query($connect, query: "select * from person");
            $persons = mysqli_fetch_all($persons);
            $ice_creams = mysqli_query($connect, query: "select * from ice_cream");
            $ice_creams = mysqli_fetch_all($ice_creams);
            $animals = mysqli_query($connect, query: "select * from animal");
            $animals = mysqli_fetch_all($animals);
            foreach ($persons as $person) {
                ?>
                <tbody>
                <tr>
                    <th><?= $person[0] ?></th>
                    <td><?= $person[1] ?></td>
                    <td><?= $person[2] ?></td>
                    <td><?= $person[3] ?></td>
                    <?php
                    $ice_cream = mysqli_query($connect, "SELECT name_ice_cream FROM ice_cream LEFT JOIN person 
                                                                ON person.ice_cream_id = ice_cream.ice_cream_id 
                                                                WHERE person.person_id = $person[0]");
                    $ice_cream = mysqli_fetch_assoc($ice_cream);
                    foreach ($ice_cream as $icream) {
                        ?>
                        <td><?= $icream ?></td>
                        <?php
                    }
                    ?>
                    <td><a href="getTest.php?id=<?= $person[0] ?>"><i class="fa-solid fa-pencil"></i></a>
                        <a href="actions/delete.php?id=<?= $person[0] ?>"><i class="fa-solid fa-trash"
                                                                             style="color: #fb2d2d;"></i></a></td>
                </tr>
                </tbody>
                <?php
            }
            ?>
        </table>
        <div class="col-3">
            <form action="actions/add.php" method="post">
                <h5><label class="mt-5 mb-2">Введите данные о себе</label></h5>
                <input type="hidden" name="id" value="<?= $person[0] ?>">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Введите полное имя">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="age" placeholder="Введите возраст">
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" name="car" placeholder="Введите марку машины">
                </div>
                <h5><label class="mt-3 mb-3">Выберите ваше любимое мороженое</label></h5>
                <select class="form-select mb-2" name="ice_cream_id" aria-label="Default select example">
                    <?php
                    foreach ($ice_creams as $ice_cream) {
                        ?>
                        <option value="<?= $ice_cream[0] ?>"><?= $ice_cream[1] ?></option>
                        <?php
                    }
                    ?>
                </select>
        </div>
        <button type="submit" class="btn btn-success">Добавить</button>
        </form>
    </div>
</div>
</div>
<script src="https://kit.fontawesome.com/301751c97e.js" crossorigin="anonymous"></script>
</body>
</html>