<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GpExpenseRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class GpExpenseCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class GpExpenseCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }
    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */



    public function store()
    {
      // do something before validation, before save, before everything
      $response = $this->traitStore();
      // do something after save

      // need to send mail to when expense triggres
      $emailAfterSendResponse = $this->SendTeamMail($savingTotalSale);

      return $response;
    }




    public function setup()
    {
        CRUD::setModel(\App\Models\GpExpense::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/gp_expense/gp-expense');
        CRUD::setEntityNameStrings('gp expense', 'gp expenses');
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
        // $this->crud->addFilter([
        //     'type'  => 'text',
        //     'name'  => 'description',
        //     'label' => 'Description'
        //   ], 
        //   false, 
        //   function($value) { // if the filter is active
        //     $this->crud->addClause('where', 'description', 'LIKE', "%$value%");
        //   });

        CRUD::column('expense_name');
        CRUD::column('amount');
        // CRUD::column('photos');
        $this->crud->addColumn([
            'name' => 'photos',
            'label' => 'Voucher Numbers',
        ]);
        $this->crud->addColumn([
            'name' => 'updated_at',
            'label' => 'Date',
        ]);
        // CRUD::column('photos');
        // CRUD::addColumn(['name' => 'photos', 'type' => 'upload']); 
        // $this->crud->set('show.setFromDb', false);
        // $this->crud->addColumns($this->getFieldsData(TRUE));

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
        CRUD::setValidation(GpExpenseRequest::class);

        CRUD::field('expense_name');
        CRUD::field('amount');
        $this->crud->addField([ 
            'name'      => 'photos',
            'label'     => 'Voucher numbers: ',
            'type'      => 'text', 
        ]);

        // $this->crud->addField([   // Upload
        //     'name'      => 'photos',
        //     'label'     => 'photos',
        //     'type'      => 'upload',
        //     'upload'    => true,
        //     'disk'      => 'public', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;
        //     // optional:
        //     'temporary' => 10 // if using a service, such as S3, that requires you to make temporary URLs this will make a URL that is valid for the number of minutes specified
        // ]);

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


    public function sendleadmail($emailData)

    {
         $email = 'jahangir.hossein7200@gmail.com';
        //  $email = 'jahangir.hossein7200@gmail.com';

        Mail::to($email)->send(new DailyUpfrontMail($emailData));

        if (Mail::failures()) {
            return false;
        }

        return true;
    }

    public function SendTeamMail($emailData)
    {
        $emailResponse = $this->sendleadmail($emailData);

        return response()->json(['email_send' => $emailResponse]);
    }

}
