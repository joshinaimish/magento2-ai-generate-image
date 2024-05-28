<?php 
namespace Nxtech\AiGenerateImage\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{


	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		protected \Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		return parent::__construct($context);
	}
	public function execute()
	{
		return $this->pageFactory->create();
	}
}