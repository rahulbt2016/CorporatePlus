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
            
                url:"http://localhost/CorporatePlus/models/modelMain.php",
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

            url:"http://localhost/CorporatePlus/models/modelMain.php",
        
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

            url:"http://localhost/CorporatePlus/models/modelMain.php",
        
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

            url:"http://localhost/CorporatePlus/models/modelMain.php",
        
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

            url:"http://localhost/CorporatePlus/models/modelMain.php",
        
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




    $(document).on('click','#table_search',function(e)
        {
            /*var dataDigest = new FormData();
            dataDigest.append('search_string',$('#search_string').val().trim());*/
            $str=$('#applicant-search-string').val();
           
            //alert($search);
            
            $.ajax({

                url:"../models/modelMain.php",
        
            data:
                {
                    search_string:$str,
                    action:'applicant-search-string'
                },
                
            type: 'POST',
            datatype:'HTML',

            success: function(data){
                $("#applicant-table-body").html(data);
            }


            });

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
           && validate("#inquiry-number"))
           
        {   
            $flag=true;
        }

        //$flag = false;
        
        if($flag){
            
          
            
            
            $name=$('#inquiry-name').val();
            $email=$('#inquiry-email').val();
            $number=$('#inquiry-number').val();
            $inquiryDate=$('#inquiry-date').val();
            $inquiryAllocated=$('#inquiry-allocated').val();
            $prodObj = $('#prod-name').val();
            $prodString = String($prodObj);

              if($prodString!=""){

            if (confirm("Add Inquiry?")){
            

            /*var dataDigest = new FormData();
            dataDigest.append('action','add-inquiry');
            dataDigest.append('inquiry-name',$('#inquiry-name').val().trim());
            dataDigest.append('inquiry-email',$('#inquiry-email').val().trim());
            dataDigest.append('inquiry-number',$('#inquiry-number').val().trim());
            dataDigest.append('inquiry-product-category',$('#inquiry-product-category').val().trim());
            dataDigest.append('inquiry-product-name',$('#inquiry-product-name').val().trim());
            dataDigest.append('inquiry-product-price',$('#inquiry-product-price').val().trim());
            dataDigest.append('inquiry-product-id',$('#inquiry-product-id').val().trim());
            dataDigest.append('inquiry-date',$('#inquiry-date').val().trim());
            dataDigest.append('inquiry-taker',$('#inquiry-taker').val().trim());
            dataDigest.append('inquiry-allocated',$('#inquiry-allocated').val().trim());*/
            $.ajax({
                
                url:"http://localhost/CorporatePlus/models/modelMain.php",
                
                data:
                            {
                                name:$name,
                                email:$email,
                                number:$number,
                                inquiryDate:$inquiryDate,
                                inquiryAllocated:$inquiryAllocated,
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

    $(document).on('click','#generate-barcode',function(e){
        
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
    /* $(document).on('click','#',function(e){
        
        
        
        $.ajax({
            url:"../models/modelMain.php",
        
            data:
                {
                    :$,
                    action:''
                },
                
            type: 'POST',
            datatype:'HTML',
            
            success: function(data){
                
            }
         
        });
        
        e.preventDefault();
    }); */
    
    
    
    
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
