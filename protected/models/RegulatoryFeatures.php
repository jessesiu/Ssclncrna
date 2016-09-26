<?php

/**
 * This is the model class for table "regulatory_features".
 *
 * The followings are the available columns in table 'regulatory_features':
 * @property integer $id
 * @property string $sscagelncrna_id
 * @property boolean $polya_testis
 * @property boolean $dhs
 * @property boolean $cage
 * @property boolean $conserved_elements
 *
 * The followings are the available model relations:
 * @property GenomicInfo $sscagelncrna
 */
class RegulatoryFeatures extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'regulatory_features';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('sscagelncrna_id', 'length', 'max'=>50),
            array('polya_testis, dhs, cage, conserved_elements', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, sscagelncrna_id, polya_testis, dhs, cage, conserved_elements', 'safe', 'on'=>'search'),
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
            'polya_testis' => 'Polya Testis',
            'dhs' => 'Dhs',
            'cage' => 'Cage',
            'conserved_elements' => 'Conserved Elements',
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
        $criteria->compare('polya_testis',$this->polya_testis);
        $criteria->compare('dhs',$this->dhs);
        $criteria->compare('cage',$this->cage);
        $criteria->compare('conserved_elements',$this->conserved_elements);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return RegulatoryFeatures the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}