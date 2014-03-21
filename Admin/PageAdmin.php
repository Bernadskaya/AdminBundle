<?php

namespace Ant\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class PageAdmin extends Admin
{
    protected $baseRouteName = 'page';
    protected $baseRoutePattern = 'page';



    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array(
                'label'=>'pages.title',

                'attr' => array('class'=>'form-control')
            ))
            ->add('text','tinymce', array(
                'required' => false,
                'label'=>'pages.text',
            ))
            ->add('metaKey','text', array(
                'label'=>'pages.metaKey',

                'attr' => array('class'=>'form-control')
            ))
            ->add('metaDesc','text', array(
                'label'=>'pages.metaDesc',

                'attr' => array('class'=>'form-control')
            ))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id',null, array(
        'label'=>'pages.id'
    ))
            ->add('title',null, array(
                'label'=>'pages.title'
            ))
            ->add('text',null, array(
                'label'=>'pages.text'
            ))
            ->add('metaKey',null, array(
                'label'=>'pages.metaKey'
            ))
            ->add('metaDesc',null, array(
                'label'=>'pages.metaDesc'
            ))
            ->add('slug',null, array(
                'label'=>'pages.slug'
            ))
        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title',null, array(
                'label'=>'pages.title'
            ))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id',null, array(
                'label'=>'pages.id'
            ))
            ->add('title',null, array(
                'label'=>'pages.title'
            ))
            ->add('_action', 'actions', array(
                'label'=>'admin.actions',
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

}
