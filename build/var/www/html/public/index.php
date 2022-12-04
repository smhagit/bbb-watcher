<?php
require('../vendor/autoload.php');

use BigBlueButton\BigBlueButton;

$bbb = new BigBlueButton();
$response = $bbb->getMeetings();

if ($response->getReturnCode() == 'SUCCESS') {
	foreach ($response->getRawXml()->meetings->meeting as $meeting) {
		if ($meeting->meetingName == getenv('WATCH_MEETING_NAME')) {
			exit('online');
		}
	}
} else exit('error');
exit('offline');
