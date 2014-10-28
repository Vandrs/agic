<?php

/**
 * This is the model class for table "DIM_CANDIDATO".
 *
 * The followings are the available columns in table 'DIM_CANDIDATO':
 * @property integer $ID_CANDIDATO
 * @property string $CODIGO_CANDIDATO
 * @property string $NOME_CANDIDATO
 * @property integer $NUMERO_CANDIDATO
 * @property string $NOME_URNA_CANDIDATO
 * @property string $DESCRICAO_OCUPACAO
 * @property string $DATA_NASCIMENTO
 * @property string $NUM_TITULO_ELEITORAL
 * @property integer $IDADE
 * @property string $DESCRICAO_SEXO
 * @property string $DESCRICAO_GRAU_INSTRUCAO
 * @property string $DESCRICAO_ESTADO_CIVIL
 * @property string $DESCRICAO_COR_RACA
 * @property string $DESCRICAO_NACIONALIDADE
 * @property string $SIGLA_UF_NASCIMENTO
 * @property string $NOME_MUNICIPIO_NASCIMENTO
 */
class Candidato extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'DIM_CANDIDATO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NUMERO_CANDIDATO, IDADE', 'numerical', 'integerOnly'=>true),
			array('CODIGO_CANDIDATO', 'length', 'max'=>50),
			array('NOME_CANDIDATO, NOME_URNA_CANDIDATO, DESCRICAO_OCUPACAO, DESCRICAO_GRAU_INSTRUCAO, DESCRICAO_ESTADO_CIVIL, DESCRICAO_COR_RACA, DESCRICAO_NACIONALIDADE, NOME_MUNICIPIO_NASCIMENTO', 'length', 'max'=>100),
			array('DATA_NASCIMENTO, DESCRICAO_SEXO', 'length', 'max'=>10),
			array('SIGLA_UF_NASCIMENTO', 'length', 'max'=>2),
			array('NUM_TITULO_ELEITORAL', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_CANDIDATO, CODIGO_CANDIDATO, NOME_CANDIDATO, NUMERO_CANDIDATO, NOME_URNA_CANDIDATO, DESCRICAO_OCUPACAO, DATA_NASCIMENTO, NUM_TITULO_ELEITORAL, IDADE, DESCRICAO_SEXO, DESCRICAO_GRAU_INSTRUCAO, DESCRICAO_ESTADO_CIVIL, DESCRICAO_COR_RACA, DESCRICAO_NACIONALIDADE, SIGLA_UF_NASCIMENTO, NOME_MUNICIPIO_NASCIMENTO', 'safe', 'on'=>'search'),
                        array('NOME_CANDIDATO','safe','on'=>'searchCandidato'),
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
			'ID_CANDIDATO' => 'Id Candidato',
			'CODIGO_CANDIDATO' => 'Código Candidato',
			'NOME_CANDIDATO' => 'Nome',
			'NUMERO_CANDIDATO' => 'Número Candidato',
			'NOME_URNA_CANDIDATO' => 'Nome Urna Candidato',
			'DESCRICAO_OCUPACAO' => 'Descricao Ocupacao',
			'DATA_NASCIMENTO' => 'Data Nascimento',
			'NUM_TITULO_ELEITORAL' => 'Num Titulo Eleitoral',
			'IDADE' => 'Idade',
			'DESCRICAO_SEXO' => 'Descricao Sexo',
			'DESCRICAO_GRAU_INSTRUCAO' => 'Descricao Grau Instrucao',
			'DESCRICAO_ESTADO_CIVIL' => 'Descricao Estado Civil',
			'DESCRICAO_COR_RACA' => 'Descricao Cor Raca',
			'DESCRICAO_NACIONALIDADE' => 'Descricao Nacionalidade',
			'SIGLA_UF_NASCIMENTO' => 'Sigla Uf Nascimento',
			'NOME_MUNICIPIO_NASCIMENTO' => 'Nome Municipio Nascimento',
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
	public function search($idCargo,$idPartido,$idEstado)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria= new CDbCriteria;

                $criteria->distinct = true;
                $criteria->select = "[t].ID_CANDIDATO, NOME_CANDIDATO, NOME_URNA_CANDIDATO, NUMERO_CANDIDATO, DESCRICAO_OCUPACAO ";
                
                $criteria->compare('NOME_CANDIDATO',$this->NOME_CANDIDATO, true);
                
                if(!empty($idCargo) || !empty($idPartido) || !empty($idEstado)){
                    $criteria->join = " JOIN FATO_BENS ON FATO_BENS.ID_CANDIDATO = [t].ID_CANDIDATO ";
                    $params = array();
                    if(!empty($idCargo)){
                        $criteria->addCondition(" FATO_BENS.ID_CARGO = :ID_CARGO ");
                        $params[":ID_CARGO"] = $idCargo;
                    }
                    
                    if(!empty($idPartido)){
                        $criteria->addCondition(" FATO_BENS.ID_PARTIDO = :ID_PARTIDO ");
                        $params[":ID_PARTIDO"] = $idPartido;
                    }
                    
                    if(!empty($idEstado)){
                        $criteria->addCondition(" FATO_BENS.ID_ESTADO = :ID_ESTADO ");
                        $params[":ID_ESTADO"] = $idEstado;
                    }
                    
                    $criteria->params = $params;
                }

                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getBensCandidato(){
            
            $itemsCount = Yii::app()->db->createCommand(" SELECT COUNT(1) AS QTD FROM FATO_BENS WHERE ID_CANDIDATO = :ID_CANDITADO ")->bindValues(array(":ID_CANDITADO" => $this->ID_CANDIDATO))->queryScalar();
   
            $command = Yii::app()->db->createCommand();
            $command->select("ID_FATO_BENS, DS_TIPO, DS_BEM, VALOR_BEM")->from("FATO_BENS");
            $command->where("ID_CANDIDATO = :ID_CANDIDATO")->order("DS_TIPO ASC");
            $command->bindValues(array(":ID_CANDIDATO" => $this->ID_CANDIDATO));
            
            $dataProvider = new CArrayDataProvider(
                                    $command->queryAll(),
                                    array(
                                        "keyField" => "ID_FATO_BENS",
                                        "id" => "ID_FATO_BENS"
                                    )
                                );
            return $dataProvider;
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Candidato the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
