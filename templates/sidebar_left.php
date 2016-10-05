
    <div class="col-md-3">
        <div class="sidebar-nav affix">
            <div class="well">
                <ul class="nav ">
                    <li class="nav-header">Navigation</li>
                        
                        <?php 
                        $Kategorie = Kategorie::getAllKategorien();
                        foreach ($Kategorie as $x){ ?>
                        <li><a href="index.php?action=meals&amp;aktuellkategorieid=<?php echo $x[0]?>"><?php echo $x[1]?></a></li>   
                            
                        <?php } ?>                         
                         
                        
                        
                </ul>
            </div>  
        </div>
    </div>
