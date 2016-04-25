<?php
/**
 * @package     Mautic
 * @copyright   2014 Mautic Contributors. All rights reserved.
 * @author      Mautic
 * @link        http://mautic.org
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace Mautic\LeadBundle\Form\Type;

use Mautic\CoreBundle\Factory\MauticFactory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

/**
 * Class FormSubmitActionAddUtmTagType
 *
 * @package Mautic\LeadBundle\Form\Type
 */
class FormSubmitActionAddUtmTagsType extends AbstractType
{
    private $factory;

    /**
     * @param MauticFactory $factory
     */
    public function __construct(MauticFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'add_utmtags',
            'lead_utmtag',
            array(
                'label' => 'mautic.lead.utmtags.add',
                'attr' => array(
                    'data-placeholder'      => $this->factory->getTranslator()->trans('mautic.lead.utmtags.select_or_create'),
                    'data-no-results-text'  => $this->factory->getTranslator()->trans('mautic.lead.utmtags.enter_to_create'),
                    'data-allow-add'        => 'true',
                    'onchange'              => 'Mautic.createLeadUtmTag(this)'
                ),
                'data' => (isset($options['data']['add_utmtags'])) ? $options['data']['add_utmtags'] : null,
                'add_transformer' => true
            )
        );

        $builder->add(
            'remove_utmtags',
            'lead_utmtag',
            array(
                'label' => 'mautic.lead.utmtags.remove',
                'attr' => array(
                    'data-placeholder'      => $this->factory->getTranslator()->trans('mautic.lead.utmtags.select_or_create'),
                    'data-no-results-text'  => $this->factory->getTranslator()->trans('mautic.lead.utmtags.enter_to_create'),
                    'data-allow-add'        => 'true',
                    'onchange'              => 'Mautic.createLeadUtmTag(this)'
                ),
                'data' => (isset($options['data']['remove_utmtags'])) ? $options['data']['remove_utmtags'] : null,
                'add_transformer' => true
            )
        );

    }

    /**
     * @return string
     */
    public function getName()
    {
        return "lead_submitaction_addutmtags";
    }
}
