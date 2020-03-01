<?php
function today_datetime()
{
	return date('d-M-Y h:i:s a');
}

function date2db($date)
{
	if (empty($date)) {
		return NULL;
	}
	return date('Y-m-d', strtotime($date));
}

function db2date($date)
{
	if (empty($date)) {
		return NULL;
	}
	return date('d-m-Y', strtotime($date));
}


 function educationLevel(){

    $edu = ['Secondary' => 'Secondary', 'Higher Secondary' => 'Higher Secondary', 'Diploma' => 'Diploma', 'Bachelor/Honors' => 'Bachelor/Honors', 'Masters' => 'Masters', 'Doctoral' => 'Doctoral'];

    $userId = auth()->user()->id;
    $userEdu = \App\TpEducational::where('user_id',$userId)->get()->toArray();

	// if has old edu data, then skib it. Or return Original edu array
	    if(count($userEdu) > 0){
	      foreach ($userEdu as $value) {
	          unset($edu[$value['level_of_education']]);
	      }
	    }

			return $edu;
}

?>
