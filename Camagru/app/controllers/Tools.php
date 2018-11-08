<?php

  class Tools extends Controller {

    public function __construct($controller, $action) {
      parent::__construct($controller, $action);
      $this->_view->setLayout('default');
    }

    public function indexAction() {
      $this->_view->render('tools/index');
    }

    public function firstAction() {
      $this->_view->render('tools/first');
    }

    public function secondAction() {
      $this->_view->render('tools/second');
    }

    public function thirdAction() {
      $this->_view->render('tools/third');
    }
  }
