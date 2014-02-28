<?php

namespace Ant\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;
use Ant\AdminBundle\Admin\AdAdmin as BaseAdmin;

class SecondAdAdmin extends BaseAdmin
{


    protected $baseRouteName = 'ad_second';
    protected $baseRoutePattern = 'ad_second';



    public function createQuery($context = 'list')
    {
        $queryBuilder = $this->AdQuery (2);
        $query = new ProxyQuery($queryBuilder);
        return $query;
    }


    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        parent::configureListFields($listMapper);

    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        parent::configureFormFields($formMapper);

        $queryBuilder = $this->AdGroupQuery(2);


        $adGroupFieldOptions = array(
            'property'=>'title',
            'label'=>'ad.group',
            'attr' => array('class'=>'form-control'),
            'query'=>$queryBuilder
        );

        $formMapper
            ->add('adGroup', 'sonata_type_model', $adGroupFieldOptions);

    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        parent::configureShowFields($showMapper);

    }
}
