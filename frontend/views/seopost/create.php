<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SeoPost */

$this->title = Yii::t('app', 'Create Seo Post');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Seo Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seo-post-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
