<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\View\CellTrait;

/**
 * Home Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 * @property \App\Model\Table\ProductCategoriesTable $ProductCategories
 * @property \App\Model\Table\CategoriesTable $Categories
 * @property \App\Model\Table\ProductTagsTable $ProductTags
 * @property \App\Model\Table\TagsTable $Tags
 */
class ShopController extends AppController
{
    use CellTrait;

    /**
     * Products Table
     *
     * @var \App\Model\Table\ProductsTable
     */
    protected $Products;

    /**
     * Product Categories Table
     *
     * @var \App\Model\Table\ProductCategoriesTable
     */
    protected $ProductCategories;

    /**
     * Categories Table
     *
     * @var \App\Model\Table\CategoriesTable
     */
    protected $Categories;

    /**
     * Product Tags Table
     *
     * @var \App\Model\Table\ProductTagsTable
     */
    protected $ProductTags;

    /**
     * Tags Table
     *
     * @var \App\Model\Table\TagsTable
     */
    protected $Tags;

    public function initialize(): void
    {
        parent::initialize();
        $this->Products = $this->fetchTable('Products');
        $this->ProductCategories = $this->fetchTable('ProductCategories');
        $this->ProductTags = $this->fetchTable('ProductTags');
        $this->Categories = $this->fetchTable('Categories');
        $this->Tags = $this->fetchTable('Tags');

    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        $products = $this->Products->find('all');
        $categories = $this->Categories->find('all');
        $tags = $this->Tags->find('all');

        $this->set(compact('products', 'categories', 'tags'));
    }

    /**
     * View singular product
     *
     * @param int|string $id
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [
                'ProductReviews', 'ProductTags', 'ProductCategories',
            ],
        ]);

        $this->set(compact('product'));
    }
}
