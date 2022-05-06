<?php
include '../../config.php';

   include_once '../../MODEL/Livreur.php';
   include_once "../../CONTROLLER/LivreurL.php";
   
  $id = $_GET['id'] ? intval($_GET['id']) : 0;
  $LivreurL=new LivreurL();

  $tmp=$LivreurL->AfficherLiv($id);
  
  $livreur=new Livreur($tmp["id"],$tmp["Nom"],$tmp["Prenom"],$tmp["Age"]); 
     $error=array();
  if ($_POST) {
    $nom    = trim($_POST['Nom']);
    $prenom  = trim($_POST['Prenom']);
    $age   = ($_POST['Age']);
    $nb=0;
    if($nom=="" )
    {
        array_push($error,"Nom invalide");
        $nb+=1;
    }
    
     if($prenom=="")
     {
            array_push($error,"Prenom invalide");
            $nb+=1;
     }
     if($age=="")
     {
            $nb+=1;
            array_push($error,"Age invalide");

     }
     if($nb==0)
     {
         
         $LivreurL->modifierLivreur($nom,$prenom,$age,$id);
         $tmp=$LivreurL->AfficherLiv($id);
  
         $livreur=new Livreur($tmp["id"],$tmp["Nom"],$tmp["Prenom"],$tmp["Age"]); 

     }

  }
?>
<?php include("../../inc/header.php") ?>
    <div class="">
    <a href="ListeLivreurs.php" class="btn btn-light mb-3"><< Go Back</a>
        <?php if ($error) : ?>
            <div class="alert alert-danger" role="alert">

            <?php  foreach($error as $e) :?>
            <strong><?php echo $e;  ?></strong>
      
            <?php endforeach ?>
            </div><br>
        <?php endif ?>
        <!-- Create Form -->
        <div class="card border-primary ">
            <div class="card-header bg-primary text-white">
                <strong><i class="fa fa-edit"></i> Mettre a jour  livreur</strong>
            </div>
            
            <div class="card-body">
                
                <form action="" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="id" class="col-form-label">id</label>
                            <input type="text" class="form-control" id="id" name="id" placeholder="id" disabled  value="<?= $id ?>" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Nom" class="col-form-label">Name</label>
                            <input type="text" class="form-control" id="Nom" name="Nom" placeholder="Nom"   value="<?= $livreur->getNom() ?>"  onkeyup="checkNom(this)">
                            <small style="display:none;color:red;" id='eNom'>Error Message</small>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="Prenom" class="col-form-label">Prenom</label>
                            <input type="text" class="form-control" id="Prenom" name="Prenom" placeholder="Prenom"   value="<?= $livreur->getPrenom() ?>"  onkeyup="checkPrenom(this)">
                            <small style="display:none;color:red;" id='ePrenom'>Error Message</small>

                        </div>
                        <div class="form-group col-md-4">
                            <label for="Age" class="col-form-label">Age</label>
                            <input type="number" class="form-control" name="Age" id="Age" placeholder="Age"   value="<?= $livreur->getAge() ?>" onkeyup="checkAge(this)">
                            <small style="display:none;color:red;" id='eAge'>Error Message</small>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Mettre a jour </button>
                </form>
            </div>
        </div>
        <!-- End create form -->
        <br>
    </div><!-- /.container -->
    <script>

const form = document.getElementById('form');
const Nom = document.getElementById('Nom');
const Prenom = document.getElementById('Prenom');
const Age = document.getElementById('Age');

//Show input error messages


//show success colour


function checkNom(input) {
    const re = /^[a-zA-Z ]+$/;
    var err=document.getElementById("eNom");
    if(re.test(input.value.trim()) && checkLength(input,3,25)==0) {
        Nom.style.border="2px solid #2ecc71";
        err.style.display="none";

    }else {
        err.innerHTML="Nom invalide";
        if(checkLength(input,3,25)==0)
        {
            err.innerHTML+=" <br>doit contenir des lettres"
        }
            if(checkLength(input,5,25)==-1)
            {
                err.innerHTML+="<br> doit contenir au moins 3 caractères"

            }
            if(checkLength(input,5,25)==1)
            {
                err.innerHTML+="<br> doit contenir au plus 25 caractères"

            }

            Nom.style.border="2px solid red";

err.style.display="block";
        

    }
}

function checkPrenom(input) {
    const re = /^[a-zA-Z ]+$/;
    var err=document.getElementById("ePrenom");

    if(re.test(input.value.trim()) && checkLength(input,5,25)==0) {
        Prenom.style.border="2px solid #2ecc71";
        err.style.display="none";

    }else {
        err.innerHTML="Prenom invalide";
        if(checkLength(input,3,25)==0)
        {
            err.innerHTML+=" <br>doit contenir des lettres"
        }
            if(checkLength(input,5,25)==-1)
            {
                err.innerHTML+="<br> doit contenir au moins 3 caractères"

            }
            if(checkLength(input,5,25)==1)
            {
                err.innerHTML+="<br> doit contenir au plus 25 caractères"

            }
            Prenom.style.border="2px solid red";

            err.style.display="block";

    }
}
function checkAge(input) {
    var err=document.getElementById("eAge");

    if(Number(input.value)>=18 && Number(input.value)<=50 ) {
        Age.style.border="2px solid #2ecc71";
        err.style.display="none";
    }else {
        Age.style.border="2px solid red";

        err.innerHTML="Age invalide";
        if(!(Number(input.value)>=18 && Number(input.value)<=50 ) )       {
            err.innerHTML+=" <br>doit etre entre 18 et 50";
        }
        err.style.display="block";


            
    }
}



//check input Length
function checkLength(input, min ,max) {
    if(input.value.length < min) {
        return -1;
    }else if(input.value.length > max) {
        return 1;
    }else {
        return 0;
    }
}

//get FieldName
function getFieldName(input) {
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}




//Event Listeners

</script>
<?php include("../../inc/footer.php") ?>
