$(document).ready(function()
{                                                                              
    $(document).on('click','#login_button',function(e){                         //Login 
        $email=$('#email').val();
        $password=$('#password').val();
       
   
    
    $.ajax({
            url:"../models/modelMain.php",
        
            data:
                {
                    email:$email,
                    password:$password,
                    action:'login'
                },
                
            type: 'POST',
            datatype:'HTML',
            
            success: function(data){
                if(data==1)
                    window.location='dashboard.php';
                else
                {
                    alert("Incorrect user-name/password. Retry.");
                    $('#password').val('');
                }
            }
            
            
        
        });
        e.preventDefault();
    });
    
  //======================================================================================================================
    
    //$(document).on('click','#logout',function(e){
    $("#logout").click(function(e){
           
                                                                                //Logout
        
    if (confirm("Logout?")) {
        
        $.ajax({
            url:"../models/modelMain.php",
        
            data:
                {
                    action:'logout'
                },
                
            type: 'POST',
            datatype:'HTML',
            
            success: function(data){
                location.reload();
            }
            
            
        
        });
    } else {
        //location.reload();
    }
        e.preventDefault();
    });
    
  //======================================================================================================================
    
    
    $(document).on('click','#forgot_password',function(e){
                                                                                //Forgot Password Button
        window.location='forgotPassword.php';
        
        e.preventDefault();
    });
    
    
  //======================================================================================================================
    
     $(document).on('click','#reset_password',function(e){
                                                                                //Reset Password Page
         $email=$('#email2').val();
         
         $.ajax({
            url:"../models/modelMain.php",
        
            data:
                {
                    email:$email,
                    action:'reset_password'
                },
                
            type: 'POST',
            datatype:'HTML',
            
            success: function(data){
                if(data==1){
                    alert("Your password has been reset. Check your mail-box for your new password.");
                    window.location='login.php';
                }
                else if(data==2){
                    alert("Mail server down. Check your internet connection or try again later.");
                    $('#email2').val('');
                    //window.location='login.php';
                }
                else{
                    alert("User doesn't exist. Try again with a different email-id.");
                    $('#email2').val('');
                }
                
            } 
         
        });
     e.preventDefault();
    });
    
  //======================================================================================================================
    
//   $("#user-type").blur(function(e){
//       if($(this).val()!=""){
//           //alert("Hello");
//           $designation = $(this).val();
//         
//           
//           
//           $.ajax({
//            url:"../models/modelMain.php",
//        
//            data:
//                {
//                    designation:$designation,
//                    action:auto-enter-salary
//                },
//                
//            type: 'POST',
//            datatype:'HTML',
//            
//            success: function(data){
//                if(data==1)
//                    window.location='dashboard.php';
//                else
//                {
//                    alert("Incorrect user-name/password. Retry.");
//                    $('#password').val('');
//                }
//            }
//            
//            
//        
//        });
//        
//           
//       }
//       
//       e.preventDefault();
//   }); 
    
    
    
 //======================================================================================================================
    
    
    $(document).on('click','#add-user',function(e)
    {                                                                           //Add User
        
        $flag = false;
        
        if(validate("#user-name")
           && validate("#user-email")
           && validate("#user-number")
           && validate("#user-type")
           && validate("#user-salary"))
        {
               
            $flag=true;
        }
        
        
        
        if($flag){
            
            
            if (confirm("Add User?")){
            var dataDigest = new FormData();
            dataDigest.append('user-image',$('#user-pic').prop("files")[0]);
            dataDigest.append('action','add-user');
            dataDigest.append('user-image-name',$('#user-pic').val().replace("C:\\fakepath\\",""));
            dataDigest.append('user-reg-num',$('#user-reg-num').val().trim());
            dataDigest.append('user-name',$('#user-name').val().trim());
            dataDigest.append('user-email',$('#user-email').val().trim());
            dataDigest.append('user-password',$('#user-password').val().trim());
            dataDigest.append('user-type',$('#user-type').val().trim());
            dataDigest.append('user-number',$('#user-number').val().trim());
            dataDigest.append('user-salary',$('#user-salary').val().trim());
        
            $.ajax({
            
                url:"../models/modelMain.php",
                data: dataDigest,
                processData: false,
                contentType: false,
                type: 'POST',
                datatype: 'HTML',
            
                success: function(data)
                {
                    if(data == 1){
                        alert("User added successfully.");
                        location.reload();
                        //window.location='addUser.php';
                    }
                    else{
                        alert("Something went wrong. Try again later.");
                        location.reload();
                        //window.location='addUser.php';
                    }
                
                }
            
            });
            
            }
            else{
                //location.reload();
            }
        }
        else{
            //alert("Enter valid data.");
         
            
            $('.validate-input1').each(function(){
                
                    if(validate(this) == false){
                        showValidate(this);
                    }
                    else {
                        //$(this).parent().addClass('true-validate');
                        hideValidate(this);
                    }
                });
           
            
            
        }
        
        e.preventDefault();
    });
    
  //======================================================================================================================
  
  
    $('#edit-pic').click(function(){                             //Edit button glycon in Profile page to indirectly click upload pic
        $('#user-pic2').click();
        
    });
    
    
    
    
    //======================================================================================================================
    
        $(document).on('change','#user-pic2',function(e){
                                                             //After selecting a file in profile pic, to make it temperory pic
        var dataDigest = new FormData();
        dataDigest.append('user-image',$('#user-pic2').prop("files")[0]);
        dataDigest.append('action','change-pic');
        dataDigest.append('user-image-name',$('#user-pic2').val().replace("C:\\fakepath\\",""));
       
        
        $.ajax({
            
            url:"../models/modelMain.php",
            data: dataDigest,
            processData: false,
            contentType: false,
            type: 'POST',
            datatype: 'HTML',
            
            success: function(data)
            {
                location.reload();
            }
            
        });
        
        
        
        e.preventDefault();
    });
  

  //====================================================================================================================== 
    
    
    $(document).on('click','#edit-profile',function(e){
                                                                                //Edit Profile (Update Query)
        
        $flag = false;
        
        if(validate("#user-name2")
           && validate("#user-email2")
           && validate("#user-number2")
           && validate("#user-password2")
           && validate("#confirm-user-password2")
          )
          {    
            $flag=true;
          }
            


    
        
        if($flag){
            
            if (confirm("Save Changes?")){
            $password = $("#user-password2").val();
            $name = $("#user-name2").val();
            $pic = $("#temp-img-name").val();
            $number = $("#user-number2").val();
        
            $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        name:$name,
                        password:$password,
                        pic: $pic,
                        number: $number,
                        action:'edit-profile'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    if(data==1){
                        alert("Saved successfully.");
                        location.reload();
                    }    
                    else
                    {
                        alert("Something went wrong. Try again later.");
                        location.reload();
                    }
                }
         
            });
            }
            else{
                location.reload();
            }
        }
        else{
            //alert("Retry");
            //location.reload();
            $('.validate-input1').each(function(){
                
                    if(validate(this) == false){
                        showValidate(this);
                    }
                    else {
                        //$(this).parent().addClass('true-validate');
                        hideValidate(this);
                    }
                });
        }
        
        
        
        e.preventDefault();
    });
    
    
    
    
 //======================================================================================================================

    $('.validate-input1').each(function(){
        $(this).on('blur', function(){
            if(validate(this) == false){
                showValidate(this);
            }
            else {
                //$(this).parent().addClass('true-validate');
                hideValidate(this);
            }
        });
        
        
    });
    
    
 //======================================================================================================================

     $('.validate-input1').each(function(){
        $(this).focus(function(){
           hideValidate(this);
           //$(this).parent().removeClass('true-validate');
        });
    });
    
    
  //======================================================================================================================
    
    
    $(document).on('click','#add-designation',function(e){
                                                                                //Add Designation
        
        $flag = false;
        
        if(validate("#designation-name")
           && validate("#designation-salary")
          )
          {    
            $flag=true;
          }
        
        
        if($flag){
        
        if(confirm("Add Designation?")){
            var dataDigest = new FormData();
        
        dataDigest.append('action','add-designation');
        dataDigest.append('designation-name',$("#designation-name").val());
        dataDigest.append('approx-salary',$("#designation-salary").val());
        
        $formString = "";
        $('.form-access-checkbox').each(function(){
            //alert($(this).parent().find("input").last().val());
            if($(this).prop("checked") == true){
                if($formString == "")
                    $formString=$formString+$(this).parent().find("input").last().val();
                else
                    $formString=$formString+","+$(this).parent().find("input").last().val();
            }
        });
        dataDigest.append('acess',$formString);
        
        $.ajax({
            
            url:"../models/modelMain.php",
            data: dataDigest,
            processData: false,
            contentType: false,
            type: 'POST',
            datatype: 'HTML',
            
            success: function(data)
            {
                if(data==1){
                    alert("Designation added successfully.");
                    location.reload();
                }    
                else{
                    alert("Designation already exists!");
                    location.reload();
                }
            }
            
        });
        }
            
            
        }
        
        else{
            
            $('.validate-input1').each(function(){
                
                    if(validate(this) == false){
                        showValidate(this);
                    }
                    else {
                        //$(this).parent().addClass('true-validate');
                        hideValidate(this);
                    }
                });
        }

        
        e.preventDefault();
    });
    
  //======================================================================================================================
   
    $(".edit-designation-access").click(function(){                             //Edit designation access
        $designationName = $(this).parent().parent().siblings().html();
        //alert($designationName);
        
        $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        designationName: $designationName,
                        action:'edit-designation-access'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    window.location='editDesignation.php';
                }
         
            });
    });
    
  //======================================================================================================================
    
    
    
    
    $(document).on('click','#save-edited-designation',function(e){
                                                                                //Save Edited Designation
        
        $flag = false;
        
        if(validate("#designation-name2")
           && validate("#designation-salary2")
          )
          {    
            $flag=true;
          }
        
        
        if($flag){
        
        if(confirm("Save Changes?")){
            var dataDigest = new FormData();
        
        dataDigest.append('action','save-edited-designation');
        dataDigest.append('designation-name',$("#designation-name2").val());
        dataDigest.append('approx-salary',$("#designation-salary2").val());
        
        $formString = "";
        $('.form-access-checkbox').each(function(){
            //alert($(this).parent().find("input").last().val());
            if($(this).prop("checked") == true){
                if($formString == "")
                    $formString=$formString+$(this).parent().find("input").last().val();
                else
                    $formString=$formString+","+$(this).parent().find("input").last().val();
            }
        });
        dataDigest.append('acess',$formString);
        
        $.ajax({
            
            url:"../models/modelMain.php",
            data: dataDigest,
            processData: false,
            contentType: false,
            type: 'POST',
            datatype: 'HTML',
            
            success: function(data)
            {
                alert("Changes saved successfully.");
                    location.reload();
            }
            
        });
        }
            
            
        }
        
        else{
            
            $('.validate-input1').each(function(){
                
                    if(validate(this) == false){
                        showValidate(this);
                    }
                    else {
                        //$(this).parent().addClass('true-validate');
                        hideValidate(this);
                    }
                });
        }

        
        e.preventDefault();
    });
    
    
    //======================================================================================================================
    
    $(".delete-designation").click(function(){                                  //Delete designation
        
        $designationName = $(this).parent().parent().siblings().html();
        if(confirm("Delete designation '"+$designationName+"' ?")){
            
        //alert($designationName);
        
        $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        designationName: $designationName,
                        action:'delete-designation'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    if(data==1){
                        alert("Designation successfully deleted.");
                        location.reload();
                    }
                    else{
                        alert("Sorry, designation can't be deleted. There are active users currently assigned to this designation.");
                    }
                }
         
            });
        }
        
    });
    
    
    
    
  //======================================================================================================================
   
    $(".edit-user").click(function(){                                           //Edit User
        $userId = parseInt($(this).parent().parent().find('input').val());
        //alert($userId);
        $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        userId: $userId,
                        action:'edit-user'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    window.location='editUser.php';
                }
         
            });
    });
    
  //======================================================================================================================
    
    
    $(document).on('click','#save-edited-user',function(e){
                                                                                //Save Edited User
        
        $flag = false;
        
        if(validate("#user-name3")
           && validate("#salary3")
           && validate("#user-email3")
           && validate("#user-number3")
          )
          {    
            $flag=true;
          }
        
        
        if($flag){
        
        if(confirm("Save Changes?")){
           
           
           if($("#customSwitch3").prop("checked") == true){
                $active=1;
            }
            else{
                $active=0;
            }
           
           var dataDigest = new FormData();
            dataDigest.append('action','save-edited-user');
            dataDigest.append('user-name',$('#user-name3').val().trim());
            dataDigest.append('user-email',$('#user-email3').val().trim());
            dataDigest.append('user-type',$('#user-type3').val().trim());
            dataDigest.append('user-number',$('#user-number3').val().trim());
            dataDigest.append('user-salary',$('#salary3').val().trim());
            dataDigest.append('active',$active);

        
        $.ajax({
            
            url:"../models/modelMain.php",
            data: dataDigest,
            processData: false,
            contentType: false,
            type: 'POST',
            datatype: 'HTML',
            
            success: function(data)
            {
                alert("Changes saved successfully.");
                location.reload();
            }
            
        });
        }
            
            
        }
        
        else{
            
            $('.validate-input1').each(function(){
                
                    if(validate(this) == false){
                        showValidate(this);
                    }
                    else {
                        //$(this).parent().addClass('true-validate');
                        hideValidate(this);
                    }
                });
        }

        
        e.preventDefault();
    });
    
   
    
  //======================================================================================================================
  
  
  $(".delete-user").click(function(){                                           //Delete User
        
        $userId = parseInt($(this).parent().parent().find('input').val());
        if(confirm("Deactivate User?")){
            
        //alert($userId);
        
        $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        userId: $userId,
                        action:'delete-user'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    if(data==1){
                        alert("User successfully deactivated.");
                        location.reload();
                    }
                    else{
                        alert("Cannot deactivate currently logged in user.");
                    }
                    
                }
         
            });
        }
        
    });
    
    
    
    
    //======================================================================================================================
    
    
    
    $(document).on('click','#user_table_search',function(e)                    // USER SEARCH
        {
            $str=$('#user-search-string').val();
            
            $.ajax({

                url:"../models/modelMain.php",
        
            data:
                {
                    user_search_string:$str,
                    action:'user-search-string'
                },
                
            type: 'POST',
            datatype:'HTML',

            success: function(data){
                $("#user-table-body").html(data);
            }


            });
            
            e.preventDefault();
        });
        
