<?php
namespace App\Repository;

use App\Models\User;
use PDO;

class UserRepository
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM users');
        $users = [];

        while ($row = $stmt->fetch()) {
            $user = new User();
            $user->id = $row['id'];
            $user->name = $row['name'];
            $user->email = $row['email'];
            $users[] = $user;
        }

        return $users;
    }
}