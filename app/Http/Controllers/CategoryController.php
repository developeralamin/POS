<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
class CategoryController extends Controller
{

    public function __construct()
     {
        parent::__construct();
        $this->data['main_menu']  = 'Products';
        $this->data['sub_menu']   = 'Categories';

     }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['categories'] = Category::all();
        return view('category.categories',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {    
        $this->data['mode']   = 'create';
        return view('category.form',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $formdata = $request->all();
        if(Category::create($formdata)){
            Session::flash('message', 'Category Added Successfully');
         }
         return redirect()->to('categories');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['category']      = Category::findOrFail($id);
        $this->data['mode']          = 'edit';
        return view('category.form',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data                 = $request->all();
         $category             = Category::find($id);
         $category->title      = $data['title'];
      
         if($category->save()) {
            Session::flash('message', 'Category Update Successfully');
        }
        return redirect()->to('categories');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Category::find($id)->delete()){
            Session::flash('message', 'Category Delete Successfully');
        }
        return redirect()->to('categories');
    }
}
