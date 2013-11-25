<?php
/**
 * Created by PhpStorm.
 * User: rfontes
 * Date: 21/11/13
 * Time: 08:43
 */

namespace FormBuilder\Entity;


use FormBuilder\Base\IComponent;
use SQLTools\Entity\Field;

abstract class Component implements IComponent {

    protected $name;
    protected $length;
    protected $type;
    protected $nullable=true;
    protected $key=false;
    protected $id;
    /**
     * @var \stdClass $properties
     */
    protected $properties;


    /**
     * @param \stdClass $properties
     * @return void
     */
    abstract public function loadProperties(\stdClass $properties);
    abstract public function toHtmlField(\stdClass $json = null);

    public function toTableField(\stdClass $json = null)
    {
        return new Field($this->name, $this->type, $this->length, $this->nullable,null, false, $this->key);
    }

    /**
     * @param mixed $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }

    /**
     * @return mixed
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $value
     */
    public function setNullable($value)
    {
        $this->nullable = $value;
    }

    /**
     * @return bool
     */
    public function isNullable()
    {
        return $this->nullable;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


}