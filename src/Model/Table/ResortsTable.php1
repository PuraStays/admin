<?php
namespace App\Model\Table;

use App\Model\Entity\Resort;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Resorts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Features
 * @property \Cake\ORM\Association\BelongsTo $Testimonials
 * @property \Cake\ORM\Association\BelongsTo $Images
 */
class ResortsTable extends Table
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

        $this->table('resorts');
        $this->displayField('Id');
        $this->primaryKey('Id');

        
        $this->belongsTo('Features', [
        ]);

        $this->belongsTo('Testimonials', [
        ]);

        $this->belongsTo('Images', [
            
        ]);
        
        $this->belongsTo('stayprograms', [
            
        ]);

        
        $this->belongsTo('Images', [
            
        ]);

        
        $this->belongsTo('Activities', [

        ]);
        $this->belongsTo('Nearbyplaces', [
            
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
            ->requirePresence('Resort_Name', 'create')
            ->notEmpty('Resort_Name');

        $validator
            ->requirePresence('About_Resort_Title', 'create')
            ->notEmpty('About_Resort_Title');

        $validator
            ->requirePresence('About_Resort_Description', 'create')
            ->notEmpty('About_Resort_Description');

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
        $rules->add($rules->existsIn(['feature_id'], 'Features'));
        $rules->add($rules->existsIn(['testimonial_id'], 'Testimonials'));
        $rules->add($rules->existsIn(['Image'], 'Images'));
        
        $rules->add($rules->existsIn(['Banner_Video'], 'Videos'));
        $rules->add($rules->existsIn(['things_to_do_id'], 'Activities'));
        $rules->add($rules->existsIn(['nearbyplaces_id'], 'Nearbyplaces'));
        $rules->add($rules->existsIn(['Tags'], 'Tags'));
        */

        return $rules;
    }
}
