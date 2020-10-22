<?php
namespace App\FormBuilder;

use \Core\FormBuilder;

class CommentFormBuilder extends FormBuilder
{
    /**
     * Build a comment form
     *
     * @return void
     */
    public function build()
    {
        $this->form->addField(
            new TextareaField(
                [
                    'label' => 'Commentaire',
                    'name' => 'content',
                    'placeholder' => 'Commentaire',
                    'required' => true,
                    'maxLength' => 2000,
                    'rows' => 8,
                    'validators' => [
                        new NotNullValidator(
                            'Merci de spécifier un commentaire'
                        ),
                        new MaxLengthValidator(
                            'Le commentaire ne doit pas dépasser 2000 caratères',
                            2000
                        )
                    ]
                ]
            )
        );
    }
}
