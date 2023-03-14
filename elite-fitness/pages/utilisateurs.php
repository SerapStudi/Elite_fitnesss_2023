<?php
session_start();
$page = 'partenaires';
include '../lib/config.php';
include '_partials/header.php';
include '_partials/navbar.php';
?>


<div class="container">
    <h1 class="card-text mt-4 mb-3">Les utilisateurs</h1>
</div>
         
   
<div class="row mt-4">
            <div class="col-12 col-md-6 mb-4 ms-1">
                <input type="text" class="form-control" placeholder="Rechercher les utilisateurs" aria-label="Search cards"
                    onkeyup="searchFilter()">
    
            </div>
        </div>    


        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col-6">
                <div class="card h-100">
                    <img src="../assets/img/img/17.png" class="card-img-top mt-4"
                        style="width:100% ; height:15vw ; object-fit:scale-down;" alt="...">
                    <div class="card-body  d-flex flex-column">
                    <span><h4 class="mt-3 ms-3 structure">Partenaire : Elite Fitness Paris</h4> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Nom : Monsieur Laurent NOVIAL</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Date du contrat : 12/02/2000</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Email : elite.fitness.paris@gmail.com</h5> </span> 
                    <div class="form-check form-switch ps-0 mt-3 ms-3 mb-3">
                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" checked>Actif
                  </div>
                   </div>
</div>
        </div> 
        


            <div class="col-6">
                <div class="card h-100">
                    <img src="../assets/img/img/3.png" class="card-img-top mt-4"
                        style="width:100% ; height:15vw ; object-fit:scale-down;" alt="...">
                    <div class="card-body  d-flex flex-column">
                    <span><h4 class="mt-3 ms-3 structure">Structure : Elite Fitness Paris</h4> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Nom : Madame Eliane CHEVALIER</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Date du contrat : 12/02/2000</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Email : structure_paris@gmail.com</h5> </span> 
                    <div class="form-check form-switch ps-0 mt-3 ms-3 mb-3">
                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" checked>Actif
                  </div>
                   </div>
                </div>
</div>

        <div class="col-6">
                <div class="card h-100">
                    <img src="../assets/img/img/7.png" class="card-img-top mt-4"
                        style="width:100% ; height:15vw ; object-fit:scale-down;" alt="...">
                    <div class="card-body  d-flex flex-column">
                    <span><h4 class="mt-3 ms-3 structure">Partenaire : Elite Fitness Ablis</h4> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Nom : Monsieur Yvan ROCHE</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Date du contrat : 18/09/2021</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Email : elite.fitness.ablis@gmail.com</h5> </span> 
                    <div class="form-check form-switch ps-0 mt-3 ms-3 mb-3">
                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault">Inactif
                  </div>
                   </div>
</div>
        </div> 
        


            <div class="col-6">
                <div class="card h-100">
                    <img src="../assets/img/img/8.png" class="card-img-top mt-4"
                        style="width:100% ; height:15vw ; object-fit:scale-down;" alt="...">
                    <div class="card-body  d-flex flex-column">
                    <span><h4 class="mt-3 ms-3 structure">Structure : Elite Fitness Ablis</h4> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Nom : Monsieur Jean MORISQUE</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Date du contrat : 18/09/2021</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Email : structure_ablis@gmail.com</h5> </span> 
                    <div class="form-check form-switch ps-0 mt-3 ms-3 mb-3">
                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault">Inactif
                  </div>
                   </div>
                </div>
</div>
       


            <div class="col-6">
                <div class="card h-100">
                    <img src="../assets/img/img/2.png" class="card-img-top mt-4"
                        style="width:100% ; height:15vw ; object-fit:scale-down;" alt="...">
                    <div class="card-body  d-flex flex-column">
                    <span><h4 class="mt-3 ms-3 structure">Partenaire : Elite Fitness Saint-Tropez</h4> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Nom : Madame Fabienne LAURENT</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Date du contrat : 01/03/1998</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Email : elite.fitness.st.tropez@gmail.com</h5> </span> 
                    <div class="form-check form-switch ps-0 mt-3 ms-3 mb-3">
                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" checked>Actif
                  </div>
                   </div>
