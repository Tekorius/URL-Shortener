<?php

namespace AppBundle\Form;

use AppBundle\Entity\Url;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class UrlForm extends AbstractType
{
    private $options;

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->options = $options;

        $builder
            ->addEventListener(FormEvents::PRE_SET_DATA, [$this, 'preSetData'])

            ->add('full', UrlType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Full URL cannot be blank']),
                    new Assert\Url(['message' => 'Full URL must be a valid URL']),
                ],
                'invalid_message' => 'Full URL must be a valid URL',
            ])
            ->add('short', TextType::class, [
                'required' => false,
            ])
        ;
    }

    public function preSetData(FormEvent $event)
    {
        // Remove short link option if customization is not allowed
        if (!$this->options['can_customize']) {
            $event->getForm()->remove('short');
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Url::class,
            'can_customize' => false,
        ]);

        $resolver->setRequired(['can_customize']);
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_url_form';
    }
}
