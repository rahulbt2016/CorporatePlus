<?php
    include_once './modelClass.php';
    
    
    $user = new User();
    
    if($_POST['action']=='login')
        $user->userLogin($_POST);
    
  //===================================================================================================================

    
    if($_POST['action']=='reset_password')
        $user->resetPassword($_POST);
    
  //===================================================================================================================

    
    if($_POST['action']=='logout')
        $user->userLogout($_POST);
    
 //===================================================================================================================

    
    if($_POST['action']=='add-user')
    {
        $flag = false;
        
        if($_POST['user-image-name']!=""){
            $path='../dashboard_assets/dist/img/';
            $imageName = trim($_POST['user-image-name']); 
           if(!file_exists($path))
            {
                mkdir($path,0777);
            }
            $flag = move_uploaded_file($_FILES['user-image']['tmp_name'],$path . $imageName);
        }
        
        else{
            $flag = true;
        }
        
        
        if($flag && $user->addUser($_POST))
            echo true;
        else
            echo false;
    }
    
    
  //===================================================================================================================

    if($_POST['action']=='change-pic')
    {
        
        $path='../dashboard_assets/dist/img/';
        $imageName = trim($_POST['user-image-name']); 
        //header('Location: test.php');
        if(!file_exists($path))
        {
            mkdir($path,0777);
        }
        
        if(move_uploaded_file($_FILES['user-image']['tmp_name'],$path . $imageName)){
            $_SESSION[temp_img]=$imageName;
        }
            

    }
   

  //===================================================================================================================
    
        
    if($_POST['action']=='edit-profile')
        $user->editProfile($_POST);    
        
    
  //===================================================================================================================

    
    if($_POST['action']=='add-designation')
        $user->addDesignation($_POST);
    
    
  //===================================================================================================================

    
    
    if($_POST['action']=='edit-designation-access'){
        $_SESSION['editDesignationName'] = $_POST['designationName'];
    }

 //===================================================================================================================
    
    if($_POST['action']=='save-edited-designation')
        $user->updateDesignation($_POST);
    
    
 //===================================================================================================================
    
    if($_POST['action']=='delete-designation')
        $user->deleteDesignation($_POST);
    
    
//===================================================================================================================

    
    
    if($_POST['action']=='edit-user'){
        $_SESSION['editUserId'] = (int)$_POST['userId'];
        echo $_SESSION['editUserId'];
    }
    
    
//===================================================================================================================
    
    
    if($_POST['action']=='save-edited-user')
        $user->updateUser($_POST);
    
    
//===================================================================================================================
    
    if($_POST['action']=='delete-user')
        $user->deleteUser($_POST);
    
//===================================================================================================================    
    
    
    if($_POST['action']=='user-search-string')
        $user->userSearch($_POST);
//===================================================================================================================
    
    
    if($_POST['action']=='delete-applicant')
        $user->deleteApplicant($_POST);

//===================================================================================================================
    
    if($_POST['action']=='add-applicant')
    {
        $flag = false;
        
        if($_POST['person-image-name']!=""){
            $path='../dashboard_assets/dist/img/';
            $imageName = trim($_POST['person-image-name']); 
           if(!file_exists($path))
            {
                mkdir($path,0777);
            }
            $flag = move_uploaded_file($_FILES['person-image']['tmp_name'],$path . $imageName);
        }

        else{
            $flag = true;
        }

        if($_POST['person-ssc-ms']!=""){
            $path='../dashboard_assets/dist/hr/upload_ssc/';
            //$random_digit=rand(0000,9999);
            $fileName = /*$random_digit.*/trim($_POST['person-ssc-ms']); 
           if(!file_exists($path))
            {
                mkdir($path,0777);
            }
            $flag = move_uploaded_file($_FILES['marksheet-ssc']['tmp_name'],$path . $fileName);
        }

        else{
            $flag = true;
        }

        if($_POST['person-hsc-ms']!=""){
            $path='../dashboard_assets/dist/hr/upload_hsc/';
            //$random_digit=rand(0000,9999);
            $fileName = /*$random_digit.*/trim($_POST['person-hsc-ms']); 
           if(!file_exists($path))
            {
                mkdir($path,0777);
            }
            $flag = move_uploaded_file($_FILES['marksheet-hsc']['tmp_name'],$path . $fileName);
        }

        else{
            $flag = true;
        }

        if($_POST['person-d2d-ms']!=""){
            $path='../dashboard_assets/dist/hr/upload_d2d/';
            //$random_digit=rand(0000,9999);
            $fileName = /*$random_digit.*/trim($_POST['person-d2d-ms']); 
           if(!file_exists($path))
            {
                mkdir($path,0777);
            }
            $flag = move_uploaded_file($_FILES['marksheet-d2d']['tmp_name'],$path . $fileName);
        }

        else{
            $flag = true;
        }

        if($_POST['person-addDoc']!=""){
            $path='../dashboard_assets/dist/hr/upload_addDoc/';
            //$random_digit=rand(0000,9999);
            $fileName = /*$random_digit.*/trim($_POST['person-addDoc']); 
           if(!file_exists($path))
            {
                mkdir($path,0777);
            }
            $flag = move_uploaded_file($_FILES['additional-doc']['tmp_name'],$path . $fileName);
        }
        
        else{
            $flag = true;
        } 
        
        
        if($flag && $user->addApplicant($_POST))
            echo true;
        else
            echo false;
    }