//========================================================================================================================        
    
    $(document).on('click','#add-applicant',function(e)
    {                                                                           //Add Applicant 
       
       $flag = false;
        if(validate("#person-name")
           && validate("#person-email")
           && validate("#person-number")
           && validate("#person-experience")
           && validate("#person-interest")
           && validate("#person-ssc")
           && validate("#person-hsc")
           && validate("#person-diploma")
           && validate("#person-qualification")
           && validate("#person-specialization"))
           
        {   
            $flag=true;
        }

        //$flag = false;
        
        if($flag){
            
            
            if (confirm("Add Applicant?")){
            var dataDigest = new FormData();
            dataDigest.append('person-image',$('#person-img').prop("files")[0]);
            dataDigest.append('marksheet-ssc',$('#marksheet-ssc').prop("files")[0]);
            dataDigest.append('marksheet-hsc',$('#marksheet-hsc').prop("files")[0]);
            dataDigest.append('marksheet-d2d',$('#marksheet-d2d').prop("files")[0]);
            dataDigest.append('additional-doc',$('#additional-doc').prop("files")[0]);
            dataDigest.append('action','add-applicant');
            dataDigest.append('person-image-name',$('#person-img').val().replace("C:\\fakepath\\",""));
            dataDigest.append('person-name',$('#person-name').val().trim());
            dataDigest.append('person-email',$('#person-email').val().trim());
            dataDigest.append('person-number',$('#person-number').val().trim());
            dataDigest.append('person-ssc',$('#person-ssc').val().trim());
            dataDigest.append('person-ssc-ms',$('#marksheet-ssc').val().replace("C:\\fakepath\\",""));
            dataDigest.append('person-hsc',$('#person-hsc').val().trim());
            dataDigest.append('person-hsc-ms',$('#marksheet-hsc').val().replace("C:\\fakepath\\",""));
            dataDigest.append('person-diploma',$('#person-diploma').val().trim());
            dataDigest.append('person-d2d-ms',$('#marksheet-d2d').val().replace("C:\\fakepath\\",""));
            dataDigest.append('person-qualification',$('#person-qualification').val().trim());
            dataDigest.append('person-specialization',$('#person-specialization').val().trim());
            dataDigest.append('person-experience',$('#person-experience').val().trim());
            dataDigest.append('person-addDoc',$('#additional-doc').val().replace("C:\\fakepath\\",""));
            dataDigest.append('person-interest',$('#person-interest').val().trim());
        
            $.ajax({
            
                url:"../models/modelMain.php",
                data: dataDigest,
                processData: false,
                contentType: false,
                type: 'POST',
                datatype: 'HTML',
            
                success: function(data)
                {
                    if(data == 1){
                        alert("Something went wrong. Try again later.");
                        location.reload();
                    }
                    else{
                        alert("Applicant added successfully.");
                        location.reload();
                    }
                
                }
            
            });
            
            }
            else{
                //location.reload();
            }
        }
        else{
            //alert("Enter valid data.");
         
            
            $('.validate-input1').each(function(){
                
                    if(validate(this) == false){
                        showValidate(this);
                    }
                    else {
                        //$(this).parent().addClass('true-validate');
                        hideValidate(this);
                    }
                });
           
            
            
        }
        
        e.preventDefault();
    });
    
    
//======================================================================================================================

    $(document).on('click','#ms-ssc',function(e)
    {                                
        $appID = parseInt($(this).parent().siblings().val());           

        $.ajax({

            url:"../models/modelMain.php",
        
            data:
                {
                    recruitment_id: $appID,
                    action:'download-ms-ssc'
                },
                
            type: 'POST',
            datatype:'HTML',
            
            success: function(data){
                window.open(data, '_new');
            }

        });

    });

//======================================================================================================================
    

    
    $(document).on('click','#ms-hsc',function(e)
    {                                
        $appID = parseInt($(this).parent().siblings().val());           

        $.ajax({

            url:"../models/modelMain.php",
        
            data:
                {
                    recruitment_id: $appID,
                    action:'download-ms-hsc'
                },
                
            type: 'POST',
            datatype:'HTML',
            
            success: function(data){
                window.open(data, '_new');
            }

        });

    });

//======================================================================================================================
    

    
    $(document).on('click','#ms-d2d',function(e)
    {                                
        $appID = parseInt($(this).parent().siblings().val());           

        $.ajax({

            url:"../models/modelMain.php",
        
            data:
                {
                    recruitment_id: $appID,
                    action:'download-ms-d2d'
                },
                
            type: 'POST',
            datatype:'HTML',
            
            success: function(data){
                window.open(data, '_new');
            }

        });

    });

//======================================================================================================================
    

    
    $(document).on('click','#doc-add',function(e)
    {                                
        $appID = parseInt($(this).parent().siblings().val());           

        $.ajax({

            url:"../models/modelMain.php",
        
            data:
                {
                    recruitment_id: $appID,
                    action:'download-add-doc'
                },
                
            type: 'POST',
            datatype:'HTML',
            
            success: function(data){
                window.open(data, '_new');
            }

        });

    });


