<?php
    
    session_start();
    
    unset($_SESSION['editDesignationName']);
    unset($_SESSION['editUserId']);
    unset($_SESSION['editVendorRegNum']);
    unset($_SESSION['return-raw-mat-order-id']);
    unset($_SESSION['editProductId']);
    //unset($_SESSION['barcode-product-name']);
    //unset($_SESSION['barcode-quantity']);
    unset($_SESSION['followInqID']);
    unset($_SESSION['saleInvoiceGenSaleID']);
    unset($_SESSION['saleDescriptionSaleId']);
    unset($_SESSION['saleDescriptionFlag']);
    unset($_SESSION['editProductCategoryId']);
    unset($_SESSION['inquiryDescriptioninquiryID']);
    unset($_SESSION['confirmSaleinquiryID']);
    unset($_SESSION['addSaleFlag']);
    unset($_SESSION['inquiryPageWebInqId']);
    unset($_SESSION['inquiryPageFlag']);
    unset($_SESSION['industrialApplicationId']);
    
    if(!$_SESSION['email']){
        header("Location: login.php");
    }
    
    if(!$_SESSION['barcode-product-name']){
        header("Location: generateBarcode.php");
    }

    $con=mysqli_connect('localhost','root','','corporateplus');
    
    //$query = "SELECT designation_name FROM access WHERE form_id=1";   //Change just 'id' for each page. One more change below
    $query = "select access.form_id, form.form_file from access,form where access.form_id=form.form_id and access.designation_name='".$_SESSION['designation']."'";
    $result = mysqli_query($con,$query);
    $flag = 0;
    while($row=mysqli_fetch_array($result)){
        if($row['form_file']=="generateBarcode.php")
            $flag=1;
    }
    
    if($flag==0){
        header("Location: dashboard.php");
    }

?>


<html>
    <head>
        
        <style>
/* width */
::-webkit-scrollbar {
  width: 7px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
</style>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="../dashboard_assets/dist/img/logo2NewNoBG.png" alt="logo">
        
        <title>Corporate Plus</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <style>
            p.inline {display: inline-block;}
            span { font-size: 13px;}
        </style>
        <style type="text/css" media="print">
            @page 
            {
                size: auto;   /* auto is the initial value */
                margin: 0mm;  /* this affects the margin in the printer settings */

            }
        </style>
    </head>
    <body onload="window.print();">
            <div style="margin-left: 5%">
                    <?php
                    include "../barcode/barcode128.php";
  

                    $productName = $_SESSION['barcode-product-name'];
                    
                    $result = mysqli_query($con,"SELECT * from products where product_name='".$productName."'");
                    while($row=mysqli_fetch_array($result)){
                        $productCode = $row['product_code'];
                        $cost = $row['unit_cost'];
                        
                        break;
                    }
                    
                    $quantity = (int)$_SESSION['barcode-quantity'];

                    for($i=1;$i<=$quantity;$i++){
                            echo "<p class='inline'><span ><b>$productName</b></span>".bar128(stripcslashes($productCode))."<span ><b>₹ ".$cost." </b><span></p>&nbsp&nbsp&nbsp&nbsp";
                    }

                    ?>
            </div>
    </body>
</html>

