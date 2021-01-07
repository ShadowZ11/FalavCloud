<?php
	require_once ("../functions.php");

	$connect = connectFalaDB();
	$data = $connect->query("SELECT * FROM USERS WHERE RANG = 1");
	$xml= new XMLWriter();
	$xml->openUri("users.xml");
	$xml->startDocument('1.0', 'UTF-8');
	$xml->startElement('utilisateurs');
	  while($pers = $data->fetch()){
	    $xml->startElement('contact');
	    $xml->writeAttribute('id', $pers['ID_USERS']);
	    $xml->writeElement('prenom',$pers['PRENOM']);
	    $xml->writeElement('nom',$pers['NOM']);
	    $xml->writeElement('naissance',$pers['DATE_NAISSANCE']);
	    $xml->writeElement('email', $pers['EMAIL']);
	    $xml->writeElement('pseudo', $pers['PSEUDO']);
	    $xml->endElement();
	  	}
	$xml->endElement();
	$xml->endDocument();
	$xml->flush();
	header("Location: users.xml");