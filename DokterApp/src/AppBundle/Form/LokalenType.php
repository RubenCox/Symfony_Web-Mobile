<?php
// src/AppBundle/Form/DokterType.php
namespace AppBundle\Form;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class LokalenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
// ...
            ->add('Omschrijving', 'text')
            ->add('ArtsID', EntityType::class, array(
                'class' => 'AppBundle:Dokters',
                'choice_label' => 'info',
                'choice_value' => 'id'

            ))
            ->add('save', 'submit', array('label' => 'Lokaal Aanpassen'))
// ...
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Lokalen',
        ));
    }
    public function getName()
    {
        return 'lokalen';
    }
}