<?php
    session_start();
    ini_set('display_startup_errors',1);
    ini_set('display_errors',1);

    echo "HEY!";
    $target_dir = "pdfs/";
    $target_file = $target_dir . basename($_FILES["upload_file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit_pdf"])) {
        echo "Submit PDF Set";
        // $check = getimagesize($_FILES["upload_file"]["tmp_name"]);
        // if($check !== false) {
        //     $uploadOk = 1;
        //     echo "Step 1: OK";
        // } else {
        //     $uploadOk = 0;
        // }
       
        // Check if file already exists
        if (file_exists($target_file)) {
            header('location:welcome.php?err=1');
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["upload_file"]["size"] > 500000000) {
            header('location:welcome.php?err=2');
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "pdf") {
            header('location:welcome.php?err=3');
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 1) { 
            if (move_uploaded_file($_FILES["upload_file"]["tmp_name"], $target_file)) {
                $url = "./invoice-parser/parsing.php?filename=".basename( $_FILES["upload_file"]["name"]);
                echo $url;
                header('location:'.$url);
            }
        }
    }
?>