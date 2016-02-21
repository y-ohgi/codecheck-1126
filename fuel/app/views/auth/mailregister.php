<?php echo Form::open(array('action'=>'auth/confirm', 'method'=>'post')); ?>

<?php echo Form::label('email : ', 'email'); ?>
<?php echo Form::input('email', '', array('placeholder' => 'email')); ?>  <br />

<?php echo Form::submit('submit', '登録'); ?>

<?php echo Form::close(); ?>
