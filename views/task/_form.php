<?php
use app\models\entities\Status;
use app\models\entities\Type;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin([
    'id' => 'create-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>

<?= $form->field($model, 'type_id')->dropDownList(Type::getTypes()); ?>
<?= $form->field($model, 'status_id')->dropDownList(Status::getStatuses()) ?>
<?= $form->field($model, 'description')->textarea() ?>
<?= $form->field($model, 'date_start')->widget(DatePicker::class, [
    'model' => $model,
    'attribute' => 'date_start',
    'value' => date('d/m/Y', $model->date_start),
    'pluginOptions' => [
        'format' => 'dd/mm/yyyy',
    ]
]) ?>
<?= $form->field($model, 'date_end')->widget(DatePicker::class, [
    'model' => $model,
    'attribute' => 'date_end',
    'pluginOptions' => [
        'format' => 'dd/mm/yyyy'
    ]
]) ?>

<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end() ?>
