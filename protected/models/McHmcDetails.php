<?php

/**
 * This is the model class for table "mc_hmc_details".
 *
 * The followings are the available columns in table 'mc_hmc_details':
 * @property integer $id
 * @property string $sscagelncrna_id
 * @property string $modification_type
 * @property string $sample
 * @property string $region
 * @property string $chr
 * @property integer $position
 * @property integer $read_count
 *
 * The followings are the available model relations:
 * @property GenomicInfo $sscagelncrna
 */
class McHmcDetails extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'mc_hmc_details';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('position, read_count', 'numerical', 'integerOnly'=>true),
            array('sscagelncrna_id, modification_type, sample, region, chr', 'length', 'max'=>50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, sscagelncrna_id, modification_type, sample, region, chr, position, read_count', 'safe', 'on'=>'search'),
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
            'region' => 'Region',
            'chr' => 'Chr',
            'position' => 'Position',
            'read_count' => 'Read Count',
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
        $criteria->compare('region',$this->region,true);
        $criteria->compare('chr',$this->chr,true);
        $criteria->compare('position',$this->position);
        $criteria->compare('read_count',$this->read_count);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return McHmcDetails the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}