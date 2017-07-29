<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Nearbyplace Entity.
 *
 * @property int $Id
 * @property string $Image
 * @property string $Title
 * @property string $Description
 * @property int $tag_id
 * @property \App\Model\Entity\Tag $tag
 * @property bool $Status
 * @property \Cake\I18n\Time $DOC
 * @property \Cake\I18n\Time $DOU
 */
class Nearbyplace extends Entity
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
