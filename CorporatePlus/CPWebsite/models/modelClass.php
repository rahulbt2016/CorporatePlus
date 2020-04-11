<?php


    session_start();
    date_default_timezone_set('Asia/Kolkata');
    
    Class User{
        function databaseConnect(){
            $con=mysqli_connect('localhost','root','','corporateplus');
            return $con;
        }


        function contactUs($post){

        	  $con = $this->databaseConnect();
        	 

        	  $name=trim($post['contact-name']);
        	  $email=trim($post['contact-email']);
        	  $subject="Message from ".$name." - ".$email;
        	  $message=trim($post['contact-message']);

                   if(mail("corporate.plus.erp@gmail.com",$subject,$message,'From:abc@xyz.com')){
                      echo true; 
                   }
                   
        }

        function applyNow($post,$newFileName){
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
            
            $add_doc=trim($post['person-addDoc']);

            
            
            $query ="INSERT INTO recruitment(name,email_id,contact_no,ssc_per,ssc_ms,hsc_per,hsc_ms,diploma_per,highest_qualification,d2d_ms,specialization_field,work_experience_years,add_doc,interested_field,person_image) values('".$name."','".$email."','".$number."','".$ssc."','Not Available','".$hsc."','Not Available','".$diploma."','".$qualification."','Not Available','".$specialization."',".(int)$experience.",'".$newFileName."','".$interest."','avatar5.png')";
            
            $subject="Applied to Corporate Plus";
            $message="Hello ".$name.",\nYour application has been successfully received by the HR department. A decision on the same will be made soon and you will be notified regarding your application via email. \n Thank you for applying at Corporate Plus.";

            
            if(mail($email,$subject,$message,'From:abc@xyz.com')){
                mysqli_query($con,$query);
                return true;
            }
            else{
                return false;
            }
        } 


        function webInquiry($post){

              $con = $this->databaseConnect();
             

              $name=trim($post['person-name']);
              $email=trim($post['person-email']);
              $number=trim($post['person-number']);
              $inqRegNum = trim($post['inquiry-reg-num']);
              $productId=trim($post['inquiry-product-id']);
              
              $result = mysqli_query($con,"SELECT * FROM products WHERE product_id=".(int)$productId);
              while($row = mysqli_fetch_array($result)){
                  $productName = $row['product_name'];
                  break;
              }
             
              $query = "INSERT INTO web_inquiry(web_inquiry_reg_num,inquirer_name,inquirer_email,inquirer_number,inquiry_date,product_id,inquiry_allocated_to,inquiry_allocator,appointment_call,appointment_timestamp) values('".$inqRegNum."','".$name."','".$email."','".$number."','".date("Y-m-d")."',".(int)$productId.",0,0,0,'0000-00-00 00:00:00')";

              
              $mailSubject = "Product Inquiry at Corporate Plus";
              $message = "Hello ".$name.",\nThankyou for inquiring at Corporate Plus. We will get back to you soon.";
              
              if(mail($email,$mailSubject,$message,'From:abc@xyz.com')){
                  
                mysqli_query($con,$query);   //Main Query
                
                
                $notiToFileAccessor = "webInquiries.php";
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

                       mysqli_query($con,"INSERT INTO notification(notification_for,notification_from,notification_read,notification_message,descriptive_message,message_color,link_page) VALUES(".(int)$value.",0,0,'New Web Inquiry','".$name." has made a web inquiry for ".$productName." (".$inqRegNum.").','blue','webInquiries.php')");

                }
                
                
                
                echo true;
              
              }
        }


        function showProductDocumentation($post){                                          
                                                                                //Show Product Documentation   
        $con = $this->databaseConnect();
        //echo "Hi";
        $productId = $_POST['productId'];


        $result = mysqli_query($con,"SELECT * FROM products WHERE product_id=".(int)$productId);
        while($row = mysqli_fetch_array($result)){
            $fileName = $row['description_pdf'];
            break;
        }

        $uri = $_SERVER['HTTP_HOST'];

        //echo "http://".$uri."/CorporatePlus/dashboard_assets/dist/pdf/".$fileName;
        
        echo "http://".$uri."/CorporatePlus/dashboard_assets/dist/pdf/".$fileName;
   
   }
   

}

?>