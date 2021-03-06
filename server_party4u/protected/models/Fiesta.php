<?php

/**
 * This is the model class for table "fiesta".
 *
 * The followings are the available columns in table 'fiesta':
 * @property integer $id
 * @property integer $id_ubicacion
 * @property integer $id_user
 * @property string $nombre_fiesta
 * @property string $max_participantes
 * @property string $min_cuota
 * @property string $fecha_ini
 * @property string $fecha_fin
 * @property integer $status
 * @property integer $rate
 *
 * The followings are the available model relations:
 * @property Users $idUser
 * @property FiestaComentario[] $fiestaComentarios
 * @property FiestaFondeador[] $fiestaFondeadors
 */
class Fiesta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Fiesta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'fiesta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_fiesta, max_participantes, min_cuota, fecha_ini, fecha_fin, status, rate', 'required'),
			array('id_ubicacion, id_user, status, rate', 'numerical', 'integerOnly'=>true),
			array('nombre_fiesta', 'length', 'max'=>255),
			array('max_participantes', 'length', 'max'=>7),
			array('min_cuota', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_ubicacion, id_user, nombre_fiesta, max_participantes, min_cuota, fecha_ini, fecha_fin, status, rate', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idUser' => array(self::BELONGS_TO, 'Users', 'id_user'),
			'fiestaComentarios' => array(self::HAS_MANY, 'FiestaComentario', 'id_fiesta'),
			'fiestaFondeadors' => array(self::HAS_MANY, 'FiestaFondeador', 'id_fiesta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_ubicacion' => 'Id Ubicacion',
			'id_user' => 'Id User',
			'nombre_fiesta' => 'Nombre Fiesta',
			'max_participantes' => 'Max Participantes',
			'min_cuota' => 'Min Cuota',
			'fecha_ini' => 'Fecha Ini',
			'fecha_fin' => 'Fecha Fin',
			'status' => 'Status',
			'rate' => 'Rate',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_ubicacion',$this->id_ubicacion);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('nombre_fiesta',$this->nombre_fiesta,true);
		$criteria->compare('max_participantes',$this->max_participantes,true);
		$criteria->compare('min_cuota',$this->min_cuota,true);
		$criteria->compare('fecha_ini',$this->fecha_ini,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('rate',$this->rate);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}