# Corporate Plus - Administering Expertly
<h1>Steps for importing the project to your system</h1>

1. Install xampp (possibly latest version) to your windows/linux system.

2. Download this repository and put it in the htdocs folder of xampp.

3. Turn on Apache server and mysql through xampp dashboard and import the database(sql file) to phpMyAdmin panel.

Following the above steps will get the project into running state.

<b>Few more steps are to be followed to get the mail and file upload functionality running:</b>
1. Goto xampp/php/, open php.in file and make following changes:
   -> Search for the string 'sendmail_path' and by removing the semicolon(;) uncomment that line. This line should be in this format :  
      sendmail_path = "\"E:Programs\xampp\sendmail\sendmail.exe" -t". Also comment the other line below it with name sendmail_path, if not
      commented by default.
   -> Search for string "upload_max_filesize", which would be initially set to 2MB. Set to 10MB for uploading larger files(.pdf) to the
      system. 
      
2. Goto xampp/sendmail/, open sendmail.ini file and make following changes:
    -> Set smtp_server= smtp.gmail.com.
    -> Set smtp_port= 587.
    -> Set your email id and password through which you want to send mails into auth_username and auth_password fields.
    
3. Finally you need to make a minor change to your google account to allow php to send mails from your gmail account. Goto Google     
   Account>Security>Less secure app access, and turn it on.
