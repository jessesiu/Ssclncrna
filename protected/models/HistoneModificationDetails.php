<?php

/**
 * This is the model class for table "histone_modification_details".
 *
 * The followings are the available columns in table 'histone_modification_details':
 * @property integer $id
 * @property string $sscagelncrna_id
 * @property string $modification_type
 * @property string $sample
 * @property string $peak_chr
 * @property integer $peak_start
 * @property integer $peak_end
 * @property double $signal_to_background_fc
 * @property double $q_value
 *
 * The followings are the available model relations:
 * @property GenomicInfo $sscagelncrna
 */
class HistoneModificationDetails extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'histone_modification_details';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('peak_start, peak_end', 'numerical', 'integerOnly'=>true),
            array('signal_to_background_fc, q_value', 'numerical'),
            array('sscagelncrna_id, modification_type, sample', 'length', 'max'=>50),
            array('peak_chr', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, sscagelncrna_id, modification_type, sample, peak_chr, peak_start, peak_end, signal_to_background_fc, q_value', 'safe', 'on'=>'search'),
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
            'modification_type' => 'Modification Type',
            'sample' => 'Sample',
            'peak_chr' => 'Peak Chr',
            'peak_start' => 'Peak Start',
            'peak_end' => 'Peak End',
            'signal_to_background_fc' => 'Signal To Background Fc',
            'q_value' => 'Q Value',
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
        $criteria->compare('modification_type',$this->modification_type,true);
        $criteria->compare('sample',$this->sample,true);
        $criteria->compare('peak_chr',$this->peak_chr,true);
        $criteria->compare('peak_start',$this->peak_start);
        $criteria->compare('peak_end',$this->peak_end);
        $criteria->compare('signal_to_background_fc',$this->signal_to_background_fc);
        $criteria->compare('q_value',$this->q_value);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return HistoneModificationDetails the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}