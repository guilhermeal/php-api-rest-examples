<?

  function includeNewEventUsingCurl($params=null) {
    $urlConsumer = "https://esocial.dev.audora.io/api/eventos";
    
    try {

      if(is_array($params)) {
        $params = json_encode($params);
      }

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $urlConsumer);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
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

  // PARAMETRO DA REQUISICAO POST - EM FORMATO JSON
  $jsonParams = '{
    "tipo": "S1000",
    "operacao": "INCLUSAO",
    "dataGeracao": "2022-03-30T08:00",
    "conteudo": {
      "ideEmpregador": {
        "tpInsc": 1,
        "nrInsc": "44186361"
      },
      "infoEmpregador": {
        "idePeriodo": {
          "iniValid": "2022-01"
        },
        "novaValidade": null,
        "infoCadastro": {
          "classTrib": "01",
          "indCoop": 0,
          "indConstr": 0,
          "indDesFolha": 0,
          "indOptRegEletron": 0,
          "dadosIsencao": null,
          "infoOrgInternacional": null
        }
      }
    }
  }';

  // PARAMETRO DA REQUISICAO POST - EM FORMATO ARRAY
  $arrayParams = [
    "tipo" => "S1000",
    "operacao" => "INCLUSAO",
    "dataGeracao" => "2022-03-30T08:30",
    "conteudo" => [
      "ideEmpregador" => [
        "tpInsc" => 1,
        "nrInsc" => "44186361"
      ],
      "infoEmpregador" => [
        "idePeriodo" => [
          "iniValid" => "2022-01"
        ],
        "novaValidade" => null,
        "infoCadastro" => [
          "classTrib" => "01",
          "indCoop" => 0,
          "indConstr" => 0,
          "indDesFolha" => 0,
          "indOptRegEletron" => 0,
          "dadosIsencao" => null,
          "infoOrgInternacional" => null
        ]
      ]
    ]
  ];

  // CHAMADA PARA FUNCAO QUE FAZ A REQUISICAO POST PASSANDO OS PARAMETROS
  includeNewEventUsingCurl($jsonParams);
  
?>