<?php
    session_start();

    if(isset($_POST["save_voucher"])) {
        //Connecting to database
        $db = mysqli_connect('localhost','phpmyadmin','root','aip');

        $createdBy = $_SESSION["username"];
        $invoiceNo = $_POST["invoice_no"];
        $invoiceDate = $_POST["invoice_date"];
        $fileName = $_POST["file_name"];
        $totalAmt = $_POST["total_amt"];
        $supplierName = $_POST["supplier_name"];
        $GSTIN = $_POST["supplier_gstin"];
        $consumerName = $_POST["consumer_name"];
        $consumerAccNo = $_POST["consumer_accno"];
        $consumerIFSC = $_POST["consumer_ifsc"];

        $query = "INSERT INTO vouchers(created_by,invoice_no,invoice_date,file_name,total_value,supplier_name,supplier_gstin,consumer_name,consumer_accno,consumer_ifsc)
                VALUES('$createdBy','$invoiceNo','$invoiceDate','$fileName','$totalAmt','$supplierName','$GSTIN','$consumerName','$consumerAccNo','$consumerIFSC')";
        echo $query;
        if(mysqli_query($db, $query)) {
            echo "Inserted Successfully";
        } else {
            echo "ERROR: ".mysqli_error($db);
        }

        mysqli_close($db);
        header('location:welcome.php?isVoucherSave=1');
    }
?>