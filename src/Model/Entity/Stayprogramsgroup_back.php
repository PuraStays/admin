<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stayprogramsgroup Entity.
 *
 * @property int $Id
 * @property string $Group_Name
 * @property string $activities_id
 * @property \App\Model\Entity\Activity $activity
 * @property int $qty
 * @property bool $Status
 * @property \Cake\I18n\Time $DOC
 * @property \Cake\I18n\Time $DOU
 */
class Stayprogramsgroup extends Entity
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
        'Id' => false,
    ];
}
