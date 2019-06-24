<?php

//HEM DEĞİŞTİRİRLEN HEM SİLERKEN AYNI DEĞİŞKENİ KULLAN NO DEĞİŞJENİNİ SNO VE GNO YAPMA TEK BİR NO KULLAN ZATEN ARTIK İS YAPTIRDIĞIN İÇİN TEK BİR NO KULLANMAN YETERLİ OLUCAK

  switch (@ $_GET['is']) {
    case 'ekle':  ekle() ; css(); ResultSet(null,null,null,null,'ono');
      break;

      case 'ara' : css(); ResultSet($_GET['noara'],$_GET['adara'],$_GET['soyadara'],@ $_GET['sıra'],'ono'); break;
      case 'sıralı' : echo "sıralı calıstı"; css() ; ResultSet(null,null,null,$_GET['sıra'],$_GET['sutun']); break;
      case 'degistir' :css(); update($_GET['no']); ResultSet(null,null,null,null,'ono'); break;
      case 'sil' : sil($_GET['no']) ; css() ; ResultSet(null,null,null,null,'ono'); break;
    default:  css();

      ResultSet(null,null,null,null,'ono');
      // code...
      break;
  }
exit;

function css(){
  ?>
  <html>
  	<head>
  		<title>Projem</title>
  			<style>

  				body{
  					background-color:#2c2c54;
  				}
  				.t1{
  					width:50%;
  					height:40%;
  					background-color:#474787;
  					border: 5px solid black;
  				}
  				.tk{
  					width:50%;
  					height:40%;
  					background-color:#40407a;
  					border: 5px solid black;
  					float:left;
  				}
  				th{
  					border:3px groove black;
  					width:190px;
  					color:#aaa69d;
  				}
  				td{
  					border:3px groove black;
  					width:190px;
  					color:#d1ccc0;
  				}
  				td:hover{
  					color:#aaa69d;
  				}
  				.i1{

  					width:100%;
  					background-color:#A8B2CA;
  				}
  				.s1{
  					width:100%;
  					background-color:#AFBDDE;
  				}
  				.s1:hover{
  					color:blue;
  				}
  				.a1{
  					color:#34ace0;
  					text-decoration:none;
  					padding:1px;
  				}
  				.a1:visited{
  					color:#34ace0;
  				}
  				.a1:hover{
  					color:#C8D2EA;
  				}
  				a{
  					padding:20px;
  					text-decoration:none;
  					color:#25CCF7;
  				}
  				a:hover{
  					color:white;
  				}

  				.stable{
  					width:49%;
  					height:50%;
  					background-color:#40407a;
  					border: 5px solid black;
  					float:right;
  				}
  				.itable{
  					width:25%;
  					height:8%;
  					background-color:#40407a;
  					border: 5px solid black;
  					position: absolute;;
            left:50%;
  				}
  				.linkler{
            position: absolute;
            top:85%;
            left:0%;
  					padding:20px;
  					float:left;

  				}
          .hh{
            top:40%;
            left:40%;
          }


  			</style>
  	<body>
    </body>
    </html>

<?php
}

