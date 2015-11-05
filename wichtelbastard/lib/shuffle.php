<?php  include('../conf.php');
    include($documentRoot.'tpl/header.php');?>
<pre style="line-height:1em;">
<?

 $result = mysql_query("SELECT id, firstname, surname, nonConterId  FROM `attendants`") or trigger_error(mysql_error());
$i = 0;
while($row = mysql_fetch_array($result)){
    $array[$i]['id'] = $row['id'];
    $array[$i]['nonConterId'] = $row['nonConterId'];
    $i++;
};
//print_r($array);
/*
$array = array(
    "0" => array(   "id" => 1,
                    "firstname" => "Daniel",
                    "surname" => "Uphaus",
                    "nonConterId" => "0"
                ),
    "1" => array(   "id" => 2,
                    "firstname" => "Carsten",
                    "surname" => "Dütschke",
                    "nonConterId" => "6,29"
                ),
    "2" => array(   "id" => 3,
                    "firstname" => "Christina",
                    "surname" => "Helmer",
                    "nonConterId" => "0"
                ),
    "3" => array(   "id" => 4,
                    "firstname" => "Christian",
                    "surname" => "Jüttner",
                    "nonConterId" => "0"
                ),
    "4" => array(   "id" => 5,
                    "firstname" => "Markus",
                    "surname" => "Schmitz",
                    "nonConterId" => "0"
                ),
    "5" => array(   "id" => 6,
                    "firstname" => "Frank",
                    "surname" => "Seepe",
                    "nonConterId" => "0"
                ),
    "6" => array(   "id" => 7,
                    "firstname" => "Thorsten",
                    "surname" => "Schechowitz",
                    "nonConterId" => "0"
                ),
    "7" => array(   "id" => 8,
                    "firstname" => "Julia",
                    "surname" => "Roß",
                    "nonConterId" => "0"
                ),
    "8" => array(   "id" => 9,
                    "firstname" => "Bettina",
                    "surname" => "Höpfner",
                    "nonConterId" => "0"
                ),
    "9" => array(   "id" => 10,
                    "firstname" => "Katharina",
                    "surname" => "Pahl",
                    "nonConterId" => "0"
                ),
    "10" => array(   "id" => 11,
                    "firstname" => "Jan-Lukas",
                    "surname" => "Beyer",
                    "nonConterId" => "0"
                ),
    "11" => array(   "id" => 12,
                    "firstname" => "Vanessa",
                    "surname" => "Knein",
                    "nonConterId" => "0"
                ),
    "12" => array(   "id" => 13,
                    "firstname" => "Christina",
                    "surname" => "Ernst",
                    "nonConterId" => "0"
                ),
    "13" => array(   "id" => 14,
                    "firstname" => "Christina",
                    "surname" => "Dilger",
                    "nonConterId" => "0"
                ),
    "14" => array(   "id" => 15,
                    "firstname" => "Gerrit",
                    "surname" => "Göcking",
                    "nonConterId" => "6,29"
                ),
    "15" => array(   "id" => 16,
                    "firstname" => "Marc",
                    "surname" => "Beckersjürgen",
                    "nonConterId" => "6,29"
                ),
    "16" => array(   "id" => 17,
                    "firstname" => "Florian",
                    "surname" => "Hauling",
                    "nonConterId" => "0"
                ),
    "17" => array(   "id" => 18,
                    "firstname" => "Thomas",
                    "surname" => "Kendziora",
                    "nonConterId" => "0"
                ),
    "18" => array(   "id" => 19,
                    "firstname" => "Martin",
                    "surname" => "Wöstemeyer",
                    "nonConterId" => "0"
                ),
    "19" => array(   "id" => 20,
                    "firstname" => "Bruno",
                    "surname" => "Costa",
                    "nonConterId" => "0"
                ),
    "20" => array(   "id" => 21,
                    "firstname" => "Marco",
                    "surname" => "Malcangi",
                    "nonConterId" => "0"
                ),
    "21" => array(   "id" => 22,
                    "firstname" => "Jaqueline",
                    "surname" => "Schuka",
                    "nonConterId" => "0"
                ),
    "22" => array(   "id" => 23,
                    "firstname" => "Youngju",
                    "surname" => "Köhler",
                    "nonConterId" => "0"
                ),
    "23" => array(   "id" => 24,
                    "firstname" => "Klaus",
                    "surname" => "Schäffer",
                    "nonConterId" => "0"
                ),
    "24" => array(   "id" => 25,
                    "firstname" => "Ulrich",
                    "surname" => "Beckonert",
                    "nonConterId" => "6,29"
                ),
    "25" => array(   "id" => 26,
                    "firstname" => "Denis",
                    "surname" => "Bikmaz",
                    "nonConterId" => "0"
                ),
    "26" => array(   "id" => 27,
                    "firstname" => "Henning",
                    "surname" => "Labuch",
                    "nonConterId" => "0"
                ),
    "27" => array(   "id" => 28,
                    "firstname" => "Julian",
                    "surname" => "Ahlers",
                    "nonConterId" => "0"
                ),
    "28" => array(   "id" => 29,
                    "firstname" => "Jutta",
                    "surname" => "Schnieders",
                    "nonConterId" => "0"
                ),
    "29" => array(   "id" => 30,
                    "firstname" => "Cara",
                    "surname" => "Wicher",
                    "nonConterId" => "0"
                ),
    "30" => array(   "id" => 31,
                    "firstname" => "Peter",
                    "surname" => "Gerlach",
                    "nonConterId" => "0"
                ),
    "31" => array(   "id" => 32,
                    "firstname" => "Stephan",
                    "surname" => "Braun",
                    "nonConterId" => "0"
                ),
    "32" => array(   "id" => 33,
                    "firstname" => "Eske",
                    "surname" => "Lübbers",
                    "nonConterId" => "0"
                )
);
*/

