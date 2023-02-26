<?php

namespace Framework\Config;

class Env
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

    public function read($arquivo)
    {
        // Verifica se o arquivo existe
        if (file_exists($arquivo)) {
            // Lê o arquivo INI e retorna um array associativo
            return parse_ini_file($arquivo);
        } else {
            // Retorna um array vazio em caso de falha na leitura do arquivo
            return [];
        }
    }
}
