<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/site.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">
	<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
        <a href="/site/index" id="logo"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/heatmap.png" /></a>
            <div class="navbar">
                <ul class="nav pull-right navigation">
                <li class="<? if(Yii::app()->controller->action->id=='index') echo 'active'; ?>"><a href="/site/index"><?php echo Yii::t('app' , 'Home'); ?></a>|</li>
                <li class="<? if(Yii::app()->controller->action->id=='about') echo 'active'; ?>"><a href="/site/about"><?php echo Yii::t('app' , 'About')?></a>|</li>
                <li class="<? if(Yii::app()->controller->action->id=='contact') echo 'active'; ?>"><a href="/site/contact"><?php echo Yii::t('app' , 'Contact')?></a>|</li>
                <li class="<? if(Yii::app()->controller->action->id=='term') echo 'active'; ?>"><a href="/site/term"><?php echo Yii::t('app' , 'Terms of use')?></a></li>
                </ul>
            </div>

        
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Data Search', 'url'=>array('/glncrna/admin')),
                                array('label'=>'Statistics', 'url'=>array('/site/page', 'view'=>'statistics')),
                                array('label'=>'Help', 'url'=>array('/site/page', 'view'=>'help')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Lee's Lab at the Chinese University of Hong Kong.<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
