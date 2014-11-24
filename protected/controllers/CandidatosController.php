<?php

class CandidatosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','candidato'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			)
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionCandidato($id)
	{
            $this->pageTitle = 'AGIC - Candidato';
            $twitter = new Twitter();
            $this->render('view/view',array(
                'modelCandidato' => $this->loadModel($id),
                'twitter' => $twitter,
            ));
	}
        
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
                $this->pageTitle = 'AGIC - Candidatos';
		$modelCandidato = new Candidato('search');
                $modelCandidato->unsetAttributes();
                if(isset($_GET['Candidato'])){
                    $modelCandidato->attributes=$_GET['Candidato'];
                }
                
		$this->render('search/index',array(
                    'modelCandidato'=>$modelCandidato
		));
	}
        
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Candidato::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='candidato-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
