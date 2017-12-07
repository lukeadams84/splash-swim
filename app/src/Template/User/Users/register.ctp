
<?php $this->layout = 'UserLTE.register'; ?>

<?php echo $this->Form->create($user, ['url' => ['prefix' => 'user', 'controller' => 'users', 'action' => 'register']]);

    echo $this->Form->input('email', array('class' => 'form-control', 'type' => 'text', 'required' => true ));
    echo $this->Form->input('firstname', array('class' => 'form-control', 'type' => 'text', 'required' => true ));
    echo $this->Form->input('lastname', array('class' => 'form-control', 'type' => 'text', 'required' => true ));
    echo $this->Form->input('password', array('class' => 'form-control', 'type' => 'password', 'required' => true ));
    echo $this->Form->input('password_confirm', array('class' => 'form-control', 'type' => 'password', 'required' => true ));
    echo $this->Form->hidden('role', array('class' => 'form-control', 'type' => 'text', 'value' => 'parent' ));?>

    <br>
    <br>

    <?php echo $this->Form->submit('Register', array('class' => 'btn btn-primary btn-block btn-flat')); ?>
    <br>
    <a href="/user/users/login" class="btn btn-primary btn-block btn-flat"><?php echo __('Already a member') ?></a>
