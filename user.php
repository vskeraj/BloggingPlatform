<?php
require_once 'Database.php';  // Sigurohuni që rruga është e saktë

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();  // Krijo instancën e klasës Database
    }

    public function getUsers() {
        $sql = "SELECT id, first_name, last_name, email, phone, password, role FROM users";  // Kolonat që kërkohen
        $result = $this->db->conn->query($sql);

        if ($result->num_rows > 0) {
            $users = [];
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;  // Shto përdoruesin në array
            }
            return $users;
        } else {
            return [];  // Kthe një array bosh nëse nuk ka përdorues
        }
    }
}
?>


