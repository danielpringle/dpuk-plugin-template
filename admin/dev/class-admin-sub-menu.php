<?php
// namespace DPUK_Plugin_Template;
namespace DPUK_Plugin_Template\Admin;
use DPUK_Plugin_Template\Admin as Admin;
class AdminSubMenu extends AdminMenu {

	function __construct( $options, Admin\AdminMenu $parent ){
		parent::__construct( $options );

		$this->parent_id = $parent->settings_id;
	}

}