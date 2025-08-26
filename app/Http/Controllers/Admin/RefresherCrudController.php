<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class RefresherCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RefresherCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
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
        CRUD::setModel(\App\Models\Refresher::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/refresher');
        CRUD::setEntityNameStrings('refresher', 'refreshers');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.
        $this->crud->orderBy('id', 'asc');

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
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
        //CRUD::setValidation(RefresherRequest::class);
        //CRUD::setFromDb(); // set fields from db columns.
        CRUD::addField([
            'name' => 'Batch',
            'label' => 'အမှတ်စဉ်',
            'type' => 'text',
        ]);

        CRUD::addField([
            'name' => 'name',
            'label' => 'အမည်',
            'type' => 'text',
        ]);
        CRUD::addField([
            'name' => 'position',
            'label' => 'ရာထူး',
            'type' => 'text',
        ]);
        CRUD::addField([
            'name' => 'department',
            'label' => 'ဌာန',
            'type' => 'select_from_array',
            'options' => [
                'ကော်မတီရုံး' => 'ကော်မတီရုံး',
                'စီမံရေးရာဌာန' => 'စီမံရေးရာဌာန',
                'ဘဏ္ဍာရေးနှင့်ငွေစာရင်းဌာန' => 'ဘဏ္ဍာရေးနှင့်ငွေစာရင်းဌာန',
                'ရာပြတ်ဌာန' => 'ရာပြတ်ဌာန',
                'အင်ဂျင်နီယာဌာန(လမ်းနှင့်တံတား)' => 'အင်ဂျင်နီယာဌာန(လမ်းနှင့်တံတား)',
                'အင်ဂျင်နီယာဌာန(အဆောက်အအုံ)' => 'အင်ဂျင်နီယာဌာန(အဆောက်အအုံ)',
                'အင်ဂျင်နီယာဌာန(ရေနှင့်သန့်ရှင်းမှု)' => 'အင်ဂျင်နီယာဌာန(ရေနှင့်သန့်ရှင်းမှု)',
                'အင်ဂျင်နီယာဌာန(ရေစီးရေလာစီမံခန့်ခွဲမှု)' => 'အင်ဂျင်နီယာဌာန(ရေစီးရေလာစီမံခန့်ခွဲမှု)',
                'မြို့ပြပတ်ဝန်းကျင်ထိန်းသိမ်းရေးနှင့်သန့်ရှင်းရေးဌာန' => 'မြို့ပြပတ်ဝန်းကျင်ထိန်းသိမ်းရေးနှင့်သန့်ရှင်းရေးဌာန',
                'ဈေးများနှင့်ကုန်စည်ပွဲရုံများဌာန' => 'ဈေးများနှင့်ကုန်စည်ပွဲရုံများဌာန',
                'တိရစ္ဆာန်ဆေးကုနှင့်ထုတ်လုပ်ရေးဌာန' => 'တိရစ္ဆာန်ဆေးကုနှင့်ထုတ်လုပ်ရေးဌာန',
                'ယာဉ်ယန္တရားစီမံခန့်ခွဲရေးနှင့်ထိန်းသိမ်းရေးဌာန' => 'ယာဉ်ယန္တရားစီမံခန့်ခွဲရေးနှင့်ထိန်းသိမ်းရေးဌာန',
                'မြို့ပြမြေစီမံခန့်ခွဲမှုဌာန' => 'မြို့ပြမြေစီမံခန့်ခွဲမှုဌာန',
                'ပန်းဥယျာဉ်နှင့်အားကစားကွင်းများဌာန' => 'ပန်းဥယျာဉ်နှင့်အားကစားကွင်းများဌာန',
                'ပြည်သူ့ဆက်ဆံရေးနှင့်ပြန်ကြားရေးဌာန' => 'ပြည်သူ့ဆက်ဆံရေးနှင့်ပြန်ကြားရေးဌာန',
                'ပြည်သူ့ကျန်းမာရေးဌာန' => 'ပြည်သူ့ကျန်းမာရေးဌာန',
                'မြို့ပြစီမံခန့်ခွဲမှုဌာန' => 'မြို့ပြစီမံခန့်ခွဲမှုဌာန',
                'လုံခြုံရေးနှင့်စည်းကမ်းထိန်းသိမ်းရေးဌာန' => 'လုံခြုံရေးနှင့်စည်းကမ်းထိန်းသိမ်းရေးဌာန',
                'မြို့တော်ဘဏ်' => 'မြို့တော်ဘဏ်',

            ],
            'allows_null' => true, // optional
        ]);
        CRUD::addField([
            'name' => 'Mark',
            'label' => 'အမှတ်',
            'type' => 'text',
        ]);
        CRUD::addField([
            'name' => 'Level',
            'label' => 'အဆင့်',
            'type' => 'text',
        ]);

        
        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
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
