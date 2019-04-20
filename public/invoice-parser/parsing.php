<?php

    // Include Composer autoloader if not already done.
    include 'vendor/autoload.php';

    // Parse pdf file and build necessary objects.
    $parser = new \Smalot\PdfParser\Parser();
    $fileLoc = "../pdfs/".$_GET['filename'];
    echo $fileLoc;
    $pdf    = $parser->parseFile($fileLoc);

    $text = $pdf->getText();
    // echo $text;

    function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

$fullstring = $text;

$GSTIN = get_string_between($fullstring, 'GSTIN :- ', 'Bill of Supply');
echo "<br>GSTIN: " . $GSTIN;

$invoiceNo = get_string_between($fullstring, 'Invoice No.', 'Invoice Date');
echo "<br>Invoice No: " . $invoiceNo;

$invoiceDate = get_string_between($fullstring, 'Invoice Date', 'Challan No.');
echo "<br>Invoice Date: " . $invoiceDate;

$challanNo = get_string_between($fullstring, 'Challan No.', 'Challan Date');
echo "<br>Challan No: " . $challanNo;

$challanDate = get_string_between($fullstring, 'Challan Date', 'Order No.');
echo "<br>Challan Date: " . $challanDate;

$orderNo = get_string_between($fullstring, 'Order No.', 'Order Date');
echo "<br>Order No: " . $orderNo;

$orderDate = str_replace('State', '', get_string_between($fullstring, 'Order Date', ' '));
echo "<br>Order Date: " . $orderDate;

$billToParty = get_string_between($fullstring, 'Bill to Party', 'Ship to Party');
echo "<br><br>Bill to Party: " . $billToParty;

$parsed = str_replace('Sr', '', get_string_between($fullstring, 'Ship to Party', 'Product'));
$shipToParty = str_replace('.', '', $parsed);
echo "<br>Ship to Party: " . $shipToParty;

$finalAmount = str_replace(',', '', get_string_between($fullstring, 'TOTAL AMOUNT in Rs.', '/-'));
echo "<br><br>Total Amount: " . $finalAmount;

$bankName = get_string_between($fullstring, 'Bank Details', 'Current Account');
echo "<br>Bank Name: " . $bankName;

$parsed = str_replace($bankName.'Current Account :-', '', get_string_between($fullstring, 'Bank Details', 'IFSC'));
$currentAccount = str_replace('.', '', $parsed);
echo "<br>Current Account: " . $currentAccount;

$IFSC = get_string_between($fullstring, 'IFSC Code :-', ', MICR Code');
echo "<br>IFSC Code: " . $IFSC;

$parsed = get_string_between($fullstring, 'MICR Code :-', 'Terms & Conditions');
$MICR = str_replace('.', '', $parsed);
echo "<br>MICR Code: " . $MICR;

$parsed = get_string_between($fullstring, 'Amount in Rs.', '*');
echo "<br><br>Items: ";
$original_parsed = $parsed;

function strpos_all($haystack, $needle) {
    $offset = 0;
    $allpos = array();
    while (($pos = strpos($haystack, $needle, $offset)) !== FALSE) {
        $offset   = $pos + 1;
        $allpos[] = $pos;
    }
    return $allpos;
}

$all_pos = strpos_all($parsed, "SMART");
echo count($all_pos);

$i=0;
for ($i=0;$i<count($all_pos)-1;$i++){
  $offset = $all_pos[$i+1] - $all_pos[$i];
  echo '<br><br>'.($i+1).' ';
  print_r(substr($original_parsed, $all_pos[$i]-3, $offset-3));

  $sub = substr($original_parsed, $all_pos[$i]-3, $offset-3);
  preg_match('/[0-9]{8}/',$sub,$match);
  echo '<br>HSN Number: '.$match[0];

  $temp_pos = strpos_all($sub, $match[0]);
  echo '<br> Description: '.substr($sub, 0, $temp_pos[0]);

  $parsed = get_string_between($fullstring, $match[0], 'Nos.');
  echo "<br>Quantity: " . $parsed;

  $parsed = get_string_between($fullstring, 'Nos.', '/- each');
  $parsed = str_replace(',', '', $parsed);
  echo "<br>Per item price: " . $parsed;

  $parsed = get_string_between($fullstring, '/- each', '/-');
  $parsed = str_replace(',', '', $parsed);
  echo "<br>Total: " . $parsed;

}

echo '<br><br>'.($i+1).' ';
print_r(substr($original_parsed, $all_pos[$i] - 3, strlen($original_parsed) - 3));
$sub = substr($original_parsed, $all_pos[$i] - 3, strlen($original_parsed) - 3);
preg_match('/[0-9]{8}/',$sub,$match);
echo '<br>HSN Number: '.$match[0];

$temp_pos = strpos_all($sub, $match[0]);
echo '<br> Description: '.substr($sub, 0, $temp_pos[0]);

$parsed = get_string_between($fullstring, $match[0], 'Nos.');
echo "<br>Quantity: " . $parsed;

$parsed = get_string_between($fullstring, 'Nos.', '/- each');
$parsed = str_replace(',', '', $parsed);
echo "<br>Per item price: " . $parsed;

$parsed = get_string_between($fullstring, '/- each', '/-');
$parsed = str_replace(',', '', $parsed);
echo "<br>Total: " . $parsed;

$data = array(
    'isPdfSuccess' => '1',
    'invoice_no' => $invoiceNo,
    'invoice_date' => $invoiceDate,
    'file_name' => $fileLoc,
    'total_amt' => $finalAmount,
    'supplier_name' => 'SMART ELECTRONICS',
    'supplier_gstin' => $GSTIN,
    'consumer_name' => $billToParty,
    'consumer_accno' => $currentAccount,
    'consumer_ifsc' => $IFSC
);
header('location:../welcome.php?'.http_build_query($data));
?>