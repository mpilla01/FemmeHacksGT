<?php
function search_result($search_column, $search_value) {
    $servername = "127.0.0.1:3306"; 
    $username = "LendLearn";
    $password = "lend&learn";
    $dbname = "lendlearn";
    $db_data="";
    $search_value=$_POST[$search_value];
    // Create connection
    $con=new mysqli($servername,$username,$password,$dbname);
    // Check connection
    if($con->connect_error){
        echo 'Connection Failed: '.$con->connect_error;
        }else{
            $sql="SELECT * FROM libraryexcel WHERE ".$search_column."='".$search_value."'";

            $res=$con->query($sql);

            while($row=$res->fetch_assoc()){
                echo 'First_name:  '.$row[$search_column];
                }       

            }
            $result = mysqli_query($db, $sql);

            while($row = mysqli_fetch_array($result, MYSQLI_NUM))
            {
                echo ($row[0]);  
                echo ($row[1]);  
                echo ($row[2]);
                echo ($row[3]);
                echo ($row[4]);
                echo ($row[5]);
                echo ($row[6]);
                echo ($row[7]);
            }
}
    /*
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT (column_name(s)) FROM LibraryExcel";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            //echo "Email: " . $row["Email"]. "<br>";
            $db_data= $db_data . "\n" . $row["Email"];
        }
    } else {
        //echo "0 results";
    }
    $conn->close();
    return $db_data; */

function write_db($title, $author, $booksubject, $state, $city, $isbn, $physicalcopy, $ebook, $audiobook, $email) {
    $servername = "127.0.0.1:3306"; 
    $username = "LendLearn";
    $password = "lend&learn";
    $dbname = "lendlearn";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "INSERT INTO libraryexcel 
    VALUES ('".$title."', '".$author."', '".$booksubject."', '".$state."', '".$city."', '".$isbn."', '".$physicalcopy."', '".$ebook."', '".$audiobook."', '".$email."')";

    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}