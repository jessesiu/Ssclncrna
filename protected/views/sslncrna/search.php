<div class="search-form">
<div class="wide form">
      
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?> 
<table>
        <tr><td colspan="16" align="center">
            <div class="divider">
                <h4>Annotation
                <a href="<?php echo Yii::app()->getHomeUrl(); ?>/site/page/view/glossary" target="_blank">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/help.png"  height="20" width="20"></img>
                </a>                
                </h4>
            </div>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->label($model,'sscagelncrna_id'); ?> <br/><span style="font-size:10px;">E.g. SA00001a</span><br/>   
		<span style="font-size:12px;"></span><?php echo $form->textField($model,'sscagelncrna_id',array('size'=>14,'maxlength'=>14)); ?>        
            </td>        
            <td><?php echo $form->label($model,'ensembltranscript_id'); ?> <br/><span style="font-size:10px;">E.g. ENSMUST00000131759</span><br/>   
                <span style="font-size:12px;"></span><?php echo $form->textField($model,'ensembltranscript_id',array('size'=>18,'maxlength'=>18)); ?>
            </td>
            <td><?php echo $form->label($model,'coding_gene_refseq_id'); ?> <br/><span style="font-size:10px;">E.g. NM_021304</span><br/>   
                <span style="font-size:12px;"></span><?php echo $form->textField($model,'coding_gene_refseq_id',array('size'=>18,'maxlength'=>18)); ?>
            </td>
            <td><?php echo $form->label($model,'coding_gene_symbol'); ?> <br/><span style="font-size:10px;">E.g. 0610010B08Rik</span><br/>   
                <span style="font-size:12px;"></span><?php echo $form->textField($model,'coding_gene_symbol',array('size'=>18,'maxlength'=>18)); ?>
            </td>

        </tr>
        <tr>
            <td colspan="14" align="center">
            <div class="divider">
                <h4>Regulation
                <a href="<?php echo Yii::app()->getHomeUrl(); ?>/site/page/view/glossary" target="_blank">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/help.png"  height="20" width="20"></img>
                </a>                
                </h4>
            </div>
            </td>
        </tr>
        <tr>
            <td>
            <?php echo $form->label($model,'polya_testis'); ?>  <br/>
                <select id="annotated_or_novel_select" name="polya_testis_select">
                    <option></option>
                    <option value='TRUE'>TRUE</option>
                    <option value='FALSE'>FALSE</option>                
                </select>    
            </td>
            <td>
            <?php echo $form->label($model,'dhs'); ?>  <br/>
                <select id="annotated_or_novel_select" name="dhs_select">
                    <option></option>
                    <option value='TRUE'>TRUE</option>
                    <option value='FALSE'>FALSE</option>                
                </select>    
            </td>
            <td>
            <?php echo $form->label($model,'cage'); ?>  <br/>
                <select id="annotated_or_novel_select" name="cage_select">
                    <option></option>
                    <option value='TRUE'>TRUE</option>
                    <option value='FALSE'>FALSE</option>                
                </select>    
            </td>
             <td>
            <?php echo $form->label($model,'conserved_elements'); ?>  <br/>
                <select id="annotated_or_novel_select" name="conserved_elements_select">
                    <option></option>
                    <option value='TRUE'>TRUE</option>
                    <option value='FALSE'>FALSE</option>                
                </select>    
            </td>
        </tr>
        <tr>
            <td colspan="9" align="center">
            <div class="divider">
                <h4>Epigenetic modifications
                <a href="<?php echo Yii::app()->getHomeUrl(); ?>/site/page/view/glossary" target="_blank">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/help.png"  height="20" width="20"></img>
                </a>
                </h4>
            </div>  
            </td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td colspan="9" align="center">
            <div class="divider">
                <h4>Expression Data
                <a href="<?php echo Yii::app()->getHomeUrl(); ?>/site/page/view/glossary" target="_blank">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/help.png"  height="20" width="20"></img>
                </a>
                </h4>
            </div>  
            </td>
        </tr>
        <tr>
    
    <tr>
        <td colspan="9" align="center">
            <div class="divider">
                <h4>Blast Search
                <a href="<?php echo Yii::app()->getHomeUrl(); ?>/site/page/view/glossary" target="_blank">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/help.png"  height="20" width="20"></img>
                </a>
                </h4>
            </div>  
        </td>
    </tr>
</table>
             
	<div class="row buttons">
            <?php echo CHtml::submitButton('Search'); ?>
          
            &emsp;&emsp;&emsp;
            <?php echo CHtml::link('Reset',array('reset')); ?>  
            &emsp;&emsp;&emsp;
               
            &emsp;&emsp;&emsp;<br/>
	<a id="example1" href="#" style="margin-left:100px;">Example1</a>: Conserved novel spermatogonia-specific lncRNAs with DHS in
putative promoters<br/>
            
            
            <a id="example2" href="#" style="margin-left:100px;">Example2</a>: LncRNAs from chromosome 5 with high expression at spermatid
stage and poly-A evidence in testis tissue
        </div>
    
<!-- new code end -->

<?php $this->endWidget(); ?>  
<?php 
    $model->savetofile();
?>

</div><!-- search-form -->
</div>

<script>
  $( document ).ready(function() {
        $( "#reset" ).click(reset);
        $( "#example1" ).click(function( event ) {
		reset();
		$("#er_conserved_element_select").val("Yes");
		$("#annotated_or_novel_select").val("novel");
		$("#stage_specific_select").val("Spermatogonia");
		$("#er_dnasei_hsr_select").val("Yes");
            	event.preventDefault();
        });
        $( "#example2" ).click(function( event ) {
		reset();
		$("#Glncrna_loc_chromosome").val("chr5");
		$("#Glncrna_rnaseq_spermatid").val("3");
		$("#er_poly_a_tail_select").val("Yes");
            	event.preventDefault();
        });

    	

    });
function reset() {
		$("#Glncrna_glncrna_id").val("");
		$("#Glncrna_ensembl").val("");
		$("#Glncrna_refseq").val("");
		$("#Glncrna_ucsc").val("");
		$("#Glncrna_noncode").val("");
		$("#Glncrna_frnadb").val("");


		$("#annotated_or_novel_select").val("");
		$("#loc_type_select").val("");
		$("#evidence_level_select").val("");
		$("#Glncrna_loc_chromosome").val("");

		$("#er_poly_a_tail_select").val("");
		$("#er_poly_a_other_tissue_select").val("");
		$("#er_dnasei_hsr_select").val("");
		$("#er_cage_select").val("");
		$("#er_h3k4me1_select").val("");
		$("#er_h3k4me3_select").val("");
		$("#er_h3k27ac_select").val("");
		$("#er_h3k27me3_select").val("");
		$("#er_h3k36me3_select").val("");
		$("#er_conserved_element_select").val("");

		$("#Glncrna_rnaseq_spermatogonia").val("");
		$("#Glncrna_rnaseq_spermatocyte").val("");
		$("#Glncrna_rnaseq_spermatid").val("");
		$("#stage_specific_select").val("");

		$("#Glncrna_sage_spermatogonia").val("");
		$("#Glncrna_sage_spermatocyte").val("");
		$("#Glncrna_sage_spermatid").val("");

		$("#Glncrna_microarray_neonatal").val("");
		$("#Glncrna_microarray_adult").val("");
            	event.preventDefault();
        }
</script>
