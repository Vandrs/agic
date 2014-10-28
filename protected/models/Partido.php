<?php

/**
 * This is the model class for table "DIM_PARTIDO".
 *
 * The followings are the available columns in table 'DIM_PARTIDO':
 * @property integer $ID_PARTIDO
 * @property integer $CODIGO_PARTIDO
 * @property string $SIGLA_PARTIDO
 * @property string $NOME_PARTIDO
 */
class Partido extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'DIM_PARTIDO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CODIGO_PARTIDO', 'numerical', 'integerOnly'=>true),
			array('SIGLA_PARTIDO', 'length', 'max'=>10),
			array('NOME_PARTIDO', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_PARTIDO, CODIGO_PARTIDO, SIGLA_PARTIDO, NOME_PARTIDO', 'safe', 'on'=>'search'),
                        array('ID_PARTIDO','safe','on'=>'searchCandidato'),
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
			'ID_PARTIDO' => 'Id Partido',
			'CODIGO_PARTIDO' => 'Codigo Partido',
			'SIGLA_PARTIDO' => 'Sigla Partido',
			'NOME_PARTIDO' => 'Nome Partido',
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
                
		$criteria->compare('ID_PARTIDO',$this->ID_PARTIDO);
		$criteria->compare('CODIGO_PARTIDO',$this->CODIGO_PARTIDO);
		$criteria->compare('SIGLA_PARTIDO',$this->SIGLA_PARTIDO,true);
		$criteria->compare('NOME_PARTIDO',$this->NOME_PARTIDO,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public static function getDropPartido(){
            $dataProvider = new CActiveDataProvider('Partido',
                    array(
                        'pagination' => false,
                        'criteria' => array(
                            'order' => 'SIGLA_PARTIDO ASC'
                        )
                    )
            );
            return CHtml::listData($dataProvider->getData(), 'ID_PARTIDO', 'SIGLA_PARTIDO');
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Partido the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
