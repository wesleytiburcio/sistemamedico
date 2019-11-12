<?php

class Funcoes {

  function map($param) {

    if( is_object( $param ) ) {
        $param = get_object_vars( $param );
    }

    if( is_array( $param ) ) {
        return array_map( __FUNCTION__, $param );
    }
    else {
      return $param;
    }
  }

  // FUNCAO QUE CRIPTOGRAFA.
  function criptografar($dados, $tipo = "STRING") {
      $dados = base64_encode($dados);
      /* $procura=array('A','Z','W','a','S','e','I','x','U','d','m','N','B','G','P','9','t','D','Q','F','M','H','E','X','C','V','z','Y','R','T','b','s','h','J','2');
        $substitui=array('/','-','.','@','$','&','|','#','_','(',')','%','?',',','[',']','{','}',';',':','>','<','!','"',"'",'�','�','�','�','�','�','~','^','`','�');
        $dados=str_replace($procura,$substitui,$dados);
        $dados=str_replace('=','',addslashes($dados)); */
      return $dados;
  }

  // FUNCAO QUE CRIPTOGRAFA.
  function descriptografar($dados, $tipo = "STRING") {
      /* $dados=stripslashes($dados);
        $substitui=array('A','Z','W','a','S','e','I','x','U','d','m','N','B','G','P','9','t','D','Q','F','M','H','E','X','C','V','z','Y','R','T','b','s','h','J','2');
        $procura=array('/','-','.','@','$','&','|','#','_','(',')','%','?',',','[',']','{','}',';',':','>','<','!','"',"'",'�','�','�','�','�','�','~','^','`','�');
        $dados=str_replace($procura,$substitui,$dados); */
      $dados = base64_decode($dados);
  //$dados=str_replace('  ','',$dados);
      return $dados;
  }


  function MoedaParaBanco($Valor) {

      return str_replace('.', '', str_replace(',', '', $Valor)) / 100.0;
  }

  function MoedaForm($Valor) {
      return number_format($Valor, 2, ',', '.');
  }

  function formatarTelefoneForm($telefone) {
      $arrayTelefone = str_split($telefone);
      //
      if (count($arrayTelefone) == 10) {
          $telefone = "(" . $arrayTelefone[0] . $arrayTelefone[1] . ") " . $arrayTelefone[2] . $arrayTelefone[3] . $arrayTelefone[4] . $arrayTelefone[5] . "-" . $arrayTelefone[6] . $arrayTelefone[7] . $arrayTelefone[8] . $arrayTelefone[9];
      } elseif (count($arrayTelefone) == 11) {
          $telefone = "(" . $arrayTelefone[0] . $arrayTelefone[1] . ") " . $arrayTelefone[2] . $arrayTelefone[3] . $arrayTelefone[4] . $arrayTelefone[5] . $arrayTelefone[6] . "-" . $arrayTelefone[7] . $arrayTelefone[8] . $arrayTelefone[9] . $arrayTelefone[10];
      }
      return $telefone;
  }


  function m2h($mins) {
      // Se os minutos estiverem negativos
      if ($mins < 0)
          $min = abs($mins);
      else
          $min = $mins;

      // Arredonda a hora
      $h = floor($min / 60);
      $m = ($min - ($h * 60)) / 100;
      $horas = $h + $m;

      // Matemática da quinta série
      // Detalhe: Aqui também pode se usar o abs()
      if ($mins < 0)
          $horas *= -1;

      // Separa a hora dos minutos
      $sep = explode('.', $horas);
      $h = $sep[0];
      if (empty($sep[1]))
          $sep[1] = 00;

      $m = $sep[1];

      // Aqui um pequeno artifício pra colocar um zero no final
      if (strlen($m) < 2)
          $m = $m . 0;

      return sprintf('%02d:%02d:00', $h, $m);
  }

  function randString() {
  //String com valor possíveis do resultado, os caracteres pode ser adicionado ou retirados conforme sua necessidade
  //    $basic = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
      $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
      $size = 20;
      $stringRandon = "";

      for ($count = 0; $count < $size; $count++) {
  //Gera um caracter aleatorio
          $stringRandon .= $string[rand(0, strlen($string) - 1)];
      }

      return $stringRandon;
  }

  function retirarAcentos($string) {
      $string = strtolower($string);

      $string = preg_replace("[áàâãªä]", "a", $string);
      $string = preg_replace("[éèêë]", "e", $string);
      $string = preg_replace("[íìîï]", "i", $string);
      $string = preg_replace("[óòôõºö]", "o", $string);
      $string = preg_replace("[úùûü]", "u", $string);
      $string = str_replace("ç", "c", $string);
      $string = str_replace("ñ", "n", $string);

      return $string;
  }

