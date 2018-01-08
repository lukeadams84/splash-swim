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


}

?>
