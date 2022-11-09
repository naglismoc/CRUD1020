<?php
include "./controllers/ItemController.php";

$edit = false;
if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    if(isset($_POST['save'])){
        ItemController::store();
        header("Location: ./index.php");
        die;
    }    

    if(isset($_POST['edit'])){
    
        $item = ItemController::show();
        $edit = true;
    }  

    if(isset($_POST['update'])){
        
        ItemController::update();
        header("Location: ./index.php");
        die;
    }

    if(isset($_POST['destroy'])){
        ItemController::destroy();
        header("Location: ./index.php");
        die;
    }
}

$items = ItemController::index();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <form action="" method="post" class="col-6 border border-top-0 mt-5">

                <div class="form-group">
                    <label for="f1">Prekės pavadinimas</label>
                    <input type="text" name="title" id="f1" class="form-control" value="<?= ($edit)? $item->title : "" ?>">
                </div>
                <div class="form-group">
                    <label for="f2">Kaina</label>
                    <input type="number" name="price" id="f2" class="form-control"  value="<?= ($edit)? $item->price : "" ?>">
                </div>
                <div class="form-group">
                    <label for="f3">Turimas prekių kiekis sandelyje</label>
                    <input type="number" name="quantity" id="f3" class="form-control"  value="<?= ($edit)? $item->quantity : "" ?>">
                </div>
                <div class="form-group">
                    <label for="f4">Prekės aprašymas</label>
                    <textarea name="description" cols="40" rows="3" id="f4" class="form-control" > <?= ($edit)? $item->description : "" ?> </textarea>
                </div>
                <?php if($edit){ ?>
                    <input type="hidden" name="id" value="<?=$item->id?>">
                    <button type="submit" name="update" class="btn btn-success mt-3 mb-3">Atnaujinti</button>
                <?php } else { ?>
                    <button type="submit" name="save" class="btn btn-primary mt-3 mb-3">Išsaugoti</button>
                <?php } ?>
            </form>
            
            <div class="col-3"></div>
        </div>
        
        <table class="table border-top">
            <thead>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item) { ?>
                <tr>
                        <td> <?=$item->id?> </td>
                        <td> <?=$item->title?> </td>
                        <td> <?=$item->price?> </td>
                        <td> <?=$item->quantity?> </td>

                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id" value=" <?=$item->id?>">
                                <button type="submit" name="edit" class="btn btn-success">edit</button>
                            </form>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id" value=" <?=$item->id?>">
                                <button type="submit" name="destroy" class="btn btn-danger">delete</button>
                            </form>
                        </td>

                </tr>
                <?php  } ?>
            </tbody>
        </table>
</div>
</body>
</html>