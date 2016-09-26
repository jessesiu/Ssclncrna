<div class="galaxy-form">

    <div class="wide form">
    
    <?php 
    
    $form=$this->beginWidget('CActiveForm', array(
	//'action'=>Yii::app()->createUrl($this->route),
        //'action'=>'http://localhost:8080/tool_runner?tool_id=gigadb&amp;type=text&amp;name=new%20history%20entry&amp;URL=http://localhost'.Yii::app()->createUrl('glncrna/index'),
	'action'=>'https://usegalaxy.org/tool_runner?tool_id=biomart&amp;type=text&amp;name=GermlncRNA%20Data&amp;URL=http://germlncrna.cbiit.cuhk.edu.hk/bedfiles/csvtab.txt',
	'method'=>'post',
        'htmlOptions'=>array('target'=>'_blank'),
        )); 
    ?>      
    
    <div class="row buttons">
        <img src="../../images/galaxyLogo.png" style="padding-right: 20px">
            <?php echo CHtml::submitButton('Export to Galaxy',array('name'=>'galaxy','id'=>'galaxy')); ?>
    </div>
    <?php $this->endWidget(); ?>    
    <?php 
    echo "The following columns will be sent to <a href='https://usegalaxy.org/' target='_blank'>Galaxy</a> delimited by tab:";
    ?>
    <br/>        
<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/outTable.jpg">

</div><!-- galaxy-form -->
</div>
