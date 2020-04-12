$(document).ready(function()
{
                                                                                //For Validation
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
            
            $(this).on('click', function(){
                
                    hideValidate(this);
               
            });
            

        });
        
//======================================================================================================================================        
        
	$(document).on('click','#contact-us',function(e){

			
	$flag = false;


            if(validate("#contact-name")
               && validate("#contact-email")
               && validate("#contact-message"))
           {
           
           	$flag = true;

            
           }

        if($flag)
        {
        	var dataDigest = new FormData();
                dataDigest.append('action','contact');
                dataDigest.append('contact-name',$('#contact-name').val().trim());
                dataDigest.append('contact-email',$('#contact-email').val().trim());
                //dataDigest.append('contact-subject',$('#contact-subject').val().trim());
                dataDigest.append('contact-message',$('#contact-message').val().trim());
                

                if(confirm("Send Message?")){
                    
                    $.ajax({
            
                        url:"models/modelMain.php",
                        data: dataDigest,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        datatype: 'HTML',

                        success:function(data)
                        {   
                            if(data==1){

                                alert("Message sent successfully.");
                                location.reload();
                            }
                            else{
                                alert("Something went wrong. Try again later");
                                location.reload();
                            }

                        }

                    });
                }
                


        }
        else
        {
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

//======================================================================================================================================

    $(document).on('click','#apply-now',function(e)
    {       
                                                                                                       //Apply now
       
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
            

            
            if (confirm("Submit Application?")){
            var dataDigest = new FormData();
            
            dataDigest.append('additional-doc',$('#additional-doc').prop("files")[0]);
            dataDigest.append('action','apply-now');
            
            dataDigest.append('person-name',$('#person-name').val().trim());
            dataDigest.append('person-email',$('#person-email').val().trim());
            dataDigest.append('person-number',$('#person-number').val().trim());
            dataDigest.append('person-ssc',$('#person-ssc').val().trim());
            
            dataDigest.append('person-hsc',$('#person-hsc').val().trim());
            
            dataDigest.append('person-diploma',$('#person-diploma').val().trim());
            
            dataDigest.append('person-qualification',$('#person-qualification').val().trim());
            dataDigest.append('person-specialization',$('#person-specialization').val().trim());
            dataDigest.append('person-experience',$('#person-experience').val().trim());
            dataDigest.append('person-addDoc',$('#additional-doc').val().replace("C:\\fakepath\\",""));
            dataDigest.append('person-interest',$('#person-interest').val().trim());

        
            $.ajax({
            
                url:"models/modelMain.php",
                data: dataDigest,
                processData: false,
                contentType: false,
                type: 'POST',
                datatype: 'HTML',
            
                success: function(data)
                {
                    if(data == 1){
                        alert("Applicant added successfully.");
                        location.reload();
                    }
                    else{
                        alert("Something went wrong. Try again later.");
                        location.reload();
                    }
                
                }
            
            });
            
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
    
    $(".productinfo").click(function(e){
        
        $proId = $(this).parent().find('input').val();
        
        
        $.ajax({
                url:"models/modelMain.php",
            
            
            
                data:
                    {
                        proId: $proId,
                        action:'product-info'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    window.location='productInfo.php';
                }
         
            });
            e.preventDefault();
        });

//=================================================================================================================
    $(".product-documentation").click(function(){                               
        
                                                                             //Show Product Documentation
        $proId = $(this).parent().find("input").val();
        //alert($proId);
        $.ajax({
                url:"models/modelMain.php",
            
            
            
                data:
                    {
                        productId: $proId,
                        action:'show-product-documentation'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    window.open(data, '_new');
                    //alert(data);
                }
         
        });
        
    });

//====================================================================================================================== 
   $(document).on('click','#web-inquiry',function(e){

            
            $flag = false;
            if(validate("#inqperson-name")
                && validate("#inqperson-email")
                && validate("#inqperson-number"))
            {
                $flag = true;
            }

            if($flag){
                
                if(confirm("Send Inquiry?")){
                    
                    
                    var dataDigest = new FormData();
                    dataDigest.append('action','online-inquiry');
                    dataDigest.append('person-name',$('#inqperson-name').val().trim());
                    dataDigest.append('person-email',$('#inqperson-email').val().trim());
                    dataDigest.append('person-number',$('#inqperson-number').val().trim());
                    dataDigest.append('inquiry-reg-num',$('#winq-reg-num').val().trim());

                    //dataDigest.append('person-city',$('#inqperson-city').val().trim());
                    //dataDigest.append('person-query',$('#inqperson-query').val().trim());
                    //dataDigest.append('inquirydate',$('#inqpersondate').val().trim());
                    dataDigest.append('inquiry-product-id',$('#inqproduct-id').val().trim());

                    $.ajax({

                    url:"models/modelMain.php",
                    data: dataDigest,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    datatype: 'HTML',

                    success:function(data)
                    {   
                            if(data==1){
                               alert("Inquiry sent successfully.");
                               location.reload(); 
                            }
                            else{
                                alert("Something went wrong. Try again later.");
                                location.reload();
                            }


                    }

                });
                    
                }
                
                
            }

            else
            {
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
//=======================================================================================================================

    $(".categoryinfo").click(function(){

        

        $catId = $(this).parent().find('input').val();
        //alert($catId);
        

        $.ajax({
                url:"models/modelMain.php",
            
            
            
                data:
                    {
                        catId: $catId,
                        action:'category-info'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    window.location='productCategory.php';
                }
         
            });

    
        });
//=======================================================================================================================

    $(".link-to-product-category").click(function(e){
        
        
        $.ajax({
                url:"models/modelMain.php",
            
            
            
                data:
                    {
                        categoryId: $(this).parent().find('input').val(),
                        action:'link-to-product-category'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    window.location='productCategory.php';
                }
         
            });
        
        e.preventDefault();
    });

//=============================================================================================    
  
    $(".industryinfo").click(function(){

        

        $indId = $(this).parent().find('input').val();
        //alert($indId);
        

        $.ajax({
                url:"models/modelMain.php",
            
            
            
                data:
                    {
                        indId: $indId,
                        action:'industry-info'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    window.location='industryCategory.php';
                }
         
            });

    
        });
//=======================================================================================================================

    $(".link-to-industry-category").click(function(e){
        
        
        $.ajax({
                url:"models/modelMain.php",
            
            
            
                data:
                    {
                        categoryId: $(this).parent().find('input').val(),
                        action:'link-to-industry-category'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    window.location='industryCategory.php';
                }
         
            });
        
        e.preventDefault();
    });
    
//=============================================================================================    
    
});


//=============================================================================================
//=============================================================================================

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


