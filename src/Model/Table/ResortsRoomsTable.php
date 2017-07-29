<?php
namespace App\Model\Table;

use App\Model\Entity\ResortsRoom;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ResortsRooms Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Resorts
 * @property \Cake\ORM\Association\BelongsTo $Features
 * @property \Cake\ORM\Association\BelongsTo $Images
 */
class ResortsRoomsTable extends Table
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

        $this->table('resorts_rooms');
        $this->displayField('Id');
        $this->primaryKey('Id');

        $this->belongsTo('Resorts', [
        ]);
        $this->belongsTo('Features', [
        ]);
        $this->belongsTo('Images', [
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
            ->requirePresence('RoomType', 'create')
            ->notEmpty('RoomType');

        $validator
            ->requirePresence('Main_Image', 'create')
            ->notEmpty('Main_Image');

        $validator
            ->requirePresence('Description', 'create')
            ->notEmpty('Description');

        $validator
            ->requirePresence('Specification', 'create')
            ->notEmpty('Specification');

        $validator
            ->requirePresence('Speciality', 'create')
            ->notEmpty('Speciality');

        $validator
            ->add('Max_Adult', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Max_Adult', 'create')
            ->notEmpty('Max_Adult');

        $validator
            ->add('Max_Children', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Max_Children', 'create')
            ->notEmpty('Max_Children');

        $validator
            ->add('Position', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Position', 'create')
            ->notEmpty('Position');

        

        
        $validator
            ->add('Status', 'valid', ['rule' => 'boolean'])
            ->requirePresence('Status', 'create')
            ->notEmpty('Status');
        */
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
        /*
        $rules->add($rules->existsIn(['resort_id'], 'Resorts'));
        $rules->add($rules->existsIn(['feature_id'], 'Features'));
        $rules->add($rules->existsIn(['image_id'], 'Images'));
        */
        return $rules;
    }
}
