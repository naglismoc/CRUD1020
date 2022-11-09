<?php
include "./models/DB.php";

class Item{
    public $id;
    public $title;
    public $description;
    public $price;
    public $quantity;

    public function __construct($id = null, $title = null, $description = null, $price = null, $quantity = null)
    {
      $this->id = $id;
      $this->title = $title;
      $this->description = $description;
      $this->price = $price;
      $this->quantity = $quantity;
    }


    public static function all(){
        $items = [];
        $db = new DB();
        $query = "SELECT * FROM `items`";
        $result = $db->conn->query($query);

        while($row = $result->fetch_assoc()){
            $items[] = new Item( $row['id'], $row['title'], $row['description'], $row['price'], $row['quantity']);
        }
        $db->conn->close();
        return $items;
    }

    public static function create()
    {
       $db = new DB();
       $stmt = $db->conn->prepare("INSERT INTO `items`( `title`, `price`, `description`, `quantity`) VALUES (?,?,?,?)");
       $stmt->bind_param("sdsi", $_POST['title'], $_POST['price'], $_POST['description'], $_POST['quantity']);
       $stmt->execute();

       $stmt->close();
       $db->conn->close();
    }

    public static function find($id)
    {
        $item = new Item();
        $db = new DB();
        $query = "SELECT * FROM `items` where `id`=". $id;
        $result = $db->conn->query($query);

        while($row = $result->fetch_assoc()){
            $item = new Item( $row['id'], $row['title'], $row['description'], $row['price'], $row['quantity']);
        }
        $db->conn->close();
        return $item;
    }

    public function update()
    {       
        $db = new DB();
        $stmt = $db->conn->prepare("UPDATE `items` SET `title`= ? ,`price`= ? ,`description`= ? ,`quantity`= ? WHERE `id` = ?");
        $stmt->bind_param("sdsii", $_POST['title'], $_POST['price'], $_POST['description'], $_POST['quantity'], $_POST['id']);
        $stmt->execute();
 
        $stmt->close();
        $db->conn->close();
    }

    public static function destroy($id)
    {
        $db = new DB();
        $stmt = $db->conn->prepare("DELETE FROM `items` WHERE `id` = ?");
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();
 
        $stmt->close();
        $db->conn->close(); 
    }
}