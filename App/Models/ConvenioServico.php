<?php

namespace App\Models;

class ConvenioServico
{
    private $codigo;
    private $convenio;
    private $servico;


    public function getCodigo()
    {
        return $this->codigo;
    }
    public function getConvenio()
    {
        return $this->convenio;
    }
    public function getServico()
    {
        return $this->servico;
    }
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }
    public function setConvenio($convenio)
    {
        $this->convenio = $convenio;
    }
    public function setServico($servico)
    {
        $this->servico = $servico;
    }

    static public function find($codigo)
    {
        $convenioServico = new ConvenioServico();
        $convenioServico->setCodigo($codigo);
        $connPdo = new \PDO('mysql:dbname=' . DBNAME . ';host=' . DBHOST . ':' . DBPORT . ';', DBUSER, DBPASS);
        $sql = 'SELECT * FROM Tb_convenio_servico WHERE codigo = :codigo';
        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':codigo', $convenioServico->getCodigo());
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $convenioContratoArray = $stmt->fetch(\PDO::FETCH_ASSOC);
            $convenioServico = new ConvenioServico();
            $convenioServico->setCodigo($convenioContratoArray['codigo']);
            $convenioServico->setConvenio($convenioContratoArray['convenio']);
            $convenioServico->setServico($convenioContratoArray['servico']);

            return $convenioServico;
        } else {
            return null;
            throw new \Exception("Nenhum Contrato encontrado");
        }
    }

    static public function all()
    {
        $connPdo = new \PDO('mysql:dbname=' . DBNAME . ';host=' . DBHOST . ':' . DBPORT . ';', DBUSER, DBPASS);
        $sql = 'SELECT * FROM Tb_convenio_servico';
        $stmt = $connPdo->prepare($sql);
        $stmt->execute();
        $convenioContratoArrayObj = [];
        if ($stmt->rowCount() > 0) {
            $convenioContratoArray = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($convenioContratoArray as $convenioContrato) {
                $convenioContratoObj = new ConvenioServico();
                $convenioContratoObj->setCodigo($convenioContrato['codigo']);
                $convenioContratoObj->setConvenio($convenioContrato['convenio']);
                $convenioContratoObj->setServico($convenioContrato['servico']);
                $convenioContratoArrayObj[] = $convenioContratoObj;
            }
            return $convenioContratoArrayObj;
        } else {
            return null;
            throw new \Exception("Nenhum Contrato encontrado");
        }
    }
}
