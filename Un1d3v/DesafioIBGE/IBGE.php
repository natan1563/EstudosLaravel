<?php 


class IBGE 
{
  private $municipios = null; 
  private $UF;
  private $saveData;

	public function obterMunicipios(String $UF)
	{
    $this->UF = $UF;
		$this->municipios = json_decode(file_get_contents("https://servicodados.ibge.gov.br/api/v1/localidades/estados/{$UF}/municipios"));
	
  }

	public function gravarArquivo() 
	{
    
    if($this->municipios != null) {
      

      foreach ($this->municipios as $municipio) {
        
        $prepareData = 'Municipio: ' . $municipio->nome . PHP_EOL;
        $prepareData .= 'Região: ' . $municipio->microrregiao->mesorregiao->UF->regiao->nome . PHP_EOL;
        $prepareData .= "=======" . PHP_EOL;

        $this->saveData .= $prepareData;
        
		}

    file_put_contents("Data_{$this->UF}.txt", $this->saveData);

    } else {
      echo 'Por favor chame o metodo obterMunicipios e passe a sigla do seu estado para o mesmo<br>';
    }
	}
}

$ibge = new IBGE;

$ibge->obterMunicipios("BA");
$ibge->gravarArquivo();


?>
