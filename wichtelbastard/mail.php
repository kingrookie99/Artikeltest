<?php

if(!isset($_GET["sendNow"]))
{
    echo "<meta charset='utf-8'>";
}

include('../conf.php');

if($_SESSION['admin'] != '1') die();

require_once 'classes/c_simpleMail.php';
$mail = new SimpleMail();

$bastard_url        = "http://wwww.wichtelbastard.de";

//$recipients[] = 42;  // Vanessa D
//$recipients[] = 43;  // Tristan	
//$recipients[] = 37;  // Katja
//$recipients[] = 6;  // Carsten
$recipients[] = 7;  // Marc
//$recipients[] = 18;  // Vanessa
//$recipients[] = 28;  // Klaus


$action = "mail1";
#$action = "mail2";
if($_GET["action"]) $action = $_GET["action"];


$result = mysql_query("SELECT * FROM `attendants`") or trigger_error(mysql_error());

$count = 1;       
while($row = mysql_fetch_array($result))
{

    foreach($row AS $key => $value)
    {
        $row[$key] = stripslashes($value);
        $row[$key] = stripslashes($value);
    }

    ################
    // zum Testen Mail nur an teamweb
    if(!in_array($row['id'],$recipients)) continue;
    ################



    if($action == "mail1")
    {
        $butt1 = "active";
        
        $bastard_subject = "Jetzt geht's lo-hos!";
        
        $message  = "";
        $message .= "Der Wichtelbastard höchstpersönlich hat heute um 12:23 Uhr den großen roten Knopf für die Auslosung des fantastische cyclos-Weihnachtswichtelns gedrückt.\n\n";
        $message .= "Ab sofort seht ihr im Wichtelbastard-Portal unter \"Mein Empfänger\", wen Ihr vorweihnachtlich beglücken dürft.\n";
        $message .= "Falls dies nicht der Fall ist, müsst Ihr Euch bitte einmal kurz neu einloggen.\n\n";
        $message .= "Und nicht vergessen:\n";
        $message .= "Tragt bitte Eure Wünsche ein oder setzt den Haken für \"wunschlos glücklich, überrasch mich\".\n\n";
        $message .= "Schöne Grüße und viel Spaß wünscht\n";
        $message .= "das Wichtelbastard®-Team\n\n";
    }

    if($action == "mail2")
    {
        $butt2 = "active";
        
        $bastard_subject = "Anleitung für den Wichtelbastard®";
 
        $message  = "";
        $message .= "Willkommen beim Wichtelbastard®.\n\n";
        $message .= "Wir freuen uns, dass Du Dich für die digitale Geschenketauschplattform der Zukunft entschieden hast!\n\n";
        $message .= "Vorbei sind die Zeiten des Zettelziehens und des Hirnzermarterns ob des passenden Geschenks für Dein zugelostes Wichtelgeschöpf:\n";
        $message .= "Der Wichtelbastard® optimiert diese Prozesse elegant und effizient in einer benutzerfreundlichen, zeitgemäßen Online-Bedienoberfläche.\nThe Future is now.\n\n";
        $message .= "Nach dem Einloggen wirst Du vom schlanken User-Interface begrüßt.\nUnter „Mein Account“ kannst Du Deine individuellen Geschenkpräferenzen definieren.\n\n";
        $message .= "Für wunschlos Glückliche besteht die Möglichkeit, sich komplett in die Hände Ihres Wichtelpartners zu begeben und sich überraschen zu lassen.\nViel Glück damit.\n\n";
        $message .= "Für alle anderen, die ein wenig mehr Kontrolle in ihrem Leben und über ihr Schicksal brauchen, steht der personalisierte Wunschzettel zur Verfügung.\nBis zu drei Wünsche nebst Hinweisen zu den Bezugsquellen können hier hinterlegt werden.\n\n";
        $message .= "Hinter „Mein Empfänger“ verbirgt sich nach der offiziellen Auslosungszeremonie der durch einen hochkomplexen mathematischen Algorithmus komplett zufällig zugeloste Empfänger Eures Geschenks und seine Wunschliste.\n\n";
        $message .= "Viel Spaß beim Wichteln Two Point Oh wünscht\n";
        $message .= "das Wichtelbastard®-Team\n\n";

    }
    

    ################
    // zum Testen alle Mails an Klaus
    #$bastard_subject = $count." - TEST - ".$action." - ".$row['firstname']." ".$row['surname'];
    #$message = $row['firstname']." ".$row['surname']." - ".$row['email'];
    #$row['email'] =  "schaeffer@cyclos-design.de";
    ################


    // Kontrolle
    if(!isset($_GET["sendNow"]))
    {
        $control_rows .= "<tr><td>".$count."</td> <td>".$row['id']."</td> <td><b>".$row['firstname']." ".$row['surname']."</b></td> <td>".$row['email']."</td> <td>".$row['password']."</td></tr>";
    }
 

    if(isset($_GET["sendNow"]))
    {
        
        $mail->setTo($row['email'], '')
             ->setMessage($message);

        $mail->setSubject($bastard_subject)
             ->setFrom('info@cyclos-design.de', 'cyclos design')
             ->addMailHeader('Reply-To', 'info@cyclos-design.de', 'cyclos design')
             ->addGenericHeader('X-Mailer', 'PHP/' . phpversion())
             #->addGenericHeader('Content-Type', 'text/html; charset="utf-8"')
             ->addGenericHeader('Content-Type', 'text/plain; charset="utf-8"')
             ->setWrap(78);

        $send = $mail->send();
        $mail->reset();
        
        /* 
        // Kontrolle - Liste der gesendeten Mails
        // Bedingung funktioniert nicht !??
        if($send)
        {
            #echo 'Email was sent successfully!';
            $success .= $count."_".$row['firstname']."|";
        }
        else
        {
            #echo 'An error occurred. We could not send email';
        }
        */
       
    }

    $count++;
    
} // while



