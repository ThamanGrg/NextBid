<?php
require '../php/function.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    global $conn;
    $userId = validate($_GET['id']);

    $response = getById('users', $userId);
    if ($response['status'] == 200) {
        $userDeleteRes = deleteQuery('users', $userId);

        if ($userDeleteRes === true) {
            redirect('users.php', 'User deleted successfully');
        } else {
            redirect('users.php', 'Error: ' . $userDeleteRes);
        }
    } else {
        redirect('users.php', 'No user found to delete');
    }
} else {
    redirect('users.php', 'Invalid request');
}
?>
