<?php
namespace JFBlog;

class NotNullValidator extends Validator
{
  public function isValid($value)
  {
    return $value != '';
  }
}