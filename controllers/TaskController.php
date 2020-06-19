<?php

namespace app\controllers;

use app\models\forms\TaskForm;
use app\models\SearchForm;
use DateTime;
use Yii;
use yii\web\Controller;
use app\models\entities\Task;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;

/**
 * Class TaskController
 */
class TaskController extends Controller
{
    public $layout = 'main';

    /**
     * @return string
     */
    public function actionIndex()
    {
        $searchForm = new SearchForm();

        if (
            Yii::$app->request->post() &&
            $searchForm->load(Yii::$app->request->post()) &&
            $searchForm->validate() &&
            !empty($searchForm->searchField)
        ) {
            $dataProvider = new ActiveDataProvider([
                'query' => Task::find()->where(['like', 'description', $searchForm->searchField]),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);
        } else {
            $dataProvider = new ActiveDataProvider([
                'query' => Task::find(),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);
        }

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchForm' => $searchForm
        ]);
    }

    /**
     * @return string
     */
    public function actionCreate()
    {
        //Тут можно добавить проверку, имеет ли право текущий юзер вносить изменения, но этого нет в тз, поэтому пропускаю
        $model = new Task();

        if ($model->load(Yii::$app->request->post())) {

            if ($this->saveForm($model, Yii::$app->request->post('Task'))) {
                $this->redirect(Url::toRoute(['task/index']));
            }
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

    /**
     * @param int $id
     *
     * @return string
     */
    public function actionEdit(int $id)
    {
        //Тут можно добавить проверку, имеет ли право текущий юзер вносить изменения, но этого нет в тз, поэтому пропускаю
        $model = Task::findOne($id);

        $model->date_start = date('d/m/Y', $model->date_start);
        $model->date_end = date('d/m/Y', $model->date_end);

        if (Yii::$app->request->post()) {
            if ($this->saveForm($model, Yii::$app->request->post('Task'))) {
                $this->redirect(Url::toRoute(['task/index', 'hasSuccess' => true]));
            }
        }

        return $this->render('edit', [
            'model' => $model
        ]);
    }

    /**
     * @param int $id
     *
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete(int $id)
    {
        //Тут можно добавить проверку, имеет ли право текущий юзер вносить изменения, но этого нет в тз, поэтому пропускаю
        $model = Task::findOne($id);

        if ($model->delete()) {
            $this->redirect(Url::toRoute(['task/index']));
        }
    }

    /**
     * @param $model
     * @param $data
     *
     * @return bool
     */
    private function saveForm($model, $data)
    {
        $start_time = DateTime::createFromFormat("d/n/Y", $data['date_start']);
        $timestamp_start = $start_time->getTimestamp();

        $end_time = DateTime::createFromFormat("d/n/Y", $data['date_end']);
        $timestamp_end = $end_time->getTimestamp();

        $model->type_id = (int)$data['type_id'];
        $model->status_id = (int)$data['status_id'];
        $model->description = (string)$data['description'];
        $model->date_start = (int)$timestamp_start;
        $model->date_end = (int)$timestamp_end;
        $model->created_at = time();

        if ($model->validate()) {
            return $model->save();
        }

        return false;
    }
}