</div>
        </div> 
        


            <div class="col-6">
                <div class="card h-100">
                    <img src="../assets/img/img/9.png" class="card-img-top mt-4"
                        style="width:100% ; height:15vw ; object-fit:scale-down;" alt="...">
                    <div class="card-body  d-flex flex-column">
                    <span><h4 class="mt-3 ms-3 structure">Structure : Elite Fitness Saint-Tropez</h4> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Nom : Monsieur Cedric CAYOLLE</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Date du contrat : 04/12/2002</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Email : structure_st_tropez@gmail.com</h5> </span> 
                    <div class="form-check form-switch ps-0 mt-3 ms-3 mb-3">
                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" checked>Actif
                  </div>
                   </div>
                </div>
</div>


        <div class="col-6">
                <div class="card h-100">
                    <img src="../assets/img/img/11.png" class="card-img-top mt-4"
                        style="width:100% ; height:15vw ; object-fit:scale-down;" alt="...">
                    <div class="card-body  d-flex flex-column">
                    <span><h4 class="mt-3 ms-3 structure">Partenaire : Elite Fitness Cachy</h4> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Nom : Madame Sabrina TARCY</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Date du contrat : 22/04/2004</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Email : elite.fitness.cachy@gmail.com</h5> </span> 
                    <div class="form-check form-switch ps-0 mt-3 ms-3 mb-3">
                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault">Inactif
                  </div>
                   </div>
</div>
        </div> 
        


            <div class="col-6">
                <div class="card h-100">
                    <img src="../assets/img/img/10.png" class="card-img-top mt-4"
                        style="width:100% ; height:15vw ; object-fit:scale-down;" alt="...">
                    <div class="card-body  d-flex flex-column">
                    <span><h4 class="mt-3 ms-3 structure">Structure : Elite Fitness Cachy</h4> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Nom : Monsieur Norbert MORONDAIS</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Date du contrat : 13/06/2003</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Email : structure_cachy@gmail.com</h5> </span> 
                    <div class="form-check form-switch ps-0 mt-3 ms-3 mb-3">
                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault">Inactif
                  </div>
                   </div>
                </div>
</div>
       



            <div class="col-6">
                <div class="card h-100">
                    <img src="../assets/img/img/12.png" class="card-img-top mt-4"
                        style="width:100% ; height:15vw ; object-fit:scale-down;" alt="...">
                    <div class="card-body  d-flex flex-column">
                    <span><h4 class="mt-3 ms-3 structure">Partenaire : Elite Fitness Chalais</h4> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Nom : Monsieur Jean KHIAT</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Date du contrat : 01/01/2012</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Email : elite.fitness.chalais@gmail.com</h5> </span> 
                    <div class="form-check form-switch ps-0 mt-3 ms-3 mb-3">
                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault">Inactif
                  </div>
                   </div>
</div>
        </div> 
        


            <div class="col-6">
                <div class="card h-100">
                    <img src="../assets/img/img/4.png" class="card-img-top mt-4"
                        style="width:100% ; height:15vw ; object-fit:scale-down;" alt="...">
                    <div class="card-body  d-flex flex-column">
                    <span><h4 class="mt-3 ms-3 structure">Structure : Elite Fitness Chalais</h4> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Nom : Madame Yaele DRAY</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Date du contrat : 01/01/2012</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Email : structure_chalais@gmail.com</h5> </span> 
                    <div class="form-check form-switch ps-0 mt-3 ms-3 mb-3">
                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault">Inactif
                  </div>
                   </div>
                </div>
</div>

        <div class="col-6">
                <div class="card h-100">
                    <img src="../assets/img/img/5.png" class="card-img-top mt-4"
                        style="width:100% ; height:15vw ; object-fit:scale-down;" alt="...">
                    <div class="card-body  d-flex flex-column">
                    <span><h4 class="mt-3 ms-3 structure">Partenaire : Elite Fitness Dienne</h4> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Nom : Madame Celine FAURE</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Date du contrat : 01/09/2008</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Email : elite.fitness.dienne@gmail.com</h5> </span> 
                    <div class="form-check form-switch ps-0 mt-3 ms-3 mb-3">
                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" checked>Actif
                  </div>
                   </div>
