<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use app\models\Comissao;
use app\models\Usuario;

/**
 * ComissaoSearch represents the model behind the search form about `app\models\Comissao`.
 */
class ComissaoSearch extends Comissao
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['idProfessor'], 'safe'],
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
        $query = Comissao::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

		//$this->load($params);
		$dataProvider = $this->loadWithFilters($params, $dataProvider); // From SaveGridFiltersBehavior

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith(['usuario']);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            //'idProfessor' => $this->idProfessor,
        ]);

        $query->andFilterWhere(['like', 'usuario.name', $this->idProfessor]);

        return $dataProvider;
    }
}
