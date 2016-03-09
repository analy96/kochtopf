<div id="inhalt-homeAnzeige" class="container-fluid">
     <?php if (empty($rezeptAnzeigen=$rezept[0])): ?>
		    <div class="dhd">
			    <h2 class="item title">Hoopla! Rezept nicht gefunden.</h2>
		    </div>
	    <?php else: ?>
                <div id="head-inhalt-homeAnzeige" class="container">
                    <?= $rezeptAnzeigen->titel;?> <?= $benutzerAnzeigen->benutzername;?>
                </div>
			    <div id="body-inhalt-homeAnzeige" class="container">
                    <?= $rezeptAnzeigen->beschreibung;?>
                </div>
                <div id="footer-inhalt-homeAnzeige" class="container">
                    <a href="/home" id="zurück-button-homeAnzeige" type="button" class="btn btn-success">Zurück</a>
                    
                    <a href="" id="kommentieren-button-homeAnzeige" type="button" class="btn btn-success">Kommentieren</a>
                </div>
                        <table>
                            <tr>
                                <td><?= $rezeptAnzeigen->titel;?></td>
                            </tr>
                            <tr>
                                <td><?= $rezeptAnzeigen->beschreibung;?></td> 
                            </tr>
				        </table>
	<?php endif ?>
                        
</div>