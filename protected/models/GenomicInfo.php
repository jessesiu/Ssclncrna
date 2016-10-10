<?php

/**
 * This is the model class for table "genomic_info".
 *
 * The followings are the available columns in table 'genomic_info':
 * @property integer $id
 * @property string $sscagelncrna_id
 * @property string $ensembltranscript_id
 * @property string $ensemblgene_id
 * @property string $chromsome
 * @property integer $transcription_start
 * @property integer $transcription_end
 * @property string $strand
 * @property integer $transcript_length
 * @property double $gc_content
 * @property integer $number_of_exons
 * @property string $size_of_exons
 * @property string $start_position_of_exons
 * @property string $genomicfeature
 * @property string $lncrna_type
 * @property double $coding_potential
 * @property string $secondary_structure
 *
 * The followings are the available model relations:
 * @property TransRegulation[] $transRegulations
 * @property ExpressionData[] $expressionDatas
 * @property CisRegulation[] $cisRegulations
 * @property RegulatoryFeatures[] $regulatoryFeatures
 * @property HistoneModifications[] $histoneModifications
 * @property HistoneModificationDetails[] $histoneModificationDetails
 * @property McModifications[] $mcModifications
 * @property HmcModifications[] $hmcModifications
 * @property McHmcDetails[] $mcHmcDetails
 * @property CoExpression[] $coExpressions
 * @property SmallRnaPrecursors[] $smallRnaPrecursors
 */
