<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity.
 *
 * @property int $id
 * @property string $Image
 * @property string $Name
 * @property string $Mobile
 * @property string $email
 * @property int $user_type_id
 * @property \App\Model\Entity\UserType $user_type
 * @property string $password
 * @property bool $Status
 * @property \Cake\I18n\Time $DOC
 * @property \Cake\I18n\Time $DOU
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
