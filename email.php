<?php include 'database.php'; ?>

<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

$result = mysqli_query($conn, "SELECT * FROM appointments ORDER BY id DESC LIMIT 1");
while($row = mysqli_fetch_array($result)) {
    $fname = $row['firstName'];
    $lname = $row['lastName'];
    $email = $row['email'];
    $date = $row['date'];
    $time = $row['time'];

    echo $email . "<br>";
    echo $fname . "<br>";
    echo $lname . "<br>";

    //Create a new PHPMailer instance
    $mail = new PHPMailer();

    //Tell PHPMailer to use SMTP
    $mail->isSMTP();

    //Enable SMTP debugging
    // SMTP::DEBUG_OFF = off (for production use)
    // SMTP::DEBUG_CLIENT = client messages
    // SMTP::DEBUG_SERVER = client and server messages
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';
    // use
    // $mail->Host = gethostbyname('smtp.gmail.com');
    // if your network does not support SMTP over IPv6

    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 587;

    //Set the encryption mechanism to use - STARTTLS or SMTPS
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;

    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = 'kimtran9250@gmail.com';

    //Password to use for SMTP authentication
    $mail->Password = 'pleasework';

    //Set who the message is to be sent from
    $mail->setFrom('kimtran9250@gmail.com', 'Kim Tran');

    //Set an alternative reply-to address
    $mail->addReplyTo('kimtran9250@gmail.com', 'Kim Tran');

    //Set who the message is to be sent to
    $mail->addAddress($email, $fname . " " . $lname);

    //Set the subject line
    $mail->Subject = 'Thank you for making an appointment with Kim\'s Hair Fashion Salon.';

    $mail->Body = "<p>Hi $fname,<br><br>" . "We look forward to seeing you on <b>$date</b> at <b>$time</b>. We want to share with you that all our salons have reopened. 
    Your health and safety is our top priority.<br><br> We take pride in our clean and well-run salon, and we know this is more important than ever amid concerns around Coronavirus (COVID-19).
    <br><br> If you have any questions or concerns, please call or email us at (336)-825-4098 or kimtran9250@gmail.com</p>";

    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    //$mail->msgHTML(file_get_contents('contents.php'), __DIR__);

    //Replace the plain text body with one created manually
    $mail->AltBody = 'This is a plain-text message body';

    

    //Attach an image file
    //$mail->addAttachment('images/phpmailer_mini.png');

    //send the message, check for errors
    if (!$mail->send()) {
        echo 'Mailer Error: '. $mail->ErrorInfo;
    } else {
        echo 'Message sent! <br>';
        //Section 2: IMAP
        //Uncomment these to save your message in the 'Sent Mail' folder.
        if (save_mail($mail)) {
            echo "Message saved!";
        }
    }
}

// $email = $row["email"];
// echo $email;

    


//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl', '*' ) to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
function save_mail($mail)
{
    //You can change 'Sent Mail' to any other folder or tag
    $path = '{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail';

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}

?>