<?php

namespace App\Form;

use App\Entity\Project;
use App\Entity\Technology;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', null, [
                'label' => 'Titre'
            ])
            ->add('description', null, [
                'label' => 'Description'
            ])
            ->add('screenshot', FileType::class, [
                'label' => 'Screenshot (PNG, JPEG)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '5M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Les formats autorisés sont JPEG et PNG.',
                    ])
                ],
            ])
            ->add('etc', null, [
                'label' => 'Description'
            ])
//            ->add('technologies', EntityType::class, [
//                'class' => Technology::class,
//                'choice_label' => 'id',
//                'multiple' => true,
//            ])
            ->add('user', EntityType::class, [
                'label' => 'Utilisateur',
                'class' => User::class,
                'choice_label' => 'email',
            ])
            ->add('created_at', null, [
                'label' => 'Date de création',
                'widget' => 'single_text'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
