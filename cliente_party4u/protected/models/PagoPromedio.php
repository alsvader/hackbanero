<?php

/**
 * This is the model class for table "pago_promedio".
 *
 * The followings are the available columns in table 'pago_promedio':
 * @property integer $id
 * @property string $monto
 * @property integer $efectuado
 * @property integer $id_cuenta
 *
 * The followings are the available model relations:
 * @property CuentasUsuario $idCuenta
 */
class PagoPromedio extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PagoPromedio the static model class
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
		return 'pago_promedio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('monto, efectuado, id_cuenta', 'required'),
			array('efectuado, id_cuenta', 'numerical', 'integerOnly'=>true),
			array('monto', 'length', 'max'=>9),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, monto, efectuado, id_cuenta', 'safe', 'on'=>'search'),
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
			'idCuenta' => array(self::BELONGS_TO, 'CuentasUsuario', 'id_cuenta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'monto' => 'Monto',
			'efectuado' => 'Efectuado',
			'id_cuenta' => 'Id Cuenta',
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
		$criteria->compare('monto',$this->monto,true);
		$criteria->compare('efectuado',$this->efectuado);
		$criteria->compare('id_cuenta',$this->id_cuenta);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}