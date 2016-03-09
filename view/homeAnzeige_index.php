<div id="inhalt" class="container-fluid">
     <?php if (empty($rezeptAnzeigen=$rezept[0])): ?>
		    <div class="dhd">
			    <h2 class="item title">Hoopla! Rezept nicht gefunden.</h2>
		    </div>
	    <?php else: ?>
                <div id="aussen-zelle" class="container">
			        <div id="innere-zelle" class="container">
                        <table>
                            <tr>
                                <td><?= $rezeptAnzeigen->titel;?></td>
                            </tr>
                            <tr>
                                <td><?= $rezeptAnzeigen->beschreibung;?></td> 
                            </tr>
				        </table>
                    </div>  
                </div>
	<?php endif ?>
                        
</div>