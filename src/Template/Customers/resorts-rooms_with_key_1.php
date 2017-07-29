<?php
$app->post('/hotelogix/resorts-rooms', function ($request, $response) {
    date_default_timezone_set('Asia/Kolkata');
    $doc = date('d-m-Y H:i:s');
    $dou = date('d-m-Y H:i:s');

	$db = new DB();


    $postdata = file_get_contents("php://input");
	if (isset($postdata)) {
		
		$request = json_decode($postdata);

		$sign = $request->sign;
		$resort_id = $request->resortid;

		$checkindate = $request->checkindate;
		
		$checkindate = substr($checkindate, 6, 4).'-'.substr($checkindate, 0, 2).'-'.substr($checkindate, 3, 2);
		$checkoutdate = $request->checkoutdate;
		$checkoutdate = substr($checkoutdate, 6, 4).'-'.substr($checkoutdate, 0, 2).'-'.substr($checkoutdate, 3, 2);
	
		$adult = $request->adult;
		$child = $request->child;
		$infant = $request->infant;
		$roomrequire = $request->roomrequire;
		


		

		$key = 0;
		$data = [];


	$current_time = $db->utc_time();

	function postdata($m, $sign, $resort_id, $Consumer_Key, $Consumer_Secret, $requestStr)
		{
			$db = new DB();
			$actionUrl = 'https://staygrid.com/ws/web/'. $m;			
			$signature = hash_hmac("sha1", $requestStr, $Consumer_Secret);
			$extHeader = array(
			"Content-Type: text/xml"
			,"X-HAPI-Signature: $signature"
			);

			$request = curl_init($actionUrl);

			curl_setopt($request,CURLOPT_HTTPHEADER,$extHeader);
			curl_setopt($request, CURLOPT_HEADER, 0);
			curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($request, CURLOPT_REFERER, 'http://www.hotelogix.com');
			curl_setopt($request, CURLOPT_POSTFIELDS, $requestStr);
			curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE);
			$post_response = curl_exec($request);

			$xml = simplexml_load_string($post_response);
			$post_response  = substr($post_response, 39);
			
			//print_r($post_response);
		 	if($m =="wsauth")
		 	{
		 		$accesskey =  $xml->response->accesskey['value'];
			 	$accesssecret =  $xml->response->accesssecret['value'];
			 	$datetime = $xml['datetime'];
			 	$code = $xml->response->status['code'];
			 	if($code!=1900)
			 	{
			 		$qry = "insert into hotelogix_details (sign, resort_id, accesskey, accesssecret, DOC) VALUES ('$sign', '$resort_id','$accesskey', '$accesssecret', NOW())"; 
			 		if($db->_query($qry))
				 		{
				 			return ($accesskey);		
				 		}
			 		else
				 		{
				 			return (0);
				 		}	
			 	}
			 	else
			 	{
			 		return (2);
			 	}
			 }
			 else
			 {
			 	//
			 }
			curl_close ($request);
		}


	function search($m, $accesskey, $requestStr)
		{
			$db = new DB();
			$accesssecret = "";
			$key = "";
			$key = $accesskey;
			$qry1 = "select * from hotelogix_details where accesskey = '$accesskey' && TIMESTAMPDIFF(MINUTE, NOW(), DOC) < 300";
			$result1 = $db->_query($qry1);
			if(mysqli_num_rows($result1)>0)
			{
			
				$db = new DB();
				$row1 = $result1->fetch_assoc();
				$accessskey1 = $row1['accesskey'];
				$accesssecret = $row1['accesssecret'];
				$actionUrl = 'https://staygrid.com/ws/web/'. $m;			
				$signature = hash_hmac("sha1", $requestStr, $accesssecret);
				$extHeader = array(
				"Content-Type: text/xml"
				,"X-HAPI-Signature: $signature"
				);
				
				$request = curl_init($actionUrl);

				curl_setopt($request,CURLOPT_HTTPHEADER,$extHeader);
				curl_setopt($request, CURLOPT_HEADER, 0);
				curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($request, CURLOPT_REFERER, 'http://www.hotelogix.com');
				curl_setopt($request, CURLOPT_POSTFIELDS, $requestStr);
				curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE);
				$post_response = curl_exec($request);

				$xml = simplexml_load_string($post_response);
		
			 	$post_response  = substr($post_response, 39);
			 	$res = new SimpleXMLElement($post_response);
			 	$room_id = $res->response->hotels->hotel['id'];
			 	//echo $qry1 = "UPDATE hotelogix_details SET room_id = '$room_id'  where accesskey = '$accesskey'";
			 	//if($db->_query($qry1)){

			 				//insert room rate info
			 				$json = $db->XML2JSON($post_response);
		 					$rooms =  json_decode($json);
							
							$m = new MongoClient();
							$mdb = $m->db_purastays;
							$collection = $mdb->room_rates;

							//$collection->remove();
							// add new document in collection
							
							$document = array(
								"accesskey" => $accessskey1, 
								"rooms" => $rooms,
								"doc" => $doc
								);
							  if($collection->insert($document))
							  {
							  	$data['mongo_status'] = '1';
						  		$data['message'] = "Document inserted successfully";
							  }
							  else{
							  	//echo 'data is not saved in mongo';	
							  }
							  	

			 	//}
			 	print_r($post_response);
				curl_close ($request);
		
			}
		}

			 $db->accesskey_validate($key);
			if($db->accesskey_validate($key)==0)
			{
				$qry = "select Consumer_Key, Consumer_Secret from resorts where Id = $resort_id";
				$result = $db->_query($qry);
				if(mysqli_num_rows($result) > 0)
				{
					$row = $result->fetch_assoc();
				}
				$Consumer_Key = $row['Consumer_Key'];
				$Consumer_Secret = $row['Consumer_Secret'];

					

				//GET ACCESS KEY/SECRET EXAMPLE //				
				$xml = '<?xml version="1.0"?>
				<hotelogix version="1.0" datetime="'.$current_time.'">
				<request method="wsauth" key="'.$Consumer_Key.'"></request>
				</hotelogix>';
				 $accesskey = postdata('wsauth', $sign, $resort_id, $Consumer_Key, $Consumer_Secret, $xml);
			}

			 if($accesskey!="")
			 {
			 	// FOR SEARCH AVAILIBILITY EXAMPLE//
				$xml = '<?xml version="1.0"?>
				<hotelogix version="1.0" datetime="'.$current_time.'">
				<request method="search" key="'.$accesskey.'">
				<stay checkindate="'.$checkindate.'" checkoutdate="'.$checkoutdate.'"/>
				<pax adult="'.$adult.'" child="'.$child.'" infant="'.$infant.'"/>
				<roomrequire value="'.$roomrequire.'"/>
				<limit value="200" offset="0" hasResult="0"/>
				</request>
				</hotelogix>';
				search('search', $accesskey, $xml);

			 }
		}
	});
?>