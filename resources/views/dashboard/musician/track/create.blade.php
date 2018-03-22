@extends('layouts.dashboard_index')
@section('content')
<div class="col-md-9">
    <h3 class="heading_dashboard">
        ARTIST DASHBOARD
    </h3>
    <div class="border_red">
        <h3 class="album">
            ADD TRACK
        </h3>
    </div>
    <div class="row">
        <div class="col-md-12 color_bottom">
            <h3 class="all_album">
                LET YOUR VOICE BEHEARD!
            </h3>
        </div>
    </div>
    <hr class="line">
    <div class="row">
      <form action="{{route('upload_track')}}" enctype="multipart/form-data" method="POST">
          {{csrf_field()}}
           <div class="col-md-7 col-sm-12 col-xs-12 col-md-offset-3 ">
            <h3>SELECT A TRACK</h3>
            <input type="text" class="form-control" name="name"> 
          </div>
          <div class="col-md-7 col-sm-12 col-xs-12 col-md-offset-3 ">
            <h3>DESCRIPTION</h3>
            <input type="text" class="form-control" name="description"> 
          </div>
          <div class="col-md-7 col-sm-12 col-xs-12 col-md-offset-3">
              <h3>CATEGORY</h3>                         
               <select class="form-control" name="category">
                 @foreach($categories as $category)
                 <option value="{{$category->id}}">{{$category->name}}</option>     
                 @endforeach
               </select>      
          </div>
          <div class="col-md-7 col-sm-12 col-xs-12 col-md-offset-3 ">
            <h3>SELECT A TRACK</h3>
            <div class="input-group">
              <input type="text" class="form-control" readonly>
              <label class="input-group-btn label_cus">
                  <span class="btn btn-primary">SELECT A FILE
                    <input type="file" name="video" style="display: none;">
                  </span>
              </label>
            </div>
          </div>
          <div class="col-md-7 col-sm-12 col-xs-12 col-md-offset-3">
            <h3>SELECT TRACK ART</h3>
            <div class="input-group">
              <input type="text" class="form-control" readonly>
              <label class="input-group-btn label_cus">
                  <span class="btn btn-primary">SELECT A FILE
                    <input type="file" name="image" style="display: none;">
                  </span>
              </label>
            </div>
          </div>
          <div class="col-md-7 col-sm-12 col-xs-12 col-md-offset-3">
            <div class="input-group col-md-12 col-sm-12 col-xs-12">
              <button type="submit" name="button" class="btn btn-primary">UPLOAD</button>
            </div>
          </div>
      </form>
    </div>
      @if(count($errors))
        <div class="form-group">
         <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $erroring)
                  <li>{{$erroring}}  </li>
                  @endforeach
            </ul>
          </div>
        </div>
        @endif
</div>
@endsection