//===================================================================================================================


    if($_POST['action']=='download-ms-ssc')
        $user->downloadSSC($_POST);

//===================================================================================================================


    if($_POST['action']=='download-ms-hsc')
        $user->downloadHSC($_POST);

//===================================================================================================================


    if($_POST['action']=='download-ms-d2d')
        $user->downloadD2D($_POST);

//===================================================================================================================


    if($_POST['action']=='download-add-doc')
        $user->downloadDocAdd($_POST);
        
    
    
//===================================================================================================================

    
    if($_POST['action']=='add-vendor')
        $user->addVendor($_POST);

//===================================================================================================================    

    if($_POST['action']=='delete-vendor')
        $user->deleteVendor($_POST);

//===================================================================================================================
    
    
    if($_POST['action']=='edit-vendor'){
        $_SESSION['editVendorRegNum'] = $_POST['vrn'];
    }
    
    
//===================================================================================================================
    
    
    if($_POST['action']=='save-edited-vendor')
        $user->updateVendor($_POST);
    
    
//===================================================================================================================

    if($_POST['action']=='vendor-table-search')
        $user->vendorTableSearch($_POST);
    
    
//===================================================================================================================    
    
    if($_POST['action']=='add-new-raw-material')
        $user->addNewRawMat($_POST);
    
    
//===================================================================================================================
    
    
   /* if($_POST['action']=='delete-raw-material')
        $user->deleteRawMat($_POST);*/
    
    
//===================================================================================================================
    
    
    
    if($_POST['action']=='disable-raw-material')
        $user->disableRawMat($_POST);
    
    
    
//===================================================================================================================
    
    
    if($_POST['action']=='enable-raw-material')
        $user->enableRawMat($_POST);
    
//===================================================================================================================

    
    if($_POST['action']=='vendor-assist-go')
        $user->showVendorAssistTable($_POST);
    
//===================================================================================================================    

    if($_POST['action']=='request-fund')
        $user->requestFund($_POST);


//===================================================================================================================    

//    if($_POST['action']=='delete-request')
//        $user->deleteFundRequest($_POST);

//===================================================================================================================    
    
    if($_POST['action']=='approve-request')
        $user->approveFundRequest($_POST);

//===================================================================================================================    
    
    if($_POST['action']=='reject-request')
        $user->rejectFundRequest($_POST);
    
 
//===================================================================================================================    
    
    if($_POST['action']=='show-raw-materials-list')
        $user->rawMaterialDropDown($_POST);
    

//===================================================================================================================    
    
    
    if($_POST['action']=='add-raw-mat-order'){
      
        if($_POST['invoice-file-name']!=""){
            $path='../dashboard_assets/dist/pdf/';
            $fileName = trim($_POST['invoice-file-name']);
            $fileName = time().rand().".".pathinfo($fileName, PATHINFO_EXTENSION);
           if(!file_exists($path))
            {
                mkdir($path,0777);
            }
            move_uploaded_file($_FILES['invoice-file']['tmp_name'],$path . $fileName);


            $user->addRawMaterialOrder($_POST,$fileName);
        }
        else{
            $user->addRawMaterialOrder($_POST,0);
        }
    
    }
        
    

//===================================================================================================================
    
if($_POST['action']=='show-raw-mat-invoice'){
    $user->showRawMatInvoice($_POST);
}    


//===================================================================================================================    

    
if($_POST['action']=='return-raw-mat-button'){
    $_SESSION['return-raw-mat-order-id'] = $_POST['orderId'];
}


//===================================================================================================================    


if($_POST['action']=='return-raw-mat'){
    $user->returnRawMaterial($_POST);
}
    
    
//===================================================================================================================     

if($_POST['action']=='returned-raw-mat-search'){
    $user->returnedRawMatTableSearch($_POST);
}

