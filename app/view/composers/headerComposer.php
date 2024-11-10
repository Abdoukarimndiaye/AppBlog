<?php
 
namespace App\View\Composers;
use Illuminate\View\View;
use App\Models\category;
use App\Models\tag;
 
class headerComposer
{
    /**
     * Create a new profile composer.
     */
    
    

 
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $view->with('categories', category::all());
        $view->with('tags', tag::all());
    }
}