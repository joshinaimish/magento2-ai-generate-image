<?php
namespace Nxtech\AiGenerateImage\Controller\Index;

use Magento\Framework\Controller\ResultFactory;
use Orhanerday\OpenAi\OpenAi;

class Post extends \Magento\Framework\App\Action\Action
{
    const API_KEY = "key";

    public function __construct(
        private \Magento\Framework\App\Action\Context $context
    ) {
        $this->context = $context;
        parent::__construct($context);
    }


    public function execute()
    {
        $whoteData = $this->context->getRequest()->getParams();
        $prompt = $whoteData['prompt'];
        $open_ai = new OpenAi(self::API_KEY);

        $complete = $open_ai->image(
            [
                "prompt" => $prompt,
                "n" => 1,
                "size" => "512x512",
                "response_format" => "url",
            ]
        );
        $response = json_decode($complete, true);
        $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $resultJson->setData(["data" => $response["data"][0]["url"], "suceess" => true]);
        return $resultJson;
    }
}