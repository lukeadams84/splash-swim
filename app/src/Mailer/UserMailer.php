<?php

namespace App\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{
    public function welcome($user)
    {

      $userDataArr = array(
          'userName' => $user->firstname,
          'userEmail' => $user->email
      );

        $this
            ->to($user->email)
            ->subject(sprintf('Welcome %s', $user->firstname))
            ->emailFormat('html')
            ->template('welcome', 'welcome')
            ->viewVars($userDataArr);
    }

    public function resetPassword($user)
    {
        $this
            ->to($user->email)
            ->subject('Reset password')
            ->set(['token' => $user->token]);
    }

    public function booking($data)
    {
      $userDataArr = [
          'user' => $data['user'],
          'student' => $data['student'],
          'course' => $data['course'],
          'paymenttype' => $data['paymenttype'],
          'price' => $data['price']
      ];

      $this
          ->to($data['email'])
          ->subject(sprintf('Thanks for your class booking for %s', $data['student']))
          ->emailFormat('html')
          ->template('booking', 'booking')
          ->viewVars($userDataArr);
    }


}

?>
