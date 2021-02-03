<?php 


class Concessionaria
{

    public function criaListaMarcas(String $filename)
    {
        $todasMarcas = json_decode(file_get_contents($filename));

        $dados = "Lista das Marcas disponiveis".PHP_EOL;

        foreach($todasMarcas as $marca) {
            
            $dados .= $marca->nome . PHP_EOL;
            
        }

        file_put_contents('dadosConcessionaria.txt', $dados);

    }

    public function recebeJsonMarcas(String $url, String $name = "todasMarcas.json") 
    {
        
        $todasMarcas = file_get_contents($url, false, Concessionaria::autorizaProxy());
        file_put_contents($name, $todasMarcas);

    }

    public function buscarFabricante(String $nomeFabricante)
    {
        $marcas = json_decode(file_get_contents("todasMarcas.json"));

        foreach($marcas as $marca){

            if($marca === $nomeFabricante){

                $veiculos = json_decode(file_get_contents("https://parallelum.com.br/fipe/api/v1/carros/marcas/{$marca->codigo}/modelos", false, Concessionaria::autorizaProxy()));
               
                //array_unique remove valores duplicados de um array
                //
                
            }

        }
    }

    private static function autorizaProxy()
    {
        $auth = base64_encode('9012:9012');

        $aContext = [
            'http'=> [
                'proxy' => 'proxy.servicos.pm.ba.gov.br:8081',
                'request_fulluri' => true,
                'header' => "Proxy-Authorization: Basic $auth"    
                ]
            ];
        $cxContext = stream_context_create($aContext);

        return $cxContext;
    }


}

$concessionaria = new Concessionaria;
$concessionaria->criaListaMarcas("todasMarcas.json");

$fabricante = readline("Digite o Fabricante:  ");


?>