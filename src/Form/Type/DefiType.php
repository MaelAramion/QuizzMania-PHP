<?php

namespace App\Form\Type;

use App\Entity\Defi;
use App\Entity\Joueur;
use App\Entity\Question;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DefiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('joueur_destinataire', EntityType::class, [
                'class' => Joueur::class
            ])
            ->add('question',EntityType::class, [
                'class' => Question::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('q')
                        ->where('q.Validated = true');
                },
            ])
            ->add('limit_date', DateTimeType::class)
            ->add('valider', SubmitType::class);
    }
// Ici, on défini de manière explicite le « data_class »
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Defi::class,
        ]);
    }

}