startShuffleStuff($array);

function so ($a, $b) { 
    return (strcmp ($a['nonConterId'],$b['nonConterId']));    
};

function startShuffleStuff($array){
//shuffle($array);
    uasort($array, 'so');

    $array = array_reverse($array);
    /*echo "<pre style='background:lightblue;padding:20px;'>";
    print_r($array);
    echo "</pre>";
    */
    $clone = $array;
    //shuffle($array);
    shuffle($clone);
    //print_r($clone);



    $i = 0;
    foreach($clone as $k => $v)
    {

        foreach($v as $ids => $val)
        {
           // echo "$ids : $val <br />";
            if($ids == 'id')
            {

                $nonConterArr = explode(',',$array[$i]['nonConterId']);
               // print_r($nonConterArr) ;
                if(!in_array($val,$nonConterArr) && !isset($array[$i]['opferId']) && $val != $array[$i]['id'])
                {
                   // echo "***".$val.",";
                    $array[$i]['opferId'] = $val;
                    //raus aus Clone
                    $i++;
                    unset($clone[$k]);
                }
                else
                {
                    //break;
                    //$array[$i]['opferId'] =  "conter passt nicht";
                }

            }

        }

    }   
    reshuffleStuff($array, $clone);
}


function reshuffleStuff($array, $clone, $debug = false){

    //Neuaufbau des Clone-Index
    $clone = array_values($clone);
    
    $end = false;
    
    //Ctr für gesetzt OpferIds
    $z = 0;
    //Anzhal Elemente in Array
    $ct = count($array);
    echo "<pre class='right1'><h2>Variablen</h2>Zähler ct: ".$ct."<br><br></pre>";
    do {
        // Anzahl der Elemente in Clone
        $cc = count($clone);
        
        $clone = array_values($clone);
      //  $clone = shuffle($clone);
        //Ctr für schleife
        $i = 0;
         //Ctr für neu zu setzende OpferIds
        $n = 0;   
        foreach($array as $k => $v)
        {

            if(isset($v['opferId'])) {

             //   echo "Key:".$k.", Value:".$v['opferId'].", i=".$i.", z=".$z.", n=".$n."<br />";

            }
            else
            {

            //    echo "Key:".$k.", i=".$i.", z=".$z.", n=".$n."<br />";
                if(isset($v['nonConterId']) && $v['nonConterId'] != '0')
                {
                    $nonConterArr = explode(',',$v['nonConterId']);
                  //  echo "<div style='color:green'>$nonConterArr[0]</div>";
                }
                if($clone[$n]['id'] != $v['id'] && (!isset($nonConterArr) || !in_array($clone[$n]['id'],$nonConterArr)))
                {
                    $array[$i]['opferId'] = $clone[$n]['id'];
                    echo "<pre class='left'><h2>Variablen2</h2><div class='content$z'>$i / $n <br></div></pre>";
                    unset($clone[$n]);
                    $n++;
                }




            }
           if($i < $ct-1)
           {
               $i++;
           }
           
        }
        $z++;
        if($debug == true)
        {
            echo "<pre class='right2'><h2>Variablen2</h2><div class='content$z'>Zähler z: ".$z." <br />Count clone: ".$cc."<br>";
            if($cc != 0) {
                echo $cc." != 0 // true = schleife läuft weiter<br>
                   i: $i // n: $n //<br></div></pre>";
            }
            else {
                echo $cc." != 0 // false = abbruch<br><br></div></pre>";
            }           
        }

        
        if($z >= $ct){
            
            echo "wir haben ein Problem";
            if($z == 20)
            {
                $end = true;
            }
        }
        


    }while(($cc != 0 && $end = false) || $end = false );

    if($debug == true)
    {

            echo "<pre class='right3'><h2>Ausgangs-Array (nach Zuteilung)</h2>";
            print_r($array);
            echo "</pre>";

            echo "<pre class='right4' style='color:red;'><h2>Rest-Array:Clone</h2>";

            print_r($clone);
            print_r(count($clone));
            echo "</pre>";


            echo "
            </pre>
            <style>
            .right1,.right2,.right3,.right4 {
                width:20%;
                position:absolute;
                right:0%;
                height:100%;
                overflow:auto;
                margin:0px;
                margin-bottom:200px;
                display:block;
            }
                .right1 {
                    top:0px;
                }
                .right2 {
                    right:0%;
                    top:100px;
                }
                .right2 .content1 {
                    margin-top:0px;
                }
                .right2 .content2 {
                    margin-top:60px;
                }
                .right2 .content3 {
                    margin-top:120px;
                }.right2 .content4 {
                    margin-top:180px;
                }.right2 .content5 {
                    margin-top:240px;
                }.right2 .content6 {
                    margin-top:300px;
                }.right2 .content7 {
                    margin-top:360px;
                }.right2 .content8 {
                    margin-top:420px;
                }
                .right2 .content9 {
                    margin-top:480px;
                }
                .right2 .content10 {
                    margin-top:540px;
                }
                .right3 {
                    right:25%;
                    top:300px;
                    padding-left:20px;
                    border-left:5px solid #000;
                }
                .right4 {
                    right:25%;
                    top:0px;
                    height:300px;
                    padding-left:20px;
                    border-left:5px solid #000;
                }
            </style>";
        
        
        
        
        
    }
    //print_r($array);
    foreach($array as $attendant)
    {
         $result = mysql_query("UPDATE `attendants` SET conterId = ".$attendant['opferId']." WHERE id = ".$attendant['id']) or trigger_error(mysql_error());
        echo $attendant['id']." ".$attendant['opferId']."<br/>";
    }
    
}




