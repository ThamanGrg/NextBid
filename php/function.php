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
    header('Location: ' . $url);
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

function checkParamId($paramType)
{
    if (isset($_GET[$paramType])) {
        if ($_GET[$paramType] != null) {
            return $_GET[$paramType];
        } else {
            return 'No id is Found';
        }
    } else {
        return 'No id is given ';
    }
}


function getAll($tableName)
{
    global $conn;

    $table = validate($tableName);

    $query = "SELECT * FROM $table";
    $result = mysqli_query($conn, $query);
    return $result;
}

function getById($tableName, $userid)
{
    global $conn;
    $table = validate($tableName);
    $id = validate($userid);

    $query = "SELECT * FROM  $table WHERE user_id= '$id' LIMIT 1";
    $result = mysqli_query($conn, $query);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $respone = [
                'status' => 200,
                'message' => 'Fected data successfully',
                'data' => $row
            ];
            return $respone;
        } else {
            $respone = [
                'status' => 404,
                'message' => 'No data found'
            ];
            return $respone;
        }
    } else {
        $respone = [
            'status' => 500,
            'message' => 'Something went wrong with the query'
        ];
        return $respone;
    }
}


function deleteQuery($tableName, $userid)
{
    global $conn;

    if (!isset($conn)) {
        return "Error: Database connection not established.";
    }

    if (empty($tableName) || empty($userid)) {
        return "Error: Table name and user ID cannot be empty.";
    }

    $tableName = mysqli_real_escape_string($conn, $tableName);
    $userid = mysqli_real_escape_string($conn, $userid);

    $query = "DELETE FROM $tableName WHERE user_id = '$userid' LIMIT 1";

    $result = mysqli_query($conn, $query);

    if ($result) {
        return true;
    } else {
        return "Error: " . mysqli_error($conn);
    }
}
