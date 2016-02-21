<?php echo Form::open(array('action' => 'auth/register/'.$user['uuid'], 'method' => 'post')); ?>
<?php echo Form::csrf(); ?>

<?php echo Form::label('username : ', 'username'); ?>
<?php echo Form::input('username', '', array('placeholder' => 'username')); ?> <br />

<?php echo Form::label('password : ', 'password'); ?>
<?php echo Form::password('password', '', array('placeholder' => 'password')); ?> <br />

<?php echo Form::hidden('email', $user['email']); ?>

<?php echo Form::submit('submit', 'register'); ?>

<?php echo Form::close(); ?>
