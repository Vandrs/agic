<?php 
    $form = $this->beginWidget('booster.widgets.TbActiveForm',array(
        'id' => 'inlineForm',
        'type' => 'horizontal',
        'method' => 'GET',
        'htmlOptions' => array('class' => 'well'),
    )
);
?>

<?php 
    echo $form->dropDownListGroup(
        $modelCandidato,
        'ID_CARGO',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-12 col-md-6',
            ),
            'widgetOptions' => array(
                'data' => Cargo::getDropCanditatos(),
                'htmlOptions' => array('prompt'=>'Selecione'),
             )
        )
    ); 
?>

<?php 
    echo $form->dropDownListGroup(
        $modelCandidato,
        'ID_PARTIDO',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-12 col-md-6',
            ),
            'widgetOptions' => array(
                'data' => Partido::getDropPartido(),
                'htmlOptions' => array('prompt'=>'Selecione'),
             )
        )
    ); 
?>

<?php 
    echo $form->dropDownListGroup(
        $modelCandidato,
        'ID_ESTADO',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-12 col-md-6',
            ),
            'widgetOptions' => array(
                'data' => Estado::getDropEstado(),
                'htmlOptions' => array('prompt'=>'Selecione'),
             )
        )
    ); 
?>

<?php 
    echo $form->textFieldGroup(
            $modelCandidato,
            'NOME_CANDIDATO',
            array(
                    'wrapperHtmlOptions' => array(
                        'class' => 'col-sm-12 col-md-6',
                    ),
            )
    );
?>

<?php 
    echo $form->textFieldGroup(
            $modelCandidato,
            'NOME_URNA_CANDIDATO',
            array(
                    'wrapperHtmlOptions' => array(
                        'class' => 'col-sm-12 col-md-6',
                    ),
            )
    );
?>

<div class="row text-right">
 <div class="col-sm-12">   
<?php
    $this->widget(
        'booster.widgets.TbButton',
        array(
            'buttonType' => 'submit', 
            'label' => 'Pesquisar',
            'context' => 'primary',
            'icon' => 'search'
        )
  
    );
?>
 </div>
</div>
<?php $this->endWidget(); ?>
