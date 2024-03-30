<?php
$to_email="chrispinamary@gmail.com";
$subject='LINK TO ACCESS EXAMNINATION';
$body="
Dear [Recipient],
I hope this message finds you well. As requested, please find the link to your exam below:

http://localhost/EMS/exam_schedule1.php

Wishing you the best of luck! You've put in the hard work, and I have every confidence that you'll excel in your exam. 
Remember to stay calm, focused, and believe in yourself. 
If you have any questions or need assistance, feel free to reach out. You've got this!

Warm regards,

Exam Administrator
";
$headers= "chrispinamary@gmail.com";
if (mail($to_email,$subject,$body,$headers))
echo"Email sent";
else
{
    echo"failed";
}

?>