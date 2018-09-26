<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Requisicao;

/**
 * RequisicaoSearch represents the model behind the search form about `app\models\Requisicao`.
 */
class RequisicaoSearch extends Requisicao
{
	public $veiculo;	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_req', 'id_secao', 'id_servico', 'id_veic', 'km_saida', 'km_chegada', 'pernoite', 'executada', 'cancelada'], 'integer'],
            [['id_sipac', 'hora_saida', 'hora_chegada', 'extra', 'anota', 'data_hora_req', 'data_util', 'hora_ini', 'hora_fim', 'veiculo'], 'safe'],
            [['pedagio'], 'number'],
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
        $query = Requisicao::find();
	
	$query->joinWith(['veiculo']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_req' => $this->id_req,
	//	'id_sipac' => $this->id_sipac,
            'id_secao' => $this->id_secao,
            'id_servico' => $this->id_servico,
            'id_veic' => $this->id_veic,
	    'hora_saida' => $this->hora_saida,
            'hora_chegada' => $this->hora_chegada,
            'km_saida' => $this->km_saida,
            'km_chegada' => $this->km_chegada,
            'pedagio' => $this->pedagio,
            'pernoite' => $this->pernoite,
            'extra' => $this->extra,
            'executada' => $this->executada,
            'data_hora_req' => $this->data_hora_req,
            'data_util' => $this->data_util,
            'hora_ini' => $this->hora_ini,
            'hora_fim' => $this->hora_fim,
	    'cancelada' => $this->cancelada,	    		
        ]);

        $query->andFilterWhere(['like', 'id_sipac', $this->id_sipac]);
	

        return $dataProvider;
    }
}
