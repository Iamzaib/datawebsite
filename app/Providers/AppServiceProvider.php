<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;
use App\Models\ListsCategory;
use App\Models\ContentPage;
use App\Models\ContentCategory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Cashier::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $data['list_categoires']=ListsCategory::all();
        $data['page_categories']=ContentCategory::all();
        $data['pages']=ContentPage::all();
        foreach ($data['page_categories'] as $category){
            $id=$category->id;
            $data['page_categories_pages'][$id] = ContentPage::with(['categories', 'tags', 'media'])->whereHas('categories', function($q) use ($id){
                $q->where('id', $id);
            })->get();
            $data['page_categories_pages_count'][$id]=$data['page_categories_pages'][$id]->count();
        }

        View::share('headerLinks', $data);
        //
    }
}
