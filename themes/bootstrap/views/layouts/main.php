<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/css/main.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<?php 

$index = array('label'=>'Eleições', 'url'=>array('/site/index'));
$candidatos = array('label'=>'Candidatos', 'url'=>array('/candidatos'), 'itemOptions' => array('class' => ($this->getId() == "candidatos")?"active":""));
$sobre =  array('label'=>'Sobre', 'url'=>array('/site/sobre'));

$this->widget('booster.widgets.TbNavbar',array(
    'brand' => 'AGIC',
    'fixed' => false,
    'fluid' => false,
    'items'=>array(
        array(
            'class'=>'booster.widgets.TbMenu',
            'type' => 'navbar',
            'items'=>array(
                $index,
                $candidatos,
                $sobre
            ),
        ),
    ),
)); 
?>

<div class="container" id="page">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('booster.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
                      )); 
                ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
            <strong>AGIC</strong> | <?php echo Yii::powered(); ?>
	</div><!-- footer -->
</div><!-- page -->
</body>
</html>
