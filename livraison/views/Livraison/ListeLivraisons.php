


<?php
include '../../config.php';
include '../../CONTROLLER/LivraisonC.php ';
include '../../CONTROLLER/LivreurL.php ';

$LivraisonC=new LivraisonC();
$Livraisons=$LivraisonC->afficherLivraison();
$LivreurL=new LivreurL();
$Livreurs=$LivreurL->afficherLivreur();
$livraisonPL=$LivraisonC->afficherNbLivraisonParLivreur();

$arr=array();
 foreach ($livraisonPL as $LP) 
       {$nom=  $LP["Nom"]." ". $LP["Prenom"];
       $nb=$LP["NB"];
       array_push($arr,json_encode(["label"=>$nom , "value"=>$nb]));
      
      
      }
       
       


      
    

?>


<?php include("../../inc/header.php") ?>
<div class="row">
<div class="col-xl-6">
					<!--begin::Tables Widget 9-->
					<div class="card card-xl-stretch mb-5 mb-xl-8" style="height: 370px;">
						<!--begin::Header-->
						<div class="card-header border-0 ">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label fw-bolder fs-3 mb-1">Livraison Par Etat</span>

							</h3>

						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body py-3" style="max-height: 75%"  >
							<!--begin::Table container-->
              <div id="myfirstchart" style="height: 250px;"></div>

							<!--end::Table container-->
						</div>
						<!--begin::Body-->
					<!--end::Tables Widget 9-->
				</div>


				<!--end::Col-->
			</div>

				<div class="col-xl-6">
					<!--begin::Tables Widget 9-->
					<div class="card card-xl-stretch mb-5 mb-xl-8" style="height: 370px;">
						<!--begin::Header-->
						<div class="card-header border-0 ">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label fw-bolder fs-3 mb-1">Livraison Par Livreur</span>

							</h3>

						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body py-3" style="max-height: 75%;overflow: auto;"  >
							<!--begin::Table container-->
              <div id="sec" style="height: 250px;"></div>

							<!--end::Table container-->
						</div>
						<!--begin::Body-->
					<!--end::Tables Widget 9-->
				</div>


				<!--end::Col-->
			</div>
</div>
<div class="">

<!-- Table livreur -->
<div class="card border-primary ">
    <div class="card-header bg-primary text-white">
    <strong><i class="fa fa-database"></i>Liste Livraisons</strong>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <h5 class="card-title float-left">Table Livraison</h5>
        </div>
    </div>
    <div class="table-responsive" style="overflow: hidden;">
    <div class="row">
                    <div class="col-md-3">
            <h4>Date from</h4>
         <input type="date" class="form-control" id="datefilterLfrom" data-date-split-input="true">
        </div>
  <div class="col-md-3">
    <h4>Date to</h4>
    <input type="date" class="form-control" id="datefilterLto" data-date-split-input="true">
  </div>
  
 <div class="col-md-2">
    <h4>Livreur</h4>
    <select id="mySelectorL" class="form-control">
      <option selected disabled>  Selectionnez un Livreur   </option>
      <option class="">All </option>
      <?php foreach ($Livreurs as $livreur) : ?>
                        <option  value=<?=$livreur["Nom"]." ".$livreur["Prenom"] ?>> <?=$livreur["Nom"]." ".$livreur["Prenom"] ?> </option>
    <?php endforeach ?>
      
    </select>
  </div>
   <div class="col-md-2">
   <h4>Etat</h4>
   <select id="mySelectorLM" class="form-control">
      <option selected disabled>  Selectionnez status   </option>
      <option class="">all</option>

      <option >En cours</option>
      <option>Annuler</option>
      <option>Livré</option>
    </select>
    </div>
    <div class="col-md-2 float-right">
   
    </div>

</div>
<br>
<br>
    <table id="dataTable" class="dataTable table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>ID Livraison</th>
                <th>Date Creation</th>
                <th>Etat livraison
                <th>Description Commande</th>
                <th>Adresse Destination</th>
                <th style="width: 20%;">Livreur</th>
                <th>Acions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Livraisons as $Livraison) : ?>
            <tr>
                <td><?= $Livraison["idC"]."-".$Livraison["idL"]?></td>

                <td><?= $Livraison['dateL'] ?></td>
                <?php if ($Livraison['statusL']=="En cours") : ?>

                <td><span class="badge bg-warning text-white fs-7"> <?= $Livraison['statusL'] ?></span></td>
                <?php endif ?>
                <?php if ($Livraison['statusL']=="Annuler") : ?>

                <td><span class="badge bg-danger text-white fs-7"> <?= $Livraison['statusL'] ?></span></td>
                <?php endif ?>
                <?php if ($Livraison['statusL']=="Livré") : ?>

                <td><span class="badge bg-success text-white fs-7"> <?= $Livraison['statusL'] ?></span></td>
                <?php endif ?>

                <td><?= $Livraison['descC'] ?></td>

                <td><?= $Livraison['adresseC'] ?></td>
                <td><?= $Livraison['Nom']." ".$Livraison['Prenom'] ?></td>

                <td class="text-center">
                    <a href="LivraisonDetails.php?idC=<?= $Livraison['idC'] ?>&idL=<?= $Livraison['idL'] ?>" class="btn btn-sm btn-light"><i class="fa fa-th-list"></i></a>
                    <?php if ($Livraison['statusL']!="Annuler") : ?>
                     <a  class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-modifier-<?= $Livraison["idC"]."-".$Livraison["idL"]?>"><i class="fa fa-edit"></i></a>
                    <a href="SupprimerLivraison.php?idL=<?= $Livraison['idL'] ?>&idC=<?= $Livraison['idC'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    <?php include("../../inc/modal_modif.php") ?>

                    <?php endif ?>
                    <?php if ($Livraison['statusL']=="Annuler") : ?>
                        <a href="javascript:void(0)"  style="cursor: not-allowed; " class="btn btn-sm btn-secondary" disabled><i class="fa fa-edit"></i></a>
                    <a href="javascript:void(0)"  style="cursor: not-allowed;  " class="btn btn-sm btn-secondary" disabled><i class="fa fa-trash"></i></a>
                    <?php endif ?>

                </td>

                
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    </div>
</div>
</div>

