<?php
namespace App\Model\Table;

use App\Model\Entity\Landingpage;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Landingpages Model
 *
 */
class LandingpagesTable extends Table
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

        $this->table('landingpages');
        $this->displayField('Id');
        $this->primaryKey('Id');
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
            ->requirePresence('Meta_Keyword', 'create')
            ->notEmpty('Meta_Keyword');

        $validator
            ->requirePresence('Meta_Title', 'create')
            ->notEmpty('Meta_Title');

        $validator
            ->requirePresence('Meta_Description', 'create')
            ->notEmpty('Meta_Description');

        $validator
            ->requirePresence('Banner_Image', 'create')
            ->notEmpty('Banner_Image');

        $validator
            ->requirePresence('Banner_Title', 'create')
            ->notEmpty('Banner_Title');

        $validator
            ->requirePresence('Banner_Details', 'create')
            ->notEmpty('Banner_Details');

        $validator
            ->requirePresence('Offer_Amount', 'create')
            ->notEmpty('Offer_Amount');

        $validator
            ->requirePresence('Contact', 'create')
            ->notEmpty('Contact');

        $validator
            ->requirePresence('Package_Title', 'create')
            ->notEmpty('Package_Title');

        $validator
            ->requirePresence('Package_Description', 'create')
            ->notEmpty('Package_Description');

        $validator
            ->requirePresence('Package_Features', 'create')
            ->notEmpty('Package_Features');

        $validator
            ->requirePresence('Gallery_Details', 'create')
            ->notEmpty('Gallery_Details');

        $validator
            ->requirePresence('Gallery1_Image', 'create')
            ->notEmpty('Gallery1_Image');

        $validator
            ->requirePresence('Gallery1_Title', 'create')
            ->notEmpty('Gallery1_Title');

        $validator
            ->requirePresence('Gallery1_Description', 'create')
            ->notEmpty('Gallery1_Description');

        $validator
            ->requirePresence('Gallery2_Image', 'create')
            ->notEmpty('Gallery2_Image');

        $validator
            ->requirePresence('Gallery2_Title', 'create')
            ->notEmpty('Gallery2_Title');

        $validator
            ->requirePresence('Gallery2_Description', 'create')
            ->notEmpty('Gallery2_Description');

        $validator
            ->requirePresence('Gallery3_Image', 'create')
            ->notEmpty('Gallery3_Image');

        $validator
            ->requirePresence('Gallery3_Title', 'create')
            ->notEmpty('Gallery3_Title');

        $validator
            ->requirePresence('Gallery3_Description', 'create')
            ->notEmpty('Gallery3_Description');

        $validator
            ->requirePresence('Gallery4_Image', 'create')
            ->notEmpty('Gallery4_Image');

        $validator
            ->requirePresence('Gallery4_Title', 'create')
            ->notEmpty('Gallery4_Title');

        $validator
            ->requirePresence('Gallery4_Description', 'create')
            ->notEmpty('Gallery4_Description');

        $validator
            ->requirePresence('Gallery5_Image', 'create')
            ->notEmpty('Gallery5_Image');

        $validator
            ->requirePresence('Gallery5_Title', 'create')
            ->notEmpty('Gallery5_Title');

        $validator
            ->requirePresence('Gallery5_Description', 'create')
            ->notEmpty('Gallery5_Description');

        $validator
            ->requirePresence('Gallery6_Image', 'create')
            ->notEmpty('Gallery6_Image');

        $validator
            ->requirePresence('Gallery6_Title', 'create')
            ->notEmpty('Gallery6_Title');

        $validator
            ->requirePresence('Gallery6_Description', 'create')
            ->notEmpty('Gallery6_Description');

        $validator
            ->requirePresence('Description', 'create')
            ->notEmpty('Description');

        $validator
            ->add('Status', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Status', 'create')
            ->notEmpty('Status');
        */
        return $validator;
    }
}
