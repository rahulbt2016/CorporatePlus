<?php
    
    session_start();
    date_default_timezone_set('Asia/Kolkata');
    
    Class User{
        function databaseConnect(){
            $con=mysqli_connect('localhost','root','','corporateplus');
            return $con;
        }
        
        
      //===================================================================================================================
        
        function userLogin($post)
        {
            //$con=mysqli_connect('localhost','root','','corporateplus');
            $con = $this->databaseConnect();
            
            $email=trim($post['email']);
            $password=trim($post['password']);
            $password = sha1($password);
            //echo $email;
            $flag=0;
            
            //$_SESSION['email']=$email;
            
            
            $result=mysqli_query($con,"select email,password,designation_name,active from user") or die(mysqli_error($con));
            while($row=mysqli_fetch_array($result))
            {
                if($row['email']==$email && $row['password']==$password && $row['active']==1){
                    $flag=1;
                    $designation = $row['designation_name'];
                }
                    
            }
            
            
            if($flag==1){
                $_SESSION['email'] = $email;
                $_SESSION['designation'] = $designation;
                echo true;
            }
            else
                echo false;
        }
        
      //===================================================================================================================
        
        function userLogout($post){
            
            unset($_SESSION['email']);
            unset($_SESSION['designation']);
            unset($_SESSION['editDesignationName']);
            unset($_SESSION['editUserId']);
            unset($_SESSION['editVendorRegNum']);
            unset($_SESSION['return-raw-mat-order-id']);
            unset($_SESSION['editProductId']);
            unset($_SESSION['barcode-product-name']);
            unset($_SESSION['barcode-quantity']);
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
            
            session_destroy();
            
            //unset($_SESSION['followUpInquiryID']);
            //header('Location : login.php');
            
        }  
        
      //===================================================================================================================
    
        
        function password_generate($chars){
            $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz!#@$%^&*()-+=[]\{}<>_?/';
            
            return substr(str_shuffle($data), 0, $chars);
        }
        
      //===================================================================================================================
         
         function resetPassword($post){
            $con = $this->databaseConnect();
            
            $email=trim($post['email']);
            $flag = 0;
            $result=mysqli_query($con,"select email,active from user");
            while($row=mysqli_fetch_array($result))
            {
                if($row['email']==$email && $row['active']==1){
                    $flag=1;
                }
            }
            
            if($flag == 1){
                $subject="Your new password for Corporate Plus.";
            
                $newPassword = $this->password_generate(10);
            
            
                $message="Your new password is:\n\n ".$newPassword."\n\nLogin and please change the password as per your convenience.";
            
            
            
                if(mail($email,$subject,$message,'From:abc@xyz.com')){
                    $newPassword = sha1($newPassword);
                    $query = "UPDATE user SET password='".$newPassword."' WHERE email='".$email."'";
                    mysqli_query($con,$query);
                    echo 1;
                }
                else{
                    echo 2;
                }
              
            }
            else{
                echo 0;
            }  
        }
        
      //===================================================================================================================
        
        
        function addUser($post){
            $con = $this->databaseConnect();
            
            $urn = trim($post['user-reg-num']);
            $name=trim($post['user-name']);
            $email=trim($post['user-email']);
            $password=trim($post['user-password']);
            $type=trim($post['user-type']);
            $number=trim($post['user-number']);
            $image=trim($post['user-image-name']);
            $salary=trim($post['user-salary']);
            $active=1;
            
            $password2 = sha1($password);
            
            if($image == ""){
                $image="avatar5.png";
            }
            
            $query ="INSERT INTO user(user_reg_num,user_name,email,password,designation_name,phone,user_photo,user_salary,active) values('".$urn."','".$name."','".$email."','".$password2."','".$type."','".$number."','".$image."',".$salary.",".$active.")";
            
            if(mysqli_query($con,$query)){
                
                $subject="Access to Corporate Plus";
                $message="Hello ".$name.",\nWelcome to Corporate Plus. Your login credentials are as follows:\n\nEmail : ".$email." \nPassword : ".$password." \n\nPlease login and reset the password as per your convenience.";
                if(mail($email,$subject,$message,'From:abc@xyz.com'))
                    return true;
            }    
            else 
                return false;
         } 
      

      //===================================================================================================================
   
         
         
        function editProfile($post){
            $con = $this->databaseConnect();
            
            $name=trim($post['name']);
            $password2=trim($post['password']);
            $number=trim($post['number']);
            $image=trim($post['pic']);
            
            $password = sha1($password2);
            
            $flag = 0;
            
            $result = mysqli_query($con,"select password from user where email='".$_SESSION['email']."'");
            while ($row = mysqli_fetch_array($result)) {
                if($row['password'] == $password2){
                    $flag = 1;
                }
            }
            
            if($flag!=1){
                $query = "UPDATE user
                      SET user_name='".$name."', password='".$password."', phone='".$number."', user_photo='".$image."'
                      WHERE email='".$_SESSION['email']."'";
            }
            else{
                $query = "UPDATE user
                      SET user_name='".$name."', phone='".$number."', user_photo='".$image."'
                      WHERE email='".$_SESSION['email']."'";
            }
            
            
            if(mysqli_query($con,$query))
                echo true;
            else
                echo false;
         } 
         
         
      //===================================================================================================================

        
         function addDesignation($post){
            $con = $this->databaseConnect();
            
            $designationName=trim($post['designation-name']);
            $approxSalary=trim($post['approx-salary']);
            $accessString=trim($post['acess']);
            
            $accessArray = explode(",", $accessString);
            
            $flag = 1;
            
            
            
            $result=mysqli_query($con,"select designation_name from designation");
            while($row=mysqli_fetch_array($result))
            {
                if($row['designation_name']==$designationName){
                    $flag=0;
                }
            }
            
            if($flag==1){
                $query1 = "INSERT INTO designation (designation_name,approx_salary) VALUES ('".$designationName."','".$approxSalary."')";
                mysqli_query($con, $query1);
            
                if($accessString!=""){
                    foreach ($accessArray as $value) {
                    $query2 = "INSERT INTO access (designation_name,form_id) VALUES ('".$designationName."',".(int)$value.")";
                    mysqli_query($con, $query2);
                }
                }
                echo true;
            }
            else{
                echo false;
            }
            
            
         }
         
         
    //===================================================================================================================
         
         
        function updateDesignation($post){
            $con = $this->databaseConnect();
             
            $designationName=trim($post['designation-name']);
            $approxSalary=trim($post['approx-salary']);
            $accessString=trim($post['acess']);
            
            $accessArray = explode(",", $accessString);
            
            
            $query = "UPDATE designation SET approx_salary=".$approxSalary."  WHERE designation_name='".$designationName."'";
            mysqli_query($con, $query);
            
            $query = "DELETE FROM access WHERE designation_name = '".$designationName."'";
            mysqli_query($con, $query);
            
            if($accessString!=""){
                foreach ($accessArray as $value) {
                    $query2 = "INSERT INTO access (designation_name,form_id) VALUES ('".$designationName."',".(int)$value.")";
                    mysqli_query($con, $query2);
                }
            }
            
         } 
         
    //===================================================================================================================
  
         
        function deleteDesignation($post){
            $con = $this->databaseConnect();
            
            $designationName=trim($post['designationName']);
            
            $flag = 0;
            
            $query = "select * from user where designation_name='".$designationName."'";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result)){
                    $flag=1; 
            }
            
            if($flag){
                echo false;
            }
            else{
                $query1 = "DELETE FROM access WHERE designation_name='".$designationName."'";
                $query2 = "DELETE FROM designation WHERE designation_name='".$designationName."'";
                mysqli_query($con,$query1);
                mysqli_query($con, $query2);
                echo true;
            }
            
         } 
         
         
         
    //===================================================================================================================
         
         
        function updateUser($post){
            $con = $this->databaseConnect();
             
            $name =trim($post['user-name']);
            $designation =trim($post['user-type']);
            $salary=trim($post['user-salary']);
            $email=trim($post['user-email']);
            $phone=trim($post['user-number']);
            $active=trim($post['active']);
            
            
            $query = "UPDATE user SET user_name='".$name."', email='".$email."', designation_name='".$designation."', phone='".$phone."', user_salary=".(int)$salary.",active=".(int)$active." WHERE user_id=".(int)$_SESSION['editUserId'];
            mysqli_query($con, $query);
            
         } 
         
    //===================================================================================================================
  
         
        function deleteUser($post){
            $con = $this->databaseConnect();
            
            $userID = trim($post['userId']);
            
            //$query = "DELETE FROM user WHERE user_id=".$userID;
            
            $flag = 1;
            
            $result = mysqli_query($con,"select user_id from user where email='".$_SESSION['email']."'");
            while($row=mysqli_fetch_array($result)){
                if($row['user_id']==$userID){
                    $flag = 0;
                }
            }
            
            if($flag){
                $query = "UPDATE user SET active=0 WHERE user_id=".$userID;
                mysqli_query($con, $query);
                echo true;
            }
            else{
                echo false;
            }
        
            
         } 
         
         
    //===================================================================================================================
    

         
         
        function deleteApplicant($post){
            $con = $this->databaseConnect();
            
            $applicant_id=trim($post['recruitment_id']);
            
            $query1 = "DELETE FROM recruitment WHERE recruitment_id='".$applicant_id."'";
                
            mysqli_query($con,$query1);
                
                
            
            
         }
         
         
    //===================================================================================================================
         
         
        function addApplicant($post){
            $con = $this->databaseConnect();
             
            $name=trim($post['person-name']);
            $email=trim($post['person-email']);
            $number=trim($post['person-number']);
            $ssc=trim($post['person-ssc']);
            $hsc=trim($post['person-hsc']);
            $diploma=trim($post['person-diploma']);
            $qualification=trim($post['person-qualification']);
            $specialization=trim($post['person-specialization']);
            $experience=trim($post['person-experience']);
            $interest=trim($post['person-interest']);
            $image=trim($post['person-image-name']);
            $ssc_ms=trim($post['person-ssc-ms']);
            $hsc_ms=trim($post['person-hsc-ms']);
            $d2d_ms=trim($post['person-d2d-ms']);
            $add_doc=trim($post['person-addDoc']);

            $result = mysqli_query($con,"select user_id from user where email='".$_SESSION['email']."'");
            while($row=mysqli_fetch_array($result)){
                $adder = $row['user_id'];
                break;
            }
            
            if($image == ""){
                $image="avatar5.png";
            }

            if($ssc_ms == ""){
                $ssc_ms="Not Available";
            }

            if($hsc_ms == ""){
                $hsc_ms="Not Available";
            }

            if($d2d_ms == ""){
                $d2d_ms="Not Available";
            }

            if($add_doc == ""){
                $add_doc="Not Available";
            }
            
            $query ="INSERT INTO recruitment(name,email_id,contact_no,ssc_per,ssc_ms,hsc_per,hsc_ms,diploma_per,d2d_ms,highest_qualification,specialization_field,work_experience_years,add_doc,interested_field,person_image,added_by) values('".$name."','".$email."','".$number."','".$ssc."','".$ssc_ms."','".$hsc."','".$hsc_ms."','".$diploma."','".$d2d_ms."','".$qualification."','".$specialization."',".(int)$experience.",'".$add_doc."','".$interest."','".$image."',".(int)$adder.")";

            (mysqli_query($con,$query));

            /*if(mysqli_query($con,$query)){
                
                $subject="Applied to Corporate Plus";
                $message="Hello ".$name.",\nWelcome to Corporate Plus. Your application has been successfully received by the HR department. A decision on the same will be made in the coming weeks and you will be notified regarding your application on this email id. 

                \n Thank you for applying at Corporate Plus.";
                if(mail($email,$subject,$message,'From:abc@xyz.com'))
                
                    return true;
            }    
            else 
                return false;*/
         } 
//===================================================================================================================

         function downloadSSC($post){
            $con = $this->databaseConnect();



            $applicant_id=trim($post['recruitment_id']);

            $query="SELECT * FROM recruitment WHERE recruitment_id='".$applicant_id."'";

            $result=mysqli_query($con,$query);

            $row=mysqli_fetch_array($result);

            $uri = $_SERVER['HTTP_HOST'];

            echo "http://".$uri."/CorporatePlus/dashboard_assets/dist/hr/upload_ssc/".$row['ssc_ms']."";

         }

//===================================================================================================================

         function downloadHSC($post){
            $con = $this->databaseConnect();



            $applicant_id=trim($post['recruitment_id']);

            $query="SELECT * FROM recruitment WHERE recruitment_id='".$applicant_id."'";

            $result=mysqli_query($con,$query);

            $row=mysqli_fetch_array($result);

            $uri = $_SERVER['HTTP_HOST'];

            echo "http://".$uri."/CorporatePlus/dashboard_assets/dist/hr/upload_hsc/".$row['hsc_ms']."";

         }

//===================================================================================================================

         function downloadD2D($post){
            $con = $this->databaseConnect();



            $applicant_id=trim($post['recruitment_id']);

            $query="SELECT * FROM recruitment WHERE recruitment_id='".$applicant_id."'";

            $result=mysqli_query($con,$query);

            $row=mysqli_fetch_array($result);

            $uri = $_SERVER['HTTP_HOST'];

            echo "http://".$uri."/CorporatePlus/dashboard_assets/dist/hr/upload_d2d/".$row['d2d_ms']."";

         }
//===================================================================================================================

         function downloadDocAdd($post){
            $con = $this->databaseConnect();



            $applicant_id=trim($post['recruitment_id']);

            $query="SELECT * FROM recruitment WHERE recruitment_id='".$applicant_id."'";

            $result=mysqli_query($con,$query);

            $row=mysqli_fetch_array($result);

            $uri = $_SERVER['HTTP_HOST'];

            echo "http://".$uri."/CorporatePlus/dashboard_assets/dist/hr/upload_addDoc/".$row['add_doc']."";

         }
        

//===================================================================================================================
 
         
        function addVendor($post){
            $con = $this->databaseConnect();
            
            $regNum = trim($post['regNum']);
            $name = trim($post['name']);
            $gstNum = trim($post['gstNum']);
            $email = trim($post['email']);
            $phone = trim($post['phone']);
            $rawMatString = trim($post['rawMat']);
            
            $rawMatArray = explode(",", $rawMatString);
            $active=1;
            
            $result = mysqli_query($con,"select user_id from user where email='".$_SESSION['email']."'");
            while($row= mysqli_fetch_array($result)){
                $adderId = $row['user_id'];
            } 
            
            
            $query = "INSERT INTO vendor (vendor_reg_num,vendor_name,gst_num,email,phone,added_by,active) VALUES ('".$regNum."','".$name."','".$gstNum."','".$email."','".$phone."','".$adderId."',".$active.")";
            mysqli_query($con, $query);
            
            $result = mysqli_query($con,"select vendor_id from vendor where vendor_reg_num='".$regNum."'");
            while($row= mysqli_fetch_array($result)){
                $vendorId = $row['vendor_id'];
            } 
            
            foreach ($rawMatArray as $value) {
                $query = "INSERT INTO vendor_raw_materials (vendor_id,raw_mat) VALUES (".$vendorId.",'".$value."')";
                mysqli_query($con, $query);
            }
            
         } 

//===================================================================================================================
  
        
        function deleteVendor($post){
            $con = $this->databaseConnect();
            
            $vrn=trim($post['vrn']);
            
            //$query1 = "DELETE FROM vendor WHERE vendor_reg_num='".$vrn."'";
            
            
            $query = "UPDATE vendor SET active=0 WHERE vendor_reg_num='".$vrn."'";
      
            mysqli_query($con,$query);
                
                
            
            
        }
         
         
//===================================================================================================================

        
        function updateVendor($post){
            $con = $this->databaseConnect();
            
            $regNum = trim($post['regNum']);
            $name = trim($post['name']);
            $gstNum = trim($post['gstNum']);
            $email = trim($post['email']);
            $phone = trim($post['phone']);
            $rawMatString = trim($post['rawMat']);
            $active = trim($post['active']);
            
            $rawMatArray = explode(",", $rawMatString);
            
            $result = mysqli_query($con,"select user_id from user where email='".$_SESSION['email']."'");
            while($row= mysqli_fetch_array($result)){
                $adderId = $row['user_id'];
            } 
            
            $result = mysqli_query($con,"select vendor_id from vendor where vendor_reg_num='".$regNum."'");
            while($row= mysqli_fetch_array($result)){
                $vendorId = $row['vendor_id'];
            } 
            
            
            mysqli_query($con,"DELETE FROM vendor_raw_materials WHERE vendor_id='".$vendorId."'");
            
            
            $query = "UPDATE vendor SET vendor_name='".$name."', gst_num='".$gstNum."', email='".$email."', phone='".$phone."', added_by='".$adderId."',active=".(int)$active." WHERE vendor_reg_num='".$regNum."'";
            mysqli_query($con, $query);
            
            foreach ($rawMatArray as $value) {
                $query = "INSERT INTO vendor_raw_materials (vendor_id,raw_mat) VALUES (".$vendorId.",'".$value."')";
                mysqli_query($con, $query);
            }
            
         } 
        
//===================================================================================================================
        
         
        function addNewRawMat($post){
            $con = $this->databaseConnect();
            
            $rwmCode = trim($post['rwmCode']);
            $rwmName = trim($post['rwmName']);
            
            $result = mysqli_query($con,"select user_id from user where email='".$_SESSION['email']."'");
            while($row=mysqli_fetch_array($result)){
                $adder = $row['user_id'];
            }
            
            $flag = 1;
            
            $result = mysqli_query($con,"select * from raw_materials");
            while($row=mysqli_fetch_array($result)){
                if($row['name']==$rwmName){
                    $flag = 0;
                }
            }
            
            if($flag){
                
                mysqli_query($con,"INSERT INTO raw_materials (raw_mat_code,name,available_quantity,added_by,active) VALUES ('".$rwmCode."','".$rwmName."',0,".$adder.",1)");
                echo true;
            }
            else{
                echo false;
            }
             
            
         } 
         
         
//=================================================================================================================== 
        
         
         
        
       /* function deleteRawMat($post){
            $con = $this->databaseConnect();
            
            $rwmCode=trim($post['rwmCode']);
            
            $flag = 0;
            
            $result = mysqli_query($con,"SELECT * FROM raw_materials where raw_mat_code='".$rwmCode."'");
            while($row=mysqli_fetch_array($result)){
                if($row['available_quantity']==0){
                    $flag = 1;
                }
            }
            
            if($flag){
                $query = "DELETE FROM raw_materials WHERE raw_mat_code='".$rwmCode."'";
                mysqli_query($con,$query);
                echo true;
            }
            else{
                echo false;
            }
        }
         */
         
//===================================================================================================================
 

        function disableRawMat($post){
            $con = $this->databaseConnect();
            
            $rwmCode=trim($post['rwmCode']);
            
            $flag = 0;
            
            $result = mysqli_query($con,"SELECT * FROM raw_materials where raw_mat_code='".$rwmCode."'");
            while($row=mysqli_fetch_array($result)){
                if($row['available_quantity']==0){
                    $flag = 1;
                }
            }
            
            if($flag){
                $query = "UPDATE raw_materials SET active=0 WHERE raw_mat_code='".$rwmCode."'";
                mysqli_query($con,$query);
                echo true;
            }
            else{
                echo false;
            }
        } 



