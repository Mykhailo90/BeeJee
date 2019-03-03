<?php

namespace App\Controllers;

use App\Models\Task;

class TaskController
{
    protected $task;
    /**
     * Clear session from error input
     */
    public function __construct()
    {
        $this->task = new Task();
        unset($_SESSION['error']);
    }

    /**
     * Show the home page.
     */
    public function index()
    {
        $allTasks = $this->task->getAll();

        return view('index', compact('allTasks'));
    }

    /**
     * Show add task page.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Show change task page.
     */
    public function change()
    {
        if(!isset($_SESSION['login']) || $_SESSION['login'] != 'admin123') {
            redirect('page-not-found');
        }
        $task = $this->task->getTask($_GET['id'])[0];

        return view('update', compact('task'));
    }

    /**
     * Store task in DB
     */
    public function store()
    {
        $this->task->addTask($_POST['login'], $_POST['email'], $_POST['text']);

        return redirect('');
    }

    /**
     * Store task in DB
     */
    public function update()
    {
        if(!isset($_SESSION['login']) || $_SESSION['login'] != 'admin123') {
            return redirect('page-not-found');
        }
        $status = (isset($_POST['status'])) ? 1 : 0;
        $this->task->updateTask($_POST['id'], $_POST['text'], $status);

        return redirect('');
    }

    /**
     * Delete task from DB
     */
    public function delete()
    {
        if(!isset($_SESSION['login']) || $_SESSION['login'] != 'admin123') {
            return redirect('page-not-found');
        }
        $this->task->delete($_GET['id']);

        return redirect('');
    }

    /**
     * Show page 404
     */
    public function page404()
    {
        return view('page404');
    }
}
