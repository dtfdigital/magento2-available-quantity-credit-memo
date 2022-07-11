<?php
namespace Dtfdigital\Core\Model;
class Installedextensions extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'dtfdigital_core_installedextensions';
	protected $_cacheTag = 'dtfdigital_core_installedextensions';
	protected $_eventPrefix = 'dtfdigital_core_installedextensions';

	protected function _construct()
	{
		$this->_init('Dtfdigital\Core\Model\ResourceModel\Installedextensions');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
	
	
	
}