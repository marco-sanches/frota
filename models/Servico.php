<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servico_veiculos".
 *
 * @property integer $id_servico
 * @property string $nome_servico
 *
 * @property RequisicaoVeiculos[] $requisicaoVeiculos
 */
class Servico extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'servico_veiculos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_servico', 'nome_servico'], 'required'],
            [['id_servico'], 'integer'],
            [['nome_servico'], 'string', 'max' => 70],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_servico' => 'Id Servico',
            'nome_servico' => 'Nome Servico',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequisicaoVeiculos()
    {
        return $this->hasMany(RequisicaoVeiculos::className(), ['id_servico' => 'id_servico']);
    }
}
