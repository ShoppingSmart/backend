<?php

namespace Framework\Config;

class ConfigHelper
{
    /**
     * Get an Instance.
     * 
     * @param void
     */
    public static function create(): self
    {
        return new Self();
    }

    public function read()
    {
        // Obtém a lista de arquivos dentro do diretório 'config'
        $arquivos = glob(config_path('*.php'));

        // Cria um array para armazenar os dados de configuração
        $configuracoes = [];

        // Itera sobre cada arquivo e adiciona seus dados ao array de configuração
        foreach ($arquivos as $arquivo) {
            $nomeArquivo = basename($arquivo, '.php');
            $dados = require $arquivo;
            $configuracoes[$nomeArquivo] = $dados;
        }

        // Retorna o array de configuração completo
        return $configuracoes;
    }
}
