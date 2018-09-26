<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "motorista_veiculos".
 *
 * @property integer $id_mot
 * @property string $nome_mot
 * @property string $interv
 * @property string $cnh
 * @property string $fone
 *
 * @property VeiculoVeiculos[] $veiculoVeiculos
 */
class Motorista extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'motorista_veiculos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_mot', 'nome_mot', 'cnh', 'fone'], 'required'],
            [['id_mot'], 'integer'],
            [['nome_mot', 'cnh'], 'string', 'max' => 100],
            [['interv'], 'string', 'max' => 50],
            [['fone'], 'string', 'max' => 12],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_mot' => 'Id Mot',
            'nome_mot' => 'Nome Mot',
            'interv' => 'Interv',
            'cnh' => 'Cnh',
            'fone' => 'Fone',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVeiculoVeiculos()
    {
        return $this->hasMany(VeiculoVeiculos::className(), ['id_mot' => 'id_mot']);
    }
}
