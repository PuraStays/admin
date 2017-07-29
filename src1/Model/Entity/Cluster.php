<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cluster Entity.
 *
 * @property int $Id
 * @property string $Meta_Keyword
 * @property string $Meta_Title
 * @property string $Meta_Description
 * @property string $Title
 * @property string $Description
 * @property string $Resorts
 * @property string $Activitys
 * @property string $Banner_Title
 * @property string $Banner_Description
 * @property int $Banner_Image
 * @property int $Banner_Video
 * @property bool $Status
 * @property \Cake\I18n\Time $DOC
 * @property \Cake\I18n\Time $DOU
 */
class Cluster extends Entity
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