//======================================================================================================================


    


    $(".delete-applicant").click(function(){                                    //Delete applicant
        
        $appID = parseInt($(this).parent().siblings().val());
        //$designationName = $(this).parent().parent().siblings().html();
        if(confirm("Delete Applicant?")){
            
        //alert($designationName);
        
        $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        recruitment_id: $appID,
                        action:'delete-applicant'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    
                        alert("Applicant successfully deleted.");
                        location.reload();
                    
                    
                }
         
            }); 
        }
        
    });
    
    
    
    //======================================================================================================================
  
  
  
  
  $(document).on('click','#add-vendor',function(e)
    {                                                                           //Add Vendor
        
        $flag = false;
        
        if(validate("#vendor-name")
           && validate("#vendor-gst-num")
           && validate("#vendor-email")
           && validate("#vendor-number")
          )
        {
               
            $flag=true;
        }
        
        
        
        if($flag){
            
            $regNum = $("#vendor-reg-num").val()
            $name = $("#vendor-name").val();
            $gstNum = $("#vendor-gst-num").val();
            $email = $("#vendor-email").val();
            $phone = $("#vendor-number").val();
            $rawMatObj = $('#raw-mat').val();
            $rawMatString = String($rawMatObj);
            
            if($rawMatString!=""){
                
                
                if(confirm("Add Vendor?")){
                    
                    $.ajax({
                        url:"../models/modelMain.php",
            
            
            
                        data:
                            {
                                regNum:$regNum,
                                name:$name,
                                gstNum:$gstNum,
                                email:$email,
                                phone:$phone,
                                rawMat:$rawMatString,
                                action:'add-vendor'
                            },
                
                        type: 'POST',
                        datatype:'HTML',
            
                        success: function(data){
                            alert("Vendor added successfully.");
                            location.reload();
                        }
         
                    });
                    
                }
            }
            else{
                alert("Please select atleast 1 Raw Material");
            }
            
        }
        else{
     
            $('.validate-input1').each(function(){
                
                    if(validate(this) == false){
                        showValidate(this);
                    }
                    else {
                        //$(this).parent().addClass('true-validate');
                        hideValidate(this);
                    }
                });
           
            
            
        }
        
        e.preventDefault();
    });
    
    
    
  //======================================================================================================================


  $(".delete-vendor").click(function(){                                         //Delete Vendor
        
        $vrn = $(this).parent().siblings().val();
        if(confirm("Deactivate Vendor?")){
            
        
        $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        vrn: $vrn,
                        action:'delete-vendor'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    
                        alert("Vendor successfully deactivated.");
                        location.reload();
                    
                    
                }
         
            }); 
        }
        
    });
    
    
    
    //======================================================================================================================  
    
    
    $(".edit-vendor").click(function(){                                         //Edit Vendor
        $vrn = $(this).parent().siblings().val();
        
        $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        vrn: $vrn,
                        action:'edit-vendor'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    window.location='editVendor.php';
                }
         
            });
    });


    //======================================================================================================================
   
   
   $(document).on('click','#save-edited-vendor',function(e){
                                                                                //Save Edited Vendor
        
        $flag = false;
        
        if(validate("#vendor-name2")
           && validate("#vendor-gst-num2")
           && validate("#vendor-email2")
           && validate("#vendor-number2")
          )
        {
               
            $flag=true;
        }
        
        
        
        if($flag){
            
            $regNum = $("#vendor-reg-num2").val()
            $name = $("#vendor-name2").val();
            $gstNum = $("#vendor-gst-num2").val();
            $email = $("#vendor-email2").val();
            $phone = $("#vendor-number2").val();
            $rawMatObj = $('#raw-mat2').val();
            $rawMatString = String($rawMatObj);
            if($("#customSwitch3").prop("checked") == true){
                $active=1;
            }
            else{
                $active=0;
            }
            
            
            if($rawMatString!=""){
                
                
                if(confirm("Save Changes?")){
                    
                    $.ajax({
                        url:"../models/modelMain.php",
            
            
            
                        data:
                            {
                                regNum:$regNum,
                                name:$name,
                                gstNum:$gstNum,
                                email:$email,
                                phone:$phone,
                                rawMat:$rawMatString,
                                active:$active,
                                action:'save-edited-vendor'
                            },
                
                        type: 'POST',
                        datatype:'HTML',
            
                        success: function(data){
                            alert("Changes saved successfully.");
                            location.reload();
                        }
         
                    });
                    
                }
            }
            else{
                alert("Please select atleast 1 Raw Material");
            }
            
        }
        else{
     
            $('.validate-input1').each(function(){
                
                    if(validate(this) == false){
                        showValidate(this);
                    }
                    else {
                        //$(this).parent().addClass('true-validate');
                        hideValidate(this);
                    }
                });
           
            
            
        }
        
        e.preventDefault();
    });
    
   
    
  //======================================================================================================================
  
    $("#vendor-table-search").click(function(e){
        
        $searchString = $("#vendor-search-string").val();
        
        $.ajax({
            
             url:"../models/modelMain.php",
            
            
            
                        data:
                            {
                                searchString:$searchString,
                                action:'vendor-table-search'
                            },
                
                        type: 'POST',
                        datatype:'HTML',
            
                        success: function(data){
                            $("#vendor-table-body").html(data);
                        }
         
            
        });
        
        
        e.preventDefault();
    });
  
  
  //======================================================================================================================
  
  
    $(document).on('click','#add-new-raw-mat',function(e)
    {                                                                           //Add New Raw Material
        
        $flag = false;
        
        if(validate("#rwm-name"))
        {
               
            $flag=true;
        }
        
        
        
        if($flag){
            
            $rwmName = $("#rwm-name").val();
            $rwmCode = $("#rwm-code").val();
            
                
                
            if(confirm("Add Raw Material?")){
                    
                    $.ajax({
                        url:"../models/modelMain.php",
            
            
            
                        data:
                            {
                                rwmName:$rwmName,
                                rwmCode:$rwmCode,
                                action:'add-new-raw-material'
                            },
                
                        type: 'POST',
                        datatype:'HTML',
            
                        success: function(data){
                            
                            if(data == 1){
                                alert("Raw Material added successfully.");
                                location.reload();
                            }
                            else{
                                alert("This name already exist. Try again with a different Raw Material Name.");
                                location.reload();
                            }
                            
                        }
         
                    });
                    
            }
   
            
        }
        else{
     
            $('.validate-input1').each(function(){
                
                    if(validate(this) == false){
                        showValidate(this);
                    }
                    else {
                        //$(this).parent().addClass('true-validate');
                        hideValidate(this);
                    }
                });
           
            
            
        }
        
        e.preventDefault();
    });
    
    
    
  //======================================================================================================================
    
    
    
    /*$(".delete-raw-mat").click(function(){                                       //Delete Raw Material
        
        $rwmCode = $(this).parent().siblings().val();

        if(confirm("Delete Raw Material?")){
            
        
            $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        rwmCode: $rwmCode,
                        action:'delete-raw-material'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    if(data == 1){
                        alert("Raw Material successfully deleted.");
                        location.reload();
                    }
                    else{
                        alert("This Raw Material can't be deleted because it is still available in stock.");
                    }
                    
                }
         
            }); 
        }
        
    });*/
    
    
    
    //======================================================================================================================  
    
    
    
    $(".disable-raw-mat").click(function(){                                       //Disable Raw Material
        
        $rwmCode = $(this).parent().siblings().val();
        
        if(confirm("Disable Raw Material?")){
            
        
            $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        rwmCode: $rwmCode,
                        action:'disable-raw-material'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    if(data == 1){
                        alert("Raw Material successfully disabled.");
                        location.reload();
                    }
                    else{
                        alert("This Raw Material can't be disabled because it is still available in stock.");
                    }
                    
                }
         
            }); 
        }
        
    });
    
    
    
    
    
    //======================================================================================================================
    
    
    
    $(".enable-raw-mat").click(function(){                                       //Disable Raw Material
        
        $rwmCode = $(this).parent().siblings().val();
        
        if(confirm("Enable Raw Material?")){
            
        
            $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        rwmCode: $rwmCode,
                        action:'enable-raw-material'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    //$("#tbl").html(data);
                    alert("Raw Material successfully enabled.");
                    location.reload();  
                }
         
            }); 
        }
        
    });
    
    
    
    
    
    //======================================================================================================================
    
        $("#vendor-assist-go").click(function(){                                //Vendor Assist Go
       
        
            $rawMat = $("#raw-mat-find").val(); 
      
            $("#vendor-assist-label").html("Vendors having Raw Material - "+$rawMat+" :");
            $("#vendor-assist-label").show();
            
            
            $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        rawMat: $rawMat,
                        action:'vendor-assist-go'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    $("#vendor-assist-table").html(data);  
                }
         
            }); 
            
                
            //$("#vendor-assist-table").html($tableHtml);
            $("#vendor-assist-div").show(); 
            
            
        });
    
    
    
    //======================================================================================================================
    
    
        $(document).on('click','#request-fund',function(e)
    {                                                                           //Request Fund 
       $flag = false;
        if(validate("#amount")
           && validate("#reason"))
           
        {   
            $flag=true;
        }

        
        if($flag){
            
            
            if (confirm("Request Fund?")){
            var dataDigest = new FormData();
            dataDigest.append('action','request-fund');
            dataDigest.append('amount',$('#amount').val().trim());
            dataDigest.append('reason',$('#reason').val().trim());
            //dataDigest.append('status',$('#status').val().trim());
        
            $.ajax({
                
                url:"../models/modelMain.php",
                data: dataDigest,
                processData: false,
                contentType: false,
                type: 'POST',
                datatype: 'HTML',
            
                success: function(data)
                {
                    alert("Fund requested successfully.");
                    location.reload();
                }
            
            });
            
            }
        }
        else{
            
            $('.validate-input1').each(function(){
                
                    if(validate(this) == false){
                        showValidate(this);
                    }
                    else {
                        //$(this).parent().addClass('true-validate');
                        hideValidate(this);
                    }
                });
        }
        
        e.preventDefault();
    });

    
    
    
    //======================================================================================================================
    
    
    
//    $(".delete-request").click(function(){                                      //Delete Fund Request
//        
//        $reqID = parseInt($(this).parent().siblings().val());
//        //$designationName = $(this).parent().parent().siblings().html();
//        if(confirm("Delete Fund Request?")){
//            
//        //alert($designationName);
//        
//        $.ajax({
//                url:"../models/modelMain.php",
//            
//            
//            
//                data:
//                    {
//                        request_id: $reqID,
//                        action:'delete-request'
//                    },
//                
//                type: 'POST',
//                datatype:'HTML',
//            
//                success: function(data){
//                    
//                        alert("Fund Request successfully deleted.");
//                        location.reload();
//                    
//                    
//                }
//         
//            }); 
//        }
//        
//    });
    
    
    
    
    //======================================================================================================================
    
    
    
    $(".approve-request").click(function(){                                  //Approve Fund Request
        
        $reqID = parseInt($(this).parent().siblings().val());
        
        //alert($reqID);
        if(confirm("Approve Fund Request?")){
        
        
        $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        request_id: $reqID,
                        action:'approve-request'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    
                        alert("Fund Request approved successfully.");
                        location.reload();
                    
                    
                }
         
            }); 
        }
        
    });

    
    
    
    
//======================================================================================================================

    
    $(".reject-request").click(function(){                                  //Reject Fund Request
        
        $reqID = parseInt($(this).parent().parent().find("input").val());
        //alert($reqID);
        
        if(confirm("Reject Fund Request?")){
        
        
        $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        request_id: $reqID,
                        action:'reject-request'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    
                        alert("Fund Request rejected successfully.");
                        location.reload();
                    
                    
                }
         
            }); 
        }
        
    });
    
    
    

   //======================================================================================================================
  
  
  
  
  $(document).on('click','#add-raw-mat-order',function(e)
    {                                                                           //Add Raw Material New Order
        
        $flag = false;
        
        if(validate("#quantity")
           && validate("#cost")
           && validate("#batch-number")
           && validate("#date")
          )
        {
               
            $flag=true;
        }
        
        
        
        if($flag){
            
            if(confirm("Add New Order Entry?")){

                var dataDigest = new FormData();
                dataDigest.append('invoice-file',$('#invoice-file').prop("files")[0]);
                dataDigest.append('action','add-raw-mat-order');
                dataDigest.append('invoice-file-name',$('#invoice-file').val().replace("C:\\fakepath\\",""));
                dataDigest.append('vendorName',$('#vendor').val().trim());
                dataDigest.append('rawMat',$('#raw-mat').val().trim());
                dataDigest.append('quantity',$('#quantity').val().trim());
                dataDigest.append('unitCost',$('#cost').val().trim());
                dataDigest.append('batchNumber',$('#batch-number').val().trim());
                dataDigest.append('date',$('#date').val().trim());


                $.ajax({

                    url:"../models/modelMain.php",
                    data: dataDigest,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    datatype: 'HTML',

                    success: function(data)
                    {

                        alert("Order added successfully.");
                        location.reload();
                    }

                });

            }

        }
        else{
     
            $('.validate-input1').each(function(){
                
                    if(validate(this) == false){
                        showValidate(this);
                    }
                    else {
                        //$(this).parent().addClass('true-validate');
                        hideValidate(this);
                    }
                });
           
            
            
        }
        
        e.preventDefault();
    });
    

