<?php
	
	require("libSQL.php");
	
	if (!isset($_POST["command"])) { die(); }
		
	switch ($_POST["command"]) {
		
		case "fetchAll":
			fetchAllContent();
		break;
		
		case "fetchPosts":
			fetchPosts();
		break;
		
		case "fetchDrafts":
			fetchDrafts();
		break;
		
		case "newDraft":
			newDraft();
		break;
		
		case "publishDraft":
			publishDraftWithIdentifier($_POST["identifier"]);
		break;
		
		case "unpublishPost":
			unpublishPostWithIdentifier($_POST["identifier"]);
		break;
		
		case "updateDraft":
			updateDraft($_POST["identifier"], $_POST["title"], $_POST["subtitle"], $_POST["body"]);
		break;
		
		case "updatePost":
			updatePost($_POST["identifier"], $_POST["title"], $_POST["subtitle"], $_POST["body"]);
		break;
		
		case "deletePost":
			deletePostWithIdentifier($_POST["identifier"]);
		break;
		
		case "deleteDraft":
			deleteDraftWithIdentifier($_POST["identifier"]);
		break;
		
		case "fetchResources":
			fetchResources();
		break;
		
		case "createResource":
			createResource($_POST["filename"], $_POST["filedata"]);
		break;
		
	}
	
	function fetchPosts() {
		
		$posts = query("SELECT * FROM content ORDER BY date ASC");
		
		$payload = array();
		
		if (isset($posts["result"])) {
			$payload["posts"] = $posts["result"];
		}
		else {
			$payload["posts"] = array();
		}
		
		echo(json_encode($payload));
		
	}
	
	function fetchDrafts() {
		
		$posts = query("SELECT * FROM drafts ORDER BY date ASC");
		
		$payload = array();
		
		if (isset($posts["result"])) {
			$payload["drafts"] = $posts["result"];
		}
		else {
			$payload["drafts"] = array();
		}
		
		echo(json_encode($payload));
		
	}
	
	function fetchAllContent() {
		
		$posts = query("SELECT * FROM content");
		$drafts = query("SELECT * FROM drafts");
		
		$payload = array();
		
		if (isset($posts["result"])) {
			$payload["posts"] = $posts["result"];
		}
		else {
			$payload["posts"] = array();
		}
		
		if (isset($drafts["result"])) {
			$payload["drafts"] = $drafts["result"];
		}
		else {
			$payload["drafts"] = array();
		}
		
		echo(json_encode($payload));
		
	}
	
	function newDraft() {
		
		$draftTransaction = query("INSERT INTO drafts(title, subtitle, body) VALUES('New Draft', 'Tap to add subtitle', 'Tap to write body')");
		if (isset($draftTransaction['error'])) {
			error_log("Failed to insert new draft object: " . $draftTransaction['error']);
		}
		
	}
	
	function publishDraftWithIdentifier($identifier) {
		
		$transaction = query("INSERT INTO content (title, subtitle, body) SELECT title, subtitle, body FROM drafts WHERE identifier='$identifier'");
		if (isset($transaction["error"])) {
			error_log("Failed to publish draft: " . $publishQuery["error"]);
			echo(json_encode(array("Error" => $publishQuery["error"])));
		}
		else {
			query("DELETE FROM drafts WHERE identifier='$identifier'");
			fetchAllContent();
		}
		
	}
	
	function unpublishPostWithIdentifier($identifier) {
		
		$transaction = query("INSERT INTO drafts (title, subtitle, body) SELECT title, subtitle, body FROM content WHERE identifier='$identifier'");
		if (isset($transaction["error"])) {
			error_log("Failed to unpublish post: " . $publishQuery["error"]);
			echo(json_encode(array("Error" => $publishQuery["error"])));
		}
		else {
			query("DELETE FROM content WHERE identifier='$identifier'");
			fetchAllContent();
		}
		
	}
	
	function updateDraft($identifier, $title, $subtitle, $body) {
		
		$newBody = str_replace('%', 'WICK-PERCENT-ESCAPE', $body);
		$update = query("UPDATE drafts SET title='$title', subtitle='$subtitle', body='$newBody' WHERE identifier='$identifier'");
		if (isset($update["error"])) {
			error_log("Failed to update draft: " . $update["error"]);
			echo(json_encode(array("error" => $update["error"])));
		}
		else {
			
			fetchDrafts();
			
		}
		
	}
	
	function updatePost($identifier, $title, $subtitle, $body) {
		
		//Throws an error, even though its fucking identical to the draft query
				
		$newBody = str_replace('%', 'WICK-PERCENT-ESCAPE', $body);
		$update = query("UPDATE content SET title='$title', subtitle='$subtitle', body='$newBody' WHERE identifier='$identifier'");
		if (isset($update["error"])) {
			error_log("Failed to update post: " . $update["error"]);
			echo(json_encode(array("error" => $update["error"])));
		}
		else {
			fetchPosts();
		}
		
	}
	
	function deleteDraftWithIdentifier($identifier) {
		
		$result = query("DELETE FROM drafts WHERE identifier='" . $identifier . "'");
		if (isset($result["error"])) {
			error_log("Failed to delete draft: " . $result["error"]);
		}
			
	}
	
	function deletePostWithIdentifier($identifier) {
		
		$result = query("DELETE FROM content WHERE identifier='" . $identifier . "'");
		if (isset($result["error"])) {
			error_log("Failed to delete post: " . $result["error"]);
		}
		
	}
	
	function fetchResources() {
		
		$contents = scandir("Contents");
		$payload = array();
		foreach($contents as $file) {
	        if ($file[0] != '.') array_push($payload, $file);
	    }
		echo(json_encode(array("Resources" => $payload)));
		
	}
	
	function createResource($filename, $filedata) {
		
		echo(json_encode(array("Filename" => $filename, "Filedata" => $filedata)));
		
		// file_put_contents("Contents/".$filename, $filedata);
		
	}
	
	function prettyPrint($json)
	{
	    $result = '';
	    $level = 0;
	    $in_quotes = false;
	    $in_escape = false;
	    $ends_line_level = NULL;
	    $json_length = strlen( $json );
	
	    for( $i = 0; $i < $json_length; $i++ ) {
	        $char = $json[$i];
	        $new_line_level = NULL;
	        $post = "";
	        if( $ends_line_level !== NULL ) {
	            $new_line_level = $ends_line_level;
	            $ends_line_level = NULL;
	        }
	        if ( $in_escape ) {
	            $in_escape = false;
	        } else if( $char === '"' ) {
	            $in_quotes = !$in_quotes;
	        } else if( ! $in_quotes ) {
	            switch( $char ) {
	                case '}': case ']':
	                    $level--;
	                    $ends_line_level = NULL;
	                    $new_line_level = $level;
	                    break;
	
	                case '{': case '[':
	                    $level++;
	                case ',':
	                    $ends_line_level = $level;
	                    break;
	
	                case ':':
	                    $post = " ";
	                    break;
	
	                case " ": case "\t": case "\n": case "\r":
	                    $char = "";
	                    $ends_line_level = $new_line_level;
	                    $new_line_level = NULL;
	                    break;
	            }
	        } else if ( $char === '\\' ) {
	            $in_escape = true;
	        }
	        if( $new_line_level !== NULL ) {
	            $result .= "\n".str_repeat( "\t", $new_line_level );
	        }
	        $result .= $char.$post;
	    }
	
	    return $result;
	}
	
?>