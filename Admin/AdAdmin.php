<?php
/**
 * Created by PhpStorm.
 * User: nevada
 * Date: 07.01.14
 * Time: 14:53
 */

namespace Ant\AdminBundle\Admin;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class AdAdmin extends Admin {

    protected $baseRouteName = 'ads';
    protected $baseRoutePattern = 'ads';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $adGroupFieldOptions = array(
            'property'=>'title',
            'label'=>'ad.group',
            'attr' => array('class'=>'form-control')
        );
        $formMapper
            ->add('text','textarea', array(
                'required' => false,
                'label'=>'ad.text',
                'attr' => array(
                    'class' => 'form-control tinymce',
                    'tinymce'=>'{"theme":"simple"}',
                )))
            ->add('adGroup', 'sonata_type_model', $adGroupFieldOptions)
            ->add('position','text', array (
                'required' => false,
                'attr' => array('class'=>'form-control'),
                'label'=>'ad.position'
            ))
            ->add('url','text', array (
                'required' => false,
                'attr' => array('class'=>'form-control'),
                'label'=>'ad.url'
            ))
            ->add('media', 'sonata_media_type', array(
                'provider' => 'sonata.media.provider.image',
                'context'  => 'default',
                'required' => false))


        ;
    }

    protected  function AdQuery ($id) {
        $em = $this->modelManager->getEntityManager('Ant\WebBundle\Entity\Ad');

        $queryBuilder = $em
            ->createQueryBuilder('a')
            ->select('a')
            ->from('AntWebBundle:Ad', 'a')
            ->where('a.adGroup = :id')
            ->setParameter('id', $id);

        return $queryBuilder;
    }

    protected function AdGroupQuery ($id) {
        $em = $this->modelManager->getEntityManager('Ant\WebBundle\Entity\AdGroup');

        $queryBuilder = $em
            ->createQueryBuilder('a')
            ->select('a')
            ->from('AntWebBundle:AdGroup', 'a')
            ->where('a.id = :id')
            ->setParameter('id', $id);

        return $queryBuilder;

    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id',null, array(
                'label'=>'ad.id'))
            ->add('adGroup.title',null,array('label'=>'ad.group'))
            ->add('text', null, array('template' => 'AntWebBundle::list_custom.html.twig'))
            ->add('url',null, array(
                'label'=>'ad.url'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

} 