<?

  function getEventByIDUsingCurl($idEvento=null) {
    $urlConsumer = "https://esocial.dev.audora.io/api/eventos/" .$idEvento;
    
    try {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $urlConsumer);
      $response = curl_exec($ch);
      $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      curl_close($ch);
      if(!($httpcode>=200 && $httpcode<300)) { 
        throw new Exception('Request error!');
      }
      
      return $response;

    } catch(Exception $e) {

      echo $e->getMessage();
      throw $e;

    }
  }

  function getEventByIDAlternative($idEvento=null) {
    $urlConsumer = "https://esocial.dev.audora.io/api/eventos/" .$idEvento;

    try {
      if(!$response = file_get_contents($urlConsumer)) { 
        throw new Exception('Request error!');
      }
      
      return $response;

    } catch(Exception $e) {

      echo $e->getMessage();
      throw $e;

    }
  }

  // PARAMTRO DA REQUISICAO GET - EM FORMATO STRING
  $idEvento = "ID1441863600000002022033017443000012";
  
  // CHAMADA PARA FUNCAO QUE FAZ A REQUISICAO POST PASSANDO OS PARAMETROS
  
  // USANDO CURL
  getEventByIDUsingCurl($idEvento);
  
  // USANDO FUNÇÃO ALTERNATIVA
  // getEventByIDAlternative($idEvento);
  

?>