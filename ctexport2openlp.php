<!DOCTYPE html>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function build_login_form(){
	global $error_message;
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>CT Hierachie Visualisierung</title>
		<style type="text/css">
			/* Full-width inputs */
			input[type=text], input[type=password], input[type=number] {
				width: 100%;
				padding: 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				box-sizing: border-box;
			}

			/* Set a style for all buttons */
			button {
				background-color: #4CAF50;
				color: white;
				padding: 14px 20px;
				margin: 8px 0;
				border: none;
				cursor: pointer;
				width: 100%;
			}

			/* Add a hover effect for buttons */
			button:hover {
				opacity: 0.8;
			}
			
			.loginByToken {
				max-width: 400px;
				float: left;
			}
			
			.loginByCreds {
				max-width: 400px;
				float: right;
			}

			.error {
				background-color: #d30303;
				color: white;
				padding: 14px 20px;
				margin: 8px 0;
				border: none;
			}
		</style>
	</head>
	<body>
		<?php
			if(!empty($error_message)){
				echo "<div class='error'><p>" . $error_message ."</p></div>";
			}
		?>
		<h3>Please enter your user id &amp; token or E-Mail &amp; password and the event id:</h3>
		<p>If using 2FA you have to generate a token in CT and use the token login.</p>
		<p><i>Bitte gib entweder deine ChurchTools Benutzer ID und dein Login Token ein oder deine E-Mail Adresse und dein Passwort sowie die Event ID.<br>
		Wenn 2-Faktor Authentifizierung für deinen Account aktiviert ist, funktioniert nur ID &amp; Token login.</i></p>
		<div class="loginByToken">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			
			<label for="server"><b>CT Address</b></label>
			<input type="text" placeholder="Enter adress" name="server" value="<?php echo isset($_POST["server"]) ? $_POST["server"] : "svd.church.tools"; ?>" required>
			
			<label for="id"><b>User ID</b></label>
			<input type="text" placeholder="Enter id" name="id" value="<?php echo isset($_POST["id"]) ? $_POST["id"] : ""; ?>" required>

			<label for="token"><b>Token</b></label>
			<input type="password" placeholder="Copy token" name="token" value="<?php echo isset($_POST["token"]) ? $_POST["token"] : ""; ?>" required />

			<label for="event-id"><b>Event ID</b></label>
			<input type="number" placeholder="Enter Event ID" name="event-id" value="<?php echo isset($_POST["event-id"]) ? $_POST["event-id"] : ""; ?>" required>

			<button type="submit">Get OpenLP Service</button>
		</form>
		</div>
		
		<div class="loginByCreds">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<label for="server"><b>CT Address</b></label>
			<input type="text" placeholder="Enter adress" name="server" value="<?php echo isset($_POST["server"]) ? $_POST["server"] : "svd.church.tools"; ?>" required>
			
			<label for="email"><b>E-Mail</b></label>
			<input type="text" placeholder="Enter E-Mail" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ""; ?>" required>

			<label for="pw"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="pw" value="<?php echo isset($_POST["pw"]) ? $_POST["pw"] : ""; ?>" required>
            
			<label for="event-id"><b>Event ID</b></label>
			<input type="number" placeholder="Enter Event ID" name="event-id" value="<?php echo isset($_POST["event-id"]) ? $_POST["event-id"] : ""; ?>" required>

			<button type="submit">Get OpenLP Service (E-Mail &amp; PW)</button>
		</form>
		</div>
		<div style="float: left; padding-top: 10px;">
		<p>How to get token / id:<br>
		<i>Wie komme ich an Token / ID:</i><br>
		Select a person (usually you) in ChurchDB, then you'll find the id in the lower right corner. The link to aquire the login token is hidden in the Permissions. Possibly you need to ask your admin to give you the token. <b>You should be careful with the token as it is equivalent to your password!</b><br>
		<i>Wähle eine Person (normalerweise dich) in ChurchDB. Dann findest du rechts unten die ID. Der Link, um den Login Token zu erhalten, ist unter Berechtigungen versteckt. Ggf. beim Admin das Token anfragen. <b>Bitte sorgfältig mit dem Token umgehen, da er äquivalent zu deinem Passwort ist!</b></i><br>
		<img src="res/how-to-id.PNG" /><br><img src="res/how-to-berechtigungen.PNG" /><br><img src="res/how-to-token.PNG" />
		</p>
        <p>How to get the event id:<br>
        <i>Wie komme ich an die event id:</i><br>
        Navigate to the events page (churchservice) in your ChurchTools installation and click on the pen for the event. The id can be found in the lower-right corner of the popup window.
        <i>Auf der Veranstaltungsseite (churchservice) in deiner ChurchTools Installation, klicke of the Stift für das gesuchte Event. Die ID findet ist nun rechts unten im popup Fenster zu finden.</i><br>
        <img src="res/edit-event.PNG" /><br><img src="res/event-id.PNG" />
        </p>
		<p><i>Privacy / Security:<br>
		No data is permanently stored on the server, though your ip address is logged to prevent abuse (logs are deleted regularily of course).
		The information you provide for login is not stored permanently on my server and only used to login to your ChurchTools instance.
        If you still have privacy concerns, you could just host this yourself. The code can be found on <a href="https://github.com/fodinabor/CT-OpenLP-Export">GitHub</a>.<br><br>
		Keine der angegebenen Daten werden auf diesem Server permanent gespeichert. Nur die IP-Adresse mit der du gerade auf die Website zugreifst, um Missbrauch zu vermeiden (Logs werden natürlich regelmäßig gelöscht).
		Die Daten, die du angibst werden ausschließlich verwendet, um die Daten von deiner ChurchTools Instanz zu holen.
		Solltest du immer noch Datenschutz Bedenken haben, kannst du diesen Service auch gerne auf deinem eigenen Server laufen lassen. Der Code steht auf <a href="https://github.com/fodinabor/CT-OpenLP-Export">GitHub</a> zur Verfügung.
		</i></p>
		<p><i>Disclaimer:<br>
		THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
		IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
		FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
		AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
		LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
		OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
		SOFTWARE.
		</i></p>
		</div>
	</body>
	</html>
	<?php
	exit;
}

