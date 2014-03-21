<?php
/**
 * Created by PhpStorm.
 * User: nevada
 * Date: 20.03.14
 * Time: 15:23
 */

namespace Ant\AdminBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class TinymceType extends TextareaType  {

    public function getParent()
    {
        return 'textarea';
    }

    public function getName()
    {
        return 'tinymce';
    }
}

