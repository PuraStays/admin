<?php
namespace App\Model\Table;

use App\Model\Entity\Explorepura;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Explorepuras Model
 *
 */
class ExplorepurasTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('explorepuras');
        $this->displayField('Id');
        $this->primaryKey('Id');
        $this->belongsTo('Images', [
        ]);
        $this->belongsTo('Videos', [
        ]);
        $this->belongsTo('Tags', [
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        /*
        $validator
            ->add('Id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Id', 'create');

        $validator
            ->requirePresence('Meta_Keyword', 'create')
            ->notEmpty('Meta_Keyword');

        $validator
            ->requirePresence('Meta_Title', 'create')
            ->notEmpty('Meta_Title');

        $validator
            ->requirePresence('Meta_Description', 'create')
            ->notEmpty('Meta_Description');

        $validator
            ->requirePresence('Tags', 'create')
            ->notEmpty('Tags');

        $validator
            ->requirePresence('Banner_Title', 'create')
            ->notEmpty('Banner_Title');

        $validator
            ->requirePresence('Banner_Description', 'create')
            ->notEmpty('Banner_Description');

        $validator
            ->requirePresence('Banner_Image', 'create')
            ->notEmpty('Banner_Image');

        $validator
            ->requirePresence('Banner_Video', 'create')
            ->notEmpty('Banner_Video');

        $validator
            ->requirePresence('Stay_Title', 'create')
            ->notEmpty('Stay_Title');

        $validator
            ->requirePresence('Stay_Details', 'create')
            ->notEmpty('Stay_Details');

        $validator
            ->requirePresence('Stay_Description', 'create')
            ->notEmpty('Stay_Description');

        $validator
            ->requirePresence('Stay_Gallery', 'create')
            ->notEmpty('Stay_Gallery');

        $validator
            ->requirePresence('Cafe_Title', 'create')
            ->notEmpty('Cafe_Title');

        $validator
            ->requirePresence('Cafe_Details', 'create')
            ->notEmpty('Cafe_Details');

        $validator
            ->requirePresence('Cafe_Description', 'create')
            ->notEmpty('Cafe_Description');

        $validator
            ->requirePresence('Cafe_Gallery', 'create')
            ->notEmpty('Cafe_Gallery');

        $validator
            ->requirePresence('Experiences_Title', 'create')
            ->notEmpty('Experiences_Title');

        $validator
            ->requirePresence('Experiences_Details', 'create')
            ->notEmpty('Experiences_Details');

        $validator
            ->requirePresence('Experiences_Description', 'create')
            ->notEmpty('Experiences_Description');

        $validator
            ->requirePresence('Experiences_Gallery', 'create')
            ->notEmpty('Experiences_Gallery');

        $validator
            ->requirePresence('Operations_Title', 'create')
            ->notEmpty('Operations_Title');

        $validator
            ->requirePresence('Operations_Details', 'create')
            ->notEmpty('Operations_Details');

        $validator
            ->requirePresence('Operations_Description', 'create')
            ->notEmpty('Operations_Description');

        $validator
            ->requirePresence('Operations_Gallery', 'create')
            ->notEmpty('Operations_Gallery');

        $validator
            ->add('Status', 'valid', ['rule' => 'boolean'])
            ->requirePresence('Status', 'create')
            ->notEmpty('Status');

        $validator
            ->add('DOC', 'valid', ['rule' => 'datetime'])
            ->requirePresence('DOC', 'create')
            ->notEmpty('DOC');

        $validator
            ->add('DOU', 'valid', ['rule' => 'datetime'])
            ->requirePresence('DOU', 'create')
            ->notEmpty('DOU');
        */
        return $validator;
        
    }
public function buildRules(RulesChecker $rules)
    {
        /*
        $rules->add($rules->existsIn(['Banner_Image'], 'Images'));
        $rules->add($rules->existsIn(['Banner_Video'], 'Videos'));

        //
        $rules->add($rules->existsIn(['Stay_Gallery'], 'Images'));
        $rules->add($rules->existsIn(['Cafe_Gallery'], 'Images'));
        $rules->add($rules->existsIn(['Experiences_Gallery'], 'Images'));
        $rules->add($rules->existsIn(['Experiences_Gallery'], 'Images'));
        $rules->add($rules->existsIn(['Tags'], 'Tags'));
        */
        return $rules;
    }
}
