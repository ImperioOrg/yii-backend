<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "manufacture_contacts".
 *
 * @property int $id
 * @property int $id_manufacture
 * @property string $telephone
 * @property string $name_personal
 * @property string|null $note
 *
 * @property Manufactures $manufacture
 */
class ManufactureContact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manufacture_contacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_manufacture', 'telephone', 'name_personal'], 'required'],
            [['id_manufacture'], 'integer'],
            [['note'], 'string'],
            [['telephone', 'name_personal'], 'string', 'max' => 255],
            [['id_manufacture'], 'exist', 'skipOnError' => true, 'targetClass' => Manufactures::class, 'targetAttribute' => ['id_manufacture' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_manufacture' => 'Id Manufactures',
            'telephone' => 'Telephone',
            'name_personal' => 'Name Personal',
            'note' => 'Note',
        ];
    }

    /**
     * Gets query for [[Manufactures]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManufacture()
    {
        return $this->hasOne(Manufactures::class, ['id' => 'id_manufacture']);
    }
}
