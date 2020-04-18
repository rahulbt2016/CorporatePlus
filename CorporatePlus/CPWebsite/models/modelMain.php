<?php

	include_once './modelClass.php';

	$user = new User();

	if($_POST['action']=='contact')
		$user->contactUs($_POST);
        

    if($_POST['action']=='apply-now'){

    	$flag = false;

    	if($_POST['person-addDoc']!=""){
            $path='../../dashboard_assets/dist/hr/upload_addDoc/';
            
            $fileName = time().rand().".".pathinfo(trim($_POST['person-addDoc']), PATHINFO_EXTENSION); 
           if(!file_exists($path))
            {
                mkdir($path,0777);
            }
            $flag = move_uploaded_file($_FILES['additional-doc']['tmp_name'],$path . $fileName);
            
        }
        else{
            
            $fileName = "Not Available";
            $flag = true;
        } 

        if($flag && $user->applyNow($_POST,$fileName))
            echo true;
        else
            echo false;
    }


    if($_POST['action']=='product-info'){
         $_SESSION['productIdSite'] = $_POST['proId'];
    
    }

     if($_POST['action']=='category-info'){
        
         $_SESSION['categoryIdSite'] = $_POST['catId'];

    }


    
    if($_POST['action']=='online-inquiry')
        $user->webInquiry($_POST);




    if($_POST['action']=='show-product-documentation')
        $user->showProductDocumentation($_POST);

    if($_POST['action']=='link-to-product-category')
        $_SESSION['categoryIdSite'] = trim($_POST['categoryId']);
    
    if($_POST['action']=='industry-info'){
        
        $_SESSION['industryIdSite'] = $_POST['indId'];

    }
    
    if($_POST['action']=='link-to-industry-category')
        $_SESSION['industryIdSite'] = trim($_POST['categoryId']);


?>