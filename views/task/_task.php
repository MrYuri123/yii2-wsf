<?php

use app\models\entities\Status;
use app\models\entities\Type;
use yii\helpers\Html;
?>

<div class="task-wrapper">
    <div><b>Description:</b> <?= Html::encode($model->description) ?></div>
    <div><b>Type:</b> <?= Html::encode(Type::getType($model->type_id)) ?></div>
    <div><b>Status:</b> <?= Html::encode(Status::getStatus($model->status_id)) ?></div>
    <div><b>Date start:</b> <?= date('d.m.Y', $model->date_start) ?></div>
    <div><b>Date end:</b> <?= date('d.m.Y', $model->date_end) ?></div>
    <div><b>Created date:</b> <?= date('d.m.Y H:i', $model->created_at) ?></div>

    <a class="btn btn-primary" href="task/edit?id=<?= $model->id ?>">Edit</a>
    <a class="delete-btn btn btn-danger" href="task/delete?id=<?= $model->id ?>">Delete</a>
</div>
<hr>