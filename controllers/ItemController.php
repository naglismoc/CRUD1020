<?php
include "./models/Item.php";


class ItemController{

    public static function index()
    {
        $items = Item::all();
        return $items;
    }

    public static function store()
    {        
        
       Item::create();
    }

    public static function show()
    {
        $item = Item::find($_POST['id']);
        return $item;
    }

    public static function update()
    {
       $item = new Item();
       $item->id = $_POST['id'];
       $item->title = $_POST['title'];
       $item->price = $_POST['price'];
       $item->description = $_POST['description'];
       $item->quantity = $_POST['quantity'];
       $item->update();
    }

    public static function destroy()
    {
       Item::destroy($_POST['id']);
    }

    public static function getfilterParams()
    {        
       return Item::getfilterParams();
    }

    public static function filter()
    {        
       return Item::filter();
    }

    public static function search()
    {        
       return Item::search();
    }







}



?>