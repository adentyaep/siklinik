<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pasien".
 *
 * @property int $id_pasien
 * @property string $nama_pasien
 * @property string $no_ktp
 * @property string $no_bpjs
 * @property string $keluhan
 *
 * @property Tindakan $tindakan
 */
class Pasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_pasien', 'no_ktp', 'no_bpjs', 'keluhan'], 'required'],
            [['nama_pasien', 'keluhan'], 'string', 'max' => 100],
            [['no_ktp'], 'string', 'max' => 16],
            [['no_bpjs'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pasien' => 'Id Pasien',
            'nama_pasien' => 'Nama Pasien',
            'no_ktp' => 'No Ktp',
            'no_bpjs' => 'No Bpjs',
            'keluhan' => 'Keluhan',
        ];
    }

    /**
     * Gets query for [[Tindakan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTindakan()
    {
        return $this->hasOne(Tindakan::class, ['id_pasien' => 'id_pasien']);
    }
}
