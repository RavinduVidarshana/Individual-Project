<?php


namespace App\ApiHandling;
use GuzzleHttp\Client as GuzzleClient;

class ApiCalling
{
    public static function makeRequest($path, $method, $jsonInputString, $has_param, $session_key, $has_session)
    {
        try{
            $api_url = 'http://127.0.0.1:8000/api/';
            $app_key = 'DYDLGWzDaPJGrOvE0MJJQmzro4HR1IDEeQd6SM1a';

            if($has_session){
                $headers=[
                    'Content-Type' =>'application/json',
                    'App-Key'=>$app_key,
                    'Session-Key' => $session_key
                ];
            }else{
                $headers=[
                    'Content-Type' =>'application/json',
                    'App-Key'=>$app_key,
                ];
            }

            $client=new GuzzleClient([
                'headers'=>$headers
            ]);

            if($has_param){
                $request=$client->request($method,$api_url.$path,[
                    'json'=>$jsonInputString
                ]);
            }else{
                $request=$client->request($method,$api_url.$path);
            }

            $response=$request->getBody()->getContents();
            return $response;
        }catch (\Exception $e){
            $response = $e->getResponse();
            $jsonBody = (string) $response->getBody();


           return $jsonBody;
        }
    }
}