require_once("cthelper.inc");

function startsWith ($string, $startString) 
{ 
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString); 
} 

class VerseType{
    const Chorus = "c";
    const Verse = "v";
    const Intro = "i";
    const Ending = "e";
    const Bridge = "b";
    const PreChorus = "p";
    const Other = "o";
        
    const MarkTypes = [
        'refrain'=> VerseType::Chorus,
        'chorus'=> VerseType::Chorus,
        'vers'=> VerseType::Verse,
        'verse'=> VerseType::Verse,
        'strophe'=> VerseType::Verse,
        'intro'=> VerseType::Intro,
        'coda'=> VerseType::Ending,
        'ending'=> VerseType::Ending,
        'bridge'=> VerseType::Bridge,
        'interlude'=> VerseType::Bridge,
        'zwischenspiel'=> VerseType::Bridge,
        'pre-chorus'=> VerseType::PreChorus,
        'pre-refrain'=> VerseType::PreChorus,
        'misc'=> VerseType::Other,
        'pre-bridge'=> VerseType::Other,
        'pre-coda'=> VerseType::Other,
        'part'=> VerseType::Other,
        'teil'=> VerseType::Other,
        'unbekannt'=> VerseType::Other,
        'unknown'=> VerseType::Other,
        'unbenannt'=> VerseType::Other
    ];
    
    public static function FreshCounters(){
        return [VerseType::Verse => 0,
            VerseType::Chorus => 0,
            VerseType::Intro => 0,
            VerseType::Ending => 0,
            VerseType::Bridge => 0,
            VerseType::PreChorus => 0,
            VerseType::Other => 0,
        ];
    }
};

