<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Questionario extends Model {
    
    use SoftDeletes;
    
    //Sempre carrega autor
    protected $with = ['autor'];

    //Não protege nenhum campo
    protected $guarded = [];

    //Não exibe esses campos
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /** Retorna a vítima */
    public function autor() {
        return $this->belongsTo('App\Models\Usuario');
    }

    /** Retorna o campo com o ID e Descrição */
    public function getRacaAttribute() {
        $dados['id'] = $this->attributes['raca'];
        switch($dados['id']) {
            case 1: $dados['descricao'] = 'Branca'; break;
            case 2: $dados['descricao'] = 'Preta'; break;
            case 3: $dados['descricao'] = 'Amarela'; break;
            case 4: $dados['descricao'] = 'Parda'; break;
            case 5: $dados['descricao'] = 'Indígena'; break;
            case 9: $dados['descricao'] = 'Ignorado'; break;
        }
        return $dados;
    }

    /** Retorna o campo com o tipo de Denunciante */
    public function getDenuncianteAttribute() {
        //1 - Conselheiro tutelar | 2 - Profissional da saude | 3 - População | 9 - Ignorado
        switch($this->attributes['denuncia']) {
            case 1: return 'Conselheiro tutelar';
            case 2: return 'Profissional da saúde';
            case 3: return 'Profissional da segurança pública'; 
            case 4: return 'Profissional da educação';
            case 5: return 'População';
            case 9: return 'Ignorado';
        }
        return $dados;
    }

    /** Retorna o campo com o ID e Descrição */
    public function getGestanteAttribute() {
        $dados['id'] = $this->attributes['gestante'];
        switch($dados['id']) {
            case 1: $dados['descricao'] = '1º Trimestre'; break;
            case 2: $dados['descricao'] = '2º Trimestre'; break;
            case 3: $dados['descricao'] = '3º Trimestre'; break;
            case 4: $dados['descricao'] = 'Idade gestacional ignorada'; break;
            case 5: $dados['descricao'] = 'Não'; break;
            case 6: $dados['descricao'] = 'Não se aplica'; break;
            case 9: $dados['descricao'] = 'Ignorado'; break;
        }
        return $dados;
    }
    
    /** Retorna o campo com o ID e Descrição */
    public function getEscolaridadeAttribute() {
        $dados['id'] = $this->attributes['escolaridade'];
        switch($dados['id']) {
            case 0: $dados['descricao'] = 'Analfabeto'; break;
            case 1: $dados['descricao'] = '1ª a 4ª série incompleta do EF'; break;
            case 2: $dados['descricao'] = '4ª série completa do EF'; break;
            case 3: $dados['descricao'] = '5ª a 8ª série incompleta do EF'; break;
            case 4: $dados['descricao'] = 'Ensino Fundamental completo'; break;
            case 5: $dados['descricao'] = 'Ensino médio incompleto'; break;
            case 6: $dados['descricao'] = 'Ensino médio completo'; break;
            case 7: $dados['descricao'] = 'Educação superior incompleta'; break;
            case 8: $dados['descricao'] = 'Educação superior completa'; break;
            case 9: $dados['descricao'] = 'Ignorado'; break;
            case 10: $dados['descricao'] = 'Não se aplica'; break;
        }

        return $dados;
    }
    
    /** Retorna o campo com o ID e Descrição */
    public function getZonaAttribute() {
        $dados['id'] = $this->attributes['zona'];
        switch($dados['id']) {
            case 1: $dados['descricao'] = 'Urbana'; break;
            case 2: $dados['descricao'] = 'Rural'; break;
            case 3: $dados['descricao'] = 'Periurbana'; break;
            case 9: $dados['descricao'] = 'Ignorado'; break;
        }
        return $dados;
    }
    
    /** Retorna o campo com o ID e Descrição */
    public function getEstadoCivilAttribute() {
        $dados['id'] = $this->attributes['estado_civil'];
        switch($dados['id']) {
            case 1: $dados['descricao'] = 'Solteiro'; break;
            case 2: $dados['descricao'] = 'Casado/União consensual'; break;
            case 3: $dados['descricao'] = 'Viúvo'; break;
            case 4: $dados['descricao'] = 'Separado'; break;
            case 8: $dados['descricao'] = 'Não se aplica'; break;
            case 9: $dados['descricao'] = 'Ignorado'; break;
        }
        return $dados;
    }
    
    /** Retorna o campo com o ID e Descrição */
    public function getOrientacaoSexualAttribute() {
        $dados['id'] = $this->attributes['orientacao_sexual'];
        switch($dados['id']) {
            case 1: $dados['descricao'] = 'Heterossexual'; break;
            case 2: $dados['descricao'] = 'Homossexual (gay/lésbica)'; break;
            case 3: $dados['descricao'] = 'Bissexual'; break;
            case 8: $dados['descricao'] = 'Não se aplica'; break;
            case 9: $dados['descricao'] = 'Ignorado'; break;
        }
        
        return $dados;
    }
    
    /** Retorna o campo com o ID e Descrição */
    public function getIdentidadeGeneroAttribute() {
        $dados['id'] = $this->attributes['identidade_genero'];
        switch($dados['id']) {
            case 1: $dados['descricao'] = 'Travesti'; break;
            case 2: $dados['descricao'] = 'Mulher Transexual'; break;
            case 3: $dados['descricao'] = 'Homem Transexual'; break;
            case 8: $dados['descricao'] = 'Não se aplica'; break;
            case 9: $dados['descricao'] = 'Ignorado'; break;
        }
        return $dados;
    }
    
    /** Retorna o campo com o ID e Descrição */
    public function getOcorreuOutrasVezesAttribute() {
        $dados['id'] = $this->attributes['ocorreu_outras_vezes'];
        switch($dados['id']) {
            case 1: $dados['descricao'] = 'Sim'; break;
            case 2: $dados['descricao'] = 'Não'; break;
            case 9: $dados['descricao'] = 'Ignorado'; break; 
        }
        return $dados;
    }
    
    /** Retorna o campo com o ID e Descrição */
    public function getLesaoAutoprovocadaAttribute() {
        $dados['id'] = $this->attributes['lesao_autoprovocada'];
        switch($dados['id']) {
            case 1: $dados['descricao'] = 'Sim'; break;
            case 2: $dados['descricao'] = 'Não'; break;
            case 9: $dados['descricao'] = 'Ignorado'; break; 
        }
        return $dados;
    }

    /** Retorna o campo com o ID e Descrição */
    public function getMotivoViolenciaAttribute() {
        $dados['id'] = $this->attributes['motivo_violencia'];
        switch($dados['id']) {
            case 1: $dados['descricao'] = 'Sexismo'; break;
            case 2: $dados['descricao'] = 'Homofobia/Lesbofobia/Bifobia/Transfobia'; break;
            case 3: $dados['descricao'] = 'Racismo'; break; 
            case 4: $dados['descricao'] = 'Intolerância Religiosa'; break; 
            case 5: $dados['descricao'] = 'Xenofobia'; break; 
            case 6: $dados['descricao'] = 'Conflito geracional'; break; 
            case 7: $dados['descricao'] = 'Situação de rua'; break; 
            case 8: $dados['descricao'] = 'Deficiência'; break; 
            case 9: $dados['descricao'] = 'Outro'; break; 
            case 88: $dados['descricao'] = 'Não se aplica'; break; 
            case 99: $dados['descricao'] = 'Ignorado'; break; 
        }
        return $dados;
    }

    /** Retorna o campo com o ID e Descrição */
    public function getViolenciaTrabalhoAttribute() {
        $dados['id'] = $this->attributes['violencia_trabalho'];
        switch($dados['id']) {
            case 1: $dados['descricao'] = 'Sim'; break;
            case 2: $dados['descricao'] = 'Não'; break;
            case 9: $dados['descricao'] = 'Ignorado'; break; 
        }
        return $dados;
    }

    /** Retorna o campo com o ID e Descrição */
    public function getNumeroEnvolvidosAttribute() {
        $dados['id'] = $this->attributes['numero_envolvidos'];
        switch($dados['id']) {
            case 1: $dados['descricao'] = 'Sim'; break;
            case 2: $dados['descricao'] = 'Não'; break;
            case 9: $dados['descricao'] = 'Ignorado'; break; 
        }
        return $dados;
    }

    /** Retorna o campo com o ID e Descrição */
    public function getSexoAgressorAttribute() {
        $dados['id'] = $this->attributes['sexo_agressor'];
        switch($dados['id']) {
            case 1: $dados['descricao'] = 'Masculino'; break;
            case 2: $dados['descricao'] = 'Feminino'; break;
            case 3: $dados['descricao'] = 'Ambos os sexos'; break;
            case 9: $dados['descricao'] = 'Ignorado'; break; 
        }
        return $dados;
    }

    /** Retorna o campo com o ID e Descrição */
    public function getUsoAlcoolAttribute() {
        $dados['id'] = $this->attributes['uso_alcool'];
        switch($dados['id']) {
            case 1: $dados['descricao'] = 'Sim'; break;
            case 2: $dados['descricao'] = 'Não'; break;
            case 9: $dados['descricao'] = 'Ignorado'; break; 
        }
        return $dados;
    }

    /** Retorna o campo com o ID e Descrição */
    public function getIdadeAgressorAttribute() {
        $dados['id'] = $this->attributes['idade_agressor'];
        switch($dados['id']) {
            case 1: $dados['descricao'] = 'Criança (0 a 9 anos)'; break;
            case 2: $dados['descricao'] = 'Adolescente (10 a 19 anos)'; break;
            case 3: $dados['descricao'] = 'Jovem (20 a 24 anos)'; break;
            case 4: $dados['descricao'] = 'Pessoa Adulta (25 a 59 anos)'; break;
            case 6: $dados['descricao'] = 'Pessoa Idosa (60 anos ou mais)'; break;
            case 9: $dados['descricao'] = 'Ignorado'; break; 
        }
        return $dados;
    }
    
    //Motivo não Denunciar
    public function motivo_nao_denunciar() {
        return $this->belongsToMany('App\Models\Questionario\MotivoNaoDenunciar', 'questionario_motivo_nao_denunciar', 'questionario_id', 'motivo_nao_denunciar_id');
    }
    //transtorno
    public function transtornos() {
        return $this->belongsToMany('App\Models\Questionario\Transtorno', 'questionario_transtornos', 'questionario_id', 'transtorno_id');
    }

    //local
    public function local() {
        return $this->belongsToMany('App\Models\Questionario\Local', 'questionario_locais', 'questionario_id', 'local_id');
    }

    //tipo_violencia
    public function tipo_violencia() {
        return $this->belongsToMany('App\Models\Questionario\TipoViolencia', 'questionario_tipos_violencia', 'questionario_id', 'tipo_violencia_id');
    }
    
    //meio_violencia
    public function meio_violencia() {
        return $this->belongsToMany('App\Models\Questionario\MeioViolencia', 'questionario_meios_violencia', 'questionario_id', 'meio_violencia_id');
    }
    
    //violencia_sexual
    public function violencia_sexual() {
        return $this->belongsToMany('App\Models\Questionario\ViolenciaSexual', 'questionario_violencias_sexuais', 'questionario_id', 'violencia_sexual_id');
    }
    
    //vinculo_agressor
    public function vinculo_agressor() {
        return $this->belongsToMany('App\Models\Questionario\VinculoAgressor', 'questionario_vinculo_agressores', 'questionario_id', 'vinculo_agressor_id');
    }


}
