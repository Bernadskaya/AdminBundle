<?php

namespace Ant\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class OrderFormAdmin extends Admin
{
    protected $baseRouteName = 'order';
    protected $baseRoutePattern = 'order';



    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name','text', array(
                'label'=>'orders.name',
                'attr' => array('class'=>'form-control')
            ))
            ->add('surname','text', array(
                'label'=>'orders.surname',
                'attr' => array('class'=>'form-control')
            ))
            ->add('email','text', array(
                'label'=>'orders.email',
                'attr' => array('class'=>'form-control')
            ))
            ->add('phone','text', array(
                'label'=>'orders.phone',
                'attr' => array('class'=>'form-control')
            ))
            ->add('text','text', array(
                'label'=>'orders.text',
                'attr' => array('class'=>'form-control')
            ))
            ->add('agreement','checkbox', array(
                'label'=>'orders.agreement',
                'attr' => array('class'=>'form-control')
            ))
        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name',null, array(
                'label'=>'orders.name'
            ))
            ->add('surname',null, array(
                'label'=>'orders.surname'
            ))
            ->add('email',null, array(
                'label'=>'orders.email'
            ))
            ->add('phone',null, array(
                'label'=>'orders.phone'
            ))
            ->add('id',null, array(
                'label'=>'orders.id'
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
                'label'=>'orders.id'
            ))
            ->add('created','date', array(
                'label'=>'orders.created'
            ))
            ->add('name',null, array(
                'label'=>'orders.name'
            ))
            ->add('surname',null, array(
                'label'=>'orders.surname'
            ))
            ->add('email',null, array(
                'label'=>'orders.email'
            ))
            ->add('phone',null, array(
                'label'=>'orders.phone'
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


    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name',null, array(
                'label'=>'orders.name'
            ))
            ->add('surname',null, array(
                'label'=>'orders.surname'
            ))
            ->add('email',null, array(
                'label'=>'orders.email'
            ))
            ->add('phone',null, array(
                'label'=>'orders.phone'
            ))
            ->add('created',null, array(
                'label'=>'orders.created'
            ))
            ->add('id',null, array(
                'label'=>'orders.id'
            ))
        ;
    }
}
