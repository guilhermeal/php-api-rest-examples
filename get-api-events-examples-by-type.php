<?

  function getEventExamplesByType($typeEvent=null) {
    $urlConsumer = "https://esocial.dev.audora.io/api/eventos/exemplos/" .$typeEvent;
    
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

  
  // PARAMTRO DA REQUISICAO GET - EM FORMATO STRING
  $typeEvent = "S1000";
  
  // CHAMADA PARA FUNCAO QUE FAZ A REQUISICAO POST PASSANDO OS PARAMETROS
  getEventExamplesByType($typeEvent);

?>