function IsVerseName($name){
    $mark_parts = explode(" ", $name);
    $mark = strtolower($mark_parts[0]);
    return array_key_exists($mark, VerseType::MarkTypes);
}

function VerseNameToTag($name, &$counters){
    $mark_parts = explode(" ", $name);
    $mark = strtolower($mark_parts[0]);
    if(array_key_exists($mark, VerseType::MarkTypes)){
        $part_tag = VerseType::MarkTypes[$mark];
        if(count($mark_parts) > 1 && is_int($mark_parts[1])){
            $counters[$part_tag] = int($mark_parts[1]);
            $part_tag .= $mark_parts[1];
        } else {
            $counters[$part_tag]++;
            $part_tag .= $counters[$part_tag];
        }
    }
    else{
        $part_tag = VerseType::Other . $counters[VerseType::Other];
        $counters[VerseType::Other]++;
    }
    return $part_tag;
}

function VerseNamesToTags($names, $counters){
    $ret = array();
    foreach($names as $name){
        array_push($ret, VerseNameToTag($name, $counters));
    }
    return $ret;
}

function writeAuthorsInXML($ctSong, &$xml){
    $separator = ",; ";
    $author = strtok($ctSong->author, $separator);
    
    $xml->startElement("authors");
    while($author !== false){
        $xml->startElement("author");
            $xml->text(trim($author));
        $xml->endElement();
        $author = strtok($separator);
    }
    $xml->endElement();
}

function writePropertiesToXML($ctSong, $order, &$xml){
    $xml->startElement("properties");
        $xml->startElement("titles");
            $xml->startElement("title");
                $xml->text($ctSong->bezeichnung);
            $xml->endElement();
        $xml->endElement();
        writeAuthorsInXML($ctSong, $xml);
        $xml->startElement("copyright");
            $xml->text($ctSong->copyright);
        $xml->endElement();
        $xml->startElement("ccliNo");
            $xml->text($ctSong->ccli);
        $xml->endElement();
        $xml->startElement("verseOrder");
            $xml->text(implode(" ", $order));
        $xml->endElement();
    $xml->endElement();
}

function writeAttributesToXML($ctSong, &$xml){
    $xml->writeAttribute("xmlns", "http://openlyrics.info/namespace/2009/song");
    $xml->writeAttribute("version", "0.8");
    $xml->writeAttribute("createdIn", "ChurchTools 3 Exporter");
    $xml->writeAttribute("modifiedIn", "ChurchTools 3 Exporter");
    $xml->writeAttribute("modifiedDate", date("c"));
}

function writeVersesToXML($openLPSong, &$xml){
    $xml->startElement("lyrics");
    foreach($openLPSong["data"] as $verse){
        $xml->startElement("verse");
            $xml->writeAttribute("name", $verse["verseTag"]);
            $xml->startElement("lines");
                $xml->writeRaw($verse["raw_slide"]);
            $xml->endElement();
        $xml->endElement();
    }
    $xml->endElement();
}

function createXMLFromSng($ctSong, $openLPSong, $order){
    $xml = new XMLWriter();
    $xml->openMemory();
    $xml->startDocument("1.0", "UTF-8");
    $xml->startElement("song");
        writeAttributesToXML($ctSong, $xml);
        writePropertiesToXML($ctSong, $order, $xml);
        writeVersesToXML($openLPSong, $xml);
    $xml->endElement();
    $xml->endDocument();
    $output = $xml->outputMemory();
    return $output;
}

