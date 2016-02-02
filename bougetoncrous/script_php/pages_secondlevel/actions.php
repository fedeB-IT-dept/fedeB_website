<?php

include_once("tool.php");
include_once("errors.php");
include_once("votes.php");

/**
 * class for action functions
 *   
 */
class action {
    var $result;  // Result of the action
	var $warnings = array(); // list of generated warnings
	var $successes = array(); // list of generated successes

	// add a warning
    function add_warning($warning) {
        $this->warnings[] = $warning;
    }

	// add a success
	function add_success($success) {
        $this->successes[] = $success;
    }

	// display all warnings
	function echo_warnings() {
		foreach ($this->warnings as $warning) {
			echo ("<div class='warning'>".$warning."</div>");
		}
    }

	// display all success messages
	function echo_successes() {
		foreach ($this->successes as $success) {
			echo ("<div class='success'>".$success."</div>");
		}
    }
}

/**
 * inserts a new idea in the database
 *
 * @param  string    $title  title of the idea
 * @param  string    $message message of the idea
 * @param  string    $anonymization tells if idea is to be anonymized
 * @param  integer   $category id of the category for the idea
 * @param  string    $login  login of the poster
 * @param  integer   $valid says if the idea needs to be moderated (default 0 = needs moderation)
 * @return array     
 */
function post($title,$message,$anonymization,$category,$login,$valid=0) {

	$action = new action;
	$action->result = False;

	$check_1=(isset($title) && !empty($title));
	$check_2=(isset($message) && !empty($message));
	$check_3=(!isset($anonymization) || $anonymization=="on");
	$check_4=(isset($category) && is_numeric($category) && $category>0);

	// V�rification des arguments
	if ($check_1)
	{
		$title_prec=$title;
	}
	else
	{
		$action->add_warning(_('Titre incorrect'));
	}                
	if ($check_2)
	{
		$text_prec=$message;
	}
	else
	{
		$action->add_warning(_('Message incorrect'));
	}               
	if ($check_3)
	{
		if (isset($anonymization))
		{
			$anon_prec="on";
		}
	}
	else
	{
		$action->add_warning(_('Incorrect anonymization value'));
	}
	if ($check_4)
	{
		$cate_prec=$category;
	}
	else
	{
		$action->add_warning(_('Catégorie incorrecte'));
	}
	
	if ($check_1 && $check_2 && $check_3 && $check_4) // Tous les arguments sont corrects, ex�cution du traitement du formulaire
	{
		$title_prec_sec=mysql_real_escape_string($title_prec);
		$text_prec_sec=mysql_real_escape_string($text_prec);
		$cate_prec_sec=mysql_real_escape_string($cate_prec);
		$rand_prop=mt_rand(0,65535);
		$hash_prop=sha1($login.$rand_prop);

		if ($anon_prec=="on")
		{
			$name_print="";
		}
		else
		{
			$name_print=mysql_real_escape_string(construct_name_from_session());
		}

		if (@mysql_query("INSERT INTO `thread` (`thread_id`,`rand_prop`,`hash_prop`,`title`,`text`,`date`,`category`,`is_valid`,`possibly_name`) VALUES (NULL, '$rand_prop', '$hash_prop','$title_prec_sec','$text_prec_sec',CURRENT_TIMESTAMP,'$cate_prec_sec',$valid,'$name_print')"))
		{
			$action->add_success(_('Ta proposition a bien &eacute;t&eacute; ajout&eacute;e et est en attente de mod&eacute;ration'));
			$action->result = True;
		}
		else
		{
			$action->add_warning(_('Ta proposition n\'a pas pu être ajoutée suite à une erreur de transfert.'));
		}
	}
	
	return $action;
}

?>