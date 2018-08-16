<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SeoPost */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seo-post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'seoTitle')->textInput() ?>
    <?= $form->field($model, 'seoDescription')->textInput() ?>
    <?= $form->field($model, 'seoKeywords')->textInput() ?>
    <?= $form->field($model, 'seoViewport')->textInput() ?>
    <?= $form->field($model, 'seoCanonical')->textInput() ?>
    <?= $form->field($model, 'seoOg_title')->textInput() ?>
    <?= $form->field($model, 'seoOg_image')->textInput() ?>
    <?= $form->field($model, 'seoTwitter_site')->textInput() ?>
    <?= $form->field($model, 'seoTwitter_title')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
