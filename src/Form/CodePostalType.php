<?php

namespace App\Form;

use Normalizer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Webmozart\Assert\Assert;

class CodePostalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('codepostal', IntegerType::class, [
                'label' => 'Code postal',
                'constraints' => [
                    new Length([
                        'min' => 2,
                        'max' => 5,
                        'minMessage' => 'Your first name must be at least {{ limit }} characters long',
                        'maxMessage' => 'Your first name cannot be longer than {{ limit }} characters',
                        ]),
                    new NotBlank([
                        'message' => 'entrer un code postal'
                    ])
                ]

                ])
            ->add('town', TextType::class,[
                'label' => 'Ville',
            ])
            ->add('submit', SubmitType::class, ['label' => 'Chercher'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
