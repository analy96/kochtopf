<div id="inhalt" class="container-fluid">
     <?php if (empty($rezept)): ?>
		    <div class="dhd">
			    <h2 class="item title">Hoopla! Rezept nicht gefunden.</h2>
		    </div>
    <?php else: ?>
    <div id="rezeptAnzeigen" id="aussen-zelle" class="container">
        <div id="head-inhalt-homeAnzeige" class="container">
            Titel: <?= $rezept[0]->titel;?> User:<?= $rezept[0]->benutzername;?>
        </div>
        <div id="body-inhalt-homeAnzeige" class="container">
            <?= $rezept[0]->rezept;?>
        </div>
            <a id="auswahl-button" href="/home" id="zurück-button-homeAnzeige" type="button" class="btn btn-success">Zurück</a>
            <?= $rezept[0]->bewertung;?>
            <a id="auswahl-button" href="#popup" id="kommentieren-button-homeAnzeige" type="button" class="btn btn-success">Kommentieren</a>
            <a id="auswahl-button" href="#popup2" id="bewerten-button" type="button" class="btn btn-success">Bewerten</a>
            <table id="auswahl-button">
                    <td>Kategorie: <?= $rezept[0]->kategorie;?></td>
                </tr>
            </table>
            <div id="kommentar-inhalt-homeAnzeige" class="container">
                <?php foreach ($rezept as $kommentare): ?>
                    <p id="kommentar-text"><?=$kommentare->kommentar; ?></p>
                <?php endforeach ?>
        </div>
	<?php endif ?>
</div>
<div id="popup2" class="overlay">
    <div class="popup" style="width: 200px; height: 200px;">
        <a class="close" href="#">&times;</a>
           <FORM ACTION="/home/bewerten" METHOD="post">
                    <p>Bewertung:<p>
                      <select name="bewertung" class="form-control" id="bewertung" style="width: 75px;">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </br>
                    </br>
                    <input name="id" type="text" hidden="hidden" value="<?php echo $_GET['id']?>">
                    <INPUT class="btn btn-success" TYPE="submit" VALUE="Bewerten">
                 </FORM>
    </div>
  </div>
<div id="popup" class="overlay">
  	<div class="popup" >
    		<h2>Kommentieren:</h2>
		    <a class="close" href="#">&times;</a>
			     <FORM ACTION="/Home/kommentieren" METHOD="post">
                    <TEXTAREA name="text" COLS=40 ROWS=6 style="margin: 0px; height: 520px; width: 793px;">
                    </TEXTAREA>
                    <input type="hidden" name="id" value="<?= $rezept[0]->id;?>" />
                    <P><INPUT TYPE="submit" VALUE="Kommentieren" class="btn btn-success">
                 </FORM>
	  </div>
