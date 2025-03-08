<?php

session_start();

require 'dbcon.php';

function validate($inputData)
{

    global $conn;
    $validatedData = mysqli_real_escape_string($conn, $inputData);
    return trim($validatedData);
}

function redirect($url, $status)
{
    $_SESSION['status'] = "$status";
    header('location: ' . $url);
    exit(0);
}

function alertSucess()
{
    if (isset($_SESSION['status'])) {
        echo '<div class="alert alert-succes">
        <h4>' . $_SESSION['status'] . '</h4>
        </div>';
        unset($_SESSION['status']);
    }
}

function checkParamId($param) {
    return !empty($param) && is_numeric($param) ? $param : 'Invalid ID';
}

function getAll($tableName)
{
    global $conn;

    $table = validate($tableName);

    $query = "SELECT * FROM $table";
    $result = mysqli_query($conn, $query);
    return $result;
}

function getById($table, $id) {
    global $conn;
    $query = "SELECT * FROM $table WHERE user_id = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return ($row = mysqli_fetch_assoc($result)) ? ['status' => 200, 'data' => $row] : ['status' => 404, 'message' => 'No data found'];
}