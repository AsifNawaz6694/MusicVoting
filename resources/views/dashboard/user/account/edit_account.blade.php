@extends('layouts.user_index')
@section('content')   
      <div class="col-md-9">
        <h3 class="heading_dashboard">
             USER DASHBOARD
        </h3>
        <div class="border_red">
          <h3 class="album">
              SETTINGS
          </h3>
        </div>
        <div class="row">
            <div class="col-md-12 color_bottom">
                <h3 class="all_album">
                   EDIT ACCOUNT INFORMATION
                </h3>
            </div>
        </div>
        <hr class="line">
        <div class='form'>          
          <form action="{{route('user_update_account',['id'=>$user->id])}}" method="POST">
            {{csrf_field()}}
            <div class='fields'>
              <label for='name'>Full name</label>
              <input id='name' name='name' type='text' value="{{$user->name}}" class="form-control" >
            </div>
            <div class='fields'>
              <label for='email'>Phone</label>
              <input id='email' name='phone' type='number' value="{{$user->phone}}" class="form-control">
            </div>
            <div class='fields'>
              <label for='email'>Email</label>
              <input id='email' name='email' value="{{$user->email}}" type='email' class="form-control">
            </div>
            <div class='fields'>
              <label for='username'>Username</label>
              <input id='username' name='username' type='text' value="{{$user->username}}" class="form-control">
            </div>
             <div class='fields'>
              <label for='account'>Account Type</label>
              <input id='account' name='account' type='text' value="{{$roles->name}}" class="form-control" readonly>
            </div>
            <div class="field-button">
             <button type="submit" name="button" class="btn btn-default" style="width:100%">Update</button>
           </div>          
          </form>
        </div>

        <div class="row">
            <div class="col-md-12 color_bottom">
                <h3 class="all_album">
                   EDIT PASSWORD
                </h3>
            </div>
        </div>
        <hr class="line">
        <div class='form'>          
          <form action="{{route('user_update_password',['id'=>$user->id])}}" method="POST">
            {{csrf_field()}}
            <div class='fields'>
              <label for='password'>Old Password</label>
               <input id='password' name='old_password' type='password' value="" class="form-control" data-errormessage-value-missing="Name of entity is required!" required autofocus>
            </div>
            <div class='fields'>
              <label for='password'>New Password</label>
               <input id='password' name='password' type='password' value="" class="form-control" data-errormessage-value-missing="Name of entity is required!" required autofocus>
            </div>
            <div class='fields'>
              <label for='password'>Confirm Password</label>
               <input id='password' name='password_confirmation' type='password' value="" class="form-control" data-errormessage-value-missing="Name of entity is required!" required autofocus>
            </div>   
             <div class="field-button">
             <button type="submit" name="password-button" class="btn btn-default" style="width:100%">Update</button>
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
    </div>
  </div>
</div>
@endsection
