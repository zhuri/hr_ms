<?php

namespace App\Http\Service;

use PHPMailer\PHPMailer\PHPMailer;

class MailService
{
    const BLLA = 1;
    public function send($emailTo)
    {
        // dd($from, $to);
        //to be written here

        $mail = new PHPMailer(TRUE);
        try {
            $mail->setFrom('jehonaakonushefci@gmail.com', 'Human Resource Management System');
            $mail->addAddress('rita.selimi@gmail.com', 'Applicant');
            $mail->Subject = 'Offert letter';
            $mail->Body = 'Dear Rita,

            First of all, thank you for coming in for the interview, it was a pleasure meeting you.
            We are pleased to inform you that we have decided to offer you the position of Intern with Software Developers Team at UCX Kosovo.
            
            Attached you can find your internship offer.
            Please feel free to contact me if you need any further information.
            
            Looking forward to hearing from you.
            
            Best regards,
            Office Manager ';

            /* SMTP parameters. */

            /* Tells PHPMailer to use SMTP. */
            $mail->isSMTP();

            /* SMTP server address. */
            $mail->Host = 'smtp.gmail.com';

            /* Use SMTP authentication. */
            $mail->SMTPAuth = TRUE;

            /* Set the encryption system. */
            $mail->SMTPSecure = 'tls';

            /* SMTP authentication username. */
            $mail->Username = 'jehonaakonushefci@gmail.com';

            /* SMTP authentication password. */
            $mail->Password = 'rgffnrxsryheafyc';

            /* Set the SMTP port. */
            $mail->Port = 587;

            /* Finally send the mail. */
            $mail->send();
        } catch (Exception $e) {
            /* PHPMailer exception. */
            echo $e->errorMessage();
        } catch (\Exception $e) {
            /* PHP exception (note the backslash to select the global namespace Exception class). */
            echo $e->getMessage();
        }
    }
}
