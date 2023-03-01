<?php
use morlowsk\corephp\form\Form;
use morlowsk\corephp\form\TextareaField;
/** @var $this \morlowsk\corephp\View */
/** @var $model \app\model\ContactForm */
$this->title = 'Contact';
?>

<h1>Contact us</h1>
<?php $form = Form::begin('', 'post')?>
<?php echo $form->field($model, 'subject') ?>
<?php echo $form->field($model, 'email') ?>
<?php echo new TextareaField($model, 'body') ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end(); ?>

