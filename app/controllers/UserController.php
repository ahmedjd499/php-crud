<?php
class UserController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = 'user'; // You can set a default role or implement a role selection mechanism

            // Validate input data (e.g., check for empty fields, valid email format, etc.)

            if ($this->userModel->getUserByEmail($email)) {
                // User with the same email already exists
                echo '<script>alert("User with this email already exists.")</script>'; 

             
            } else {
                // Create a new user
                if ($this->userModel->createUser($email, $password, $role)) {
                    // Registration successful, you can redirect to a success page or login page

                    header('Location: index.php?action=login');


                } else {
                    // Registration failed, show an error message
                    echo '<script>alert("registration failed please try again")</script>'; 
                }
            }
        } else {
            // Load the registration form view
            include './app/views/create.php';

        }
    }


    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle form submission and update the user's profile
            $newEmail = $_POST['new_email'];
            
            $newPassWord = $_POST['new_password'];
      
            if ($this->userModel->getUserByEmail($newEmail)) {
                // User with the same email already exists
                echo '<script>alert("this email is already in use")</script>'; 
            } else {
                // Create a new user
                if ($this->userModel->updateUser( unserialize($_COOKIE['user'])["id"],$newEmail, $newPassWord)) {
                    setcookie('user',   serialize($this->userModel->getUserByEmail($newEmail)), time() + 3600, '/');
                  
                    echo '<script>alert("profile updated successfully")</script>'; 

                     header('Location: app/views/profile.php');

               
                } else {
                    // Registration failed, show an error message
                    echo '<script>alert("failed to update the profile")</script>'; 

                }
            }
            
        } else {
            // Load the edit profile form
            include './app/views/edit.php';
        }
    }


    public function delete($id) {
    

            if ($this->userModel->deleteUser($id)) 
            {
                setcookie('user', '', time() + 3600, '/');
                header('Location: index.php?action=register');
                
            
            } else {
                echo '<script>alert("user deleted successfully")</script>'; 
               
            }
            
      
    }

    public function allUsers() {
        $usersList=$this->userModel->getAllUser();
        // You can then pass the $users data to a view for rendering, or do whatever you need with it.
        // For example, you can print the list of users:
        echo "<table>";
        echo "<tr><th>User ID</th><th>Username</th><th>Email</th></tr>";
    
        // Output data of each row
        foreach ($usersList as $user) {

            echo "<tr>";
            echo "<td>" . $user["id"] . "</td>";
            echo "<td>" . $user["email"] . "</td>";
            echo "<td>" . $user["created_at"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
      
    }
}
