
<?php

/**
 * This is the model class for table "trans_regulation".
 *
 * The followings are the available columns in table 'trans_regulation':
 * @property integer $id
 * @property string $sscagelncrna_id
 * @property string $coding_gene_refseq_id
 * @property string $coding_gene_symbol
 * @property double $homology_percentage
 * @property double $length_of_homologous_region
 *
 * The followings are the available model relations:
 * @property GeneOntology $codingGeneRefseq
 * @property GenomicInfo $sscagelncrna
 */
class TransRegulation extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'trans_regulation';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('homology_percentage, length_of_homologous_region', 'numerical'),
            array('coding_gene_refseq_id, coding_gene_symbol', 'length', 'max'=>50),
            array('sscagelncrna_id', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, sscagelncrna_id, coding_gene_refseq_id, coding_gene_symbol, homology_percentage, length_of_homologous_region', 'safe', 'on'=>'search'),
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
            'codingGeneRefseq' => array(self::BELONGS_TO, 'GeneOntology', 'coding_gene_refseq_id'),
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
            'homology_percentage' => 'Homology Percentage',
            'length_of_homologous_region' => 'Length Of Homologous Region',
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
        $criteria->compare('homology_percentage',$this->homology_percentage);
        $criteria->compare('length_of_homologous_region',$this->length_of_homologous_region);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TransRegulation the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}