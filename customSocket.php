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
		   '3df9164881a3cc6ba333',
		   'ad7d30f73f6203ba9f91',
		   '584363',
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