function explodeSng($ctSong, $file){
    $openLPSong = array();
    
    $title = $ctSong->bezeichnung;
    $authors = explode(',', $ctSong->author);
    $authors_sng = $ctSong->author;
    $ccli = $ctSong->ccli;
    $copy = $ctSong->copyright;
    $order = array();

    $song_parts = explode("---", $file);
    $preamble = true;
    
    $counters = VerseType::FreshCounters();
    $data = array();
   
    foreach ($song_parts as $song_part){
        $song_part = trim($song_part);
        $separator = "\r\n";
        $line = strtok($song_part, $separator);
        
        if($preamble){
            while ($line !== false) {
                $line = trim($line);
                if(startsWith($line, '#')){
                    if(strpos($line, '=') !== false){
                        $arr = explode('=', $line);
                        if(count($arr) > 1){
                            $key = $arr[0];
                            $value = $arr[1];
                            switch($key){
                            case 'VerseOrder':
                                $order = VerseNamesToTags(explode(',', $value), $counters);
                                break;
                            case 'Author':
                                $authors_sng = $value;
                                break;
                            default:
                                break;
                            }
                        }
                    }
                }
            
                $line = strtok( $separator );
            }
            $preamble = false;
        } else {
            $line = trim($line);
            $data_entry = [
                "title" => $line,
                "verseTag" => VerseNameToTag($line, $counters)
            ];
            if(IsVerseName($line))
                $data_entry["raw_slide"] = trim(strstr($song_part, "\n"));
            else
                $data_entry["raw_slide"] = $song_part;
            array_push($data, $data_entry);
        }
    }
    
    $openLPSong["data"] = $data;
    
    $header = [
        "name" => "songs",
        "plugin" => "songs",
        "theme" => "",
        "title" => $ctSong->bezeichnung,
        "footer" => array($ctSong->bezeichnung, $authors_sng, $ctSong->copyright),
        "type" => 1,
        "audit" => array($ctSong->bezeichnung, $authors, $ctSong->copyright, $ctSong->ccli),
        "notes" => "",
        "from_plugin" => false,
        "capabilities" => array(1,2,5,8,9,13,22),
        "search" => "",
        "data" => array("title"=>$ctSong->bezeichnung, "authors" => $ctSong->author),
        "xml_version" => createXMLFromSng($ctSong, $openLPSong, $order),
        "auto_play_slides_once" => false,
        "auto_play_slides_loop"=> false,
        "timed_slide_interval"=> 0,
        "start_time"=> 0,
        "end_time"=> 0,
        "media_length"=> 0,
        "background_audio"=> [],
        "theme_overwritten"=> false,
        "will_auto_start"=> false,
        "processor"=> null,
        "metadata"=> []
    ];
    
    $openLPSong["header"] = $header;
    
    return $openLPSong;
}

function parseCCLISong($ccliSong, &$order){
    $counters = VerseType::FreshCounters();
    $data = [];
    foreach($ccliSong->LyricParts as $part){
        $lines = str_replace("|", "\n", $part->Lyrics);
        $title = $part->PartType . " " . $part->PartTypeNumber;
        $tag = VerseNameToTag(strtolower($title), $counters);
        
        array_push($data, ["title" => $title,
            "raw_slide" => $lines,
            "verseTag" => $tag
        ]);
        
        array_push($order, $tag);
    }
    return $data;
}

function explodeCCLISong($ctSong, $file){
    $ccliSong = json_decode($file);
    $openLPSong = array();
    
    $title = $ctSong->bezeichnung;
    $authors = explode(',', $ctSong->author);
    $authors_sng = $ctSong->author;
    $ccli = $ctSong->ccli;
    $copy = $ctSong->copyright;
    $order = array();
    
    $openLPSong["data"] = parseCCLISong($ccliSong, $order);
    
    $header = [
        "name" => "songs",
        "plugin" => "songs",
        "theme" => "",
        "title" => $ctSong->bezeichnung,
        "footer" => array($ctSong->bezeichnung, $authors_sng, $ctSong->copyright),
        "type" => 1,
        "audit" => array($ctSong->bezeichnung, $authors, $ctSong->copyright, $ctSong->ccli),
        "notes" => "",
        "from_plugin" => false,
        "capabilities" => array(1,2,5,8,9,13,22),
        "search" => "",
        "data" => array("title"=>$ctSong->bezeichnung, "authors" => $ctSong->author),
        "xml_version" => createXMLFromSng($ctSong, $openLPSong, $order),
        "auto_play_slides_once" => false,
        "auto_play_slides_loop"=> false,
        "timed_slide_interval"=> 0,
        "start_time"=> 0,
        "end_time"=> 0,
        "media_length"=> 0,
        "background_audio"=> [],
        "theme_overwritten"=> false,
        "will_auto_start"=> false,
        "processor"=> null,
        "metadata"=> []
    ];
    
    $openLPSong["header"] = $header;
    if(empty($openLPSong["data"]))
        print("error with song: " . $openLPSong["header"]["title"]);
    return $openLPSong;
}

