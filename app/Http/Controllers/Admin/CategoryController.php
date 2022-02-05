<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Governorate;
use App\Models\Log;
use App\MyHelper\Helper;
use Illuminate\Http\Request;
use Response;

class CategoryController extends Controller
{
    protected $model ;
    protected $viewsDomain = 'admin/categories.';
    protected $url = 'admin/categories';
    public function __construct()
    {
        $this->model = new Category();
    }
    public function view($view, $params = [])
    {
        return view($this->viewsDomain . $view, $params);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //
        $records = $this->model->where(function ($q) use ($request)
        {
            if ($request->id)
            {
                $q->where('id',$request->id);
            }
            if ($request->name) {
                $q->where(function ($q) use ($request) {

                    $q->where('name', 'LIKE', '%' . $request->name . '%');
                });

            }

        })->latest()->paginate(6);
        return $this->view('index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
        $model = $this->model;
        return $this->view('create', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
        $rules =
            [
                'name' => 'required',
                'meta_keywords' => 'required',
                'meta_des' => 'required',

            ];

        $error_sms =
            [
                'name.required' => 'الرجاء ادخال الاسم ',
                'meta_keywords.required' => 'الرجاء ادخال قيمه ',
                'meta_des.required' => 'الرجاء ادخال قيمه ',
            ];

        $data = validator()->make($request->all(), $rules, $error_sms);

        if ($data->fails()) {
            return back()->withInput()->withErrors($data->errors());
        }

        $record = $this->model->create($request->all());
        session()->flash('success', 'تمت الاضافة بنجاح');
        return redirect($this->url);
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
        //
        $model = $this->model->findOrFail($id);
        return $this->view('edit', compact('model'));
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
        //
        $rules =
            [
                'name' => 'required',
                'meta_keywords' => 'required',
                'meta_des' => 'required',
            ];

        $error_sms =
            [
                'name.required' => 'الرجاء ادخال الاسم ',
                'meta_keywords.required' => 'الرجاء ادخال قيمه ',
                'meta_des.required' => 'الرجاء ادخال قيمه ',
            ];


        $data = validator()->make($request->all(), $rules, $error_sms);

        if ($data->fails()) {
            return back()->withInput()->withErrors($data->errors());
        }

        $record = $this->model->findOrFail($id);

        $record->update($request->all());
        session()->flash('success', 'تمت تحديث بنجاح');
        return redirect($this->url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {

        $record = $this->model->findOrFail($id);


        $record->delete();

        return redirect($this->url);

    }
    
    public function toggleBoolean($id, $action)
    {
        $record = $this->model->findOrFail($id);
        Helper::toggleBoolean($record);

        return Helper::responseJson(1, 'تمت العملية بنجاح');
    }

}