//======================================================================================================================

    $(".show-raw-mat-invoice").click(function(){
                                                                                //Show Invoice pdf
        $orderId = $(this).parent().siblings().val();
        
        $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        orderId: $orderId,
                        action:'show-raw-mat-invoice'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    //alert(data);
                    window.open(data, '_new');
                }
         
        });
        
    });



//======================================================================================================================


    $(".return-raw-mat").click(function(){                                      //Return Raw Material Click
        $orderId = $(this).parent().siblings().val();

        $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        orderId: $orderId,
                        action:'return-raw-mat-button'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    window.location='addReturnRawMaterial.php';
                }
         
            });
    });    


//======================================================================================================================
    
    
    $(document).on('click','#return-raw-mat-submit',function(e)
    {                                                                           //Return Raw Material (actual query)
        
        $flag = false;
        
        if(validate("#return-date")
           && validate("#reason")
          )
        {
               
            $flag=true;
        }
        
        
        
        if($flag){
            
            $rawMatOrderId = $("#return-raw-mat-order-id").val();
            $returnedQuantity = $("#returned-quantity").val();
            $inStockQuantity = $("#quantity-in-stock").val();
            $returnDate = $("#return-date").val();
            $reason = $("#reason").val();
            
                
                
                if(confirm("Return Raw Material?")){
                    
                    $.ajax({
                        url:"../models/modelMain.php",
            
            
            
                        data:
                            {
                                rawMatOrderId:$rawMatOrderId,
                                returnedQuantity:$returnedQuantity,
                                returnDate:$returnDate,
                                reason:$reason,
                                inStockQuantity: $inStockQuantity,
                                action:'return-raw-mat'
                            },
                
                        type: 'POST',
                        datatype:'HTML',
            
                        success: function(data){
                            alert("Raw Material Returned Successfully.");
                            //location.reload();
                            window.location="orderedRawMaterials.php";
                        }
         
                    });
                    
                }

        }
        else{
     
            $('.validate-input1').each(function(){
                
                    if(validate(this) == false){
                        showValidate(this);
                    }
                    else {
                        //$(this).parent().addClass('true-validate');
                        hideValidate(this);
                    }
                });
           
            
            
        }
        
        e.preventDefault();
    });
    

    
    
    
//======================================================================================================================

    $("#returned-raw-mat-search-button").click(function(e){                     //Returned Raw Mat Table Search
        
        $str = $("#returned-raw-mat-search-string").val();
        
        $.ajax({
            url:"../models/modelMain.php",
            
            
            
                        data:
                            {
                                searchString:$str,
                                action:'returned-raw-mat-search'
                            },
                
                        type: 'POST',
                        datatype:'HTML',
            
                        success: function(data){
                            $("#returned-raw-mat-table").html(data);
                        }
        });
        
        e.preventDefault();
    });


//======================================================================================================================

    $(document).on('click','#add-new-product-category',function(e)                       
    {                                                                               //Add New Product Category

        $flag = false;

        if(validate("#product-category-name") && validate("#product-category-description"))
        {

            $flag=true;
        }

        if($flag){
            
            if($("#product-category-pic").val()!=""){
                
                if (confirm("Add Product Category?")){

                    var dataDigest = new FormData();
                    
                    
                    dataDigest.append('product-category-pic',$('#product-category-pic').prop("files")[0]);
                    dataDigest.append('product-category-pic-name',$('#product-category-pic').val().replace("C:\\fakepath\\",""));
                    dataDigest.append('product-category-description',$('#product-category-description').val().trim());
                    
                    dataDigest.append('action','add-new-product-category');
                    dataDigest.append('category-name',$('#product-category-name').val().trim());

                    $.ajax({

                        url:"../models/modelMain.php",
                        data: dataDigest,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        datatype: 'HTML',

                        success: function(data)
                        {
                            if(data == 1){
                                alert("Product category added successfully.");
                                location.reload();
                            }
                            else{
                                alert("This product category name already exist. Try again with a different name.");
                                //location.reload();
                            }

                        }

                    });

                }
            }
            
            else{
                alert("Please select an appropriate image to represent product category.");
            }
            

        }

        else{

            $('.validate-input1').each(function(){

                        if(validate(this) == false){
                            showValidate(this);
                        }
                        else {
                            //$(this).parent().addClass('true-validate');
                            hideValidate(this);
                        }
            });
        }

        e.preventDefault();
    });


//======================================================================================================================

    $(".disable-product-category").click(function(){                                       //Disable Product Category
        
        $categoryId = $(this).parent().siblings().val();
        
        if(confirm("Disable Product Category?")){
            
        
            $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        categoryId: $categoryId,
                        action:'disable-product-category'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    if(data == 1){
                        alert("Product category successfully disabled.");
                        location.reload();
                    }
                    else{
                        alert("Product category cannot be disabled, as there exist active products with this category.");
                    }  
                }
         
            }); 
        }
        
    });

//======================================================================================================================
    
    $(".enable-product-category").click(function(){                                       //Enable Product Category
        
        $categoryId = $(this).parent().siblings().val();
        
        if(confirm("Enable Product Category?")){
            
        
            $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        categoryId: $categoryId,
                        action:'enable-product-category'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    alert("Product category successfully enabled.");
                    location.reload();  
                }
         
            }); 
        }
        
    });

//======================================================================================================================


    $(".edit-product-category").click(function(){                                         //Edit Product Category
        $proCatId = $(this).parent().siblings().val();
        
        $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        proCatId: $proCatId,
                        action:'edit-product-category'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    window.location='editProductCategory.php';
                }
         
            });
    });
    
//======================================================================================================================
    
    
    $(document).on('click','#save-edited-product-category',function(e){
                                                                                //Save Edited Product Category
    
       $flag = false;
        
        if(validate("#product-category-description"))
          {    
            $flag=true;
          }
     
        if($flag){
            
           
           
                if(confirm("Save Changes?")){

                    if($("#customSwitch3").prop("checked") == true){
                        $active=1;
                    }
                    else{
                        $active=0;
                    }

                    
                    
                    
                    var dataDigest = new FormData();
                    dataDigest.append('action','save-edited-product-category');
                    
                    dataDigest.append('active',$active);
                    
                    dataDigest.append('pro-cat-description',$('#product-category-description').val().trim());
                    dataDigest.append('pro-cat-id',$('#pro-cat-id').val().trim());
                    dataDigest.append('pro-cat-pic',$('#new-pro-cat-pic').prop("files")[0]);
                    dataDigest.append('pro-cat-pic-name',$('#new-pro-cat-pic').val().replace("C:\\fakepath\\",""));
                    
                    
                    $.ajax({

                        url:"../models/modelMain.php",
                        data: dataDigest,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        datatype: 'HTML',

                        success: function(data)
                        {
                            alert("Changes saved successfully.");
                            location.reload();
                            
                        }

                    });
                }
            
           
           
    }
        
        else{
            
            $('.validate-input1').each(function(){
                
                    if(validate(this) == false){
                        showValidate(this);
                    }
                    else {
                        //$(this).parent().addClass('true-validate');
                        hideValidate(this);
                    }
                });
        }

        
        e.preventDefault();
    });
    

//======================================================================================================================

    $(document).on('click','#add-new-product',function(e)                       
{                                                                               //Add New Product
    
     $flag = false;
        
    if(validate("#product-name") && validate("#unit_cost") && validate("#product-description") )
    {
 
        $flag=true;
    }

    if($flag){
        
        $proRawMatObj = $('#pro-raw-mat').val();
        $proRawMatString = String($proRawMatObj);

        if($('#product-pic').val()!=""){
            
            if($proRawMatString!=""){

                if (confirm("Add Product?")){

                var dataDigest = new FormData();

                dataDigest.append('pro-pic',$('#product-pic').prop("files")[0]);
                dataDigest.append('pro-documentation-file',$('#product-documentation').prop("files")[0]);

                dataDigest.append('pro-pic-name',$('#product-pic').val().replace("C:\\fakepath\\",""));
                dataDigest.append('pro-documentation-file-name',$('#product-documentation').val().replace("C:\\fakepath\\",""));

                dataDigest.append('action','add-new-product');
                dataDigest.append('pro-description',$('#product-description').val().trim());
                dataDigest.append('pro-code',$('#product-code').val().trim());
                dataDigest.append('pro-category',$('#product-category').val().trim());

                dataDigest.append('unit-cost',$('#unit_cost').val().trim());
                dataDigest.append('pro-name',$('#product-name').val().trim());

                dataDigest.append('pro-raw-mat',$proRawMatString);




                $.ajax({

                    url:"../models/modelMain.php",
                    data: dataDigest,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    datatype: 'HTML',

                    success: function(data)
                    {
                        if(data == 1){
                            alert("Product added successfully.");
                            location.reload();
                        }
                        else{
                            alert("This product name already exist. Try again with a different product name.");
                            //location.reload();
                        }

                    }

                });

                }

             }
            else{

                alert("Please select atleast 1 Raw Material");

             }
        }
        else{
            
            alert("Please select product image");
        }
            

    }

    else{

        $('.validate-input1').each(function(){
                
                    if(validate(this) == false){
                        showValidate(this);
                    }
                    else {
                        //$(this).parent().addClass('true-validate');
                        hideValidate(this);
                    }
        });
    }
       
    e.preventDefault();
});


