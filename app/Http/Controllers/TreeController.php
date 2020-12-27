<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Requests;
use App\Models\Tree;
class TreeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Tree::where('parent_id', '=', null)->get();
        $allCategories = Tree::pluck('title','id')->all();
        
        return view('categoryTreeview',compact('categories','allCategories'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    //Add subCategory in treeview
    public function addCategory(Request $request)
    {
        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
        $Tree = new Tree;
        $Tree->title = $input['title'];
        $Tree->parent_id = $input['parent_id'];
        $Tree->save();
        return response()->json(['success' => true]);
    }

    //edit Category in treeview
    public function editCategory(Request $request)
    {
        $categories = Tree::where('parent_id', '=', 0)->get();
        $input = $request->all();
        $id = empty($input['id']) ? 0 : $input['id'];
        $Tree = Tree::find($id);
        $Tree->title = $input['title'];
        $Tree->save();
        return response()->json(['success' => true]);
    }

    //Delete category in treeview
    public function deleteCategory(Request $request)
    { 
        $id = $request['id'];
        $categorie = Tree::where('id', '=', $id)->delete();
       
        return response()->json(['success' => true]);
    }
    
    //Add parent category in treeview
    public function addParentCategory(Request $request)
    {  
        $input = $request->all();
        $Tree = new Tree;
        $Tree->title = $input['title'];
        $Tree->save();
        return response()->json(['success' => true]);
    }   
    
}