class GenomicInfo extends CActiveRecord
{
    public $coding_gene_refseq_id;
    public $transRegulation_search;
    public $coding_gene_symbol;
    public $polya_testis;
    public $dhs;
    public $cage;
    public $conserved_elements;
    public $small_rna;
    public $gene_symbol;
    public $ontology;
    
    
    
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'genomic_info';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('transcription_start, transcription_end, transcript_length, number_of_exons', 'numerical', 'integerOnly'=>true),
            array('gc_content, coding_potential', 'numerical'),
            array('sscagelncrna_id, ensembltranscript_id, ensemblgene_id, chromsome, strand, size_of_exons, start_position_of_exons, genomicfeature, lncrna_type', 'length', 'max'=>50),
            array('secondary_structure', 'length', 'max'=>2000),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, sscagelncrna_id, ensembltranscript_id, ensemblgene_id, chromsome, transcription_start, transcription_end, strand, transcript_length, gc_content, number_of_exons, size_of_exons, start_position_of_exons, genomicfeature, lncrna_type, coding_potential, secondary_structure,coding_gene_refseq_id,transRegulations.coding_gene_refseq_id', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'transRegulations' => array(self::HAS_MANY, 'TransRegulation', 'sscagelncrna_id'),
            'expressionDatas' => array(self::HAS_MANY, 'ExpressionData', 'sscagelncrna_id'),
            'cisRegulations' => array(self::HAS_MANY, 'CisRegulation', 'sscagelncrna_id'),
            'regulatoryFeatures' => array(self::HAS_MANY, 'RegulatoryFeatures', 'sscagelncrna_id'),
            'histoneModifications' => array(self::HAS_MANY, 'HistoneModifications', 'sscagelncrna_id'),
            'histoneModificationDetails' => array(self::HAS_MANY, 'HistoneModificationDetails', 'sscagelncrna_id'),
            'mcModifications' => array(self::HAS_MANY, 'McModifications', 'sscagelncrna_id'),
            'hmcModifications' => array(self::HAS_MANY, 'HmcModifications', 'sscagelncrna_id'),
            'mcHmcDetails' => array(self::HAS_MANY, 'McHmcDetails', 'sscagelncrna_id'),
            'coExpressions' => array(self::HAS_MANY, 'CoExpression', 'sscagelncrna_id'),
            'smallRnaPrecursors' => array(self::HAS_MANY, 'SmallRnaPrecursors', 'sscagelncrna_id'),
            'symbol' => array(self::HAS_MANY, 'Symbol', 'sscagelncrna_id'),
        );
    }
    public function getrefseq(){
        
        $ret = "";
        $first = true;
        $second = true;
        $num= count($this->transRegulations);
        $short="";
        $flag=0;
        
        foreach ($this->transRegulations as $record) {
            if($flag>=5)
            {
                break;
            }
        if ($first === true) {
            $first = false;
        } else {
            $short .= ', ';
        }

        $short .= $record->coding_gene_refseq_id;
        $flag++;
    }

    foreach ($this->transRegulations as $record) {

        if ($second === true) {
            $second = false;
        } else {
            $ret .= ', ';
        }

        $ret .= $record->coding_gene_refseq_id;
    }

    if($num>5)
    {
          return <<<HTML
		<span class="js-short-$this->id">$short</span>
        		<span class="js-long-$this->id" style="display: none;">$ret</span>
                <a href='#' class='js-desc' data='$this->id'>+</a>
HTML;
    }else
    {
        return <<<HTML
        		<span class="js-long-$this->id">$ret</span>
HTML;
    }
        
    }
    
    public function getgenesymbol(){
        
         $ret = "";
        $first = true;

    foreach ($this->transRegulations as $record) {

        if ($first === true) {
            $first = false;
        } else {
            $ret .= ', ';
        }

        $ret .= $record->coding_gene_symbol;
    }

    return $ret;  
        
        
    }
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'sscagelncrna_id' => 'Sscagelncrna',
            'coding_gene_refseq_id'=>'RefSeq',
            'coding_gene_symbol'=>'Gene symbol',
            'ensembltranscript_id' => 'Ensembl',
            'ensemblgene_id' => 'Ensemblgene',
            'chromsome' => 'Chromsome',
            'transcription_start' => 'Transcription Start',
            'transcription_end' => 'Transcription End',
            'strand' => 'Strand',
            'transcript_length' => 'Transcript Length',
            'gc_content' => 'Gc Content',
            'number_of_exons' => 'Number Of Exons',
            'size_of_exons' => 'Size Of Exons',
            'start_position_of_exons' => 'Start Position Of Exons',
            'genomicfeature' => 'Genomicfeature',
            'lncrna_type' => 'Lncrna Type',
            'coding_potential' => 'Coding Potential',
            'secondary_structure' => 'Secondary Structure',
            'polya_testis'=>'Poly A',
            'cage'=>'CAGE',
            'dhs'=>'DHS',
            'conserved_elements'=>'Conserved element',
            'small_rna'=>'Small RNA',
            'gene_symbol'=>'Gene Symbol',
            'ontology'=>'Gene Ontology'
      
            
        );
    }
    
    
    public function attributeLabels_selected(array $columns){
            
            $columns_selected =array();
            if (in_array('sscagelncrna_id',$columns)) array_push($columns_selected,'GlncRNA');
            if (in_array('ensembl',$columns)) array_push($columns_selected,'Ensembl'); 
            if (in_array('noncode',$columns)) array_push($columns_selected,'NONCODE');                   
            if (in_array('ucsc',$columns)) array_push($columns_selected,'UCSC Genes');
            if (in_array('frnadb',$columns)) array_push($columns_selected,'fRNAdb');
            if (in_array('refseq',$columns)) array_push($columns_selected,'RefSeq');   
            
            
            
             return $columns_selected;
            
            
            
            
            
        }
    
    
    

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

       // $conditions=array();
        //$conditions[] ="1=1";
        $criteria=new CDbCriteria;
       
        $criteria->join ="LEFT JOIN regulatory_features on regulatory_features.sscagelncrna_id=t.sscagelncrna_id LEFT JOIN histone_modifications on histone_modifications.sscagelncrna_id=t.sscagelncrna_id "
                . "LEFT JOIN hmc_modifications on hmc_modifications.sscagelncrna_id=t.sscagelncrna_id LEFT JOIN mc_modifications on mc_modifications.sscagelncrna_id=t.sscagelncrna_id "
                . "LEFT JOIN expression_data on expression_data.sscagelncrna_id=t.sscagelncrna_id LEFT JOIN small_rna_precursors on small_rna_precursors.sscagelncrna_id=t.sscagelncrna_id "
                . "LEFT JOIN trans_regulation on trans_regulation.sscagelncrna_id=t.sscagelncrna_id LEFT JOIN cis_regulation on cis_regulation.sscagelncrna_id=t.sscagelncrna_id "
        . "LEFT JOIN co_expression on co_expression.sscagelncrna_id=t.sscagelncrna_id";   
      
      
        if (!isset($_GET['GenomicInfo'])){
                    //show empty data at the beginning
        $criteria->compare(1,2,true);
        }
        
        else{   
        if (isset($_GET['GenomicInfo']['sscagelncrna_id'])&& !empty($_GET['GenomicInfo']['sscagelncrna_id']))   {
            
        $this->sscagelncrna_id=$_GET['GenomicInfo']['sscagelncrna_id'];
            
        }
        if (isset($_GET['GenomicInfo']['chromsome'])&& !empty($_GET['GenomicInfo']['chromsome']))   {
            
        $this->chromsome=$_GET['GenomicInfo']['chromsome'];
            
        }
        if (isset($_GET['GenomicInfo']['number_of_exons'])&& !empty($_GET['GenomicInfo']['number_of_exons']))   {
            
        $this->number_of_exons=$_GET['GenomicInfo']['number_of_exons'];
            
        }
        if (isset($_GET['GenomicInfo']['genomicfeature'])&& !empty($_GET['GenomicInfo']['genomicfeature']))   {
            
        $this->genomicfeature=$_GET['GenomicInfo']['genomicfeature'];
            
        }
        if (isset($_GET['GenomicInfo']['lncrna_type'])&& !empty($_GET['GenomicInfo']['lncrna_type']))   {
            
        $this->lncrna_type=$_GET['GenomicInfo']['lncrna_type'];
            
        }
        if (isset($_GET['GenomicInfo']['gc_content'])&& !empty($_GET['GenomicInfo']['gc_content']))   {
            
         $this->gc_content=$_GET['GenomicInfo']['gc_content'];
         $gc_content_operator = $_GET['gc_content_operator'];
         $criteria->compare('gc_content',$gc_content_operator.''.$this->gc_content);
            
        }
        
        if (isset($_GET['GenomicInfo']['coding_potential'])&& !empty($_GET['GenomicInfo']['coding_potential']))   {
            
         $this->coding_potential=$_GET['GenomicInfo']['coding_potential'];
         $coding_potential_operator = $_GET['coding_potential_operator'];
         $criteria->compare('coding_potential',$coding_potential_operator.''.$this->coding_potential);
            
        }
        
            
        if (isset($_GET['GenomicInfo']['coding_gene_refseq_id']) && !empty($_GET['GenomicInfo']['coding_gene_refseq_id'])){
        $model1 = TransRegulation::model()->findAllByAttributes(array('coding_gene_refseq_id'=>$_GET['GenomicInfo']['coding_gene_refseq_id']));
        $ids1=array();

        foreach($model1 as $model11)
        {
          $ids1[]=$model11->sscagelncrna_id;
         
        }
        $criteria->addInCondition('t.sscagelncrna_id', $ids1);
        }
        if (isset($_GET['GenomicInfo']['coding_gene_symbol']) && !empty($_GET['GenomicInfo']['coding_gene_symbol'])){
                    //show empty data at the beginning
        $model1 = TransRegulation::model()->findAllByAttributes(array('coding_gene_symbol'=>  trim($_GET['GenomicInfo']['coding_gene_symbol'])));
        $ids=array();

        foreach($model1 as $model11)
        {
          $ids[]=$model11->sscagelncrna_id;
         
        }
        $criteria->addInCondition('t.sscagelncrna_id', $ids);
        }
        
        if (isset($_GET['GenomicInfo']['polya_testis']) && !empty($_GET['GenomicInfo']['polya_testis'])){
        $polya_testis=    $_GET['GenomicInfo']['polya_testis'];
        //$conditions[]= "regulatory_features.polya_testis = :polya_testis ";
        $criteria->compare('regulatory_features.polya_testis',$polya_testis,true);
       // $criteria->params = array(":polya_testis" => $polya_testis);
       // $criteria->params = array(":polya_testis" => $polya_testis);    
        
        }
        
        if (isset($_GET['GenomicInfo']['dhs']) && !empty($_GET['GenomicInfo']['dhs'])){
        $dhs=$_GET['GenomicInfo']['dhs'];
        $criteria->compare('regulatory_features.dhs',$dhs,true);
         
        }
      
        if (isset($_GET['GenomicInfo']['cage']) && !empty($_GET['GenomicInfo']['cage'])){
        $cage=$_GET['GenomicInfo']['cage'];
        $criteria->compare('regulatory_features.cage',$cage,true);
        }
        
        
        if (isset($_GET['GenomicInfo']['conserved_elements']) && !empty($_GET['GenomicInfo']['conserved_elements'])){
          $conserved_elements=$_GET['GenomicInfo']['conserved_elements'];
          $criteria->compare('regulatory_features.conserved_elements',$conserved_elements,true);
        }
        
         if (isset($_GET['customFieldName']) && !empty($_GET['customFieldName'])){
          $histon=array();
          $histonvalue=array();
          $histonopera=array();
          $histon=$_GET['customFieldName'];
          $histonvalue=$_GET['customFieldValue'];
          $histonopera=$_GET['customFieldopera'];
          for($int=0;$int<count($histon);$int++)
          {
          //echo "histone_modifications.$histon[$int]"."$histonopera[$int]".''.$histonvalue[$int];
          $criteria->compare("histone_modifications.$histon[$int]","$histonopera[$int]".''.$histonvalue[$int]);
              
          }
          
        }
        
         if (isset($_GET['customFieldName1']) && !empty($_GET['customFieldName1'])){
          $histon=array();
          $histonvalue=array();
          $histonopera=array();
          $histon=$_GET['customFieldName1'];
          $histonvalue=$_GET['customFieldValue1'];
          $histonopera=$_GET['customFieldopera1'];
          for($int=0;$int<count($histon);$int++)
          {
          //echo "histone_modifications.$histon[$int]"."$histonopera[$int]".''.$histonvalue[$int];
              $temp=explode(".", $histon[$int]);
              if($temp[0] === "hmc"){
                $criteria->compare("hmc_modifications.$temp[1]","$histonopera[$int]".''.$histonvalue[$int]);
              }
              else{
                $criteria->compare("mc_modifications.$temp[1]","$histonopera[$int]".''.$histonvalue[$int]);  
              }
              
          }
          
        }
        if (isset($_GET['customFieldName2']) && !empty($_GET['customFieldName2'])){
          $histon=array();
          $histonvalue=array();
          $histonopera=array();
          $histon=$_GET['customFieldName2'];
          $histonvalue=$_GET['customFieldValue2'];
          $histonopera=$_GET['customFieldopera2'];
          for($int=0;$int<count($histon);$int++)
          {
          //echo "histone_modifications.$histon[$int]"."$histonopera[$int]".''.$histonvalue[$int];
                
                $criteria->compare("expression_data.$histon[$int]","$histonopera[$int]".''.$histonvalue[$int]);
            
              
          }
          
        }
         if (isset($_GET['customFieldage']) && !empty($_GET['customFieldage'])){
         
            if (isset($_GET['customFieldcelltype']) && !empty($_GET['customFieldcelltype']))
            {
                $compare_value=$_GET['customFieldage'].", ".$_GET['customFieldcelltype'];
                $criteria->compare("expression_data.expression_specificity",$compare_value);
            }
            else
            {
                $compare_value=$_GET['customFieldage'];
                $criteria->compare("expression_data.expression_specificity",$compare_value);
            }
          //echo "histone_modifications.$histon[$int]"."$histonopera[$int]".''.$histonvalue[$int];
             
          }
          if (isset($_GET['customFieldcelltype']) && !empty($_GET['customFieldcelltype'])){
         
            if (isset($_GET['customFieldage']) && !empty($_GET['customFieldage']))
            {
                $compare_value=$_GET['customFieldage'].", ".$_GET['customFieldcelltype'];
                $criteria->compare("expression_data.expression_specificity",$compare_value);
            }
            else
            {
                $compare_value=$_GET['customFieldcelltype'];
                $criteria->compare("expression_data.expression_specificity",$compare_value);
            }
          //echo "histone_modifications.$histon[$int]"."$histonopera[$int]".''.$histonvalue[$int];
             
          }
        if (isset($_GET['GenomicInfo']['small_rna']) && !empty($_GET['GenomicInfo']['small_rna'])){
        $small_rna=$_GET['GenomicInfo']['small_rna'];
        $criteria->compare('small_rna_precursors.small_rna',$small_rna);
         
        }
         if (isset($_GET['GenomicInfo']['gene_symbol']) && !empty($_GET['GenomicInfo']['gene_symbol'])){
        $gene_symbol=$_GET['GenomicInfo']['gene_symbol'];
        $criteria->compare('trans_regulation.coding_gene_symbol',$gene_symbol);
         
        }
        
         if (isset($_GET['GenomicInfo']['ontology']) && !empty($_GET['GenomicInfo']['ontology'])){
             $connection=Yii::app()->db;/*
        $connection=Yii::app()->db;
        $ontology=$_GET['GenomicInfo']['ontology'];
        $ids=array();
        
        $model1 = GeneOntology::model()->findAll(array('condition'=>'ontology LIKE :ONTOLOGY','params'=>array(':ONTOLOGY'=>"%$ontology%")));
        foreach($model1 as $model11)
        {
           $sql="select sscagelncrna_id from cis_regulation where coding_gene_refseq_id=:value";
           $command=$connection->createCommand($sql);
           $command->bindParam(":value",$model11->coding_gene_refseq_id,PDO::PARAM_STR); 
           $rows=$command->queryAll();
           foreach ($rows as $row) {
               
               $ids[]=$row;
           }
         
           $sql2="select sscagelncrna_id from trans_regulation where coding_gene_refseq_id=:value";
           $command=$connection->createCommand($sql2);
           $command->bindParam(":value",$model11->coding_gene_refseq_id,PDO::PARAM_STR); 
           $rows2=$command->queryAll();
           
            foreach ($rows2 as $row) {
               
               $ids[]=$row;
           }
           
           $sql3="select sscagelncrna_id from co_expression where coding_gene_refseq_id=:value";
           $command=$connection->createCommand($sql3);
           $command->bindParam(":value",$model11->coding_gene_refseq_id,PDO::PARAM_STR); 
           $rows3=$command->queryAll();
           
            foreach ($rows3 as $row) {
               
               $ids[]=$row;
           }
        /*    
         $model21 = CisRegulation::model()->findAll(array('condition'=>'coding_gene_refseq_id = :ONTOLOGY','params'=>array(':ONTOLOGY'=>$refseq)));
         $model22 = TransRegulation::model()->findAll(array('condition'=>'coding_gene_refseq_id = :ONTOLOGY','params'=>array(':ONTOLOGY'=>$refseq)));
         $model23 = CoExpression::model()->findAll(array('condition'=>'coding_gene_refseq_id = :ONTOLOGY','params'=>array(':ONTOLOGY'=>$refseq)));
        
         
       
          if(!empty($model21)){
         foreach($model21 as $model211)
         {
            $ids[]=$model211->sscagelncrna_id;
         }
          }
           if(!empty($model22)){
         foreach($model22 as $model221)
         {
            $ids[]=$model221->sscagelncrna_id;
         }
           }
             if(!empty($model23)){
         foreach($model23 as $model231)
         {
            $ids[]=$model231->sscagelncrna_id;
         }
             }
        
         
        }
          * */
        $ids1=array();     
        $ontology= "%".$_GET['GenomicInfo']['ontology']."%";    
        $sql="select DISTINCT symbol.sscagelncrna_id from symbol, gene_ontology where symbol.coding_gene_refseq_id=gene_ontology.coding_gene_refseq_id and gene_ontology.ontology like :ontology";
        $command=$connection->createCommand($sql);
        $command->bindParam(":ontology",$ontology,PDO::PARAM_STR); 
        $rows=$command->queryAll();
 
        
        foreach($rows as $row)
        {
           $ids1[]=$row[sscagelncrna_id];
          // $criteria->compare('symbol.sscagelncrna_id',$row[sscagelncrna_id]);
        }
        if(count($ids1)>500)
        {
            echo 'Too many result. Please refine your search criteria.';
        }
           $ids1=array_slice($ids1,0,500);
           $criteria->addInCondition('t.sscagelncrna_id', $ids1);
        //print_r($ids);
               
        }
        //GO: molecular_function|biological_process|transport|cellular_component|cytoplasmic
        //print_r($conditions);
        $criteria->compare('id',$this->id);
        $criteria->compare('t.sscagelncrna_id',$this->sscagelncrna_id,true);
        $criteria->compare('ensembltranscript_id',$this->ensembltranscript_id,true);
        $criteria->compare('ensemblgene_id',$this->ensemblgene_id,true);
        $criteria->compare('t.chromsome',$this->chromsome);
        $criteria->compare('transcription_start',$this->transcription_start);
        $criteria->compare('transcription_end',$this->transcription_end);
        $criteria->compare('strand',$this->strand,true);
        $criteria->compare('transcript_length',$this->transcript_length);
       
        $criteria->compare('number_of_exons',$this->number_of_exons);
        $criteria->compare('size_of_exons',$this->size_of_exons,true);
        $criteria->compare('start_position_of_exons',$this->start_position_of_exons,true);
        $criteria->compare('genomicfeature',$this->genomicfeature,true);
        $criteria->compare('lncrna_type',$this->lncrna_type,true);
        
        $criteria->compare('secondary_structure',$this->secondary_structure,true);
        $criteria->group='t.sscagelncrna_id';
        $criteria->order='t.id';
       // $criteria->addCondition=implode($conditions,'AND');
       print_r( $criteria);
       
        }
      
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'pagination' => array(
                            'pageSize' => 30,
                ),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return GenomicInfo the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
     public function savetofile()
        {

            Yii::import('ext.ECSVExport');
            $filename = dirname(__FILE__).'/../../bedfiles/csvtab.txt';
            $data= $this->search(); 
            
            //$columns_all=$this->getAttributes();
            //$columns_exclude=array_diff($columns_all, $columns);
            
            $csv = new ECSVExport($data);
            //$csv->setExclude($columns_exclude);
            $csv->toCSV($filename);    

            //$content=$csv->toCSV();
            //Yii::app()->getRequest()->sendFile($filename, $content, "text/csv", false);
        }      
}