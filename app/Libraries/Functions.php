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
?>