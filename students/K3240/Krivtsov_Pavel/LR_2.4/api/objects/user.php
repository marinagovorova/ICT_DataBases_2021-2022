<?php
class User {

    private $conn;
    private $table_name = "user";

    public $id;
    public $login;
    public $password;

    public function __construct($db){
        $this->conn = $db;
    }

    function read() {
        // выбираем все записи
        $query = "SELECT *
                FROM
                    " . $this->table_name . " u
                WHERE
                    u.login = '$this->login'";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    
    function create(){
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    login=:login, password=:password";

        $stmt = $this->conn->prepare($query);

        // очистка
        $this->login=htmlspecialchars(strip_tags($this->login));
        $this->password=htmlspecialchars(strip_tags($this->password));

        // привязка значений
        $stmt->bindParam(":login", $this->login);
        $stmt->bindParam(":password", $this->password);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>
