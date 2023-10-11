<?php
class AuthController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Assuming you have already created an instance of UserModel
            $userModel = new UserModel();

            // Call the non-static method on the instance
            $user = $userModel->getUserByEmail($email);
            if ($user && password_verify($password, $user['password'])) {
                // Set user session and redirect to the dashboard
                setcookie('user',   serialize($user), time() + 3600, '/');
                header('Location: app/views/profile.php');

            } else {
                // Invalid login, show an error message
                echo 'Invalid credentials. Please try again.';
            }
        } else {
            // Load the login form view
            include './app/views/login.php';
        }
    }

    public function logout()
    {
        setcookie('user', '', time() + 3600, '/');
        header('Location: index.php?action=login');

    }
}