@extends('admin.layouts.master')
@section('main-content')

@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


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
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Sub Category</h2>

            </div>

            <div class="box-content">
                <form class="form-horizontal" action="{{url('update-sub-category/{id}'.$Subcategory->id)}}" method="POST" >
                    @csrf
                    @method('PUT')
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01"> Edit Sub Category Name</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="name" required value="{{$Subcategory->name}}">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Select Category</label>
                            <div class="controls">

                            <select name="subcategory">
                                <option>Select Category</option>
                                @foreach($categories as $category)
                              <option value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2"> Edit Sub Category Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="description" rows="3" required>{{$Subcategory->description}}</textarea>
                            </div>

                        </div>




                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update Sub Category</button>
                            <button type="submit" class="btn btn-danger">Cancel</button>
                        </div>

                    </fieldset>
                </form>

            </div>
        </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->
@endsection
