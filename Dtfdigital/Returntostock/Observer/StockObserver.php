<?php
namespace Dtfdigital\Returntostock\Observer;
use \Psr\Log\LoggerInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Message\ManagerInterface;

class StockObserver implements ObserverInterface
{
	protected $_logger;
    /**
     * @var ObjectManagerInterface
     */
    protected $_objectManager;
    protected $messageManager;
	protected $_resourceConnection;
	protected $_helper;
	protected $sourceItemsSaveInterface;
    protected $sourceItemFactory;

    /**
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     */
    public function __construct(LoggerInterface $_logger,
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Magento\Quote\Model\QuoteFactory $quoteFactory,
        \Magento\Sales\Model\Order $order,
        ManagerInterface $messageManager,
		\Magento\Framework\App\ResourceConnection $resourceConnection,
		\Magento\InventoryApi\Api\SourceItemsSaveInterface $sourceItemsSaveInterface,
    \Magento\InventoryApi\Api\Data\SourceItemInterfaceFactory $sourceItemFactory
    )
    {
		$this->_logger = $_logger;
        $this->_objectManager = $objectManager;
        $this->messageManager = $messageManager;
		$this->_resourceConnection = $resourceConnection;
		$this->sourceItemsSaveInterface = $sourceItemsSaveInterface;
    	$this->sourceItemFactory = $sourceItemFactory;
    }


    public function execute(Observer $observer)
    {
		
		$memo = $observer->getEvent()->getCreditmemo();

		foreach($memo->getAllItems() as $collectionEntry) {
			
			$amount_to_refund = $collectionEntry->getOrderItem()->getQtyRefunded();
			$product = $collectionEntry->getOrderItem()->getProduct();
			
			if($amount_to_refund > 0 && $product->getQty() == 0) {

				if($product->getQuantityAndStockStatus()['is_in_stock']) {
					//donothing
				} else {
					
					$product->save();
					$sourceItem = $this->sourceItemFactory->create();
					$sourceItem->setSourceCode('default');
					$sourceItem->setSku($product->getSku());
					$sourceItem->setQuantity($amount_to_refund);
					$sourceItem->setStatus(1);
					$this->sourceItemsSaveInterface->execute([$sourceItem]);
				}
			}
		}
	}
}