

@extends('layouts.template')

@section('title','Listado Usuario')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Usuarios</h4>
                <button class="btn btn-success btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="fa fa-plus"></i>
                    Ingresar
                </button>
            </div>
        </div>
        <div class="card-body">
            <!-- Modal -->
            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header no-bd">
                            <h5 class="modal-title">
                                <span class="fw-mediumbold">
                                New</span> 
                                <span class="fw-light">
                                        
                                </span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="small">Create a new row using this form, make sure you fill them all</p>
                            <form>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Name</label>
                                            <input id="addName" type="text" class="form-control" placeholder="fill name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 pr-0">
                                        <div class="form-group form-group-default">
                                            <label>Position</label>
                                            <input id="addPosition" type="text" class="form-control" placeholder="fill position">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Office</label>
                                            <input id="addOffice" type="text" class="form-control" placeholder="fill office">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer no-bd">
                            <button type="button" id="addRowButton" class="btn btn-primary">Add</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover add-row" >
                    <thead>
                        <tr>
                            <th>#Cod</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th  style="width: 10%">Action</th>
                        </tr>
                    </thead>
   
                    <tbody>
                                            

                        @foreach ($data as $key => $user)
                        <tr>
                          <td>{{ ++$i }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>
                            @if(!empty($user->getRoleNames()))
                              @foreach($user->getRoleNames() as $v)
                                 <label class="badge badge-success">{{ $v }}</label>
                              @endforeach
                            @endif
                          </td>
                          <td>

                           
                            <div class="form-button-action">
                               <a class="btn btn-link btn-success btn-lg" data-toggle="tooltip" data-original-title="Ver" 
                                href="{{ route('users.show',$user->id) }}"><i class="fa fa-eye"></i></a>
                                
                                <a class="btn btn-link btn-primary btn-lg" data-toggle="tooltip" data-original-title="Editar" 
                                href="{{ route('users.edit',$user->id) }}"><i class="fa fa-edit"></i></a>
                                
                                
                                <a class="btn btn-link btn-danger" data-toggle="tooltip"  data-original-title="Eliminar" href=""><i class="fa fa-times"></i></a>
                             
                            </div>
                        </td>
                         
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection
