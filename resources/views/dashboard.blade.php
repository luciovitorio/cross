@extends('master.master')

@section('content')
<div class="page-content">
  <div class="mb-3">
    <h4 class="mb-5 mb-md-0 text-capitalize">Bem vindo(a): {{session('name')}}</h4>
  </div>
  <!-- CARD 1 -->
  @foreach ($alerts as $alert)
  <div class="row">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
      <div class="alert alert-danger" role="alert">
        <i data-feather="alert-circle"></i>
        {{$alert->message}}
      </div>
    </div>
  </div>
  @endforeach

  <div>
    <!-- CARD 2 -->
    <div class="row">
      <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
              <h6 class="card-title mb-0">Agendamento - {{$mesAtual}}</h6>
            </div>
            <div class="row align-items-start">
              <div class="col-md-12">
                <div class="d-grid gap-2 mb-3">
                  {{-- SEGUNDA-FEIRA --}}
                  <div class="d-grid d-flex">
                    @if ($segunda->status == 1)
                    <button class="btn btnSeg btn-inverse-primary flex-grow-1 me-1 text-capitalize" type="button"
                      data-bs-toggle="collapse" data-bs-target="#{{$segunda->name}}" aria-expanded="false">
                      {{$segunda->name}}-feira | <span class="badge bg-success">Liberado</span>
                    </button>
                    @else
                    <button class="btn btnSeg disabled btn-inverse-danger flex-grow-1 me-1 text-capitalize"
                      type="button" data-bs-toggle="collapse" data-bs-target="#{{$segunda->name}}"
                      aria-expanded="false">
                      {{$segunda->name}}-feira | <span class="badge bg-danger">Bloqueado</span>
                    </button>
                    @endif

                  </div>
                  <div class="collapse" id="{{$segunda->name}}">
                    <div class="card card-body">
                      @foreach ($hoursSeg as $hour)
                      <div class="d-grid d-flex">
                        @if ($hour->status == 1 && $hour->total < $qtdAllowedUsers->quantity && $mySchedule &&
                          $mySchedule->hour_id ===
                          $hour->id)
                          <button class="btn btnHourSeg btn-inverse-success mb-3 flex-grow-1 me-1"
                            idHour="{{$hour->id}}" hora="{{$hour->hour}}" idDay="{{$segunda->id}}"
                            idUser="{{session('id')}}" type="button" hourStatus="0" data-bs-toggle="modal"
                            data-bs-target="#addSchedule">
                            {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-success">{{$hour->total}}
                              alunos</span> <span class="badge bg-danger desmarcar" idHour="{{$hour->id}}"
                              idUser="{{session('id')}}">Desmarcar</span>
                          </button>
                          @elseif ($hour->status == 1 && $hour->total == $qtdAllowedUsers->quantity && $mySchedule &&
                          $mySchedule->hour_id ===
                          $hour->id)
                          <button class="btn btnHourSeg btn-inverse-secondary mb-3 flex-grow-1 me-1"
                            idHour="{{$hour->id}}" hora="{{$hour->hour}}" idDay="{{$segunda->id}}"
                            idUser="{{session('id')}}" type="button" hourStatus="0" data-bs-toggle="modal"
                            data-bs-target="#addSchedule">
                            {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-primary">{{$hour->total}}
                              alunos - Turma fechada</span> <span class="badge bg-danger desmarcar"
                              idHour="{{$hour->id}}" idUser="{{session('id')}}">Desmarcar</span>
                          </button>
                          @elseif($hour->status == 1 && $hour->total == $qtdAllowedUsers->quantity) <button
                            class="btn btnHourSeg btn-inverse-secondary mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                            hora="{{$hour->hour}}" idDay="{{$segunda->id}}" idUser="{{session('id')}}" type="button"
                            hourStatus="0" data-bs-toggle="modal" data-bs-target="#addSchedule">
                            {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-primary">{{$hour->total}}
                              alunos - Turma Fechada</span>
                          </button>
                          @elseif($hour->status == 1 && $hour->total < $qtdAllowedUsers->quantity) <button
                              class="btn btnHourSeg btn-inverse-success mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                              hora="{{$hour->hour}}" idDay="{{$segunda->id}}" idUser="{{session('id')}}" type="button"
                              hourStatus="0" data-bs-toggle="modal" data-bs-target="#addSchedule">
                              {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span
                                class="badge bg-success">{{$hour->total}}
                                alunos</span>
                            </button>
                            @else
                            <button class=" btn btnHourSeg btn-inverse-danger mb-3 flex-grow-1 me-1 disabled"
                              idHour="{{$hour->id}}" type=" button" hourStatus="1">
                              {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-danger">Bloqueado</span>
                            </button>
                            @endif

                      </div>
                      @endforeach
                    </div>
                  </div>

                  {{-- TERÇA-FEIRA --}}

                  <div class="d-grid d-flex">
                    @if ($terca->status == 1)
                    <button class="btn btnTer btn-inverse-primary flex-grow-1 me-1 text-capitalize" type="button"
                      data-bs-toggle="collapse" data-bs-target="#{{$terca->name}}" aria-expanded="false">
                      {{$terca->name}}-feira | <span class="badge bg-success">Liberado</span>
                    </button>
                    @else
                    <button class="btn btnTer disabled btn-inverse-danger flex-grow-1 me-1 text-capitalize"
                      type="button" data-bs-toggle="collapse" data-bs-target="#{{$terca->name}}" aria-expanded="false">
                      {{$terca->name}}-feira | <span class="badge bg-danger">Bloqueado</span>
                    </button>
                    @endif
                  </div>
                  <div class="collapse" id="{{$terca->name}}">
                    <div class="card card-body">
                      @foreach ($hoursTer as $hour)
                      <div class="d-grid d-flex">
                        @if ($hour->status == 1 && $hour->total < $qtdAllowedUsers->quantity && $mySchedule &&
                          $mySchedule->hour_id ===
                          $hour->id)
                          <button class="btn btnHourTer btn-inverse-success mb-3 flex-grow-1 me-1"
                            idHour="{{$hour->id}}" hora="{{$hour->hour}}" idDay="{{$terca->id}}"
                            idUser="{{session('id')}}" type="button" hourStatus="0" data-bs-toggle="modal"
                            data-bs-target="#addSchedule">
                            {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-success">{{$hour->total}}
                              alunos</span> <span class="badge bg-danger desmarcar" idHour="{{$hour->id}}"
                              idUser="{{session('id')}}">Desmarcar</span>
                          </button>
                          @elseif ($hour->status == 1 && $hour->total == $qtdAllowedUsers->quantity && $mySchedule &&
                          $mySchedule->hour_id ===
                          $hour->id)
                          <button class="btn btnHourTer btn-inverse-secondary mb-3 flex-grow-1 me-1"
                            idHour="{{$hour->id}}" hora="{{$hour->hour}}" idDay="{{$terca->id}}"
                            idUser="{{session('id')}}" type="button" hourStatus="0" data-bs-toggle="modal"
                            data-bs-target="#addSchedule">
                            {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-primary">{{$hour->total}}
                              alunos - Turma fechada</span> <span class="badge bg-danger desmarcar"
                              idHour="{{$hour->id}}" idUser="{{session('id')}}">Desmarcar</span>
                          </button>
                          @elseif($hour->status == 1 && $hour->total == $qtdAllowedUsers->quantity) <button
                            class="btn btnHourTer btn-inverse-secondary mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                            hora="{{$hour->hour}}" idDay="{{$terca->id}}" idUser="{{session('id')}}" type="button"
                            hourStatus="0" data-bs-toggle="modal" data-bs-target="#addSchedule">
                            {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-primary">{{$hour->total}}
                              alunos - Turma Fechada</span>
                          </button>
                          @elseif($hour->status == 1 && $hour->total < $qtdAllowedUsers->quantity) <button
                              class="btn btnHourTer btn-inverse-success mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                              hora="{{$hour->hour}}" idDay="{{$terca->id}}" idUser="{{session('id')}}" type="button"
                              hourStatus="0" data-bs-toggle="modal" data-bs-target="#addSchedule">
                              {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span
                                class="badge bg-success">{{$hour->total}}
                                alunos</span>
                            </button>
                            @else
                            <button class=" btn btnHourTer btn-inverse-danger mb-3 flex-grow-1 me-1 disabled"
                              idHour="{{$hour->id}}" type=" button" hourStatus="1">
                              {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-danger">Bloqueado</span>
                            </button>
                            @endif

                      </div>
                      {{-- <div class="d-grid d-flex">
                        @if ($hour->status == 1 && $hour->total < $qtdAllowedUsers->quantity && $mySchedule &&
                          $mySchedule->hour_id ===
                          $hour->id)
                          <button class="btn btnHourTer btn-inverse-success mb-3 flex-grow-1 me-1"
                            idHour="{{$hour->id}}" hora="{{$hour->hour}}" idDay="{{$terca->id}}"
                            idUser="{{session('id')}}" type="button" hourStatus="0" data-bs-toggle="modal"
                            data-bs-target="#addSchedule">
                            {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-success">{{$hour->total}}
                              alunos</span> <span class="badge bg-danger desmarcar" idHour="{{$hour->id}}"
                              idUser="{{session('id')}}">Desmarcar</span>
                          </button>
                          @elseif($hour->status == 1 && $hour->total == $qtdAllowedUsers->quantity && $mySchedule &&
                          $mySchedule->hour_id ===
                          $hour->id)
                          <button class="btn btnHourTer btn-inverse-success mb-3 flex-grow-1 me-1"
                            idHour="{{$hour->id}}" hora="{{$hour->hour}}" idDay="{{$terca->id}}"
                            idUser="{{session('id')}}" type="button" hourStatus="0" data-bs-toggle="modal"
                            data-bs-target="#addSchedule">
                            {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-success">{{$hour->total}}
                              alunos</span>
                            @else
                            <button class=" btn btnHourTer btn-inverse-danger mb-3 flex-grow-1 me-1"
                              idHour="{{$hour->id}}" type=" button" hourStatus="1" disabled>
                              {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-danger">Bloqueado</span>
                            </button>
                            @endif

                      </div> --}}
                      @endforeach
                    </div>
                  </div>

                  {{-- QUARTA-FEIRA --}}

                  <div class="d-grid d-flex">
                    @if ($quarta->status == 1)
                    <button class="btn btnQua btn-inverse-primary flex-grow-1 me-1 text-capitalize" type="button"
                      data-bs-toggle="collapse" data-bs-target="#{{$quarta->name}}" aria-expanded="false">
                      {{$quarta->name}}-feira | <span class="badge bg-success">Liberado</span>
                    </button>
                    @else
                    <button class="btn btnQua disabled btn-inverse-danger flex-grow-1 me-1 text-capitalize"
                      type="button" data-bs-toggle="collapse" data-bs-target="#{{$quarta->name}}" aria-expanded="false">
                      {{$quarta->name}}-feira | <span class="badge bg-danger">Bloqueado</span>
                    </button>
                    @endif

                  </div>

                  <div class="collapse" id="{{$quarta->name}}">
                    <div class="card card-body">
                      @foreach ($hoursQua as $hour)
                      <div class="d-grid d-flex">
                        @if ($hour->status == 1 && $hour->total < $qtdAllowedUsers->quantity && $mySchedule &&
                          $mySchedule->hour_id ===
                          $hour->id)
                          <button class="btn btnHourQua btn-inverse-success mb-3 flex-grow-1 me-1"
                            idHour="{{$hour->id}}" hora="{{$hour->hour}}" idDay="{{$quarta->id}}"
                            idUser="{{session('id')}}" type="button" hourStatus="0" data-bs-toggle="modal"
                            data-bs-target="#addSchedule">
                            {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-success">{{$hour->total}}
                              alunos</span> <span class="badge bg-danger desmarcar" idHour="{{$hour->id}}"
                              idUser="{{session('id')}}">Desmarcar</span>
                          </button>
                          @elseif ($hour->status == 1 && $hour->total == $qtdAllowedUsers->quantity && $mySchedule &&
                          $mySchedule->hour_id ===
                          $hour->id)
                          <button class="btn btnHourQua btn-inverse-secondary mb-3 flex-grow-1 me-1"
                            idHour="{{$hour->id}}" hora="{{$hour->hour}}" idDay="{{$quarta->id}}"
                            idUser="{{session('id')}}" type="button" hourStatus="0" data-bs-toggle="modal"
                            data-bs-target="#addSchedule">
                            {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-primary">{{$hour->total}}
                              alunos - Turma fechada</span> <span class="badge bg-danger desmarcar"
                              idHour="{{$hour->id}}" idUser="{{session('id')}}">Desmarcar</span>
                          </button>
                          @elseif($hour->status == 1 && $hour->total == $qtdAllowedUsers->quantity) <button
                            class="btn btnHourQua btn-inverse-secondary mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                            hora="{{$hour->hour}}" idDay="{{$quarta->id}}" idUser="{{session('id')}}" type="button"
                            hourStatus="0" data-bs-toggle="modal" data-bs-target="#addSchedule">
                            {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-primary">{{$hour->total}}
                              alunos - Turma Fechada</span>
                          </button>
                          @elseif($hour->status == 1 && $hour->total < $qtdAllowedUsers->quantity) <button
                              class="btn btnHourQua btn-inverse-success mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                              hora="{{$hour->hour}}" idDay="{{$quarta->id}}" idUser="{{session('id')}}" type="button"
                              hourStatus="0" data-bs-toggle="modal" data-bs-target="#addSchedule">
                              {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span
                                class="badge bg-success">{{$hour->total}}
                                alunos</span>
                            </button>
                            @else
                            <button class=" btn btnHourQua btn-inverse-danger mb-3 flex-grow-1 me-1 disabled"
                              idHour="{{$hour->id}}" type=" button" hourStatus="1">
                              {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-danger">Bloqueado</span>
                            </button>
                            @endif

                      </div>
                      {{-- <div class="d-grid d-flex">
                        @if ($hour->status == 1 && $hour->total < $qtdAllowedUsers->quantity && $mySchedule &&
                          $mySchedule->hour_id ===
                          $hour->id)
                          <button class="btn btnHourQua btn-inverse-success mb-3 flex-grow-1 me-1"
                            idHour="{{$hour->id}}" hora="{{$hour->hour}}" idDay="{{$quarta->id}}"
                            idUser="{{session('id')}}" type="button" hourStatus="0" data-bs-toggle="modal"
                            data-bs-target="#addSchedule">
                            {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-success">{{$hour->total}}
                              alunos</span> <span class="badge bg-danger desmarcar" idHour="{{$hour->id}}"
                              idUser="{{session('id')}}">Desmarcar</span>
                          </button>
                          @elseif($hour->status == 1 && $hour->total < $qtdAllowedUsers->quantity) <button
                              class="btn btnHourQua btn-inverse-success mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                              hora="{{$hour->hour}}" idDay="{{$quarta->id}}" idUser="{{session('id')}}" type="button"
                              hourStatus="0" data-bs-toggle="modal" data-bs-target="#addSchedule">
                              {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span
                                class="badge bg-success">{{$hour->total}}
                                alunos</span>
                              @else
                              <button class=" btn btnHourQua btn-inverse-danger mb-3 flex-grow-1 me-1"
                                idHour="{{$hour->id}}" type=" button" hourStatus="1" disabled>
                                {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span
                                  class="badge bg-danger">Bloqueado</span>
                              </button>
                              @endif

                      </div> --}}
                      @endforeach
                    </div>
                  </div>

                  {{-- QUINTA-FEIRA --}}

                  <div class="d-grid d-flex">
                    @if ($quinta->status == 1)
                    <button class="btn btnQui btn-inverse-primary flex-grow-1 me-1 text-capitalize" type="button"
                      data-bs-toggle="collapse" data-bs-target="#{{$quinta->name}}" aria-expanded="false">
                      {{$quinta->name}}-feira | <span class="badge bg-success">Liberado</span>
                    </button>
                    @else
                    <button class="btn btnQui disabled btn-inverse-danger flex-grow-1 me-1 text-capitalize"
                      type="button" data-bs-toggle="collapse" data-bs-target="#{{$quinta->name}}" aria-expanded="false">
                      {{$quinta->name}}-feira | <span class="badge bg-danger">Bloqueado</span>
                    </button>
                    @endif

                  </div>
                  <div class="collapse" id="{{$quinta->name}}">
                    <div class="card card-body">
                      @foreach ($hoursQui as $hour)
                      <div class="d-grid d-flex">
                        @if ($hour->status == 1 && $hour->total < $qtdAllowedUsers->quantity && $mySchedule &&
                          $mySchedule->hour_id ===
                          $hour->id)
                          <button class="btn btnHourQui btn-inverse-success mb-3 flex-grow-1 me-1"
                            idHour="{{$hour->id}}" hora="{{$hour->hour}}" idDay="{{$quinta->id}}"
                            idUser="{{session('id')}}" type="button" hourStatus="0" data-bs-toggle="modal"
                            data-bs-target="#addSchedule">
                            {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-success">{{$hour->total}}
                              alunos</span> <span class="badge bg-danger desmarcar" idHour="{{$hour->id}}"
                              idUser="{{session('id')}}">Desmarcar</span>
                          </button>
                          @elseif ($hour->status == 1 && $hour->total == $qtdAllowedUsers->quantity && $mySchedule &&
                          $mySchedule->hour_id ===
                          $hour->id)
                          <button class="btn btnHourQui btn-inverse-secondary mb-3 flex-grow-1 me-1"
                            idHour="{{$hour->id}}" hora="{{$hour->hour}}" idDay="{{$quinta->id}}"
                            idUser="{{session('id')}}" type="button" hourStatus="0" data-bs-toggle="modal"
                            data-bs-target="#addSchedule">
                            {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-primary">{{$hour->total}}
                              alunos - Turma fechada</span> <span class="badge bg-danger desmarcar"
                              idHour="{{$hour->id}}" idUser="{{session('id')}}">Desmarcar</span>
                          </button>
                          @elseif($hour->status == 1 && $hour->total == $qtdAllowedUsers->quantity) <button
                            class="btn btnHourQui btn-inverse-secondary mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                            hora="{{$hour->hour}}" idDay="{{$quinta->id}}" idUser="{{session('id')}}" type="button"
                            hourStatus="0" data-bs-toggle="modal" data-bs-target="#addSchedule">
                            {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-primary">{{$hour->total}}
                              alunos - Turma Fechada</span>
                          </button>
                          @elseif($hour->status == 1 && $hour->total < $qtdAllowedUsers->quantity) <button
                              class="btn btnHourQui btn-inverse-success mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                              hora="{{$hour->hour}}" idDay="{{$quinta->id}}" idUser="{{session('id')}}" type="button"
                              hourStatus="0" data-bs-toggle="modal" data-bs-target="#addSchedule">
                              {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span
                                class="badge bg-success">{{$hour->total}}
                                alunos</span>
                            </button>
                            @else
                            <button class=" btn btnHourQui btn-inverse-danger mb-3 flex-grow-1 me-1 disabled"
                              idHour="{{$hour->id}}" type=" button" hourStatus="1">
                              {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-danger">Bloqueado</span>
                            </button>
                            @endif

                      </div>
                      {{-- <div class="d-grid d-flex">
                        @if ($hour->status == 1 && $hour->total < $qtdAllowedUsers->quantity && $mySchedule &&
                          $mySchedule->hour_id ===
                          $hour->id)
                          <button class="btn btnHourQui btn-inverse-success mb-3 flex-grow-1 me-1"
                            idHour="{{$hour->id}}" hora="{{$hour->hour}}" idDay="{{$quinta->id}}"
                            idUser="{{session('id')}}" type="button" hourStatus="0" data-bs-toggle="modal"
                            data-bs-target="#addSchedule">
                            {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-success">{{$hour->total}}
                              alunos</span> <span class="badge bg-danger desmarcar" idHour="{{$hour->id}}"
                              idUser="{{session('id')}}">Desmarcar</span>
                          </button>
                          @elseif($hour->status == 1 && $hour->total < $qtdAllowedUsers->quantity) <button
                              class="btn btnHourQui btn-inverse-success mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                              hora="{{$hour->hour}}" idDay="{{$quinta->id}}" idUser="{{session('id')}}" type="button"
                              hourStatus="0" data-bs-toggle="modal" data-bs-target="#addSchedule">
                              {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span
                                class="badge bg-success">{{$hour->total}}
                                alunos</span>
                              @else
                              <button class=" btn btnHourQui btn-inverse-danger mb-3 flex-grow-1 me-1"
                                idHour="{{$hour->id}}" type=" button" hourStatus="1" disabled>
                                {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span
                                  class="badge bg-danger">Bloqueado</span>
                              </button>
                              @endif

                      </div> --}}
                      @endforeach
                    </div>
                  </div>

                  {{-- SEXTA-FEIRA --}}

                  <div class="d-grid d-flex">
                    @if ($sexta->status ==1)
                    <button class="btn btnSex btn-inverse-primary flex-grow-1 me-1 text-capitalize" type="button"
                      data-bs-toggle="collapse" data-bs-target="#{{$sexta->name}}" aria-expanded="false">
                      {{$sexta->name}}-feira | <span class="badge bg-success">Liberado</span>
                    </button>
                    @else
                    <button class="btn btnSex disabled btn-inverse-danger flex-grow-1 me-1 text-capitalize"
                      type="button" data-bs-toggle="collapse" data-bs-target="#{{$sexta->name}}" aria-expanded="false">
                      {{$sexta->name}}-feira | <span class="badge bg-danger">Bloqueado</span>
                    </button>
                    @endif

                  </div>
                  <div class="collapse" id="{{$sexta->name}}">
                    <div class="card card-body">
                      @foreach ($hoursSex as $hour)
                      <div class="d-grid d-flex">
                        @if ($hour->status == 1 && $hour->total < $qtdAllowedUsers->quantity && $mySchedule &&
                          $mySchedule->hour_id ===
                          $hour->id)
                          <button class="btn btnHourSex btn-inverse-success mb-3 flex-grow-1 me-1"
                            idHour="{{$hour->id}}" hora="{{$hour->hour}}" idDay="{{$sexta->id}}"
                            idUser="{{session('id')}}" type="button" hourStatus="0" data-bs-toggle="modal"
                            data-bs-target="#addSchedule">
                            {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-success">{{$hour->total}}
                              alunos</span> <span class="badge bg-danger desmarcar" idHour="{{$hour->id}}"
                              idUser="{{session('id')}}">Desmarcar</span>
                          </button>
                          @elseif ($hour->status == 1 && $hour->total == $qtdAllowedUsers->quantity && $mySchedule &&
                          $mySchedule->hour_id ===
                          $hour->id)
                          <button class="btn btnHourSex btn-inverse-secondary mb-3 flex-grow-1 me-1"
                            idHour="{{$hour->id}}" hora="{{$hour->hour}}" idDay="{{$sexta->id}}"
                            idUser="{{session('id')}}" type="button" hourStatus="0" data-bs-toggle="modal"
                            data-bs-target="#addSchedule">
                            {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-primary">{{$hour->total}}
                              alunos - Turma fechada</span> <span class="badge bg-danger desmarcar"
                              idHour="{{$hour->id}}" idUser="{{session('id')}}">Desmarcar</span>
                          </button>
                          @elseif($hour->status == 1 && $hour->total == $qtdAllowedUsers->quantity) <button
                            class="btn btnHourSex btn-inverse-secondary mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                            hora="{{$hour->hour}}" idDay="{{$sexta->id}}" idUser="{{session('id')}}" type="button"
                            hourStatus="0" data-bs-toggle="modal" data-bs-target="#addSchedule">
                            {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-primary">{{$hour->total}}
                              alunos - Turma Fechada</span>
                          </button>
                          @elseif($hour->status == 1 && $hour->total < $qtdAllowedUsers->quantity) <button
                              class="btn btnHourSex btn-inverse-success mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                              hora="{{$hour->hour}}" idDay="{{$sexta->id}}" idUser="{{session('id')}}" type="button"
                              hourStatus="0" data-bs-toggle="modal" data-bs-target="#addSchedule">
                              {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span
                                class="badge bg-success">{{$hour->total}}
                                alunos</span>
                            </button>
                            @else
                            <button class=" btn btnHourSex btn-inverse-danger mb-3 flex-grow-1 me-1 disabled"
                              idHour="{{$hour->id}}" type=" button" hourStatus="1">
                              {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-danger">Bloqueado</span>
                            </button>
                            @endif

                      </div>
                      {{-- <div class="d-grid d-flex">
                        @if ($hour->status == 1 && $hour->total < $qtdAllowedUsers->quantity && $mySchedule &&
                          $mySchedule->hour_id ===
                          $hour->id)
                          <button class="btn btnHourSex btn-inverse-success mb-3 flex-grow-1 me-1"
                            idHour="{{$hour->id}}" hora="{{$hour->hour}}" idDay="{{$sexta->id}}"
                            idUser="{{session('id')}}" type="button" hourStatus="0" data-bs-toggle="modal"
                            data-bs-target="#addSchedule">
                            {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-success">{{$hour->total}}
                              alunos</span> <span class="badge bg-danger desmarcar" idHour="{{$hour->id}}"
                              idUser="{{session('id')}}">Desmarcar</span>
                          </button>
                          @elseif($hour->status == 1 && $hour->total < $qtdAllowedUsers->quantity) <button
                              class="btn btnHourSex btn-inverse-success mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                              hora="{{$hour->hour}}" idDay="{{$sexta->id}}" idUser="{{session('id')}}" type="button"
                              hourStatus="0" data-bs-toggle="modal" data-bs-target="#addSchedule">
                              {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span
                                class="badge bg-success">{{$hour->total}}
                                alunos</span>
                              @else
                              <button class=" btn btnHourSex btn-inverse-danger mb-3 flex-grow-1 me-1"
                                idHour="{{$hour->id}}" type=" button" hourStatus="1" disabled>
                                {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span
                                  class="badge bg-danger">Bloqueado</span>
                              </button>
                              @endif

                      </div> --}}
                      @endforeach
                    </div>
                  </div>

                  {{-- SABADO --}}

                  <div class="d-grid d-flex">
                    @if ($sabado->status == 1)
                    <button class="btn btnSab btn-inverse-primary flex-grow-1 me-1 text-capitalize" type="button"
                      data-bs-toggle="collapse" data-bs-target="#{{$sabado->name}}" aria-expanded="false">
                      {{$sabado->name}} | <span class="badge bg-success">Liberado</span>
                    </button>
                    @else
                    <button class="btn btnSab disabled btn-inverse-danger flex-grow-1 me-1 text-capitalize"
                      type="button" data-bs-toggle="collapse" data-bs-target="#{{$sabado->name}}" aria-expanded="false">
                      {{$sabado->name}} | <span class="badge bg-danger">Bloqueado</span>
                    </button>
                    @endif


                  </div>

                  <div class="collapse" id="{{$sabado->name}}">
                    <div class="card card-body">
                      @foreach ($hoursSab as $hour)
                      <div class="d-grid d-flex">
                        @if ($hour->status == 1 && $hour->total < $qtdAllowedUsers->quantity && $mySchedule &&
                          $mySchedule->hour_id ===
                          $hour->id)
                          <button class="btn btnHourSab btn-inverse-success mb-3 flex-grow-1 me-1"
                            idHour="{{$hour->id}}" hora="{{$hour->hour}}" idDay="{{$sabado->id}}"
                            idUser="{{session('id')}}" type="button" hourStatus="0" data-bs-toggle="modal"
                            data-bs-target="#addSchedule">
                            {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-success">{{$hour->total}}
                              alunos</span> <span class="badge bg-danger desmarcar" idHour="{{$hour->id}}"
                              idUser="{{session('id')}}">Desmarcar</span>
                          </button>
                          @elseif ($hour->status == 1 && $hour->total == $qtdAllowedUsers->quantity && $mySchedule &&
                          $mySchedule->hour_id ===
                          $hour->id)
                          <button class="btn btnHourSab btn-inverse-secondary mb-3 flex-grow-1 me-1"
                            idHour="{{$hour->id}}" hora="{{$hour->hour}}" idDay="{{$sabado->id}}"
                            idUser="{{session('id')}}" type="button" hourStatus="0" data-bs-toggle="modal"
                            data-bs-target="#addSchedule">
                            {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-primary">{{$hour->total}}
                              alunos - Turma fechada</span> <span class="badge bg-danger desmarcar"
                              idHour="{{$hour->id}}" idUser="{{session('id')}}">Desmarcar</span>
                          </button>
                          @elseif($hour->status == 1 && $hour->total == $qtdAllowedUsers->quantity) <button
                            class="btn btnHourSab btn-inverse-secondary mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                            hora="{{$hour->hour}}" idDay="{{$sabado->id}}" idUser="{{session('id')}}" type="button"
                            hourStatus="0" data-bs-toggle="modal" data-bs-target="#addSchedule">
                            {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-primary">{{$hour->total}}
                              alunos - Turma Fechada</span>
                          </button>
                          @elseif($hour->status == 1 && $hour->total < $qtdAllowedUsers->quantity) <button
                              class="btn btnHourSab btn-inverse-success mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                              hora="{{$hour->hour}}" idDay="{{$sabado->id}}" idUser="{{session('id')}}" type="button"
                              hourStatus="0" data-bs-toggle="modal" data-bs-target="#addSchedule">
                              {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span
                                class="badge bg-success">{{$hour->total}}
                                alunos</span>
                            </button>
                            @else
                            <button class=" btn btnHourSab btn-inverse-danger mb-3 flex-grow-1 me-1 disabled"
                              idHour="{{$hour->id}}" type=" button" hourStatus="1">
                              {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-danger">Bloqueado</span>
                            </button>
                            @endif

                      </div>
                      {{-- <div class="d-grid d-flex">
                        @if ($hour->status == 1 && $hour->total < $qtdAllowedUsers->quantity && $mySchedule &&
                          $mySchedule->hour_id ===
                          $hour->id)
                          <button class="btn btnHourSab btn-inverse-success mb-3 flex-grow-1 me-1"
                            idHour="{{$hour->id}}" hora="{{$hour->hour}}" idDay="{{$sabado->id}}"
                            idUser="{{session('id')}}" type="button" hourStatus="0" data-bs-toggle="modal"
                            data-bs-target="#addSchedule">
                            {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-success">{{$hour->total}}
                              alunos</span> <span class="badge bg-danger desmarcar" idHour="{{$hour->id}}"
                              idUser="{{session('id')}}">Desmarcar</span>
                          </button>
                          @elseif($hour->status == 1 && $hour->total < $qtdAllowedUsers->quantity) <button
                              class="btn btnHourSab btn-inverse-success mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                              hora="{{$hour->hour}}" idDay="{{$sabado->id}}" idUser="{{session('id')}}" type="button"
                              hourStatus="0" data-bs-toggle="modal" data-bs-target="#addSchedule">
                              {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span
                                class="badge bg-success">{{$hour->total}}
                                alunos</span>
                              @else
                              <button class=" btn btnHourSab btn-inverse-danger mb-3 flex-grow-1 me-1"
                                idHour="{{$hour->id}}" type=" button" hourStatus="1" disabled>
                                {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span
                                  class="badge bg-danger">Bloqueado</span>
                              </button>
                              @endif

                      </div> --}}
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection

  <!-- MODAL ADD USER-->
  <div class="modal fade" id="addSchedule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form role="form" name="createUser" action="{{route('schedule.store')}}" method="POST">
          <div class="modal-header text-bg-light">
            <h5 class=" modal-title" id="exampleModalLabel">Realizar marcação</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group">

              <div class="alert fs-5 alert-dark fw-bold" id="horaSelecionada"></div>

              <div class="col-md-12 grid-margin">
                <div class="card rounded">
                  <div class="card-body">
                    <h6 class="card-title text-center">Alunos nessa aula</h6>
                    <div class="userBlock">
                    </div>
                  </div>
                </div>
              </div>
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

  @section('js')

  <script src="{{asset('assets/js/_schedule.js')}}"></script>

  @endsection