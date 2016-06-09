@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <span class="btn btn-success fileinput-button">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>Select files...</span>
                        <input id="fileupload" type="file" name="documento" data-token="{!! csrf_token() !!}" data-user-id="{!! Auth::user()->id !!}">
                    </span>
                    <br>
                    <br>
                    <div id="progress" class="progress">
                        <div class="progress-bar progress-bar-success"></div>
                    </div>

                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="alert alert-success hide" id="upload-success">
						Upload realizado com sucesso!
					</div>

                    <div>
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Enviado em</th>
                                    <th>Usuário</th>
                                    <th>Ações</th>
                                </tr>
                                <tbody>
                                    @foreach($user->files as $file)
                                    <tr>
                                        <td>{{ $file->name }}</td>
                                        <td>{{ $file->created_at }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            <a href="/download/usuario/{{$user->id}}/file/{{$file->id}}" class="btn btn-xs btn-success">Download</a>
                                            <a href="/destroy/usuario/{{$user->id}}/file/{{$file->id}}" class="btn btn-xs btn-danger">Remover</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
