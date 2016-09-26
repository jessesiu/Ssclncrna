<?php

class SslncrnaController extends Controller
{
    public function actionIndex()
    {
        $this->render('index');
    }
    
    
    public function actionAdmin()
    {
         
        $model=new GenomicInfo('search');
        $model->unsetAttributes();
       // $model->transRegulations= new TransRegulation();
        
      
         if(isset($_GET["GenomicInfo"])){
                       
			$model->attributes=$_GET["GenomicInfo"]; 
                        //$model->transRegulations=$_GET["TransRegulation"];
                       // $model->blast= $_GET["Glncrna"]["blast"];
                       // $model->blastnum= $_GET["Glncrna"]["blastnum"];
                               
                        //var_dump($_GET["Glncrna"]);
                        //print_r ($model->attributes);
                        print_r($model);
                     
                }
        $columns=array_keys(array(             
                        'sscagelncrna_id' => 'SSClncRNA',
			//'ensembl' => 'Ensembl',
			//'noncode' => 'NONCODE',
			//'ucsc' => 'UCSC Genes',
			//'frnadb' => 'fRNAdb',
			'ensembltranscript_id' => 'Ensembl ID',
			'ensemblgene_id' => 'RefSeq ID',
			'chromsome' => 'Chromsome',
                        'coding_gene_refseq_id'=>'Coding gene refseq ID',
			//'loc_strand' => 'Strand',
			//'loc_lncrna_length' => 'lncRNA Length',
                        //'loc_type'=>'Type'
                        //'sage_spermatogonia' => 'SAGE Spermatogonia',
			//'sage_spermatocyte' => 'SAGE Spermatocyte',
			//'sage_spermatid' => 'SAGE Spermatid'
            ));
        
       
        $this->render('admin',array(
                    'model'=>$model,
                    'columns'=>$columns,));
        
    }

    // Uncomment the following methods and override them if needed
    /*
    public function filters()
    {
        // return the filter configuration for this controller, e.g.:
        return array(
            'inlineFilterName',
            array(
                'class'=>'path.to.FilterClass',
                'propertyName'=>'propertyValue',
            ),
        );
    }

    public function actions()
    {
        // return external action classes, e.g.:
        return array(
            'action1'=>'path.to.ActionClass',
            'action2'=>array(
                'class'=>'path.to.AnotherActionClass',
                'propertyName'=>'propertyValue',
            ),
        );
    }
    */
}
