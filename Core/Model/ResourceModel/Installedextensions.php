<?php
namespace Dtfdigital\Core\Model\ResourceModel;


class Installedextensions extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}
	
	protected function _construct()
	{
		$this->_init('setup_module', 'module');
	}
	
}