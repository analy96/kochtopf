<div id="inhalt-homeAnzeige" class="container-fluid">
     <?php if (empty($rezept)): ?>
		    <div class="dhd">
			    <h2 class="item title">Hoopla! Rezept nicht gefunden.</h2>
		    </div>
	    <?php else: ?>
        <div id="main-homeAnzeige" class="container">
                <div id="head-inhalt-homeAnzeige" class="container">
                    Titel: <?= $rezept[0]->titel;?> User:<?= $rezept[0]->benutzername;?>
                </div>
			    <div id="body-inhalt-homeAnzeige" class="container">
                    <?= $rezept[0]->rezept;?>
                </div>
                <div id="footer-inhalt-homeAnzeige" class="container">
                    <a href="/home" id="zurück-button-homeAnzeige" type="button" class="btn btn-success">Zurück</a>
                    <?= $rezept[0]->bewertung;?>
                    <a href="#popup" id="kommentieren-button-homeAnzeige" type="button" class="btn btn-success">Kommentieren</a>
                    <a href="#popup2" id="bewerten-button" type="button" class="btn btn-success">Bewerten</a>
                        <table>
                                <td>Kategorie: <?= $rezept[0]->kategorie;?></td>
                            </tr>
				        </table>
                    </div>
        </div>
        <div id="kommentar-inhalt-homeAnzeige">
                <?php foreach ($rezept as $kommentare): ?>
                    <p id="kommentar-text"><?=$kommentare->kommentar; ?></p>
                <?php endforeach ?>
        </div>
	<?php endif ?>
</div>
<div id="popup2" class="overlay">
    <div class="popup">
        <a class="close" href="#">&times;</a>
           <FORM ACTION="/home/bewerten" METHOD="post">
                    <p>Bewertung:<p>
                      <select class="form-control" id="bewertung">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </br>
                    </br>
                    <input type="text" value="<?php echo $_GET['id']?>">
                    <INPUT class="btn btn-success" TYPE="submit" VALUE="Bewerten">
                 </FORM>
    </div>
  </div>
<div id="popup" class="overlay">
  	<div class="popup">
    		<h2>Kommentieren:</h2>
		    <a class="close" href="#">&times;</a>
			     <FORM ACTION="/Home/kommentieren" METHOD="post">
                    <TEXTAREA name="text" COLS=40 ROWS=6 style="margin: 0px; height: 520px; width: 793px;">
                    </TEXTAREA>
                    <input type="hidden" name="id" value="<?= $rezept[0]->id;?>" />
                    <P><INPUT TYPE="submit" VALUE="submit">
                 </FORM>
	  </div>
