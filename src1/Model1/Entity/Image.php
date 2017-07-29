<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Image Entity.
 *
 * @property int $Id
 * @property string $Image_Url
 * @property string $Title
 * @property string $Alt
 * @property string $Meta
 * @property string $Description
 * @property bool $Status
 * @property \Cake\I18n\Time $DOC
 * @property \Cake\I18n\Time $DOU
 */
class Image extends Entity
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
