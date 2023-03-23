<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PostTindakan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tindakan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_tindakan') ?>

    <?= $form->field($model, 'id_pasien') ?>

    <?= $form->field($model, 'nama_tindakan') ?>

    <?= $form->field($model, 'kategori_tindakan') ?>

    <?= $form->field($model, 'id_obat') ?>

    <?php // echo $form->field($model, 'id_dokter') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
