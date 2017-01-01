<?php
namespace Pacificnm\Layout\Entity;

class Entity
{

    /**
     *
     * @var number
     */
    protected $layoutId;

    /**
     *
     * @var string
     */
    protected $layoutName;

    /**
     *
     * @var string
     */
    protected $layoutFile;

    /**
     *
     * @var boolean
     */
    protected $layoutActive;

    /**
     *
     * @return the $layoutId
     */
    public function getLayoutId()
    {
        return $this->layoutId;
    }

    /**
     *
     * @return the $layoutName
     */
    public function getLayoutName()
    {
        return $this->layoutName;
    }

    /**
     *
     * @return the $layoutFile
     */
    public function getLayoutFile()
    {
        return $this->layoutFile;
    }

    /**
     *
     * @return the $layoutActive
     */
    public function getLayoutActive()
    {
        return $this->layoutActive;
    }

    /**
     *
     * @param number $layoutId            
     */
    public function setLayoutId($layoutId)
    {
        $this->layoutId = $layoutId;
    }

    /**
     *
     * @param string $layoutName            
     */
    public function setLayoutName($layoutName)
    {
        $this->layoutName = $layoutName;
    }

    /**
     *
     * @param string $layoutFile            
     */
    public function setLayoutFile($layoutFile)
    {
        $this->layoutFile = $layoutFile;
    }

    /**
     *
     * @param boolean $layoutActive            
     */
    public function setLayoutActive($layoutActive)
    {
        $this->layoutActive = $layoutActive;
    }
}

