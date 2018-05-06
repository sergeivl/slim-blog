<?php namespace App\Controllers\Admin;

use App\Models\CategoryTaxonomy;
use App\Models\Tag;
use App\Services\Admin\PostAdminService;
use App\Services\Pages\PageDataFactory;
use App\Services\PostListService\PostAllListService;
use App\Services\PostListService\PostListFactory;
use App\Controllers\Controller;
use Slim\Http\Request;
use Slim\Http\Response;


class AdminPostController extends Controller
{
    const SUBTEMPLATE_POST_INDEX = 'admin_post_index';
    const SUBTEMPLATE_POST_CREATE = 'admin_post_create';
    const SUBTEMPLATE_POST_UPDATE = 'admin_post_update';

    public function actionIndex(Response $response, $pageNumber = 1)
    {
        $listService = $this->postListFactory->build(PostListFactory::TYPE_NO, $pageNumber, 10);

        /** @var PostAllListService $listService */
        $postList = $listService->getList();
        $paginator = $listService->getPaginator();
        $paginator->setUrlPattern('/admin/post/' . '(:num)');

        $pageData = [
            'title' => 'Управление категориями',
            'title_seo' => 'Управление категориями',
            'meta_d' => '',
            'meta_k' => ''
        ];

        $categoryList = $this->categoryListService->getAllCategories();
        $tagList = $this->tagListService->getAllTags();

        return $this->view->render($response, 'layout.php', [
            'subtemplate' => self::SUBTEMPLATE_POST_INDEX,
            'pageData' => $pageData,
            'postList' => $postList,
            'paginator' => (string)$paginator,
            'categoryList' => $categoryList,
            'tagList' => $tagList
        ]);
    }

    public function actionCreate(Request $request, Response $response, PostAdminService $postSaveService)
    {
        if ($request->getParsedBody()) {
            $postId = $postSaveService->save($request->getParsedBody());
            return $response->withRedirect('/admin/post/update/' . $postId);
        }

        $pageData = [
            'title' => 'Создание нового поста',
            'title_seo' => 'Создание нового поста',
            'meta_d' => '',
            'meta_k' => ''
        ];

        $categoryList = $this->categoryListService->getAllCategories();
        $tagList = $this->tagListService->getAllTags();

        return $this->view->render($response, 'layout.php', [
            'subtemplate' => self::SUBTEMPLATE_POST_CREATE,
            'pageData' => $pageData,
            'categoryList' => $categoryList,
            'tagList' => $tagList
        ]);
    }

    public function actionUpdate(Request $request, Response $response, PostAdminService $postSaveService, $id)
    {
        if ($body = $request->getParsedBody()) {
            $postSaveService->save($body, $id);
        }

        $pageData = [
            'title' => 'Создание нового поста',
            'title_seo' => 'Создание нового поста',
            'meta_d' => '',
            'meta_k' => ''
        ];

        $categoryList = $this->categoryListService->getAllCategories();
        $tagList = $this->tagListService->getAllTags();

        $postData = $this->pageDataFactory->build(PageDataFactory::TYPE_POST, null, $id);


        $postData['categories'] = [];

        // TODO: Отрефакторить. Сделать отдельный сервис, собирающий коллецию данных
        $categoryTaxonomies = CategoryTaxonomy::where('post_id', $id)->get();
        foreach ($categoryTaxonomies as $categoryTaxonomy) {
            /** @var CategoryTaxonomy $categoryTaxonomy */
            $postData['categories'][] = $categoryTaxonomy->category_id;
        }

        // TODO: Отрефакторить. Сделать отдельный сервис, выгружающий теги поста
        $tagsFromDb = Tag::whereHas('tagTaxonomy', function ($query) use ($id) {
            $query->where('post_id', '=', $id);
        })->get();

        $tags = [];
        foreach ($tagsFromDb as $tagFromDb) {
            $tags[] = $tagFromDb->title;
        }


        $postData['tags'] = implode(', ', $tags);


        return $this->view->render($response, 'layout.php', [
            'subtemplate' => self::SUBTEMPLATE_POST_UPDATE,
            'pageData' => $pageData,
            'categoryList' => $categoryList,
            'tagList' => $tagList,
            'postData' => $postData,
        ]);
    }

    public function actionDelete(Response $response, PostAdminService $postAdminService, $id)
    {
        $postAdminService->delete($id);
        return $response->withRedirect('/admin/post');
    }


}