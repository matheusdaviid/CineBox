<?php

class Filmes
{
    private $conexaoBanco;

    public function __construct()
    {
        $dsn = 'mysql:dbname=db_cinebox;host=127.0.0.1';
        $user = 'root';
        $password = '';

        try {
            $this->conexaoBanco = new PDO($dsn, $user, $password);
            $this->conexaoBanco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conexaoBanco->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro na conexão com o banco de dados: " . $e->getMessage());
            throw new Exception("Falha ao conectar com o banco de dados");
        }
    }

    public function exibirListaFilmes($limite = '')
    {
        try {
            $script = 'SELECT * FROM tb_filmes';
            
            if (!empty($limite)) {
                $script .= " ORDER BY RAND() LIMIT :limite";
                $stmt = $this->conexaoBanco->prepare($script);
                $stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
            } else {
                $stmt = $this->conexaoBanco->prepare($script);
            }
            
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Erro ao listar filmes: " . $e->getMessage());
            return [];
        }
    }

    public function filtrarPorGeneros($idsGeneros)
    {
        try {
            if (empty($idsGeneros)) {
                return $this->exibirListaFilmes();
            }

            $placeholders = implode(',', array_fill(0, count($idsGeneros), '?'));
            
            $sql = "SELECT DISTINCT f.* FROM tb_filmes f
                    INNER JOIN tb_filme_genero fg ON f.id = fg.filme_id
                    WHERE fg.genero_id IN ($placeholders)
                    ORDER BY f.nome";
            
            $stmt = $this->conexaoBanco->prepare($sql);
            
            foreach ($idsGeneros as $index => $id) {
                $stmt->bindValue(($index + 1), $id, PDO::PARAM_INT);
            }
            
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Erro ao filtrar filmes por gênero: " . $e->getMessage());
            return [];
        }
    }

    public function buscarFilmePorId($id)
    {
        try {
            $sql = "SELECT * FROM tb_filmes WHERE id = :id LIMIT 1";
            $stmt = $this->conexaoBanco->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log("Erro ao buscar filme por ID: " . $e->getMessage());
            return false;
        }
    }
}