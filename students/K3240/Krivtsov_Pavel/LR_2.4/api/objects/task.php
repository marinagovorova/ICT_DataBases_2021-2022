<?php
class Task {

    private $conn;
    private $table_name = "task";

    public $id;
    public $name;
    public $description;
    public $is_completed;
    public $task_group_id;
    public $task_group_name;

    public function __construct($db){
        $this->conn = $db;
    }

    function read() {

        // выбираем все записи
        $query = "SELECT
                    tg.name as task_group_name, t.id, t.name, t.description, t.is_completed, t.task_group_id
                FROM
                    " . $this->table_name . " t
                    LEFT JOIN
                        task_group tg
                            ON t.task_group_id = tg.id
                WHERE
                    t.task_group_id = ". $this->task_group_id;


        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    
    function create(){
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    name=:name, description=:description, is_completed=:is_completed, task_group_id=:task_group_id";

        $stmt = $this->conn->prepare($query);

        // очистка
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->is_completed=htmlspecialchars(strip_tags($this->is_completed));
        $this->task_group_id=htmlspecialchars(strip_tags($this->task_group_id));

        // привязка значений
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":is_completed", $this->is_completed);
        $stmt->bindParam(":task_group_id", $this->task_group_id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
    
    function update(){
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    name = :name,
                    description = :description,
                    is_completed = :is_completed
                WHERE
                    id = :id";

        $stmt = $this->conn->prepare($query);

        // очистка
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->is_completed=htmlspecialchars(strip_tags($this->is_completed));
        $this->id=htmlspecialchars(strip_tags($this->id));

        // привязываем значения
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":is_completed", $this->is_completed);
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
