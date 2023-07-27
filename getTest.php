<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Выбери</title>
</head>
<?php
$connect = new mysqli('localhost', 'root', '', 'get_post_test');
$person_id = $_GET['id'];
$person = mysqli_query($connect, "select * from `person` where `person_id` = $person_id");
$person = mysqli_fetch_assoc($person);
$ice_creams = mysqli_query($connect, query: "select * from ice_cream");
$ice_creams = mysqli_fetch_all($ice_creams);

?>
<body>
<div class="container">
    <div class="row">
        <div class="col-3">
            <form action="actions/update.php" method="get">
                <h5><label class="mt-5 mb-2">Обновите данные о себе</label></h5>
                <input type="hidden" name="id" value="<?= $person['person_id'] ?>">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" value="<?= $person['name'] ?>">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="age" value="<?= $person['age'] ?>">
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" name="car" value="<?= $person['car'] ?>">
                </div>
                <h5><label class="mt-5 mb-2">Выберите ваше любимое мороженое</label></h5>
                <select class="form-select mb-2" name="ice_cream" aria-label="Default select example">
                    <?php
                    foreach ($ice_creams as $ice_cream) {
                        ?>
                        <option value="<?= $ice_cream[0] ?>"<?= $person['ice_cream_id'] == $ice_cream[0] ? 'selected' : '' ?>><?= $ice_cream[1] ?></option>
                        <?php
                    }
                    ?>
                </select>
                <button type="submit" class="btn btn-success">Обновить</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>