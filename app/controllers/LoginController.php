<?php

namespace App\Controllers;

class LoginController
{
    /**
     * Show autorization form.
     */
    public function index()
    {
        return view('autorization');
    }

    /**
     * Admin autorization
     */
    public function login()
    {
        if ($_POST['login'] === 'admin' && $_POST['password'] === '123') {
            $_SESSION['login'] = 'admin123';
            unset($_SESSION['error']);
            return redirect('');
        }
        $_SESSION['error'] = 'error credentials';
        redirect('autorization');
    }

    /**
     * Admin logout
     */
    public function logout()
    {
        unset($_SESSION['login']);
        unset($_SESSION['error']);
        redirect('');
    }
}