// Kontrolle
if(!isset($_GET["sendNow"]))
{
    echo "<h1>".$action."</h1>";
    
    echo "<table width='100%' cellspacing='0'>";
    echo $control_rows;
    echo "</table>";
    
    echo "<hr />";
    echo "<b>".$bastard_subject."</b><br /><br />";
    echo str_replace("\n","<br />",$message)."<hr />";
}



if(isset($_GET["sendNow"]))
{
    header("Location: ".$_SERVER["PHP_SELF"]."?action=".$action);
    #header("Location: ".$_SERVER["PHP_SELF"]."?action=".$action."&success=".$success);
}

?>

<button onclick='mail1();' class='<?= $butt1 ?>'>Mail 1</button>
<button onclick='mail2();' class='<?= $butt2 ?>'>Mail 2</button>
<button onclick='sendNow();'>Jetzt senden</button>


<?php

/* 
// Kontrolle - Liste der gesendeten Mails
if($_GET["success"])
{
    echo "<hr />";

    $success = $_GET["success"];

    #echo $success."<br />";

    $successX = explode("|",$success);

    foreach($successX as $val)
    {
        echo str_replace("_"," ",$val)."<br />";
    }

}
 */

?>


<script>

function mail1() {
    document.location.href='<?= $_SERVER["PHP_SELF"] ?>?action=mail1';
}

function mail2() {
    document.location.href='<?= $_SERVER["PHP_SELF"] ?>?action=mail2';
}

function sendNow() {
    if(confirm('Mails jetzt senden?')) {
        document.location.href='<?= $_SERVER["PHP_SELF"] ?>?action=<?= $action ?>&sendNow';
    }
}

</script>

<style>

body {
    font-family:arial,sans-serif;
    font-size:14px;
    line-height:16px;
    padding:20px;
}

table {
    width:100%;
    margin:20px 0;
}

td {
    font-family:arial,sans-serif;
    font-size:14px;
    line-height:16px;
    padding:3px 0;
    border-top:solid #ccc 1px;
}

button {

    background:#fff;
}


button.active {
    background:orange;    
}

</style>