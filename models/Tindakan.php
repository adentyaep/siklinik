<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tindakan".
 *
 * @property int $id_tindakan
 * @property int $id_pasien
 * @property string $nama_tindakan
 * @property string $kategori_tindakan
 * @property int $id_obat
 * @property int $id_dokter
 *
 * @property Dokter $dokter
 * @property Obat $obat
 * @property Pasien $pasien
 */
class Tindakan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tindakan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pasien', 'nama_tindakan', 'kategori_tindakan', 'id_obat', 'id_dokter'], 'required'],
            [['id_pasien', 'id_obat', 'id_dokter'], 'integer'],
            [['nama_tindakan', 'kategori_tindakan'], 'string', 'max' => 100],
            [['id_obat'], 'unique'],
            [['id_dokter'], 'unique'],
            [['id_pasien'], 'unique'],
            [['id_dokter'], 'exist', 'skipOnError' => true, 'targetClass' => Dokter::class, 'targetAttribute' => ['id_dokter' => 'id_dokter']],
            [['id_obat'], 'exist', 'skipOnError' => true, 'targetClass' => Obat::class, 'targetAttribute' => ['id_obat' => 'id_obat']],
            [['id_pasien'], 'exist', 'skipOnError' => true, 'targetClass' => Pasien::class, 'targetAttribute' => ['id_pasien' => 'id_pasien']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tindakan' => 'Id Tindakan',
            'id_pasien' => 'Id Pasien',
            'nama_tindakan' => 'Nama Tindakan',
            'kategori_tindakan' => 'Kategori Tindakan',
            'id_obat' => 'Id Obat',
            'id_dokter' => 'Id Dokter',
        ];
    }

    /**
     * Gets query for [[Dokter]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDokter()
    {
        return $this->hasOne(Dokter::class, ['id_dokter' => 'id_dokter']);
    }

    /**
     * Gets query for [[Obat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getObat()
    {
        return $this->hasOne(Obat::class, ['id_obat' => 'id_obat']);
    }

    /**
     * Gets query for [[Pasien]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPasien()
    {
        return $this->hasOne(Pasien::class, ['id_pasien' => 'id_pasien']);
    }
}
