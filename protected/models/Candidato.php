<?php

/**
 * This is the model class for table "DIM_CANDIDATO".
 *
 * The followings are the available columns in table 'DIM_CANDIDATO':
 * @property integer $ID_CANDIDATO
 * @property integer $ID_CARGO
 * @property integer $ID_ESTADO
 * @property integer $ID_LEGENDA
 * @property integer $ID_PARTIDO
 * @property integer $ID_SITUACAO_CANDIDATURA
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
        private $strPartido;
        private $strEstadoConcorrendo;
        private $strCargo;
        private $fotoCandidato;
        
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
			array('ID_CARGO, ID_ESTADO, ID_LEGENDA, ID_PARTIDO, ID_SITUACAO_CANDIDATURA, NUMERO_CANDIDATO, IDADE', 'numerical', 'integerOnly'=>true),
			array('CODIGO_CANDIDATO', 'length', 'max'=>50),
			array('NOME_CANDIDATO, NOME_URNA_CANDIDATO, DESCRICAO_OCUPACAO, DESCRICAO_GRAU_INSTRUCAO, DESCRICAO_ESTADO_CIVIL, DESCRICAO_COR_RACA, DESCRICAO_NACIONALIDADE, NOME_MUNICIPIO_NASCIMENTO', 'length', 'max'=>100),
			array('DATA_NASCIMENTO, DESCRICAO_SEXO', 'length', 'max'=>10),
			array('SIGLA_UF_NASCIMENTO', 'length', 'max'=>2),
			array('NUM_TITULO_ELEITORAL', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_CANDIDATO, ID_CARGO, ID_ESTADO, ID_LEGENDA, ID_PARTIDO, ID_SITUACAO_CANDIDATURA, CODIGO_CANDIDATO, NOME_CANDIDATO, NUMERO_CANDIDATO, NOME_URNA_CANDIDATO, DESCRICAO_OCUPACAO, DATA_NASCIMENTO, NUM_TITULO_ELEITORAL, IDADE, DESCRICAO_SEXO, DESCRICAO_GRAU_INSTRUCAO, DESCRICAO_ESTADO_CIVIL, DESCRICAO_COR_RACA, DESCRICAO_NACIONALIDADE, SIGLA_UF_NASCIMENTO, NOME_MUNICIPIO_NASCIMENTO', 'safe', 'on'=>'search'),
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
			'ID_CANDIDATO' => 'Candidato',
			'ID_CARGO' => 'Cargo',
			'ID_ESTADO' => 'Estado',
			'ID_LEGENDA' => 'Legenda',
			'ID_PARTIDO' => 'Partido',
			'ID_SITUACAO_CANDIDATURA' => 'Situação da candidatura',
			'CODIGO_CANDIDATO' => 'Codigo do candidato',
			'NOME_CANDIDATO' => 'Nome',
			'NUMERO_CANDIDATO' => 'Número',
			'NOME_URNA_CANDIDATO' => 'Nome urna',
			'DESCRICAO_OCUPACAO' => 'Ocupação',
			'DATA_NASCIMENTO' => 'Data de nascimento',
			'NUM_TITULO_ELEITORAL' => 'Título eleitoral',
			'IDADE' => 'Idade',
			'DESCRICAO_SEXO' => 'Sexo',
			'DESCRICAO_GRAU_INSTRUCAO' => 'Grau de instrução',
			'DESCRICAO_ESTADO_CIVIL' => 'Estado civil',
			'DESCRICAO_COR_RACA' => 'Cor/Raça',
			'DESCRICAO_NACIONALIDADE' => 'Nacionalidade',
			'SIGLA_UF_NASCIMENTO' => 'UF de nascimento',
			'NOME_MUNICIPIO_NASCIMENTO' => 'Município de nascimento',
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
                $criteria = new CDbCriteria();
            
                $criteria->distinct = true;
                $criteria->select = " ID_CANDIDATO, NOME_CANDIDATO, NOME_URNA_CANDIDATO, NUMERO_CANDIDATO, CODIGO_CANDIDATO ";
                $criteria->condition = " ID_PARTIDO IS NOT NULL AND ID_PARTIDO <> 0 ";
                
                $params = array();
                
                if(!empty($this->NOME_CANDIDATO)){
                    $criteria->addCondition(' NOME_CANDIDATO LIKE :NOME ');
                    $params[":NOME"] = "%".$this->NOME_CANDIDATO."%";
                }
                
                if(!empty($this->NOME_URNA_CANDIDATO)){
                    $criteria->addCondition(' NOME_URNA_CANDIDATO LIKE :NOME_URNA_CANDIDATO ');
                    $params[":NOME_URNA_CANDIDATO"] = "%".$this->NOME_URNA_CANDIDATO."%";
                }
                
                if(!empty($this->ID_CARGO)){
                    $criteria->addCondition(" ID_CARGO = :ID_CARGO ");
                    $params[":ID_CARGO"] = $this->ID_CARGO;
                }
                
                if(!empty($this->ID_ESTADO)){
                    $criteria->addCondition(" ID_ESTADO = :ID_ESTADO ");
                    $params[":ID_ESTADO"] = $this->ID_ESTADO;
                }
                
                if(!empty($this->ID_PARTIDO)){
                    $criteria->addCondition(" ID_PARTIDO = :ID_PARTIDO ");
                    $params[":ID_PARTIDO"] = $this->ID_PARTIDO;
                }
                
                $criteria->params = $params;

                return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>array(
                            'attributes'=>array(
                             'NOME_CANDIDATO', 'NOME_URNA_CANDIDATO'
                            ),
                            'defaultOrder'=>array(
                                'NOME_CANDIDATO' => CSort::SORT_ASC
                            )
                        )
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
        
        
        public function afterFind() {
            parent::afterFind();
            $this->findStrParamsCandidato();
            $this->montaCaminhoFotoCandidato();
        }
        
        private function findStrParamsCandidato(){
            $sql = " SELECT TOP 1 P.SIGLA_PARTIDO,
                                  E.COD_ESTADO,
                                  C.DESCRICAO_CARGO
                             FROM DIM_CANDIDATO F
                             JOIN DIM_PARTIDO P ON F.ID_PARTIDO = P.ID_PARTIDO
                             JOIN DIM_ESTADO E ON F.ID_ESTADO = E.ID_ESTADO
                             JOIN DIM_CARGO C ON F.ID_CARGO = C.ID_CARGO 
                            WHERE F.ID_CANDIDATO = :ID_CANDIDATO ";
            
            $values = array(":ID_CANDIDATO"=>$this->ID_CANDIDATO);
            
            $result = Yii::app()->db->createCommand($sql)->bindValues($values)->queryRow();
            if(!empty($result)){
                $this->strPartido = $result["SIGLA_PARTIDO"];
                $this->strEstadoConcorrendo = $result["COD_ESTADO"]; 
                $this->strCargo = $result["DESCRICAO_CARGO"];
            }
        }
        
        private function montaCaminhoFotoCandidato(){
            $this->fotoCandidato = $this->CODIGO_CANDIDATO.".jpg";
        }
        
        public function hasFoto(){
            return file_exists($this->getPathFotoCandidato());
        }
        
        /* GET E SETS */

        public function getStrPartido(){
            return $this->strPartido;
        }
        
        public function setStrPartido($strPartido){
            $this->strPartido = $strPartido;
        }
        
        public function getStrEstadoConcorrendo(){
            return $this->strEstadoConcorrendo;
        }
        
        public function setStrEstadoConcorrendo($strEstadoConcorrendo){
            $this->strEstadoConcorrendo = $strEstadoConcorrendo;
        }
        
        public function getStrCargo(){
            return $this->strCargo;
        }
        
        public function setStrCargo($strCargo){
            $this->strCargo = $strCargo;
        }

        public function getPathFotoCandidato(){
            return $path = Yii::app()->getBasePath()."\\..\\fotos-candidatos\\".$this->strEstadoConcorrendo."\\".$this->fotoCandidato;
        }
        
        public function getUrlPathFotoCandidato(){
            return Yii::app()->getBaseUrl(true)."/fotos-candidatos/".$this->strEstadoConcorrendo."/".$this->fotoCandidato;
        }
        
        public function setFotoCandidato($fotoCandidato){
            $this->fotoCandidato = $fotoCandidato;
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
