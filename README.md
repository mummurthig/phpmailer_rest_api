# phpmailer_rest_api
### install phpmailer
```php
Install phpmailer
```
### add this file
```php
require 'phpmailer/PHPMailerAutoload.php'; 
```
### declare variable 
```php
$to_id   = $_POST['toid'];                                // To Email
$subject = $_POST['subject'];                             // Subject
$message = $_POST['message'];                             // Message
```
### Call the method
```php
$mail = new PHPMailer;
```
### SMTP 
```php
$mail->Host       = 'smtp.gmail.com';
$mail->Port       = 587;
$mail->SMTPAuth   = true;
$mail->SMTPSecure = 'tls';
```
### Set Email address 
```php
$mail->Username = 'youremail@gmail.com';                  // Enter your email here 
$mail->Password = 'password';                             // Enter your password 
    
$mail->setFrom('youremail@gmail.com', 'Name');            // Eamil and Name
$mail->addAddress($to_id);                                // Add a recipient
$mail->addReplyTo('youremail@gmail.com');
```
### Download Postman Tool for rest api testing
```php
https://www.postman.com/downloads/
```
### Postman Tool Settings
```json
key : Content-Type
Value : application/json
```
### Json inputs
```json
{
	"toid": "example@gmail.com",
	"subject" : "your subject",
	"message" : " your message"
}
```

## Output
![Captures](https://user-images.githubusercontent.com/60460387/90245943-39b37180-de51-11ea-9c9e-7baac5b2212c.JPG)

### Success 200 OK
```json
{
    "status": 1,
    "message": "Email sent Success!"
}
```
![Capturexx](https://user-images.githubusercontent.com/60460387/90246864-17225800-de53-11ea-9777-36fafab6f644.JPG)

### Error 500 Internal Server Error
```json
{
    "status": 0,
    "message": "Message Could Not be sent!"
}
```
