<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\V_listadoproductos;

/**
 * V_listadoproductosSearch represents the model behind the search form about `app\models\V_listadoproductos`.
 */
class V_listadoproductosSearch extends V_listadoproductos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'precio'], 'integer'],
            [['nombre', 'categoria', 'marca', 'modelo', 'notas'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = V_listadoproductos::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'precio' => $this->precio,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'categoria', $this->categoria])
            ->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'modelo', $this->modelo])
            ->andFilterWhere(['like', 'notas', $this->notas]);

        return $dataProvider;
    }
}
