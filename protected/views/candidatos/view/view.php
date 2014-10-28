<?php
$this->breadcrumbs=array(
	'Candidatos'=>array('/candidatos'),
	$modelCandidato->NOME_CANDIDATO,
);
?>

<h1><?php echo ucwords(mb_strtolower($modelCandidato->NOME_CANDIDATO,"UTF-8")); ?></h1>
<?php

$this->renderPartial(
        "view/_view",
        array("modelCandidato"=>$modelCandidato)
);

$this->widget('booster.widgets.TbTabView', array(
    'type' => 'tabs',
    'justified' => true,
    'tabs'=>array(
        array(
            'label' => 'Dados pessoais',
            'view' => 'view/tabs/_tabDadosPessoais',
            'data' => array("modelCandidato"=>$modelCandidato),
            'active' => true
        ),
        array(
            'label' => 'Bens declarados',
            'view' => 'view/tabs/_tabBens',
            'data' => array("modelCandidato"=>$modelCandidato),
        ),
         array(
            'label' => 'Comparações de bens',
            'view' => 'view/tabs/_tabGraficosBens',
        ),
         array(
            'label' => 'Gastos',
            'view' => 'view/tabs/_tabGraficosGastos',
        ),
    ),
));
?>
