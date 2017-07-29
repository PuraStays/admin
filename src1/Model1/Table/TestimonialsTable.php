<?php
namespace App\Model\Table;

use App\Model\Entity\Testimonial;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Testimonials Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Tags
 */
class TestimonialsTable extends Table
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

        $this->table('testimonials');
        $this->displayField('Id');
        $this->primaryKey('Id');

        $this->belongsTo('Tags', [
            'foreignKey' => 'Tags',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Images', [
            'foreignKey' => 'Image',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Images', [
            'foreignKey' => 'User_Image',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Videos', [
            'foreignKey' => 'Image',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Resorts', [
            'foreignKey' => 'resort_id',
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
        $rules->add($rules->existsIn(['Tags'], 'Tags'));
        $rules->add($rules->existsIn(['Image'], 'Images'));
        $rules->add($rules->existsIn(['resort_id'], 'Resorts'));
        $rules->add($rules->existsIn(['Banner_Video'], 'Videos'));
        return $rules;
    }
}
