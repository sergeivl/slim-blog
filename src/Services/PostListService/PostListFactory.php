<?php namespace App\Services\PostListService;

use Symfony\Component\Config\Definition\Exception\Exception;

class PostListFactory
{
    const TYPE_NO = 0;
    const TYPE_CATEGORY = 1;
    const TYPE_TAG = 2;

    /** @var PostAllListService $postAllListService */
    private $postAllListService;
    private $postCategoryListService;
    private $postTagListService;

    public function __construct(PostAllListService $postAllListService,
                                PostCategoryListService $postCategoryListService,
                                PostTagListService $postTagListService)
    {
        $this->postAllListService = $postAllListService;
        $this->postCategoryListService = $postCategoryListService;
        $this->postTagListService = $postTagListService;
    }

    public function build($type, $pageNumber, $limit, $alias = null) : PostListService
    {
        $service = null;

        switch ($type) {
            case self::TYPE_NO :
                $service = $this->postAllListService;
                $service->setPageNumber($pageNumber);
                $service->setLimit($limit);
                break;
            case self::TYPE_CATEGORY :
                if (!$alias) {
                    throw new Exception('Не задан alias');
                }
                $service = $this->postCategoryListService;
                $service->setPageNumber($pageNumber);
                $service->setLimit($limit);
                $service->setAlias($alias);
                break;
            case self::TYPE_TAG :
                if (!$alias) {
                    throw new Exception('Не задан alias');
                }
                $service = $this->postTagListService;
                $service->setPageNumber($pageNumber);
                $service->setLimit($limit);
                $service->setAlias($alias);
                break;
        }
        if (!$service) {
            throw new Exception('Неизвестный тип ListPost');
        }

        return $service;
    }
}