function ResultSet($number,$name,$surname,$sort,$sutun){


        //@ $sort=$_GET['sıra'];
        echo $sort;
        $asc1; $desc1;

        $sil; $degistir;
      /*  $number=null;
        $name=null;
        $surname=null;*/

        /*if(@ $_GET['is'] == 'ara' ){
        @$number=$_GET['noara'];
        @$name=$_GET['adara'];
        @$surname=$_GET['soyadara'];
      }*/



            //Linkden çekilen veriye göre liste sıralaması
        /*if(isset($_GET['asc'])){

            $sort='ASC';}
              else if(isset($_GET['desc'])){
                  $sort='DESC';
                }
                  else{
                      $sort='ASC';
                    }*/


                    ?>
                      <table class="t1">
    <tr>
      <th > <a class='a1' href = 'p3.php?is=sıralı&sutun=ono&sıra=ASC '><img src="asc.png" style="width:40px; height:30px" > </a>  NO  <a class='a1' href = 'p3.php?is=sıralı&sutun=ono&sıra=DESC '><img src="desc.png" style="width:40px; height:30px" > </a> </th>
      <th > <a class='a1' href = 'p3.php?is=sıralı&sutun=ad&sıra=ASC '><img src="asc.png" style="width:40px; height:30px" > </a> AD  <a class='a1' href = 'p3.php?is=sıralı&sutun=ad&sıra=DESC '><img src="desc.png" style="width:40px; height:30px" > </a> </th>
      <th > <a class='a1' href = 'p3.php?is=sıralı&sutun=soyadi&sıra=ASC '><img src="asc.png" style="width:40px; height:30px" > </a> SOYAD  <a class='a1' href = 'p3.php?is=sıralı&sutun=soyadi&sıra=DESC '><img src="desc.png" style="width:40px; height:30px" > </a> </th>
      <th > </th>
      <th >Bildirim Yeri </th>
    </tr>

    <tr>
      <form class=""   method="get" >
        <td> <input class='i1' type=text name=ono ></td>
        <td><input class='i1' type=text name=ad ></td>
        <td><input class='i1' type=text name=soyad></td>
        <td><input class="s1" type="submit" name="add" value="EKLE" </td>
        <td> </td>    <!--Buraya eklendi eklenemedi uyarsını yazdırıcaksın !!ÖNEMLİ  -->
        <input name='is' type="hidden" value='ekle' >

      </form>
    </tr>

  <tr> <form method="get">
  <td><input class='i1' type=text name=noara value="<?php echo isset($_GET['noara']) ? $_GET['noara'] : '' ?>"> </td>
  <td><input class='i1' type=text name=adara value="<?php echo isset($_GET['adara']) ? $_GET['adara'] : '' ?>"> </td>
  <td><input class='i1' type=text name=soyadara value="<?php echo isset($_GET['soyadara']) ? $_GET['soyadara'] : '' ?>"> </td>
  <td><input class='s1' type=submit name=search value=ARA.. ></td>
  <td><input class='s1' type=button name=clear value=TEMİZLE onclick="window.location.href='http://localhost/proje/p3.php'"> </td>
  <input name='is' type="hidden" value="ara" >

  </form>
  </tr>
  </table>

  <?php

  $conn= mysqli_connect('localhost' , 'root' ,'', 'proje');

  $sql="SELECT count(*) FROM kisiler WHERE ono like '{$number}%' and ad like '{$name}%' and soyadi like '{$surname}%' ";		//satır sayısısını COUNT sorgusuyla hesapla //BUNU ARAMA İÇİN ÖZEL OLARAK AYARLA ARAMA YAPILAN (LİKE İLE) VERİYE GÖRE SAYFA ÇIKARSIN
  $sqlsonuc=mysqli_query($conn,$sql);
  $row=mysqli_fetch_row($sqlsonuc);
  $numrows = $row[0];			//kaç satır olduğunu hesapla


  $rowperpage=5;
  $totalpage= ceil($numrows / $rowperpage); //sayfa sayısı hesapla

    //mevcut sayfa numarasını al ya da 1 den başlat (sayfa açıldığında default olarak 1 den başlıcak)
  if(isset($_GET['currentpage']) && is_numeric($_GET['currentpage']) ){
    $currentpage = (int) $_GET['currentpage'];

  }
      else {
        $currentpage=1;
        }

    //mevcut sayfa sayfa sayısından büyük ise son sayfaya eşitle
  if($currentpage > $totalpage){

    $currentpage = $totalpage;
  }
    //mevcut sayfa 1 den küçük ise ilk sayfaya eşitle
  if($currentpage <1 ){

    $currentpage = 1;
  }
   //offset i mevcut sayfaya göre ayarla
  $offset = ($currentpage - 1) * $rowperpage;  //Örneğin mevcut sayfa 1 ise diziden 0 dan başlayıp rowperpage kadar(5 tane ) eleman getiricek







  $statement = "kisiler WHERE ono like '{$number}%' and ad like '{$name}%' and soyadi like '{$surname}%' order by {$sutun} {$sort}	";  // sorgu kısmı (sort değişkeni ayrı olarak alınıyor ve değiştiriliyor)

  $records = mysqli_query($conn, "SELECT * FROM {$statement}  LIMIT {$offset} , {$rowperpage};");


  echo "
  <table class='tk' >";
  while($rec = mysqli_fetch_array($records) ){
  echo"
  <tr width=1000px>
  <td width=250px>", $rec[0] ,"</td>

  <td width=250px>", $rec[1] ,"</td>
  <td width=250px>", $rec[2] ,"</td> ";?>
  <td> <a class='a1' href=	'p3.php?is=sil&no=<?php echo "$rec[0]" ;?> '>	Sil		</a>		</td> <?php // bu linkler url den çekilip fonksiyonlar çalıştırılıyor ?>
  <td> <a class='a1' href=	'p3.php?is=degistir&no=<?php echo "$rec[0]" ;?> '>	Değiştir		</a> </td>
  </tr>

  <?php
  }
  echo " </table> ";


  //---SAYFALAMA LİNKLERİ//
if(!$number== null || !$name == null || !$surname == null & $sort == null){




  ?>


  <div class='linkler' style="display:block;"> <?php

  $range = 3; //ne kadar uzaktaki sayfayı göstereceği

    if($currentpage > 1){

    echo "<a href = 'p3.php?noara={$number}&adara={$name}&soyadara={$surname}&search=ARA..&is=ara&currentpage=1' > <<< </a>  "; //ilk sayfaya gitme linki

    $prevpage = $currentpage - 1;

    echo "<a href = 'p3.php?noara={$number}&adara={$name}&soyadara={$surname}&search=ARA..&is=ara&currentpage=$prevpage ' > << </a> " ;//bir önceki sayfa linki
  }

    for($x = ($currentpage - $range ) ; $x < ($currentpage + $range ) +1 ; $x++   ){ //mevcut sayfanın ilerisi ve gerisindeki sayfaların gösterilmesini sağlıyan algoritma

      if(($x > 0) && ($x <= $totalpage) ){

        if($x == $currentpage){

          echo " [<b> $x </b>] " ;  // eğer mevcut sayfa örn 3 ise sayfa 3 linki tıklanamıycak
        }
        else{

          echo "<a href= 'p3.php?noara={$number}&adara={$name}&soyadara={$surname}&search=ARA..&is=ara&currentpage=$x '> $x </a> ";
        }
      }

    }

    if($currentpage != $totalpage){

      $nextpage = $currentpage + 1;
      echo "<a href = '  p3.php?noara={$number}&adara={$name}&soyadara={$surname}&search=ARA..&is=ara&currentpage=$nextpage ' > >> </a>	" ;

      echo "<a href = ' p3.php?noara={$number}&adara={$name}&soyadara={$surname}&search=ARA..&is=ara&currentpage=$totalpage' > >>> 	</a> ";
    }
  ?>
  </div>
  <?php
}




  else if($number== null & $name == null & $surname == null & !$sort == null){

    ?>


    <div class='linkler'> <?php

    $range = 3; //ne kadar uzaktaki sayfayı göstereceği

      if($currentpage > 1){

      echo "<a href = 'p3.php?is=sıralı&sutun={$sutun}&sıra={$sort}&currentpage=1' > <<< </a>  "; //ilk sayfaya gitme linki

      $prevpage = $currentpage - 1;

      echo "<a href = 'p3.php?is=sıralı&sutun={$sutun}&sıra={$sort}&currentpage=$prevpage ' > << </a> " ;//bir önceki sayfa linki
    }

      for($x = ($currentpage - $range ) ; $x < ($currentpage + $range ) +1 ; $x++   ){ //mevcut sayfanın ilerisi ve gerisindeki sayfaların gösterilmesini sağlıyan algoritma

        if(($x > 0) && ($x <= $totalpage) ){

          if($x == $currentpage){

            echo " [<b> $x </b>] " ;  // eğer mevcut sayfa örn 3 ise sayfa 3 linki tıklanamıycak
          }
          else{

            echo "<a href= 'p3.php?is=sıralı&sutun={$sutun}&sıra={$sort}&currentpage=$x '> $x </a> ";
          }
        }

      }

      if($currentpage != $totalpage){

        $nextpage = $currentpage + 1;
        echo "<a href = '  p3.php?is=sıralı&sutun={$sutun}&sıra={$sort}&currentpage=$nextpage ' > >> </a>	" ;

        echo "<a href = ' p3.php?is=sıralı&sutun={$sutun}&sıra={$sort}&currentpage=$totalpage' > >>> 	</a> ";
      }



    ?>
    </div>
    <?php



  }

  else{


?>
    <div class='linkler'> <?php

    $range = 3; //ne kadar uzaktaki sayfayı göstereceği

      if($currentpage > 1){

      echo "<a href = 'p3.php?currentpage=1' > <<< </a>  "; //ilk sayfaya gitme linki

      $prevpage = $currentpage - 1;

      echo "<a href = '{$_SERVER['PHP_SELF']}?currentpage=$prevpage ' > << </a> " ;//bir önceki sayfa linki
    }

      for($x = ($currentpage - $range ) ; $x < ($currentpage + $range ) +1 ; $x++   ){ //mevcut sayfanın ilerisi ve gerisindeki sayfaların gösterilmesini sağlıyan algoritma

        if(($x > 0) && ($x <= $totalpage) ){

          if($x == $currentpage){

            echo " [<b> $x </b>] " ;  // eğer mevcut sayfa örn 3 ise sayfa 3 linki tıklanamıycak
          }
          else{

            echo "<a href= '{$_SERVER['PHP_SELF']}?currentpage=$x '> $x </a> ";
          }
        }

      }

      if($currentpage != $totalpage){

        $nextpage = $currentpage + 1;
        echo "<a href = '  p3.php?currentpage=$nextpage ' > >> </a>	" ;

        echo "<a href = ' p3.php?currentpage=$totalpage' > >>> 	</a> ";
      }



    ?>
    </div>
    <?php



  }//else sonu


  mysqli_close($conn);

}

  function ekle(){

    $conn= mysqli_connect('localhost' , 'root' ,'', 'proje');
    $no=$_GET['ono'];
    $name=$_GET['ad'];
    $surname=$_GET['soyad'];
    $ekle= "INSERT INTO kisiler(ono,ad,soyadi) VALUES('$no','$name','$surname')";

      if(!mysqli_query($conn,$ekle)){
        ?> <h3 style="position: absolute; top:20%; left:42%;"   >Eklenemedi  </h3> <?php
      }
          else{
          ?>  <h3 style="position: absolute; top:20%; left:42%;"    >Eklendi  </h3> <?php
        }



  }

