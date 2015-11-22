<?php

/**
 * This is the model class for table "cuentas_usuario".
 *
 * The followings are the available columns in table 'cuentas_usuario':
 * @property integer $id
 * @property integer $id_pago_prom
 * @property integer $id_user
 * @property string $numero_cuenta
 * @property string $caducidad
 * @property string $codigo
 * @property string $saldo_favor
 * @property string $saldo_contra
 *
 * The followings are the available model relations:
 * @property Users $idUser
 * @property PagoPromedio[] $pagoPromedios
 */
class CuentasUsuario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CuentasUsuario the static model class
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
		return 'cuentas_usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('numero_cuenta, caducidad, codigo, saldo_favor, saldo_contra', 'required'),
			array('id_pago_prom, id_user', 'numerical', 'integerOnly'=>true),
			array('numero_cuenta', 'length', 'max'=>16),
			array('caducidad, codigo', 'length', 'max'=>4),
			array('saldo_favor, saldo_contra', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_pago_prom, id_user, numero_cuenta, caducidad, codigo, saldo_favor, saldo_contra', 'safe', 'on'=>'search'),
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
			'pagoPromedios' => array(self::HAS_MANY, 'PagoPromedio', 'id_cuenta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_pago_prom' => 'Id Pago Prom',
			'id_user' => 'Id User',
			'numero_cuenta' => 'Numero Cuenta',
			'caducidad' => 'Caducidad',
			'codigo' => 'Codigo',
			'saldo_favor' => 'Saldo Favor',
			'saldo_contra' => 'Saldo Contra',
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
		$criteria->compare('id_pago_prom',$this->id_pago_prom);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('numero_cuenta',$this->numero_cuenta,true);
		$criteria->compare('caducidad',$this->caducidad,true);
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('saldo_favor',$this->saldo_favor,true);
		$criteria->compare('saldo_contra',$this->saldo_contra,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}