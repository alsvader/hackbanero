<?php

/**
 * This is the model class for table "fiesta_comentario".
 *
 * The followings are the available columns in table 'fiesta_comentario':
 * @property integer $id
 * @property integer $id_fiesta
 * @property integer $id_user
 * @property string $fecha_creacion
 * @property string $fecha_actualizacion
 * @property string $comentario
 * @property integer $rate
 *
 * The followings are the available model relations:
 * @property Users $idUser
 * @property Fiesta $idFiesta
 */
class FiestaComentario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FiestaComentario the static model class
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
		return 'fiesta_comentario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_creacion, fecha_actualizacion, comentario, rate', 'required'),
			array('id_fiesta, id_user, rate', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_fiesta, id_user, fecha_creacion, fecha_actualizacion, comentario, rate', 'safe', 'on'=>'search'),
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
			'idFiesta' => array(self::BELONGS_TO, 'Fiesta', 'id_fiesta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_fiesta' => 'Id Fiesta',
			'id_user' => 'Id User',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_actualizacion' => 'Fecha Actualizacion',
			'comentario' => 'Comentario',
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
		$criteria->compare('id_fiesta',$this->id_fiesta);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_actualizacion',$this->fecha_actualizacion,true);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('rate',$this->rate);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}