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
            $mail->setFrom('rinorhajrizi1718@gmail.com', 'Rinor Hajrizi');
            $mail->addAddress($emailTo, 'Rinor Hajrizi');
            $mail->Subject = 'Endrit from PHP';
            $mail->Body = 'Hey I am sending this email from PHP.';

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
            $mail->Username = 'rinorhajrizi1718@gmail.com';

            /* SMTP authentication password. */
            $mail->Password = 'kselqupqcjstzqol';

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
