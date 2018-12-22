<?php

namespace App\Http\Controllers\WebService;

use DB;
use App\Rol;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolController extends Controller
{
    /**
     *
     * HEADER $token
     *
     * @Rest\Get("/landing")
     * @Rest\View
     * @return array
     *
     */
    public function getRoles($user_id){
        $datos = DB::table('usuario')
                 ->join('rol_landing','usuario.rol','=','rol_landing.RolID')
                 ->where('usuario.DomainName',$user_id)
                 ->select(
                     'rol_landing.Landingname as landing',
                     'rol_landing.Landingurl as landing_url'
                 )->get();
         return response()->json($datos, 200);
     }
 
      public function getRolUser($user_id){
        $datos = DB::table('usuario')
                 ->join('rol_landing','usuario.rol','=','rol_landing.RolID')
                 ->where('usuario.DomainName',$user_id)
                 ->select(
                     'rol_landing.Rolidname as rol_name',
                     'rol_landing.Landingurl as landing_url'
                 )->first();
                 
         return response()->json($datos, 200);
    }
  

public function getToken(Request $resquet){

    $codigo = $resquet->code;

    $url_prod = "http://10.210.159.46";

    //$url_prod  = "http://10.210.159.46";
    $connection_url = $url_prod;
    $fields = array(
        "grant_type"  => "authorization_code",
        "client_secret" => "lpBUiKV2VJIBr%2BB63NcRN3ZVIaJn4I9rj9lhgb8kQx8%3D",       
        //"client_secret" => "lpBUiKV2VJIBr+B63NcRN3ZVIaJn4I9rj9lhgb8kQx8=",       
        "client_id" => "a8399c04-2d08-44c8-ac84-2ad578e8a1ae",
        "resource" => "https://laulatammxqa.crm.dynamics.com",
        "redirect_uri" =>  $connection_url,
        "code" => $codigo,
    );

    

    $ch = curl_init();        

    $postvars = '';

    foreach($fields as $key=>$value) {
        $postvars .= $key . "=" . $value . "&";
    }

     
     
    $url = "https://login.microsoftonline.com/346a1d1d-e75b-4753-902b-74ed60ae77a1/oauth2/token";

    curl_setopt($ch,CURLOPT_URL,$url);

    curl_setopt($ch,CURLOPT_POST, 1);                //0 for a get request
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);

    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

    //curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);

    //curl_setopt($ch,CURLOPT_TIMEOUT, 20);

    $response = curl_exec($ch);

   

    if(!empty($response)){

        $co = json_decode($response); 
       // dd($co);

        $urlTo = $url_prod.'?access_token='. $co->access_token; 

         return redirect($urlTo); 

       // return response()->json('Deberia regresar', 200);

    }else{
        echo 'Curl error: ' . curl_error($ch);
         

        //return response()->json('hub error123', 200);

    }

    

 

} 



    public function getTokenRefresh(Request $resquet){
        $codigo = $resquet->code;
        
        $refresh_token = $resquet->refresh_token;

        /////////////////////////////////////////////
        // url de configuración para prod o debug  //
        /////////////////////////////////////////////
        $url_prod = "http://10.210.159.46";
       // $url_prod = "https://www.calidadacademica.mx";
        $connection_url = $url_prod;
        $fields = array(
            
        "grant_type"  => "refresh_token",
      //        "client_secret" => "mWw%2Fj1%2BeTbz86imXoTueZAxO8UxatD69KQwAWRcWFgs%3D",		
        "client_secret" => "EF6xCvN/WrxkYBym6WC35aNS5o/ZjyMAMCKlxxGF8SY=",        
        "client_id" => "7c8db090-1712-47dd-aa0b-f34d5357893e",
        "resource" => "https://laulatammxqa.crm.dynamics.com",
        "refresh_token"=>$refresh_token,
        "redirect_uri" =>  $connection_url,
        "code" => $codigo,
        );
        
        $ch = curl_init();        
        $postvars = '';
        foreach($fields as $key=>$value) {
            $postvars .= $key . "=" . $value . "&";
        }
          
        $url = "https://login.microsoftonline.com/346a1d1d-e75b-4753-902b-74ed60ae77a1/oauth2/token";
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST, 1);                //0 for a get request
        curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
        //curl_setopt($ch,CURLOPT_TIMEOUT, 20);
        $response = curl_exec($ch);
        if(!empty($response)){
            $co = json_decode($response); 
            header('location:'. $connection_url.'/?access_token='. $co->access_token);  
            return response()->json('Deberia regresar', 200);
        }else{
            header('location:'. $connection_url);  
            return response()->json('hub error147', 200);
        }
        
     
    }
    /*
    public function getToken(Request $resquet){
        $codigo = $resquet->code;

        $fields = array(
        "grant_type"  => "authorization_code",
        "client_secret" => "mWw%2Fj1%2BeTbz86imXoTueZAxO8UxatD69KQwAWRcWFgs%3D",        
        "client_id" => "8b121322-84ec-4bb9-8929-6c64333775f6",
        "resource" => "https://laulatammxqa.crm.dynamics.com",
        "redirect_uri" => "https://app.devmx.com.mx",
        "code" => $codigo,
        );
        
        $ch = curl_init();        
        $postvars = '';

        foreach($fields as $key=>$value) {
            $postvars .= $key . "=" . $value . "&";
        }
          
        $url = "https://login.microsoftonline.com/346a1d1d-e75b-4753-902b-74ed60ae77a1/oauth2/token";
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST, 1);                //0 for a get request
        curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
        //curl_setopt($ch,CURLOPT_TIMEOUT, 20);
        $response = curl_exec($ch);
        $co = json_decode($response); 
                     
        header('location: https://app.devmx.com.mx/?access_token='. $co->access_token);
    }
    */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
