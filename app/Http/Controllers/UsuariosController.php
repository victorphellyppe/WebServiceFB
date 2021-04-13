<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Rules\Cpf;

/**
 * Controller responsável pela manipulação dos dados do usuários 
 */
class UsuariosController extends Controller {
    
    private $dados = ['menu' => 'usuarios'];

    /** Lista o usuários */
    public function index() {
        $this->dados['usuarios'] = Usuario::orderBy('nome')->paginate(10);
        return view('usuarios.listar', $this->dados);
    }

    /** 
     * Abre a tela cadastrar novo usuário
     */
    public function novo() {
        $this->dados['usuario'] = new Usuario;
        return view('usuarios.novo', $this->dados);
    }

    /** 
     * Tenta salvar um novo usuário
     */
    public function cadastrar(Request $request) {
        $request->validate([
            'nome'  => 'required',
            'senha'  => 'required|min:6',
            'email' => 'required|email|unique:usuarios,email',
        ]);
        $dados = $request->all();
        $dados['senha'] = md5($dados['senha']);
        Usuario::create($dados);

        return redirect()->route('usuarios.listar')->with(['sucesso' => 'Usuário cadastrado com sucesso']);
    }

    /** 
     * Abre a tela de editar usuário
     * @param $id id do usuário
     */
    public function edicao(int $id) {
        $this->dados['usuario'] = Usuario::findOrFail($id);
        return view('usuarios.edicao', $this->dados);
    }
    
    /** Tenta editar um usuário e salvar no banco
     * @param $id id do usuário
     */
    public function editar(Request $request, int $id) {
        $request->validate([
            'nome'  => 'required',
            'email' => 'required|email|unique:usuarios,email,'.$id,
        ]);

        $dados = $request->except(['_token']);
        if (!empty($dados['senha']))
            $dados['senha'] = md5($dados['senha']);
        else unset($dados['senha']);
        Usuario::where('id', $id)->update($dados);

        return redirect()->route('usuarios.listar')->with(['sucesso' => 'Usuário editado com sucesso']);
    }
    
    /** Remove um usuário
     * @param $id id do usuário
     */
    public function excluir(int $id) {
        Usuario::destroy($id);
        return redirect()->route('usuarios.listar')->with('sucesso', 'Usuário excluido');
    }
}
