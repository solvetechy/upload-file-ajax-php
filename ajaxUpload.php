<?php

include("db.php");
$data = array();
    //check with your logic
    if (isset($_FILES)) {
        $error = false;
        $files = array();

        $rand = rand();

        $uploaddir = 'uploads/' ;
        foreach ($_FILES as $file) {
            if (move_uploaded_file($file['tmp_name'], $uploaddir . $rand  . basename( $file['name']))) {
                $files[] = $uploaddir . $file['name'];
                $file_name = $rand . $file['name'];

             $insert = "INSERT into ajaxupload (image) VALUES ('$file_name')";    

             if(mysqli_query($db,$insert)){  

             echo $file_name; 

            }  
		  

            } else {
                $error = true;
            }
        }
        $data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);
    } else {
        $data = array('success' => 'NO FILES ARE SENT','formData' => $_REQUEST);
    }

    /*
        You can also print the errors in json format using json_encode($data)

    */


?>