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
            'label' => 'Bens declarados',
            'view' => 'view/tabs/_tabBens',
            'data' => array("modelCandidato"=>$modelCandidato),
            'itemOptions' => array("class" => 'icon-tab-home')
        ),
//        array(
//            'label' => 'Gastos campanha',
//            'view' => 'view/tabs/_tabGastos',
//            'data' => array("modelCandidato"=>$modelCandidato),
//            'itemOptions' => array("class" => 'icon-tab-globe')
//        ),
        array(
            'label' => 'Na web',
            'view' => 'view/tabs/_tabWeb',
            'data' => array("modelCandidato"=>$modelCandidato,
                            "twitter"=>$twitter),
            'itemOptions' => array("class" => 'icon-tab-globe')
        ),
         array(
            'label' => 'Dashboards',
            'view' => 'view/tabs/_tabGraficosDashboard',
             'itemOptions' => array("class" => 'icon-tab-stats1')
        )
    ),
));
Yii::app()->clientScript->registerScript('icon-tabs',"
    jQuery(document).ready(function(){
        var txtHome = jQuery('.icon-tab-home').find('a').text();
        var iconHome = '<span class=\"glyphicon glyphicon-home\"></span> ';
        jQuery('.icon-tab-home').find('a').html(iconHome+txtHome);
        
        var txtGlobe = jQuery('.icon-tab-globe').find('a').text();
        var iconGlobe = '<span class=\"glyphicon glyphicon-globe\"></span> ';
        jQuery('.icon-tab-globe').find('a').html(iconGlobe+txtGlobe);
        
        var txtStats1 = jQuery('.icon-tab-stats1').find('a').text();
        var iconStats1 = '<span class=\"glyphicon glyphicon-stats\"></span> ';
        jQuery('.icon-tab-stats1').find('a').html(iconStats1+txtStats1);

        var txtStats2 = jQuery('.icon-tab-stats2').find('a').text();
        var iconStats2 = '<span class=\"glyphicon glyphicon-stats\"></span> ';
        jQuery('.icon-tab-stats2').find('a').html(iconStats2+txtStats2);        
    });
");
?>
