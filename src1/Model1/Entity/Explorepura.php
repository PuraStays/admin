<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Explorepura Entity.
 *
 * @property int $Id
 * @property string $Meta_Keyword
 * @property string $Meta_Title
 * @property string $Meta_Description
 * @property string $Tags
 * @property string $Banner_Title
 * @property string $Banner_Description
 * @property string $Banner_Image
 * @property string $Banner_Video
 * @property string $Stay_Title
 * @property string $Stay_Details
 * @property string $Stay_Description
 * @property string $Stay_Gallery
 * @property string $Cafe_Title
 * @property string $Cafe_Details
 * @property string $Cafe_Description
 * @property string $Cafe_Gallery
 * @property string $Experiences_Title
 * @property string $Experiences_Details
 * @property string $Experiences_Description
 * @property string $Experiences_Gallery
 * @property string $Operations_Title
 * @property string $Operations_Details
 * @property string $Operations_Description
 * @property string $Operations_Gallery
 * @property bool $Status
 * @property \Cake\I18n\Time $DOC
 * @property \Cake\I18n\Time $DOU
 */
class Explorepura extends Entity
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
