<?php
namespace App\Model\Table;

use App\Model\Entity\stayprogramsgroup;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stayprogramsgroups Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Activities
 */
class stayprogramsgroupsTable extends Table
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

        $this->table('stayprogramsgroups');
        $this->displayField('Id');
        $this->primaryKey('Id');

        $this->belongsTo('Activities', [
            'foreignKey' => 'activities_id',
            'joinType' => 'INNER'
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

        $validator
            ->requirePresence('Group_Name', 'create')
            ->notEmpty('Group_Name');



        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['activities_id'], 'Activities'));
        return $rules;
    }
}
