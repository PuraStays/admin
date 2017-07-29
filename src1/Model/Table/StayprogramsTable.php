<?php
namespace App\Model\Table;

use App\Model\Entity\Stayprogram;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stayprograms Model
 *
 */
class StayprogramsTable extends Table
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

        $this->table('stayprograms');
        $this->displayField('Id');
        $this->primaryKey('Id');

        $this->belongsTo('Tags', [
        ]);
        $this->belongsTo('Images', [
        ]);
        $this->belongsTo('Stayprogramsgroups', [
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
        $validator
            ->add('Id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Id', 'create');

        /*
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
            ->requirePresence('Mood', 'create')
            ->notEmpty('Mood');

        $validator
            ->requirePresence('Program_Title', 'create')
            ->notEmpty('Program_Title');

        $validator
            ->requirePresence('Program_Details', 'create')
            ->notEmpty('Program_Details');

        
        $validator
            ->requirePresence('Program_Gallery', 'create')
            ->notEmpty('Program_Gallery');

        $validator
            ->add('Program_Time_Min', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Program_Time_Min', 'create')
            ->notEmpty('Program_Time_Min');

        $validator
            ->add('Program_Time_Max', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Program_Time_Max', 'create')
            ->notEmpty('Program_Time_Max');

        $validator
            ->add('Rate_Adult_Double_Occ', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Rate_Adult_Double_Occ', 'create')
            ->notEmpty('Rate_Adult_Double_Occ');

        $validator
            ->add('Rate_Adult_Single_Occ', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Rate_Adult_Single_Occ', 'create')
            ->notEmpty('Rate_Adult_Single_Occ');

        $validator
            ->add('Total_Activities', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Total_Activities', 'create')
            ->notEmpty('Total_Activities');

        $validator
            ->requirePresence('Group1', 'create')
            ->notEmpty('Group1');

        $validator
            ->requirePresence('Group2', 'create')
            ->notEmpty('Group2');

        $validator
            ->requirePresence('Group3', 'create')
            ->notEmpty('Group3');

        $validator
            ->requirePresence('Group4', 'create')
            ->notEmpty('Group4');

        $validator
            ->requirePresence('Group5', 'create')
            ->notEmpty('Group5');

        $validator
            ->add('Group1_Activities', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Group1_Activities', 'create')
            ->notEmpty('Group1_Activities');

        $validator
            ->add('Group2_Activities', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Group2_Activities', 'create')
            ->notEmpty('Group2_Activities');

        $validator
            ->add('Group3_Activities', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Group3_Activities', 'create')
            ->notEmpty('Group3_Activities');

        $validator
            ->add('Group4_Activities', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Group4_Activities', 'create')
            ->notEmpty('Group4_Activities');

        $validator
            ->add('Group5_Activities', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Group5_Activities', 'create')
            ->notEmpty('Group5_Activities');

        $validator
            ->add('Status', 'valid', ['rule' => 'boolean'])
            ->requirePresence('Status', 'create')
            ->notEmpty('Status');
        */

        return $validator;
    }
    public function buildRules(RulesChecker $rules)
    {
      /*
        $rules->add($rules->existsIn(['Mood'], 'Tags'));
        $rules->add($rules->existsIn(['Program_Gallery'], 'Images'));
        $rules->add($rules->existsIn(['Group1'], 'Stayprogramsgroups'));
        $rules->add($rules->existsIn(['Group2'], 'Stayprogramsgroups'));
        $rules->add($rules->existsIn(['Group3'], 'Stayprogramsgroups'));
        $rules->add($rules->existsIn(['Group4'], 'Stayprogramsgroups'));
        $rules->add($rules->existsIn(['Group5'], 'Stayprogramsgroups'));
        */

        return $rules;
    }
}
