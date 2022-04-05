<?php
include ("Connection.php");

 if(isset($_GET["print"]))
{
	$getmonth=$_GET["getmonth"];
	$getyear=$_GET["getyear"];
	$subtotal=$_GET["subtotal"];
	
}
// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
if(empty($_GET["getmonth"]) && empty($_GET["getyear"]))
{
	
	$fileName =    "All_Sales_Report.xlsx"; 

}else
{
	$monthName= date("F",mktime(0,0,0,$getmonth,10));	
	$fileName =   $monthName . $getyear. "_Report" . ".xlsx"; 
}
	
 
// Column names 
$fields = array('Cust Name', 'Product ', 'Payment ID', 'Date Ordered', 'Price'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 

 
// Fetch records from database 
$query = $connect->query("SELECT customer_order.Order_ID,customer_order.customer_id,customer.Username,customer_order.product_id,product.Product_Name,
customer_order.payment_id,customer_order.payment_price,customer_order.order_date FROM((customer_order INNER JOIN customer ON customer_order.customer_id = customer.ID)
INNER JOIN product ON customer_order.product_id = product.Product_ID) WHERE MONTH(order_date)='$getmonth' AND YEAR(order_date)='$getyear'"); 
if($query->num_rows > 0){ 
    // Output each row of the data 
    while($row = $query->fetch_assoc()){ 
        
        $lineData = array($row['Username'], $row['Product_Name'], $row['payment_id'], $row['order_date'],"RM". $row['payment_price']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    }
	$final=array('Total = RM '.$subtotal);
	array_walk($final, 'filterData'); 
    $excelData .= implode("\t", array_values($final)) . "\n"; 	
}else {
	$query = $connect->query("SELECT customer_order.Order_ID,customer_order.customer_id,customer.Username,customer_order.product_id,product.Product_Name,
customer_order.payment_id,customer_order.payment_price,customer_order.order_date FROM((customer_order INNER JOIN customer ON customer_order.customer_id = customer.ID)
INNER JOIN product ON customer_order.product_id = product.Product_ID)");
if($query->num_rows > 0){ 
    // Output each row of the data 
    while($row = $query->fetch_assoc()){ 
        
        $lineData = array($row['Username'], $row['Product_Name'], $row['payment_id'], $row['order_date'],"RM". $row['payment_price']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    }
	$final=array('Total = RM '.$subtotal);
	array_walk($final, 'filterData'); 
    $excelData .= implode("\t", array_values($final)) . "\n"; 	
	
}
}
 
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;

?>