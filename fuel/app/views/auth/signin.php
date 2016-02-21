<?php echo Form::open(array('action' => 'auth/signin', 'method' => 'post')); ?>

<?php echo Form::label('username : ', 'username'); ?>
<?php echo Form::input('username', '', array('placeholder' => 'username')); ?> <br />

<?php echo Form::label('password : ', 'password'); ?>
<?php echo Form::password('password', '', array('placeholder' => 'password')); ?> <br />

<?php echo Form::submit('submit', 'signin'); ?>

<?php echo Form::close(); ?>
