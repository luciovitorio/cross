@extends('master.master')

@section('content')
<div class="page-content">
  <div class="mb-3">
    <h4 class="mb-4 mb-md-0">Controle de Usuários</h4>
    <div class="d-grid gap-2">
      <button type="submit" class="btn btn-primary btn-icon-text mb-4" data-bs-toggle="modal"
        data-bs-target="#createUserModal">
        <i data-feather="user-plus" class="btn-icon-prepend"></i>
        Cadastrar Usuário
      </button>
    </div>
  </div>
  <!-- CARD 1 -->
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Lista de usuários</h6>
          <div class="table-responsive">
            <table class="table userTable tbl" style="width: 100%;">
              <thead>
                <tr>
                  <th></th>
                  <th>Nome</th>
                  <th>E-mail</th>
                  <th>Telefone</th>
                  <th>Perfil</th>
                  <th>Imagem</th>
                  <th>Estado</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <td></td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->phone}}</td>
                  <td>{{$user->profile}}</td>
                  @if ($user->photo)
                  <td>
                    <img src="{{url("storage/{$user->photo}")}}" class="img-thumbnail">
                  </td>
                  @else
                  <td>
                    <img src="{{url("storage/user/user.png")}}" class="img-thumbnail">
                  </td>
                  @endif

                  <td>
                    @if ($user->status == 1)
                    <button name="alterStatus" class="btn btn-success btn-xs btnActivate" idUser="{{$user->id}}"
                      userStatus="0">
                      Ativo
                    </button>
                    @else
                    <button name="alterStatus" class="btn btn-danger btn-xs btnActivate" idUser="{{$user->id}}"
                      userStatus="1">
                      Bloqueado
                    </button>
                    @endif
                  </td>
                  <td class="col">
                    <div class="btn-group">
                      <button type="button" data-bs-toggle="modal" idUser="{{$user->id}}" id=""
                        data-bs-target="#modalEditUser" class="btn btnEdit btn-xs btn-warning btn-icon">
                        <i data-feather="edit"></i>
                      </button>
                      <button type="button" class="btn btn-xs btnDel btn-danger btn-icon" idUser="{{$user->id}}">
                        <i data-feather="x-square"></i>
                      </button>
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
  </div>
</div>

<!-- MODAL ADD USER-->
<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form role="form" name="createUser" action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
        <div class="modal-header text-bg-light">
          <h5 class=" modal-title" id="exampleModalLabel">Criar Usuário</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i data-feather="user"></i></span>
              <input type="text" class="form-control " name="name" placeholder="Nome" aria-invalid="true"
                aria-describedby="basic-addon1" required>
              <label id="name-error" class="error invalid-feedback">
              </label>
            </div>


            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i data-feather="mail"></i></span>
              <input type="email" class="form-control" name="email" placeholder="E-mail" aria-describedby="basic-addon1"
                required>
              <label id="email-error" class="error invalid-feedback">
              </label>
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i data-feather="lock"></i></span>
              <input type="password" class="form-control" name="password" placeholder="Senha"
                aria-describedby="basic-addon1" required>
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i data-feather="phone"></i></span>
              <input type="tel" class="form-control phone" name="phone" placeholder="WhatsApp"
                aria-describedby="basic-addon1">
              <label id="phone-error" class="error invalid-feedback">
              </label>
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i data-feather="users"></i></span>
              <select class="form-select" id="profileSelect" name="profile">
                <option selected disabled>Selecione o perfil</option>
                <option value="admin">Administrador</option>
                <option value="user">Usuário</option>
              </select>

              <label id="profile-error" class="error invalid-feedback">
              </label>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Enviar foto</label>
            <input class="form-control newPhoto" type="file" name="photo">
            <p class="fw-light text-center mb-2 fst-italic">O tamanho da imagem não pode ultrapassar 2MB</p>
            <img src="{{asset('assets/images/users/default/user.png')}}" class="img-thumbnail preview" width="100px">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary cancel" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- MODAL EDIT USER-->
<div class="modal fade" id="modalEditUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form role="form" name="editUser" action="{{route('users.update','/')}}" method="POST"
        enctype="multipart/form-data">
        <div class="modal-header text-bg-light">
          <h5 class=" modal-title" id="exampleModalLabel">Editar Usuário</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" id="id" name="id">

            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i data-feather="user"></i></span>
              <input type="text" class="form-control" id="editName" name="name" aria-describedby="basic-addon1"
                required>
              <label id="editName-error" class="error invalid-feedback">
              </label>
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i data-feather="mail"></i></span>
              <input type="email" class="form-control" id="editEmail" name="email" aria-describedby="basic-addon1">
              <label id="editEmail-error" class="error invalid-feedback">
              </label>
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i data-feather="phone"></i></span>
              <input type="tex" class="form-control editPhone" id="editPhone" name="phone" placeholder="WhatsApp"
                aria-describedby="basic-addon1">
              <label id="editPhone-error" class="error invalid-feedback">
              </label>
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i data-feather="users"></i></span>
              <select class="form-select" id="profile" name="profile">
                <option value="" id="editProfile"></option>
                <option value="admin">Administrador</option>
                <option value="user">Usuário</option>
              </select>
              <label id="editProfile-error" class="error invalid-feedback">
              </label>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Enviar foto</label>
            <input class="form-control newPhoto" type="file" id="editPhoto" name="photo">
            <p class="fw-light text-center mb-2 fst-italic">O tamanho da imagem não pode ultrapassar 2MB</p>
            <img src="assets/images/users/default/user.png" class="img-thumbnail previous" width="100px">
            <input type="hidden" name="photo" id="currentPhoto">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Alterar Usuário</button>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection

@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="{{asset('assets/js/_iniDataTable.js')}}"></script>
<script src="{{asset('assets/js/_usersCreate.js')}}"></script>
<script src="{{asset('assets/js/_usersEdit.js')}}"></script>
<script src="{{asset('assets/js/_usersDel.js')}}"></script>
<script src="{{asset('assets/js/_alterStatus.js')}}"></script>
@endsection