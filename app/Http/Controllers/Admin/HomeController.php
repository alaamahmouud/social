<?php

namespace App\Http\Controllers\Admin;

use App\Charts\LineChart;
use App\Http\Controllers\Controller;
use App\Models\Tender;
use Illuminate\Http\Request;
use App\MyHelper\Helper;
use App\Models\Client;

class HomeController extends Controller
{

    protected $model;
    protected $helper;
    protected $viewsDomain = 'admin/clients.';

    public function __construct()
    {
        $this->model = new Client();
        $this->helper = new Helper();
    }

    private function view($view, $params = [])
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
        $records = $this->model->where(function ($q) use ($request)
        {
            if ($request->id)
            {
                $q->where('id',$request->id);
            }

        })->latest()->paginate(20);

        return $this->view('index', compact('records'));
    }

    // public function index(Request $request)
    // {
    //     return view('admin.layouts.home');
    // }
}