//===================================================================================================================

if($_POST['action']=='add-new-product-category'){
    
    $picPath='../dashboard_assets/dist/product_pic/';
    $picFileName = trim($_POST['product-category-pic-name']);
    $picFileName = time().rand().".".pathinfo($picFileName, PATHINFO_EXTENSION);
   if(!file_exists($picPath))
    {
        mkdir($picPath,0777);
    }
    move_uploaded_file($_FILES['product-category-pic']['tmp_name'],$picPath . $picFileName);
    
    
    $user->addNewProductCategory($_POST,$picFileName);
}

//===================================================================================================================

if($_POST['action']=='disable-product-category'){
    $user->disableProductCategory($_POST);
}

//===================================================================================================================

if($_POST['action']=='enable-product-category'){
    $user->enableProductCategory($_POST);
}

//===================================================================================================================

if($_POST['action']=='edit-product-category'){
    $_SESSION['editProductCategoryId'] = $_POST['proCatId'];
}

//===================================================================================================================


if($_POST['action']=='save-edited-product-category'){
    
    $con = $user->databaseConnect();
    $result = mysqli_query($con,"SELECT * FROM product_category where product_category_id='".$_POST['pro-cat-id']."'");
    while($row=mysqli_fetch_array($result)){
        $picName = $row['image'];
        
        break;
    }
    
    if($_POST['pro-cat-pic-name']!=""){
        $picPath='../dashboard_assets/dist/product_pic/';
        $picName = trim($_POST['pro-cat-pic-name']);
        $picName = time().rand().".".pathinfo($picName, PATHINFO_EXTENSION);
       if(!file_exists($picPath))
        {
            mkdir($picPath,0777);
        }
        move_uploaded_file($_FILES['pro-cat-pic']['tmp_name'],$picPath . $picName);

    }
    
    
    $user->updateProductCategory($_POST,$picName);
}


//===================================================================================================================
if($_POST['action']=='add-new-product'){
    
    
    $picPath='../dashboard_assets/dist/product_pic/';
    $picFileName = trim($_POST['pro-pic-name']);
    $picFileName = time().rand().".".pathinfo($picFileName, PATHINFO_EXTENSION);
   if(!file_exists($picPath))
    {
        mkdir($picPath,0777);
    }
    move_uploaded_file($_FILES['pro-pic']['tmp_name'],$picPath . $picFileName);
    
    
    
    if($_POST['pro-documentation-file-name']!=""){
            $docPath='../dashboard_assets/dist/pdf/';
            $docFileName = trim($_POST['pro-documentation-file-name']);
            $docFileName = time().rand().".".pathinfo($docFileName, PATHINFO_EXTENSION);
           if(!file_exists($docPath))
            {
                mkdir($docPath,0777);
            }
            move_uploaded_file($_FILES['pro-documentation-file']['tmp_name'],$docPath . $docFileName);


            $user->addNewProduct($_POST,$picFileName,$docFileName);
        }
        else{
            $user->addNewProduct($_POST,$picFileName,0);
        }
   
}
    


//===================================================================================================================

if($_POST['action']=='disable-product')
    $user->disableProduct($_POST);
    
    
    
//===================================================================================================================
    
    
if($_POST['action']=='enable-product')
    $user->enableProduct($_POST);
    
//===================================================================================================================    


if($_POST['action']=='show-product-documentation')
        $user->showProductDocumentation($_POST);
    
 //===================================================================================================================



if($_POST['action']=='add-inquiry')
    $user->userSiteInquiry($_POST);     
    
//===================================================================================================================


if($_POST['action']=='view-more-inquiry'){
    $_SESSION['inquiryDescriptioninquiryID'] = (int)$_POST['inqID'];
}


//===================================================================================================================

if($_POST['action']=='confirm-sale'){
    $_SESSION['confirmSaleinquiryID'] = (int)$_POST['inqID'];
    $_SESSION['addSaleFlag'] = 1;
}


//===================================================================================================================

if($_POST['action']=='edit-product'){
    $_SESSION['editProductId'] = $_POST['proId'];
}

//===================================================================================================================

