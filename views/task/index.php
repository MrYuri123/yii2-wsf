<?php

use app\models\SearchForm;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;
?>

<a style="margin-bottom:20px" href="task/create" class="btn btn-primary">Create task</a>
<hr>

<?php $form = ActiveForm::begin([
    'id' => 'search-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>

<?= /** @var SearchForm $searchForm */
$form->field($searchForm, 'searchField')->textInput()->label('Search by description'); ?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end() ?>

<?= /** @var ActiveDataProvider $dataProvider */
ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_task',
]); ?>