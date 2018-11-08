<?php

  class Home extends Controller {
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
    }

    public function indexAction() {
      $db = DB::getInstance();
      $fields = [
          'fname' => 'Toni',
          'lname' => 'Parham',
          'email' => 'toni@cc.com'
      ];
      $contactsQ = $db->insert('contacts', $fields);
      $this->_view->render('home/index');
    }
}
