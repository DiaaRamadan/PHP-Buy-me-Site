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

// Function to redirect to previous page
function redirect($massage, $url=null, $second=3) {

    if($url==null) {
        $url = 'index.php';
        $link = 'Home Page'; 
    }else {
        if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
            $url = $_SERVER['HTTP_REFERER'];
            $link='Privous Page';
        }else {
            $url = 'index.php';
            $link = 'Home Page'; 
        }
    }
    echo $massage;
	echo "<div class='container alert alert-info'>You Will Redirect To " .$link." In $second Seconds</div>";
	header("refresh:$second;url=$url");
	exit();
}

// function return the information form the database 

function userInfo($field, $tabel, $where, $equal) {

    $query = "SELECT $field FROM $tabel WHERE $where = '$equal'";
   if( $query_run = mysql_query($query)) {
    $userarray = array();
    while($result=mysql_fetch_array($query_run))
    {
        $userarray[]=$result;
    }
     return $userarray;
   }
    
    
     

}

?>

