<?php
namespace Dtfdigital\Core\Model\ResourceModel\Installedextensions;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'module';
	protected $_eventPrefix = 'dtfdigital_core_installedextensions';
	protected $_eventObject = 'installedextensions_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Dtfdigital\Core\Model\Installedextensions', 'Dtfdigital\Core\Model\ResourceModel\Installedextensions');
	}

}