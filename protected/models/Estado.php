<?php

/**
 * This is the model class for table "DIM_ESTADO".
 *
 * The followings are the available columns in table 'DIM_ESTADO':
 * @property integer $ID_ESTADO
 * @property string $COD_ESTADO
 * @property string $DESCRICAO_ESTADO
 */
class Estado extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'DIM_ESTADO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('COD_ESTADO', 'length', 'max'=>2),
			array('DESCRICAO_ESTADO', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_ESTADO, COD_ESTADO, DESCRICAO_ESTADO', 'safe', 'on'=>'search'),
                        array('ID_ESTADO', 'safe', 'on'=>'searchCandidato'),
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
			'ID_ESTADO' => 'Estado',
			'COD_ESTADO' => 'Cod Estado',
			'DESCRICAO_ESTADO' => 'Descricao Estado',
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

		$criteria->compare('ID_ESTADO',$this->ID_ESTADO);
		$criteria->compare('COD_ESTADO',$this->COD_ESTADO,true);
		$criteria->compare('DESCRICAO_ESTADO',$this->DESCRICAO_ESTADO,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public static function getDropEstado(){
            $dataProvider = new CActiveDataProvider('Estado',
                    array(
                        'pagination' => false,
                        'criteria' => array(
                            'order' => 'DESCRICAO_ESTADO ASC'
                        )
                    )
            );
            
            return CHtml::listData($dataProvider->getData(), 'ID_ESTADO', 'DESCRICAO_ESTADO');
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Estadp the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
