@extends('admin.layouts.main')

@section('content')

<body>

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Clients</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{url('admin/clients')}}">Clients</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Clients</li>
                </ol>
              </nav>
            </div>

            <!-- <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div> -->
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Clients</h3>
            </div>

            <!-- <br>{!! Form::open([
                'method' => 'GET'
            ]) !!}
           
            <div class="navbar-search navbar-search-light form-inline mr-sm-3">
                    <label for="" >&nbsp;</label>
                    {!! Form::text('name',old('name'),[
                        'class' => 'form-control',
                        'placeholder' => 'search for name'
                    ]) !!}
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="">&nbsp;</label>
                    <button class="btn btn-primary btn-block" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div> -->
            
            {!! Form::close() !!}
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th scope="col" class="sort" data-sort="name">name</th>
                    <th scope="col" class="sort" data-sort="email">email</th>
                    <th scope="col" class="sort" data-sort="phone">phone</th>
                    <!-- <th scope="col" class="sort" data-sort="phone">Activate</th> -->
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                  <!-- <tr>
                    <td class="budget">
                      $2500 USD
                    </td>
                    <td class="budget">
                      $2500 USD
                    </td>
                    <td class="budget">
                      $2500 USD
                    </td>
                  </tr> -->
                  @foreach($records as $record)
                            <tr id="removable{{$record->id}}">
                                <td>{{($records->perPage() * ($records->currentPage() - 1)) + $loop->iteration}}</td>
                                <td>{{$record->full_name}}</td>
                                <td>{{$record->email}}</td>
                                <td>{{$record->phone}}</td>
                                <!-- <td class="text-center">
                                    {!! \App\MyHelper\Helper::toggleBooleanView($record , url('admin/category/toggle-boolean/'.$record->id.'/is_active'),'is_active') !!}
                                </td> -->
                            </tr>
                        @endforeach
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
<!-- 
    </div>
  </div> -->

@endsection
