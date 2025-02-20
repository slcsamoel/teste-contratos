<?php

namespace App\Models;

class Contrato
{
    private $codigo;
    private $valor;
    private $data_inclusao;
    private $prazo;
    private $convenio_servico;


    public function getValor()
    {
        return $this->valor;
    }
    public function getDataInclusao()
    {
        return $this->data_inclusao;
    }
    public function getPrazo()
    {
        return $this->prazo;
    }
    public function getConvenioServico()
    {
        return $this->convenio_servico;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }
    public function setDataInclusao($data_inclusao)
    {
        $this->data_inclusao = $data_inclusao;
    }
    public function setPrazo($prazo)
    {
        $this->prazo = $prazo;
    }
    public function setConvenioServico($convenio_servico)
    {
        $this->convenio_servico = $convenio_servico;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    static public function find($codigo)
    {
        $connPdo = new \PDO('mysql:dbname=' . DBNAME . ';host=' . DBHOST . ':' . DBPORT . ';', DBUSER, DBPASS);
        $sql = 'SELECT * FROM Tb_contrato WHERE codigo = :codigo';
        $stmt = $connPdo->prepare($sql);
        $stmt
            ->bindValue(':codigo', $codigo);
        $stmt->execute();
        $contrato = $stmt->fetch(\PDO::FETCH_ASSOC);
        $contratoObj = new Contrato();
        $contratoObj->setCodigo($contrato['codigo']);
        $contratoObj->setValor($contrato['valor']);
        $contratoObj->setDataInclusao($contrato['data_inclusao']);
        $contratoObj->setPrazo($contrato['prazo']);
        $contratoObj->setConvenioServico($contrato['convenio_servico']);
        return $contratoObj;
    }
    static public function all()
    {
        $connPdo = new \PDO('mysql:dbname=' . DBNAME . ';host=' . DBHOST . ':' . DBPORT . ';', DBUSER, DBPASS);
        $sql = 'SELECT * FROM Tb_contrato';
        $stmt = $connPdo->prepare($sql);
        $stmt->execute();
        $contratos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $contratosObj = [];
        foreach ($contratos as $contrato) {
            $contratoObj = new Contrato();
            $contratoObj->setCodigo($contrato['codigo']);
            $contratoObj->setValor($contrato['valor']);
            $contratoObj->setDataInclusao($contrato['data_inclusao']);
            $contratoObj->setPrazo($contrato['prazo']);
            $contratoObj->setConvenioServico($contrato['convenio_servico']);
            $contratosObj[] = $contratoObj;
        }
        return $contratosObj;
    }

    public function save()
    {
        $connPdo = new \PDO('mysql:dbname=' . DBNAME . ';host=' . DBHOST . ':' . DBPORT . ';', DBUSER, DBPASS);
        $sql = 'INSERT Tb_contrato SET valor = :valor, data_inclusao = :data_inclusao, prazo = :prazo, convenio_servico = :convenio_servico';
        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':valor', $this->valor);
        $stmt->bindValue(':data_inclusao', $this->data_inclusao);
        $stmt->bindValue(':prazo', $this->prazo);
        $stmt->bindValue(':convenio_servico', $this->convenio_servico);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function delete()
    {
        $connPdo = new \PDO('mysql:dbname=' . DBNAME . ';host=' . DBHOST . ':' . DBPORT . ';', DBUSER, DBPASS);
        $sql = 'DELETE FROM Tb_contrato WHERE codigo = :codigo';
        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':codigo', $this->codigo);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function update()
    {
        $connPdo = new \PDO('mysql:dbname=' . DBNAME . ';host=' . DBHOST . ':' . DBPORT . ';', DBUSER, DBPASS);
        $sql = 'UPDATE Tb_contrato SET valor = :valor, data_inclusao = :data_inclusao, prazo = :prazo, convenio_servico = :convenio_servico WHERE codigo = :codigo';
        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':codigo', $this->codigo);
        $stmt->bindValue(':valor', $this->valor);
        $stmt->bindValue(':data_inclusao', $this->data_inclusao);
        $stmt->bindValue(':prazo', $this->prazo);
        $stmt->bindValue(':convenio_servico', $this->convenio_servico);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
