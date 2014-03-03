<?php

namespace Ant\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class PortfolioAdmin extends Admin
{
    protected $baseRouteName = 'pf';
    protected $baseRoutePattern = 'pf';

    protected function configureFormFields(FormMapper $formMapper)
    {
//        $this->setFormTheme(array(
//            'AntBundle:Form:form_admin_fields.html.twig',
//        ));

        $formMapper
            ->add('title', 'text', array(
                'label' => 'portfolio.title',
                'attr'  => array('class' => 'form-control')
            ))
            ->add('description', 'textarea', array(
                'label' => 'portfolio.description',
                'attr'  => array('class' => 'form-control')
            ))
            ->add('metaKey', 'text', array(
                'label' => 'portfolio.metaKey',
                'attr'  => array('class' => 'form-control')
            ))
            ->add('metaDesc', 'text', array(
                'label' => 'portfolio.metaDesc',
                'attr'  => array('class' => 'form-control')
            ))
//            ->add('position', 'text', array(
//                'label' => 'portfolio.position',
//                'attr'  => array('class' => 'form-control')
//            ))
            ->add('gallery', 'sonata_type_admin',
                array(),
                array('admin_code' => 'sonata.media.admin.gallery'));



//            ->add('images', 'sonata_type_collection', array(
//                'label'    => 'portfolio.images',
//                'required' => false,
//            ), array(
//                'edit'     => 'inline',
//                'inline'   => 'table',
//                'sotrable' => 'position',
//            ))

        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('title', null, array('label' => 'portfolio.title'))
            ->add('description', null, array('label' => 'portfolio.title'))
            ->add('metaKey', null, array('label' => 'portfolio.description'))
            ->add('metaDesc', null, array('label' => 'portfolio.metaDesc'))
//            ->add('position', null, array('label' => 'portfolio.position'))
            ->add('created', null, array('label' => 'portfolio.created'))
            ->add('id', null, array('label' => 'portfolio.id'))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id', null, array('label' => 'portfolio.id'))
            ->add('title', null, array('label' => 'portfolio.title'))
//            ->add('position', null, array('label' => 'portfolio.position'))
            ->add('created', null, array('label' => 'portfolio.created'))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id', null, array('label' => 'portfolio.id'))
            ->add('title', null, array('label' => 'portfolio.title'))
            ->add('created', null, array('label' => 'portfolio.created'))
            ->add('_action', 'actions', array(
                'label'   => 'admin.action',
                'actions' => array(
                    'show'   => array(),
                    'edit'   => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

//    public function prePersist($pf)
//    {
//        $this->manageEmbeddedImageAdmins($pf);
//    }
//
//    public function preUpdate($pf)
//    {
//        $this->manageEmbeddedImageAdmins($pf);
//    }
//
//    private function manageEmbeddedImageAdmins($pf)
//    {
//        foreach ($this->getFormFieldDescriptions() as $fieldName => $fieldDescription) {
//            if ($fieldDescription->getType() === 'sonata_type_collection'
//                && ($associationMapping = $fieldDescription->getAssociationMapping())
//                && $associationMapping['targetEntity'] === 'Ant\WebBundle\Entity\Image'
//            ) {
//                $getter  = 'get'.$fieldName;
//                $remover = 'remove'.$fieldName;
//
//                $images = $pf->$getter();
//
//                foreach ($images as $k => $image) {
//                    $request = $this->getRequest()->get($fieldDescription->getAdmin()->getUniqid());
//                    if ((!is_object($image->getUploadFile()) && !$image->getPath())
//                        || isset($request[$fieldName][$k]['_delete'])
//                    ) {
//                        $pf->$remover($image);
//                    } else {
//                        $image->setPortfolio($pf);
//                        $image->setUpdated(new \DateTime());
//                    }
//                }
//            }
//        }
//    }
}
