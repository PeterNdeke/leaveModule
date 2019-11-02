@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Your leave Request</div>

                <div class="card-body">
                  @if (count($leave) != 0)
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                       
                        <th scope="col">First</th>
                        <th scope="col">Leave Start Day</th>
                        <th scope="col">Leave End Day</th>
                        <th scope="col">Date Applied</th>
                        <th scope="col">Approval Status</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($leave as $item)
                        <tr>
                        
                        <td>{{$item->user->name}}</td>
                        <td>{{$item->leave_start_day}}</td>
                        <td>{{$item->leave_end_day}}</td>
                        <td>{{$item->created_at->toFormattedDateString()}}</td>
                        <td>{{$item->status}}</td>
                       
                        </tr>
                        @endforeach
                     
                     
                      
                    </tbody>
                  </table>
                  @else
                     <span class="alert alert-info">You have not created any leave yet</span>
                <a href="{{url('leave')}}" class="btn btn-primary">Create A  Leave </a>
                  @endif
                    
                      
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
