<?php
require '../php/function.php';
require '../php/connection.php';

if (isset($_POST['saveUsers'])) {
    global $conn;

    $username = validate($_POST['username']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $is_ban = isset($_POST['is_ban']) ? (int) $_POST['is_ban'] : 0;
    $role = isset($_POST['role']) ? 1 : 0;

    if (!empty($username) && !empty($email) && !empty($phone) && !empty($password)) {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            redirect('users-create.php', 'Invalid email format');
            exit;
        }

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

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

if (isset($_POST['updateUsers'])) {
    $username = validate($_POST['username']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = isset($_POST['password']) && !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : null;
    $phone = validate($_POST['phone']);
    $is_ban = isset($_POST['is_ban']) ? (int) $_POST['is_ban'] : 0;
    $role = isset($_POST['role']);
    $userId = validate($_POST['userId']);

    if (!empty($username) && !empty($email) && !empty($phone)) {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            redirect('users-edit.php?id=' . $userId, 'Invalid email format');
            exit;
        }

        $password_query_part = $password ? ", password='$password'" : "";

        $query = "UPDATE users SET username='$username', email='$email', phone='$phone', is_ban='$is_ban', role='$role' $password_query_part WHERE user_id= '$userId'";

        if (mysqli_query($conn, $query)) {
            redirect('users.php', 'User updated successfully');
        } else {
            redirect('users-edit.php?id=' . $userId, 'Error updating user');
        }
    } else {
        redirect('users-edit.php?id=' . $userId, 'Please fill all fields');
    }
}
