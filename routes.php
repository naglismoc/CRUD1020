<?php include "./controllers/ItemController.php"; ?>


<?php



$edit = false;
if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    if(isset($_POST['save'])){
        ItemController::store();
        header("Location: ./index.php");
        die;
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

    if(isset($_POST['edit'])){
        $item = ItemController::show();
        $items = ItemController::index();
        $edit = true;
    }  
}

if($_SERVER['REQUEST_METHOD'] == "GET"){
    
    if(isset($_GET['filter'])){
        $items = ItemController::filter();
    }  
    if(isset($_GET['search'])){
        $items = ItemController::search();
    }  

    if(count($_GET) == 0){
        $items = ItemController::index();
    }
}

$params = ItemController::getfilterParams();

?>