<!-- End Table livreur -->
<br>

</div><!-- /.container -->
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

<script>
jQuery(document).ready(function($) {
  var pausecontent = new Array();////////tableau donnée mel base 
    <?php foreach($arr as $key => $val){ ?>
        pausecontent.push('<?php echo  (json_encode($val)); ?>');
    <?php } ?>
    l=new Array();
    for(var i=0 ; i<pausecontent.length ; i++)
    {
      s=pausecontent[i];
   console.log(s);
   a=(s.substr(s.indexOf(":")+1,s.indexOf(",")-1));
   a=a.substr(0,a.indexOf(","))
   console.log(a);
   b=s.substr(s.lastIndexOf(":")+1);
   b=b.substr(1,b.indexOf("}")-2);
   l.push({ "label" : a , "value":Number(b) })
    }
    console.log(l);
  var a=<?= $LivraisonC->afficherNbLivraisonParStatus("En cours") ?>;

var b=<?= $LivraisonC->afficherNbLivraisonParStatus("Annuler") ?>;
var c=<?= $LivraisonC->afficherNbLivraisonParStatus("Livré") ?>;
console.log(a);//njib les donnees bech nestamalhom f les courbes 
new Morris.Bar({// coube 1
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [//l etat et sa valeur 
    { year: 'En cours', value: a },
    { year: 'Annuler', value: b },

    { year: 'Livré', value: c }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',// l axe
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['nbcommande']
});//toufa houni
var colorDanger = "#FF1744";
Morris.Donut({//courbe mdawra 
  element: 'sec',// quel element je vais utiliser 
  resize: true,
  colors: [
    'red',
    'Blue',
    'Green',
    '#4DD0E1',
    '#26C6DA',
    '#00BCD4',
    '#00ACC1',
    '#0097A7',
    '#00838F',
    '#006064'
  ],
  //labelColor:"#cccccc", // text color
  //backgroundColor: '#333333', // border color
  data:l,
});//toufa houni




  var today = new Date();//filtre
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();

if (dd < 10) {
  dd = '0' + dd
}

if (mm < 10) {
  mm = '0' + mm
}
today = yyyy + '-' + mm + '-' + dd;
document.getElementById('datefilterLfrom').setAttribute("max", today);
    function filte()
    {
      var today = new Date(document.getElementById('datefilterLfrom').value);
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();

if (dd < 10) {
  dd = '0' + dd
}

if (mm < 10) {
  mm = '0' + mm
}
today = yyyy + '-' + mm + '-' + dd;
document.getElementById('datefilterLto').setAttribute("min",today);

  
            var selection = $("#mySelectorL").val() || "";
            if(selection.length==0)
            {
              selection=href=""
            }
            var selection2 =$('#mySelectorLM').val() || "";
            if(selection2.length==0)
            {
              selectio2n=href=""
            }
     var   from = $('#datefilterLfrom').val();
        var to = $('#datefilterLto').val();
          from = from || '1970-01-01'; // default from to a old date if it is not set
  to = to || '2999-12-31';

    var dateFrom = moment(from);
    var dateTo = moment(to);
    console.log(selection);
    $('#dataTable tbody tr').each(function(i, tr) {
     var val = $(tr).find("td:nth-child(2)").text();
    var val2=$(tr).find("td:nth-child(6)").text();
    var val3=$(tr).find("td:nth-child(3)").text();
    var dateVal = moment(val,"YYYY-MM-DD");
    var visible = (dateVal.isBetween(dateFrom, dateTo, null, []) && val2.includes(selection)&&val3.includes(selection2)) ? href="" : "none";
    $(tr).css('display', visible);
  });
   // [] for inclusive
    }
    filte();
 

$('#datefilterLfrom').on("change",     filte);
$('#datefilterLto').on("change", filte);


    $('#mySelectorL').change(filte)
      $('#mySelectorLM').change(filte);
      
        

});

    
</script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

                    

<?php include("../../inc/footer.php") ?>