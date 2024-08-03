<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "catalog".
 *
 * @property int $id
 * @property string $name
 *
 * @property Manufactures[] $manufactures
 */
class Catalog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catalog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[ManufactureCatalogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManufactures()
    {
        return $this->hasMany(Manufactures::class, ['id' => 'manufacture_id'])
            ->viaTable('manufacture_catalog', ['catalog_id' => 'id']);
    }
}
