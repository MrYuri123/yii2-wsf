<?php

namespace app\models;

/**
 * Class SearchForm
 *
 * @property string $searchField
 */
class SearchForm extends \yii\base\Model
{
    /**
     * @var string
     */
    public $searchField;

    public function rules()
    {
        return [
            ['searchField', 'string']
        ];
    }
}
