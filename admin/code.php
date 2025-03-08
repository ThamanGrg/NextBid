<?php
require '../php/function.php';
require '../php/db_connection.php'; // Ensure the database connection is included

if (isset($_POST['saveUsers'])) {
    global $conn; 

    $username = validate($_POST['username']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $is_ban = isset($_POST['is_ban']) ? (int) $_POST['is_ban'] : 0; 
    $role = isset($_POST['role']) ? 1 : 0;

    // Check for required fields
    if (!empty($username) && !empty($email) && !empty($phone) && !empty($password)) {

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            redirect('users-create.php', 'Invalid email format');
            exit;
        }

        // Hash the password securely
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Prepare SQL Query
        $query = "INSERT INTO users (username, email, password, phone, is_ban, role) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssii", $username, $email, $hashed_password, $phone, $is_ban, $role);
            $result = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            if ($result) {
                redirect('users.php', 'User/Admin Added Successfully');
            } else {
                error_log("MySQL Error: " . mysqli_error($conn));
                redirect('users-create.php', 'Something went wrong, please try again');
            }
        } else {
            error_log("MySQL Statement Preparation Error: " . mysqli_error($conn));
            redirect('users-create.php', 'Database error: Failed to prepare statement');
        }
    } else {
        redirect('users-create.php', 'Please fill all the input fields');
    }
}

if(isset($_POST['updateUser']))
{
    $username = validate($_POST['username']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $is_ban = isset($_POST['is_ban']) ? (int) $_POST['is_ban'] : 0; 
    $role = isset($_POST['role']) ? 1 : 0;
    $userId = validate($_POST['userid']);

    // Check for required fields
    if (!empty($username) && !empty($email) && !empty($phone) && !empty($password)) {

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            redirect('users-create.php', 'Invalid email format');
            exit;
        }

        // Hash the password securely
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Prepare SQL Query
            $query = "UPDATE users SET name='$username',
            email=$email, 
            password =$password,
            phone=$phone,
            is_ban=$is_ban,
            role =$role)
            WHERE id= '$userid' ";
             
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssii", $username, $email, $hashed_password, $phone, $is_ban, $role);
            $result = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            if ($result) {
                redirect('users.php', 'User/Admin Added Successfully');
            } else {
                error_log("MySQL Error: " . mysqli_error($conn));
                redirect('users-create.php', 'Something went wrong, please try again');
            }
        } else {
            error_log("MySQL Statement Preparation Error: " . mysqli_error($conn));
            redirect('users-create.php', 'Database error: Failed to prepare statement');
        }
    } else {
        redirect('users-create.php', 'Please fill all the input fields');
    }
}
?>