//===================================================================================================================         
        
        
        function enableRawMat($post){
            $con = $this->databaseConnect();
            
            $rwmCode=trim($post['rwmCode']);
            

            $query = "UPDATE raw_materials SET active=1 WHERE raw_mat_code='".$rwmCode."'";
            mysqli_query($con,$query);
    
        } 



//===================================================================================================================
        
        
        function showVendorAssistTable($post){
            $con = $this->databaseConnect();
            
            $rawMat = $_POST['rawMat'];
            
            $vendorId="";
            $query="SELECT * FROM vendor_raw_materials where raw_mat='".$rawMat."' ORDER BY vendor_id ASC";
            $result = mysqli_query($con,$query);
            while($row=mysqli_fetch_array($result)){
                if($vendorId==""){
                    $vendorId=$row['vendor_id'];
                }
                else{
                    $vendorId= $vendorId.",".$row['vendor_id'];
                }
            }
            
            if($vendorId!=""){
                
                $vendorId = explode(",",$vendorId);
            
                foreach ($vendorId as $value){

                    $result = mysqli_query($con,"select * from vendor where vendor_id=".$value);
                    while($row=mysqli_fetch_array($result)){
                        if($row['active']==1){

                            echo '<tr>';
                            echo'<td>'.$row['vendor_reg_num'].'</td>';
                            echo'<td>'.$row['vendor_name'].'</td>';
                            echo'<td>'.$row['email'].'</td>';
                            echo'<td>'.$row['phone'].'</td>';


                            echo '</tr>';
                        }

                    }

                }
            }   
         } 



