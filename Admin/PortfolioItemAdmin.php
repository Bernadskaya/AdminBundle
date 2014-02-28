<?php

namespace Ant\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class PortfolioItemAdmin extends Admin
{
    protected $baseRouteName = 'pf_item';
    protected $baseRoutePattern = 'pf_item';

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $portfolioFieldOptions = array(
            'property'=>'title',
            'label'=>'pf',
        );

        $formMapper
            ->add('file','file', array (
              'required' => false,
              'label'=>'news.file',
            ))
            ->add('portfolioId','sonata_type_model', $portfolioFieldOptions);
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('path', null, array(
                'label'=>'pf_item.created',
            ))
            ->add('created',null, array(
                'label'=>'pf_item.created',
            ))
            ->add('id', null,array(
                'label'=>'news.id',
            ))
        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('path', null, array(
                'label'=>'pf_item.path',
            ))
            ->add('created',null, array(
                'label'=>'pf_item.created',
            ))
            ->add('id', null, array(
                'label'=>'news.id',
            ))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('path', null, array(
                'label'=>'pf_item.path',
                'template'=>'AntBundle::list_thumb.html.twig'
            ))
            ->add('created',null, array(
                'label'=>'pf_item.created',
            ))

            ->add('portfolioId.title')
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
