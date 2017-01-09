<?php
namespace Pacificnm\Layout\Mapper;

use Zend\Paginator\Paginator;
use Pacificnm\Layout\Entity\Entity;

interface MysqlMapperInterface
{

    /**
     *
     * @param array $filter            
     * @return Paginator
     */
    public function getAll(array $filter);

    /**
     *
     * @param number $id            
     * @return Entity
     */
    public function get($id);

    /**
     *
     * @param string $layoutName            
     * @return \Pacificnm\Mapper\ArrayObject|\Pacificnm\Mapper\NULL
     */
    public function getLayoutByName($layoutName);

    /**
     *
     * @param Entity $entity            
     * @return Entity
     */
    public function save(Entity $entity);

    /**
     *
     * @param Entity $entity            
     * @return Boolean
     */
    public function delete(Entity $entity);
}

