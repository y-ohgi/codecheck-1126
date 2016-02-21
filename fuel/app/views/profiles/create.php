
<?php
if (Session::get_flash('error')){
    echo Session::get_flash('error');
}
?>


<?php echo Form::open(array('action' => 'profiles/create', 'method' => 'post', 'enctype' => 'multipart/form-data')); ?>
<?php echo Form::csrf(); ?>

<?php echo Form::label('title : ', 'title'); ?>
<?php echo Form::input('title', '', array('placeholder' => 'タイトル')); ?> <br />

<?php echo Form::label('url : ', 'url'); ?>
<?php echo Form::input('url', '', array('placeholder' => 'url')); ?> <br />

<?php echo Form::label('description : ', 'description'); ?>
<?php echo Form::textarea('description', '', array('placeholder' => '説明')); ?> <br />

<?php echo Form::file('image'); ?> <br />

<?php echo Form::submit('submit', 'ポートフォリオ登録'); ?>

<?php echo Form::close(); ?>
