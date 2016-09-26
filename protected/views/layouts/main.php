<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
        <link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon"> 
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon"> 
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
<header>
<div class="container">
	<div id="logo">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/glncrna2.png" height="100px"/>
        </div>
        <div class="navbar">
            <ul class="nav pull-right navigation">
            <li><a href="<?php echo Yii::app()->getHomeUrl(); ?>/site/index"><?php echo Yii::t('app' , 'Home'); ?></a>|</li>
            <li><a href="<?php echo Yii::app()->getHomeUrl(); ?>/sslncrna/admin"><?php echo Yii::t('app' , 'Data Search')?></a>|</li>
            <li><a href="<?php echo Yii::app()->getHomeUrl(); ?>/site/page/view/statistics"><?php echo Yii::t('app' , 'Statistics')?></a>|</li>
            <li><a href="<?php echo Yii::app()->getHomeUrl(); ?>/site/page/view/help"><?php echo Yii::t('app' , 'Help')?></a>|</li>
            <li><a href="<?php echo Yii::app()->getHomeUrl(); ?>/site/contact"><?php echo Yii::t('app' , 'Contact')?></a></li>
            </ul>
        </div>
</div>
</header>
    
<div id="content">
        <?php echo $content; ?>
</div><!-- content -->

<div class="clear"></div>

<div id="footer">
        Copyright by Lee Lab at the Chinese University of Hong Kong.<br/>
        <a href="http://www.cuhk.edu.hk/" target="_blank"><img height="70px" src="<?php echo Yii::app()->request->baseUrl; ?>/images/cuhkLogo.jpg" style="padding-right: 70px"/></a>
        <a href="http://www.sbs.cuhk.edu.hk/" target="_blank"><img height="80px" src="<?php echo Yii::app()->request->baseUrl; ?>/images/sbsLogo.jpg" style="padding-right: 50px"/></a>
        <a href="http://www.genomics.cn/" target="_blank"><img height="45px" src="<?php echo Yii::app()->request->baseUrl; ?>/images/bgiLogo.png"/></a>
</div><!-- footer -->

<!-- page -->

</body>
</html>
