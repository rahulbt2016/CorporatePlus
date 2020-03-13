<?php
    
    session_start();
   
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
    
         function userSearch($post){
            $con = $this->databaseConnect();
            $str=trim($post['user_search_string']);

    

            $result = mysqli_query($con,"SELECT * FROM user
            WHERE (`user_reg_num` LIKE '%".$str."%') OR (`user_name` LIKE '%".$str."%') OR (`email` LIKE '%".$str."%') OR (`designation_name` LIKE '%".$str."%') OR (`phone` LIKE '%".$str."%') OR (`active` LIKE '%".$str."%') OR (`user_salary` LIKE '%".$str."%')") or die();



             
            while($row = mysqli_fetch_array($result)){
                

                echo "<tr>
                      
                            <td>".$row['user_reg_num']."</td>
                            <td>".$row['user_name']."</td>
                            <td>".$row['email']."</td>
                            <td>".$row['designation_name']."</td>
                            <td>".$row['user_salary']."</td>
                            <td>".$row['phone']."</td>";
                            
                            if($row['active']==1){
                                echo "<td><span class='badge badge-success'>ACTIVE</span></td>";
                            }
                            else{
                                echo "<td><span class='badge badge-danger'>INACTIVE</span></td>";
                            }
                            
                            //$query2 = "select access.form_id, form.form_file from access, form WHERE access.form_id=form.form_id and access.designation_name='".$_SESSION['designation']."'";

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

            
            $query="SELECT * FROM vendor WHERE (`vendor_reg_num` LIKE '%".$str."%') OR (`vendor_name` LIKE '%".$str."%') OR (`gst_num` LIKE '%".$str."%') OR (`email` LIKE '%".$str."%') OR (`phone` LIKE '%".$str."%') ORDER BY active DESC";
            
            $result = mysqli_query($con,$query);
            
            while($row=mysqli_fetch_array($result)){
                
                $query2 = "SELECT user_reg_num from user WHERE user_id=".$row['added_by'];
                $result2 = mysqli_query($con,$query2);
                while($row2=mysqli_fetch_array($result2)){
                    $adderID = $row2['user_reg_num'];
                }
                
                echo "<tr>";
                    echo"<td>".$row['vendor_reg_num']."</td>";
                    echo"<td>".$row['vendor_name']."</td>";
                    echo"<td>".$row['gst_num']."</td>";
                    echo"<td>".$row['email']."</td>";
                    echo"<td>".$row['phone']."</td>";
                    echo"<td>".$adderID."</td>";
                            
                            
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
        
    
    function applicantSearch($post){
            $con = $this->databaseConnect();
            $str=trim($post['search_string']);

            $raw_results = mysqli_query($con,"SELECT * FROM recruitment
            WHERE (`name` LIKE '%".$str."%') OR (`ssc_per` LIKE '%".$str."%') OR (`hsc_per` LIKE '%".$str."%') OR (`highest_qualification` LIKE '%".$str."%') OR (`specialization_field` LIKE '%".$str."%')") or die();
             
            while($results = mysqli_fetch_array($raw_results)){
                

                echo "<tr>
                            
                            <td><img height ='100px' width='100px' src=../dashboard_assets/dist/img/".$results['person_image']."></td>
                            
                            <td>".$results['name']."</td>
                            <td>".$results['email_id']."</td>
                            <td>".$results['contact_no']."</td>
                            <td>".$results['ssc_per']."</td>";

                            if($results['ssc_ms']!="Not Available"){
                              echo "<td><center><a download='../dashboard_assets/dist/hr/upload_ssc/".$row['ssc_ms']."' data-toggle='dropdown' href='../dashboard_assets/dist/hr/upload_ssc/".$results['ssc_ms']."'><i class='fa fa-download' aria-hidden='true' id='ms-ssc'></i></a><input hidden type='text' value='".$results['recruitment_id']."'><center></td>";

                            }

                            else{
                              echo "<td><center><b>-</b></center></td>";
                            }


                            echo "<td>".$results['hsc_per']."</td>";

                            if($row['hsc_ms']!="Not Available"){
                              echo "<td><center><a download='../dashboard_assets/dist/hr/upload_hsc/".$results['hsc_ms']."' data-toggle='dropdown' href='../dashboard_assets/dist/hr/upload_hsc/".$results['hsc_ms']."'><i class='fa fa-download' aria-hidden='true' id='ms-hsc'></i></a><input hidden type='text' value='".$results['recruitment_id']."'><center></td>";

                            }

                            else{
                              echo "<td><center><b>-</b></center></td>";
                            }

                          

                            echo "<td>".$results['diploma_per']."</td>";

                             if($results['d2d_ms']!="Not Available"){
                              echo "<td><center><a download='../dashboard_assets/dist/hr/upload_d2d/".$results['d2d_ms']."' data-toggle='dropdown' href='../dashboard_assets/dist/hr/upload_d2d/".$results['d2d_ms']."'><i class='fa fa-download' aria-hidden='true' id='ms-d2d'></i></a><input hidden type='text' value='".$results['recruitment_id']."'><center></td>";

                            }

                            else{
                              echo "<td><center><b>-</b></center></td>";
                            }

                            

                            echo "<td>".$results['highest_qualification']."</td>
                            <td>".$results['specialization_field']."</td>
                            <td>".$results['work_experience_years']."</td>";

                            if($results['add_doc']!="Not Available"){
                              echo "<td><center><a download='../dashboard_assets/dist/hr/upload_addDoc/".$results['add_doc']."' data-toggle='dropdown' href='../dashboard_assets/dist/hr/upload_addDoc/".$results['add_doc']."'><i class='fa fa-download' aria-hidden='true' id='doc-add'></i></a><input hidden type='text' value='".$results['recruitment_id']."'><center></td>";

                            }

                            else{
                              echo "<td><center><b>-</b></center></td>";
                            }

                          
                          echo "<td>".$results['interested_field']."</td>
                            
                            <td><a data-toggle='dropdown' href='#'><i style='color:red'  class='far fa-trash-alt delete-applicant'></i></a><input hidden type='text' value='".$results['recruitment_id']."'></td>
                              

                              </tr>";
                
                echo "<script src='../jquery_main/jquery.min.js'></script>";
                echo "<script src='../control/control.js'></script>";
               
            }

             
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
    
    
    function returnedRawMatTableSearch($post){
        $con = $this->databaseConnect();
        
        $str=$_POST['searchString'];
        
        $query="SELECT raw_materials.name as raw_mat_name,
        returned_raw_materials.returned_quantity,
        vendor.vendor_reg_num,
        raw_material_orders.unit_cost,
        raw_material_orders.batch_number, 
        DATE_FORMAT(returned_raw_materials.return_date,'%e %b, %Y') as return_date, user.user_reg_num,
        returned_raw_materials.reason
        FROM returned_raw_materials,raw_materials,vendor,raw_material_orders,user
        WHERE
        (raw_materials.name LIKE '%".$str."%' OR 
        returned_raw_materials.returned_quantity LIKE '%".$str."%' OR
        vendor.vendor_reg_num LIKE '%".$str."%' OR
        raw_material_orders.unit_cost LIKE '%".$str."%' OR
        raw_material_orders.batch_number LIKE '%".$str."%' OR
        DATE_FORMAT(returned_raw_materials.return_date,'%e %b, %Y') LIKE '%".$str."%' OR 
        user.user_reg_num LIKE '%".$str."%' OR
        returned_raw_materials.reason LIKE '%".$str."%' OR
        returned_raw_materials.returned_quantity*raw_material_orders.unit_cost LIKE '".$str."') AND
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

        $name = trim($post['name']);
        $email = trim($post['email']);
        $number = trim($post['number']);
        $inquiryDate = trim($post['inquiryDate']);
        $inquiryAllocated = trim($post['inquiryAllocated']);
        $prodString = trim($post['prod']);

        $prodArray = explode(",", $prodString);
        $active=1;

        $result = mysqli_query($con,"select user_id from user where email='".$_SESSION['email']."'");
        while($row= mysqli_fetch_array($result)){
            $adderId = $row['user_id'];
        } 

        foreach ($prodArray as $value) {
        $query = "INSERT INTO onsite_inquiry(customer_name,customer_email,customer_phone,product_name,inquiry_date,added_by,inquiry_allocate) VALUES ('".$name."','".$email."','".$number."','".$value."','".$inquiryDate."','".$adderId."','".$inquiryAllocated."')";
        mysqli_query($con, $query);
        /*if(mysqli_query($con,$query)){

           $subject="Your Inquiry at Corporate Plus";
           $message="Hello ".$name.",\nWelcome to Corporate Plus. Your inquiry has been successfully received by the Sales department regarding the ".$value." product. Our salesperson ".$inquiryAllocated." will contact you on your registered contact number or email ID regarding your inquiry. 

            \n Thank you for contacting Corporate Plus.";
            if(mail($email,$subject,$message,'From:abc@xyz.com'))

               return true;
       }    
       else 
            return false;*/
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

            $result2 = mysqli_query($con,"SELECT * from user where user_id=".$row['notification_from']);
            while($row2=mysqli_fetch_array($result2)){
                $notiUserName = $row2['user_name'];
                $notiUserImg = $row2['user_photo'];

                break;
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



            $result2 = mysqli_query($con,"SELECT * from user where user_id=".$row['notification_from']);
            while($row2=mysqli_fetch_array($result2)){
                $notiUserName = $row2['user_name'];
                $notiUserImg = $row2['user_photo'];

                break;
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




//===================================================================================================================




//===================================================================================================================    
         /*  function ($post){
            $con = $this->databaseConnect();
             
         } 
    */
    }

?>