if($_POST['action']=='save-edited-product'){
    
    $con = $user->databaseConnect();
    $result = mysqli_query($con,"SELECT * FROM products where product_code='".$_POST['pro-code']."'");
    while($row=mysqli_fetch_array($result)){
        $picName = $row['product_pic'];
        $docFileName = $row['description_pdf'];
        
        break;
    }
    
    if($_POST['pro-pic-name']!=""){
        $picPath='../dashboard_assets/dist/product_pic/';
        $picName = trim($_POST['pro-pic-name']);
        $picName = time().rand().".".pathinfo($picName, PATHINFO_EXTENSION);
       if(!file_exists($picPath))
        {
            mkdir($picPath,0777);
        }
        move_uploaded_file($_FILES['pro-pic']['tmp_name'],$picPath . $picName);

    }
    
    if($_POST['pro-documentation-file-name']!=""){
        $docFilePath='../dashboard_assets/dist/pdf/';
        $docFileName = trim($_POST['pro-documentation-file-name']);
        $docFileName = time().rand().".".pathinfo($docFileName, PATHINFO_EXTENSION);
       if(!file_exists($docFilePath))
        {
            mkdir($docFilePath,0777);
        }
        move_uploaded_file($_FILES['pro-documentation-file']['tmp_name'],$docFilePath . $docFileName);

    }
    
    $user->updateProduct($_POST,$picName,$docFileName);
}

//===================================================================================================================

if($_POST['action']=='refresh-notification-number')
    $user->refreshNotificationNumber($_POST);

if($_POST['action']=='refresh-notification-content')
    $user->refreshNotificationContent($_POST);


//===================================================================================================================

if($_POST['action']=='show-all-notification')
    $user->showAllNotification($_POST);

//===================================================================================================================

if($_POST['action']=='read-solo-notification')
    $user->readSoloNotification($_POST);


//===================================================================================================================

if($_POST['action']=='refresh-notification-page')
    $user->refreshNotificationPage($_POST);

//===================================================================================================================


if($_POST['action']=='show-product-raw-mat-quantity')
    $user->showProductRawMatQuantity($_POST);

//===================================================================================================================

if($_POST['action']=='add-manufactured-product')
    $user->addManufacturedProduct($_POST);

//===================================================================================================================


    if($_POST['action']=='generate-barcode'){
        $_SESSION['barcode-product-name'] = $_POST['productName'];
        $_SESSION['barcode-quantity'] = $_POST['quantity'];
    }

//===================================================================================================================


    if($_POST['action']=='take-follow-up'){
        $_SESSION['followInqID'] = (int)$_POST['inquiry_id'];
    }

//===================================================================================================================
    
    								//SAVES FOLLOW UP DETAILS
    if($_POST['action']=='save-follow-up')
        $user->updateFollowUp($_POST);
//===================================================================================================================
								
								//DELETES INQUIRY
//    if($_POST['action']=='delete-inquiry')
//        $user->deleteInquiry($_POST);


//===================================================================================================================

    if($_POST['action']=='show-sales-product-quantity')
        $user->showSaleProductQuantity($_POST);
    
//===================================================================================================================    

    if($_POST['action']=='add-new-sale')
        $user->addSale($_POST);

//===================================================================================================================    
    
    if($_POST['action']=='preview-cost-estimation')
        $user->previewCostEstimation($_POST);
    
//===================================================================================================================

    if($_POST['action']=='generate-invoice'){
        $_SESSION['saleInvoiceGenSaleID'] = (int)$_POST['saleId'];
    }

//===================================================================================================================

    if($_POST['action']=='view-more-sale'){
        $_SESSION['saleDescriptionSaleId'] = (int)$_POST['saleId'];
        $_SESSION['saleDescriptionFlag'] = (int)$_POST['flag'];
    }

//===================================================================================================================    
    
    if($_POST['action']=='oscustomer-search-string')
        $user->oscustomerSearch($_POST);

//===================================================================================================================
    
   if($_POST['action']=='show-add-new-service-div')
        $user->showAddNewServiceDiv($_POST); 
//===================================================================================================================
   
   if($_POST['action']=='add-service')
        $user->addService($_POST);
   
//===================================================================================================================  

   if($_POST['action']=='mark-done-service')
        $user->markServiceDone($_POST);
   
//===================================================================================================================

   if($_POST['action']=='mark-returned-service')
        $user->markServiceReturned($_POST);

//===================================================================================================================   
    
    if($_POST['action']=='mark-checked-to-do')
        $user->markDoneToDO($_POST);
    
//===================================================================================================================

    if($_POST['action']=='delete-to-do')
        $user->deleteToDO($_POST);

//===================================================================================================================

    if($_POST['action']=='add-new-to-do')
        $user->addToDo($_POST);

//===================================================================================================================

    if($_POST['action']=='save-edited-to-do')
        $user->updateToDo($_POST);

//===================================================================================================================  
    
    if($_POST['action']=='allocate-inquiry-to')
        $user->allocateInquiry($_POST);
    
    
//===================================================================================================================

    if($_POST['action']=='fix-inquiry-appointment')
        $user->fixInquiryAppointment($_POST);    

