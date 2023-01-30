class FlaticonApi {
	
	private $ch;
	private $apiKey;
	private $token;
	private $point = "https://api.flaticon.com/v3/";
	
	function __construct($apikey){
		
		$this->ch = curl_init();
		
		$data = ['apikey' => $apikey];
		
		if(empty($this->token)){
			curl_setopt($this->ch, CURLOPT_URL,    $this->point.'app/authentication' );
			curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt($this->ch, CURLOPT_POST,           1 );
			curl_setopt($this->ch, CURLOPT_POSTFIELDS,  $data ); 
			curl_setopt($this->ch, CURLOPT_HTTPHEADER, array('Content-Type:multipart/form-data','Accept:application/json'));
			
			$server_output = curl_exec($this->ch);
			$server_output = json_decode($server_output , true);
			
			if( isset($server_output['data']['token']) )
				$this->token = $server_output['data']['token'];
			else {
				echo $server_output['error']??'error';
				exit;
			}
		}
	}
	
	function searchIcon($query , $order = 'priority'){
		
			if(!$this->token)
				return [];

			curl_setopt($this->ch, CURLOPT_URL,    $this->point.'search/icons/'.$order.'?q='.urlencode($query) );
			curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt($this->ch, CURLOPT_HTTPHEADER,   array('Accept:application/json' , 'Authorization: Bearer ' . $this->token ));
			curl_setopt($this->ch, CURLOPT_POST, 0);
			$server_output = curl_exec($this->ch);
			$server_output = json_decode($server_output , true);
			
			return $server_output;
			
		
	}
	
}