function sil($col1){

  $conn = mysqli_connect('localhost' , 'root' , '', 'proje');
  $sql = "DELETE FROM kisiler WHERE ono= {$col1} ";  //get ile url den alınan ono ya göre silme işlemi yapılıyor
  $sil = mysqli_query($conn, $sql);
    if(!mysqli_query($conn,$sil)){
      ?> <h3 style="position: absolute; top:20%; left:42%;"   >Silindi  </h3> <?php
    }
          else{
          ?> <h3 style="position: absolute; top:20%; left:42%;"   >Silinemedi  </h3> <?php
        }
  mysqli_close($conn);



}
function update($col2){

  ?>
  <table class="itable">
    <tr>
      <th colspan="4"> Değiştirme Formu </th>

    </tr>
  <form method="post" >
  <tr>

    <td> <input class='i1' type='text' name='n1' placeholder="Numara giriniz" > </td>
    <td> <input class='i1' type='text' name='a1' placeholder="İsim Giriniz" > </td>
    <td> <input class='i1' type='text' name='s1' placeholder="Soyisim giriniz" > </td>
    <td> <input class='s1' type='submit' name='chg' value='DEĞİŞTİR' > </td>


  </tr>
  </form>
  </table>
    <?php

    if(isset($_POST['chg']))
          update2($col2); ?>
  <?php


}
function update2($col3)
{

      $n1=$_POST['n1'];
      $a1=$_POST['a1'];
      $s1=$_POST['s1'];
      $conn = mysqli_connect('localhost','root','','proje');


      $guncelle = "UPDATE kisiler SET ono = '$n1' , ad = '$a1' , soyadi = '$s1' WHERE ono = {$col3}  ";

      $result=mysqli_query($conn , $guncelle );
      if(!mysqli_query($conn,$result)){
        ?> <h3 style="position: absolute; top:20%; left:42%;"   >Değiştirildi  </h3> <?php
      }
            else{
            ?> <h3 style="position: absolute; top:20%; left:42%;"   >Değiştirilemedi </h3> <?php
          }

      mysqli_close($conn);


}

 ?>
