<?php
	$pass=$_GET['pass'];
	$roll=$_GET['roll'];
	$rand=$_GET['rand'];
	function sendDataToPusher($roll, $pass, $rand)
	{
		require __DIR__ . '/vendor/autoload.php';

		 $options = array(
		   'cluster' => 'ap2',
		   'encrypted' => true
		 );
		 $pusher = new Pusher\Pusher(
		   'bbc80a32d3d897c82c39',
		   'e5a976636a6a9bb38896',
		   '585086',
		   $options
		 );

		 $data['roll'] = $roll;
		 $data['pass'] = $pass;
		 $data['rand'] = $rand;
		 sleep(1);
		 $pusher->trigger('my-channel', 'my-event', $data);
	}
	sendDataToPusher($roll, $pass, $rand);
?>