<?php

namespace Ant\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
//use Ant\WebBundle\Entity\ImageNews;
//use Ant\AdminBundle\Admin\ImageNewsAdmin;

class NewsAdmin extends Admin
{

    protected $baseRouteName = 'news';
    protected $baseRoutePattern = 'news';

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title','text', array(
                'label'=>'news.title',
                'attr' => array('class'=>'form-control')

            ))
            ->add('description','textarea', array(
                'label'=>'news.description',
                'attr' => array('class'=>'form-control')

            ))
            ->add('text','tinymce', array(
                'required' => false,
                'label'=>'news.text',
            ))
            ->add('metaKey','text', array(
                'label'=>'news.metaKey',
                'required' => false,
                'attr' => array('class'=>'form-control')
            ))
            ->add('metaDesc','textarea', array(
                'label'=>'news.metaDesc',
                'required' => false,
                'attr' => array('class'=>'form-control')
            ))
            ->add('media', 'sonata_media_type', array(
                'provider' => 'sonata.media.provider.image',
                'context'  => 'default',
                'required' => false))

        ;


        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add(
                'title', 'text', array(
                'label'=>'news.title',
            ))
            ->add(
                'description', 'text', array(
                'label'=>'news.description',
            ))
            ->add(
                'text', 'text', array(
                'required' => false,
                'label'=>'news.text'
                ))
            ->add(
                'metaKey', 'text',array(
                'label'=>'news.metaKey',
            ))
            ->add(
                'metaDesc', 'text', array(
                'label'=>'news.metaDesc',
            ))

           ;
        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title', null, array(
                'label'=>'news.title',
            ))

            ->add('created', 'doctrine_orm_datetime_range', array(
                'input_type' => 'timestamp',
                'label'=>'news.created',
            ))
            ->add('updated', 'doctrine_orm_datetime_range', array(
                'input_type' => 'timestamp',
                'label'=>'news.updated',
            ))
            ->add('id', null, array(
                'label'=>'news.id',
            ));
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id', null, array(
        'label'=>'news.id',
    ))
            ->add('title', null, array(
                'label'=>'news.title',
            ))
            ->add('created',null, array(
        'label'=>'news.created',
    ))
            ->add('updated', null, array(
                'label'=>'news.updated',
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