  function tirarAcentos($string){
      return preg_replace(array("/(á|à|ã|â|ä|ª)/",
                                "/(Á|À|Ã|Â|Ä)/",
                                "/(é|è|ê|ë)/",
                                "/(É|È|Ê|Ë)/",
                                "/(í|ì|î|ï)/",
                                "/(Í|Ì|Î|Ï)/",
                                "/(ó|ò|õ|ô|ö)/",
                                "/(Ó|Ò|Õ|Ô|Ö)/",
                                "/(ú|ù|û|ü)/",
                                "/(Ú|Ù|Û|Ü)/",
                                "/(ñ)/","/(Ñ)/",
      						  "/(ç)/","/(Ç)/"),                      
      explode(" ","a A e E i I o O u U n N c C"),$string);
  }

  function retirarCaracterTelefone($telefone) {
      $telefone = str_replace("(", "", $telefone);
      $telefone = str_replace(")", "", $telefone);
      $telefone = str_replace("-", "", $telefone);
      $telefone = str_replace(" ", "", $telefone);
      return $telefone;
  }

  function retirarCaracterCpf($cpf) {
      $cpf = str_replace(".", "", $cpf);
      $cpf = str_replace("-", "", $cpf);
      return $cpf;
  }

  function retirarCaracterCep($cep) {
      $cep = str_replace("-", "", $cep);
      return $cep;
  }

  function ValidaCPF($cpf) {


      if (!is_numeric($cpf)) {
          $status = false;
      } else {
  //VERIFICA
          if (($cpf == '11111111111') || ($cpf == '22222222222') ||
                  ($cpf == '33333333333') || ($cpf == '44444444444') ||
                  ($cpf == '55555555555') || ($cpf == '66666666666') ||
                  ($cpf == '77777777777') || ($cpf == '88888888888') ||
                  ($cpf == '99999999999') || ($cpf == '00000000000')) {
              $status = false;
          } else {
  //PEGA O DIGITO VERIFIACADOR
              $dv_informado = substr($cpf, 9, 2);

              for ($i = 0; $i <= 8; $i++) {
                  $digito[$i] = substr($cpf, $i, 1);
              }

  //CALCULA O VALOR DO 10� DIGITO DE VERIFICA��O
              $posicao = 10;
              $soma = 0;

              for ($i = 0; $i <= 8; $i++) {
                  $soma = $soma + $digito[$i] * $posicao;
                  $posicao = $posicao - 1;
              }

              $digito[9] = $soma % 11;

              if ($digito[9] < 2) {
                  $digito[9] = 0;
              } else {
                  $digito[9] = 11 - $digito[9];
              }

  //CALCULA O VALOR DO 11� DIGITO DE VERIFICA��O
              $posicao = 11;
              $soma = 0;

              for ($i = 0; $i <= 9; $i++) {
                  $soma = $soma + $digito[$i] * $posicao;
                  $posicao = $posicao - 1;
              }

              $digito[10] = $soma % 11;

              if ($digito[10] < 2) {
                  $digito[10] = 0;
              } else {
                  $digito[10] = 11 - $digito[10];
              }

  //VERIFICA SE O DV CALCULADO � IGUAL AO INFORMADO
              $dv = $digito[9] * 10 + $digito[10];
              if ($dv != $dv_informado) {
                  $status = false;
              } else
                  $status = true;
          }//FECHA ELSE
      }//FECHA ELSE(is_numeric)

      return $status;
  }

  function validaCNPJ($cnpj) {

      if (strlen($cnpj) <> 14 or ! is_numeric($cnpj)) {
          return 0;
      }

      $j = 5;
      $k = 6;
      $soma1 = "";
      $soma2 = "";

      for ($i = 0; $i < 13; $i++) {
          $j = $j == 1 ? 9 : $j;
          $k = $k == 1 ? 9 : $k;
          $soma2 += ($cnpj{$i} * $k);

          if ($i < 12) {
              $soma1 += ($cnpj{$i} * $j);
          }
          $k--;
          $j--;
      }

      $digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
      $digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;
      return (($cnpj{12} == $digito1) and ( $cnpj{13} == $digito2));
  }

  function validaNota($nota) {
      if ($nota >= 0 || $nota <= 10) {
          return TRUE;
      } else {
          return FALSE;
      }
  }

  function calculo_idade($data) {
    //Data atual
    $dia = date('d');
    $mes = date('m');    $ano = date('Y');
    
    //Data do aniversário
    $nascimento = explode('-', $data);
    $anonasc = ($nascimento[0]);
    $mesnasc = ($nascimento[1]);
    $dianasc = ($nascimento[2]);

    // se for formato do banco, use esse código em vez do de cima!
    /*
    $nascimento = explode('/', $nascimento);
    $anonasc = ($nascimento[0]);
    $mesnasc = ($nascimento[1]);
    $dianasc = ($nascimento[2]);
     */
    //Calculando sua idade
    $idade = $ano - $anonasc; // simples, ano- nascimento!
    if ($mes < $mesnasc) // se o mes é menor, só subtrair da idade
    {
        $idade--;
        return $idade;
    }
    elseif ($mes == $mesnasc && $dia <= $dianasc) // se esta no mes do aniversario mas não passou ou chegou a data, subtrai da idade
    {
        $idade--;
        return $idade;
    }
    else // ja fez aniversario no ano, tudo certo!
    {
        return $idade;
    }
    
  }
}
?>