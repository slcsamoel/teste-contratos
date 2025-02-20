<?php

namespace App\Models;

class RelacaoContratos
{


    public static function allContracts()
    {


        $connPdo = new \PDO('mysql:dbname=' . DBNAME . ';host=' . DBHOST . ':' . DBPORT . ';', DBUSER, DBPASS);

        $sql = 'SELECT CONTRATOS.codigo AS codigo_contrato , CONTRATOS.valor , CONTRATOS.data_inclusao, CONTRATOS.prazo , CONVENIO.verba , BANCO.nome  FROM Tb_contrato AS CONTRATOS 
            INNER JOIN Tb_convenio_servico AS CONTRATOSERVICOS ON CONTRATOS.convenio_servico = CONTRATOSERVICOS.codigo 
            INNER JOIN Tb_convenio AS CONVENIO ON CONTRATOSERVICOS.convenio = CONVENIO.codigo
            INNER JOIN Tb_banco AS BANCO ON CONVENIO.banco = BANCO.codigo';

        $stmt = $connPdo->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {

            throw new \Exception("Nenhum Contrato encontrado");
        }
    }

    public static function create($dados)
    {
        $connPdo = new \PDO('mysql:dbname=' . DBNAME . ';host=' . DBHOST . ':' . DBPORT . ';', DBUSER, DBPASS);
        $sql = 'INSERT INTO Tb_contrato (codigo, valor, data_inclusao, prazo, convenio_servico) VALUES (:codigo, :valor, :data_inclusao, :prazo, :convenio_servico)';
        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':codigo', $dados['codigo']);
        $stmt->bindValue(':valor', $dados['valor']);
        $stmt->bindValue(':data_inclusao', $dados['data_inclusao']);
        $stmt->bindValue(':prazo', $dados['prazo']);
        $stmt->bindValue(':convenio_servico', $dados['convenio_servico']);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
