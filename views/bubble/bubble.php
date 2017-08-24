<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bubble */
/* @var $form ActiveForm */
?>
<div class="bubble-bubble">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'input') ?>
        <?= $form->field($model, 'uoput') ?>
        <?= $form->field($model, 'output') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- bubble-bubble -->
