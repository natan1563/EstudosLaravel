<?php 
ini_set('date.timezone', 'America/Sao_paulo');

class Sorteio 
{
    private $log = array();
    private $nomeGanhador;
    private $emailGanhador;
    private $premioRecebido;
    private $valorMaximo = 30000.00;
    private $valorTotal = 0;
    private $ganhadores = [];

  
    public function cadastroPessoas(String $nome, String $email)
    {
        $dados = array();
        
        if(file_exists('pessoas.json')){
            
            $dados = json_decode(file_get_contents('pessoas.json'), true);
            $newDado = ["nome" => $nome, "email" => $email];
            array_push($dados, $newDado);
            
        } else{

            $dados = [["nome" => $nome, "email" => $email]];

        }

        file_put_contents('pessoas.json', json_encode($dados)); 

    }

    public function rodaSorteio()
    {
        $filename = 'ganhadores.'.date('d_m_Y', strtotime(date('Y-m-d'))).'.json';
        
        if(!file_exists($filename)){
           
            $count = 1;
            $dadosUsuarios = json_decode(file_get_contents('pessoas.json'));
            $rand = null;
            
            while($count <= 5){
    
                $rand = array_rand($dadosUsuarios);
                $valorRecebido = rand(1.00, $this->valorMaximo);
                $this->nomeGanhador = $dadosUsuarios[$rand]->nome;
                $this->emailGanhador = $dadosUsuarios[$rand]->email;
                $this->premioRecebido = number_format($valorRecebido, 2, ',', '.');
                $this->valorTotal += $valorRecebido;
                
                if($this->valorTotal > 70000.00 and $count < 5){
                    $this->valorMaximo = 100000.00 - $this->valorTotal;
                }
    
                array_push($this->ganhadores, [
                    "nome" => $this->nomeGanhador,
                    "email" => $this->emailGanhador,
                    "premio" => $this->premioRecebido  
                ]);
                
                $this->historico($this->nomeGanhador, $this->emailGanhador);

                $count++;

            }

            file_put_contents($filename, json_encode($this->ganhadores));
            file_put_contents('pessoas.json', '[]');
            $this->salvaHistorico();

        } else {
            echo 'Atenção!!! Sorteio de hoje já foi realizado, por favor retorne amanhã';
        }
       
    }

    public function historico($ganhador, $valor){
        array_push($this->log,  ["ganhador" => $ganhador, "valor" => $valor, "data" => date('d-m-Y'), "hora" => time()]);
    }

    public function salvaHistorico(){
        if(method_exists($this, 'historico')){
            file_put_contents('historico.json', json_encode($this->log), FILE_APPEND);
        }else{
            echo 'Chame o metodo Histórico primeiro';
        }
    }
}

$sorteio = new Sorteio;

/*
$sorteio->cadastroPessoas('Ivan hater de python', 'ivan@gmail.com');
$sorteio->cadastroPessoas('Ivan é um torcedor do Vitória', 'ViVan@gmail.com');
$sorteio->cadastroPessoas('Ivan quer vender arte na praia', 'PraIan@gmail.com');
$sorteio->cadastroPessoas('Ivan frequenta o campus da UFBA', 'UFIBAN@gmail.com');
$sorteio->cadastroPessoas('Ivan pede pausa em jogo online', '@gmail.com');
*/

$sorteio->rodaSorteio();
?>