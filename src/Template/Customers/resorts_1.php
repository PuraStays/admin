<?php
$app->get('/resorts/id/{id}', function ($request, $response) {
	    $db = new DB();
	    $id = $request->getAttribute('id');
		
	//	$qry = "select r.Id as id, r.Resort_Name as name, r.Banner_Image as banner, r.About_Resort_Description as description, r.gallery_id as gallery, r.programs_id as programs from clusters as c INNER JOIN resorts as r ON (c.Resorts REGEXP CONCAT(' ?', r.Id)) where c.Id = '$id' && r.Status = 1 order by name ASC";
		
		$qry = "select r.Id as id, r.Resort_Name as name, r.About_Resort_Description as description, r.Banner_Image as banner, r.gallery_id as gallery_id from clusters as c INNER JOIN resorts as r ON (c.Resorts REGEXP CONCAT(' ?', r.Id)) where c.Id = '$id' && r.Status = 1 order by name ASC";

		$result = $db->_query($qry);

		$i=0;
		
		if(mysqli_num_rows($result) > 0)
		{

			while($row = $result->fetch_assoc())
				{

					$row = array_map('utf8_encode', $row);
					$i++;
					if($row['gallery_id']!="")
					$row['gallery_id'] = substr($row['gallery_id'], 0, -2);
					$gallery = explode(', ', $row['gallery_id']);

					unset($row['gallery_id']);
					$row['gallery'] = $gallery;
					
					$arr[] = $row;
				}
			if(isset($arr))
				{
					$data['resorts']['list'] = $arr;
					$data['resorts']['status'] ="1";
					$data['resorts']['message'] ="records found";
				}
		}
		else
		{
			$data['resorts']['status'] ="0";
			$data['resorts']['message'] = 'no records found';
		}
		
		//var_dump($data);
		$response = json_encode($data, JSON_PRETTY_PRINT);
		$response = str_replace( '\/', '/', $response);
		echo $response;
});
?>