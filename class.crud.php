<?php

class crud
{
	private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
	
    public function cadastrarUsuario($nome,$email,$dataNascimento,$cpf,$celular,$cep,$endereco,$numero,
                        $bairro,$cidade,$estado,$qtdPessoas,$empregado,$sobre,$criadoEm)
	{
		try
		{
			$query = $this->db->prepare("INSERT INTO Cadastro(Nome,Email,DataNascimento,CPF,Celular,CEP,Endereco,Numero,Bairro,Cidade,Estado,QtdPessoas,Empregado,Sobre,CriadoEm) 
            VALUES(:Nome, :Email, :DataNascimento, :CPF,:Celular,:CEP,:Endereco,:Numero,:Bairro,:Cidade,:Estado,:QtdPessoas,:Empregado,:Sobre,:CriadoEm)");
			$query->bindparam(":Nome",$nome);
			$query->bindparam(":Email",$email);
			$query->bindparam(":DataNascimento",$dataNascimento);
            $query->bindparam(":CPF",$cpf);
            $query->bindparam(":Celular",$celular);
            $query->bindparam(":CEP",$cep);
            $query->bindparam(":Endereco",$endereco);
            $query->bindparam(":Numero",$numero);
            $query->bindparam(":Bairro",$bairro);
            $query->bindparam(":Cidade",$cidade);
            $query->bindparam(":Estado",$estado);
            $query->bindparam(":QtdPessoas",$qtdPessoas);
            $query->bindparam(":Empregado",$empregado);
            $query->bindparam(":Sobre",$sobre);
            $query->bindparam(":CriadoEm",$criadoEm);
			$query->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
    }

    public function selectUsers($sqlCommando)
	{
		$stmt = $this->db->prepare($sqlCommando);
		$stmt->execute();
		$editRow=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $editRow;
	}

}
    
?>