<?php
// auto-generated by sfViewConfigHandler
// date: 2012/12/25 12:39:41
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'System Mailingowy', false, false);
  $response->addMeta('description', 'System Mailingowy', false, false);
  $response->addMeta('keywords', 'System Mailingowy', false, false);
  $response->addMeta('language', 'System Mailingowy', false, false);
  $response->addMeta('robots', 'index, follow', false, false);

  $response->addStylesheet('bootstrap/bootstrap.min.css', '', array ());
  $response->addStylesheet('main.css', '', array ());
  $response->addJavascript('jQuery.js', '', array ());
  $response->addJavascript('bootstrap/bootstrap.min.js', '', array ());
  $response->addJavascript('bootstrap/bootstrap-dropdown.js', '', array ());
  $response->addJavascript('main.js', '', array ());
  $response->addJavascript('tiny_mce/tiny_mce.js', '', array ());


