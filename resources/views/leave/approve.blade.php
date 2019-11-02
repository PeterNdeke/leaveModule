@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @include('partials.flash')
                <div class="card-header">Your leave Requests to Approve</div>

                <div class="card-body">
                  @if (count($leave) != 0)
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                       
                        <th scope="col">Requested By</th>
                        <th scope="col">Leave Start Day</th>
                        <th scope="col">Expected End Day</th>
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
                        <td>
                            @if ($item->status == 'pending')
                            <form onsubmit="return confirm('Do you really want to de-activate?');" method="post"  action="{{ url("approve/$item->id")}}" method="POST">
                                {{ csrf_field() }}
                               
    
                                <button type="submit" class="btn btn-primary">
                                       Approve
                                </button>
                        </form>

                            @else
                               {{$item->status}} 
                            @endif
                        </td>
                        
                        
                        </tr>
                        @endforeach
                     
                     
                      
                    </tbody>
                  </table>
                  @else
                     <span class="alert alert-info">You have no Pending Request to Approve</span>
               
                  @endif
                    
                      
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
