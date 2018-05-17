<?php
// Function used to print the page title
function page_title(){
    global $p_title;
    if(isset($p_title)){
        echo $p_title;
    }
}

//Function use to make selection from Database
function select_from_DB($options, $table, $condition = null,$value = null, $condition2 = null, $value2 = null){
    $query = "SELECT $options FROM $table WHERE $condition = '$value' AND $condition2 = '$value2'";
    $query_run = mysql_query($query);
    $result = mysql_num_rows($query_run);
    return $result;    
}

?>

