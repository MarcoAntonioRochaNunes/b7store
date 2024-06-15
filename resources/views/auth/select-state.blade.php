<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/style.css" />
    <link rel="stylesheet" href="assets/loginSignUpStyle.css" />

    <title>B7Store - Selecione o seu estado</title>
  </head>

  <body>

    <div class="login-page">
      <div class="login-area">
        <h3 class="login-title">B7Store</h3>
        <form method="POST" action="{{route('select-state_action')}}">
            @csrf
          <div class="state-area">
                <div class="state-label">Selecione o seu estado</div>
                <select name="state" id="state">
                    <option value="0">Selecione</option>
                    @foreach ($data['states'] as $estado)
                        <option value="{{$estado->id}}">{{$estado->name}}</option>
                    @endforeach
                </select>
          </div>

          <button type="submit" class="login-button">Selecionar</button>
        </form>
      </div>
    </div>
    <x-base.footer />
  </body>
</html>