//===================================================================================================================

    if($_POST['action']=='redirect-to-site-inquiry'){
        $_SESSION['inquiryPageWebInqId'] = $_POST['web-inq-id'];
        $_SESSION['inquiryPageFlag'] = 1; 
    }

//===================================================================================================================

    if($_POST['action']=='make-request')
        $user->makeRequest($_POST);    


//===================================================================================================================

    if($_POST['action']=='approve-request-2')
        $user->approveRequest($_POST);

//===================================================================================================================    
    
    if($_POST['action']=='reject-request-2')
        $user->rejectRequest($_POST);
    
    
//===================================================================================================================    

    if($_POST['action']=='edit-industrial-application'){
        $_SESSION['industrialApplicationId'] = $_POST['industryId'];
    }

//===================================================================================================================

    if($_POST['action']=='save-edited-industry-application'){
    
        $con = $user->databaseConnect();
        $result = mysqli_query($con,"SELECT * FROM industrial_applications  where industrial_application_id='".$_POST['industry-application-id']."'");
        while($row=mysqli_fetch_array($result)){
            $picName = $row['industry_image'];

            break;
        }

        if($_POST['industry-application-pic-name']!=""){
            $picPath='../dashboard_assets/dist/product_pic/';
            $picName = trim($_POST['industry-application-pic-name']);
            $picName = time().rand().".".pathinfo($picName, PATHINFO_EXTENSION);
           if(!file_exists($picPath))
            {
                mkdir($picPath,0777);
            }
            move_uploaded_file($_FILES['industry-application-pic']['tmp_name'],$picPath . $picName);

        }


        $user->updateIndustrialApplication($_POST,$picName);
    }
    
    
//===================================================================================================================

    if($_POST['action']=='disable-industrial-application'){
        $user->disableIndustrialApplication($_POST);
    }
    


//===================================================================================================================

    if($_POST['action']=='add-new-industrial-application'){
    
        $picPath='../dashboard_assets/dist/product_pic/';
        $picFileName = trim($_POST['industrial-application-pic-name']);
        $picFileName = time().rand().".".pathinfo($picFileName, PATHINFO_EXTENSION);
       if(!file_exists($picPath))
        {
            mkdir($picPath,0777);
        }
        move_uploaded_file($_FILES['industrial-application-pic']['tmp_name'],$picPath . $picFileName);


        $user->addNewIndustrialApplication($_POST,$picFileName);
    }

//===================================================================================================================

    if($_POST['action']=='raw-mat-search-string')
        $user->rawMatSearch($_POST);
    
//===================================================================================================================

    if($_POST['action']=='ordered-raw-mat-search-string')
        $user->orderedRawMatSearch($_POST);
    
//===================================================================================================================
    
    if($_POST['action']=='product-category-table-search')
        $user->productCategorySearch($_POST);
    
//===================================================================================================================
    
    if($_POST['action']=='product-table-search')
        $user->productSearch($_POST);

//===================================================================================================================
    
    if($_POST['action']=='industrial-applications-table-search')
        $user->industrySearch($_POST);

//===================================================================================================================

    if($_POST['action']=='manufactured-product-table-search')
        $user->manufacturedProductSearch($_POST);

//===================================================================================================================
    
    if($_POST['action']=='sale-table-search')
        $user->saleSearch($_POST);

//===================================================================================================================
      
    if($_POST['action']=='onsite-inquiry-table-search')
        $user->onSiteInquirySearch($_POST);   

//===================================================================================================================
      
    if($_POST['action']=='web-inquiry-table-search')
        $user->webInquirySearch($_POST);   

//===================================================================================================================
      
    if($_POST['action']=='assigned-web-inquiry-table-search')
        $user->assignedWebInquirySearch($_POST);   

//===================================================================================================================
      
    if($_POST['action']=='service-table-search')
        $user->servicedProductSearch($_POST);   

//===================================================================================================================
      
    if($_POST['action']=='applicant_table_search')
        $user->applicantSearch($_POST);   

//===================================================================================================================
      
    if($_POST['action']=='make-request-table-search')
        $user->makeRequestTableSearch($_POST);   

//===================================================================================================================
      
    if($_POST['action']=='manage-product-table-search')
        $user->manageRequestProductSearch($_POST);   

//===================================================================================================================
      
    if($_POST['action']=='manage-raw-mat-search')
        $user->manageRequestRawMatSearch($_POST);   

//===================================================================================================================
      
    if($_POST['action']=='manage-fund-search')
        $user->manageRequestFundSearch($_POST);   

//===================================================================================================================


//===================================================================================================================    
?>

