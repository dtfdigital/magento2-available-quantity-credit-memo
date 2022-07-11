<?php
  namespace Dtfdigital\Core\Controller\Adminhtml\Installedextensions;

  class Index extends \Magento\Backend\App\Action
  {
    /**
    * @var \Magento\Framework\View\Result\PageFactory
    */
    protected $resultPageFactory;
	 /**
    * @var \Dtfdigital\Core\Model\InstalledextensionsFactory
    */
	protected $_installedextensionsFactory;
	  
	protected $_moduleprefixes = 'dtfdigital_';
    /**
     * Constructor
     *
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
		\Dtfdigital\Core\Model\InstalledextensionsFactory $installedextensionsFactory
    ) {
         parent::__construct($context);
         $this->resultPageFactory = $resultPageFactory;
		$this->_installedextensionsFactory = $installedextensionsFactory;
    }

    /**
     * Load the page defined in view/adminhtml/layout/core_installedextensions_index.xml
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
		
		//$installedExtensions = $this->installedExtensions();
		/*$installedextensions = $this->_installedextensionsFactory->create();
		$installed_collection = $installedextensions->getCollection()
								->addFieldToFilter('module',["like"=>$this->_moduleprefixes.'%']);
		var_dump($installedExtensions);*/
		//$item->getData();
		//die();
		
         return  $resultPage = $this->resultPageFactory->create();
    }
	  
	 /* public function installedExtensions() {
		  $installedextensions = $this->_installedextensionsFactory->create();
		$installed_collection = $installedextensions->getCollection()
								->addFieldToFilter('module',["like"=>$this->_moduleprefixes.'%']);
		
		  return $installed_collection;
	  }*/
	  
	protected function _isAllowed() {
    	return $this->_authorization->isAllowed('Dtfdigital_Core::installedextensions');
	}
  }
?>