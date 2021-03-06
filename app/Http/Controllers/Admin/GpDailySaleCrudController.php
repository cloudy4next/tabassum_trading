<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GpDailySaleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\GrammenphoneProduct;

/**
 * Class GpDailySaleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class GpDailySaleCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\GpDailySale::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/grameenphone/gp-daily-sale');
        CRUD::setEntityNameStrings('gp daily sale', 'gp daily sales');
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

        // CRUD::column('product_id');
        $this->crud->addColumn([
            'name'     => 'product_id',
            'label'    => 'Product',
            'type'     => 'closure',
            'function' => function($entry) {
                $productname = GrammenphoneProduct::where('id', $entry->product_id)->get('name');
                return $productname[0]->name;
            }
        ],);
        

        CRUD::column('total_sale');
        CRUD::column('daily_upfront');
        CRUD::column('date');

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
        CRUD::setValidation(GpDailySaleRequest::class);

        CRUD::field('product_id');
        CRUD::field('total_sale');
        CRUD::field('daily_upfront');
        CRUD::field('date');

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
        $this->setupCreateOperation();
    }
}
