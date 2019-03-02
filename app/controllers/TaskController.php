<?php

namespace App\Controllers;

use App\Core\Database\QueryBuilder;

class TaskController
{
    /**
     * Clear session from error input
     */
    public function __construct()
    {
        unset($_SESSION['error']);
    }

    /**
     * Show the home page.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show add task page.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Strore task in DB
     */
    public function store()
    {

        return redirect('/');
    }
}
