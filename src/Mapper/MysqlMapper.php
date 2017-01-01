<?php

namespace Pacificnm\Layout\Mapper;

use Zend\Hydrator\HydratorInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Update;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Delete;
use Pacificnm\Mapper\AbstractMysqlMapper;
use Pacificnm\Layout\Entity\Entity;

class MysqlMapper extends AbstractMysqlMapper implements MysqlMapperInterface
{

    /**
     * Mysql Mapper Construct
     *
     * @param AdapterInterface $readAdapter
     * @param AdapterInterface $writeAdapter
     * @param HydratorInterface $hydrator
     * @param Entity $prototype
     */
    public function __construct(AdapterInterface $readAdapter, AdapterInterface $writeAdapter, HydratorInterface $hydrator, Entity $prototype)
    {
        $this->hydrator = $hydrator;
            
        $this->prototype = $prototype;
            
        parent::__construct($readAdapter, $writeAdapter);
    }

    /**
     * {@inheritdoc}
     *
     * @see \Pacificnm\Layout\Mapper\MysqlMapperInterface::getAll()
     */
    public function getAll(array $filter)
    {
        $this->select = $this->readSql->select('layout');
                    
        $this->filter($filter); 

        $this->select->order('layout_name');
        
        if (array_key_exists('pagination', $filter)) {
            if ($filter['pagination'] == 'off') {  
                return $this->getRows();    
            }
        }

        return $this->getPaginator();
    }

    /**
     * {@inheritdoc}
     *
     * @see \Pacificnm\Layout\Mapper\MysqlMapperInterface::get()
     */
    public function get($id)
    {
        $this->select = $this->readSql->select('layout');

        $this->select->where(array(
            'layout.layout_id = ?' => $id  
        ));
                    
        return $this->getRow();
    }

    /**
     * {@inheritdoc}
     *
     * @see \Pacificnm\Layout\Mapper\MysqlMapperInterface::save()
     */
    public function save(Entity $entity)
    {
        $postData = $this->hydrator->extract($entity);
                    
        if ($entity->getLayoutId()) {
            $this->update = new Update('layout'); 
                
            $this->update->set($postData);  
                
            $this->update->where(array(
                'layout.layout_id = ?' => $entity->getLayoutId()
            ));
                    
            $this->updateRow();            
        } else {
            $this->insert = new Insert('layout'); 
                
            $this->insert->values($postData);
                
            $id = $this->createRow();
                
            $entity->setLayoutId($id);        
        }
                    
        return $this->get($entity->getLayoutId());
    }

    /**
     * {@inheritdoc}
     *
     * @see \Pacificnm\Layout\Mapper\MysqlMapperInterface::delete()
     */
    public function delete(Entity $entity)
    {
        $this->delete = new Delete('layout');
        $this->delete->where(array(
             'layout.layout_id = ?' => $entity->getLayoutId()
        ));
                 
        return $this->deleteRow();
    }

    /**
     * Filters and search
     *
     * @param array $filter
     * @return \Layout\Mapper\MysqlMapper
     */
    protected function filter(array $filter)
    {
        return $this;
    }


}