function parseXMLSong($xmlFile){
    libxml_use_internal_errors(true);
    $xmlFile = str_replace("<br/>", "&#10;", str_replace('<br>', "&#10;", $xmlFile));
    $xml = simplexml_load_string($xmlFile);
    if($xml !== false){
        $data = [];
        foreach($xml->lyrics->verse as $verse){
            $raw = "";
            foreach($verse->lines as $vlines){
                $lines = str_replace("\n\n", "\n", (string)$vlines);
                $lines = explode("\n", $lines);
                $tags = $vlines->tag;
                
                for($i = 0; $i < max(count($lines), count($tags)); $i++){
                    if(isset($lines[$i])) // I hereby admit, that I just expect, that it's always: default - translation - default - translation ...
                        $raw .= $lines[$i] . "\n";
                    if(isset($tags[$i])){
                        if(isset($tags[$i]["name"]))
                            $raw .= "{" . $tags[$i]["name"] . "}" .
                                $tags[$i] . "{/".$tags[$i]["name"] . "}\n";
                        else
                            $raw .= $tags[$i] . "\n";
                    }
                }
                
                array_push($data,[
                    "verseTag"=>(string)$verse["name"],
                    "title"=>(string)$verse["name"],
                    "raw_slide"=>$raw
                 ]);
            }
        }
        return $data;
    } else {
        return null;
    }
}

function explodeXmlSong($ctSong, $file){
    $openLPSong = array();
    
    $title = $ctSong->bezeichnung;
    $authors = explode(',', $ctSong->author);
    $authors_sng = $ctSong->author;
    $ccli = $ctSong->ccli;
    $copy = $ctSong->copyright;
    $order = array();
    
    $header = [
        "name" => "songs",
        "plugin" => "songs",
        "theme" => "",
        "title" => $ctSong->bezeichnung,
        "footer" => array($ctSong->bezeichnung, $authors_sng, $ctSong->copyright),
        "type" => 1,
        "audit" => array($ctSong->bezeichnung, $authors, $ctSong->copyright, $ctSong->ccli),
        "notes" => "",
        "from_plugin" => false,
        "capabilities" => array(1,2,5,8,9,13,22),
        "search" => "",
        "data" => array("title"=>$ctSong->bezeichnung, "authors" => $ctSong->author),
        "xml_version" => $file,
        "auto_play_slides_once" => false,
        "auto_play_slides_loop"=> false,
        "timed_slide_interval"=> 0,
        "start_time"=> 0,
        "end_time"=> 0,
        "media_length"=> 0,
        "background_audio"=> [],
        "theme_overwritten"=> false,
        "will_auto_start"=> false,
        "processor"=> null,
        "metadata"=> []
    ];
    
    $openLPSong["header"] = $header;
    $openLPSong["data"] = parseXMLSong($file);
    if($openLPSong["data"] === null)
        print("error with song: " . $openLPSong["header"]["title"]);
    return $openLPSong;
}

function provideDownload($filename){
    header('Content-Type: application/zip');
    header("Content-Transfer-Encoding: Binary"); 
    header("Content-disposition: attachment; filename=\"" . basename($filename) . "\""); 
    readfile($filename);
    unlink($filename);
    exit();
}

