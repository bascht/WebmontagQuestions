<?php

require_once dirname(__FILE__).'/../lib/questionGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/questionGeneratorHelper.class.php';

/**
 * question actions.
 *
 * @package    webmontag
 * @subpackage question
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class questionActions extends autoQuestionActions
{
  public function executeShow(sfWebRequest $request)
  {
    $this->question = $this->getRoute()->getObject();
  }
}
