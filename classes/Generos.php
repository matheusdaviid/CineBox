<?php

class Generos
{
    private $conexaoBanco;

    public function __construct()
    {
        $dsn = 'mysql:dbname=db_cinebox;host=127.0.0.1';
        $user = 'root';
        $password = '';

        try {
            $this->conexaoBanco = new PDO($dsn, $user, $password);
            // Configurar PDO para lançar exceções em erros
            $this->conexaoBanco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Garantir que os nomes das colunas sejam retornados corretamente
            $this->conexaoBanco->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro na conexão com o banco de dados: " . $e->getMessage());
            throw new Exception("Falha ao conectar com o banco de dados");
        }
    }

    public function consultarGeneros()
    {
        try {
            $script = 'SELECT * FROM tb_generos';
            $stmt = $this->conexaoBanco->query($script);
            return $stmt->fetchAll() ?: []; // Retorna array vazio se não houver resultados
        } catch (PDOException $e) {
            error_log("Erro ao consultar gêneros: " . $e->getMessage());
            return []; // Retorna array vazio em caso de erro
        }
    }

    public function consultarGeneroByIdFilme($id_filme)
    {
        try {
            $script = "SELECT g.* FROM tb_generos g
                      INNER JOIN tb_filme_genero fg ON fg.genero_id = g.id
                      WHERE fg.filme_id = :id_filme";
            
            $stmt = $this->conexaoBanco->prepare($script);
            $stmt->bindParam(':id_filme', $id_filme, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll() ?: []; // Retorna array vazio se não houver resultados
        } catch (PDOException $e) {
            error_log("Erro ao consultar gêneros do filme ID {$id_filme}: " . $e->getMessage());
            return []; // Retorna array vazio em caso de erro
        }
    }
}