//========================================================================================================================

    
    $(".disable-product").click(function(){                                         //Disable Product
        
        $proId = $(this).parent().siblings().val();
        
        if(confirm("Disable Product?")){
            
        
            $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        proId: $proId,
                        action:'disable-product'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    if(data == 1){
                        alert("Product successfully disabled.");
                        location.reload();
                    }
                    else{
                        alert("This Product can't be disabled because it is still available in stock.");
                    }
                    
                }
         
            }); 
        }
        
    });
    
    
    
    
    
    //======================================================================================================================
    
   $(".edit-product").click(function(){                                         //Edit Product
        $proId = $(this).parent().siblings().val();
        
        $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        proId: $proId,
                        action:'edit-product'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    window.location='editProduct.php';
                }
         
            });
    });
    
    
    //======================================================================================================================
    
    $(document).on('click','#save-edited-product',function(e){
                                                                                //Save Edited Product
    
       $flag = false;
        
        if(validate("#product-name") && validate("#unit-cost") && validate("#product-description"))
          {    
            $flag=true;
          }
     
        if($flag){
            
            $proRawMatObj = $('#pro-raw-mat').val();
            $proRawMatString = String($proRawMatObj);
            
            if($proRawMatString!=""){
                if(confirm("Save Changes?")){

                    if($("#customSwitch3").prop("checked") == true){
                        $active=1;
                    }
                    else{
                        $active=0;
                    }

                    
                    
                    
                    var dataDigest = new FormData();
                    dataDigest.append('action','save-edited-product');
                    dataDigest.append('pro-code',$('#product-code').val().trim());
                    dataDigest.append('pro-category',$('#product-category').val().trim());

                    dataDigest.append('unit-cost',$('#unit-cost').val().trim());
                    dataDigest.append('pro-name',$('#product-name').val().trim());

                    dataDigest.append('pro-raw-mat',$proRawMatString);
                    dataDigest.append('active',$active);
                    
                    dataDigest.append('pro-description',$('#product-description').val().trim());
                    
                    dataDigest.append('pro-pic',$('#new-pro-pic').prop("files")[0]);
                    dataDigest.append('pro-pic-name',$('#new-pro-pic').val().replace("C:\\fakepath\\",""));
                    
                    dataDigest.append('pro-documentation-file',$('#product-documentation').prop("files")[0]);
                    dataDigest.append('pro-documentation-file-name',$('#product-documentation').val().replace("C:\\fakepath\\",""));
                    
                    $.ajax({

                        url:"../models/modelMain.php",
                        data: dataDigest,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        datatype: 'HTML',

                        success: function(data)
                        {
                            if(data==1){
                                alert("Changes saved successfully.");
                                location.reload();
                            }
                            else{
                                alert("This product name already exist. Try again with a different product name.");
                            }

                        }

                    });
                }
            }
            else{
                alert("Please select atleast 1 Raw Material");
            }
           
    }
        
        else{
            
            $('.validate-input1').each(function(){
                
                    if(validate(this) == false){
                        showValidate(this);
                    }
                    else {
                        //$(this).parent().addClass('true-validate');
                        hideValidate(this);
                    }
                });
        }

        
        e.preventDefault();
    });
    
    
    //======================================================================================================================
    
    $(".product-documentation").click(function(){                               
                                                                                //Show Product Documentation
        $proId = $(this).parent().siblings().val();
        
        $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        productId: $proId,
                        action:'show-product-documentation'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    window.open(data, '_new');
                }
         
        });
        
    });
    
    //======================================================================================================================
    
    $(".enable-product").click(function(){                                       //Enable Product
        
        $proCode = $(this).parent().siblings().val();
        
        if(confirm("Enable Product?")){
            
        
            $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        proCode: $proCode,
                        action:'enable-product'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    //$("#tbl").html(data);
                    alert("Product successfully enabled.");
                    location.reload();  
                }
         
            }); 
        }
        
    });


//========================================================================================================================

    
    $(document).on('click','#add-inquiry',function(e)
    {                                                                           //Add Inquiry 
       
       $flag = false;
        if(validate("#inquiry-name")
           && validate("#inquiry-email")
           && validate("#inquiry-number")
           && validate("#inq-comments"))
           
        {   
            $flag=true;
        }

        //$flag = false;
        
        if($flag){
            
          
            
            $irn=$('#inquiry-reg-num').val();
            $name=$('#inquiry-name').val();
            $email=$('#inquiry-email').val();
            $number=$('#inquiry-number').val();
            $inquiryDate=$('#inquiry-date').val();
            $inquiryComments=$('#inq-comments').val();

            if($("#customSwitch3").prop("checked") == true){
               $fup=1;
            }
            else{
              $fup=0;
            }

            $fupDate=$('#fup-date').val();
            $fupReason=$('#fup-reason').val();

            $prodObj = $('#prod-name').val();
            $prodString = String($prodObj);

              if($prodString!=""){

            if (confirm("Add Inquiry?")){
            

            $.ajax({
                
                url:"../models/modelMain.php",
                
                data:
                            {
                                irn:$irn,
                                name:$name,
                                email:$email,
                                number:$number,
                                inquiryDate:$inquiryDate,
                                inquiryComments:$inquiryComments,
                                fup:$fup,
                                fupDate:$fupDate,
                                fupReason:$fupReason,
                                prod:$prodString,
                                action:'add-inquiry'
                            },
                
                        type: 'POST',
                        datatype:'HTML',
            
                        success: function(data){
                            alert("Inquiry added successfully.");
                            location.reload();
                        }
         
                    });
                    
                }
            }
            else{
                alert("Please select atleast 1 Product");
            }
            
        }
        else{
     
            $('.validate-input1').each(function(){
                
                    if(validate(this) == false){
                        showValidate(this);
                    }
                    else {
                        //$(this).parent().addClass('true-validate');
                        hideValidate(this);
                    }
                });
           
            
            
        }
        
        e.preventDefault();
    });

    
    
//======================================================================================================================
    
    
    
    $(document).on('click','.view-more-inquiry',function(e){
                                                                                //Inquiry View More
        $inqID = $(this).parent().siblings().val();
        
        
        $.ajax({
            url:"../models/modelMain.php",
        
            data:
                {
                    inqID:$inqID,
                    action:'view-more-inquiry'
                },
                
            type: 'POST',
            datatype:'HTML',
            
            success: function(data){
                window.location='inquiryDescription.php';
            }
         
        });
        
        e.preventDefault();
    });

//======================================================================================================================

    $(".confirm-sale").click(function(){
        
        $inqID = parseInt($(this).parent().siblings().val());
        
        
        $.ajax({
            url:"../models/modelMain.php",
        
            data:
                {
                    inqID:$inqID,
                    action:'confirm-sale'
                },
                
            type: 'POST',
            datatype:'HTML',
            
            success: function(data){
                window.location='addSale.php';
            }
         
        });
        
        e.preventDefault();
    });

    

//======================================================================================================================



refreshNotificationNumber();                                                    //Refreshes notifications
refreshNotificationContent();

//======================================================================================================================
    
    
    $(document).on('click','#show-all-notification',function(e){
                                                                                //On clicking 'show all notifications'
        
           
        $.ajax({
            url:"../models/modelMain.php",
        
            data:
                {
                    action: 'show-all-notification'
                },
                
            type: 'POST',
            datatype:'HTML',
            
            success: function(data){
                
                    $.ajax({
                        url:"../models/modelMain.php",



                        data:
                            {
                                action:'refresh-notification-number'
                            },

                        type: 'POST',
                        datatype:'HTML',

                        success: function(data){
                            $("#notification-number").html(data);  
                        }

                });
                
                
                $.ajax({
                    url:"../models/modelMain.php",



                    data:
                        {
                            action:'refresh-notification-content'
                        },

                    type: 'POST',
                    datatype:'HTML',

                    success: function(data){
                        $("#notification-content").html(data);  
                    }

                });
                
                
                window.location='notifications.php';
            }
         
        });
        
        e.preventDefault();
    });
    

//======================================================================================================================

   $(document).on('click','.solo-notification-content',function(e){
                                                                                //On clicking individual notification
        $notificationId = $(this).find('input').val();
        $notificationLink = $(this).find('p').html();
        
        $.ajax({
            url:"../models/modelMain.php",
        
            data:
                {
                    notificationId:$notificationId,
                    action:'read-solo-notification'
                },
                
            type: 'POST',
            datatype:'HTML',
            
            success: function(data){
                
                $.ajax({
                        url:"../models/modelMain.php",



                        data:
                            {
                                action:'refresh-notification-number'
                            },

                        type: 'POST',
                        datatype:'HTML',

                        success: function(data){
                            $("#notification-number").html(data);  
                        }

                });
                
                
                $.ajax({
                    url:"../models/modelMain.php",



                    data:
                        {
                            action:'refresh-notification-content'
                        },

                    type: 'POST',
                    datatype:'HTML',

                    success: function(data){
                        $("#notification-content").html(data);  
                    }

                });
                
                
                window.location=''+$notificationLink+'';
            }
         
        });
        
        e.preventDefault();
    }); 

//======================================================================================================================

    $(document).on('click','#add-manufacctured-product',function(e){
                                                                                //Add Manufactured Product Entry
        $rawMatString="";
        $quantityString="";
        
        $('.raw-mat-list').each(function()
        {
            if($rawMatString==""){
               $rawMatString = ""+$(this).val()+""; 
            }
            else{
                $rawMatString = $rawMatString+","+$(this).val();
            }
            
        });
        
        $('.raw-mat-quantity').each(function()
        {
            if($quantityString==""){
               if($(this).val()!=null){
                   $quantityString = ""+$(this).val()+""; 
               } 
            }
            else{
                if($(this).val()!=null){
                    $quantityString = $quantityString+","+$(this).val();
                }
            }
            
        });
        
        //alert($quantityString);
        
        $productName = $("#product").val();
        $batchNumber = $("#batch-number").val();
        $manufacturingDate = $("#date").val();
        
        
        $flag = false;
        if(validate("#date"))
           
        {   
            $flag=true;
        }

        
        if($flag){
            if(confirm("Add Manufactured Product?")){
                
                $.ajax({
            
                    url:"../models/modelMain.php",

                    data:
                        {
                            productName: $productName,
                            batchNumber: $batchNumber,
                            manufacturingDate: $manufacturingDate,
                            rawMatString: $rawMatString,
                            quantityString: $quantityString,
                            action:'add-manufactured-product'
                        },

                    type: 'POST',
                    datatype:'HTML',

                    success: function(data){
                        if(data==1){
                            alert("Manufactured Product Added Successfully.");
                            location.reload();
                            //alert(data);
                        }
                        else{
                            alert("This product can't be manufactured due to insufficient raw materials.");
                            //alert(data);
                        }
                          
                    }

                });
            }
        }
        else{
            
            $('.validate-input1').each(function(){
                
                if(validate(this) == false){
                    showValidate(this);
                }
                else {
                    //$(this).parent().addClass('true-validate');
                    hideValidate(this);
                }
            });
        }
        
        
        
        e.preventDefault();
    });


//======================================================================================================================

    $(document).on('click','#generate-barcode',function(e){                     //Generate Barcode
        
        $flag = false;
        if(validate("#barcode-quantity"))  
        {   
            $flag=true;
        }
        
        if($flag){
            
            $.ajax({
                url:"../models/modelMain.php",

                data:
                    {
                        productName:$("#product").val(),
                        quantity:$("#barcode-quantity").val(),
                        action: "generate-barcode"
                    },

                type: 'POST',
                datatype:'HTML',

                success: function(data){
                    window.open("barcode.php", '_new');
                }

            });
        }
        else{
            
            $('.validate-input1').each(function(){
                
                if(validate(this) == false){
                    showValidate(this);
                }
                else {
                    //$(this).parent().addClass('true-validate');
                    hideValidate(this);
                }
            });
            
        }
        
        
        
        e.preventDefault();
    });



//======================================================================================================================
   
    
          $(".follow-up").click(function(){                                           //Take Follow Up
        $inqID = parseInt($(this).parent().siblings().val());
        
        $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        inquiry_id: $inqID,
                        action:'take-follow-up'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    window.location='inquiryFollowUp.php';
                }
         
            });
    });

