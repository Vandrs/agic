<?php

/**
 * This is the model class for table "DIM_CARGO".
 *
 * The followings are the available columns in table 'DIM_CARGO':
 * @property integer $ID_CARGO
 * @property integer $CODIGO_CARGO
 * @property string $DESCRICAO_CARGO
 */
class Cargo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'DIM_CARGO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CODIGO_CARGO', 'numerical', 'integerOnly'=>true),
			array('DESCRICAO_CARGO', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_CARGO, CODIGO_CARGO, DESCRICAO_CARGO', 'safe', 'on'=>'search'),
                        array('ID_CARGO','safe', 'on'=>'searchCandidato'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_CARGO' => 'Cargo',
			'CODIGO_CARGO' => 'Código Cargo',
			'DESCRICAO_CARGO' => 'Descrição do Cargo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID_CARGO',$this->ID_CARGO);
		$criteria->compare('CODIGO_CARGO',$this->CODIGO_CARGO);
		$criteria->compare('DESCRICAO_CARGO',$this->DESCRICAO_CARGO,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public static function getDropCanditatos(){
            $dataProvider = new CActiveDataProvider(
                'Cargo', 
                array(
                    'criteria'=>array(
                      'order'=>'DESCRICAO_CARGO ASC', 
                    ),
                    'pagination' => false
                )
            );
            return CHtml::listData($dataProvider->getData(), 'ID_CARGO', 'DESCRICAO_CARGO');
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cargo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
