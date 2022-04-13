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


    <div class="container-fluid">
        <div class="container mt-5">
        <form action="{{url('paiement')}}" method="POST">
            @csrf
            <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Montant</label>
                    <input type="number" class="form-control" name="montant" id="exampleFormControlInput1" >
                  </div>
                  {{-- <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div> --}} 

                <button class="btn btn-primary">Valider le Paiement</button>
            </form>
        </div>

    </div>




      
     
</body>
</html>