//======================================================================================================================
    
    $(document).on('click','#save-follow-up',function(e){
                                                                                //Save Follow Up
        $flag = false;
        
        if(validate("#fup-comments"))

            {    
            $flag=true;
            }
          


        if($flag){
            
            $inqID = $('#inquiry-id').val();
            //$fup_taker = $('#fup-taker').val();
            $fup_date = $('#fup-date').val();
            $prd = $('#prd-name').val();
            $fup_comments = $('#fup-comments').val();

            if($("#customSwitch3").prop("checked") == true){
                   $fup_again=1;
                }
                else{
                  $fup_again=0;
                }

                $fupAgainDate=$('#fup-next-date').val();
                $fupAgainReason=$('#fup-next-reason').val();

            //$fup_again = $('#fup-again').val();
            //$ctoc = $('#ctoc').val();

            if(confirm("Add Follow Up?")){

            $.ajax({

                url:"../models/modelMain.php",


                data:
                        {
                            inquiry_id: $inqID,
                            fup_date: $fup_date,
                            prd: $prd,
                            fup_comments: $fup_comments,
                            fup_again: $fup_again,
                            fupAgainDate: $fupAgainDate,
                            fupAgainReason: $fupAgainReason,
                            action:'save-follow-up'
                        },

                    type: 'POST',
                    datatype:'HTML', 


                success: function(data)
                {
                    alert("Follow up added successfully.");
                    location.reload();
                } 

            });

            }
            
        }
        else{
            
            $('.validate-input1').each(function(){
                
                if(validate(this) == false){
                    showValidate(this);
                }
                else {
                    //$(this).parent().addClass('true-validate');
                    hideValidate(this);
                }
            });
        }


        


        preventDefault();
            
    });






//======================================================================================================================
    
//    $(".delete-inquiry").click(function(){                                         //Delete Inquiry
//        
//        $inqID = $(this).parent().siblings().val();
//        if(confirm("Delete Inquiry?")){
//            
//        
//        $.ajax({
//                url:"../models/modelMain.php",
//            
//            
//            
//                data:
//                    {
//                        inquiry_id: $inqID,
//                        action:'delete-inquiry'
//                    },
//                
//                type: 'POST',
//                datatype:'HTML',
//            
//                success: function(data){
//                    
//                        alert("Inquiry successfully deleted.");
//                        location.reload();
//                    
//                    
//                }
//         
//            }); 
//        }
//        
//    });
    
    
    
//======================================================================================================================  

    
    $(document).on('click','#add-new-sale',function(e){
                                                                                //Add New Sale Entry
        //alert($("#refresh-flag").val())
        $flag = false;
        if(validate("#customer-name") &&
           validate("#customer-email") &&
           validate("#customer-number") &&
           validate("#delivery-address") &&
           validate("#delivery-pin-code") &&
           validate("#delivery-city") &&
           validate("#date") &&
           validate("#percent-discount")
           )  
        {   
            $flag=true;
        }
        
        if($flag){
            
            $productNameString = $("#product-name-array").val()
        
            $productQuantityString = "";

            $('.sale-product-quantity').each(function()
            {
                if($productQuantityString==""){
                   if($(this).val()!=null){
                       $productQuantityString = ""+$(this).val()+""; 
                   } 
                }
                else{
                    if($(this).val()!=null){
                        $productQuantityString = $productQuantityString+","+$(this).val();
                    }
                }

            });
        
            if(confirm("Add Sale Entry?")){
                
                
                var dataDigest = new FormData();
                dataDigest.append('action','add-new-sale');
                
                dataDigest.append('customer-name',$('#customer-name').val().trim());
                dataDigest.append('customer-email',$('#customer-email').val().trim());
                dataDigest.append('customer-number',$('#customer-number').val().trim());
                dataDigest.append('delivery-address',$('#delivery-address').val().trim());
                dataDigest.append('delivery-pin-code',$('#delivery-pin-code').val().trim());
                dataDigest.append('delivery-city',$('#delivery-city').val().trim());
                dataDigest.append('percent-discount',$('#percent-discount').val().trim());
                dataDigest.append('invoice-number',$('#invoice-number').val().trim());
                dataDigest.append('delivery-state',$('#delivery-state').val().trim());
                dataDigest.append('date',$('#date').val().trim());
                
                
                
                
                
                dataDigest.append('productNameString',$productNameString);
                dataDigest.append('productQuantityString',$productQuantityString);

                $.ajax({

                    url:"../models/modelMain.php",
                    data: dataDigest,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    datatype: 'HTML',

                    success: function(data)
                    {
                        alert("Sale entry added successfully.");
                        
                        if($("#refresh-flag").val()==1){
                            window.location = "displayInquiries.php"
                        }
                        else{
                            location.reload();
                        }
                    }

                });
                
            }
        
        }
        else{
            
            $('.validate-input1').each(function(){
                
                if(validate(this) == false){
                    showValidate(this);
                }
                else {
                    hideValidate(this);
                }
            });
     
        }
        
        e.preventDefault();
    });

//======================================================================================================================

    $(document).on('click','.generate-invoice',function(e){
        
        $saleId = $(this).parent().siblings().val();
        
        
        $.ajax({
            url:"../models/modelMain.php",
        
            data:
                {
                    saleId:$saleId,
                    action:'generate-invoice'
                },
                
            type: 'POST',
            datatype:'HTML',
            
            success: function(data){
                window.location='showInvoice.php';
            }
         
        });
        
        e.preventDefault();
    });
    
    
//======================================================================================================================

    $(document).on('click','.view-more-sale',function(e){
        
        $saleId = $(this).parent().siblings().val();
        $flag = $(this).parent().parent().find("span").html();
        
        
        $.ajax({
            url:"../models/modelMain.php",
        
            data:
                {
                    flag:$flag,
                    saleId:$saleId,
                    action:'view-more-sale'
                },
                
            type: 'POST',
            datatype:'HTML',
            
            success: function(data){
                window.location='saleDescription.php';
            }
         
        });
        
        e.preventDefault();
    });

//======================================================================================================================
    
    
    
    $(document).on('click','#oscustomer_table_search',function(e)                    // ON-SITE CUSTOMER SEARCH
        {
            $str=$('#oscustomer-search-string').val();
            $.ajax({

                url:"../models/modelMain.php",
        
            data:
                {
                    oscustomer_search_string:$str,
                    action:'oscustomer-search-string'
                },
                
            type: 'POST',
            datatype:'HTML',

            success: function(data){
                $("#oscustomer-table-body").html(data);
            }


            });
            
        });

//========================================================================================================================        
    
    
    $("#search-service-product").click(function(e){
       
      $.ajax({

            url:"../models/modelMain.php",

        data:
            {
                batchNumber: $("#product-batch-number").val(),
                action:'show-add-new-service-div'
            },

        type: 'POST',
        datatype:'HTML',

        success: function(data){
            $("#new-service-body").html(data);
            $('#new-service-div').show();
        }


        });  
      
      e.preventDefault();  
    });

    
//========================================================================================================================

    $("#add-new-service").click(function(e){
        
        
        $flag = false;
        if(validate("#product-defect") &&
           validate("#submit-date") &&
           validate("#return-date") &&
           validate("#cost")
           )  
        {   
            $flag=true;
        }
        
        if($flag){
            
            if(confirm("Add product for service?")){
                
                var dataDigest = new FormData();
                dataDigest.append('action','add-service');
                
                dataDigest.append('batch-number',$('#batch-number').val().trim());
                dataDigest.append('product-defect',$('#product-defect').val().trim());
                dataDigest.append('submit-date',$('#submit-date').val().trim());
                dataDigest.append('return-date',$('#return-date').val().trim());
                dataDigest.append('cost',$('#cost').val().trim());
                dataDigest.append('service-reg-num',$('#service-reg-num').val().trim());
        
                $.ajax({

                    url:"../models/modelMain.php",
                    data: dataDigest,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    datatype: 'HTML',

                    success: function(data)
                    {
                        alert("Product added for service successfully.");
                        location.reload();
                    }

                });
                
            }
            
        }
        else{
            
            $('.validate-input1').each(function(){
                
                if(validate(this) == false){
                    showValidate(this);
                }
                else {
                    hideValidate(this);
                }
            });
            
        }
        
        
        e.preventDefault();
    });
    
//========================================================================================================================


    $(".mark-service-done").click(function(e){
        $serviceId = parseInt($(this).parent().siblings().val());
        
        if(confirm("Service Done?")){
            
           $.ajax({

                    url:"../models/modelMain.php",

                    data:
                        {
                            serviceId:$serviceId,
                            action:'mark-done-service'
                        },

                    type: 'POST',
                    datatype:'HTML',

                    success: function(data){
                        //alert("Service marked as done.");
                        location.reload();
                    }


                }); 
        }
        
        e.preventDefault();
    });
    
//========================================================================================================================

    $(".mark-service-returned").click(function(e){
        $serviceId = parseInt($(this).parent().siblings().val());
        
        if(confirm("Product Returned after Servicing?")){
            
            $.ajax({

                    url:"../models/modelMain.php",

                    data:
                        {
                            serviceId:$serviceId,
                            action:'mark-returned-service'
                        },

                    type: 'POST',
                    datatype:'HTML',

                    success: function(data){
                        //alert("Product marked as returned after servicing.");
                        location.reload();
                    }


                });
        }
        
        e.preventDefault();
    });
    
    
//========================================================================================================================

    $(".to-do-checkbox").click(function(e){
                                                                                //Mark Checked To Do Entry
       if($(this).prop("checked") == true){
            
            if(confirm("Mark as done?")){
                
                $toDoId = parseInt($(this).parent().find("span").html());
                
                $.ajax({

                    url:"../models/modelMain.php",

                data:
                    {
                        toDoId:$toDoId,
                        action:'mark-checked-to-do'
                    },

                type: 'POST',
                datatype:'HTML',

                success: function(data){
                    //alert("Work marked as done");
                    location.reload();
                }


                });
                
            }
            else{
                e.preventDefault();
            }
            
        }
        else{
            
            e.preventDefault();
        }
    });

//======================================================================================================================

    $(".delete-to-do").click(function(e){
        
        $toDoId = parseInt($(this).parent().find("span").html());
        
        if(confirm("Delete?")){
            
            $.ajax({

                url:"../models/modelMain.php",

            data:
                {
                    toDoId:$toDoId,
                    action:'delete-to-do'
                },

            type: 'POST',
            datatype:'HTML',

            success: function(data){
                //alert("Entry Deleted.");
                location.reload();
            }


            });
            
        }
            
        
    });

//======================================================================================================================

    $(document).on('click','#add-new-to-do',function(e){
                                                                                //Add New To Do Entry
        
        $flag = false;
        if(validate("#to-do-data") &&
           validate("#deadline-date") &&
           validate("#deadline-time")
           )  
        {   
            $flag=true;
        }
        
        if($flag){
            
            if(confirm("Add Item?")){
                
                
                var dataDigest = new FormData();
                dataDigest.append('action','add-new-to-do');
                
                dataDigest.append('to-do-data',$('#to-do-data').val().trim());
                dataDigest.append('deadline-date',$('#deadline-date').val().trim());
                dataDigest.append('deadline-time',$('#deadline-time').val().trim());
        
                $.ajax({

                    url:"../models/modelMain.php",
                    data: dataDigest,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    datatype: 'HTML',

                    success: function(data)
                    {
                        //alert("Item Added Successfully.");
                        location.reload();
                    }

                });
                
            }
        
        }
        else{
            
            $('.validate-input1').each(function(){
                
                if(validate(this) == false){
                    showValidate(this);
                }
                else {
                    hideValidate(this);
                }
            });
     
        }
        
        e.preventDefault();
    });

