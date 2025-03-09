<?php

require '../php/function.php';

$paramResult = checkParamId('id');

if (is_numeric($paramResult)) {
    $userId = validate($paramResult);
    $userId= getById('users', $userId); 

    if ($user['status'] == 200) {
        $userDeleteRes = deleteQuery('users', $userId); 

        if ($userDeleteRes) {
            redirect('users.php', 'User deleted successfully'); 
        } else {
            redirect('users.php', 'Something went wrong');
        }
    } else {
        redirect('users.php', $user['message']);
    }
} else {
    redirect('users.php', $paramResult);
}

?>