<?php

/**
 * This is the model class for table "anfitrion_comentario".
 *
 * The followings are the available columns in table 'anfitrion_comentario':
 * @property integer $id
 * @property integer $id_user
 * @property string $fecha_creacion
 * @property string $fecha_actualizacion
 * @property integer $rate
 * @property string $comentario
 * @property integer $id_anfintrion
 *
 * The followings are the available model relations:
 * @property Users $idAnfintrion
 * @property Users $idUser
 */
class AnfitrionComentario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AnfitrionComentario the static model class
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
		return 'anfitrion_comentario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_creacion, fecha_actualizacion, rate, comentario, id_anfintrion', 'required'),
			array('id_user, rate, id_anfintrion', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_user, fecha_creacion, fecha_actualizacion, rate, comentario, id_anfintrion', 'safe', 'on'=>'search'),
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
			'idAnfintrion' => array(self::BELONGS_TO, 'Users', 'id_anfintrion'),
			'idUser' => array(self::BELONGS_TO, 'Users', 'id_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_user' => 'Id User',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_actualizacion' => 'Fecha Actualizacion',
			'rate' => 'Rate',
			'comentario' => 'Comentario',
			'id_anfintrion' => 'Id Anfintrion',
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
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_actualizacion',$this->fecha_actualizacion,true);
		$criteria->compare('rate',$this->rate);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('id_anfintrion',$this->id_anfintrion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}