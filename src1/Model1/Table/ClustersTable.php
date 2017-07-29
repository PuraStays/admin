<?php
namespace App\Model\Table;

use App\Model\Entity\Cluster;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clusters Model
 *
 */
class ClustersTable extends Table
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

        $this->table('clusters');
        $this->displayField('Id');
        $this->primaryKey('Id');

        $this->belongsTo('Images', [
            'foreignKey' => 'Banner_Image',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Videos', [
            'foreignKey' => 'Banner_Video',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Resorts', [
            'foreignKey' => 'Resorts',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Activities', [
            'foreignKey' => 'Activities',
            'joinType' => 'INNER'
        ]);
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

 /*
        $validator
            ->allowEmpty('Meta_Keyword')
            ->add('Meta_Keyword', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('Meta_Title', 'create')
            ->notEmpty('Meta_Title');

        $validator
            ->requirePresence('Meta_Description', 'create')
            ->notEmpty('Meta_Description');
*/
        $validator
            ->requirePresence('Title', 'create')
            ->notEmpty('Title');

        $validator
            ->requirePresence('Description', 'create')
            ->notEmpty('Description');
/*
        $validator
            ->requirePresence('Resorts', 'create')
            ->notEmpty('Resorts');

        $validator
            ->requirePresence('Activities', 'create')
            ->notEmpty('Activities');

        $validator
            ->requirePresence('Banner_Title', 'create')
            ->notEmpty('Banner_Title');

        $validator
            ->requirePresence('Banner_Description', 'create')
            ->notEmpty('Banner_Description');

        $validator
            ->add('Banner_Image', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Banner_Image', 'create')
            ->notEmpty('Banner_Image');

        $validator
            ->add('Banner_Video', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Banner_Video', 'create')
            ->notEmpty('Banner_Video');

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
        $rules->add($rules->existsIn(['Banner_Image'], 'Images'));
        $rules->add($rules->existsIn(['Banner_Video'], 'Videos'));
        $rules->add($rules->existsIn(['Resorts'], 'Resorts'));
        $rules->add($rules->existsIn(['Activities'], 'Activities'));
        $rules->add($rules->existsIn(['Banner_Video'], 'Videos'));
        $rules->add($rules->existsIn(['Tags'], 'Tags'));

        return $rules;
    }
}
