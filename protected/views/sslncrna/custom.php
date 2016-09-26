<div class="custom-form">
    <div class="wide form">
        <div class="row">
        <!--Annotation Section-->
        <div class="divider"><h4>Annotation<a href="<?php echo Yii::app()->getHomeUrl(); ?>/site/page/view/glossary" target="_blank">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/help.png"  height="20" width="20"></img>
                </a></h4></div>
        <?php     
        $columns_annotation = array('glncrna_id','ensembl','noncode','ucsc','frnadb','refseq');
        $columns_annotation_label=$model->attributeLabels_selected($columns_annotation);
        echo CHtml::checkBoxList('Columns',
                array('glncrna_id'),
                array_combine($columns_annotation,$columns_annotation_label),
                array('template'=>'<div class="col6"><div class="row"><tr>{label}</tr><tr>{input}</tr></div></div>',
                      'id'=>'columns',
                      'separator'=>'',
                      )
                );     
        ?>
        <!--Genomic Location Section-->
        <div class="divider"><h4>lncRNA Type and Genomic Features<a href="<?php echo Yii::app()->getHomeUrl(); ?>/site/page/view/glossary" target="_blank">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/help.png"  height="20" width="20"></img>
                </a></h4></div>
        <?php     
        $columns_location = array('annotated_or_novel','evidence_level','loc_chromosome','loc_start_position',
            'loc_end_position','loc_strand','loc_lncrna_length' ,'loc_type','loc_number_of_exons','loc_size_of_exons' ,
            'loc_exon_start_position'
        );
        $columns_location_label=$model->attributeLabels_selected($columns_location);
        echo CHtml::checkBoxList('Columns',
                array('loc_chromosome','loc_start_position','loc_end_position','loc_strand','loc_type'),
                array_combine($columns_location,$columns_location_label),
                array('template'=>'<div class="col5"><div class="row"><tr>{label}</tr><tr>{input}</tr></div></div>',
                      'id'=>'columns',
                      'separator'=>'',
                      )
                );     
        ?>
        <!--Regulation Section-->
        <div class="divider">
            <h4>Regulation
                <a href="<?php echo Yii::app()->getHomeUrl(); ?>/site/page/view/glossary" target="_blank">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/help.png"  height="20" width="20"></img>
                </a>
            </h4>
        </div>
        <?php     
        $columns_regulation = array('er_poly_a_tail','er_poly_a_other_tissues','er_dnasei_hsr' ,'er_cage',
            'er_h3k4me1','er_h3k4me3','er_h3k27ac','er_h3k27me3','er_h3k36me3','cis_regulation','trans_regulation','predicted_microRNA','chipbase');
        $columns_regulation_label=$model->attributeLabels_selected($columns_regulation);
        echo CHtml::checkBoxList('Columns',
                array(''),
                array_combine($columns_regulation,$columns_regulation_label),
                array('template'=>'<div class="col5"><div class="row"><tr>{label}</tr><tr>{input}</tr></div></div>',
                      'id'=>'columns',
                      'separator'=>'',
                      )
                );     
        ?>
        <!--Expression Data Section-->
        <div class="divider">
            <h4>Expression Data
                <a href="<?php echo Yii::app()->getHomeUrl(); ?>/site/page/view/glossary" target="_blank">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/help.png"  height="20" width="20"></img>
                </a>
            </h4>
        </div>
        <?php
        $columns_expression = array(            
            'rnaseq_spermatogonia' ,'rnaseq_spermatocyte','rnaseq_spermatid','stage_specific',  
            'sage_spermatogonia','sage_spermatocyte','sage_spermatid','sage_tag_seq',
            'microarray_neonatal','microarray_adult' 
        );
        $columns_expression_label=$model->attributeLabels_selected($columns_expression);
        echo CHtml::checkBoxList('Columns',
                array(''),
                array_combine($columns_expression,$columns_expression_label),
                array('template'=>'<div class="col4"><div class="row"><tr>{label}</tr><tr>{input}</tr></div></div>',
                      'id'=>'columns',
                      'separator'=>'',
                      )
                );
        ?> 
        
        <!--Noncoding expression Data Section-->
        <div class="divider">
            <h4>Expression Profile
                <a href="<?php echo Yii::app()->getHomeUrl(); ?>/site/page/view/glossary" target="_blank">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/help.png"  height="20" width="20"></img>
                </a>
            </h4>
        </div>
        <?php
        $columns_expression = array(            
            'heart','hippocampus','liver','lung','spleen','thymus','expression' 
        );
        $columns_expression_label=$model->attributeLabels_selected($columns_expression);
        echo CHtml::checkBoxList('Columns',
                array(''),
                array_combine($columns_expression,$columns_expression_label),
                array('template'=>'<div class="col4"><div class="row"><tr>{label}</tr><tr>{input}</tr></div></div>',
                      'id'=>'columns',
                      'separator'=>'',
                      )
                );
        ?> 
    </div>
    </div><!--wide form -->

</div><!-- custom-form -->