//======================================================================================================================
    
    $(".save-edited-to-do").click(function(e){
                                                                                //Save Edited To Do Entry
        
        $toDoId = parseInt($(this).parent().find("span").html());

        $flag = false;
        if(validate("#to-do-data-"+$toDoId) &&
           validate("#deadline-date-"+$toDoId) &&
           validate("#deadline-time-"+$toDoId)
           )  
        {   
            $flag=true;
        }
        
        if($flag){
            
            if(confirm("Save Changes?")){
                
                
                var dataDigest = new FormData();
                dataDigest.append('action','save-edited-to-do');
                
                dataDigest.append('to-do-id',$toDoId);
                dataDigest.append('to-do-data',$('#to-do-data-'+$toDoId).val().trim());
                dataDigest.append('deadline-date',$('#deadline-date-'+$toDoId).val().trim());
                dataDigest.append('deadline-time',$('#deadline-time-'+$toDoId).val().trim());
        
                $.ajax({

                    url:"../models/modelMain.php",
                    data: dataDigest,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    datatype: 'HTML',

                    success: function(data)
                    {
                        //alert("Changes Saved Successfully.");
                        location.reload();
                    }

                });
                
            }
        
        }
        else{
            
            $('.validate-input1').each(function(){
                
                if(validate(this) == false){
                    showValidate(this);
                }
                else {
                    hideValidate(this);
                }
            });
     
        }
        
        e.preventDefault();
    });


//======================================================================================================================
    
    $(".save-allocated-inquiry").click(function(e){
        
        $inqId = parseInt($(this).parent().find("span").html());
        $allocatedTo = $("#allocated-to-"+$inqId).val();
        
        if(confirm("Allocate inquiry to "+$allocatedTo+"?")){
            
            $.ajax({
                url:"../models/modelMain.php",

                data:
                    {
                        inqId:$inqId,
                        allocateTo:$allocatedTo,
                        action:'allocate-inquiry-to'
                    },

                type: 'POST',
                datatype:'HTML',

                success: function(data){
                    alert("Inquiry allocation successful.");
                    location.reload();
                }

            });
        }
        
        e.preventDefault();
    });
    

//======================================================================================================================

    $(".fix-inquiry-appointment").click(function(e){
                                                                                //Set Inquiry Appointment
        
        $inqId = parseInt($(this).parent().find("span").html());

        $flag = false;
        if(validate("#appointment-date-"+$inqId) &&
           validate("#appointment-time-"+$inqId)
           )  
        {   
            $flag=true;
        }
        
        if($flag){
            
            if(confirm("Confirm Appointment?")){
                
                
                var dataDigest = new FormData();
                dataDigest.append('action','fix-inquiry-appointment');
                
                dataDigest.append('inq-id',$inqId);
                dataDigest.append('appointment-date',$("#appointment-date-"+$inqId).val().trim());
                dataDigest.append('appointment-time',$("#appointment-time-"+$inqId).val().trim());
        
                $.ajax({

                    url:"../models/modelMain.php",
                    data: dataDigest,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    datatype: 'HTML',

                    success: function(data)
                    {
                        if(data==1){
                            alert("Appointment Fixed Successfully.");
                            location.reload();
                        }
                        else{
                            alert("Poor internet connction. Try again later.");
                            //location.reload();

                        }
                        
                    }

                });
                
            }
            
        }
        else{
            
            $('.validate-input1').each(function(){
                
                if(validate(this) == false){
                    showValidate(this);
                }
                else {
                    hideValidate(this);
                }
            });
            
        }
        
        e.preventDefault();
    });
    
    
//======================================================================================================================

    $(".take-scheduled-appointment").click(function(e){
        
        $webInqId = parseInt($(this).parent().parent().find('input').val());
        
        var dataDigest = new FormData();
        dataDigest.append('action','redirect-to-site-inquiry');

        dataDigest.append('web-inq-id',$webInqId);
        $.ajax({

                url:"../models/modelMain.php",
                data: dataDigest,
                processData: false,
                contentType: false,
                type: 'POST',
                datatype: 'HTML',

                success: function(data)
                {
                    window.location="addInquiry.php";
                }

            });
        
        e.preventDefault();
    });

//======================================================================================================================

    $("#make-request").click(function(){
        
        $requestType = $("#request-type").val();
        
        
        $flag = false;
        
        if($requestType == "Product"){
            
            if(validate("#product-quantity"))  
            {   
                $flag=true;
            }
            
            
        }
        else if($requestType == "Raw Material"){
            
            if(validate("#raw-mat-quantity"))  
            {   
                $flag=true;
            }
            
        }
        else{
           
            if(validate("#fund-amount") && validate("#fund-reason"))  
            {   
                $flag=true;
            }
            
        }
        
        if($flag){
            
            if($requestType == "Product"){
            
                $reason = $("#product-name").val();
                $amount = $("#product-quantity").val();
            }
            else if($requestType == "Raw Material"){

                $reason = $("#raw-mat-name").val();
                $amount = $("#raw-mat-quantity").val();
            }
            else{

                $reason = $("#fund-reason").val();
                $amount = $("#fund-amount").val();
            }
            
            if(confirm("Make "+$requestType+" Request?")){
                
                var dataDigest = new FormData();
                dataDigest.append('action','make-request');
                dataDigest.append('amount',$amount);
                dataDigest.append('reason',$reason);
                dataDigest.append('request-type',$requestType);

                $.ajax({

                        url:"../models/modelMain.php",
                        data: dataDigest,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        datatype: 'HTML',

                        success: function(data)
                        {
                            alert("Request Made Successfully.");
                            location.reload();
                        }

                    });
                
            }
            
            
        }
        else{
            
            $('.validate-input1').each(function(){
                
                if(validate(this) == false){
                    showValidate(this);
                }
                else {
                    hideValidate(this);
                }
            });
            
        }
        
        preventDefault();
        
    });


//======================================================================================================================


    $(".approve-request-2").click(function(){                                  //Approve Request
        
        $reqID = parseInt($(this).parent().siblings().val());
        
        //alert($reqID);
        if(confirm("Approve Request?")){
        
        
        $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        request_id: $reqID,
                        action:'approve-request-2'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    
                        alert("Request approved successfully.");
                        location.reload();
                    
                    
                }
         
            }); 
        }
        
    });

    
    
    
    
//======================================================================================================================

    
    $(".reject-request-2").click(function(){                                  //Reject Request
        
        $reqID = parseInt($(this).parent().parent().find("input").val());
        //alert($reqID);
        
        if(confirm("Reject Request?")){
        
        
        $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        request_id: $reqID,
                        action:'reject-request-2'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    
                        alert("Request rejected successfully.");
                        location.reload();
                    
                    
                }
         
            }); 
        }
        
    });
    
    
    
//======================================================================================================================

    $(".edit-industrial-application").click(function(){                                         //Edit Industrial Application
        $industryId = $(this).parent().siblings().val();
        //alert($industryId);
        
        $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        industryId: $industryId,
                        action:'edit-industrial-application'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    window.location='editIndustrialApplication.php';
                }
         
            });
    });
    

//======================================================================================================================    
    
    $(document).on('click','#save-edited-industry-application',function(e){
                                                                                //Save Edited Industrial Appliction
    
       $flag = false;
        
        if(validate("#industry-application-description"))
          {    
            $flag=true;
          }
     
        if($flag){
            
           
           
                if(confirm("Save Changes?")){
                    
                    $products = $("#industrial-application-products").val();
                    $products = String($products);

                    if($("#customSwitch3").prop("checked") == true){
                        $active=1;
                    }
                    else{
                        $active=0;
                    }

                    
                    
                    
                    var dataDigest = new FormData();
                    dataDigest.append('action','save-edited-industry-application');
                    
                    dataDigest.append('active',$active);
                    
                    dataDigest.append('industry-application-description',$('#industry-application-description').val().trim());
                    dataDigest.append('industry-application-id',$('#industry-application-id').val().trim());
                    dataDigest.append('industry-application-pic',$('#new-industry-application-pic').prop("files")[0]);
                    dataDigest.append('industry-application-pic-name',$('#new-industry-application-pic').val().replace("C:\\fakepath\\",""));
                    dataDigest.append('products',$products);
                    
                    
                    $.ajax({

                        url:"../models/modelMain.php",
                        data: dataDigest,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        datatype: 'HTML',

                        success: function(data)
                        {
                            alert("Changes saved successfully.");
                            location.reload();
                            
                        }

                    });
                }
            
           
           
    }
        
        else{
            
            $('.validate-input1').each(function(){
                
                    if(validate(this) == false){
                        showValidate(this);
                    }
                    else {
                        //$(this).parent().addClass('true-validate');
                        hideValidate(this);
                    }
                });
        }

        
        e.preventDefault();
    });
    

//======================================================================================================================
    
   $(".disable-industrial-application").click(function(){                                       //Disable Product Category
        
        $categoryId = $(this).parent().siblings().val();
        
        if(confirm("Disable Industrial Application?")){
            
        
            $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        industrialApplicationId: $categoryId,
                        action:'disable-industrial-application'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    if(data == 1){
                        alert("Industrial Application successfully disabled.");
                        location.reload();
                    }
                    else{
                        alert("Product application cannot be disabled, as there exist active products having this application.");
                    }  
                }
         
            }); 
        }
        
    }); 
    
    
//=========================================================================================================================    

   $(document).on('click','#add-new-industrial-application',function(e)                       
    {                                                                               //Add New Industrial Application

        $flag = false;

        if(validate("#industrial-application-name") && validate("#industrial-application-description"))
        {

            $flag=true;
        }

        if($flag){
            
            if($("#industrial-application-pic").val()!=""){
                
                if (confirm("Add Industrial Application?")){
                    
                    $products = $("#industrial-application-products").val();
                    $products = String($products);

                    var dataDigest = new FormData();
                    
                    
                    dataDigest.append('industrial-application-pic',$('#industrial-application-pic').prop("files")[0]);
                    dataDigest.append('industrial-application-pic-name',$('#industrial-application-pic').val().replace("C:\\fakepath\\",""));
                    dataDigest.append('industrial-application-description',$('#industrial-application-description').val().trim());
                    
                    dataDigest.append('action','add-new-industrial-application');
                    dataDigest.append('industrial-application-name',$('#industrial-application-name').val().trim());
                    dataDigest.append('products',$products);
                    

                    $.ajax({

                        url:"../models/modelMain.php",
                        data: dataDigest,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        datatype: 'HTML',

                        success: function(data)
                        {
                            if(data == 1){
                                alert("Industrial Application added successfully.");
                                location.reload();
                            }
                            else{
                                alert("This industrial application name already exist. Try again with a different name.");
                                //location.reload();
                            }

                        }

                    });

                }
            }
            
            else{
                alert("Please select an appropriate image to represent the industrial application.");
            }
            

        }

        else{

            $('.validate-input1').each(function(){

                        if(validate(this) == false){
                            showValidate(this);
                        }
                        else {
                            //$(this).parent().addClass('true-validate');
                            hideValidate(this);
                        }
            });
        }

        e.preventDefault();
    });


