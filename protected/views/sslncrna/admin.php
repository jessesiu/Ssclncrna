<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('glncrna-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php
Yii::app()->clientScript->registerScript('column','
        $("input[name=\"Columns[]\"]").change(function()
           {
                var data=$("input[name=\"Columns[]\"]:checked").serialize();
                $("#glncrna-grid").yiiGridView("update",{data:data});
           }
       );
');
?>


<?php
Yii::app()->clientScript->registerScript('galaxy','
        $("input[name=\"Columns[]\"]").change(function()
           {
                var data=$("input[name=\"Columns[]\"]:checked").serialize();
                $("#glncrna-grid").yiiGridView("update",{data:data});
           }
       );
');
?>


<p class=MsoNormal><b><span lang=EN-US style='font-size:20.0pt;font-family:
"Times New Roman","serif"'>Data Search</span></b></p>
<br/>


<?php



$this->widget('CTabView', array(
    'cssFile'=>Yii::app()->baseUrl.'/css/jquery.yiitab.css',
    'tabs'=>array(
        'tab1'=>array(
            'title'=>'1. Search Data',
            'view'=>'search',
            'data'=>array('model'=>$model, 
                            'columns'=>$columns),
        ), /*
        'tab2'=>array(
            'title'=>'2. Select Columns',
            'view'=>'custom',
            'data'=>array('model'=>$model, 
                            'columns'=>$columns),
            ),    
        /*
        'tab3'=>array(
            'title'=>'3. Export to Galaxy',
            'view'=>'galaxy',
            'data'=>array('model'=>$model, 
                            'columns'=>$columns),
        ),*/
    ),
));
?>

<?php $this->widget('application.extensions.EExcelView', array(
        'id'=>'glncrna-grid',
        'dataProvider'=>$model->search(),
        //'filter'=>$model,
        'exportType'=>'csv',
        'filename'=>'/var/www/html/glncrna/bedfiles/csvtab.txt',
        'stream'=>false,
        'itemsCssClass' => "table table-bordered",

       'columns'=>array(     
            array(
                'name'=>'sscagelncrna_id',
                'visible'=>true,
                'type'=>'raw',
                'value'=>'CHtml::link($data->sscagelncrna_id, "http://genome.ucsc.edu/cgi-bin/hgTracks?org=human&hgt.customText=http://gb.cbiit.cuhk.edu.hk/test/test.bed&position=chr22")',
               // 'value'=>'CHtml::link($data->glncrna_id, array("ucscview","glncrna_id"=>$data->glncrna_id),array("target"=>"_blank"))',
             ), 
           array(
                'name'=>'chromsome',
                'visible'=>true,
                'type'=>'raw',
                'value'=>'CHtml::link($data->chromsome, "http://www.ebi.ac.uk/gxa/genes/$data->chromsome",array("target"=>"_blank"))',
                
            ),
           array(
                'name'=>'coding_gene_refseq_id',
                'visible'=>true,
                'type'=>'raw',
                'value'=>'$data->getrefseq()',
                
            ),
           array(
                'name'=>'coding_gene_symbol',
                'visible'=>true,
                'type'=>'raw',
                'value'=>'$data->getgenesymbol()',
                
            ),
           array(
                'name'=>'number_of_exons',
                'visible'=>true,
                'type'=>'raw',   
            ),
           array(
                'name'=>'size_of_exons',
                'visible'=>true,
                'type'=>'raw',   
            ),
)
)); 
?>

<script type="text/javascript">
    $(".js-desc").click(function(e) {
        e.preventDefault();
        id = $(this).attr('data');
        $(this).hide();
        $('.js-short-'+id).toggle();
        $('.js-long-'+id).toggle();
    });
</script>


