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
        );
    }
    public function getrefseq(){
        
        $ret = "";
        $first = true;

    foreach ($this->transRegulations as $record) {

        if ($first === true) {
            $first = false;
        } else {
            $ret .= ', ';
        }

        $ret .= $record->coding_gene_refseq_id;
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
        );
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

        
        $criteria=new CDbCriteria;
                
      
        if (!isset($_GET['GenomicInfo'])){
                    //show empty data at the beginning
        $criteria->compare(1,2,true);
        }
        
        else{   
            
        if (isset($_GET['GenomicInfo']['coding_gene_refseq_id'])){
        $model1 = TransRegulation::model()->findByAttributes(array('coding_gene_refseq_id'=>$_GET['GenomicInfo']['coding_gene_refseq_id']));
        $this->sscagelncrna_id=$model1->sscagelncrna_id;
        }
        if (isset($_GET['GenomicInfo']['coding_gene_symbol']) && !empty($_GET['GenomicInfo']['coding_gene_symbol'])){
                    //show empty data at the beginning
        $model1 = TransRegulation::model()->findAllByAttributes(array('coding_gene_symbol'=>  trim($_GET['GenomicInfo']['coding_gene_symbol'])));
        $ids=array();
        foreach($model1 as $model11)
        {
          $ids[]=$model11->sscagelncrna_id;
         
        }
        $criteria->addInCondition('sscagelncrna_id', $ids);
        }
        
        $criteria->compare('id',$this->id);
        $criteria->compare('sscagelncrna_id',$this->sscagelncrna_id,true);
        $criteria->compare('ensembltranscript_id',$this->ensembltranscript_id,true);
        $criteria->compare('ensemblgene_id',$this->ensemblgene_id,true);
        $criteria->compare('chromsome',$this->chromsome,true);
        $criteria->compare('transcription_start',$this->transcription_start);
        $criteria->compare('transcription_end',$this->transcription_end);
        $criteria->compare('strand',$this->strand,true);
        $criteria->compare('transcript_length',$this->transcript_length);
        $criteria->compare('gc_content',$this->gc_content);
        $criteria->compare('number_of_exons',$this->number_of_exons);
        $criteria->compare('size_of_exons',$this->size_of_exons,true);
        $criteria->compare('start_position_of_exons',$this->start_position_of_exons,true);
        $criteria->compare('genomicfeature',$this->genomicfeature,true);
        $criteria->compare('lncrna_type',$this->lncrna_type,true);
        $criteria->compare('coding_potential',$this->coding_potential);
        $criteria->compare('secondary_structure',$this->secondary_structure,true);
       
        }
        echo $this->transRegulations->coding_gene_refseq_id;
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