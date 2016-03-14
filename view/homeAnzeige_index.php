<div id="inhalt-homeAnzeige" class="container-fluid">
     <?php if (empty($rezept)): ?>
		    <div class="dhd">
			    <h2 class="item title">Hoopla! Rezept nicht gefunden.</h2>
		    </div>
	    <?php else: ?>
        <div id="main-homeAnzeige" class="container">
                <div id="head-inhalt-homeAnzeige" class="container">
                    <?= $rezept[0]->titel;?> <?= $rezept[0]->benutzername;?>
                </div>
			    <div id="body-inhalt-homeAnzeige" class="container">
                    <?= $rezept[0]->rezept;?>
                </div>
                <div id="footer-inhalt-homeAnzeige" class="container">
                    <a href="/home" id="zurück-button-homeAnzeige" type="button" class="btn btn-success">Zurück</a>                  
                    <a href="" id="speichern-button-homeAnzeige" type="button" class="btn btn-success">Speichern</a>
                    <a href="" id="löschen-button-homeAnzeige" type="button" class="btn btn-success">Zurück</a>                  
                    <?= $rezept[0]->bewertung;?>
                    <a href="#popup" id="kommentieren-button-homeAnzeige" type="button" class="btn btn-success">Kommentieren</a>
                        <table>
                            <tr>
                                <td><?= $rezept[0]->titel;?></td>
                            </tr>
                            <tr>
                                <td><?= $rezept[0]->kategorie;?></td> 
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
<div id="popup" class="overlay">
  	<div class="popup">
    		<h2>Kommentieren:</h2>
		    <a class="close" href="#">&times;</a>
			     <FORM ACTION="/Home/kommentieren" METHOD="post">
                    <TEXTAREA name="text" COLS=40 ROWS=6>
                    </TEXTAREA>
                    <input type="hidden" name="id" value="<?= $rezept[0]->id;?>" />
                    <P><INPUT TYPE="submit" VALUE="submit">
                 </FORM>
	  </div>
</div>