<?php

/**
 * This is the model class for table "histone_modifications".
 *
 * The followings are the available columns in table 'histone_modifications':
 * @property integer $id
 * @property string $sscagelncrna_id
 * @property integer $h3k4me3_6d_kit_minus
 * @property integer $h3k4me3_6d_kit_add
 * @property integer $h3k4me3_8m_kit_minus
 * @property integer $h3k4me3_8m_kit_add
 * @property integer $h3k4me3_15m_kit_minus
 * @property integer $h3k4me3_15m_kit_add
 * @property integer $h3k27me3_6d_kit_minus
 * @property integer $h3k27me3_6d_kit_add
 * @property integer $h3k27me3_8m_kit_minus
 * @property integer $h3k27me3_8m_kit_add
 * @property integer $h3k27me3_15m_kit_minus
 * @property integer $h3k27me3_15m_kit_add
 *
 * The followings are the available model relations:
 * @property GenomicInfo $sscagelncrna
 */
class HistoneModifications extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'histone_modifications';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('h3k4me3_6d_kit_minus, h3k4me3_6d_kit_add, h3k4me3_8m_kit_minus, h3k4me3_8m_kit_add, h3k4me3_15m_kit_minus, h3k4me3_15m_kit_add, h3k27me3_6d_kit_minus, h3k27me3_6d_kit_add, h3k27me3_8m_kit_minus, h3k27me3_8m_kit_add, h3k27me3_15m_kit_minus, h3k27me3_15m_kit_add', 'numerical', 'integerOnly'=>true),
            array('sscagelncrna_id', 'length', 'max'=>50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, sscagelncrna_id, h3k4me3_6d_kit_minus, h3k4me3_6d_kit_add, h3k4me3_8m_kit_minus, h3k4me3_8m_kit_add, h3k4me3_15m_kit_minus, h3k4me3_15m_kit_add, h3k27me3_6d_kit_minus, h3k27me3_6d_kit_add, h3k27me3_8m_kit_minus, h3k27me3_8m_kit_add, h3k27me3_15m_kit_minus, h3k27me3_15m_kit_add', 'safe', 'on'=>'search'),
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
            'h3k4me3_6d_kit_minus' => 'H3k4me3 6d Kit Minus',
            'h3k4me3_6d_kit_add' => 'H3k4me3 6d Kit Add',
            'h3k4me3_8m_kit_minus' => 'H3k4me3 8m Kit Minus',
            'h3k4me3_8m_kit_add' => 'H3k4me3 8m Kit Add',
            'h3k4me3_15m_kit_minus' => 'H3k4me3 15m Kit Minus',
            'h3k4me3_15m_kit_add' => 'H3k4me3 15m Kit Add',
            'h3k27me3_6d_kit_minus' => 'H3k27me3 6d Kit Minus',
            'h3k27me3_6d_kit_add' => 'H3k27me3 6d Kit Add',
            'h3k27me3_8m_kit_minus' => 'H3k27me3 8m Kit Minus',
            'h3k27me3_8m_kit_add' => 'H3k27me3 8m Kit Add',
            'h3k27me3_15m_kit_minus' => 'H3k27me3 15m Kit Minus',
            'h3k27me3_15m_kit_add' => 'H3k27me3 15m Kit Add',
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
        $criteria->compare('h3k4me3_6d_kit_minus',$this->h3k4me3_6d_kit_minus);
        $criteria->compare('h3k4me3_6d_kit_add',$this->h3k4me3_6d_kit_add);
        $criteria->compare('h3k4me3_8m_kit_minus',$this->h3k4me3_8m_kit_minus);
        $criteria->compare('h3k4me3_8m_kit_add',$this->h3k4me3_8m_kit_add);
        $criteria->compare('h3k4me3_15m_kit_minus',$this->h3k4me3_15m_kit_minus);
        $criteria->compare('h3k4me3_15m_kit_add',$this->h3k4me3_15m_kit_add);
        $criteria->compare('h3k27me3_6d_kit_minus',$this->h3k27me3_6d_kit_minus);
        $criteria->compare('h3k27me3_6d_kit_add',$this->h3k27me3_6d_kit_add);
        $criteria->compare('h3k27me3_8m_kit_minus',$this->h3k27me3_8m_kit_minus);
        $criteria->compare('h3k27me3_8m_kit_add',$this->h3k27me3_8m_kit_add);
        $criteria->compare('h3k27me3_15m_kit_minus',$this->h3k27me3_15m_kit_minus);
        $criteria->compare('h3k27me3_15m_kit_add',$this->h3k27me3_15m_kit_add);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return HistoneModifications the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}