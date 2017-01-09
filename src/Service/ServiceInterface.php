<?php
namespace Pacificnm\Layout\Service;

use Pacificnm\Layout\Entity\Entity;

interface ServiceInterface
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