//===================================================================================================================        

         
        function requestFund($post){
            $con = $this->databaseConnect();
            
            
            $amount=trim($post['amount']);
            $reason=trim($post['reason']);
            //$status=trim($post['status']);
            
//            if($status == ""){
//                $status=1;
//            }
            
            $result = mysqli_query($con,"select * from user where email='".$_SESSION['email']."'");
            while($row=mysqli_fetch_array($result)){
                $requester = $row['user_id'];
                $requesterName = $row['user_name'];
            }
            
            
            $query ="INSERT INTO fund(request_date,employee_id,amount,reason,status,request_handler) values('".date("Y-m-d")."',".(int)$requester.",".(int)$amount.",'".$reason."',0,0)";
            
            mysqli_query($con,$query);
            
            $notiToFileAccessor = "statusFund.php";
            $notiTo = "";
            $result = mysqli_query($con,"SELECT user.user_id,access.designation_name,form.form_file 
                        FROM user,access,form
                        WHERE 
                        user.designation_name=access.designation_name AND
                        access.form_id=form.form_id AND
                        form.form_file='".$notiToFileAccessor."'");
            
            while($row = mysqli_fetch_array($result)){
                if($notiTo!=""){
                    $notiTo = $notiTo.",".$row['user_id'];
                }
                else{
                    $notiTo = "".$row['user_id']."";
                }
                
            }
            
            $notiTo = explode(",", $notiTo);
            
            foreach ($notiTo as $value) {
                
                   mysqli_query($con,"INSERT INTO notification(notification_for,notification_from,notification_read,notification_message,descriptive_message,message_color,link_page) VALUES(".(int)$value.",".(int)$requester.",0,'New Fund Request','".$requesterName." made a fund request of ₹".$amount.".','blue','statusFund.php')");
         
            }
            
        } 
         
//===================================================================================================================

         
//         function deleteFundRequest($post){
//            $con = $this->databaseConnect();
//            
//            $request_id=trim($post['request_id']);
//            
//            $query1 = "DELETE FROM fund WHERE request_id='".$request_id."'";
//                
//            mysqli_query($con,$query1);
//                
//                
//            
//            
//         }

//===================================================================================================================

         function approveFundRequest($post){
            $con = $this->databaseConnect();
            
            $result = mysqli_query($con,"SELECT * FROM user WHERE email='".$_SESSION['email']."'");
            while($row = mysqli_fetch_array($result)){
                $handlerId = $row['user_id'];
                $handlerName = $row['user_name'];
                $handlerDesignation = $row['designation_name'];
                break;
            }
            
            
            $request_id=trim($post['request_id']);
            
            $query1 = "UPDATE fund SET status=1,request_handler=".(int)$handlerId." WHERE request_id=".(int)$request_id;
                
            mysqli_query($con,$query1);
            
            
            $result = mysqli_query($con,"SELECT * FROM fund WHERE request_id=".(int)$request_id);
            while($row = mysqli_fetch_array($result)){
                $amount = $row['amount'];
                break;
            }
            
            $result=mysqli_query($con,"SELECT fund.request_id,user.user_id from fund,user where fund.employee_id=user.user_id and fund.request_id=".(int)$request_id);
            while($row=mysqli_fetch_array($result)){
                $notiForId = $row['user_id'];
            }
            
            
            
            mysqli_query($con,"INSERT INTO notification(notification_for,notification_from,notification_read,notification_message,descriptive_message,message_color,link_page) VALUES(".(int)$notiForId.",".(int)$handlerId.",0,'Fund Request Accepted','Congratulations, ".$handlerDesignation.", ".$handlerName." has accepted your fund request of ₹".$amount.".','green','requestFund.php')");    
            
            
         }


//===================================================================================================================

        function rejectFundRequest($post){
            $con = $this->databaseConnect();
            
            $result = mysqli_query($con,"SELECT * FROM user WHERE email='".$_SESSION['email']."'");
            while($row = mysqli_fetch_array($result)){
                $handlerId = $row['user_id'];
                $handlerName = $row['user_name'];
                $handlerDesignation = $row['designation_name'];
                break;
            }
            
            
            $request_id=trim($post['request_id']);
            
            $query1 = "UPDATE fund SET status=2,request_handler=".(int)$handlerId." WHERE request_id=".(int)$request_id;
                
            mysqli_query($con,$query1);
            
            $result = mysqli_query($con,"SELECT * FROM fund WHERE request_id=".(int)$request_id);
            while($row = mysqli_fetch_array($result)){
                $amount = $row['amount'];
                break;
            }
            
                
            $result=mysqli_query($con,"SELECT fund.request_id,user.user_id from fund,user where fund.employee_id=user.user_id and fund.request_id=".(int)$request_id);
            while($row=mysqli_fetch_array($result)){
                $notiForId = $row['user_id'];
            }
            
            
            
            mysqli_query($con,"INSERT INTO notification(notification_for,notification_from,notification_read,notification_message,descriptive_message,message_color,link_page) VALUES(".(int)$notiForId.",".(int)$handlerId.",0,'Fund Request Rejected','Unfortunately, ".$handlerDesignation.", ".$handlerName." has rejected your fund request of ₹".$amount.".','red','requestFund.php')");    
            
            
        } 

        
        
//===================================================================================================================        

        
        
        function rawMaterialDropDown($post){
            $con = $this->databaseConnect();
            
            $vendorName = $_POST['vendor'];
            
            $query="SELECT * FROM vendor where vendor_name='".$vendorName."'";
            $result = mysqli_query($con,$query);
            while($row=mysqli_fetch_array($result)){
                $vendorId = $row['vendor_id'];
            }
            
            $result = mysqli_query($con, "select * from vendor_raw_materials where vendor_id=".$vendorId." ORDER BY raw_mat ASC");
            while($row=mysqli_fetch_array($result)){
                echo "<option>".$row['raw_mat']."</option>";
            }
              
         } 



//===================================================================================================================        
        
         
    function addRawMaterialOrder($post,$invoiceFileName){                                        //Add Raw Material Order
        $con = $this->databaseConnect();  
        
        
        $vendorName = $_POST['vendorName'];
        $rawMat = $_POST['rawMat'];
        $quantity = $_POST['quantity'];
        $unitCost = $_POST['unitCost'];
        $batchNumber = $_POST['batchNumber'];
        $date = $_POST['date'];
            
        $result = mysqli_query($con, "select * from vendor where vendor_name='".$vendorName."'");
        while($row=mysqli_fetch_array($result)){
            $vendorId = $row['vendor_id'];
            break;
        }  
        
        $result = mysqli_query($con, "select * from raw_materials where name='".$rawMat."'");
        while($row=mysqli_fetch_array($result)){
            $rawMatId = $row['raw_mat_id'];
            break;
        }
        
        $result = mysqli_query($con,"select user_id from user where email='".$_SESSION['email']."'");
        while($row= mysqli_fetch_array($result)){
            $userId = $row['user_id'];
        }
        
        
        $query = "INSERT INTO raw_material_orders (raw_mat_id, vendor_id, batch_number, quantity, quantity_in_stock, unit_cost, delivery_date, invoice_file, ordered_by) VALUES (".(int)$rawMatId.",".(int)$vendorId.",".(int)$batchNumber.",".(int)$quantity.",".(int)$quantity.",".(int)$unitCost.",'".$date."','".$invoiceFileName."',".(int)$userId.")";
        
        mysqli_query($con,$query);
        
        $result = mysqli_query($con, "select * from raw_materials where raw_mat_id=".$rawMatId);
        while($row = mysqli_fetch_array($result)){
            $oldQuantity = $row['available_quantity'];
            break;
        }
        
        $newQuantity = ((int)$oldQuantity) + ((int)$quantity);
        
        
        mysqli_query($con, "UPDATE raw_materials SET available_quantity=".(int)$newQuantity." where raw_mat_id=".(int)$rawMatId);
        
    }
    
//==========================================================================================================================
    
   function showRawMatInvoice($post){                                          
                                                                                //Show Raw Material Invoice  
    $con = $this->databaseConnect();
    
    $orderId = $_POST['orderId'];
    
    $result = mysqli_query($con,"SELECT * FROM raw_material_orders WHERE raw_mat_order_id=".(int)$orderId);
    while($row = mysqli_fetch_array($result)){
        $fileName = $row['invoice_file'];
    }
    
    $uri = $_SERVER['HTTP_HOST'];
    
    echo "http://".$uri."/CorporatePlus/dashboard_assets/dist/pdf/".$fileName;
   
   } 
    
//==========================================================================================================================    


    function returnRawMaterial($post){                                          
                                                                                //Return Raw Material    
        $con = $this->databaseConnect();
        
        $rawMatOrderId = $_POST['rawMatOrderId'];
        $returnedQuantity = $_POST['returnedQuantity'];
        $inStockQuantity = $_POST['inStockQuantity'];
        $returnDate = $_POST['returnDate'];
        $reason = $_POST['reason'];
        
        $remainingInStockQuantity = ((int)$inStockQuantity) - ((int)$returnedQuantity);
        
        $result = mysqli_query($con,"select user_id from user where email='".$_SESSION['email']."'");
        while($row= mysqli_fetch_array($result)){
            $returnedBy = $row['user_id'];
            break;
        }
        
        
        $query1="SELECT * FROM raw_material_orders where raw_mat_order_id=".(int)$rawMatOrderId;
        $result1 = mysqli_query($con,$query1);
        while($row1=mysqli_fetch_array($result1)){
            
            $rawMatId = $row1['raw_mat_id'];
            break;
        }
        
        $query2 = "SELECT * FROM raw_materials where raw_mat_id=".(int)$rawMatId;
        $result2 = mysqli_query($con,$query2);
        while($row2=mysqli_fetch_array($result2)){
            $oldStockQuantity = $row2['available_quantity'];
            break;
        }
        
        $newStockQuantity  = ((int)$oldStockQuantity) - ((int) $returnedQuantity);
        
        
        $query = "INSERT INTO returned_raw_materials(raw_mat_order_id,returned_quantity,return_date,reason,returned_by) VALUES (".(int)$rawMatOrderId.",".(int)$returnedQuantity.",'".$returnDate."','".$reason."',".(int)$returnedBy.")";
        mysqli_query($con,$query);
        
        mysqli_query($con,"UPDATE raw_material_orders SET quantity_in_stock=".(int)$remainingInStockQuantity." WHERE raw_mat_order_id=".(int)$rawMatOrderId);
    
        mysqli_query($con,"UPDATE raw_materials SET available_quantity=".(int)$newStockQuantity." where raw_mat_id=".(int)$rawMatId);
        
        
    } 

    
    
//==========================================================================================================================    
    
    
    
    function addNewProductCategory($post,$picName){
                                                                                //Add New Product Category
            $con = $this->databaseConnect();
            $categoryName = $_POST['category-name'];
            $categoryDescription  = $_POST['product-category-description'];
            
            $flag = 1;
            
            $result = mysqli_query($con,"SELECT * from product_category");
            while($row = mysqli_fetch_array($result)){
                if($row['category_name']==$categoryName){
                   $flag = 0; 
                }
            }
            
            if(!$flag)
                echo false;
            else{
                
                mysqli_query($con,"INSERT INTO product_category(category_name,description,image,active) VALUES(\"".$categoryName."\",\"".$categoryDescription."\",\"".$picName."\",1)");
                
                echo true;
            }
    }


//==========================================================================================================================    

    function disableProductCategory($post){
        $con = $this->databaseConnect();

        $categoryId=trim($post['categoryId']);
        
        $flag = 1;
        $result = mysqli_query($con,"SELECT * FROM products WHERE product_category_id=".(int)$categoryId);
        while($row = mysqli_fetch_array($result)){
            $flag = 0;
            break;
        }
        
        if($flag){
            $query = "UPDATE product_category SET active=0 WHERE product_category_id=".(int)$categoryId;
            mysqli_query($con,$query);
            echo true;
        }
        else{
            echo false;
        }

    } 
    
//==========================================================================================================================    
    
  function enableProductCategory($post){
        $con = $this->databaseConnect();

        $categoryId=trim($post['categoryId']);


        $query = "UPDATE product_category SET active=1 WHERE product_category_id=".(int)$categoryId;
        mysqli_query($con,$query);

    }   
//==========================================================================================================================

    function updateProductCategory($post,$proCatImageName){
                                                                                //Update Product Category
            $con = $this->databaseConnect();
            
            $proCatId = trim($post['pro-cat-id']);
            $proCatDescription = trim($post['pro-cat-description']);
            $active = $active = trim($post['active']);
            
            mysqli_query($con,"UPDATE product_category SET description=\"".$proCatDescription."\",image=\"".$proCatImageName."\",active=".(int)$active." WHERE product_category_id=".(int)$proCatId);
                
    }    
    
    
//==========================================================================================================================    
    
    function addNewProduct($post,$proPicName,$proDocFileName){
                                                                                //Add New Product
            $con = $this->databaseConnect();
            
           
             
            $proCode=trim($post['pro-code']);
            $proDescription=trim($post['pro-description']);
            $proCategory=trim($post['pro-category']);
            $unitCost = trim($post['unit-cost']);
            $proName=trim($post['pro-name']);
            $proRawMatString=trim($post['pro-raw-mat']);
            $proRawMatArray = explode(",", $proRawMatString);

            $result = mysqli_query($con,"select user_id from user where email='".$_SESSION['email']."'");
            while($row=mysqli_fetch_array($result)){
                $adder = $row['user_id'];
                break;
            }
            
            $result = mysqli_query($con,"select * from product_category where category_name='".$proCategory."'");
            while($row=mysqli_fetch_array($result)){
                $proCategoryId = $row['product_category_id'];
                break;
            }
            
            $flag = 1;
            
            
            $result = mysqli_query($con,"select * from products");
            while($row=mysqli_fetch_array($result)){
                if($row['product_name']==$proName){
                    $flag = 0;
                }
            }
            
            if($flag){
                
                mysqli_query($con,"INSERT INTO products (product_code,product_name,product_category_id,product_pic,mini_description,description_pdf,available_quantity,unit_cost,added_by,active) VALUES ('".$proCode."','".$proName."',".(int)$proCategoryId.",'".$proPicName."','".$proDescription."','".$proDocFileName."',0,".(int)$unitCost.",".$adder.",1)");
                
                $result = mysqli_query($con,"select * from products where product_code='".$proCode."'");
                while($row=mysqli_fetch_array($result)){
                    $proId = $row['product_id'];
                    break;
                }
                
                
                foreach ($proRawMatArray as $value) {
                    mysqli_query($con,"INSERT INTO product_raw_mat(product_id,raw_mat) VALUES (".(int)$proId.",'".$value."')");
                }
                
                echo true;
            }
            else{
                echo false;
            }
             
            
         } 
        
//=========================================================================================================================
 

        function disableProduct($post){
                                                                                //Disable Product
            $con = $this->databaseConnect();
            
            $proId=trim($post['proId']);
            
            $flag = 0;
            
            $result = mysqli_query($con,"SELECT * FROM products where product_id='".$proId."'");
            while($row=mysqli_fetch_array($result)){
                if($row['available_quantity']==0){
                    $flag = 1;
                }
                break;
            }
            
            if($flag){
                $query = "UPDATE products SET active=0 WHERE product_id='".$proId."'";
                mysqli_query($con,$query);
                echo true;
            }
            else{
                echo false;
            }
        } 



//=========================================================================================================================         
        
        
        function enableProduct($post){
            $con = $this->databaseConnect();
            
            $proCode=trim($post['proCode']);
            

            $query = "UPDATE products SET active=1 WHERE product_code='".$proCode."'";
            mysqli_query($con,$query);
    
        } 

//===================================================================================================================        
        
        function updateProduct($post,$proImageName,$proDocFileName){
                                                                                //Update Product
            $con = $this->databaseConnect();
            
            
            $proCode=trim($post['pro-code']);
            $proCategory=trim($post['pro-category']);
            $unitCost = trim($post['unit-cost']);
            $proName=trim($post['pro-name']);
            $proRawMatString=trim($post['pro-raw-mat']);
            $proRawMatArray = explode(",", $proRawMatString);
            $proDescription = trim($post['pro-description']);
            
            $active = trim($post['active']);
            
            
            $result = mysqli_query($con,"select user_id from user where email='".$_SESSION['email']."'");
            while($row=mysqli_fetch_array($result)){
                $adder = $row['user_id'];
                break;
            }
            
            $result = mysqli_query($con,"select * from product_category where category_name='".$proCategory."'");
            while($row=mysqli_fetch_array($result)){
                $proCategoryId = $row['product_category_id'];
                break;
            }
            
            $result = mysqli_query($con,"select * from products where product_code='".$proCode."'");
            while($row=mysqli_fetch_array($result)){
                $proId = $row['product_id'];
                break;
            }
            
            $flag = 1;
            
            
            $result = mysqli_query($con,"select * from products where product_id!=".(int)$proId);
            while($row=mysqli_fetch_array($result)){
                if($row['product_name']==$proName){
                    $flag = 0;
                }
            }
            
            if($flag){
                
                mysqli_query($con,"UPDATE products SET product_name='".$proName."', product_category_id=".(int)$proCategoryId.",unit_cost=".(int)$unitCost.",added_by=".(int)$adder.",mini_description='".$proDescription."',product_pic='".$proImageName."',description_pdf='".$proDocFileName."',active=".(int)$active." WHERE product_id=".(int)$proId);
                
                
                
                mysqli_query($con, "DELETE FROM product_raw_mat where product_id=".(int)$proId);
                foreach ($proRawMatArray as $value) {
                    mysqli_query($con,"INSERT INTO product_raw_mat(product_id,raw_mat) VALUES (".(int)$proId.",'".$value."')");
                }
                
                echo true;
            }
            else{
                echo false;
            }
            
            
            
        }
        
//===================================================================================================================        
        
        function showProductDocumentation($post){                                          
                                                                                //Show Product Documentation   
        $con = $this->databaseConnect();

        $productId = $_POST['productId'];

        $result = mysqli_query($con,"SELECT * FROM products WHERE product_id=".(int)$productId);
        while($row = mysqli_fetch_array($result)){
            $fileName = $row['description_pdf'];
            break;
        }

        $uri = $_SERVER['HTTP_HOST'];

        echo "http://".$uri."/CorporatePlus/dashboard_assets/dist/pdf/".$fileName;
   
   }
   
   
   
//===================================================================================================================         

    
    function userSiteInquiry($post){
        $con = $this->databaseConnect();

        $irn = trim($post['irn']);
        $name = trim($post['name']);
        $email = trim($post['email']);
        $number = trim($post['number']);
        $inquiryDate = trim($post['inquiryDate']);
        $inquiryComments = trim($post['inquiryComments']);
        $fup = trim($post['fup']);
        $fupDate = trim($post['fupDate']);
        $fupReason = trim($post['fupReason']);
        $prodString = trim($post['prod']);

        //$prodArray = explode(",", $prodString);
        $active=1;

        $result = mysqli_query($con,"select user_id from user where email='".$_SESSION['email']."'");
        while($row= mysqli_fetch_array($result)){
            $adderId = $row['user_id'];
        } 

        //foreach ($prodArray as $value) {
        $query = "INSERT INTO onsite_inquiry(inquiry_reg_num,customer_name,customer_email,customer_phone,product_name,comment,inquiry_date,follow_up_needed,follow_up_reason,follow_up_date,inquiry_taker) VALUES ('".$irn."','".$name."','".$email."','".$number."','".$prodString."','".$inquiryComments."','".$inquiryDate."','".$fup."','".$fupReason."','".$fupDate."',".(int)$adderId.")";
        mysqli_query($con, $query);

        //}
        
        if((int)$fup==1){
            mysqli_query($con,"INSERT INTO to_do(user_id,data,deadline,done) VALUES(".(int)$adderId.",'Take customer follow-up of ".$name." - ".$irn."','".$fupDate." 17:00:00',0) ");
        }

     }

        
    
//===================================================================================================================    
        
        function time_elapsed_string($datetime, $full = false) {


                    $date = date_default_timezone_set('Asia/Kolkata');

                    $now = new DateTime;
                    $ago = new DateTime($datetime);
                    $diff = $now->diff($ago);

                    $diff->w = floor($diff->d / 7);
                    $diff->d -= $diff->w * 7;

                    $string = array(
                        'y' => 'year',
                        'm' => 'month',
                        'w' => 'week',
                        'd' => 'day',
                        'h' => 'hour',
                        'i' => 'minute',
                        's' => 'second',
                    );
                    foreach ($string as $k => &$v) {
                        if ($diff->$k) {
                            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                        } else {
                            unset($string[$k]);
                        }
                    }

                    if (!$full) $string = array_slice($string, 0, 1);
                    return $string ? implode(', ', $string) . ' ago' : 'just now';
                } 
                
                
//===================================================================================================================         
        
                
        /*function refreshNotification($post){
            $con = $this->databaseConnect();
            
            echo "<a class='nav-link' data-toggle='dropdown' href='#'>";
            echo "<i class='far fa-bell'></i>";
            
            $result = mysqli_query($con,"SELECT * from user where email='".$_SESSION['email']."'");
            while($row=mysqli_fetch_array($result)){
                $userId = $row['user_id'];
                
                break;
            }
            
            $notificationCount = 0;
            
            
            $result = mysqli_query($con,"SELECT * FROM notification WHERE (notification_for=".(int)$userId." OR notification_for_designation='".$_SESSION['designation']."') AND notification_read=0");
            while($row=mysqli_fetch_array($result)){
                $notificationCount = (int)$notificationCount+1;
            }
            
            if($notificationCount!=0){
                echo "<span id='notification-number' class='badge badge-warning navbar-badge'>".$notificationCount."</span>";
            }
            
            echo "</a>";
            echo "<div class='dropdown-menu dropdown-menu-lg dropdown-menu-right'>";
            
            $result = mysqli_query($con,"SELECT * FROM notification WHERE (notification_for=".(int)$userId." OR notification_for_designation='".$_SESSION['designation']."') AND notification_read=0 ORDER BY notification_time DESC");
                while($row=mysqli_fetch_array($result)){
                    
                    $result2 = mysqli_query($con,"SELECT * from user where user_id=".$row['notification_from']);
                    while($row2=mysqli_fetch_array($result2)){
                        $notiUserName = $row2['user_name'];
                        $notiUserImg = $row2['user_photo'];
                        
                        break;
                    }
                    
                    echo "<a href='".$row['link_page']."' class='dropdown-item'>";
                    echo "<div class='media'>";
                        echo "<img src='../dashboard_assets/dist/img/".$notiUserImg."' alt='User Avatar' class='img-size-50 mr-3 img-circle'>
                              <div class='media-body'>
                                <h3 class='dropdown-item-title'>
                                  ".$notiUserName."
                                  
                                </h3>
                                <p class='text-sm' style='color:".$row['message_color']."'>".$row['notification_message']."</p>
                                <p class='text-sm text-muted'><i class='far fa-clock mr-1'></i> ". $this->time_elapsed_string($row['notification_time'])."</p>
                                </div>";
                    echo "</div>";
                    echo "</a>";
                    echo "<div class='dropdown-divider'></div>";
                    
                   //to change priority color  //<span class='float-right text-sm text-danger'><i class='fas fa-star'></i></span>
                    
                    
                    
                }
                echo "<a href='notifications.php' class='dropdown-item dropdown-footer'>See All Notifications</a>";
            
                echo "</div>";
            
            
         } */
         
//===================================================================================================================
    
    function refreshNotificationNumber($post){
        
        $con = $this->databaseConnect();
        
            
    $result = mysqli_query($con,"SELECT * from user where email='".$_SESSION['email']."'");
    while($row=mysqli_fetch_array($result)){
        $userId = $row['user_id'];

        break;
    }

    $notificationCount = 0;


    $result = mysqli_query($con,"SELECT * FROM notification WHERE notification_for=".(int)$userId." AND notification_read=0");
    while($row=mysqli_fetch_array($result)){
        $notificationCount = (int)$notificationCount+1;
    }
    
    if($notificationCount!=0){
        echo "<span id='notification-number' class='badge badge-warning navbar-badge'>".$notificationCount."</span>";
    }
        
        

    }            
                
                
//=================================================================================================================== 

    function refreshNotificationContent($post){
        
        $con = $this->databaseConnect();
        
        $result = mysqli_query($con,"SELECT * from user where email='".$_SESSION['email']."'");
        while($row=mysqli_fetch_array($result)){
            $userId = $row['user_id'];

            break;
        }
        
        $result = mysqli_query($con,"SELECT * FROM notification WHERE notification_for=".(int)$userId." AND notification_read=0 ORDER BY notification_time DESC");
        while($row=mysqli_fetch_array($result)){

            if($row['notification_from']==0){

                $notiUserName = "Corporate Plus";
                $notiUserImg = "logo2New.jpg";
            }
            else{

                $result2 = mysqli_query($con,"SELECT * from user where user_id=".$row['notification_from']);
                while($row2=mysqli_fetch_array($result2)){
                    $notiUserName = $row2['user_name'];
                    $notiUserImg = $row2['user_photo'];

                    break;
                }

            }

            echo "<a href='#' class='dropdown-item solo-notification-content'>";
            echo "<input type ='text' hidden value='".$row['notification_id']."'>";
            echo "<p hidden>".$row['link_page']."</p>";
            echo "<div class='media'>";
                echo "<img src='../dashboard_assets/dist/img/".$notiUserImg."' alt='User Avatar' class='img-size-50 mr-3 img-circle'>
                      <div class='media-body'>
                        <h3 class='dropdown-item-title'>
                          ".$notiUserName."

                        </h3>
                        <p class='text-sm' style='color:".$row['message_color']."'>".$row['notification_message']."</p>
                        <p class='text-sm text-muted'><i class='far fa-clock mr-1'></i> ". $this->time_elapsed_string($row['notification_time'])."</p>
                        </div>";
            echo "</div>";
            echo "</a>";
            echo "<div class='dropdown-divider'></div>";

           //to change priority color  //<span class='float-right text-sm text-danger'><i class='fas fa-star'></i></span>



        }
        echo "<a href='notifications.php' class='dropdown-item dropdown-footer' id='show-all-notification'>See All Notifications</a>";

             
    }     
                
               
//===================================================================================================================  

    function showAllNotification($post){
      
        $con = $this->databaseConnect();
        
        $result = mysqli_query($con,"SELECT * from user where email='".$_SESSION['email']."'");
        while($row=mysqli_fetch_array($result)){
            $userId = $row['user_id'];
        }
        
        mysqli_query($con, "UPDATE notification SET notification_read=1 WHERE notification_for=".(int)$userId);

    }
    
//===================================================================================================================

    
    function readSoloNotification($post){
        $con = $this->databaseConnect();

        $notificationId=(int)trim($post['notificationId']);

        mysqli_query($con, "UPDATE notification SET notification_read=1 WHERE notification_id=".(int)$notificationId);

    }
    
    
//===================================================================================================================

    function refreshNotificationPage($post){
        $con = $this->databaseConnect();
        
        
        $result = mysqli_query($con,"SELECT * from user where email='".$_SESSION['email']."'");
        while($row=mysqli_fetch_array($result)){
            $userId = $row['user_id'];

            break;
        }

        mysqli_query($con,"UPDATE notification SET notification_read=1 WHERE notification_for=".(int)$userId." AND notification_read=0");

        $result = mysqli_query($con,"SELECT * FROM notification WHERE notification_for=".(int)$userId." ORDER BY notification_time DESC");
        while($row=mysqli_fetch_array($result)){



            if($row['notification_from']==0){

                $notiUserName = "Corporate Plus";
                $notiUserImg = "logo2New.jpg";
            }
            else{

                $result2 = mysqli_query($con,"SELECT * from user where user_id=".$row['notification_from']);
                while($row2=mysqli_fetch_array($result2)){
                    $notiUserName = $row2['user_name'];
                    $notiUserImg = $row2['user_photo'];

                    break;
                }

            }


            echo "<tr style='background-color:white'>";


            echo "
                <td>
                <a href='".$row['link_page']."' class='dropdown-item'>
                    <div class='row'>
                    <div class='col-md-1'>
                        <img src='../dashboard_assets/dist/img/".$notiUserImg."' style='height:60px;width:60px' alt='User Avatar' class='img-circle'>
                    </div>
                    <div class='col-md-7'>
                        <h4>".$notiUserName."</h4>
                        <p style='color:".$row['message_color']."'>".$row['notification_message']."</p>
                        <div style='word-wrap:break-word;width:340px;margin-top:-16px'>
                            ".$row['descriptive_message']."
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <p class='text-sm text-muted' style='text-align:right'><i class='far fa-clock mr-1'></i> ". $this->time_elapsed_string($row['notification_time'])."</p>
                    </div>
                    </div>
                </a>
                </td>
            ";

            echo "</tr>";
        }
        
     }
    
    
//=================================================================================================================== 
     
    
    function showProductRawMatQuantity($post){
    
        $con = $this->databaseConnect();
        
        $result = mysqli_query($con, "select * from products where product_name='".$_POST['product']."'");
        while($row=mysqli_fetch_array($result)){
            $productId = $row['product_id'];
            break;
        }

        $result = mysqli_query($con, "SELECT raw_mat FROM product_raw_mat WHERE product_id=".(int)$productId);
        while($row=mysqli_fetch_array($result)){


            echo "<div class='col-md-2'>".$row['raw_mat']."<input type='text' hidden class='raw-mat-list' value='".$row['raw_mat']."'></div>";
            echo "<div class='col-md-1'>:</div>";
            echo "<div class='col-md-9'>
                    <select class='form-control raw-mat-quantity' name='pro-man-raw-mat-quantity' style='margin:5px;width: 100%;'>";
                        $result2 = mysqli_query($con,"select * from raw_materials where name='".$row['raw_mat']."'");
                        while($row2=mysqli_fetch_array($result2)){
                            $maxQuantity = $row2['available_quantity'];
                            break;
                        }
                        for($i=1;$i<=$maxQuantity;$i++){
                            echo "<option>".$i."</option>";
                        }
            echo   "</select>  
                </div>
                ";
        }

    } 

//===================================================================================================================
    
   
    function addManufacturedProduct($post){
                                                                                //Add Manufactured Product Entry
        $con = $this->databaseConnect();
        
        $productName = trim($post['productName']);
        $batchNumber = trim($post['batchNumber']);
        $manufacturingDate = trim($post['manufacturingDate']);
        $rawMatString = trim($post['rawMatString']);
        $quantityString = trim($post['quantityString']);
        
        $rawMatArray = explode(",", $rawMatString);
        $quantityArray = explode(",", $quantityString);
        
        if(count($quantityArray)!= count($rawMatArray)){
            echo false;
        }
        else{
            
            if(count($quantityArray)==1){
            
                foreach ($quantityArray as $value) {
                    if($value==""){
                        echo false;
                        exit();
                    }
                }
            }
            
            //Main sql queries here
            
            $result = mysqli_query($con,"SELECT * FROM user where email='".$_SESSION['email']."'");
            while($row=mysqli_fetch_array($result)){
                $manufacturerId = $row['user_id'];
                break;
            }
            
            $result = mysqli_query($con,"SELECT * from products where product_name='".$productName."'");
            while($row=mysqli_fetch_array($result)){
                $productId = $row['product_id'];
                break;
            }
            
            //Adds entry of manufacturing in products_manufactured table
            mysqli_query($con,"INSERT INTO products_manufactured(product_id,batch_number,manufacture_date,manufactured_by,status) VALUES(".(int)$productId.",'".$batchNumber."','".$manufacturingDate."',".(int)$manufacturerId.",0)");
            
            $result = mysqli_query($con,"SELECT * FROM products WHERE product_id=".(int)$productId);
            while($row=mysqli_fetch_array($result)){
                $oldProductQuantity = $row['available_quantity'];
                break;
            }
            $newProductQuantity = $oldProductQuantity+1;
            
            //Add product quantity in stock
            mysqli_query($con,"UPDATE products SET available_quantity=".(int)$newProductQuantity." WHERE product_id=".$productId);
            
            
            $result = mysqli_query($con,"SELECT * FROM products_manufactured ORDER BY product_manufacture_id DESC");
            while($row=mysqli_fetch_array($result)){
                $productManufactureId = $row['product_manufacture_id'];
                break;
            }
            
            for($i=0;$i<count($rawMatArray);$i++){
                //Adds entries in products_manufactured_raw_mat_quantity specifying quantity of each raw material used
                mysqli_query($con,"INSERT INTO products_manufactured_raw_mat_quantity(product_manufacture_id,raw_mat_name,quantity) VALUES(".(int)$productManufactureId.",'".$rawMatArray[$i]."',".(int)$quantityArray[$i].")");
                
                $result = mysqli_query($con,"SELECT * FROM raw_materials WHERE name='".$rawMatArray[$i]."'");
                while($row=mysqli_fetch_array($result)){
                    $oldQuantity = $row['available_quantity'];
                    break;
                }
                $newQuantity = $oldQuantity - ((int)$quantityArray[$i]);
                
                //Reduces raw materials quantity from stock 
                mysqli_query($con,"UPDATE raw_materials SET available_quantity=".(int)$newQuantity." WHERE name='".$rawMatArray[$i]."'");
            }
            
            echo true;
            //end of main sql queries
        }
        

    }
    
//===================================================================================================================
    
    
     	function updateFollowUp($post){
            $con = $this->databaseConnect();

            $inqID = trim($post['inquiry_id']); 
            //$fup_taker =trim($post['fup_taker']);
            $prd =trim($post['prd']);
            $fup_date =trim($post['fup_date']);
            $fup_comments =trim($post['fup_comments']);
            $fup_again =trim($post['fup_again']);
            $fupAgainDate =trim($post['fupAgainDate']);
            $fupAgainReason =trim($post['fupAgainReason']);
            //$ctoc=trim($post['ctoc']);
            
            
            /*$query2 = "SELECT inquiry_id FROM onsite_inquiry WHERE inquiry_id='".$_SESSION['followInqID']."'";
            $result2 = mysqli_fetch_array(mysqli_query($con,$query2));
            $inquiry_id = $result2['inquiry_id'];*/

            $result = mysqli_query($con,"select user_id from user where email='".$_SESSION['email']."'");
            while($row= mysqli_fetch_array($result)){
            $adderId = $row['user_id'];
            } 
            
            $query = "INSERT INTO onsite_inquiry_follow_up(inquiry_id,fup_date,product,comments,follow_up_needed,follow_up_reason,follow_up_date,follow_up_taker) VALUES (".(int)$inqID.",'".$fup_date."','".$prd."','".$fup_comments."','".$fup_again."','".$fupAgainReason."','".$fupAgainDate."',".(int)$adderId.")";

            //UPDATE user SET user_name='".$name."', email='".$email."', designation_name='".$designation."', phone='".$phone."', user_salary=".(int)$salary.",active=".(int)$active." WHERE user_id=".(int)$_SESSION['editUserId'];
            mysqli_query($con, $query);
            
            $result = mysqli_query($con,"SELECT * FROM onsite_inquiry WHERE inquiry_id=".(int)$inqID);
            while($row = mysqli_fetch_array($result)){
                
                $irn = $row['inquiry_reg_num'];
                
                $customerName  = $row['customer_name'];
                
                break;
            }
            
            if((int)$fup_again==1){
            mysqli_query($con,"INSERT INTO to_do(user_id,data,deadline,done) VALUES(".(int)$adderId.",'Take customer follow-up of ".$customerName." - ".$irn."','".$fupAgainDate." 17:00:00',0) ");
        }
            
         } 



//===================================================================================================================

     
     								// Delete Inquiry
//    function deleteInquiry($post){
//        $con = $this->databaseConnect();
//
//        $inqID = trim($post['inquiry_id']);
//
//        $query1 = "DELETE FROM onsite_inquiry WHERE inquiry_id='".$inqID."'";
//                
//            mysqli_query($con,$query1);
//     }
     

//===================================================================================================================                                                                   OS CUSTOMER SEARCH
        
                                                            //ON SITE CUSTOMER SEARCH
    function oscustomerSearch($post){
            $con = $this->databaseConnect();
            $str=trim($post['oscustomer_search_string']);

            $raw_results = mysqli_query($con,"SELECT * FROM onsite_inquiry, inquiry_allocate
            WHERE `ctoc`='Yes' AND ((`customer_name` LIKE '%".$str."%') OR (`customer_email` LIKE '%".$str."%') OR (`customer_phone` LIKE '%".$str."%') OR (`product_name` LIKE '%".$str."%') OR (`inquiry_date` LIKE '%".$str."%') OR (`fup_date` LIKE '%".$str."%') OR (`fup_comments` LIKE '%".$str."%') OR (`fup_taker` LIKE '%".$str."%'))") or die();
             
            while($results = mysqli_fetch_array($raw_results)){
                

                echo "<tr>
                            
                            
                            <td>".$results['customer_name']."</td>
                            <td>".$results['customer_email']."</td>
                            <td>".$results['customer_phone']."</td>
                            <td>".$results['product_name']."</td>
                            <td>".$results['inquiry_date']."</td>
                            <td>".$results['fup_date']."</td>
                            <td>".$results['fup_comments']."</td>
                            <td>".$results['fup_taker']."</td>


                            </tr>";
               
            }

             
        }
        

//===================================================================================================================                                                                       //userReturnProduct

    
    function userReturnProduct($post){
        $con = $this->databaseConnect();

        $invoice = trim($post['invoice-num']);
        $name = trim($post['cust-name']);
        $email = trim($post['cust-email']);
        $number = trim($post['cust-number']);
        $ret_prd = trim($post['ret-prd']);
        $prd_code = trim($post['prd-code']);
        $prd_quant = trim($post['prd-quant']);
        $pur_date = trim($post['pur-date']);
        $reason_return = trim($post['reason-return']);
        $ret_date = trim($post['ret-date']);


        $result = mysqli_query($con,"select user_id from user where email='".$_SESSION['email']."'");
        while($row= mysqli_fetch_array($result)){
            $adderId = $row['user_id'];
        } 

        $query = "INSERT INTO return_product (invoice_num,cust_name,prd_name,prd_code,prd_quant,pur_date,return_reason,ret_date,added_by) VALUES ('".$invoice."','".$name."','".$ret_prd."','".$prd_code."','".$prd_quant."','".$pur_date."','".$reason_return."','".$ret_date."','".$adderId."' )";
        mysqli_query($con, $query);

        /*if(mysqli_query($con,$query)){

           $subject="Your Product is returned at Corporate Plus";
           $message="Hello ".$name.",\nWelcome to Corporate Plus. Your product has been successfully received by the Sales department. Our salesteam will take the steps required further regarding the return of your product and will notify to you accordingly. In case it requires any service, Please be patient. 

            \n Thank you for contacting Corporate Plus.";
            if(mail($email,$subject,$message,'From:abc@xyz.com'))

               return true;
       }    
       else 
            return false;*/
        

     }  

//===================================================================================================================         DELETE RETURNED PRODUCT

    
    function deleteReturnedProduct($post){
        $con = $this->databaseConnect();

        $reqID = trim($post['return_id']);

        $query1 = "DELETE FROM return_product WHERE return_id='".$reqID."'";
                
            mysqli_query($con,$query1);
     }
//===================================================================================================================
         
         
    function showAddNewServiceDiv($post){
        
        $con = $this->databaseConnect();
        
        $batchNumber = trim($post['batchNumber']);
        
        
        $result = mysqli_query($con,"SELECT * FROM products_manufactured WHERE batch_number='".$batchNumber."'");
        while($row=mysqli_fetch_array($result)){
            $productManufactureId = $row['product_manufacture_id'];
            break;
        }
        
        $result = mysqli_query($con,"SELECT products_manufactured.product_manufacture_id,products_manufactured.product_id,products.product_name
                                    FROM products_manufactured,products
                                    WHERE
                                    products.product_id=products_manufactured.product_id AND
                                    products_manufactured.product_manufacture_id=".(int)$productManufactureId);
        while($row=mysqli_fetch_array($result)){
            $productName = $row['product_name'];
            break;
        }
        
        $result = mysqli_query($con,"SELECT sale_product_batch_numbers.product_manufacture_id,
                                    sale_products.sale_id
                                    FROM sale_product_batch_numbers,sale_products
                                    WHERE 
                                    sale_products.sale_product_id=sale_product_batch_numbers.sale_product_id AND 
                                    sale_product_batch_numbers.product_manufacture_id=".(int)$productManufactureId);
        while($row=mysqli_fetch_array($result)){
            $productSaleId = $row['sale_id'];
            break;
        }
        
        $result = mysqli_query($con,"SELECT * FROM sale WHERE sale_id=".(int)$productSaleId);
        while($row=mysqli_fetch_array($result)){
            $customerName = $row['customer_name'];
            $customerEmail = $row['customer_email'];
            $customerPhone = $row['customer_number'];
            break;
        }
        
        
        echo "
            
            <div class='form-group'>
                    <label for='exampleInputName1'>Service Registration Number</label>";
        
                    $tableName = "service";
                    $columnName = "service_reg_num";
                    $prefix = "SRV";
                    $prefixLength = strlen($prefix);
                    $numbersLength = 5;

                    $result = mysqli_query($con,"SELECT ".$columnName." from ".$tableName);
                    while($row = mysqli_fetch_array($result)){
                        $lastID = $row[$columnName];
                    }

                    if(isset($lastID)){
                        $newID = substr($lastID,$prefixLength);

                        $newID = $newID+1;

                        while(strlen($newID)!=$numbersLength){
                            $newID="0".$newID;
                        }

                        $newID = $prefix.$newID;
                    }
                    else{
                        $newID = 1;

                        while(strlen($newID)!=$numbersLength){
                            $newID="0".$newID;
                        }

                        $newID = $prefix.$newID;
                    }
        
                    
        echo "
                    <input type='text' class='form-control' readonly name='service-reg-num' id='service-reg-num' value='".$newID."'>
                    </div>  

                    <div class='form-group'>
                        <label for='exampleInputName1'>Batch Number</label>
                        <input type='text' readonly class='form-control'  id='batch-number' value='".$batchNumber."'>
                    </div>  

                    <div class='form-group'>
                        <label for='exampleInputName1'>Product Name</label>
                        <input type='text' readonly class='form-control'  id='product-name' value='".$productName."'>
                    </div> 

                    <div class='form-group'>
                        <label for='exampleInputName1'>Customer Name</label>
                        <input type='text' readonly class='form-control'  id='customer-name' value='".$customerName."'>
                    </div>   

                    <div class='form-group'>
                        <label for='exampleInputName1'>Customer Email</label>
                        <input type='text' readonly class='form-control'  id='customer-email' value='".$customerEmail."'>
                    </div>

                    <div class='form-group'>
                        <label for='exampleInputName1'>Customer Phone Number</label>
                        <input type='text' readonly class='form-control'  id='customer-phone' value='".$customerPhone."'>
                    </div>  

                    
        ";
    }    
//===================================================================================================================
    
    
    function addService($post){
        
        $con = $this->databaseConnect();
        
        $serviceRegNum = trim($post['service-reg-num']);
        $batchNumber = trim($post['batch-number']);
        $date = trim($post['submit-date']);
        $returnDate = trim($post['return-date']);
        $defect = trim($post['product-defect']);
        $cost = trim($post['cost']);
        
        $result = mysqli_query($con,"SELECT * FROM products_manufactured WHERE batch_number='".$batchNumber."'");
        while($row=mysqli_fetch_array($result)){
            $productManufactureId = $row['product_manufacture_id'];
            break;
        }
        
        $result = mysqli_query($con,"select user_id from user where email='".$_SESSION['email']."'");
        while($row=mysqli_fetch_array($result)){
            $serviceTakerId = $row['user_id'];
            break;
        }
        
        $query = "INSERT INTO service(service_reg_num,product_manufacture_id,date,return_date,defect_description,charges,status,service_taker) VALUES('".$serviceRegNum."',".(int)$productManufactureId.",'".$date."','".$returnDate."','".$defect."',".(int)$cost.",0,".(int)$serviceTakerId.")";
        mysqli_query($con,$query);
        
        $query = "INSERT INTO to_do(user_id,data,deadline,done) VALUES(".(int)$serviceTakerId.",'Return product after servicing - ".$serviceRegNum."','".$returnDate." 17:00',0)";
        mysqli_query($con,$query);
    }

//===================================================================================================================

    function markServiceDone($post){
        
        $con = $this->databaseConnect();
        $serviceId = trim($post['serviceId']);
        
        mysqli_query($con,"UPDATE service SET status=1 WHERE service_id=".(int)$serviceId);
    }

//===================================================================================================================

    function markServiceReturned($post){
        
        $con = $this->databaseConnect();
        $serviceId = trim($post['serviceId']);
        
        mysqli_query($con,"UPDATE service SET status=2 WHERE service_id=".(int)$serviceId);
    }
    
//===================================================================================================================
    
    function showSaleProductQuantity($post){
        $con = $this->databaseConnect();
        
        $flag = 1;
        
        $productString = $_POST['productString'];
        
        $productArray = explode(",", $productString);
        
        //echo "<div class='card card-default'>";
        echo "<input type='text' id='product-name-array' hidden value='".$productString."'>";
        
        /*echo "<div class='card-header'> 
                <label>Select Quantities of the Products</label>
              </div>";    */

        //echo "<div class='card-body'>";
        //echo "<div class='row'>";
        foreach ($productArray as $value) {
            echo "
                <div class='col-3'>".$value."</div>
                <div class='col-1'>:</div>    
                <div class='col-8'>";
            
            $result2 = mysqli_query($con,"select * from products where product_name='".$value."'");
            while($row2=mysqli_fetch_array($result2)){
                $maxQuantity = $row2['available_quantity'];
                break;
            }
            
            if($maxQuantity<=0){
                echo "<span class='badge badge-danger'>OUT OF STOCK</span>";
                echo "</div>";
                $flag=0;
            }
            else{
                echo "<select class='form-control sale-product-quantity' name='pro-sale-quantity' style='margin:5px;width: 100%;'>";
                
                for($i=1;$i<=$maxQuantity;$i++){
                    echo "<option>".$i."</option>";
                }
                
                echo "</select>";
                echo "</div>";
            }
            
        }
        
        //echo "</div>";
        
        /*if($flag){
            echo "<div class='row' style='margin-top:50px'><div class='col-11'></div><div class='col-1'><a><span id='preview-invoice' class='badge badge-primary'>View Cost</span></a></div></div>";
        
        }*/
        
        //echo "</div>";
        //echo "</div>";
        
        
        echo "<input type='text' id='flag' hidden value='".$flag."'>";
        
    }
//===================================================================================================================

    function previewCostEstimation($post){
    
        $con = $this->databaseConnect();
        
        $productNameString = trim($post['productNameString']);
        $productQuantityString = trim($post['productQuantityString']);
        
        $productNameArray = explode(",", $productNameString);
        $productQuantityArray = explode(",", $productQuantityString);
        
        $totalCost = 0;
        
        echo"<div class='row'>
                <div class='col-12 table-responsive'>
                  <table class='table'>
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Unit Cost</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>";
                        
                       
                       for($i=0;$i<count($productQuantityArray);$i++){
                           echo "<tr>";
                           $result = mysqli_query($con,"SELECT * FROM products WHERE product_name='".$productNameArray[$i]."'");
                           while($row=mysqli_fetch_array($result)){
                               $unitCost = $row['unit_cost'];
                           }
                           
                           echo "<td>".$productQuantityArray[$i]."</td>";
                           echo "<td>".$productNameArray[$i]."</td>";
                           echo "<td>₹".$unitCost."</td>";
                           echo "<td>₹".$unitCost*$productQuantityArray[$i]."</td>";
                           
                           echo "</tr>";
                           
                           $totalCost = $totalCost + ($unitCost*$productQuantityArray[$i]);
                       }
                           
        echo       "</tbody>
                  </table>
                </div>
              </div>";
        echo "<hr style='background-color:white'>";
        echo "<div class='row'>
                <div class='col-12'><b>Total : ₹".$totalCost."</b></div>
                <div class='col-12'>*Discount and Taxes not yet included</div>    
            </div>";
        
        
    }
    
//===================================================================================================================

    function addSale($post){
            
        $con = $this->databaseConnect();
        
        $customerName = trim($post['customer-name']);
        $customerEmail = trim($post['customer-email']);
        $customerNumber = trim($post['customer-number']);
        $deliveryAddress = trim($post['delivery-address']);
        $pinCode = trim($post['delivery-pin-code']);
        $city = trim($post['delivery-city']);
        $state = trim($post['delivery-state']);
        $date = trim($post['date']);
        $percentageDiscount = trim($post['percent-discount']);
        $invoiceNumber = trim($post['invoice-number']);
        
        $productNameString = trim($post['productNameString']);
        $productQuantityString = trim($post['productQuantityString']);
        
        $productNameArray = explode(",", $productNameString);
        $productQuantityArray = explode(",", $productQuantityString);
        
        $result = mysqli_query($con,"select user_id from user where email='".$_SESSION['email']."'");
        while($row=mysqli_fetch_array($result)){
            $sellerId = $row['user_id'];
            break;
        }
        
        //Calculating Total Cost (Newly added later)
        $totalCost = 0;
        
        for($i=0;$i<count($productQuantityArray);$i++){
            
            $result = mysqli_query($con,"SELECT * FROM products WHERE product_name='".$productNameArray[$i]."'");
            while($row = mysqli_fetch_array($result)){
                $totalCost = $totalCost + (((int)$row['unit_cost'])*((int)$productQuantityArray[$i]));
                break;
            }
        }
        
        $totalCost = $totalCost - (($totalCost*$percentageDiscount)/100);
        $totalCost = $totalCost + (($totalCost*18)/100);
        
        //End of newly added
        
        
        
        //1. To add sale entry in sale table
        $query = "INSERT INTO sale(invoice_number,sale_date, customer_name, customer_email, customer_number, delivery_address, delivery_city, delivery_pin_code, delivery_state, seller_id, percentage_discount, total_cost)
                VALUES('".$invoiceNumber."','".$date."','".$customerName."','".$customerEmail."','".$customerNumber."','".$deliveryAddress."','".$city."',".(int)$pinCode.",'".$state."',".(int)$sellerId.",".(int)$percentageDiscount.", ".(int)$totalCost.")";
        mysqli_query($con,$query);
        
        //Get Sale ID
        $result = mysqli_query($con,"select sale_id from sale order by sale_id desc");
        while($row=mysqli_fetch_array($result)){
            $saleId = $row['sale_id'];
            break;
        }
        
        for($i=0;$i<count($productQuantityArray);$i++){
            
            $result = mysqli_query($con,"select product_id,available_quantity,unit_cost from products where product_name='".$productNameArray[$i]."'");
            while($row=mysqli_fetch_array($result)){
                $productId = $row['product_id'];
                $oldProductStock = $row['available_quantity'];
                $unitCost = $row['unit_cost'];
                break;
            }
            
            $newProductStock = $oldProductStock - (int)$productQuantityArray[$i];
            
            //2. Reduce from overall product stock
            $query = "UPDATE products SET available_quantity=".(int)$newProductStock." WHERE product_id='".$productId."'";
            mysqli_query($con,$query);
            
            //3. To add sale products' quantity in sale_products table
            $query = "INSERT INTO sale_products(sale_id,product_id,quantity,unit_cost)
                      VALUES(".(int)$saleId.",".(int)$productId.",".(int)$productQuantityArray[$i].",".(int)$unitCost.")";
            mysqli_query($con,$query);
            
            
            //Get Sale Product ID
            $result = mysqli_query($con,"select sale_product_id from sale_products order by sale_product_id desc");
            while($row=mysqli_fetch_array($result)){
                $saleProductId = $row['sale_product_id'];
                break;
            }
            
            for($j=0;$j<(int)$productQuantityArray[$i];$j++){
                
                //Get Product Manufacture Id of unsold product
                $result = mysqli_query($con,"select product_manufacture_id from products_manufactured WHERE product_id=".(int)$productId." AND status=0");
                while($row=mysqli_fetch_array($result)){
                    $productManufactureId = $row['product_manufacture_id'];
                    break;
                }
                
                //4. To add each sale products' batch_number(manufacturing info) in sale_product_batch_numbers table
                $query = "INSERT INTO sale_product_batch_numbers(sale_product_id,product_manufacture_id)
                          VALUES(".(int)$saleProductId.",".(int)$productManufactureId.")";
                mysqli_query($con,$query);
                
                //5. Make product status to sold
                $query = "UPDATE products_manufactured SET status=1  WHERE product_manufacture_id=".(int)$productManufactureId;
                mysqli_query($con,$query);
            }
        }
 
        
    }
//===================================================================================================================

    function markDoneToDO($post){
    
        $con = $this->databaseConnect();
        
        $toDoId = trim($post['toDoId']);
        
        mysqli_query($con,"UPDATE to_do SET done=1 WHERE to_do_id=".(int)$toDoId);

    }

//===================================================================================================================

    function deleteToDo($post){
    
        $con = $this->databaseConnect();
        
        $toDoId = trim($post['toDoId']);
        
        mysqli_query($con,"DELETE FROM to_do WHERE to_do_id=".(int)$toDoId);

    }
    

//===================================================================================================================

    function addToDo($post){
    
        $con = $this->databaseConnect();
        
        $toDoData = trim($post['to-do-data']);
        $deadlineDate = trim($post['deadline-date']);
        $deadlineTime = trim($post['deadline-time']);
        $deadlineTime = date("G:i", strtotime($deadlineTime));
        
        $result = mysqli_query($con,"select user_id from user where email='".$_SESSION['email']."'");
        while($row= mysqli_fetch_array($result)){
            $userId = (int)$row['user_id'];
        } 
        
        mysqli_query($con,"INSERT INTO to_do(user_id,data,deadline,done) VALUES(".$userId.",'".$toDoData."','".$deadlineDate." ".$deadlineTime."',0)");
    }
    
//=================================================================================================================== 
    
    function updateToDo($post){
    
        $con = $this->databaseConnect();
        
        $toDoId = trim($post['to-do-id']);
        $toDoData = trim($post['to-do-data']);
        $deadlineDate = trim($post['deadline-date']);
        $deadlineTime = trim($post['deadline-time']);
        $deadlineTime = date("G:i", strtotime($deadlineTime));
        
        mysqli_query($con,"UPDATE to_do SET data='".$toDoData."', deadline='".$deadlineDate." ".$deadlineTime."' WHERE to_do_id=".(int)$toDoId);
    }

//===================================================================================================================

    function allocateInquiry($post){
    
        $con = $this->databaseConnect();
        
        $inqId = trim($post['inqId']);
        $allocateTo = trim($post['allocateTo']);
        
        $allocatedToRegNum = explode(" - ",$allocateTo);
        $allocatedToRegNum = $allocatedToRegNum[1];
        
        
        
        $result = mysqli_query($con,"SELECT * FROM user WHERE user_reg_num='".$allocatedToRegNum."'");
        while($row = mysqli_fetch_array($result)){
            $allocatedToId = $row['user_id'];
            break;
        }
        
        $result = mysqli_query($con,"SELECT * FROM user WHERE email='".$_SESSION['email']."'");
        while($row = mysqli_fetch_array($result)){
            $allocatorId = $row['user_id'];
            $allocatorName = $row['user_name'];
            $allocatorDesignation = $row['designation_name'];
            break;
        }
        
        $result = mysqli_query($con,"SELECT web_inquiry.web_inquiry_reg_num,web_inquiry.inquirer_name,products.product_name
                                    FROM web_inquiry,products
                                    WHERE
                                    products.product_id=web_inquiry.product_id AND
                                    web_inquiry.web_inquiry_id=37");
        
        while($row = mysqli_fetch_array($result)){
            
            $customerName = $row['inquirer_name'];
            $inqRegNum = $row['web_inquiry_reg_num'];
            $productName = $row['product_name'];
            
            break;
        }
        
        //Main Query
        mysqli_query($con,"UPDATE web_inquiry SET inquiry_allocated_to=".(int)$allocatedToId.", inquiry_allocator=".(int)$allocatorId." WHERE web_inquiry_id=".(int)$inqId);
        
        
        //Notification
        mysqli_query($con,"INSERT INTO notification(notification_for,notification_from,notification_read,notification_message,descriptive_message,message_color,link_page) VALUES(".(int)$allocatedToId.",".(int)$allocatorId.",0,'Web Inquiry Allocated','".$allocatorName." (".$allocatorDesignation.") has allocated you a web inquiry of ".$customerName." for ".$productName." (".$inqRegNum.").','blue','assignedWebInquiries.php')");    
            
    }
    
//===================================================================================================================
    
    function fixInquiryAppointment($post){
        $con = $this->databaseConnect();
        
        $inqId = trim($post['inq-id']);
        $inqDate = trim($post['appointment-date']);
        $inqTime = trim($post['appointment-time']);
        
        
        $result = mysqli_query($con,"SELECT web_inquiry.inquirer_name,web_inquiry.inquirer_email,web_inquiry.web_inquiry_reg_num,web_inquiry.appointment_timestamp,user.user_name,user.phone,user.user_id 
                                    FROM
                                    web_inquiry,user
                                    WHERE 
                                    user.user_id=web_inquiry.inquiry_allocated_to AND
                                    web_inquiry.web_inquiry_id=".(int)$inqId);
        
        while($row = mysqli_fetch_array($result)){
            
            $userName = $row['user_name'];
            $userPhone = $row['phone'];
            $userId = $row['user_id'];
            
            $customerName = $row['inquirer_name'];
            $customerEmail = $row['inquirer_email'];
            
            $inqRegNum = $row['web_inquiry_reg_num'];
            break;
        }
        
        $mailSubject = "Inquiry Appointment Scheduled at Corporate Plus";
        $mailMessage = "Hello ".$customerName.",\nWe have arranged an inquiry appointment for you, as per your request."
                . " You will be given all the information you need regarding our product and all your doubts will"
                . " be cleared.\nYou are supposed to meet ".$userName." at our place on ".date('d M, Y', strtotime($inqDate))." at "
                . date('h:i a',strtotime($inqTime)).". If you are unable to visit physically, you can also call us on - ".$userPhone.".\n"
                . "For reference, your inquiry registration number is - ".$inqRegNum."."
                . "\nThankyou." ;
        
        if(mail($customerEmail,$mailSubject,$mailMessage,'From:abc@xyz.com')){
            mysqli_query($con,"UPDATE web_inquiry SET appointment_call=1,appointment_timestamp='".date('Y-m-d', strtotime($inqDate))." ".date('H:i',strtotime($inqTime))."' WHERE web_inquiry_id=".(int)$inqId);
            
            mysqli_query($con,"INSERT INTO to_do(user_id,data,deadline,done) VALUES(".(int)$userId.",'Take product inquiry of ".$customerName." - ".$inqRegNum."','".date("Y-m-d", strtotime($inqDate))." ".date("H:i", strtotime($inqTime))."',0) ");
        
            
            echo true;
        }
        else
            echo false;
    }
    
//===================================================================================================================
    
    function makeRequest($post){
        
        $con = $this->databaseConnect();
        
        $amount = trim($post['amount']);
        $reason = trim($post['reason']);
        $requestType = trim($post['request-type']);
        
        $result = mysqli_query($con,"select * from user where email='".$_SESSION['email']."'");
        while($row=mysqli_fetch_array($result)){
            $requester = $row['user_id'];
            $requesterName = $row['user_name'];
        }


        $query ="INSERT INTO request(request_date,requester_id,request_type,amount,reason,status,request_handler) values('".date("Y-m-d")."',".(int)$requester.",'".$requestType."',".(int)$amount.",'".$reason."',0,0)";

        mysqli_query($con,$query);

        
        $notiTo = "";
        
        if($requestType == "Product"){
            
            
            $result = mysqli_query($con,"SELECT user.user_id,designation.designation_name,form.form_file
                                        FROM user,designation,access,form
                                        WHERE 
                                        user.designation_name=designation.designation_name AND
                                        designation.designation_name=access.designation_name AND
                                        access.form_id=form.form_id AND
                                        form.form_file IN ('manageRequests.php','manufacturedProducts.php','addManufacturedProduct.php')
                                        GROUP BY user.user_id
                                        HAVING COUNT(form.form_file)=3");

            while($row = mysqli_fetch_array($result)){
                if($notiTo!=""){
                    $notiTo = $notiTo.",".$row['user_id'];
                }
                else{
                    $notiTo = "".$row['user_id']."";
                }

            }
            
            
            $notiMessage = $requesterName." has made a product request for ".$reason.".";
        }
        else if($requestType == "Raw Material"){
            
            $result = mysqli_query($con,"SELECT user.user_id,designation.designation_name,form.form_file
                                        FROM user,designation,access,form
                                        WHERE 
                                        user.designation_name=designation.designation_name AND
                                        designation.designation_name=access.designation_name AND
                                        access.form_id=form.form_id AND
                                        form.form_file IN ('manageRequests.php','orderedRawMaterials.php','addRawMaterialOrder.php')
                                        GROUP BY user.user_id
                                        HAVING COUNT(form.form_file)=3");

            while($row = mysqli_fetch_array($result)){
                if($notiTo!=""){
                    $notiTo = $notiTo.",".$row['user_id'];
                }
                else{
                    $notiTo = "".$row['user_id']."";
                }

            }
            
            $notiMessage = $requesterName." has made a raw material request for ".$reason.".";
        }
        else{
            
            $result = mysqli_query($con,"SELECT user.user_id,designation.designation_name,form.form_file
                                        FROM user,designation,access,form
                                        WHERE 
                                        user.designation_name=designation.designation_name AND
                                        designation.designation_name=access.designation_name AND
                                        access.form_id=form.form_id AND
                                        form.form_file IN ('manageRequests.php','fundRequestManager.php')
                                        GROUP BY user.user_id
                                        HAVING COUNT(form.form_file)=2");

            while($row = mysqli_fetch_array($result)){
                if($notiTo!=""){
                    $notiTo = $notiTo.",".$row['user_id'];
                }
                else{
                    $notiTo = "".$row['user_id']."";
                }

            }
            
            $notiMessage = $requesterName." has made a fund request for ₹".$amount.".";
        }
            
        
        $notiTo = explode(",", $notiTo);

        foreach ($notiTo as $value) {

            mysqli_query($con,"INSERT INTO notification(notification_for,notification_from,notification_read,notification_message,descriptive_message,message_color,link_page) VALUES(".(int)$value.",".(int)$requester.",0,'New ".$requestType." Request','".$notiMessage."','blue','manageRequests.php')");

        }
        
        
    }

//===================================================================================================================    
   
    
    function approveRequest($post){
        $con = $this->databaseConnect();

        $result = mysqli_query($con,"SELECT * FROM user WHERE email='".$_SESSION['email']."'");
        while($row = mysqli_fetch_array($result)){
            $handlerId = $row['user_id'];
            $handlerName = $row['user_name'];
            $handlerDesignation = $row['designation_name'];
            break;
        }


        $request_id=trim($post['request_id']);

        $query1 = "UPDATE request SET status=1,request_handler=".(int)$handlerId." WHERE request_id=".(int)$request_id;

        mysqli_query($con,$query1);


        $result = mysqli_query($con,"SELECT * FROM request WHERE request_id=".(int)$request_id);
        while($row = mysqli_fetch_array($result)){
            $amount = $row['amount'];
            $reason = $row['reason'];
            $requestType = $row['request_type'];
            break;
        }

        $result=mysqli_query($con,"SELECT request.request_id,user.user_id from request,user where request.requester_id=user.user_id and request.request_id=".(int)$request_id);
        while($row=mysqli_fetch_array($result)){
            $notiForId = $row['user_id'];
            break;
        }
        
        if($requestType=="Fund")
            $notiMessage = "Congratulations, ".$handlerDesignation.", ".$handlerName." has accepted your ". strtolower($requestType)." request of ₹".$amount.".";
        else
            $notiMessage = "Congratulations, ".$handlerDesignation.", ".$handlerName." has accepted your ". strtolower($requestType)." request of ".$reason.".";



       mysqli_query($con,"INSERT INTO notification(notification_for,notification_from,notification_read,notification_message,descriptive_message,message_color,link_page) VALUES(".(int)$notiForId.",".(int)$handlerId.",0,'".$requestType." Request Accepted','".$notiMessage."','green','makeRequest.php')");    


     }


//===================================================================================================================

    function rejectRequest($post){
        $con = $this->databaseConnect();

        $result = mysqli_query($con,"SELECT * FROM user WHERE email='".$_SESSION['email']."'");
        while($row = mysqli_fetch_array($result)){
            $handlerId = $row['user_id'];
            $handlerName = $row['user_name'];
            $handlerDesignation = $row['designation_name'];
            break;
        }


        $request_id=trim($post['request_id']);

        $query1 = "UPDATE request SET status=2,request_handler=".(int)$handlerId." WHERE request_id=".(int)$request_id;

        mysqli_query($con,$query1);

        $result = mysqli_query($con,"SELECT * FROM request WHERE request_id=".(int)$request_id);
        while($row = mysqli_fetch_array($result)){
            $amount = $row['amount'];
            $reason = $row['reason'];
            $requestType = $row['request_type'];
            break;
        }


        $result=mysqli_query($con,"SELECT request.request_id,user.user_id from request,user where request.requester_id=user.user_id and request.request_id=".(int)$request_id);
        while($row=mysqli_fetch_array($result)){
            $notiForId = $row['user_id'];
            break;
        }

        if($requestType=="Fund")
            $notiMessage = "Unfortunately, ".$handlerDesignation.", ".$handlerName." has rejected your ".strtolower($requestType)." request of ₹".$amount.".";
        else
            $notiMessage = "Unfortunately, ".$handlerDesignation.", ".$handlerName." has rejected your ".strtolower($requestType)." request of ".$reason.".";


        mysqli_query($con,"INSERT INTO notification(notification_for,notification_from,notification_read,notification_message,descriptive_message,message_color,link_page) VALUES(".(int)$notiForId.",".(int)$handlerId.",0,'".$requestType." Request Rejected','".$notiMessage."','red','makeRequest.php')");    


    } 


//===================================================================================================================
    
    function updateIndustrialApplication($post,$industrialApplicationImageName){
                                                                                //Update Industrial Application
            $con = $this->databaseConnect();
            
            $industrialApplicationId = trim($post['industry-application-id']);
            $industrialApplicationDescription = trim($post['industry-application-description']);
            $active = $active = trim($post['active']);
            $productsName = $_POST['products'];
            $productsId = "";
            
            mysqli_query($con,"UPDATE industrial_applications SET industry_description=\"".$industrialApplicationDescription."\",industry_image=\"".$industrialApplicationImageName."\",active=".(int)$active." WHERE industrial_application_id=".(int)$industrialApplicationId);
            
            mysqli_query($con,"DELETE FROM product_industrial_application WHERE industrial_application_id=".(int)$industrialApplicationId);
            
            $productsName = explode(",", $productsName);
                
            foreach($productsName as $value){

                $result = mysqli_query($con,"SELECT * FROM products WHERE product_name='".$value."'");

                if($productsId==""){
                    while($row = mysqli_fetch_array($result)){
                        $productsId = $productsId."".$row['product_id']."";
                        break;
                    }
                }
                else{
                    while($row = mysqli_fetch_array($result)){
                        $productsId = $productsId.",".$row['product_id'];
                        break;
                    }
                }

            }

            if($productsId!=""){


                $productsId = explode(",", $productsId);

                foreach ($productsId as $value) {
                    mysqli_query($con,"INSERT INTO product_industrial_application(product_id,industrial_application_id) VALUES(".(int)$value.",".(int)$industrialApplicationId.")");
                }

            }
            
            
    }
    
    
//===================================================================================================================    
    
    
    function disableIndustrialApplication($post){
        $con = $this->databaseConnect();                                        //Disable Industrial Application

        $categoryId=trim($post['industrialApplicationId']);
        
        $flag = 1;
        $result = mysqli_query($con,"SELECT * FROM product_industrial_application WHERE industrial_application_id=".(int)$categoryId);
        if(mysqli_num_rows($result) != 0){
            $flag = 0;
        }
        
        if($flag){
            $query = "UPDATE industrial_applications SET active=0 WHERE industrial_application_id=".(int)$categoryId;
            mysqli_query($con,$query);
            echo true;
        }
        else{
            echo false;
        }

    } 
    
//==========================================================================================================================    
    
  
    function addNewIndustrialApplication($post,$picName){
                                                                                //Add New Industrial Application
            $con = $this->databaseConnect();
            $categoryName = $_POST['industrial-application-name'];
            $categoryDescription  = $_POST['industrial-application-description'];
            $productsName = $_POST['products'];
            $productsId = "";
            
            $flag = 1;
            
            $result = mysqli_query($con,"SELECT * from industrial_applications");
            while($row = mysqli_fetch_array($result)){
                if($row['industry_name']==$categoryName){
                   $flag = 0; 
                }
            }
            
            if(!$flag)
                echo false;
            else{
                
                mysqli_query($con,"INSERT INTO industrial_applications(industry_name,industry_description,industry_image,active) VALUES(\"".$categoryName."\",\"".$categoryDescription."\",\"".$picName."\",1)");
                
                $productsName = explode(",", $productsName);
                
                foreach($productsName as $value){
                    
                    $result = mysqli_query($con,"SELECT * FROM products WHERE product_name='".$value."'");
                    
                    if($productsId==""){
                        while($row = mysqli_fetch_array($result)){
                            $productsId = $productsId."".$row['product_id']."";
                            break;
                        }
                    }
                    else{
                        while($row = mysqli_fetch_array($result)){
                            $productsId = $productsId.",".$row['product_id'];
                            break;
                        }
                    }
                    
                }
                
                if($productsId!=""){
                    
                    
                    $productsId = explode(",", $productsId);
                
                    $result = mysqli_query($con,"SELECT * FROM industrial_applications ORDER BY industrial_application_id DESC");
                    while($row = mysqli_fetch_array($result)){
                        $lastIndustrialApplicationId = $row['industrial_application_id'];
                        break;
                    }

                    foreach ($productsId as $value) {
                        mysqli_query($con,"INSERT INTO product_industrial_application(product_id,industrial_application_id) VALUES(".(int)$value.",".(int)$lastIndustrialApplicationId.")");
                    }
                    
                }
                
                echo true;
            }
    }


//==========================================================================================================================    
    
    
    function userSearch($post){
    $con = $this->databaseConnect();
    $str=trim($post['user_search_string']);



    $result = mysqli_query($con,"SELECT * FROM (SELECT user.user_id,
                                user.user_reg_num,
                                user.user_name,
                                user.email,
                                user.designation_name,
                                user.phone,
                                user.active,
                                CASE user.active
                                    WHEN 1 THEN 'ACTIVE'
                                    WHEN 0 THEN 'INACTIVE'
                                END as status
                                FROM user) as T1
                                WHERE (`user_reg_num` LIKE '%".$str."%') OR 
                                (`user_name` LIKE '%".$str."%') OR 
                                (`email` LIKE '%".$str."%') OR 
                                (`designation_name` LIKE '%".$str."%') OR 
                                (`phone` LIKE '%".$str."%') OR 
                                (`status` LIKE '%".$str."%')");




    while($row = mysqli_fetch_array($result)){


        echo "<tr>

                    <td>".$row['user_reg_num']."</td>
                    <td>".$row['user_name']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['phone']."</td>";

                    if($row['active']==1){
                        echo "<td><span class='badge badge-success'>ACTIVE</span></td>";
                    }
                    else{
                        echo "<td><span class='badge badge-danger'>INACTIVE</span></td>";
                    }

                    echo "<td><center><a href='#' data-toggle='modal' data-target='#modal-primary-".$row['user_id']."'><i  class='far fa-eye '></i></a></center></td>";

                    $result2 = mysqli_query($con,"select access.form_id, form.form_file from access, form WHERE access.form_id=form.form_id and access.designation_name='".$_SESSION['designation']."'") or die();
                    $flag = 0;
                    while($row2=mysqli_fetch_array($result2)){
                        if($row2['form_file']=='editUser.php')
                        $flag=1;
                    }
                    if($flag){

                        echo"<td><a  data-toggle='dropdown' href='#'><i class='far fa-edit edit-user'></i></a><input type='text'hidden value='".$row['user_id']."'></td>";

                        if($row['active']==1){
                            echo "<td><a data-toggle='dropdown' href='#'><i style='color:red'  class='far fa-trash-alt delete-user'></i></a><input type='text'hidden value='".$row['user_id']."'></td>";
                        } 
                    }



                      echo "</tr>";  
    }

    echo "<script src='../jquery_main/jquery.min.js'></script>";

    echo "<script src='../control/control.js'></script>"; 
}  


//===================================================================================================================

    
    function vendorTableSearch($post){
            $con = $this->databaseConnect();
            $str = $_POST['searchString'];
            
            $query = "select access.form_id, form.form_file from access,form where access.form_id=form.form_id and access.designation_name='".$_SESSION['designation']."'";
            $result = mysqli_query($con,$query);
            $flag = 0;
            while($row=mysqli_fetch_array($result)){
                if($row['form_file']=='editVendor.php')
                    $flag=1;
            }

            
            $query="SELECT * FROM
                (SELECT vendor.vendor_id,
                vendor.vendor_reg_num,
                vendor.vendor_name,
                vendor.gst_num,
                vendor.email,
                vendor.phone,
                user.user_reg_num,
                vendor.active,
                CASE vendor.active
                        WHEN 1 THEN 'ACTIVE'
                    WHEN 0 THEN 'INACTIVE'
                END as status
                FROM user,vendor
                WHERE user.user_id=vendor.added_by) as T1
                WHERE (vendor_reg_num LIKE '%".$str."%' OR
                vendor_name LIKE '%".$str."%' OR
                gst_num LIKE '%".$str."%' OR
                email LIKE '%".$str."%' OR
                phone LIKE '%".$str."%' OR
                user_reg_num LIKE '%".$str."%' OR
                status LIKE '%".$str."%')
                ORDER BY active DESC";
            
            $result = mysqli_query($con,$query);
            
            while($row=mysqli_fetch_array($result)){
                
                echo "<tr>";
                    echo"<td>".$row['vendor_reg_num']."</td>";
                    echo"<td>".$row['vendor_name']."</td>";
                    echo"<td>".$row['gst_num']."</td>";
                    echo"<td>".$row['email']."</td>";
                    echo"<td>".$row['phone']."</td>";
                    echo"<td>".$row['user_reg_num']."</td>";
                            
                            
                    if($row['active']==1){
                        echo"<td><span class='badge badge-success'>ACTIVE</span></td>";
                    }
                    else{
                        echo"<td><span class='badge badge-danger'>INACTIVE</span></td>";
                    }



                    if($flag){
                        echo"<td><a  data-toggle='dropdown' href='#'><i class='far fa-edit edit-vendor'></i></a><input type='text'hidden value='".$row['vendor_reg_num']."'></td>";

                        if($row['active']==1){
                            echo"<td><a data-toggle='dropdown' href='#'><i style='color:red'  class='far fa-trash-alt delete-vendor'></i></a><input type='text'hidden value='".$row['vendor_reg_num']."'></td>";

                        } 

                    }
                    echo "</tr>";
                
            }
            
            echo "<script src='../jquery_main/jquery.min.js'></script>";
            echo " <script src='../control/control.js'></script>";
        }
         
//===================================================================================================================

    
    
    function rawMatSearch($post){
        
        $con = $this->databaseConnect();
        
        $str = trim($post['string']);
        
        $query = "SELECT * FROM
                (SELECT raw_materials.raw_mat_code,raw_materials.name,raw_materials.available_quantity,raw_materials.active,user.user_reg_num,
                CASE raw_materials.active
                    WHEN 1 THEN 'ENABLED'
                    WHEN 0 THEN 'DISABLED'
                END as status
                FROM raw_materials,user
                WHERE user.user_id=raw_materials.added_by) as T1
                WHERE (raw_mat_code LIKE '%".$str."%'  OR
                name LIKE '%".$str."%' OR
                user_reg_num LIKE '%".$str."%' OR
                status LIKE '%".$str."%')
                ORDER BY active DESC, name ASC";
                
        $result = mysqli_query($con,$query);
        
        while($row = mysqli_fetch_array($result)){
            
            echo "<tr>";
                echo"<td>".$row['raw_mat_code']."</td>";
                echo"<td>".$row['name']."</td>";
                echo"<td>".$row['available_quantity']."</td>";
                echo"<td>".$row['user_reg_num']."</td>";
                if($row['active']==1){
                    echo "<td><span class='badge badge-success'>ENABLED</span></td>";
                }
                else{
                    echo "<td><span class='badge badge-danger'>DISABLED</span></td>";
                }

                if($row['active']==1){
                    echo"<td><a data-toggle='dropdown' href='#'><i style='color:red' title='Disable'  class='far fa-trash-alt disable-raw-mat'></i></a><input type='text'hidden value='".$row['raw_mat_code']."'></td>";
                }
                else{
                    echo "<td><a data-toggle='dropdown' href='#'><i class='fas text-success fa-trash-restore-alt enable-raw-mat' title='Enable'></i></a><input type='text'hidden value='".$row['raw_mat_code']."'></td>";
                }



            echo "</tr>";
            
        }
        
        echo "<script src='../jquery_main/jquery.min.js'></script>";

        echo "<script src='../control/control.js'></script>"; 
        
        
        
    }
    
    
//==========================================================================================================================

    function orderedRawMatSearch($post){
        
        $con = $this->databaseConnect();
        
        $str = trim($post['string']);
        
        $query = "SELECT raw_material_orders.raw_mat_order_id,
                raw_materials.name,
                raw_material_orders.quantity,
                raw_material_orders.quantity_in_stock,
                vendor.vendor_reg_num,
                raw_material_orders.unit_cost,
                raw_material_orders.batch_number,
                DATE_FORMAT(raw_material_orders.delivery_date,'%d %b, %Y') as date,
                user.user_reg_num,
                raw_material_orders.invoice_file
                FROM user,raw_material_orders,vendor,raw_materials
                WHERE 
                user.user_id=raw_material_orders.ordered_by AND
                raw_material_orders.vendor_id=vendor.vendor_id AND
                raw_materials.raw_mat_id=raw_material_orders.raw_mat_id AND
                (raw_materials.name LIKE '%".$str."%' OR
                 vendor.vendor_reg_num LIKE '%".$str."%' OR
                 raw_material_orders.batch_number LIKE '%".$str."%' OR
                 DATE_FORMAT(raw_material_orders.delivery_date,'%d %b, %Y') LIKE '%".$str."%' OR
                 user.user_reg_num LIKE '%".$str."%')
                ORDER BY delivery_date DESC, raw_mat_order_id DESC";
        
        
        $result = mysqli_query($con,$query);
        
        while($row = mysqli_fetch_array($result)){
            
            echo "<tr>";
                    echo"<td>".$row['name']."</td>";
                    echo"<td>".$row['quantity']."</td>";
                    if($row['quantity_in_stock']>0){
                        echo"<td>".$row['quantity_in_stock']."</td>";
                    }
                    else{
                        echo "<td><span class='badge badge-danger'>NIL</span></td>";
                    }
                    echo"<td>".$row['vendor_reg_num']."</td>";
                    echo"<td>₹ ".$row['unit_cost']."</td>";
                    echo"<td>".$row['batch_number']."</td>";
                    echo"<td>".$row['date']."</td>";
                    echo"<td>".$row['user_reg_num']."</td>";
                    echo"<td>₹ ".$row['unit_cost']*$row['quantity']."</td>";

                    if($row['invoice_file']!="0"){
                        echo "<td><center><a  data-toggle='dropdown' href='#'><i class='fas fa-file-pdf show-raw-mat-invoice' style='color:black'></i></a><input type='text' hidden value='".$row['raw_mat_order_id']."'></center></td>";
                    }
                    else{
                        echo "<td><center><b>-</b></center></td>";
                    }


                    $query2 = "select access.form_id, form.form_file from access,form where access.form_id=form.form_id and access.designation_name='".$_SESSION['designation']."'";
                    $result2 = mysqli_query($con,$query2);
                    $flag = 0;
                    while($row2=mysqli_fetch_array($result2)){
                        if($row2['form_file']=='addReturnRawMaterial.php' )
                            $flag=1;
                    }
                    if($row['quantity_in_stock']<=0){
                        $flag = 0;
                    }
                    if($flag){

                        echo"<td><a  data-toggle='dropdown' href='#'><i class='fas fa-undo-alt return-raw-mat'></i></a><input type='text' hidden value='".$row['raw_mat_order_id']."'></td>";
                    }
                    else{
                        echo "<td></td>";
                    }



                echo "</tr>";
            
        }
        
        echo "<script src='../jquery_main/jquery.min.js'></script>";

        echo "<script src='../control/control.js'></script>"; 
        
    }


//==========================================================================================================================

    function returnedRawMatTableSearch($post){
        $con = $this->databaseConnect();
        
        $str=$_POST['searchString'];
        
        $query="SELECT raw_materials.name as raw_mat_name,
        returned_raw_materials.returned_quantity,
        vendor.vendor_reg_num,
        raw_material_orders.unit_cost,
        raw_material_orders.batch_number, 
        DATE_FORMAT(returned_raw_materials.return_date,'%d %b, %Y') as return_date, user.user_reg_num,
        returned_raw_materials.reason
        FROM returned_raw_materials,raw_materials,vendor,raw_material_orders,user
        WHERE
        (raw_materials.name LIKE '%".$str."%' OR
        vendor.vendor_reg_num LIKE '%".$str."%' OR
        raw_material_orders.batch_number LIKE '%".$str."%' OR
        DATE_FORMAT(returned_raw_materials.return_date,'%e %b, %Y') LIKE '%".$str."%' OR 
        user.user_reg_num LIKE '%".$str."%' OR
        returned_raw_materials.reason LIKE '%".$str."%') AND
        returned_raw_materials.raw_mat_order_id=raw_material_orders.raw_mat_order_id AND 
        returned_raw_materials.returned_by=user.user_id AND 
        raw_materials.raw_mat_id=raw_material_orders.raw_mat_id AND 
        vendor.vendor_id=raw_material_orders.vendor_id
        ORDER BY returned_raw_materials.return_date DESC,returned_raw_materials.returned_raw_mat_id DESC";
        
        
        $result = mysqli_query($con,$query);
        while($row=mysqli_fetch_array($result)){
            echo "<tr>";

                echo"<td>".$row['raw_mat_name']."</td>";
                echo"<td>".$row['returned_quantity']."</td>";
                echo"<td>".$row['vendor_reg_num']."</td>";
                echo"<td>₹ ".$row['unit_cost']."</td>";
                echo"<td>".$row['batch_number']."</td>";
                echo"<td>".$row['return_date']."</td>";
                echo"<td>".$row['user_reg_num']."</td>";
                echo"<td>".$row['reason']."</td>";
                echo"<td>₹ ".$row['unit_cost']*$row['returned_quantity']."</td>";


            echo "</tr>";
        }
    }

//==========================================================================================================================    
    
    
    function productCategorySearch(){
        
        $con = $this->databaseConnect();
        $str=$_POST['string'];
        
        $query = "select access.form_id, form.form_file from access,form where access.form_id=form.form_id and access.designation_name='".$_SESSION['designation']."'";
        $result = mysqli_query($con,$query);
        $flag = 0;
        while($row=mysqli_fetch_array($result)){
            if($row['form_file']=='editProductCategory.php')
            $flag=1;
        }
        
        
        $query = "SELECT * FROM
                (SELECT product_category.product_category_id,
                product_category.category_name,
                product_category.active,
                CASE product_category.active
                        WHEN 1 THEN 'ENABLED'
                    WHEN 0 THEN 'DISABLED'
                END as status
                FROM product_category) as T1
                WHERE 
                (category_name LIKE '%".$str."%' OR
                 status LIKE '%".$str."%')
                ORDER BY active DESC, category_name ASC";
        
        $result = mysqli_query($con,$query);
        
        while($row = mysqli_fetch_array($result)){
            
            echo "<tr>";
                                
                echo "<td>".$row['category_name']."</td>";
                if($row['active']==1){

                    echo "<td><span class='badge badge-success'>ENABLED</span></td>";

                    if($flag){
                        echo"<td><a data-toggle='dropdown' href='#'><i title='Edit Product Category'  class='far fa-edit edit-product-category'></i></a><input type='text' hidden value='".$row['product_category_id']."'></td>";

                        echo "<td><a data-toggle='dropdown' href='#'><i style='color:red' title='Disable'  class='far fa-trash-alt disable-product-category'></i></a><input type='text'hidden value='".$row['product_category_id']."'></td>";

                    }
                }
                else{

                    echo "<td><span class='badge badge-danger'>DISABLED</span></td>";

                    if($flag){
                        echo"<td><a data-toggle='dropdown' href='#'><i title='Edit Product Category'  class='far fa-edit edit-product-category'></i></a><input type='text' hidden value='".$row['product_category_id']."'></td>";

                        echo "<td></td>";

                    }
                }

            echo "</tr>";
            
        }
        
        echo "<script src='../jquery_main/jquery.min.js'></script>";

        echo "<script src='../control/control.js'></script>"; 
        
    }



//==========================================================================================================================

    function productSearch($post){
        
        $con = $this->databaseConnect();
        $str=$_POST['string'];
        
        $query = "select access.form_id, form.form_file from access,form where access.form_id=form.form_id and access.designation_name='".$_SESSION['designation']."'";
        $result = mysqli_query($con,$query);
        $flag = 0;
        while($row=mysqli_fetch_array($result)){
            if($row['form_file']=='editProduct.php')
            $flag=1;
        }
        
        
        $query = "SELECT * FROM
                (SELECT products.product_id,
                products.product_code,
                products.product_name,
                product_category.category_name,
                products.available_quantity,
                products.unit_cost,
                user.user_reg_num,
                products.active,
                CASE products.active
                    WHEN 1 THEN 'ENABLED'
                    WHEN 0 THEN 'DISABLED'
                END as status
                FROM user,products,product_category
                WHERE
                products.product_category_id=product_category.product_category_id AND
                user.user_id = products.added_by) AS T1 
                WHERE
                (product_code LIKE '%".$str."%' OR
                 product_name LIKE '%".$str."%' OR
                 category_name LIKE '%".$str."%' OR
                 user_reg_num LIKE '%".$str."%' OR
                 status LIKE '%".$str."%')
                ORDER BY active DESC, product_name ASC";
        
        $result = mysqli_query($con,$query);
        
        while($row = mysqli_fetch_array($result)){
            
            echo "<tr>";
            echo"<td>".$row['product_code']."</td>";
            echo"<td>".$row['product_name']."</td>";
            echo"<td>".$row['category_name']."</td>";
            echo"<td>".$row['available_quantity']."</td>";
            echo"<td>".$row['user_reg_num']."</td>";





            if($row['active']==1){
                echo "<td><span class='badge badge-success'>ENABLED</span></td>";
            }
            else{
                echo "<td><span class='badge badge-danger'>DISABLED</span></td>";
            }

            echo "<td><center><a href='#' data-toggle='modal' data-target='#modal-primary-".$row['product_id']."'><i  class='far fa-eye '></i></a></center></td>";


            if($flag){

                echo"<td><a data-toggle='dropdown' href='#'><i title='Edit Product'  class='far fa-edit edit-product'></i></a><input type='text' hidden value='".$row['product_id']."'></td>";


                if($row['active']==1){
                echo"<td><a data-toggle='dropdown' href='#'><i style='color:red' title='Disable'  class='far fa-trash-alt disable-product'></i></a><input type='text' hidden value='".$row['product_id']."'></td>";
                }
                else{
                      echo "<td></td>";
                }



            }




        echo "</tr>";


        $result2 = mysqli_query($con,"SELECT * from product_raw_mat where product_id=".(int)$row['product_id']);
        $counter=0;
        while($row2=mysqli_fetch_array($result2)){
            if($counter==0){
                $rawMatString = $row2['raw_mat'];
            }
            else{
                $rawMatString = $rawMatString.", ".$row2['raw_mat'];
            }
            $counter++;
        }

        echo "<div class='modal fade' id='modal-primary-".$row['product_id']."'>
                <div class='modal-dialog'>
                    <div class='modal-content bg-primary'>
                        <div class='modal-header'>
                            <h4 class='modal-title'>Product Description</h4>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span></button>
                        </div>
                        <div class='modal-body'>";

        echo "<div class='row'>
                <div class='col-12' style='margin-bottom:25px'><center><img style='height:200px; width:250px;background-color:white' src='../dashboard_assets/dist/product_pic/".$row['product_pic']."' class=' elevation-2' alt='Product Image'></center></div>

                <div class='col-4'>Product Name</div><div class='col-1'>:</div><div class='col-7'>".$row['product_name']."</div>
                <div class='col-4'>Category</div><div class='col-1'>:</div><div class='col-7'>".$row['category_name']."</div>
                <div class='col-4'>Raw Materials</div><div class='col-1'>:</div><div class='col-7'>".$rawMatString.".</div>";    
                //<div class='col-4'>Description</div><div class='col-1'>:</div><div class='col-7'>".$row['mini_description']."</div>
        echo "  <div class='col-4'>Unit Cost</div><div class='col-1'>:</div><div class='col-7'>₹ ".$row['unit_cost']."</div>";

        echo "<div class='col-4'>Industry Applications</div><div class='col-1'>:</div>";
        echo "<div class='col-7'>";
        $applicationCounter = 0;

        $result2 = mysqli_query($con,"SELECT industrial_applications.industry_name 
                                    FROM industrial_applications,product_industrial_application,products
                                    WHERE 
                                    industrial_applications.industrial_application_id=product_industrial_application.industrial_application_id AND
                                    product_industrial_application.product_id=products.product_id AND
                                    products.product_id=".(int)$row['product_id']);
        if(mysqli_num_rows($result2) !=0 ){

            while($row2 = mysqli_fetch_array($result2)){
                if($applicationCounter == 0){
                    echo $row2['industry_name'];
                }
                else{
                    echo ", ".$row2['industry_name'];
                }

                $applicationCounter++;
            }
            echo ".";

        }
        else{
            echo "-";
        }

        echo "</div>";

        echo "  <div class='col-4'>Documentation</div><div class='col-1'>:</div>";
        if($row['description_pdf']!=0){
            echo "<div class='col-7'><a  data-toggle='dropdown' href='#'><i class='fas fa-file-pdf product-documentation' style='color:white'></i></a><input type='text' hidden value='".$row['product_id']."'></div>";
        }        
        else{
            echo "<div class='col-7'>NA</div>";
        }        
        echo "        
            </div>
        ";


        echo"           </div>
                    </div>
                </div>
            </div>";
            
        }
        
        
        echo "<script src='../jquery_main/jquery.min.js'></script>";

        echo "<script src='../control/control.js'></script>";
    }

//==========================================================================================================================    
    
    function industrySearch($post){
                                                                                //Industry Search
        $con = $this->databaseConnect();
        $str=$_POST['string'];
        
        $query = "select access.form_id, form.form_file from access,form where access.form_id=form.form_id and access.designation_name='".$_SESSION['designation']."'";
        $result = mysqli_query($con,$query);
        $flag = 0;
        while($row=mysqli_fetch_array($result)){
            if($row['form_file']=='addManufacturedProduct.php')
            $flag=1;
        }
        
        
        $query = "SELECT * FROM 
                (SELECT industrial_applications.industrial_application_id,
                industrial_applications.industry_name,
                industrial_applications.active,
                CASE industrial_applications.active
                    WHEN 1 THEN 'ENABLED'
                    WHEN 0 THEN 'DISABLED'
                END AS status
                FROM industrial_applications) AS T1
                WHERE
                (industry_name LIKE '%".$str."%' OR
                status LIKE '%".$str."%')
                ORDER BY active DESC,industry_name ASC";
        
        $result = mysqli_query($con,$query);
        
        while($row = mysqli_fetch_array($result)){
               
            echo "<tr>";
            echo"<td>".$row['industry_name']."</td>";

            if($row['active']==1){
                echo "<td><span class='badge badge-success'>ENABLED</span></td>";
            }
            else{
                echo "<td><span class='badge badge-danger'>DISABLED</span></td>";
            }

            if($flag){

                echo"<td><a data-toggle='dropdown' href='#'><i  class='far fa-edit edit-industrial-application'></i></a><input type='text' hidden value='".$row['industrial_application_id']."'></td>";


                if($row['active']==1){
                echo"<td><a data-toggle='dropdown' href='#'><i style='color:red' class='far fa-trash-alt disable-industrial-application'></i></a><input type='text' hidden value='".$row['industrial_application_id']."'></td>";
                }
                else{
                      echo "<td></td>";
                }



            }




        echo "</tr>";

            
        }
        
        
        echo "<script src='../jquery_main/jquery.min.js'></script>";

        echo "<script src='../control/control.js'></script>";
    }
    

//==========================================================================================================================

    function manufacturedProductSearch($post){
                                                                                //Manufactured Product Search
        $con = $this->databaseConnect();
        $str=$_POST['string'];
        
        $query = "select access.form_id, form.form_file from access,form where access.form_id=form.form_id and access.designation_name='".$_SESSION['designation']."'";
        $result = mysqli_query($con,$query);
        $flag = 0;
        while($row=mysqli_fetch_array($result)){
            if($row['form_file']=='sales.php')
            $flag=1;
        }
        
        $query = "SELECT * FROM 
		(SELECT products_manufactured.product_manufacture_id,
                products.product_name,
                products_manufactured.manufacture_date,
                DATE_FORMAT(products_manufactured.manufacture_date,'%d %b, %Y') as date,
                products_manufactured.batch_number,
                products_manufactured.status,
                user.user_reg_num,
                CASE products_manufactured.status
                    WHEN 1 THEN 'SOLD'
                    WHEN 0 THEN 'AVAILABLE'
                END AS sale_status
                FROM products,products_manufactured,user
                WHERE
                products.product_id=products_manufactured.product_id AND
                user.user_id=products_manufactured.manufactured_by) AS T1
                WHERE
                (product_name LIKE '%".$str."%' OR
                 date LIKE '%".$str."%' OR
                 batch_number LIKE '%".$str."%' OR
                 user_reg_num LIKE '%".$str."%' OR
                 sale_status LIKE '%".$str."%')
                ORDER BY product_manufacture_id DESC,
                manufacture_date DESC";
        
        $result = mysqli_query($con,$query);
        
        while($row = mysqli_fetch_array($result)){
            
            echo "<tr>";
            echo"<td>".$row['product_name']."</td>";
            echo"<td>".date("d M, Y",strtotime($row['manufacture_date']))."</td>";
            echo"<td>".$row['batch_number']."</td>";
            echo"<td>".$row['user_reg_num']."</td>";

            echo"<td><a href='#' data-toggle='modal' data-target='#modal-primary-".$row['product_manufacture_id']."'><i  class='far fa-eye '></i></a><input type='text'hidden value='".$row['product_manufacture_id']."'></td>";

            if($row['status']==0){
                echo"<td><span class='badge badge-success'>AVAILABLE</span></td>";
                if($flag)
                    echo"<td><b>-</b></td>";
            }
            else{
                echo "<td><span class='badge badge-danger'>SOLD</span></td>";


                $result2 = mysqli_query($con,"SELECT sale_product_batch_numbers.product_manufacture_id,
                                            sale_products.sale_id
                                            FROM sale_product_batch_numbers,sale_products
                                            WHERE 
                                            sale_products.sale_product_id=sale_product_batch_numbers.sale_product_id AND 
                                            sale_product_batch_numbers.product_manufacture_id=".(int)$row['product_manufacture_id']);

                while($row2 = mysqli_fetch_array($result2)){
                    $saleId = $row2['sale_id']; 
                    break;        
                }

                if($flag)
                    echo"<td><a href='#'><i style='color:black' class='far fa-file-alt view-more-sale'></i></a><input type='text'hidden value='".$saleId."'><span hidden>1</span></td>";
            }


        echo "</tr>";

        echo "<div class='modal fade' id='modal-primary-".$row['product_manufacture_id']."'>
                <div class='modal-dialog'>
                    <div class='modal-content bg-primary'>
                        <div class='modal-header'>
                            <h4 class='modal-title'>Quantities Of Raw Materials Used</h4>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span></button>
                        </div>
                        <div class='modal-body'>";

                        $result3=mysqli_query($con,"SELECT * from products_manufactured_raw_mat_quantity WHERE product_manufacture_id=".(int)$row['product_manufacture_id']);
                        while($row3 = mysqli_fetch_array($result3)){
                            echo "<div class='row'>
                                    <div class='col-4'>".$row3['raw_mat_name']."</div>
                                    <div class='col-1'>:</div>
                                    <div class='col-3'>".$row3['quantity']."</div>
                                    <div class='col-5'></div>
                                  </div>  
                            ";


                        }

        echo"           </div>
                    </div>
                </div>
            </div>";

            
        }
        
        
        echo "<script src='../jquery_main/jquery.min.js'></script>";

        echo "<script src='../control/control.js'></script>";
    }

//==========================================================================================================================

    function saleSearch($post){
                                                                                //Sale Search
        $con = $this->databaseConnect();
        $str=$_POST['string'];
        
        
        $query = "SELECT sale.sale_id,
                sale.invoice_number,
                sale.sale_date,
                DATE_FORMAT(sale.sale_date, '%d %b, %Y'),
                sale.customer_name,
                sale.customer_email,
                sale.customer_number,
                user.user_reg_num
                FROM sale,user
                WHERE
                sale.seller_id=user.user_id AND
                (invoice_number LIKE '%".$str."%' OR
                 DATE_FORMAT(sale.sale_date, '%d %b, %Y') LIKE '%".$str."%' OR
                 customer_name LIKE '%".$str."%' OR
                 customer_email LIKE '%".$str."%' OR
                 customer_number LIKE '%".$str."%' OR
                 user_reg_num LIKE '%".$str."%')
                ORDER BY sale_date DESC, sale_id DESC";
        
        $result = mysqli_query($con,$query);
        
        while($row = mysqli_fetch_array($result)){
            
            echo "<tr>";
            echo "<td>".date("d M, Y",strtotime($row['sale_date']))."</td>";
            echo "<td>".$row['invoice_number']."</td>";
            echo "<td>".$row['customer_name']."</td>";
            echo "<td>".$row['customer_email']."</td>";
            echo "<td>".$row['customer_number']."</td>";
            echo "<td>".$row['user_reg_num']."</td>";

            echo "<td><a href='#'><i style='color:black;' class='fas fa-file-invoice generate-invoice'></i></a><input type='text'hidden value='".$row['sale_id']."'></td>";
            echo "<td><a href='#'><i  class='far fa-eye view-more-sale'></i></a><input type='text'hidden value='".$row['sale_id']."'><span hidden>0</span></td>";

            echo "</tr>";
            
        }
        
        
        echo "<script src='../jquery_main/jquery.min.js'></script>";

        echo "<script src='../control/control.js'></script>";
    }
     
      
     
    

//==========================================================================================================================    
  
    
    function onSiteInquirySearch($post){
                                                                                //On Site Inquiry Search
        $con = $this->databaseConnect();
        $str=$_POST['string'];
        
        $query3 = "select access.form_id, form.form_file from access,form where access.form_id=form.form_id and access.designation_name='".$_SESSION['designation']."'";
        $result3 = mysqli_query($con,$query3);
        $flag = 0;
        while($row3=mysqli_fetch_array($result3)){
            if($row3['form_file']=='inquiryFollowUp.php')
            $flag=1;
        }
        
        $flag2 =0;             
        $query3 = "select access.form_id, form.form_file from access,form where access.form_id=form.form_id and access.designation_name='".$_SESSION['designation']."'";
        $result3 = mysqli_query($con,$query3);
        while($row3=mysqli_fetch_array($result3)){
            if($row3['form_file']=='addSale.php')
            $flag2=1;
        }
        
        $query = "SELECT * FROM
                (SELECT onsite_inquiry.inquiry_id,
                onsite_inquiry.inquiry_reg_num,
                onsite_inquiry.customer_name,
                onsite_inquiry.customer_email,
                onsite_inquiry.customer_phone,
                onsite_inquiry.inquiry_date,
                DATE_FORMAT(onsite_inquiry.inquiry_date,'%d %b, %Y') as date,
                user.user_reg_num
                FROM user,onsite_inquiry
                WHERE 
                user.user_id=onsite_inquiry.inquiry_taker) AS T1
                WHERE
                inquiry_reg_num LIKE '%".$str."%' OR
                customer_name LIKE '%".$str."%' OR
                customer_email LIKE '%".$str."%' OR
                customer_phone LIKE '%".$str."%' OR
                date LIKE '%".$str."%' OR
                user_reg_num LIKE '".$str."%'
                ORDER BY inquiry_date DESC, inquiry_id DESC";
        
        $result = mysqli_query($con,$query);
        
        while($row = mysqli_fetch_array($result)){

            echo "<tr>
                    <td>".$row['inquiry_reg_num']."</td>
                    <td>".date("d M, Y",strtotime($row['inquiry_date']))."</td>    
                    <td>".$row['customer_name']."</td>
                    <td>".$row['customer_email']."</td>
                    <td>".$row['customer_phone']."</td>";


                 echo  "<td> <center> <a data-toggle='dropdown' href='#'><i title='Description'  class='far fa-eye view-more-inquiry'></i></a><input hidden type='text' value='".$row['inquiry_id']."'> </center> </td>";




                 if($flag){


                     echo "<td> 
                        <center>
                            <a data-toggle='dropdown' href='#'><i style='color:black' title='Follow Up' class='fas fa-redo follow-up'></i></a>
                            <input hidden type='text' value='".$row['inquiry_id']."'> </center></td>";



                 }

                 if($flag2){
                     echo "<td> 
                        <center>
                            <a data-toggle='dropdown' href='#'><i style='color:black' title='Confirm Sale' class='fas fa-shopping-cart confirm-sale'></i></a>
                            <input hidden type='text' value='".$row['inquiry_id']."'></center></td>";
                 }






                  echo "</tr>";

            
        }
        
        
        echo "<script src='../jquery_main/jquery.min.js'></script>";

        echo "<script src='../control/control.js'></script>";
    }
     
      
 

//==========================================================================================================================    

    function webInquirySearch($post){
                                                                                //Web Inquiry Search
        $con = $this->databaseConnect();
        $str=$_POST['string'];
        
        
        
        $query = "SELECT * FROM
                (SELECT web_inquiry.web_inquiry_id,
                web_inquiry.web_inquiry_reg_num,
                web_inquiry.inquirer_name,
                web_inquiry.inquirer_email,
                web_inquiry.inquirer_number,
                web_inquiry.inquiry_date,
                DATE_FORMAT(web_inquiry.inquiry_date,'%d %b, %Y') as date,
                web_inquiry.product_id,
                web_inquiry.inquiry_allocated_to,
                CASE web_inquiry.inquiry_allocated_to
                 WHEN 0 THEN 'ALLOCATE'
                END AS alloc, 
                products.product_name
                FROM web_inquiry,products
                WHERE
                products.product_id=web_inquiry.product_id AND 
                web_inquiry.inquiry_allocated_to=0) AS T1 
                WHERE
                web_inquiry_reg_num LIKE '%".$str."%' OR
                date LIKE '%".$str."%' OR
                inquirer_name LIKE '%".$str."%' OR
                inquirer_email LIKE '%".$str."%' OR
                product_name LIKE '%".$str."%' OR    
                alloc LIKE '%".$str."%'
                ORDER BY inquiry_date DESC, web_inquiry_id DESC";
        
        $result = mysqli_query($con,$query);
        
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>".$row['web_inquiry_reg_num']."</td>";
                echo "<td>".date("d M, Y", strtotime($row['inquiry_date']))."</td>";
                echo "<td>".$row['inquirer_name']."</td>";
                echo "<td>".$row['inquirer_email']."</td>";
                echo "<td>".$row['product_name']."</td>";
                echo "<td><center><a href='#'><i class='far fa-eye' title='View More' data-toggle='modal' data-target='#modal-primary-".$row['web_inquiry_id']."'></i></a></center></td>";
                echo "<td><a href='javascript:void(0)'><span class='badge badge-warning allocate-button' data-toggle='modal' data-target='#allocate-inq-modal".$row['web_inquiry_id']."'>ALLOCATE</span></a><input type='text' hidden id='inq-id' value='".$row['web_inquiry_id']."'></td>";
            echo "</tr>";
        }
        
        $query = "SELECT * FROM
                (SELECT web_inquiry.web_inquiry_id,
                web_inquiry.web_inquiry_reg_num,
                web_inquiry.inquirer_name,
                web_inquiry.inquirer_email,
                web_inquiry.inquirer_number,
                web_inquiry.inquiry_date,
                DATE_FORMAT(web_inquiry.inquiry_date,'%d %b, %Y') as date,
                web_inquiry.product_id,
                web_inquiry.inquiry_allocated_to,
                CASE web_inquiry.inquiry_allocated_to
                 WHEN web_inquiry.inquiry_allocated_to THEN CONCAT(user.user_reg_num,' - ',user.user_name)
                END AS alloc, 
                products.product_name
                FROM web_inquiry,products,user
                WHERE
                user.user_id=web_inquiry.inquiry_allocated_to AND
                products.product_id=web_inquiry.product_id AND 
                web_inquiry.inquiry_allocated_to>0) AS T1
                WHERE
                web_inquiry_reg_num LIKE '%".$str."%' OR
                date LIKE '%".$str."%' OR
                inquirer_name LIKE '%".$str."%' OR
                inquirer_email LIKE '%".$str."%' OR
                product_name LIKE '%".$str."%' OR    
                alloc LIKE '%".$str."%'
                ORDER BY inquiry_date DESC, web_inquiry_id DESC";
        
        $result = mysqli_query($con,$query);
        
        while($row = mysqli_fetch_array($result)){
            
            echo "<tr>";
                echo "<td>".$row['web_inquiry_reg_num']."</td>";
                echo "<td>".date("d M, Y", strtotime($row['inquiry_date']))."</td>";
                echo "<td>".$row['inquirer_name']."</td>";
                echo "<td>".$row['inquirer_email']."</td>";
                echo "<td>".$row['product_name']."</td>";
                echo "<td><center><a href='#'><i class='far fa-eye' title='View More' data-toggle='modal' data-target='#modal-primary-".$row['web_inquiry_id']."'></i></a></center></td>";
                echo "<td>".$row['alloc']."</td>";
            echo "</tr>";
            
        }
        
        
        echo "<script src='../jquery_main/jquery.min.js'></script>";

        echo "<script src='../control/control.js'></script>";
    }
     
      
    

//==========================================================================================================================    

     
    function assignedWebInquirySearch($post){
                                                                                //Assigned Web Inquiry Search
        $con = $this->databaseConnect();
        $str=$_POST['string'];
        
        $query2 = "select access.form_id, form.form_file from access,form where access.form_id=form.form_id and access.designation_name='".$_SESSION['designation']."'";
        $result2 = mysqli_query($con,$query2);
        $flag = 0;
        while($row2=mysqli_fetch_array($result2)){
            if($row2['form_file']=='addInquiry.php')
            $flag=1;
        }
        
        $result = mysqli_query($con,"SELECT * FROM user WHERE email='".$_SESSION['email']."'");
          while($row = mysqli_fetch_array($result)){
              $myUserId = $row['user_id'];

              break;
          }
        
        $query = "SELECT * FROM 
                (SELECT web_inquiry.web_inquiry_id,
                web_inquiry.web_inquiry_reg_num,
                web_inquiry.inquirer_name,
                web_inquiry.inquirer_email,
                web_inquiry.inquirer_number,
                web_inquiry.inquiry_date,
                DATE_FORMAT(web_inquiry.inquiry_date,'%d %b, %Y') AS date, 
                web_inquiry.product_id,
                web_inquiry.inquiry_allocated_to,
                web_inquiry.appointment_timestamp,
                products.product_name,
                'PENDING' schedule_date
                FROM web_inquiry,products
                WHERE
                products.product_id=web_inquiry.product_id AND
                web_inquiry.inquiry_allocated_to=".(int)$myUserId." AND
                web_inquiry.appointment_call=0) AS T1 
                WHERE
                web_inquiry_reg_num LIKE '%".$str."%' OR
                inquirer_name LIKE '%".$str."%' OR
                inquirer_email LIKE '%".$str."%' OR
                inquirer_number LIKE '%".$str."%' OR
                date LIKE '%".$str."%' OR
                schedule_date LIKE '%".$str."%' OR
                product_name LIKE '%".$str."%'
                ORDER BY inquiry_date DESC, web_inquiry_id DESC";
        
        $result = mysqli_query($con,$query);
        
        while($row = mysqli_fetch_array($result)){

            echo "<tr>";
                            
            echo "<td>".$row['web_inquiry_reg_num']."</td>";
            echo "<td>".date("d M, Y", strtotime($row['inquiry_date']))."</td>";
            echo "<td>".$row['inquirer_name']."</td>";
            echo "<td>".$row['inquirer_email']."</td>";
            echo "<td>".$row['inquirer_number']."</td>";
            echo "<td>".$row['product_name']."</td>";
            echo "<td><span class='badge badge-warning'>PENDING</span></td>";

            if($flag)
                echo "<td><a href='#' title='Schedule Appointment' data-toggle='modal' data-target='#appointment-modal-".$row['web_inquiry_id']."'><i class='far fa-calendar-check '></i></a></td>";
            else
                echo "<td></td>";

            echo "</tr>";

            
        }
        
        $query = "SELECT * FROM 
                (SELECT web_inquiry.web_inquiry_id,
                web_inquiry.web_inquiry_reg_num,
                web_inquiry.inquirer_name,
                web_inquiry.inquirer_email,
                web_inquiry.inquirer_number,
                web_inquiry.inquiry_date,
                DATE_FORMAT(web_inquiry.inquiry_date,'%d %b, %Y') AS date, 
                web_inquiry.product_id,
                web_inquiry.inquiry_allocated_to,
                web_inquiry.appointment_timestamp,
                DATE_FORMAT(web_inquiry.appointment_timestamp,'%d %b, %Y') AS schedule_date,
                products.product_name
                FROM web_inquiry,products
                WHERE
                products.product_id=web_inquiry.product_id AND
                web_inquiry.inquiry_allocated_to=".(int)$myUserId." AND
                web_inquiry.appointment_call=1) AS T1 
                WHERE
                web_inquiry_reg_num LIKE '%".$str."%' OR
                inquirer_name LIKE '%".$str."%' OR
                inquirer_email LIKE '%".$str."%' OR
                inquirer_number LIKE '%".$str."%' OR
                date LIKE '%".$str."%' OR
                schedule_date LIKE '%".$str."%' OR
                product_name LIKE '%".$str."%'
                ORDER BY inquiry_date DESC, web_inquiry_id DESC";
        $result = mysqli_query($con,$query);
        
        while($row = mysqli_fetch_array($result)){
            
            echo "<tr>";
                            
            echo "<td>".$row['web_inquiry_reg_num']."</td>";
            echo "<td>".date("d M, Y", strtotime($row['inquiry_date']))."</td>";
            echo "<td>".$row['inquirer_name']."</td>";
            echo "<td>".$row['inquirer_email']."</td>";
            echo "<td>".$row['inquirer_number']."</td>";
            echo "<td>".$row['product_name']."</td>";
            echo "<td>".date("d M, Y", strtotime($row['appointment_timestamp']))."</td>";

            if($flag){

                echo "<td><a href='#' title='Take Inquiry'><i style='color:black' class='fas fa-arrow-right take-scheduled-appointment'></i></a><input type='text' hidden value='".$row['web_inquiry_id']."'></td>";

            }
            else{
                echo "<td></td>";
            }

            echo "</tr>";
            
        }
        
        
        echo "<script src='../jquery_main/jquery.min.js'></script>";

        echo "<script src='../control/control.js'></script>";
    }
     
 

//==========================================================================================================================    
    
     
    function servicedProductSearch($post){
                                                                                //Serviced Product Search
        $con = $this->databaseConnect();
        $str=$_POST['string'];
        
        $query = "select access.form_id, form.form_file from access,form where access.form_id=form.form_id and access.designation_name='".$_SESSION['designation']."'";
        $result = mysqli_query($con,$query);
        $flag = 0;
        while($row=mysqli_fetch_array($result)){
            if($row['form_file']=='addProduct.php')
            $flag=1;
        }
        
        $query = "SELECT * FROM 
                (SELECT service.service_id,
                service.service_reg_num,
                service.product_manufacture_id,
                products_manufactured.product_id,
                products.product_name,
                service.date,
                DATE_FORMAT(service.date,'%d %b, %Y') AS date_new,
                service.return_date,
                service.defect_description,
                service.charges,
                service.status,
                CASE service.status
                    WHEN 0 THEN 'IN SERVICE'
                    WHEN 1 THEN 'DONE'
                    WHEN 2 THEN 'RETURNED'
                END AS status_new,
                service.service_taker,
                products_manufactured.batch_number,
                user.user_reg_num,user.user_name, 
                sale_products.sale_id,
                sale.customer_name,
                sale.invoice_number,
                sale.customer_email,
                sale.customer_number,
                sale.delivery_address,
                sale.delivery_city,
                sale.delivery_pin_code,
                sale.delivery_state
                FROM service,products_manufactured,user,products,sale_product_batch_numbers,sale_products,sale
                WHERE service.product_manufacture_id=products_manufactured.product_manufacture_id AND
                user.user_id=service.service_taker AND
                products.product_id=products_manufactured.product_id AND
                sale_product_batch_numbers.product_manufacture_id=service.product_manufacture_id AND
                sale_products.sale_product_id=sale_product_batch_numbers.sale_product_id AND
                sale.sale_id=sale_products.sale_id) AS T1        
                WHERE
                service_reg_num LIKE '%".$str."%' OR
                product_name LIKE '%".$str."%' OR
                batch_number LIKE '%".$str."%' OR
                date_new LIKE '%".$str."%' OR
                user_reg_num LIKE '%".$str."%' OR
                status_new LIKE '%".$str."%'
                ORDER BY date DESC, service_id DESC";
        
        $result = mysqli_query($con,$query);
        
        while($row = mysqli_fetch_array($result)){
            
            echo "<tr>";
                echo "<td>".$row['service_reg_num']."</td>";
                echo "<td>".$row['product_name']."</td>";
                echo "<td>".$row['batch_number']."</td>";
                echo "<td>".date("d M, Y", strtotime($row['date']))."</td>";
                echo "<td>".$row['user_reg_num']."</td>";
                echo "<td><a href='#'><i class='far fa-eye' title='View More' data-toggle='modal' data-target='#modal-primary-".$row['service_id']."'></i></a></td>";


                if($row['status']==0){
                    echo "<td><span class='badge badge-warning'>IN SERVICE</span></td>";
                }
                else if($row['status']==1){
                    echo "<td><span class='badge badge-info'>DONE</span></td>";
                }
                else{
                    echo "<td><span class='badge badge-success'>RETURNED</span></td>";
                }


                if($row['status']==0){
                    echo "<td><a data-toggle='dropdown' href='#'><i title='Mark as Done' class='text-info far fa-check-square mark-service-done'></i></a><input hidden type='text' value='".$row['service_id']."'></td>";
                }
                else if($row['status']==1){
                    echo "<td><a data-toggle='dropdown' href='#'><i title='Mark as Returned' class='text-success far fa-check-square mark-service-returned'></i></a><input hidden type='text' value='".$row['service_id']."'></td>";
                }
                else{
                    echo "<td></td>";
                }

            echo "</tr>";

            
        }
        
        
        echo "<script src='../jquery_main/jquery.min.js'></script>";

        echo "<script src='../control/control.js'></script>";
    }
     
      
     
   

//==========================================================================================================================    
    
    
     
    function applicantSearch($post){
                                                                                //Applicant Search
        $con = $this->databaseConnect();
        $str=$_POST['string'];
        
        
        
        $query = "SELECT * FROM recruitment
                  WHERE
                  name LIKE '%".$str."%' OR
                  email_id LIKE '%".$str."%' OR
                  contact_no LIKE '%".$str."%' OR
                  highest_qualification LIKE '%".$str."%' OR
                  specialization_field LIKE '%".$str."%'
                ";
        
        $result = mysqli_query($con,$query);
        
        while($row = mysqli_fetch_array($result)){
            
            echo "<tr>";
                            
                echo "<td>".$row['name']."</td>
                <td>".$row['email_id']."</td>
                <td>".$row['contact_no']."</td>";

                echo "<td>".$row['highest_qualification']."</td>
                <td>".$row['specialization_field']."</td>";


                echo"<td><center><a href='#' data-toggle='modal' data-target='#modal-primary-".$row['recruitment_id']."'><i  class='far fa-eye' style='color:black;'></i></a><input type='text'hidden value='".$row['recruitment_id']."'></center></td>";

                echo  "<td><a data-toggle='dropdown' href='#'><i style='color:red'  class='far fa-trash-alt delete-applicant'></i></a><input hidden type='text' value='".$row['recruitment_id']."'></td>


            </tr>";


            
        }
        
        
        echo "<script src='../jquery_main/jquery.min.js'></script>";

        echo "<script src='../control/control.js'></script>";
    }
     
      
     
    

//==========================================================================================================================    
    
    
     
    function makeRequestTableSearch($post){
                                                                                //Make Request Table Search
        $con = $this->databaseConnect();
        $str=$_POST['string'];
        
        
        
        $query = "SELECT * FROM
                (SELECT request.request_id,
                request.request_type,
                user.user_id,
                user.email,
                request.request_date,
                DATE_FORMAT(request.request_date,'%d %b, %Y') AS date_new,
                request.amount,
                request.reason,
                request.status,
                CASE request.status
                    WHEN 0 THEN 'PENDING'
                    WHEN 1 THEN 'APPROVED'
                    ELSE 'REJECTED'
                END AS status_new
                FROM request,user
                WHERE 
                user.email='".$_SESSION['email']."' AND
                request.requester_id = user.user_id) AS T1
                WHERE
                date_new LIKE '%".$str."%' OR
                request_type LIKE '%".$str."%' OR
                reason LIKE '%".$str."%' OR
                amount LIKE '%".$str."%' OR
                status_new LIKE '%".$str."%'
                ORDER BY request_date DESC,request_id DESC";
        
        $result = mysqli_query($con,$query);
        
        while($row = mysqli_fetch_array($result)){

             echo "<tr>";
                            
             echo "<td>".date("d M, Y",strtotime($row['request_date']))."</td>"; 
             echo "<td>".$row['request_type']."</td>";
             echo "<td>".$row['reason']."</td>"; 
             if($row['request_type']=="Fund")
                echo "<td>₹ ".$row['amount']."</td>";
             else
                echo "<td>".$row['amount']."</td>"; 

             if($row['status']==0){
                 echo "<td><span class='badge badge-warning'>PENDING</span></td>";
             }
             else if($row['status']==1){
                 echo"<td><span class='badge badge-success'>APPROVED</span></td>";
             }
             else{
                 echo"<td><span class='badge badge-danger'>REJECTED</span></td>";
             }

            echo "</tr>";
                        
        }
        
        
        echo "<script src='../jquery_main/jquery.min.js'></script>";

        echo "<script src='../control/control.js'></script>";
    }
     
      
     
    

//==========================================================================================================================    
    
    
     
    function manageRequestProductSearch($post){
                                                                                //Manage Request Product Search
        $con = $this->databaseConnect();
        $str=$_POST['string'];
        
        
        
        $query = "SELECT * FROM
                (SELECT request.request_id,
                user.user_id,
                user.email,
                user.user_name,
                user.designation_name,
                user.phone,
                request.request_date,
                DATE_FORMAT(request.request_date,'%d %b, %Y') AS date,
                request.amount,
                request.reason,
                request.status,
                CASE request.status
                 WHEN 0 THEN 'PENDING'
                 WHEN 1 THEN 'APPROVED'
                 ELSE 'REJECTED'
                END AS status_new, 
                request.request_handler,
                'PENDING' handler_new
                FROM request,user
                WHERE
                request.requester_id = user.user_id AND
                request.request_type='Product' AND
                request.status=0

                UNION

                SELECT T.*,user.user_reg_num handler_new FROM
                (SELECT request.request_id,
                user.user_id,
                user.email,
                user.user_name,
                user.designation_name,
                user.phone,
                request.request_date,
                DATE_FORMAT(request.request_date,'%d %b, %Y') AS date,
                request.amount,
                request.reason,
                request.status,
                CASE request.status
                 WHEN 0 THEN 'PENDING'
                 WHEN 1 THEN 'APPROVED'
                 ELSE 'REJECTED'
                END AS status_new, 
                request.request_handler 
                FROM request,user
                WHERE
                request.requester_id = user.user_id AND
                request.request_type='Product' AND
                request.status>0) AS T,user
                WHERE
                user.user_id=request_handler) AS T1
                WHERE
                user_name LIKE '%".$str."%' OR
                designation_name LIKE '%".$str."%' OR
                email LIKE '%".$str."%' OR
                phone LIKE '%".$str."%' OR
                reason LIKE '%".$str."%' OR
                handler_new LIKE '%".$str."%' OR
                status_new LIKE '%".$str."%'
                ORDER BY request_date DESC, request_id DESC";
        
        $result = mysqli_query($con,$query);
        
        while($row = mysqli_fetch_array($result)){
            
            echo "<tr>
                            
                            
            <td>".$row['user_name']."</td>
            <td>".$row['designation_name']."</td>
            <td>".$row['email']."</td>
            <td>".$row['phone']."</td>
            <td>".$row['amount']."</td>
            <td>".$row['reason']."</td>";

            if($row['status']==0){

                echo "<td><span class='badge badge-warning'>PENDING</span></td>";
            }
            else{

                $result2 = mysqli_query($con,"SELECT * FROM user WHERE user_id=".(int)$row['request_handler']);
                while($row2=mysqli_fetch_array($result2)){
                    $requestHandler = $row2['user_reg_num'];
                    break;
                }

                echo "<td>".$requestHandler."</td>";
            }

            if($row['status']==0){
                if($row['email']!=$_SESSION['email']){
                    echo "<td> 
                    <a data-toggle='dropdown' href='#'><i style='color:green' title='Approve Request' class='far fa-check-square approve-request-2'></i></a><input hidden type='text' value='".$row['request_id']."'>
                    <a data-toggle='dropdown' href='#' style='margin-left:20px'><i style='color:red' title='Reject Request' class='far fa-times-circle reject-request-2'></i></a>
                   </td>";
                }
                else{
                    echo "<td></td>";
                }

             }
             else if($row['status']==1){
                 echo"<td><span class='badge badge-success'>APPROVED</span></td>";
             }
             else{
                 echo"<td><span class='badge badge-danger'>REJECTED</span></td>";
             }


            echo"</tr>";

            
        }
        
        
        echo "<script src='../jquery_main/jquery.min.js'></script>";

        echo "<script src='../control/control.js'></script>";
    }
     
      
     
    

//==========================================================================================================================    
    
    
     
    function manageRequestRawMatSearch($post){
                                                                                //Manage Request Raw Material Search
        $con = $this->databaseConnect();
        $str=$_POST['string'];
        
        
        $query = "SELECT * FROM
                (SELECT request.request_id,
                user.user_id,
                user.email,
                user.user_name,
                user.designation_name,
                user.phone,
                request.request_date,
                DATE_FORMAT(request.request_date,'%d %b, %Y') AS date,
                request.amount,
                request.reason,
                request.status,
                CASE request.status
                 WHEN 0 THEN 'PENDING'
                 WHEN 1 THEN 'APPROVED'
                 ELSE 'REJECTED'
                END AS status_new, 
                request.request_handler,
                'PENDING' handler_new
                FROM request,user
                WHERE
                request.requester_id = user.user_id AND
                request.request_type='Raw Material' AND
                request.status=0

                UNION

                SELECT T.*,user.user_reg_num handler_new FROM
                (SELECT request.request_id,
                user.user_id,
                user.email,
                user.user_name,
                user.designation_name,
                user.phone,
                request.request_date,
                DATE_FORMAT(request.request_date,'%d %b, %Y') AS date,
                request.amount,
                request.reason,
                request.status,
                CASE request.status
                 WHEN 0 THEN 'PENDING'
                 WHEN 1 THEN 'APPROVED'
                 ELSE 'REJECTED'
                END AS status_new, 
                request.request_handler 
                FROM request,user
                WHERE
                request.requester_id = user.user_id AND
                request.request_type='Raw Material' AND
                request.status>0) AS T,user
                WHERE
                user.user_id=request_handler) AS T1
                WHERE
                user_name LIKE '%".$str."%' OR
                designation_name LIKE '%".$str."%' OR
                email LIKE '%".$str."%' OR
                phone LIKE '%".$str."%' OR
                reason LIKE '%".$str."%' OR
                handler_new LIKE '%".$str."%' OR
                status_new LIKE '%".$str."%'
                ORDER BY request_date DESC, request_id DESC";
        
        $result = mysqli_query($con,$query);
        
        while($row = mysqli_fetch_array($result)){

            echo "<tr>
                            
                            
            <td>".$row['user_name']."</td>
            <td>".$row['designation_name']."</td>
            <td>".$row['email']."</td>
            <td>".$row['phone']."</td>
            <td>".$row['amount']."</td>
            <td>".$row['reason']."</td>";

            if($row['status']==0){

                echo "<td><span class='badge badge-warning'>PENDING</span></td>";
            }
            else{

                $result2 = mysqli_query($con,"SELECT * FROM user WHERE user_id=".(int)$row['request_handler']);
                while($row2=mysqli_fetch_array($result2)){
                    $requestHandler = $row2['user_reg_num'];
                    break;
                }

                echo "<td>".$requestHandler."</td>";
            }

            if($row['status']==0){
                if($row['email']!=$_SESSION['email']){
                    echo "<td> 
                    <a data-toggle='dropdown' href='#'><i style='color:green' title='Approve Request' class='far fa-check-square approve-request-2'></i></a><input hidden type='text' value='".$row['request_id']."'>
                    <a data-toggle='dropdown' href='#' style='margin-left:20px'><i style='color:red' title='Reject Request' class='far fa-times-circle reject-request-2'></i></a>
                   </td>";
                }
                else{
                    echo "<td></td>";
                }

             }
             else if($row['status']==1){
                 echo"<td><span class='badge badge-success'>APPROVED</span></td>";
             }
             else{
                 echo"<td><span class='badge badge-danger'>REJECTED</span></td>";
             }


            echo"</tr>";
            
        }
        
        
        echo "<script src='../jquery_main/jquery.min.js'></script>";

        echo "<script src='../control/control.js'></script>";
    }
     
      
     
    

//==========================================================================================================================    
    
    
     
    function manageRequestFundSearch($post){
                                                                                //Manage Request Fund Search
        $con = $this->databaseConnect();
        $str=$_POST['string'];
        
        
        $query = "SELECT * FROM
                (SELECT request.request_id,
                user.user_id,
                user.email,
                user.user_name,
                user.designation_name,
                user.phone,
                request.request_date,
                DATE_FORMAT(request.request_date,'%d %b, %Y') AS date,
                request.amount,
                request.reason,
                request.status,
                CASE request.status
                 WHEN 0 THEN 'PENDING'
                 WHEN 1 THEN 'APPROVED'
                 ELSE 'REJECTED'
                END AS status_new, 
                request.request_handler,
                'PENDING' handler_new
                FROM request,user
                WHERE
                request.requester_id = user.user_id AND
                request.request_type='Fund' AND
                request.status=0

                UNION

                SELECT T.*,user.user_reg_num handler_new FROM
                (SELECT request.request_id,
                user.user_id,
                user.email,
                user.user_name,
                user.designation_name,
                user.phone,
                request.request_date,
                DATE_FORMAT(request.request_date,'%d %b, %Y') AS date,
                request.amount,
                request.reason,
                request.status,
                CASE request.status
                 WHEN 0 THEN 'PENDING'
                 WHEN 1 THEN 'APPROVED'
                 ELSE 'REJECTED'
                END AS status_new, 
                request.request_handler 
                FROM request,user
                WHERE
                request.requester_id = user.user_id AND
                request.request_type='Fund' AND
                request.status>0) AS T,user
                WHERE
                user.user_id=request_handler) AS T1
                WHERE
                user_name LIKE '%".$str."%' OR
                designation_name LIKE '%".$str."%' OR
                email LIKE '%".$str."%' OR
                phone LIKE '%".$str."%' OR
                amount LIKE '%".$str."%' OR
                reason LIKE '%".$str."%' OR
                handler_new LIKE '%".$str."%' OR
                status_new LIKE '%".$str."%'
                ORDER BY request_date DESC, request_id DESC";
        
        $result = mysqli_query($con,$query);
        
        while($row = mysqli_fetch_array($result)){
            
            echo "<tr>
                            
                            
            <td>".$row['user_name']."</td>
            <td>".$row['designation_name']."</td>
            <td>".$row['email']."</td>
            <td>".$row['phone']."</td>
            <td>₹ ".$row['amount']."</td>
            <td>".$row['reason']."</td>";

            if($row['status']==0){

                echo "<td><span class='badge badge-warning'>PENDING</span></td>";
            }
            else{

                $result2 = mysqli_query($con,"SELECT * FROM user WHERE user_id=".(int)$row['request_handler']);
                while($row2=mysqli_fetch_array($result2)){
                    $requestHandler = $row2['user_reg_num'];
                    break;
                }

                echo "<td>".$requestHandler."</td>";
            }

            if($row['status']==0){
                if($row['email']!=$_SESSION['email']){
                    echo "<td> 
                    <a data-toggle='dropdown' href='#'><i style='color:green' title='Approve Request' class='far fa-check-square approve-request-2'></i></a><input hidden type='text' value='".$row['request_id']."'>
                    <a data-toggle='dropdown' href='#' style='margin-left:20px'><i style='color:red' title='Reject Request' class='far fa-times-circle reject-request-2'></i></a>
                   </td>";
                }
                else{
                    echo "<td></td>";
                }

             }
             else if($row['status']==1){
                 echo"<td><span class='badge badge-success'>APPROVED</span></td>";
             }
             else{
                 echo"<td><span class='badge badge-danger'>REJECTED</span></td>";
             }


            echo"</tr>";
            
        }
        
        
        echo "<script src='../jquery_main/jquery.min.js'></script>";

        echo "<script src='../control/control.js'></script>";
    }
     
      
     
    

//==========================================================================================================================    
    
    
    /*  function ($post){
            $con = $this->databaseConnect();
             
         } 
    */
    }

?>
