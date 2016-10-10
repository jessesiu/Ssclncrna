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
            <td>
                <?php echo $form->label($model,'chromsome'); ?><br/>
                <?php echo $form->dropDownList($model,'chromsome',
                            array('','chr1'=>'chr1','chr1_random'=>'chr1_random','chr2'=>'chr2',
                                'chr3'=>'chr3','chr4'=>'chr4','chr5'=>'chr5','chr6'=>'chr6','chr7'=>'chr7',
                                'chr8'=>'chr8','chr8_random'=>'chr8_random','chr9'=>'chr9','chr9_random'=>'chr9_random',
                                'chr10'=>'chr10','chr11'=>'chr11','chr12'=>'chr12','chr13'=>'chr13','chr13_random'=>'chr13_random',
                                'chr14'=>'chr14','chr15'=>'chr15','chr16'=>'chr16','chr17'=>'chr17','chr17_random'=>'chr17_random',
                                'chr18'=>'chr18','chr19'=>'chr19','chrM'=>'chrM','chrUn_random'=>'chrUn_random',
                                'chrX'=>'chrX','chrX_random'=>'chrX_random','chrY'=>'chrY','chrY_random'=>'chrY_random')); ?>

            </td>
            
            

        </tr>
        <tr>
            <td>
            <?php echo $form->label($model,'number_of_exons'); ?> <br/>
                <?php echo $form->dropDownList($model,'number_of_exons',
                            array('','1'=>'1','2'=>'2','3'=>'3',
                                '4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8',
                                '9'=>'9','10'=>'10')); ?>
            </td>
            <td>
            <?php echo $form->label($model,'genomicfeature'); ?> <br/>
                <?php echo $form->dropDownList($model,'genomicfeature',
                            array('','Intergenic'=>'Intergenic','Exonic'=>'Exonic','Intronic'=>'Intronic',
                                'Sense'=>'Sense','Antisense'=>'Antisense'
                                )); ?>
            </td>
            <td>
            <?php echo $form->label($model,'lncrna_type'); ?> <br/>
                <?php echo $form->dropDownList($model,'lncrna_type',
                            array('','Annotated'=>'Annotated','Novel'=>'Novel','Circular'=>'Circular'                           
                                )); ?>
            </td>
            <td>
            <?php echo $form->label($model,'gc_content'); ?> <br/>
               <select id="mn_operator" name="gc_content_operator">
                    <option value=">=">&GreaterFullEqual;</option>
                    <option value="<=">&LessFullEqual;</option>                
                </select>
             <?php echo $form->textField($model,'gc_content',array('size'=>3,'maxlength'=>3)).'%'; ?>  
            </td>
            <td>
            <?php echo $form->label($model,'coding_potential'); ?> <br/>
            <select id="mn_operator" name="coding_potential_operator">
                    <option value=">=">&GreaterFullEqual;</option>
                    <option value="<=">&LessFullEqual;</option>                
                </select>
             <?php echo $form->textField($model,'coding_potential',array('size'=>5,'maxlength'=>5)); ?>    
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
               <?php echo $form->dropDownList($model,'polya_testis',
                            array('','TRUE'=>'TRUE','FALSE'=>'FALSE')); ?> 
            </td>
            <td>
            <?php echo $form->label($model,'dhs'); ?>  <br/>
                <?php echo $form->dropDownList($model,'dhs',
                            array('','TRUE'=>'TRUE','FALSE'=>'FALSE')); ?>   
            </td>
            <td>
            <?php echo $form->label($model,'cage'); ?>  <br/>
                <?php echo $form->dropDownList($model,'cage',
                            array('','TRUE'=>'TRUE','FALSE'=>'FALSE')); ?> 
            </td>
             <td>
            <?php echo $form->label($model,'conserved_elements'); ?>  <br/>
                <?php echo $form->dropDownList($model,'conserved_elements',
                            array('','TRUE'=>'TRUE','FALSE'=>'FALSE')); ?>   
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
         <table class="form-table" id="customFields">
	<tr valign="top">
		<td scope="row" width="15%"><label for="customFieldName">Histone Modifications</label></td>
		<td>
                        <select id="customFieldName" name="customFieldName[]">
                                <option selected="selected"></option>
                                <option value="h3k4me3_6d_kit_minus">H3K4me3    Neonatal    Kit-</option>
                                <option value="h3k4me3_6d_kit_add">H3K4me3    Neonatal    Kit+</option>
                                <option value="h3k4me3_8m_kit_minus">H3K4me3    Adult    Kit-</option>
                                <option value="h3k4me3_8m_kit_add">H3K4me3    Adult    Kit+</option>
                                <option value="h3k4me3_15m_kit_minus">H3K4me3    Old Adult    Kit-</option>
                                <option value="h3k4me3_15m_kit_add">H3K4me3    Old Adult    Kit+</option>
                                <option value="h3k27me3_6d_kit_minus">H3K27me3    Neonatal    Kit-</option>
                                <option value="h3k27me3_6d_kit_add">H3K27me3    Neonatal    Kit+</option>
                                <option value="h3k27me3_8m_kit_minus">H3K27me3    Adult    Kit-</option>
                                <option value="h3k27me3_8m_kit_add">H3K27me3    Adult    Kit+</option>
                                <option value="h3k27me3_15m_kit_minus">H3K27me3    Old Adult    Kit-</option>
                                <option value="h3k27me3_15m_kit_add">H3K27me3    Old Adult    Kit+</option>
                        </select>&nbsp;
                       
                        
                        <select id="customFieldopera" name="customFieldopera[]">
                             <option selected="selected" value=">=">&GreaterFullEqual;</option>
                             <option value="<=">&LessFullEqual;</option>            
                        </select>&nbsp;
			<input type="text" class="code" id="customFieldValue" name="customFieldValue[]" value="" placeholder="Input Value" /> &nbsp;
			<a href="javascript:void(0);" class="addCF">Add</a>
		</td>
	</tr>
        </table>
        
               <table class="form-table" id="customFields1">
	<tr valign="top">
		<td scope="row" width="15%"><label for="customFieldName1">5mC/5hmC Modifications</label></td>
		<td>
                        <select id="customFieldName1" name="customFieldName1[]">
                                <option selected="selected"></option>
                                <option value="hmc.promoter_6d_kit_minus">5hmC    Neonatal    Kit-   Promoter</option>
                                <option value="hmc.promoter_6d_kit_add">5hmC    Neonatal    Kit+    Promoter</option>
                                <option value="hmc.promoter_8m_kit_minus">5hmC    Adult    Kit-      Promoter</option>
                                <option value="hmc.promoter_8m_kit_add">5hmC    Adult    Kit+     Promoter</option>
                                <option value="hmc.promoter_15m_kit_minus">5hmC    Old Adult    Kit-    Promoter</option>
                                <option value="hmc.promoter_15m_kit_add">5hmC    Old Adult    Kit+    Promoter</option>
                                <option value="hmc.gene_body_6d_kit_minus">5hmC    Neonatal    Kit-      Gene body</option>
                                <option value="hmc.gene_body_6d_kit_add">5hmC    Neonatal    Kit+     Gene body</option>
                                <option value="hmc.gene_body_8m_kit_minus">5hmC    Adult    Kit-     Gene body</option>
                                <option value="hmc.gene_body_8m_kit_add">5hmC    Adult    Kit+      Gene body</option>
                                <option value="hmc.gene_body_15m_kit_minus">5hmC    Old Adult    Kit-      Gene body</option>
                                <option value="hmc.gene_body_15m_kit_add">5hmC    Old Adult    Kit+     Gene body</option>
                                <option value="mc.promoter_6d_kit_minus">5mC    Neonatal    Kit-   Promoter</option>
                                <option value="mc.promoter_6d_kit_add">5mC    Neonatal    Kit+    Promoter</option>
                                <option value="mc.promoter_8m_kit_minus">5mC    Adult    Kit-      Promoter</option>
                                <option value="mc.promoter_8m_kit_add">5mC    Adult    Kit+     Promoter</option>
                                <option value="mc.promoter_15m_kit_minus">5mC    Old Adult    Kit-    Promoter</option>
                                <option value="mc.promoter_15m_kit_add">5mC    Old Adult    Kit+    Promoter</option>
                                <option value="mc.gene_body_6d_kit_minus">5mC    Neonatal    Kit-      Gene body</option>
                                <option value="mc.gene_body_6d_kit_add">5mC    Neonatal    Kit+     Gene body</option>
                                <option value="mc.gene_body_8m_kit_minus">5mC    Adult    Kit-     Gene body</option>
                                <option value="mc.gene_body_8m_kit_add">5mC    Adult    Kit+      Gene body</option>
                                <option value="mc.gene_body_15m_kit_minus">5mC    Old Adult    Kit-      Gene body</option>
                                <option value="mc.gene_body_15m_kit_add">5mC    Old Adult    Kit+     Gene body</option>
                        </select>&nbsp;
                       
                        
                        <select id="customFieldopera1" name="customFieldopera1[]">
                             <option selected="selected" value=">=">&GreaterFullEqual;</option>
                             <option value="<=">&LessFullEqual;</option>            
                        </select>&nbsp;
			<input type="text" class="code" id="customFieldValue1" name="customFieldValue1[]" value="" placeholder="Input Value" /> &nbsp;
			<a href="javascript:void(0);" class="addCF1">Add</a>
		</td>
	</tr>
        </table>
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
              <table class="form-table" id="customFields2">
	<tr valign="top">
		<td scope="row" width="15%"><label for="customFieldName2">Expression</label></td>
		<td>
                        <select id="customFieldName1" name="customFieldName2[]">
                                <option selected="selected"></option>
                                <option value="rnaseq_6d_kit_minus">RNASEQ    Neonatal    Kit-   Promoter</option>
                                <option value="rnaseq_6d_kit_add">RNASEQ     Neonatal    Kit+    Promoter</option>
                                <option value="rnaseq_8m_kit_minus">RNASEQ     Adult    Kit-      Promoter</option>
                                <option value="rnaseq_8m_kit_add">RNASEQ     Adult    Kit+     Promoter</option>
                                <option value="rnaseq_15m_kit_minus">RNASEQ     Old Adult    Kit-    Promoter</option>
                                <option value="rnaseq_15m_kit_add">RNASEQ     Old Adult    Kit+    Promoter</option>
                        </select>&nbsp;
                       
                        
                        <select id="customFieldopera1" name="customFieldopera2[]">
                             <option selected="selected" value=">=">&GreaterFullEqual;</option>
                             <option value="<=">&LessFullEqual;</option>            
                        </select>&nbsp;
			<input type="text" class="code" id="customFieldValue2" name="customFieldValue2[]" value="" placeholder="Input Value" /> &nbsp;
			<a href="javascript:void(0);" class="addCF2">Add</a>
		</td>
	</tr>
        </table>
               <table>
                   <tr>
                       <td width="195">
                           <label>Expression Specificity</label>
                       </td>
                       <td width="100">
            <?php echo "Age Group" ?>  <br/>
             <select id="customFieldage" name="customFieldage">
                                <option selected="selected"></option>
                                <option value="Neonatal">Neonatal</option>
                                <option value="Young adult">Young adult</option>
                                <option value="Old adult">Old adult</option>
                        </select>
            </td>
                    <td>
            <?php echo "Cell Type"; ?>  <br/>
                <select id="customFieldcelltype" name="customFieldcelltype">
                                <option selected="selected"></option>
                                <option value="Kit-">Kit-</option>
                                <option value="Kit+">Kit+</option>
                        </select>
            </td>
                   </tr>        
               </table>
         <tr>
            <td colspan="9" align="center">
            <div class="divider">
                <h4>Predicted Functionality
                <a href="<?php echo Yii::app()->getHomeUrl(); ?>/site/page/view/glossary" target="_blank">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/help.png"  height="20" width="20"></img>
                </a>
                </h4>
            </div>  
            </td>
        </tr>
           <table>
                   <tr>
                     <td><?php echo $form->label($model,'small_rna'); ?> <br/><span style="font-size:10px;">E.g. Mir669a-1</span><br/>   
                <span style="font-size:12px;"></span><?php echo $form->textField($model,'small_rna',array('size'=>18,'maxlength'=>18)); ?>
            </td>
              <td><?php echo $form->label($model,'gene_symbol'); ?> <br/><span style="font-size:10px;">E.g. Abhd1</span><br/>   
                <span style="font-size:12px;"></span><?php echo $form->textField($model,'gene_symbol',array('size'=>18,'maxlength'=>18)); ?>
            </td>
              <td><?php echo $form->label($model,'ontology'); ?> <br/><span style="font-size:10px;">E.g. Wnt-protein binding</span><br/>   
                <span style="font-size:12px;"></span><?php echo $form->textField($model,'ontology',array('size'=>100,'maxlength'=>100)); ?>
            </td>
                   </tr>        
               </table>
 
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

        $(".addCF").click(function(){
		$("#customFields").append('<tr valign="top"><th scope="row"><label for="customFieldName">Histone Modifications</label></th><td><select id="customFieldName" name="customFieldName[]"><option selected="selected"></option><option value="h3k4me3_6d_kit_minus">H3K4me3    Neonatal    Kit-</option><option value="h3k4me3_6d_kit_add">H3K4me3    Neonatal    Kit+</option><option value="h3k4me3_8m_kit_minus">H3K4me3    Adult    Kit-</option><option value="h3k4me3_8m_kit_add">H3K4me3    Adult    Kit+</option><option value="h3k4me3_15m_kit_minus">H3K4me3    Old Adult    Kit-</option><option value="h3k4me3_15m_kit_add">H3K4me3    Old Adult    Kit+</option><option value="h3k27me3_6d_kit_minus">H3K27me3    Neonatal    Kit-</option><option value="h3k27me3_6d_kit_add">H3K27me3    Neonatal    Kit+</option><option value="h3k27me3_8m_kit_minus">H3K27me3    Adult    Kit-</option><option value="h3k27me3_8m_kit_add">H3K27me3    Adult    Kit+</option><option value="h3k27me3_15m_kit_minus">H3K27me3    Old Adult    Kit-</option><option value="h3k27me3_15m_kit_add">H3K27me3    Old Adult    Kit+</option></select>&nbsp<select id="customFieldopera" name="customFieldopera[]"><option selected="selected" value=">=">&GreaterFullEqual;</option><option value="<=">&LessFullEqual;</option></select>&nbsp\n\
         <input type="text" class="code" id="customFieldValue" name="customFieldValue[]" value="" placeholder="Input Value" /> &nbsp <a href="javascript:void(0);" class="remCF">Remove</a></td></tr>');
	
        
        
        });
    $("#customFields").on('click','.remCF',function(){
        $(this).parent().parent().remove();
    });
    
    
     $(".addCF1").click(function(){
		$("#customFields1").append('<tr valign="top"><th scope="row"><label for="customFieldName1">5mC/5hmC Modifications</label></th><td><select id="customFieldName1" name="customFieldName1[]"><option selected="selected"></option><option value="hmc.promoter_6d_kit_minus">5hmC    Neonatal    Kit-   Promoter</option><option value="hmc.promoter_6d_kit_add">5hmC    Neonatal    Kit+    Promoter</option><option value="hmc.promoter_8m_kit_minus">5hmC    Adult    Kit-      Promoter</option><option value="hmc.promoter_8m_kit_add">5hmC    Adult    Kit+     Promoter</option><option value="hmc.promoter_15m_kit_minus">5hmC    Old Adult    Kit-    Promoter</option><option value="hmc.promoter_15m_kit_add">5hmC    Old Adult    Kit+    Promoter</option><option value="hmc.gene_body_6d_kit_minus">5hmC    Neonatal    Kit-      Gene body</option><option value="hmc.gene_body_6d_kit_add">5hmC    Neonatal    Kit+     Gene body</option><option value="hmc.gene_body_8m_kit_minus">5hmC    Adult    Kit-     Gene body</option><option value="hmc.gene_body_8m_kit_add">5hmC    Adult    Kit+      Gene body</option><option value="hmc.gene_body_15m_kit_minus">5hmC    Old Adult    Kit-      Gene body</option><option value="hmc.gene_body_15m_kit_add">5hmC    Old Adult    Kit+     Gene body</option><option value="mc.promoter_6d_kit_minus">5mC    Neonatal    Kit-   Promoter</option><option value="mc.promoter_6d_kit_add">5mC    Neonatal    Kit+    Promoter</option><option value="mc.promoter_8m_kit_minus">5mC    Adult    Kit-      Promoter</option><option value="mc.promoter_8m_kit_add">5mC    Adult    Kit+     Promoter</option><option value="mc.promoter_15m_kit_minus">5mC    Old Adult    Kit-    Promoter</option><option value="mc.promoter_15m_kit_add">5mC    Old Adult    Kit+    Promoter</option><option value="mc.gene_body_6d_kit_minus">5mC    Neonatal    Kit-      Gene body</option><option value="mc.gene_body_6d_kit_add">5mC    Neonatal    Kit+     Gene body</option><option value="mc.gene_body_8m_kit_minus">5mC    Adult    Kit-     Gene body</option><option value="mc.gene_body_8m_kit_add">5mC    Adult    Kit+      Gene body</option><option value="mc.gene_body_15m_kit_minus">5mC    Old Adult    Kit-      Gene body</option><option value="mc.gene_body_15m_kit_add">5mC    Old Adult    Kit+     Gene body</option></select>&nbsp \n\
        <select id="customFieldopera1" name="customFieldopera1[]"><option selected="selected" value=">=">&GreaterFullEqual;</option><option value="<=">&LessFullEqual;</option>            </select>&nbsp<input type="text" class="code" id="customFieldValue1" name="customFieldValue1[]" value="" placeholder="Input Value" /> &nbsp<a href="javascript:void(0);" class="remCF1">Remove</a></td></tr>');
	
        
        
        });
    $("#customFields1").on('click','.remCF1',function(){
        $(this).parent().parent().remove();
    });
    
      $(".addCF2").click(function(){
		$("#customFields2").append('<tr valign="top"><th scope="row"><label for="customFieldName2">Expression</label></th><td><select id="customFieldName2" name="customFieldName2[]"><option selected="selected"></option><option value="rnaseq_6d_kit_minus">RNASEQ    Neonatal    Kit-   Promoter</option><option value="rnaseq_6d_kit_add">RNASEQ     Neonatal    Kit+    Promoter</option><option value="rnaseq_8m_kit_minus">RNASEQ     Adult    Kit-      Promoter</option><option value="rnaseq_8m_kit_add">RNASEQ     Adult    Kit+     Promoter</option><option value="rnaseq_15m_kit_minus">RNASEQ     Old Adult    Kit-    Promoter</option><option value="rnaseq_15m_kit_add">RNASEQ     Old Adult    Kit+    Promoter</option></select> \n\
        <select id="customFieldopera2" name="customFieldopera2[]"><option selected="selected" value=">=">&GreaterFullEqual;</option><option value="<=">&LessFullEqual;</option></select>&nbsp<input type="text" class="code" id="customFieldValue2" name="customFieldValue2[]" value="" placeholder="Input Value" /> &nbsp<a href="javascript:void(0);" class="remCF2">Remove</a></td></tr>');
	
        
        
        });
    $("#customFields2").on('click','.remCF2',function(){
        $(this).parent().parent().remove();
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
