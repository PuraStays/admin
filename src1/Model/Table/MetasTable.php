<?php
namespace App\Model\Table;

use App\Model\Entity\Meta;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Metas Model
 *
 */
class MetasTable extends Table
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

        $this->table('metas');
        $this->displayField('Id');
        $this->primaryKey('Id');

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
            ->allowEmpty('Title')
            ->add('Title', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('Description', 'create')
            ->notEmpty('Description');

        $validator
            ->add('DOC', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('DOC');

        $validator
            ->add('DOU', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('DOU');

        return $validator;
    }
}
