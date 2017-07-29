<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stayprogram Entity.
 *
 * @property int $Id
 * @property string $Meta_Keyword
 * @property string $Meta_Title
 * @property string $Meta_Description
 * @property string $Mood
 * @property string $Program_Title
 * @property string $Program_Details
 * @property string $Program_Gallery
 * @property int $Program_Time_Min
 * @property int $Program_Time_Max
 * @property int $Rate_Adult_Double_Occ
 * @property int $Rate_Adult_Single_Occ
 * @property int $Total_Activities
 * @property string $Group1
 * @property string $Group2
 * @property string $Group3
 * @property string $Group4
 * @property string $Group5
 * @property int $Group1_Activities
 * @property int $Group2_Activities
 * @property int $Group3_Activities
 * @property int $Group4_Activities
 * @property int $Group5_Activities
 * @property bool $Status
 * @property \Cake\I18n\Time $DOC
 * @property \Cake\I18n\Time $DOU
 */
class Stayprogram extends Entity
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
