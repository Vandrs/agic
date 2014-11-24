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
			array('NUMERO_CANDIDATO, IDADE', 'numerical', 'integerOnly'=>true),
			array('CODIGO_CANDIDATO', 'length', 'max'=>50),
			array('NOME_CANDIDATO, NOME_URNA_CANDIDATO, DESCRICAO_OCUPACAO, DESCRICAO_GRAU_INSTRUCAO, DESCRICAO_ESTADO_CIVIL, DESCRICAO_COR_RACA, DESCRICAO_NACIONALIDADE, NOME_MUNICIPIO_NASCIMENTO', 'length', 'max'=>100),
			array('DATA_NASCIMENTO, DESCRICAO_SEXO', 'length', 'max'=>10),
			array('SIGLA_UF_NASCIMENTO', 'length', 'max'=>2),
			array('NUM_TITULO_ELEITORAL', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_CANDIDATO, CODIGO_CANDIDATO, NOME_CANDIDATO, NUMERO_CANDIDATO, NOME_URNA_CANDIDATO, DESCRICAO_OCUPACAO, DATA_NASCIMENTO, NUM_TITULO_ELEITORAL, IDADE, DESCRICAO_SEXO, DESCRICAO_GRAU_INSTRUCAO, DESCRICAO_ESTADO_CIVIL, DESCRICAO_COR_RACA, DESCRICAO_NACIONALIDADE, SIGLA_UF_NASCIMENTO, NOME_MUNICIPIO_NASCIMENTO', 'safe', 'on'=>'search'),
                        array('NOME_CANDIDATO, NOME_URNA_CANDIDATO','safe','on'=>'searchCandidato'),
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
			'NOME_URNA_CANDIDATO' => 'Nome na Urna',
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
                        'strPartido' => 'Partido',
                        'strEstadoConcorrendo' => 'Estado'
		);
	}

	public function search($idCargo,$idPartido,$idEstado)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria= new CDbCriteria;

                $criteria->distinct = true;
                $criteria->select = " ID_CANDIDATO, NOME_CANDIDATO, NOME_URNA_CANDIDATO, NUMERO_CANDIDATO, CODIGO_CANDIDATO ";
                
                $params = array();
                
                if(!empty($this->NOME_CANDIDATO)){
                    $criteria->addCondition(' NOME_CANDIDATO LIKE :NOME ');
                    $params[":NOME"] = "%".$this->NOME_CANDIDATO."%";
                }
                
                if(!empty($this->NOME_URNA_CANDIDATO)){
                    $criteria->addCondition(' NOME_URNA_CANDIDATO LIKE :NOME_URNA_CANDIDATO ');
                    $params[":NOME_URNA_CANDIDATO"] = "%".$this->NOME_URNA_CANDIDATO."%";
                }
                
                if(!empty($idCargo) || !empty($idPartido) || !empty($idEstado)){
                    $criteria->join = " JOIN FATO_BENS ON FATO_BENS.ID_CANDIDATO = [t].ID_CANDIDATO ";
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

	/*
	 * @param string $className active record class name.
	 * @return Candidato the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
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
                             FROM FATO_BENS F
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
}
