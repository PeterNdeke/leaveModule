

<!doctype html><html lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Laravel</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Styles -->
    
</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="color"><b>Application of Approve Leave Request</b></h3>
    <div class="margin"></div>
    <h4>Dear {{ $user->name }},</h4>
    
    
    <p> you have a new request for leave to approve </p>
    <p class="margin"><a class="btn btn-primary btn-lg" href="{{ url('login') }}">Click here to view details </a></p>
   
    
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-sm-6 ">
            <p class="italics">
                    
            </p>
        </div>
    </div>
</div>

</body>
</html>
