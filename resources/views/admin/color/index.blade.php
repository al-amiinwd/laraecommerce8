@extends('admin.layouts.master')
@section('main-content')



    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <p class="alert-success">
                    <?php
                    $message=Session::get('message');
                    if($message){
                        echo $message;
                        Session::put('message',null);
                    }
                    ?>
                </p>
                <h2><i class="halflings-icon cat"></i><span class="break"></span>Sizes</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                  <thead>
                      <tr>
                          <th  style="width: 20%">ID</th>
                          <th style="width: 40%">Colors</th>
                          <th style="width: 20%">Status</th>
                          <th style="width: 20%">Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($colors as $color)
                    <tr>
                        <td>{{$color->id}}</td>
                        <td>
                            @foreach(json_decode($color->color) as $colors)
                            <ul class="span3">
                                {{$colors}}
                            </ul>
                            @endforeach
                        </td>
                        <td class="center" >
                            @if($color->status==1)
                            <span class="label label-success" >Active</span>
                            @else
                            <span class="label label-danger" >Deactive</span>
                            @endif
                        </td>
                        <td class="center" >
                            @if($color->status==1)
                            <a href="{{url('/color-status'.$color->id)}}" class="btn btn-danger" >
                                <i class="halflings-icon white thumbs-down"></i>
                            </a>
                            @else
                            <a  href="{{url('/color-status'.$color->id)}}" class="btn btn-success">
                                <i class="halflings-icon white thumbs-up"></i>
                            </a>
                            @endif
                            <a class="btn btn-info" href="{{url('edit-color/'.$color->id)}}">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <form action="{{url('delete-color/'.$color->id)}}" method="get">
                            @csrf

                            <button class="btn btn-danger" type="submit">
                                <i class="halflings-icon white trash"></i>
                            </button>

                            </a>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                  </tbody>
              </table>
            </div>
        </div><!--/span-->

    </div><!--/row-->
@endsection
