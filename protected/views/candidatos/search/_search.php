<?php 
    $form = $this->beginWidget('booster.widgets.TbActiveForm',array(
        'id' => 'inlineForm',
        'type' => 'inline',
        'htmlOptions' => array('class' => 'well'),
    )
);
?>

<?php 
    echo $form->dropDownListGroup(
        $modelCargo,
        'ID_CARGO',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-12 col-md-3',
            ),
            'widgetOptions' => array(
                'data' => Cargo::getDropCanditatos(),
                'htmlOptions' => array('prompt'=>'Cargo'),
             )
        )
    ); 
?>

<?php 
    echo $form->dropDownListGroup(
        $modelPartido,
        'ID_PARTIDO',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-12 col-md-3',
            ),
            'widgetOptions' => array(
                'data' => Partido::getDropPartido(),
                'htmlOptions' => array('prompt'=>'Partido'),
             )
        )
    ); 
?>

<?php 
    echo $form->dropDownListGroup(
        $modelEstado,
        'ID_ESTADO',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-12 col-md-3',
            ),
            'widgetOptions' => array(
                'data' => Estado::getDropEstado(),
                'htmlOptions' => array('prompt'=>'Estado'),
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
                        'class' => 'col-sm-5 col-md-3',
                    ),
            )
    );
?>
<?php
    $this->widget(
        'booster.widgets.TbButton',
        array(
            'buttonType' => 'submit', 
            'label' => 'Pesquisar',
            'context' => 'primary'
        )
  
    );
?>

<?php $this->endWidget(); ?>
