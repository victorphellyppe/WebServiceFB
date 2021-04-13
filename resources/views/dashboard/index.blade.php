@extends('template')

@section('titulo', 'Dashboard')

@section('conteudo')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Visão Geral</h2>
        </div>
    </div>
</div>
<div class="row m-t-25">
    <!-- USUARIOS -->
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c1">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-account-o"></i>
                    </div>
                    <div class="text">
                        <h2>{{$usuariosCadastrados}}</h2>
                        <span>Total de usuários</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DUVIDAS -->
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c2">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-help"></i>
                    </div>
                    <div class="text">
                        <h2>{{$duvidasCadastrados}}</h2>
                        <span>Total de dúvidas</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ocorrências -->
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c4">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-assignment"></i>
                    </div>
                    <div class="text">
                        <h2>{{$ocorrenciasCadastradas}}</h2>
                        <span>Total de ocorrências</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection