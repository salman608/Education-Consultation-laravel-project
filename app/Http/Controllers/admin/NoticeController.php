<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notice;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $notices=Notice::latest()->take(1)->get();
        return view('notice.index',compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
          'image' => 'required|mimes:jpeg,bmp,png,jpg',
      ]);

      $image=$request->file('image');
      $slug=str_slug($request->title);
      if(isset($image))
     {
       $currentData= Carbon::now()->toDateString();
       $imagename=$slug .'-'. $currentData .'-'. uniqid() .'.'.
       $image->getClientOriginalExtension();
       if(!file_exists('upload/notice')){
           mkdir('upload/notice',0777,true);
       }
       $image->move('upload/notice',$imagename);
     }else{
       $imagename='default.png';
       }

       $notice = new Notice();
       $notice->image = $imagename;
       $notice->save();
       Toastr::success('Notice Successfully Saved :)' ,'Success');
       return redirect()->route('notice.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $notice=Notice::find($id);

        return view('notice.edit',compact('notice'));
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
      $this->validate($request,[
          'image' => 'mimes:jpeg,bmp,png,jpg'

      ]);

      $image=$request->file('image');
      $slug=str_slug($request->title);
      $notice=Notice::find($id);
      if(isset($image))
     {
       $currentData= Carbon::now()->toDateString();
       $imagename=$slug .'-'. $currentData .'-'. uniqid() .'.'.
       $image->getClientOriginalExtension();
       if(!file_exists('upload/notice')){
           mkdir('upload/notice',0777,true);
       }
       $image->move('upload/notice',$imagename);
     }else{
       $imagename='default.png';
       }

       $notice = new Notice();
       $notice->image = $imagename;
       $notice->save();
       Toastr::success('Notice Successfully Update :)' ,'Success');
       return redirect()->route('notice.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $notice= Notice::find($id);
        if(file_exists('upload/notice/'.$notice->image))
        {
          unlink('upload/notice/'.$notice->image);
        }
        $notice->delete();
        Toastr::success('Notice successfully Delete','success');
        return redirect()->back();
          }

}
