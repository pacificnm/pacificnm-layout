<?php
namespace Pacificnm\Layout\Form;

use Zend\Form\Form as ZendForm;
use Zend\InputFilter\InputFilterProviderInterface;
use Pacificnm\Layout\Entity\Entity;
use Pacificnm\Layout\Hydrator\Hydrator;
use Zend\Db\Adapter\AdapterInterface;

class Form extends ZendForm implements InputFilterProviderInterface
{

    /**
     *
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     *
     * @var boolean
     */
    protected $edit;

    /**
     *
     * @param string $name            
     * @param array $options            
     */
    public function __construct(AdapterInterface $adapter, $edit = false, $name = 'layout-form', $options = array())
    {
        parent::__construct($name, $options);
        
        $this->setHydrator(new Hydrator(false));
        
        $this->setObject(new Entity());
        
        $this->adapter = $adapter;
        
        $this->edit = $edit;
        
        // layoutId
        $this->add(array(
            'name' => 'layoutId',
            'type' => 'hidden',
            'attributes' => array(
                'id' => 'layoutId'
            )
        ));
        
        // layoutName
        $this->add(array(
            'name' => 'layoutName',
            'type' => 'Text',
            'options' => array(
                'label' => 'Layout Name:'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'layoutName'
            )
        ));
        
        // layoutFile
        $this->add(array(
            'name' => 'layoutFile',
            'type' => 'Text',
            'options' => array(
                'label' => 'Layout File:'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'layoutFile',
                'placeholder' => 'layout/file.phtml'
            )
        ));
        
        // layoutActive
        $this->add(array(
            'type' => 'Checkbox',
            'name' => 'layoutActive',
            'options' => array(
                'label' => 'Active',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0'
            ),
            'attributes' => array(
                'id' => 'layoutActive'
            )
        ));
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'button',
            'attributes' => array(
                'value' => 'Submit',
                'id' => 'submit',
                'class' => 'btn btn-primary btn-flat'
            )
        ));
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\InputFilter\InputFilterProviderInterface::getInputFilterSpecification()
     */
    public function getInputFilterSpecification()
    {
        $validators = array();
        
        $validators[] = array(
            // layoutId
            'layoutId' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                )
            )
        );
        
        // layoutName
        if ($this->edit) {
            $validators[] = array(
                'layoutName' => array(
                    'required' => true,
                    'filters' => array(
                        array(
                            'name' => 'StripTags'
                        ),
                        array(
                            'name' => 'StringTrim'
                        )
                    ),
                    'validators' => array(
                        array(
                            'name' => 'NotEmpty',
                            'break_chain_on_failure' => true,
                            'options' => array(
                                'messages' => array(
                                    \Zend\Validator\NotEmpty::IS_EMPTY => "The Layout Name is required and cannot be empty."
                                )
                            )
                        )
                    )
                )
            );
        } else {
            $validators[] = array(
                'layoutName' => array(
                    'required' => true,
                    'filters' => array(
                        array(
                            'name' => 'StripTags'
                        ),
                        array(
                            'name' => 'StringTrim'
                        )
                    ),
                    'validators' => array(
                        array(
                            'name' => 'NotEmpty',
                            'break_chain_on_failure' => true,
                            'options' => array(
                                'messages' => array(
                                    \Zend\Validator\NotEmpty::IS_EMPTY => "The Layout Name is required and cannot be empty."
                                )
                            )
                        ),
                        array(
                            'name' => 'NoRecordExists',
                            'break_chain_on_failure' => true,
                            'options' => array(
                                'table' => 'layout',
                                'field' => 'layout_name',
                                'adapter' => $this->adapter
                            )
                        )
                    )
                )
            );
        }
        
        $validators[] = array(
            // layoutFile
            'layoutFile' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'break_chain_on_failure' => true,
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\NotEmpty::IS_EMPTY => "The Layout File is required and cannot be empty."
                            )
                        )
                    )
                )
            )
        )
        ;
        
        $validators[] = array(
            // layoutActive
            'layoutId' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                )
            )
        );
        
        return $validators;
    }
    
    /**
     * 
     * @param boolean $edit
     * @return \Pacificnm\Layout\Form\Form
     */
    public function setEdit($edit) 
    {
        $this->edit = $edit;
        
        return $this;
    }
    
    /**
     * 
     * @return boolean
     */
    public function getEdit()
    {
        return $this->edit;
    }
}

