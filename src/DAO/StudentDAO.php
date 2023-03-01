<?php

namespace App\DAO;

use App\Model\Student;
use App\Config\Database;
use Exception;
use PDO;

class UserDAO {

    public function create(Student $student) {

        try {
            $db = new Database();
            $conn = $db->getConnection();
        } catch (Exception $e) {
        }
    }
}
