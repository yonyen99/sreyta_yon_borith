@include('interface.interface')
<div class="main-panel">
    <div class="content">
         <div class="container-fluid">
          <h3 class="text-center">under mentor students list <span class="badge badge-primary">{{$countStudents}}</span></h3>
            <div class="table-responsive">
              <table id="example" class="table table-striped" cellspacing="0" width="100%">
                <thead>
                  <tr>
                      <th class="th-sm">Profile</th>
                      <th class="th-sm">Name</th>
                      <th class="th-sm">Gender</th>
                      <th class="th-sm">Class</th>
                      <th class="th-sm">Tutor_Name</th>
                    <th class="th-sm">Status</th>
                    <th class="th-sm">Comment</th>
                    <th class="th-sm">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($students  as $student)
                        <tr>
                          <td><img src="{{asset('img_student/'.$student->picture)}}" width="40" style="border-radius: 25px;" height="40" alt="User" /></td>
                          <td>{{$student->first_name." ".$student->last_name}}</td>
                          <td>{{$student->gender}}</td>
                          <td>{{$student->class}}</td>
                          <td>
                            @if ($student->user_id == null)
                            <div class="form-group p-0">
                            <a href="{{route('admin.showPageAddTutor',$student->id)}}">assign tutor</a>
                        
                            @else
                            <a class="text-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">{{$student->User->first_name}}. {{ $student->User->last_name}}</a>                            
                            <ul class="dropdown-menu">
                              <a href="{{route('admin.showPageAddTutor',$student->id)}}">Change</a>
                            </ul>  
                            @endif
                        </td>
                            
                          <td>
                              
                            @if ($student->status == 0)
                            <div class="dropdown">
                                <a class="text-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">Achive</a>                            
                                <ul class="dropdown-menu">
                                <a href="{{ route('admin.followUp',$student->id) }}">follow up</a>
                                </ul>  
                            </div>
                        @endif
                        @if ($student->status == 1)
                        <div class="dropdown">
                            <a class="text-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">Follow up</a>                            
                            <ul class="dropdown-menu">
                            <a href="{{ route('admin.achive',$student->id) }}">achive</a>
                            </ul>  
                        </div>
                    @endif
                          
                        </td>
                      
                        
                            <td class="text-primary" style="cursor:pointer">
                                {{-- <a href="{{route('admin.showForm', $student->id)}}"><span class="material-icons">comment</span></span></a> --}}
                                <a class="text-primary" tabindex="-1" type="button" data-toggle="modal" data-backdrop="false" aria-hidden="true" data-target="#addComment{{$student->id}}" href="#" href=""><span class="material-icons">comment</span></a>
                                <div class="modal fade modal-open" id="addComment{{$student->id}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Add Comment</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action= "{{route('admin.addComment', $student->id)}}">
                                                @csrf
                                                <input type="text" name="comment" id="" class="form-control" >
                                           
                                            <br>
                                            <br>
                                            <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-success">Add</button>
                                          </form>
                                        </div>
                                        <div class="modal-footer">
                                           
                                        </div>
                                      </div>
                                    </div>
                                  </div>  
                                <a href="{{route('admin.comment',$student->id)}}"><span class="material-icons">more_horiz </span></a>
                                
                                
                                   
                            </td>
                        

                        <td>

                            {{-- <a href="{{route('admin.student.destroy',$student->id)}}">delete</a> | --}}
                            {{-- <a href="{{route('admin.student.edit',$student->id)}}"><span class="material-icons green">edit</span></a>  --}}


                            
           <a class="text-primary" tabindex="-1" type="button" data-toggle="modal" data-backdrop="false" aria-hidden="true" data-target="#editStudent{{$student->id}}" href="#" href=""><span class="count_bottom"><span class="material-icons green">edit</span></a></a>
           <div class="modal fade modal-open" id="editStudent{{$student->id}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                     

                     <form method="POST" action="{{route('admin.student.update',$student->id)}}" enctype="multipart/form-data">
                       @csrf
                       @method('patch')
                       <div class="form-row">
                         <div class="form-group col-md-6">
                           <label for="inputEmail4">First Name</label>
                           <input type="text" class="form-control" id="inputName"   name="first_name" value="{{$student->first_name}}">
                         </div>
                         <div class="form-group col-md-6">
                           <label for="inputPassword4">Last Name</label>
                           <input type="text" class="form-control" id="inputlastname"  name="last_name" value="{{$student->last_name}}">
                         </div>
                       </div>
                       <div class="form-group">
                         
                         {{-- <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"> --}}
                         
                         @if  ($student->gender == "Female")
                         <input type="radio" id="female" name="gender" value="Female"  checked> Female
                         <input type="radio" id="male" name="gender" value="Male"  > Male
                       @else
                       <input type="radio" id="male" name="gender" value="Male" checked > Male
                       <input type="radio" id="female" name="gender" value="Female" > Female
                       @endif
                       </div>
                       <div class="form-group">
                         
                         <label for="province">Province</label>
                         <input type="text" class="form-control" id="province"  name="province" value="{{$student->province}}">
                       </div>
                       
                       <div class="form-row">
                         <div class="form-group col-md-6">
                           <label for="inputCity">Class</label>
                           <input type="text" class="form-control" id="inputCity" name="class" value="{{$student->class}}">
                         </div>
                         <div class="form-group col-md-4">
                           <label for="inputState">Student_id</label>
                           <input type="text" class="form-control" id="inputCity" name="student_id" value="{{$student->student_id}}">
                         </div>
                         <div class="form-group col-md-2">
                           <label for="inputZip">Year</label>
                           <input type="number" class="form-control" id="inputZip" name="year" value="{{$student->year}}">
                         </div>
                       </div>
                       
                       <button type="submit" class="btn btn-primary">Edit</button>
                     </form>
                     
                   </div>
                   <div class="modal-footer">
                      
                   </div>
                 </div>
               </div>
             </div>  
                            <a class="text-primary" tabindex="-1" type="button" data-toggle="modal" data-backdrop="false" aria-hidden="true" data-target="#exampleModal{{$student->id}}" href="#"><i class="material-icons red">delete</i></a>
                            <!-- Modal -->
                            <div class="modal fade modal-open" id="exampleModal{{$student->id}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Student</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    Are you sure want to delelte?
                                  </div>
                                  <div class="modal-footer">
                                    <form method="POST" action= "{{route('admin.student.destroy',$student->id)}}">
                                      @csrf
                                      @method('DELETE')
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                      <button type="submit" class="btn btn-primary">Delete</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>  


                            <a data-toggle="modal" data-target="#myModal{{$student->id}}" href=""><span class="material-icons green">visibility</span></a>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{$student->id}}" role="dialog"  data-toggle="modal" data-target="#myModal{{$student->id}}">
                              <div class="modal-dialog">
                              
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                   
                                    
                                  </div>
                                  <div class="modal-body">
                                    <div class="card-header p-4 ">
                                        <div class="row d-flex justify-content-center">
                                            <div class="container-image">
                                                <img class="mx-auto d-block" src="{{asset('img_student/'.$student->picture)}}" width="105" style="border-radius: 105px;" height="105" alt="Avatar">
                                   

                                            </div>
                                        </div>
                                          <hr>
                                          <div class="row d-flex justify-content-between">
                                            <p> <strong>First Name: </strong>{{$student['first_name']}} </p>
                                            <p><strong>Last Name: </strong>{{$student['last_name']}}</p>
                                          </div>
                                          <div class="row d-flex justify-content-between">
                                            <p><strong>ID_Student: </strong>{{$student['student_id']}}</p>
                                            <p><strong>Class: </strong>{{$student['class']}}</p>
                                          </div>
                                          <div class="row d-flex justify-content-between">
                                            <p><strong>Province </strong>{{$student['province']}}</p>
                                            <p><strong>Gender: </strong>{{$student['gender']}}</p>  
                                          </div>
                                          <div class="row d-flex justify-content-between">
                                            <p><strong>Class </strong>{{$student['class']}}</p>
                                            <p><strong>year: </strong>{{$student['year']}}</p>  
                                          </div>
                                          <div class="row d-flex justify-content-between">
                                            <p>
                                                <strong>Status </strong>
                                                @if ($student->status == 0)
                                                Archive
                                            @endif
                                            @if ($student->status == 1)
                                                Follow up
                                            @endif
                                            </p>
                                            <p>
                                              <strong>Tutor_Name:</strong> 
                                              @if ($student->user_id == null)
                                              Not yet Tutor
                                              @else
                                              {{$student->user['first_name']}}.{{$student->user['last_name']}}
                                                    
                                                @endif
                                            </p>
                                          </div>
                                    </div>
                                </div>

                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div> 

                               

                        </td>
                        </tr>
                      
                    @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th class="th-sm">Profile</th>
                      <th class="th-sm">Name</th>
                      <th class="th-sm">Gender</th>
                      <th class="th-sm">Class</th>
                      <th class="th-sm">Tutor_Name</th>
                    <th class="th-sm">Status</th>
                    <th class="th-sm">Comment</th>
                    <th class="th-sm">Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
         </div>
    </div>
  </div>