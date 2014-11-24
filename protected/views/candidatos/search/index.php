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
            'modelCandidato'=>$modelCandidato
        )
    );
?>

<?php $this->widget('booster.widgets.TbGridView',array(
	'id'=>'candidato-grid',
        'ajaxUrl' => $this->createUrl('/candidatos'),
	'dataProvider'=>$modelCandidato->search(),
	'columns'=>array(
                array(
                    'name'  => 'NOME_CANDIDATO',
                    'value' => 'CHtml::link($data->NOME_CANDIDATO,array("candidatos/candidato","id"=>$data->ID_CANDIDATO));',
                    'type'  => "raw" 
                ),
                'NOME_URNA_CANDIDATO',
                'NUMERO_CANDIDATO',
		'strPartido',
	)
));

 