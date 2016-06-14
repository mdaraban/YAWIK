<?php
/**
 * YAWIK
 *
 * @filesource
 * @copyright (c) 2013 - 2016 Cross Solution (http://cross-solution.de)
 * @license   MIT
 */

namespace Cv\Form;

use Core\Form\Container;
use Core\Form\ViewPartialProviderInterface;
use Core\Form\ViewPartialProviderTrait;

/**
 * CV form container
 */
class CvContainer extends Container implements ViewPartialProviderInterface
{
    use ViewPartialProviderTrait;

    /**
     * @var string
     */
    protected $defaultPartial = 'cv/form/cv-container';
    
    public function init()
    {
        $this->setName('cv-form');
        
        $this->setForms(array(
            'contact' => array(
                'type' => 'Auth/UserInfo',
                'property' => 'contact'
            ),
            'image' => array(
                'type' => 'CvContactImage',
                'property' => 'contact',
                'use_files_array' => true
            ),
            'preferredJob' => array(
                'type' => 'Cv/PreferredJobForm',
                'property' => 'preferredJob',
                'options' => array(
                    'is_disable_capable' => true,
                    'is_disable_elements_capable' => true,
                    'enable_descriptions' => true,
                    'description' => /*@translate*/  'Where do you want to work tomorrow. This heading gives an immediate overview of your desired next job.',
                ),

            ),
            'employments' => array(
                'type' => 'CvEmploymentCollection',
                'property' => 'employmentsIndexedById'
            ),
            'educations' => array(
                'type' => 'CvEducationCollection',
                'property' => 'educationsIndexedById'
            ),
            'nativeLanguage' => [
                'type' => 'Cv/NativeLanguageForm',
                'property' => true,
                'options' => array(
                    'enable_descriptions' => true,
                    'description' => /*@translate*/  'Select from list or enter your mother tongue.',
                ),
            ],
            'languageSkills' => [
                'type' => 'Cv/LanguageSkillCollection',
                'property' => 'languageSkillsIndexedById',
            ],
            'skills' => array(
                'type' => 'CvSkillCollection',
                'property' => 'skillsIndexedById'
            )
        ));
    }
}