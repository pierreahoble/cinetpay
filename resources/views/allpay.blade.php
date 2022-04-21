<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tous les pays avec leur moyens de paiement</title>
</head>
<body>

   <div class="container mt-2">
        <h2 class="mt-3 text-center">PAYER </h2>
   </div>

   
    <div class="container-fluid">
        <div class="container mt-5">
        <form action="{{url('paiement')}}" method="POST">
            @csrf
           
                  {{-- <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div> --}}


                <div class="card" >
                    <div class="card-body">
                      <h5 class="card-title">Choississez Votre pays </h5>
                      <div class="row">
                          <div class="col-md-6">
                            <div class="mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Pays</label>
                                <select name="pays" id="pays" class="form-control">
                                    <option value="TG">Togo</option>
                                    <option value="BN">BENIN</option>
                                    <option value="CI">COTE D'IVOIR</option>
                                    <option value="SN">SENEGAL</option>
                                    <option value="ML">MALI</option>
                                    <option value="CM">CAMEROUN</option>
                                    <option value="GN">GUINEE</option>
                                    <option value="CO">CONGO</option>
                                    <option value="BF">BURKINA-FASO</option>
                                </select>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Mode de Paiement</label>
                                <select name="mode" id="mode" class="form-control">
                                    <option value="1">MOBILE MONEY</option>
                                    <option value="2">CARTE VISA</option>
                                </select>
                            </div>
                          </div>
                     </div>
        
                  
         

            <div class="card mt-5" id="card_paiement">
                <div class="card-body">
                  <h5 class="card-title">Mode de Paiement</h5>
                  <div class="mb-3">
                      <img src="{{asset('images/latest_ml1.png')}}" alt="" width="50%">
                  </div>
                  <div class="mb-3" id="montant_card">
                    <label for="exampleFormControlInput1" class="form-label">Montant</label>
                    <input type="number" class="form-control" name="montant" id="exampleFormControlInput1" >
                 </div>

                 <div class="row" id="num_carte">
                     <div class="col-md-4">
                        <label for="numcarte" class="form-label">Numero de votre Carte bancaire</label>
                        <input type="text" class="form-control" name="carteNumber" id="numcarte" >
                     </div>
                     <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Numero CVV ( 3 chiffres )</label>
                        <input type="number" class="form-control" name="carteNumber" id="exampleFormControlInput1" placeholder="CVV" >
                     </div>
                     <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Date d'Expiration de la carte</label>
                        <input type="date" class="form-control" name="date_expiration" id="exampleFormControlInput1" >
                     </div>
                 </div>



                </div>
            </div>




                <button class="btn btn-primary mt-3">Valider le Paiement</button>
            </form>
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>



    <script>

        $('document').ready(function(){
            $('#card_paiement').hide();
            $('#num_carte').hide();
            $('#montant_card').hide();
            $("#numcarte").keypress(function (e) {
                // console.log($(this).val())
                if ((e.which < 48 || e.which > 57) && (e.which !== 8) && (e.which !== 0)) {
                return false;
            }

            return true;
            });
        })



        var pays ='';
        var mode = '';

        $('#pays').on('change',function(){
            pays = $(this).val();
            // console.log(pays);
        })

        $('#mode').on('change',function(){
            mode =$(this).val();
            $('#card_paiement').show();

            if (mode === '1') {
                $('#num_carte').hide();
                $('#montant_card').show();
            }else if(mode === '2'){
                $('#num_carte').show();
                $('#montant_card').hide(); 
            }
        })


    </script>

      
     
</body>
</html>