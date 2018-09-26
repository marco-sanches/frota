<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "veiculo_veiculos".
 *
 * @property integer $id_veiculo
 * @property integer $ativo
 * @property string $marca
 * @property string $modelo
 * @property string $ano
 * @property string $placa
 * @property integer $id_mot
 * @property integer $terc
 *
 * @property RequisicaoVeiculos[] $requisicaoVeiculos
 * @property MotoristaVeiculos $idMot
 */
class Veiculo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'veiculo_veiculos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_veiculo', 'marca', 'modelo', 'ano', 'placa', 'id_mot', 'terc'], 'required'],
            [['id_veiculo', 'ativo', 'id_mot', 'terc'], 'integer'],
            [['ano'], 'safe'],
            [['marca', 'modelo'], 'string', 'max' => 100],
            [['placa'], 'string', 'max' => 10],
            [['id_mot'], 'exist', 'skipOnError' => true, 'targetClass' => MotoristaVeiculos::className(), 'targetAttribute' => ['id_mot' => 'id_mot']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_veiculo' => 'Id Veiculo',
            'ativo' => 'Ativo',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'ano' => 'Ano',
            'placa' => 'Placa',
            'id_mot' => 'Id Mot',
            'terc' => 'Terc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequisicaoVeiculos()
    {
        return $this->hasMany(RequisicaoVeiculos::className(), ['id_veic' => 'id_veiculo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMot()
    {
        return $this->hasOne(MotoristaVeiculos::className(), ['id_mot' => 'id_mot']);
    }
}
