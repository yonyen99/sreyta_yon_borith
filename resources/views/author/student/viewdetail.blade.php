@extends('layouts.app')

@section('content')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
                  <div class="card">
                      <div class="hovereffect">
                        <img class="rounded mx-auto d-block img-responsive rounded-circle" src="{{asset('images/'.$student->picture)}}" width="200" height="250" alt="User">
                      </div>
                    <table class="table table-border" style="color:teal;">
                      <tr>
                        <th class="header-table">Student ID</th>
                       <td class="content">{{$student->student_id}} </td>
                     </tr>
                      <tr>
                         <th class="header-table">Full Name</th>
                        <td class="content">{{$student->first_name}}​​ {{$student->last_name}} </td>
                      </tr>
                      <tr>
                         <th class="header-table">Gender</th>
                        <td class="content">{{$student->gender}} </td>
                      </tr>
                       <tr>
                         <th class="header-table">Class</th>
                        <td class="content">{{$student->class}} </td>
                      </tr>
                      <tr>
                         <th class="header-table">Year</th>
                        <td class="content">{{$student->year}} </td>
                      </tr>
                       
                       <tr>
                         <th class="header-table">Province</th>
                        <td class="content">{{$student->province}} </td>
                      </tr>
                      <tr>
                         <th class="header-table">Status</th>
                        <td class="content">
                             
                          @if ($student->status == 0)
                         achive
                      @endif
                      @if ($student->status == 1)
                     follow up
                  @endif
                           
                        
                        </td>
                      </tr>
                      <tr>
                         <th class="header-table">Tutor ID</th>
                        <td class="content"> {{$student->user_id}}</td>
                      </tr>
                       <tr>
                         <th class="header-table">Comment</th>
                        <td class="content">
                          <a href="">view comment</a> |
                          <a href="">give comment</a>
                        </td>
                      </tr>
                    </table>
                    <a class="btn btn-success pull-left mb-5" href="">Go Back</a>
                  </div>
        </div>
    </div>
</div>
@endsection
