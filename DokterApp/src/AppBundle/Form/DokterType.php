<?php
// src/AppBundle/Form/DokterType.php
namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
class DokterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $profielfoto = 'profielfoto';
        $builder
            ->add('naam', 'text')
            ->add('voornaam', 'text')
            ->add('nummer', 'text')
            ->add($profielfoto, FileType::class, array('label' => 'Profielfoto (JPG file)', 'data_class' => null))
            ->add('save', 'submit', array('label' => 'Start'))
// ...
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Dokters',
        ));
    }
    public function getName()
    {
        return 'dokter';
    }
}