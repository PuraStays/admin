<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Activity Entity.
 *
 * @property int $Id
 * @property string $Meta_Keyword
 * @property string $Meta_Title
 * @property string $Meta_Description
 * @property string $Activity_Name
 * @property string $Banner_Title
 * @property string $Banner_Description
 * @property string $Banner_Image
 * @property string $Banner_Video
 * @property string $About_Activity_Title
 * @property string $About_Activity_Description
 * @property string $feature_id
 * @property \App\Model\Entity\Feature $feature
 * @property string $testimonial_id
 * @property \App\Model\Entity\Testimonial $testimonial
 * @property string $gallery_id
 * @property \App\Model\Entity\Gallery $gallery
 * @property bool $Status
 * @property \Cake\I18n\Time $DOC
 * @property \Cake\I18n\Time $DOU
 */
class Activity extends Entity
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