</div>
        </div>   
        


            <div class="col-6">
                <div class="card h-100">
                    <img src="../assets/img/img/13.png" class="card-img-top mt-4"
                        style="width:100% ; height:15vw ; object-fit:scale-down;" alt="...">
                    <div class="card-body  d-flex flex-column">
                    <span><h4 class="mt-3 ms-3 structure">Structure : Elite Fitness Dienne</h4> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Nom : Monsieur Denis RODIN</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Date du contrat : 01/09/2008</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Email : structure_dienne@gmail.com</h5> </span> 
                    <div class="form-check form-switch ps-0 mt-3 ms-3 mb-3">
                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" checked>Actif
                  </div>
                   </div>
                </div>
</div>
       


<div class="col-6">
                <div class="card h-100">
                    <img src="../assets/img/img/6.png" class="card-img-top mt-4"
                        style="width:100% ; height:15vw ; object-fit:scale-down;" alt="...">
                    <div class="card-body  d-flex flex-column">
                    <span><h4 class="mt-3 ms-3 structure">Partenaire : Elite Fitness Sablet</h4> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Nom : Madame Ariane FAURE</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Date du contrat : 05/06/2003</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Email : elite.fitness.sablet@gmail.com</h5> </span> 
                    <div class="form-check form-switch ps-0 mt-3 ms-3 mb-3">
                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" checked>Actif
                  </div>
                   </div>
</div>
        </div> 
        


            <div class="col-6">
                <div class="card h-100">
                    <img src="../assets/img/img/14.png" class="card-img-top mt-4"
                        style="width:100% ; height:15vw ; object-fit:scale-down;" alt="...">
                    <div class="card-body  d-flex flex-column">
                    <span><h4 class="mt-3 ms-3 structure">Structure : Elite Fitness Sablet</h4> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Nom : Monsieur Stephane PHILIPPE</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Date du contrat : 05/06/2003</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Email : structure_sablet@gmail.com</h5> </span> 
                    <div class="form-check form-switch ps-0 mt-3 ms-3 mb-3">
                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" checked>Actif
                  </div>
                   </div>
                </div>
</div>

<div class="col-6">
                <div class="card h-100">
                    <img src="../assets/img/img/15.png" class="card-img-top mt-4"
                        style="width:100% ; height:15vw ; object-fit:scale-down;" alt="...">
                    <div class="card-body  d-flex flex-column">
                    <span><h4 class="mt-3 ms-3 structure">Partenaire : Elite Fitness Upie</h4> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Nom : Monsieur David JAFFROY</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Date du contrat : 02/08/2014</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Email : elite.fitness.upie@gmail.com</h5> </span> 
                    <div class="form-check form-switch ps-0 mt-3 ms-3 mb-3">
                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault">Inactif
                  </div>
                   </div>
</div>
        </div> 
        


            <div class="col-6">
                <div class="card h-100 ">
                    <img src="../assets/img/img/16.png" class="card-img-top mt-4"
                        style="width:100% ; height:15vw ; object-fit:scale-down;" alt="...">
                    <div class="card-body  d-flex flex-column">
                    <span><h4 class="mt-3 ms-3 structure">Structure : Elite Fitness Upie</h4> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Nom : Madame Claude ROMAN</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Date du contrat : 02/08/2014</h5> </span> 
                    <span><h5 class="mt-3 ms-3 structure">Email : structure_upie@gmail.com</h5> </span> 
                    <div class="form-check form-switch ps-0 mt-3 ms-3 mb-3">
                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault">Inactif
                  </div>
                   </div>
                </div>
</div>
        </div>
</div>       
</div>

    <!-- This is Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script> 


    <!-- this is javascript-->
  <script>
        var searchFilter = () => {
            const input = document.querySelector(".form-control");
            const cards = document.getElementsByClassName("col-6");
            console.log(cards[1])
            let filter = input.value
            for (let i = 0; i < cards.length; i++) {
                let title = cards[i].querySelector(".card-body");
                if (title.innerText.toLowerCase().indexOf(filter.toLowerCase()) > -1) {
                    cards[i].classList.remove("d-none")
                } else {
                    cards[i].classList.add("d-none")
                }
            }
        }

    </script>




<?php
include("_partials/footer.php");
include("_partials/scripts.php");
?>