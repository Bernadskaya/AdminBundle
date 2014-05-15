<?php
/**
 * Created by PhpStorm.
 * User: nevada
 * Date: 09.03.14
 * Time: 16:10
 */

namespace Ant\AdminBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\MediaBundle\Provider\Pool;


class GalleryAdmin extends Admin
{
    protected $pool;

    /**
     * @param string                            $code
     * @param string                            $class
     * @param string                            $baseControllerName
     * @param \Sonata\MediaBundle\Provider\Pool $pool
     */
    public function __construct($code, $class, $baseControllerName, Pool $pool)
    {
        parent::__construct($code, $class, $baseControllerName);

        $this->pool = $pool;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $context = $this->getPersistentParameter('context');

        if (!$context) {
            $context = $this->pool->getDefaultContext();
        }

        $formats = array();
        foreach ((array) $this->pool->getFormatNamesByContext($context) as $name => $options) {
            $formats[$name] = $name;
        }

        $contexts = array();
        foreach ((array) $this->pool->getContexts() as $contextItem => $format) {
            $contexts[$contextItem] = $contextItem;
        }

        $formMapper
            ->add('context', 'sonata_type_translatable_choice', array(
                'choices' => $contexts,
                'catalogue' => 'SonataMediaBundle'
            ))
            ->add('enabled', null, array('required' => false))
            ->add('name')
            ->add('description',null, array('required' => false))
            ->add('link', null, array('required' => false))
            ->add('defaultFormat', 'choice', array('choices' => $formats))
            ->add('galleryHasMedias', 'sonata_type_collection', array(
                    'cascade_validation' => true,
                ), array(
                    'edit'              => 'inline',
                    'inline'            => 'table',
                    'sortable'          => 'position',
                    'link_parameters'   => array('context' => $context),
                    'admin_code'        => 'sonata.media.admin.gallery_has_media'
                )
            )
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('enabled', 'boolean', array('editable' => true))
            ->add('context', 'trans', array('catalogue' => 'SonataMediaBundle'))
            ->add('defaultFormat', 'trans', array('catalogue' => 'SonataMediaBundle'))
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('enabled')
            ->add('context')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function prePersist($gallery)
    {
        $parameters = $this->getPersistentParameters();

        $gallery->setContext($parameters['context']);

        // fix weird bug with setter object not being call
        $gallery->setGalleryHasMedias($gallery->getGalleryHasMedias());
    }

    /**
     * {@inheritdoc}
     */
    public function preUpdate($gallery)
    {
        // fix weird bug with setter object not being call
        $gallery->setGalleryHasMedias($gallery->getGalleryHasMedias());
    }

    /**
     * {@inheritdoc}
     */
    public function getPersistentParameters()
    {
        if (!$this->hasRequest()) {
            return array();
        }

        return array(
            'context'  => $this->getRequest()->get('context', $this->pool->getDefaultContext()),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getNewInstance()
    {
        $gallery = parent::getNewInstance();

        if ($this->hasRequest()) {
            $gallery->setContext($this->getRequest()->get('context'));
        }

        return $gallery;
    }
}
