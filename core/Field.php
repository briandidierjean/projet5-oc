<?php
namespace Core;

abstract class Field
{
    use Hydrator;

    protected $id;
    protected $class;
    protected $label;
    protected $name;
    protected $value;
    protected $placeholder;
    protected $required;
    protected $maxLength;
    protected $errorMsg;
    protected $validators = [];

    public function __construct(array $options = [])
    {
        if (!empty($options)) {
            $this->hydrate($options);
        }
    }

    /**
     * Create a view representing a field
     *
     * @return string
     */
    abstract public function build();

    /**
     * Check if a field data is valid
     *
     * @return bool
     */
    public function isValid()
    {
        foreach ($this->validators as $validator) {
            if (!$validator->isValid($this->value)) {
                $this->errorMsg = $validator->getErrorMsg();
                return false;
            }
        }

        return true;
    }

    // GETTERS
    public function getId()
    {
        return $this->id;
    }

    public function getClass()
    {
        return $this->class;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getPlaceholder()
    {
        return $this->placeholder;
    }

    public function getRequired()
    {
        return $this->required;
    }

    public function getMaxLength()
    {
        return $this->maxLength;
    }

    public function getErrorMsg()
    {
        return $this->errorMsg;
    }

    public function getValidators()
    {
        return $this->validators;
    }

    // SETTERS
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setClass($class)
    {
        $this->class = $class;
    }

    public function setLabel($label)
    {
        $this->label = $label;
    }

    public function setName($name)
    {
        if (is_string($name)) {
            $this->name = $name;
        }
    }

    public function setValue($value)
    {
        if (is_string($value)) {
            $this->value = $value;
        }
    }

    public function setPlaceholder($placeholder)
    {
        if (is_string($placeholder)) {
            $this->placeholder = $placeholder;
        }
    }

    public function setRequired($required)
    {
        if (is_bool($required)) {
            $this->required = $required;
        }
    }

    public function setMaxLength($maxLength)
    {
        $this->maxLength = (int) $maxLength;
    }

    public function setErrorMsg($errorMsg)
    {
        if (is_string($errorMsg)) {
            $this->errorMsg = $errorMsg;
        }
    }

    public function setValidators(array $validators)
    {
        foreach ($validators as $validator) {
            if ($validator instanceof Validator
                && !in_array($validator, $this->validators)
            ) {
                $this->validators[] = $validator;
            }
        }
    }
}
