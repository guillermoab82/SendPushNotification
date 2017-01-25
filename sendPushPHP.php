<?php
    // APIKEY de Google
    $apiKey = "AQUÍ VA LA LLAVE QUE OBTIENES AL MOMENTO DE SACAR LA CUENTA EN FIREBASE";

    //Este ejemplo es para enviar a varios usuarios
    //$registrationIDs = array( "reg id1","reg id2");

    //Pero en nuestro caso lo enviaremos al grupo
    $idGroup = "/topics/MyEvents";
    
    //Mensaje a enviar
    $mensaje = array(
        'body'=> 'Push Up Notification desde PHP!',
        'title'=>'Notificacion PHP',
        'sound'=>'default'
    );

    //La dirección a la que se enviará la Notification
    $url = 'https://gcm-http.googleapis.com/gcm/send';

    //Conformando la cadena de mensaje
    $fields = array(
        'to' => $idGroup,
        'notification' => $mensaje
    );

    $headers = array(
        'Authorization: key=' . $apiKey,
        'Content-Type: application/json'
    );
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST,true);
    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($fields));
    $result = curl_exec($ch);
    curl_close($ch);

    echo $result;
    ?>