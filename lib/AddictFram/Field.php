<?php
namespace AddictFram;
 
abstract class Field
{
  use Hydrator;
 
  protected $errorMessage;
  protected $label;
  protected $name;
  protected $id;
  protected $validators = [];
  protected $value;
  protected $type;
  protected $placeHolder;
  protected $required;
  protected $accept;

  public function __construct(array $options = [])
  {
    if (!empty($options))
    {
      $this->hydrate($options);
    }
  }
 
  abstract public function buildWidget();
 
  public function isValid()
  {
    foreach ($this->validators as $validator)
    {
      if (!$validator->isValid($this->value))
      {
        $this->errorMessage = $validator->errorMessage();
        return false;
      }
    }
 
    return true;
  }
 
  public function label()
  {
    return $this->label;
  }
 
  public function length()
  {
    return $this->length;
  }
 
  public function name()
  {
    return $this->name;
  }
 
  public function validators()
  {
    return $this->validators;
  }
 
  public function value()
  {
    return $this->value;
  }

  public function type()
  {
    return $this->type;
  }

  public function required()
  {
    return $this->required;
  }

  public function placeHolder()
  {
    return $this->placeHolder;
  }

  public function accept()
  {
    return $this->accept;
  }
 
  public function setLabel($label)
  {
    if (is_string($label))
    {
      $this->label = $label;
    }
  }

  public function setRequired($required)
  {
    if (is_string($required))
    {
      $this->required = $required;
    } 
  }
 
  public function setLength($length)
  {
    $length = (int) $length;
 
    if ($length > 0)
    {
      $this->length = $length;
    }
  }
 
  public function setName($name)
  {
    if (is_string($name))
    {
      $this->name = $name;
    }
  }

  public function setType($type)
  {
    if (is_string($type))
    {
      $this->type = $type;
    }
  }

  public function setPlaceHolder($placeHolder)
  {
    if (is_string($placeHolder))
    {
      $this->placeHolder = $placeHolder;
    }
  }

  public function setAccept($accept)
  {
    if (is_string($accept))
    {
      $this->accept = $accept;
    }
  }
 
  public function setValidators(array $validators)
  {
    foreach ($validators as $validator)
    {
      if ($validator instanceof Validator && !in_array($validator, $this->validators))
      {
        $this->validators[] = $validator;
      }
    }
  }
 
  public function setValue($value)
  {
    if (is_string($value))
    {
      $this->value = $value;
    }
  }
}