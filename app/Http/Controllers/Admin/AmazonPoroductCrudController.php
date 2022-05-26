<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AmazonPoroductRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class AmazonPoroductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AmazonPoroductCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }

    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\AmazonPoroduct::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/aws_drop/amazon-poroduct');
        CRUD::setEntityNameStrings('amazon poroduct', 'amazon poroducts');
        $this->crud->enableExportButtons();

    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name'     => 'user_name',
            'label'    => 'User Name',
            'type'     => 'closure',
            'function' => function($entry) {
                return backpack_user()->name;
            }
        ],);
        CRUD::column('user_name');
        CRUD::column('product');
        CRUD::column('original_price');
        CRUD::column('supplier');
        CRUD::column('suplier_price');
        // CRUD::column('roi');
        CRUD::column('margin');
        CRUD::column('profit');
        CRUD::column('card_name');
        CRUD::column('created_at');


        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(AmazonPoroductRequest::class);

        CRUD::field('product');
        CRUD::field('original_price');
        CRUD::field('supplier');
        CRUD::field('suplier_price');
        $this->crud->addField([   // select_from_array
            'name'        => 'card_name',
            'label'       => "Card Name",
            'type'        => 'select_from_array',
            'options'     => ['Visa' => 'Visa', 'Amex' => 'Amex'],
            'allows_null' => false,
            'default'     => 'one',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);
        CRUD::addField([
            'name' => 'margin',
            'label' => '(ignore it)',
            'type' => 'number',
            'attributes' => [
               'readonly' => 'readonly',
             ],
        ]);
        CRUD::addField([
            'name' => 'profit',
            'label' => '(ignore it)',
            'type' => 'number',
            'attributes' => [
               'readonly' => 'readonly',
             ],
        ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->store();
    }

    public function store()
    {
        $this->crud->setRequest($this->crud->validateRequest());

        /** @var \Illuminate\Http\Request $request */
        $request = $this->crud->getRequest();
        $profit = $request->input('original_price') - $request->input('suplier_price') ;
        $margin = ($profit / $request->input('original_price')) * 100;

        $request->request->set('profit', $profit);
        $request->request->set('margin', round($margin, 2));

        $this->crud->setRequest($request);
        $this->crud->unsetValidation(); 

        return $this->traitStore();
    }
}
