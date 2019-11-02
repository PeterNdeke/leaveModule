@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Leave</div>

                <div class="card-body">
                 @include('partials.flash')
                 @include('errors.list')
                <form method="POST" action="{{url('sbmit-leave')}}">

                    @csrf
                                <div class="form-group">
                                  <label for="exampleInputEmail1"></label>
                                  <input type="number" class="form-control" name="duration_days" placeholder="Duration Days">
                                  
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Leave Start Day</label>
                                  <input type="date" class="form-control" name="startDay" placeholder="Start Day">
                                </div>
                                

                                      <div class="form-group">
                                            <label for="exampleInputPassword1">Describe your reasons</label>
                                            <textarea class="form-control" name="reason" id="exampleFormControlTextarea1" rows="3"></textarea>
                                          </div>
                               
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </form>  
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
