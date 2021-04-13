@extends('template')

@section('titulo', 'Comentários - Dúvida')

@section('conteudo')
<div class="user-data m-b-30">
        <h3 class="title-3 m-b-30">
            <i class="zmdi zmdi-account-calendar"></i>Comentários de {{$duvida->titulo}}
            <a href="{{route('duvidas.comentarios.novo', ['duvidaID' => $duvida->id])}}" class="btn btn-primary">
                <i class="fa fa-dot-circle-o"></i> Adicionar resposta
            </a>
        </h3>

        <div class="table-responsive table-data">
                
            

            @if(session('sucesso'))
                <div class="alert alert-success" role="alert" style="margin:0px 10px">
                    {{session('sucesso')}}
                </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Autor</td>
                        <td>Comentário</td>
                        <td>Data</td>
                        <td>Opções</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comentarios as $comentario)
                    <tr>
                        <!-- ID -->
                        <td><h6>{{$comentario->id}}</h6></td>
                        <!-- AUTOR -->
                        <td>
                            <div class="table-data__info">
                                <h6>{{$comentario->autor->nome}}</h6>
                            </div>
                        </td>
                        <!-- COMENTÁRIO -->
                        <td>
                            <p>{{$comentario->comentario}}</p>
                        </td>
                        <!-- DATA -->
                        <td>
                            <div class="table-data__info">
                                <h6>{{date('d/m/Y', strtotime($comentario->data))}}</h6>
                            </div>
                        </td>
                        <!-- OPÇÕES -->   
                        <td>
                            <span class="more remover-modal" data-toggle="modal" data-target="#smallmodal" data-id="{{$comentario->id}}"><i class="zmdi zmdi-delete"></i></span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Paginação -->
            <div style="padding:10px">{{$comentarios->links()}}</div>
            
        </div>
      
    </div>


@push('javascript')
  <!-- modal small -->
  <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="smallmodalLabel">Remover comentário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                       Deseja Realmente excluir esse comentário?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary btn-deletar">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal small -->

    <script>
        let conteudoID;
        $('.remover-modal').click(function() {
            conteudoID = $(this).data('id');
        })

        $('.btn-deletar').click(() => window.location.href="{{route('duvidas.comentarios.excluir')}}/"+conteudoID);
    </script>
@endpush
@endsection