function createOpenLPService($serviceName, $openLPSongs){
    $openLPService = [
        [
            "openlp_core"=> [
                "lite-service" => false,
                "service-theme" => null
            ],
        ]
    ];
    
    foreach($openLPSongs as $openLPSong){
        array_push($openLPService, $openLPSong);
    }
    
    $service_json = json_encode($openLPService, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
    
        
    if (!file_exists('services')) {
        mkdir('services', 0750, true);
    }
    
    $zip = new ZipArchive();
    $filename = "services/$serviceName.osz";

    if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
        throw new Exception("cannot open <$filename>\n");
    }

    $zip->addFromString("service_data.osj", $service_json);
    $zip->close();
    
    provideDownload($filename);
}


function normalize_server($server){
    $protoPos = strpos($server, "://");
	if($protoPos === false){
		$server = "https://" . $server;
        $protoPos = strlen("https");
	}
    $protoPos+=3;
	
    $pos = strpos($server, "/", $protoPos);
    if($pos !== false)
        $server = substr($server, 0, $pos + 1);
    
	return $server;
}

$successful = false;
$emailLogin = isset($_POST['email']) && isset($_POST['pw']);
$tokenLogin = isset($_POST['id']) && isset($_POST['token']);
if(isset($_POST['server']) && ($emailLogin || $tokenLogin) && isset($_POST['event-id'])){
   	$_POST['server'] = normalize_server($_POST['server']);
       
    try { 
    $CT_DOMAIN = $_POST['server'] . "?q=";
    $CTNew_DOMAIN = $_POST['server'];
    
    if($tokenLogin && !CT_login($CT_DOMAIN, $_POST['token'], $_POST['id']))
        throw new Exception("Token login not successful");
    if($emailLogin && !CT_loginAuth($CT_DOMAIN, $_POST['email'], $_POST['pw']))
        throw new Exception("Password login not successful");    
    
    
    $songs = CT_getSongs($CT_DOMAIN);
    if($songs->status !=="success")
        throw new Exception("getSongs");
    $songs = $songs->data->songs;
    
    $agenda = CTNew_getEventAgenda($CTNew_DOMAIN, $_POST['event-id']);
    
    $items = $agenda->data->items;

    $actualSongs = [];
    foreach($items as $item){
        if($item->type==="song"){
            $songId = $item->song->songId;
            $song = $songs->$songId;
            $arrangementId = $item->song->arrangementId;
            
            $file_found = false;
            if(property_exists($song->arrangement->$arrangementId, "files")){
                $files = $song->arrangement->$arrangementId->files;
                foreach($files as $file){
                    $pos = strpos($file->bezeichnung, ".xml");
                    if($pos !== false){
                        $file_content = CT_getSongFile($CT_DOMAIN, $file->id, $file->filename);
                        array_push($actualSongs, ["serviceitem" =>explodeXmlSong($song, $file_content)]);
                        $file_found = true;
                        break;
                    } else {
                        $pos = strpos($file->bezeichnung, ".sng");
                        if($pos !== false){
                            $file_content = CT_getSongFile($CT_DOMAIN, $file->id, $file->filename);
                            array_push($actualSongs, ["serviceitem" =>explodeSng($song, $file_content)]);
                            $file_found = true;
                            break;
                        }
                    }
                }
            }
            
            if(!$file_found && isset($song->ccli)){
                $ccliRes = CT_getCCLILyrics($CT_DOMAIN, $song->ccli);
                if($ccliRes->data->success == 1) {
                    array_push($actualSongs, ["serviceitem" =>explodeCCLISong($song, $ccliRes->data->content)]);
                }
            }
        }
    }

    $name = preg_replace('/\s/', '', $agenda->data->name);
    createOpenLPService($name, $actualSongs);
    $successful = true;
    }catch(Exception $ex){
        $error_message = 'Fehler: ' .  $ex->getMessage() . "\n";
    } finally {
        CT_logout($CT_DOMAIN);
    }
}

if(!$successful){
    build_login_form();
}
?>
