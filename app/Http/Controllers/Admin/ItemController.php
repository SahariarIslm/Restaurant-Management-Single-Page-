<?php

namespace App\Http\Controllers\Admin;

use App\Item;
use App\Category;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    
    public function index()
    {
        $items = Item::orderBy('id', 'desc')->paginate(10);
        return view('admin.item.index',compact('items'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.item.create',compact('categories'));
    }

    public function store(Request $request)
    {
        
        $this->validate($request,[
            'name'=>'required',
            'category_id'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png,bmp'
        ]);
        //get Image
        $image = $request->file('image');
        //set Image Name
        $slug = str_slug($request->name);
        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imageName=$slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            //move Image to public/uploads folder
                //check directory
            if (!file_exists('uploads/item')) {
                mkdir('uploads/item',0777,true);
            }
            $image->move('uploads/item',$imageName);
        }else{
            $imageName = 'default.png';
        }
        $item = new Item();
        $item->category_id = $request->category_id;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image = $imageName;
        $item->save();
        return redirect()->route('item.index')->with('successMsg','Item Saved Successfully');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $categories = Category::all();
        $item = Item::find($id);
        return view('admin.item.edit',compact('categories','item'));
    }

    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        $this->validate($request,[
            'name'=>'required',
            'category_id'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'mimes:jpeg,jpg,png,bmp'
        ]);
        //get Image
        $image = $request->file('image');
        //set Image Name
        $slug = str_slug($request->name);
        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imageName=$slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            //move Image to public/uploads folder
                //check directory
            if (!file_exists('uploads/item')) {
                mkdir('uploads/item',0777,true);
            }
            // delete old Post Image
            if(file_exists('uploads/item/'.$item->image)){
                unlink('uploads/item/'.$item->image);
            }
            $image->move('uploads/item',$imageName);
        }else{
            $imageName = $item->image;
        }

        $item->category_id = $request->category_id;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image = $imageName;
        $item->save();
        return redirect()->route('item.index')->with('successMsg','Item Updated Successfully');
    }

    public function destroy($id)
    {
        $item = Item::find($id);
        if(file_exists('uploads/item/'.$item->image)){
                unlink('uploads/item/'.$item->image);
        }
        $item->delete();
        return redirect()->back()->with('successMsg','Item Deleted Successfully');

    }
}
