<?php
namespace Pyz\Zed\Faq\Communication\Form;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Zed\Kernel\Communication\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FaqForm extends AbstractType
{
    /**
     * @return string
     */
    public function getBlockPrefix(): string
    {
        return 'faq';
    }

    /**
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults([
            'data_class' => FaqTransfer::class
        ]);
    }


    private const FIELD_QUESTION = 'question';
    private const FIELD_ANSWER = 'answer';
    public const BUTTON_SUBMIT = "Submit";

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this
            ->addQuestionField($builder)
            ->addAnswerField($builder)
            ->addSubmitButton($builder);

    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    private function addSubmitButton(FormBuilderInterface $builder): FaqForm
    {
        $builder->add(static::BUTTON_SUBMIT, SubmitType::class);
        return $this;
    }


    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    private function addQuestionField(FormBuilderInterface $builder): FaqForm
    {
        $builder->add(static::FIELD_QUESTION, TextType::class, [
            'constraints' => [
                new NotBlank(),
                new Length([
                    'min' => 10,
                    'minMessage' => 'FAQ question minimum length is at least {{ limit }}',
                    'max' => 150,
                    'maxMessage' => 'FAQ question maximum length is at least {{ limit }}'
                ])
            ]
        ]);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    private function addAnswerField(FormBuilderInterface $builder): FaqForm
    {
        $builder->add(static::FIELD_ANSWER, TextType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 10,
                        'minMessage' => 'FAQ answer minimum length is at least {{ limit }}',
                        'max' => 255,
                        'maxMessage' => 'FAQ answer maximum length is at least {{ limit }}'
                    ])
                ]
            ]
        );

        return $this;
    }







}
