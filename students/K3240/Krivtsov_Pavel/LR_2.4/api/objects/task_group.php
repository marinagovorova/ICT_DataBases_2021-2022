<?php
class TaskGroup {

    private $conn;
    private $table_name = "task_group";

    public $id;
    public $name;
    public $user_id;

    public function __construct($db){
        $this->conn = $db;
    }

    function read() {

        // выбираем все записи
        $query = "SELECT *
                FROM
                    " . $this->table_name . " tg
                WHERE
                    tg.user_id = ". $this->user_id;


        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    
    function create(){
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    name=:name, user_id=:user_id";

        $stmt = $this->conn->prepare($query);

        // очистка
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));

        // привязка значений
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":user_id", $this->user_id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
    
    function update(){
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    name = :name
                WHERE
                    id = :id";

        $stmt = $this->conn->prepare($query);

        // очистка
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->id=htmlspecialchars(strip_tags($this->id));

        // привязываем значения
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
    
    function delete(){
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        $stmt = $this->conn->prepare($query);

        // очистка
        $this->id=htmlspecialchars(strip_tags($this->id));

        // привязываем id записи для удаления
        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>
