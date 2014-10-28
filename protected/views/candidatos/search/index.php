<?php
    $this->breadcrumbs=array(
            'Candidatos',
    );
?>

<h1>Candidatos</h1>

<?php 
    $this->renderPartial(
        'search/_search',
        array(
            'modelCandidato'=>$modelCandidato,
            'modelCargo'   => $modelCargo,
            'modelEstado'  => $modelEstado,
            'modelPartido' => $modelPartido
        )
    );
?>

<?php $this->widget('booster.widgets.TbGridView',array(
	'id'=>'candidato-grid',
        'ajaxUrl' => $this->createUrl('/candidatos'),
	'dataProvider'=>$modelCandidato->search($modelCargo->ID_CARGO,$modelPartido->ID_PARTIDO,$modelEstado->ID_ESTADO),
	'columns'=>array(
                array(
                    'name'  => 'NOME_CANDIDATO',
                    'value' => 'CHtml::link($data->NOME_CANDIDATO,array("candidatos/candidato","id"=>$data->ID_CANDIDATO));',
                    'type'  => "raw" 
                ),
		'NUMERO_CANDIDATO',
		'NOME_URNA_CANDIDATO',
		'DESCRICAO_OCUPACAO',
	)
));

 