<?php

/**
 * This is the model class for table "co_expression".
 *
 * The followings are the available columns in table 'co_expression':
 * @property integer $id
 * @property string $sscagelncrna_id
 * @property string $coding_gene_refseq_id
 * @property string $coding_gene_symbol
 * @property double $co_expression_coefficient
 * @property string $gene_ontology
 *
 * The followings are the available model relations:
 * @property GenomicInfo $sscagelncrna
 */
class CoExpression extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'co_expression';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('co_expression_coefficient', 'numerical'),
            array('sscagelncrna_id, coding_gene_refseq_id, coding_gene_symbol', 'length', 'max'=>50),
            array('gene_ontology', 'length', 'max'=>2000),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, sscagelncrna_id, coding_gene_refseq_id, coding_gene_symbol, co_expression_coefficient, gene_ontology', 'safe', 'on'=>'search'),
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
            'sscagelncrna' => array(self::BELONGS_TO, 'GenomicInfo', 'sscagelncrna_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'sscagelncrna_id' => 'Sscagelncrna',
            'coding_gene_refseq_id' => 'Coding Gene Refseq',
            'coding_gene_symbol' => 'Coding Gene Symbol',
            'co_expression_coefficient' => 'Co Expression Coefficient',
            'gene_ontology' => 'Gene Ontology',
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
        $criteria->compare('sscagelncrna_id',$this->sscagelncrna_id,true);
        $criteria->compare('coding_gene_refseq_id',$this->coding_gene_refseq_id,true);
        $criteria->compare('coding_gene_symbol',$this->coding_gene_symbol,true);
        $criteria->compare('co_expression_coefficient',$this->co_expression_coefficient);
        $criteria->compare('gene_ontology',$this->gene_ontology,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CoExpression the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}