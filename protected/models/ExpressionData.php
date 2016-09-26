<?php

/**
 * This is the model class for table "expression_data".
 *
 * The followings are the available columns in table 'expression_data':
 * @property integer $id
 * @property string $sscagelncrna_id
 * @property double $rnaseq_6d_kit_minus
 * @property double $rnaseq_6d_kit_add
 * @property double $rnaseq_8m_kit_minus
 * @property double $rnaseq_8m_kit_add
 * @property double $rnaseq_15m_kit_minus
 * @property double $rnaseq_15m_kit_add
 * @property string $expression_specificity
 *
 * The followings are the available model relations:
 * @property GenomicInfo $sscagelncrna
 */
class ExpressionData extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'expression_data';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('rnaseq_6d_kit_minus, rnaseq_6d_kit_add, rnaseq_8m_kit_minus, rnaseq_8m_kit_add, rnaseq_15m_kit_minus, rnaseq_15m_kit_add', 'numerical'),
            array('sscagelncrna_id, expression_specificity', 'length', 'max'=>50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, sscagelncrna_id, rnaseq_6d_kit_minus, rnaseq_6d_kit_add, rnaseq_8m_kit_minus, rnaseq_8m_kit_add, rnaseq_15m_kit_minus, rnaseq_15m_kit_add, expression_specificity', 'safe', 'on'=>'search'),
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
            'rnaseq_6d_kit_minus' => 'Rnaseq 6d Kit Minus',
            'rnaseq_6d_kit_add' => 'Rnaseq 6d Kit Add',
            'rnaseq_8m_kit_minus' => 'Rnaseq 8m Kit Minus',
            'rnaseq_8m_kit_add' => 'Rnaseq 8m Kit Add',
            'rnaseq_15m_kit_minus' => 'Rnaseq 15m Kit Minus',
            'rnaseq_15m_kit_add' => 'Rnaseq 15m Kit Add',
            'expression_specificity' => 'Expression Specificity',
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
        $criteria->compare('rnaseq_6d_kit_minus',$this->rnaseq_6d_kit_minus);
        $criteria->compare('rnaseq_6d_kit_add',$this->rnaseq_6d_kit_add);
        $criteria->compare('rnaseq_8m_kit_minus',$this->rnaseq_8m_kit_minus);
        $criteria->compare('rnaseq_8m_kit_add',$this->rnaseq_8m_kit_add);
        $criteria->compare('rnaseq_15m_kit_minus',$this->rnaseq_15m_kit_minus);
        $criteria->compare('rnaseq_15m_kit_add',$this->rnaseq_15m_kit_add);
        $criteria->compare('expression_specificity',$this->expression_specificity,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ExpressionData the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}