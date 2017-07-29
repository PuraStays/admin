<?php
namespace App\Model\Table;

use App\Model\Entity\Image;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

use AmazonS3;

/**
 * Images Model
 *
 */
class ImagesTable extends Table
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

        $this->table('images');
        $this->displayField('Id');
        $this->primaryKey('Id');
      
        $this->belongsTo('Metas', [
            'displayField' => 'Metas',
            'joinType' => 'INNER'
        ]);
        /*
        $this->belongsTo('Tags', [
            'displayField' => 'Tags',
            'joinType' => 'INNER'
        ]);
        */
        $this->belongsTo('Tags', [
            'foreignKey' => 'Tags',
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
            ->requirePresence('Title', 'create')
            ->notEmpty('Title')
            ->add('Title', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        /*

        $validator
            ->requirePresence('Alt', 'create')
            ->notEmpty('Alt');

        $validator
            ->requirePresence('Meta', 'create')
            ->notEmpty('Meta');

        $validator
            ->requirePresence('Description', 'create')
            ->notEmpty('Description');

        $validator
            ->add('Status', 'valid', ['rule' => 'boolean'])
            ->requirePresence('Status', 'create')
            ->notEmpty('Status');

        $validator
            ->add('DOC', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('DOC');

        $validator
            ->add('DOU', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('DOU');
            */

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['Metas'], 'Metas'));
        $rules->add($rules->existsIn(['Tags'], 'Tags'));
        return $rules;
    }
}
