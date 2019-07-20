<?php
namespace FormBuilder;

use \JFBlog\FormBuilder;
use \JFBlog\StringField;
use \JFBlog\MaxLengthValidator;
use \JFBlog\NotNullValidator;

class EditFormBuilder extends FormBuilder
{
  public function build()
  {
    $this->form->add(new StringField([
        'label' => 'Pseudo',
        'name' => 'pseudo',
        'type' => 'text',
        'required' => 'false',
        'placeHolder' => 'Nouveau pseudo',
        'maxLength' => 20,
        'validators' => [
          new MaxLengthValidator('Le pseudo spécifié est trop long (20 caractères maximum)', 20),
          new NotNullValidator('Merci de spécifier le pseudo'),
        ],
       ]))
       ->add(new StringField([
        'label' => 'Nom',
        'name' => 'name',
        'type' => 'text',
        'required' => 'false',
        'placeHolder' => 'Entrez votre nom',
        'maxLength' => 100,
        'validators' => [
          new MaxLengthValidator('Le nome spécifié est invalide (100 caractères maximum)', 100),
          new NotNullValidator('Merci de spécifier un nom'),
        ],
       ]))
       ->add(new StringField([
        'label' => 'Adresse email',
        'name' => 'mail',
        'type' => 'email',
        'placeHolder' => 'Entrez votre adresse mail',
        'maxLength' => 100,
        'validators' => [
          new MaxLengthValidator('L\'adresse mail spécifiée est trop long (100 caractères maximum)', 100),
          new NotNullValidator('Merci de spécifier une adresse mail'),
        ],
       ]))
       ->add(new StringField([
        'label' => 'Profession',
        'name' => 'profession',
        'required' => 'false',
        'type' => 'text',
        'placeHolder' => 'Entrez votre profession',
        'maxLength' => 100,
        'validators' => [
          new MaxLengthValidator('Le titre de la profession est invalide (255caractères maximum)', 255),
          new NotNullValidator('Merci de spécifier une profession'),
        ],
       ]))
       ->add(new StringField([
        'label' => 'Numéro de tel.',
        'name' => 'phone',
        'type' => 'tel',
        'required' => 'false',
        'placeHolder' => 'Entrez votre numéro de tel.',
        'maxLength' => 100,
        'validators' => [
          new NotNullValidator('Merci de spécifier un numéro'),
        ],
       ]));
  }
}