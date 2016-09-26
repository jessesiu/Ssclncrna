
<?php

/**
 * This is the model class for table "small_rna_precursors".
 *
 * The followings are the available columns in table 'small_rna_precursors':
 * @property integer $id
 * @property string $sscagelncrna_id
 * @property string $small_rna
 *
 * The followings are the available model relations:
 * @property GenomicInfo $sscagelncrna
 */
class SmallRnaPrecursors extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'small_rna_precursors';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('sscagelncrna_id, small_rna', 'length', 'max'=>50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, sscagelncrna_id, small_rna', 'safe', 'on'=>'search'),
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
            'small_rna' => 'Small Rna',
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
        $criteria->compare('small_rna',$this->small_rna,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return SmallRnaPrecursors the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}