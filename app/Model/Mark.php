<?php
class Mark extends AppModel {
	public $belongsTo = array(
     'User' => array(
         'className' => 'User',
         'foreignKey' => 'user_id'
     )
 );

}