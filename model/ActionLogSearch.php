<?php

namespace cakebake\actionlog\model;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use cakebake\actionlog\model\ActionLog;

/**
 * ActionLogSearch represents the model behind the search form about `cakebake\actionlog\model\ActionLog`.
 */
class ActionLogSearch extends ActionLog
{
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['user_remote', 'time', 'action', 'category', 'status', 'message'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = ActionLog::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['time' => SORT_DESC]],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'time', $this->time])
            ->andFilterWhere(['like', 'user_remote', $this->user_remote])
            ->andFilterWhere(['like', 'action', $this->action])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'message', $this->status])
            ->andFilterWhere(['like', 'message', $this->message]);

        return $dataProvider;
    }
}
