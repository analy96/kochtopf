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
                    <a href="javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'"
                        id="kommentieren-button-homeAnzeige" type="button" class="btn btn-success">Kommentieren</a>
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
<div data-role="popup" id="myPopup" class="ui-content">
      <h3>Welcome!</h3>
      <p>The "ui-content" class is especially useful when you have a popup with <span style="font-size:55px;">styled text</span>, and want the edges and corners to look extra clean and sleek. <strong>Note:</strong> The text will wrap to multiple lines if needed.</p>
    </div>
  </div>
  <body>
   <div id="light" class="white_content">This is the lightbox content. <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a></div>
    <div id="fade" class="black_overlay"></div>
</body>