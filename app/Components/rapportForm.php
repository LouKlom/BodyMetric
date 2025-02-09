<div class="maincontenttitle">Nouvelle entrée</div>
        <div class="maincontent">

            <form id="formulaire" method="POST" action="functions/newEntree.php">
                <div class="form-group">
                    <label for="date">Date:</label>
                    <input required="required" type="date" id="start" name="date" value="<?php echo date("Y-m-d"); ?>" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="poids">Poids</label>
                    <input required="required" type="text" id="poids" name="poids" pattern="^\d+(\.\d{2})?$" title="Veuillez entrer un nombre avec deux chiffres après la virgule." class="form-control" />
                </div>

                <div class="form-group">
                    <label for="tailleJambes">Taille Jambe</label>
                    <input required="required" type="text" id="tJambes" name="tJambes" pattern="^\d+(\.\d{2})?$" title="Veuillez entrer un nombre avec deux chiffres après la virgule." class="form-control" />
                </div>

                <div class="form-group">
                    <label for="tailleBras">Taille Bras</label>
                    <input required="required" type="text" id="tBras" name="tBras" pattern="^\d+(\.\d{2})?$" title="Veuillez entrer un nombre avec deux chiffres après la virgule." class="form-control" />
                </div>

                <div class="form-group">
                    <label for="tailleFesses">Taille Fesses</label>
                    <input required="required" type="text" id="tFesses" name="tFesses" pattern="^\d+(\.\d{2})?$" title="Veuillez entrer un nombre avec deux chiffres après la virgule." class="form-control" />
                </div>

                <div class="form-group">
                    <label for="tailleVentre">Taille Ventre</label>
                    <input required="required" type="text" id="tVentre" name="tVentre" pattern="^\d+(\.\d{2})?$" title="Veuillez entrer un nombre avec deux chiffres après la virgule." class="form-control" />
                </div>

                <div class="form-group">
                    <label for="pourcGraisseux">Pourcentage masse graisseuse</label>
                    <input required="required" type="text" id="pGraisse" name="pGraisse" pattern="^\d+(\.\d{2})?$" title="Veuillez entrer un nombre avec deux chiffres après la virgule." class="form-control" />
                </div>

                <div class="form-group">
                    <label for="pourcMuscle">Pourcentage masse musculaire</label>
                    <input required="required" type="text" id="pMuscle" name="pMuscle" pattern="^\d+(\.\d{2})?$" title="Veuillez entrer un nombre avec deux chiffres après la virgule." class="form-control" />
                </div>

                <div class="form-group">
                    <input type="submit" value="Valider" name="Valider" class="btn btn-primary" />
                </div>
            </form>



        <script>
            const formulaire = document.getElementById('formulaire');

            formulaire.addEventListener('submit', function(event) {
                const champsAValider = ['poids', 'tJambes', 'tBras', 'tFesses', 'tVentre'];

                for (const idChamp of champsAValider) {
                    const inputChamp = document.getElementById(idChamp);
                    const valeur = inputChamp.value;

                    if (!/^\d+(\.\d{2})?$/.test(valeur) || (valeur !== "" && !/\.\d{2}$/.test(valeur))) {
                         alert("Veuillez entrer un nombre avec deux chiffres après la virgule dans le champ " + inputChamp.labels[0].textContent + ".");
                        event.preventDefault();
                        inputChamp.focus();
                        return false;
                    }
                }
            });
        </script>
        

        </div>