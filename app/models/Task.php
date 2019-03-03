<?php

namespace App\Models;

use App\Core\App;

class Task
{
    protected $db;

    public function __construct()
    {
        $this->db = App::get('database');
    }

    public function addTask($name, $email, $text)
    {
        $this->db->insert('tasks', [
            'user_name' => $name,
            'email' => $email,
            'text' => $text,
        ]);
    }

    public function getAll()
    {
        return $this->db->selectAll('tasks');
    }

    public function getTask($id)
    {
        return $this->db->selectOne('tasks', 'id', $id);
    }

    public function updateTask($id, $text, $status)
    {
        $this->db->update('tasks', $id, ['text' => $text, 'status' => $status]);
    }

    public function delete($id)
    {
        $this->db->delete('tasks', $id);
    }
}