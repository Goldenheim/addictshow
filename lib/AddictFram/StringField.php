<?php
namespace AddictFram;

class StringField extends Field
{
  protected $maxLength;
  
  public function buildWidget()
  {
    $widget = '';
    
    if (!empty($this->errorMessage))
    {
      $widget .= $this->errorMessage.'<br />';
    }
    
    $widget .= '<div class="form-group"><label class="display-5" for="'.$this->name.'">'.$this->label.'</label><div id="editInput" class="d-flex align-items-center"><input type="'.$this->type.'" name="'.$this->name.'" id="'.$this->name.'"class="form-control "';

    if (!empty($this->placeHolder))
    {
      $widget .= ' placeHolder="'.htmlspecialchars($this->placeHolder).'"';
    }

    if (!empty($this->value))
    {
      $widget .= ' value="'.htmlspecialchars($this->value).'"';
    }

    if (!empty($this->required))
    {
      $widget .= ' required="'.htmlspecialchars($this->required).'"';
    }

    if (!empty($this->accept))
    {
      $widget .= ' accept="'.htmlspecialchars($this->accept).'"';
    }
    
    if (!empty($this->maxLength))
    {
      $widget .= ' maxlength="'.$this->maxLength.'"';
    }
    
    return $widget .= ' /><span id="regex_Help_' . $this->name . '" class="ml-1"></span></div></div>';
  }
  
  public function setMaxLength($maxLength)
  {
    $maxLength = (int) $maxLength;
    
    if ($maxLength > 0)
    {
      $this->maxLength = $maxLength;
    }
    else
    {
      throw new \RuntimeException('La longueur maximale doit être un nombre supérieur à 0');
    }
  }
}