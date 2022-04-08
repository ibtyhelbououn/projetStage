<html>
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.11.1/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="bootstrap.min.css">
    
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.11.1/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.11.1/dist/js/uikit-icons.min.js"></script>
    </head>

@auth
<body>

  <h1 class="uk-heading-bullet uk-text-bolder">Add organization here!</h1>

  <div class="uk-container-small uk-align-center">
<form class="uk-form-stacked" method="post" action="{{url('/add-organization')}}">

  {{ csrf_field() }}


  <div class="uk-margin">
    <label for="name" class="uk-form-label">Organization name</label>
    <div class="uk-form-controls">
      <input type="text" name="name" class="uk-input" id="name" placeholder="xxx">
    </div>
  </div>
  <div class="uk-margin">
    <label for="email" class="uk-form-label">Email</label>
    <div class="uk-form-controls">
      <input type="text" name="email" class="uk-input" id="email" placeholder="xxx">
    </div>
  </div>

  <div class="uk-margin">
    <label for="adress" class="uk-form-label">Adress</label>
    <div class="uk-form-controls">
      <input type="text" name="adress" class="uk-input" id="adress" placeholder="xxx">
    </div>
  </div>
  <div class="uk-margin">
    <label for="taxID" class="uk-form-label">taxID</label>
    <div class="uk-form-controls">
      <input type="number" name="taxID" class="uk-input" id="taxID" placeholder="xxx">
    </div>
  </div>

  <div class="uk-button-group uk-float-right">
    <a class="uk-button uk-button-default" href="organizations">cancel</a>
  &nbsp 
  <button type="submit" class="uk-button uk-button-secondary"  onclick="UIkit.notification({message: 'Organization added successfully'})">add</button>
  </div>



</form>

</div>


</body>
@endauth

@guest

<body class="uk-background-muted">

<div class="uk-card uk-card-default uk-card-body uk-width-1-2@m uk-position-center">
  <h3 class="uk-card-title">Access denied!</h3>
  <p>You do not have permission to access this page. <br>Please <a href="login">log in</a> and try again.</p>
</div>

</body>


@endguest
</html>


