<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   
    
</head>
<body>
    
    <div class="container-fluid">
        <div class="row">
            @for ($i = 0; $i < 4 ; $i++)
            <div class="col">
                {{  $title  }}
              </div>
            @endfor
          
           
            
        </div>
    </div>
</body>
</html>
    
