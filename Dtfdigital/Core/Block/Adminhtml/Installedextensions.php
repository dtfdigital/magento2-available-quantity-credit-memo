<?php
namespace Dtfdigital\Core\Block\Adminhtml;
use Magento\Backend\Block\Template;

class Installedextensions extends Template
{

	protected $_installedextensionsFactory;
	protected $_moduleprefixes = 'dtfdigital_';
	
	public function __construct(\Magento\Backend\Block\Template\Context $context, 
								\Dtfdigital\Core\Model\InstalledextensionsFactory $installedextensionsfactory,array $data = []) {
		
		$this->_installedextensionsFactory = $installedextensionsfactory;
		parent::__construct($context, $data);
	}
	

	
	
	public function getInstalledExtensions() {
		
		
		$installed_collection = array();
		$installedextensions = $this->_installedextensionsFactory->create();
		$installed_collection = $installedextensions->getCollection();
		$installed_collection = $installedextensions->getCollection()
								->addFieldToFilter('module',["like"=>$this->_moduleprefixes.'%']);
		
		
			
		
		  return $installed_collection;
	  }
}