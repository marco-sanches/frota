<?php namespace app\models;
use Yii;

/**
 * This is the model class for table "requisicao_veiculos".
 *
 * @property string $id_req
 * @property integer $id_secao
 * @property integer $id_servico
 * @property integer $id_veic
 * @property string $hora_saida
 * @property string $hora_chegada
 * @property integer $km_saida
 * @property integer $km_chegada
 * @property string $pedagio
 * @property integer $pernoite
 * @property string $extra
 * @property integer $executada
 * @property string $anota
 * @property string $data_hora_req
 * @property string $data_util
 * @property string $hora_ini
 * @property string $hora_fim
 * @property string $id_sipac
 * @property string $id_mot
 *
 * @property SecaoVeiculos $idSecao
 * @property ServicoVeiculos $idServico
 * @property VeiculoVeiculos $idVeic
 * @property MotoristaVeiculos $idMot
 */
class Requisicao extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'requisicao_veiculos';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['id_secao', 'id_servico', 'id_veic', 'id_mot', 'data_util', 'hora_ini', 'hora_fim' ], 'required'],
			[['id_secao', 'id_servico', 'id_veic', 'id_mot', 'km_saida', 'km_chegada', 'pernoite', 'executada', 'cancelada'], 'integer'],
			[['hora_saida', 'hora_chegada', 'extra', 'data_hora_req', 'data_util', 'hora_ini', 'hora_fim'], 'safe'],
			[['pedagio'], 'number'],
			[['anota'], 'string', 'max' => 512],
			[['id_sipac'], 'string', 'max' => 10],
			[['id_secao'], 'exist', 'skipOnError' => true, 'targetClass' => Secao::className(), 'targetAttribute' => ['id_secao' => 'id_secao']],
			[['id_servico'], 'exist', 'skipOnError' => true, 'targetClass' => Servico::className(), 'targetAttribute' => ['id_servico' => 'id_servico']],
			[['id_veic'], 'exist', 'skipOnError' => true, 'targetClass' => Veiculo::className(), 'targetAttribute' => ['id_veic' => 'id_veiculo']],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [

			'id_sipac' => 'SIPAC',
			'id_req' => 'Requisição',
			'id_secao' => 'Seção requisitante',
			'id_servico' => 'Servico',
			'id_veic' => 'Veículo',
			'placa' => 'Placa',
			'id_mot' => 'Motorista',
			'hora_saida' => 'Hora da Saida',
			'hora_chegada' => 'Hora da Chegada',
			'km_saida' => 'Km Saida',
			'km_chegada' => 'Km Chegada',
			'pedagio' => 'Pedagio',
			'pernoite' => 'Pernoite',
			'extra' => 'Extra',
			'executada' => 'Executada',
			'anota' => 'Descrição da tarefa',
			'data_hora_req' => 'Data Hora Req',
			'data_util' => 'Data da utilização',
			'hora_ini' => 'Hora do início',
			'hora_fim' => 'Hora final',
			'cancelada' => 'Cancelada'
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getSecao()
	{
		return $this->hasOne(Secao::className(), ['id_secao' => 'id_secao']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getServico()
	{
		return $this->hasOne(Servico::className(), ['id_servico' => 'id_servico']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getVeiculo()
	{
		return $this->hasOne(Veiculo::className(), ['id_veiculo' => 'id_veic']);
	}
}
