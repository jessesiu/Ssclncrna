<?php

/**
 * This is the model class for table "gene_ontology".
 *
 * The followings are the available columns in table 'gene_ontology':
 * @property integer $id
 * @property string $coding_gene_refseq_id
 * @property string $ontology
 *
 * The followings are the available model relations:
 * @property CisRegulation[] $cisRegulations
 * @property CoExpression[] $coExpressions
 * @property TransRegulation[] $transRegulations
 * @property MirnaCodingGenes[] $mirnaCodingGenes
 */
class GeneOntology extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'gene_ontology';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('coding_gene_refseq_id', 'length', 'max'=>50),
            array('ontology', 'length', 'max'=>2000),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, coding_gene_refseq_id, ontology', 'safe', 'on'=>'search'),
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
            'cisRegulations' => array(self::HAS_MANY, 'CisRegulation', 'coding_gene_refseq_id'),
            'coExpressions' => array(self::HAS_MANY, 'CoExpression', 'coding_gene_refseq_id'),
            'transRegulations' => array(self::HAS_MANY, 'TransRegulation', 'coding_gene_refseq_id'),
            'mirnaCodingGenes' => array(self::HAS_MANY, 'MirnaCodingGenes', 'coding_gene_refseq_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'coding_gene_refseq_id' => 'Coding Gene Refseq',
            'ontology' => 'Ontology',
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

        $criteria->compare('id',$this->id);
        $criteria->compare('coding_gene_refseq_id',$this->coding_gene_refseq_id,true);
        $criteria->compare('ontology',$this->ontology,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return GeneOntology the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}