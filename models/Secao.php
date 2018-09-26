<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "secao_veiculos".
 *
 * @property integer $id_secao
 * @property string $nome_secao
 *
 * @property RequisicaoVeiculos[] $requisicaoVeiculos
 */
class Secao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'secao_veiculos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_secao', 'nome_secao'], 'required'],
            [['id_secao'], 'integer'],
            [['nome_secao'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_secao' => 'Id Secao',
            'nome_secao' => 'Nome Secao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequisicaoVeiculos()
    {
        return $this->hasMany(RequisicaoVeiculos::className(), ['id_secao' => 'id_secao']);
    }
}
