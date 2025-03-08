<?php

session_start();

require 'dbcon.php';

function validate($inputData){

    global $conn;
  $validatedData = mysqli_real_escape_string($conn,$inputData);
  return trim( $validatedData);
}

function redirect($url, $status ){
    $_SESSION['status'] ="$status";
    header('location: '.$url);
    exit(0);
}

function alertSucess(){
    if(isset($_SESSION['status'])){
        echo '<div class="alert alert-succes">
        <h4>'.$_SESSION['status'].'</h4>
        </div>';
       unset($_SESSION['status']);

  }
}

function checkParamId($paramType) {
      if(isset($_GET[$paramType])){
        if($_GET[$paramType] != null){
              return $_GET[$paramType];
            } else{

           return 'No id is Found';

        }
      }else{
        return 'No id is given ';
      }
 }


function getAll($tableName){
    global $conn; 

    $table = validate($tableName);
  
    $query ="SELECT * FROM $table";
    $result = mysqli_query($conn, $query);
    return $result;

}

function getById($tableName, $userid)
{
    global $conn;
    $table = validate($tableName);
    $id = validate($userid);

    $query ="SELECT * FROM  $table WHERE userid= '$userid' LIMIT 1";
    $result = mysqli_query($conn, $query);
    if($result)
    {
        if(mysqli_num_rows($result) == 1 )
        {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $respone =[
                'status' => 200,
                'message'=>'Fected data successfully',
                'data' => $row
            ];
            return $respone;
        }
        else{
            $respone = [
                'status' => 404,
                'message' => 'No data found'
            ];
            return $respone;
        }
    }
    else{
        $respone =[
            'status' => 500,
            'message' => 'Something went wrong with the query'
        ];
        return $respone;
    }


}
?>