//======================================================================================================================

    $(document).on('click','#raw-mat-search-button',function(e)                    // Raw Material Search
    {
        $str=$('#raw-mat-search-string').val();

        $.ajax({

            url:"../models/modelMain.php",

        data:
            {
                string:$str,
                action:'raw-mat-search-string'
            },

        type: 'POST',
        datatype:'HTML',

        success: function(data){
            $("#raw-mat-search-body").html(data);
        }


        });

        e.preventDefault();
    });
    
//=========================================================================================================================

    $(document).on('click','#ordered-raw-mat-search-button',function(e)                    // Raw Material Orders Search
    {
        $str=$('#ordered-raw-mat-search-string').val();

        $.ajax({

            url:"../models/modelMain.php",

        data:
            {
                string:$str,
                action:'ordered-raw-mat-search-string'
            },

        type: 'POST',
        datatype:'HTML',

        success: function(data){
            $("#ordered-raw-mat-search-table").html(data);
        }


        });

        e.preventDefault();
    });

//=========================================================================================================================

    
    $(document).on('click','#product-category-table-search',function(e)                    // Product Category Search
    {
        $str=$('#product-category-search-string').val();

        $.ajax({

            url:"../models/modelMain.php",

        data:
            {
                string:$str,
                action:'product-category-table-search'
            },

        type: 'POST',
        datatype:'HTML',

        success: function(data){
            $("#product-category-table-body").html(data);
        }


        });

        e.preventDefault();
    });

//=========================================================================================================================

    $(document).on('click','#product-table-search',function(e)                    // Product Search
    {
        $str=$('#product-search-string').val();

        $.ajax({

            url:"../models/modelMain.php",

        data:
            {
                string:$str,
                action:'product-table-search'
            },

        type: 'POST',
        datatype:'HTML',

        success: function(data){
            $("#product-table-body").html(data);
        }


        });

        e.preventDefault();
    });

//=========================================================================================================================


    $(document).on('click','#industrial-applications-table-search',function(e)                    // Product Search
    {
        $str=$('#industrial-applications-search-string').val();

        $.ajax({

            url:"../models/modelMain.php",

        data:
            {
                string:$str,
                action:'industrial-applications-table-search'
            },

        type: 'POST',
        datatype:'HTML',

        success: function(data){
            $("#industrial-applications-table-body").html(data);
        }


        });

        e.preventDefault();
    });


//=========================================================================================================================

    $(document).on('click','#manufactured-product-table-search',function(e)                    //Manufactured Product Search
    {
        $str=$('#manufactured-product-search-string').val();

        $.ajax({

            url:"../models/modelMain.php",

        data:
            {
                string:$str,
                action:'manufactured-product-table-search'
            },

        type: 'POST',
        datatype:'HTML',

        success: function(data){
            $("#manufactured-product-table-body").html(data);
        }


        });

        e.preventDefault();
    });



//=========================================================================================================================

    
    $(document).on('click','#sale-table-search',function(e)                    // Search Sale
    {
        $str=$('#sale-search-string').val();

        $.ajax({

            url:"../models/modelMain.php",

        data:
            {
                string:$str,
                action:'sale-table-search'
            },

        type: 'POST',
        datatype:'HTML',

        success: function(data){
            $("#sale-table-body").html(data);
        }


        });

        e.preventDefault();
    });




//=========================================================================================================================

    $(document).on('click','#onsite-inquiry-table-search',function(e)                    // Search On-Site Inquiry
    {
        $str=$('#onsite-inquiry-search-string').val();

        $.ajax({

            url:"../models/modelMain.php",

        data:
            {
                string:$str,
                action:'onsite-inquiry-table-search'
            },

        type: 'POST',
        datatype:'HTML',

        success: function(data){
            $("#onsite-inquiry-table-body").html(data);
        }


        });

        e.preventDefault();
    });


//=========================================================================================================================



    $(document).on('click','#web-inquiry-table-search',function(e)                    // Search Web Inquiry
    {
        $str=$('#web-inquiry-search-string').val();

        $.ajax({

            url:"../models/modelMain.php",

        data:
            {
                string:$str,
                action:'web-inquiry-table-search'
            },

        type: 'POST',
        datatype:'HTML',

        success: function(data){
            $("#web-inquiry-table-body").html(data);
        }


        });

        e.preventDefault();
    });



//=========================================================================================================================

 
    $(document).on('click','#assigned-web-inquiry-table-search',function(e)                    // Search Assigned Web Inquiry
    {
        $str=$('#assigned-web-inquiry-search-string').val();

        $.ajax({

            url:"../models/modelMain.php",

        data:
            {
                string:$str,
                action:'assigned-web-inquiry-table-search'
            },

        type: 'POST',
        datatype:'HTML',

        success: function(data){
            $("#assigned-web-inquiry-table-body").html(data);
        }


        });

        e.preventDefault();
    });




//=========================================================================================================================



    $(document).on('click','#service-table-search',function(e)                    // Search Serviced Product
    {
        $str=$('#service-search-string').val();

        $.ajax({

            url:"../models/modelMain.php",

        data:
            {
                string:$str,
                action:'service-table-search'
            },

        type: 'POST',
        datatype:'HTML',

        success: function(data){
            $("#service-table-body").html(data);
        }


        });

        e.preventDefault();
    });




//=========================================================================================================================

    

    $(document).on('click','#applicant_table_search',function(e)                                      // Search Applicant
    {
        $str=$('#applicant-search-string').val();

        $.ajax({

            url:"../models/modelMain.php",

        data:
            {
                string:$str,
                action:'applicant_table_search'
            },

        type: 'POST',
        datatype:'HTML',

        success: function(data){
            $("#applicant-table-body").html(data);
        }


        });

        e.preventDefault();
    });




//=========================================================================================================================

    

    $(document).on('click','#make-request-table-search',function(e)                    // Search Make Request
    {
        $str=$('#make-request-search-string').val();

        $.ajax({

            url:"../models/modelMain.php",

        data:
            {
                string:$str,
                action:'make-request-table-search'
            },

        type: 'POST',
        datatype:'HTML',

        success: function(data){
            $("#make-request-table-body").html(data);
        }


        });

        e.preventDefault();
    });




//=========================================================================================================================

    

    $(document).on('click','#manage-product-table-search',function(e)                                      // Search Manage Product Request
    {
        $str=$('#manage-product-search-string').val();

        $.ajax({

            url:"../models/modelMain.php",

        data:
            {
                string:$str,
                action:'manage-product-table-search'
            },

        type: 'POST',
        datatype:'HTML',

        success: function(data){
            $("#manage-product-table-body").html(data);
        }


        });

        e.preventDefault();
    });




//=========================================================================================================================

    

    $(document).on('click','#manage-raw-mat-search',function(e)                                      // Search Manage Raw Material
    {
        $str=$('#manage-raw-mat-search-string').val();

        $.ajax({

            url:"../models/modelMain.php",

        data:
            {
                string:$str,
                action:'manage-raw-mat-search'
            },

        type: 'POST',
        datatype:'HTML',

        success: function(data){
            $("#manage-raw-mat-table-body").html(data);
        }


        });

        e.preventDefault();
    });




//=========================================================================================================================

    

    $(document).on('click','#manage-fund-search',function(e)                                      // Search Fund Manage
    {
        $str=$('#manage-fund-search-string').val();

        $.ajax({

            url:"../models/modelMain.php",

        data:
            {
                string:$str,
                action:'manage-fund-search'
            },

        type: 'POST',
        datatype:'HTML',

        success: function(data){
            $("#manage-fund-search-body").html(data);
        }


        });

        e.preventDefault();
    });




//=======================================================================================================================    
    
    
    
});

  
  
//====================================================================================================================== 


function validate (input) {                                                     //Main Validation
        
    if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }

        else if($(input).attr('name') == 'number') {
            if($(input).val().match(/^[0-9]{10}$/)==null){
                return false;
            }
        }
        
        else if($(input).attr('name') == 'password') {
            if($(input).val().match(/^([a-zA-Z0-9!#@\$%\^&\*\(\)\-\+=\[\]\\{}\<\>_\?/]{8,50})$/)==null){
                return false;
            }
        }

        else if($(input).attr('name') == 'confirm-password') {
            if($(input).val().trim()=='' || $(input).val().trim()!=$("#user-password2").val().trim())
                return false;
        }
        
        else if($(input).attr('name') == 'gst-num') {
            if($(input).val().match(/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/)==null){
                return false;
            }
        }
        
        else if($(input).attr('name') == 'time') {
            if($(input).val().match(/^(1[0-2]|0?[1-9]):[0-5][0-9] (AM|PM)$/)==null){
                return false;
            }
        }
        
        else if($(input).attr('name') == 'pin-code') {
            if($(input).val().match(/^[1-9][0-9]{5}$/)==null){
                return false;
            }
        }
        
        else if($(input).attr('name') == 'quantity') {
            if($(input).val().trim()=='' || parseInt($(input).val().trim())<1){
                return false;
            }
        }
        
        else if($(input).attr('name') == 'cost') {
            if($(input).val().trim()=='' || parseInt($(input).val().trim())<1){
                return false;
            }
        }
        
        else if($(input).attr('name') == 'service-cost') {
            if($(input).val().trim()=='' || parseInt($(input).val().trim())<0){
                return false;
            }
        }
        
        else if($(input).attr('name') == 'percentage') {
            if($(input).val().trim()=='' || parseInt($(input).val().trim())<0 || parseInt($(input).val().trim())>100){
                return false;
            }
        }
        
        else if($(input).attr('name') == 'batch-number') {
            if($(input).val().trim()=='' || parseInt($(input).val().trim())<1){
                return false;
            }
        }
        
        else if($(input).attr('name') == 'pro-man-raw-mat-quantity') {
            if($(input).val().trim()=='' || parseInt($(input).val().trim())<1){
                return false;
            }
        }
       
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }

       return true;
    }
    
    
    
//====================================================================================================================== 
 
    
function showValidate(input) {                                                  //Show Validations
    //var thisAlert = $(input).parent();

    $(input).addClass('is-invalid');
 }

//====================================================================================================================== 


function hideValidate(input) {                                                  //Hide Validations
    //var thisAlert = $(input).parent();

    $(input).removeClass('is-invalid');
}

//======================================================================================================================

function refreshNotificationNumber(){
    setInterval(function(){                                                     //For refreshing notification number
        
       $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        action:'refresh-notification-number'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    $("#notification-number").html(data);  
                }
         
            }); 
        
    }, 5000);  //delay given here (1000 = 1 sec)
}


//======================================================================================================================

function refreshNotificationContent(){
    setInterval(function(){                                                     //For refreshing notification body
       
        $.ajax({
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        action:'refresh-notification-content'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    $("#notification-content").html(data);  
                }
         
            }); 
        
    }, 5000);  //delay given here (1000 = 1 sec)
}
