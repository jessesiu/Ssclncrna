<?php

/**
 * This is the model class for table "hmc_modifications".
 *
 * The followings are the available columns in table 'hmc_modifications':
 * @property integer $id
 * @property string $sscagelncrna_id
 * @property integer $promoter_6d_kit_minus
 * @property integer $promoter_6d_kit_add
 * @property integer $promoter_8m_kit_minus
 * @property integer $promoter_8m_kit_add
 * @property integer $promoter_15m_kit_minus
 * @property integer $promoter_15m_kit_add
 * @property integer $gene_body_6d_kit_minus
 * @property integer $gene_body_6d_kit_add
 * @property integer $gene_body_8m_kit_minus
 * @property integer $gene_body_8m_kit_add
 * @property integer $gene_body_15m_kit_minus
 * @property integer $gene_body_15m_kit_add
 *
 * The followings are the available model relations:
 * @property GenomicInfo $sscagelncrna
 */
class HmcModifications extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'hmc_modifications';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('promoter_6d_kit_minus, promoter_6d_kit_add, promoter_8m_kit_minus, promoter_8m_kit_add, promoter_15m_kit_minus, promoter_15m_kit_add, gene_body_6d_kit_minus, gene_body_6d_kit_add, gene_body_8m_kit_minus, gene_body_8m_kit_add, gene_body_15m_kit_minus, gene_body_15m_kit_add', 'numerical', 'integerOnly'=>true),
            array('sscagelncrna_id', 'length', 'max'=>50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, sscagelncrna_id, promoter_6d_kit_minus, promoter_6d_kit_add, promoter_8m_kit_minus, promoter_8m_kit_add, promoter_15m_kit_minus, promoter_15m_kit_add, gene_body_6d_kit_minus, gene_body_6d_kit_add, gene_body_8m_kit_minus, gene_body_8m_kit_add, gene_body_15m_kit_minus, gene_body_15m_kit_add', 'safe', 'on'=>'search'),
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
            'promoter_6d_kit_minus' => 'Promoter 6d Kit Minus',
            'promoter_6d_kit_add' => 'Promoter 6d Kit Add',
            'promoter_8m_kit_minus' => 'Promoter 8m Kit Minus',
            'promoter_8m_kit_add' => 'Promoter 8m Kit Add',
            'promoter_15m_kit_minus' => 'Promoter 15m Kit Minus',
            'promoter_15m_kit_add' => 'Promoter 15m Kit Add',
            'gene_body_6d_kit_minus' => 'Gene Body 6d Kit Minus',
            'gene_body_6d_kit_add' => 'Gene Body 6d Kit Add',
            'gene_body_8m_kit_minus' => 'Gene Body 8m Kit Minus',
            'gene_body_8m_kit_add' => 'Gene Body 8m Kit Add',
            'gene_body_15m_kit_minus' => 'Gene Body 15m Kit Minus',
            'gene_body_15m_kit_add' => 'Gene Body 15m Kit Add',
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
        $criteria->compare('promoter_6d_kit_minus',$this->promoter_6d_kit_minus);
        $criteria->compare('promoter_6d_kit_add',$this->promoter_6d_kit_add);
        $criteria->compare('promoter_8m_kit_minus',$this->promoter_8m_kit_minus);
        $criteria->compare('promoter_8m_kit_add',$this->promoter_8m_kit_add);
        $criteria->compare('promoter_15m_kit_minus',$this->promoter_15m_kit_minus);
        $criteria->compare('promoter_15m_kit_add',$this->promoter_15m_kit_add);
        $criteria->compare('gene_body_6d_kit_minus',$this->gene_body_6d_kit_minus);
        $criteria->compare('gene_body_6d_kit_add',$this->gene_body_6d_kit_add);
        $criteria->compare('gene_body_8m_kit_minus',$this->gene_body_8m_kit_minus);
        $criteria->compare('gene_body_8m_kit_add',$this->gene_body_8m_kit_add);
        $criteria->compare('gene_body_15m_kit_minus',$this->gene_body_15m_kit_minus);
        $criteria->compare('gene_body_15m_kit_add',$this->gene_body_15m_kit_add);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return HmcModifications the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}