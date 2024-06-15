<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/style.css" />
    <link rel="stylesheet" href="assets/loginSignUpStyle.css" />

    <title>B7Store - Cadastre-se</title>
  </head>

  <body>
    <a href="index.html" class="back-button">← Voltar</a>
    <div class="login-page">
      <div class="login-area">
        <h3 class="login-title">B7Store</h3>
        <div class="text-login">
          Preencha os campos abaixo e realize seu cadastro.
        </div>
        <form method="POST" action="{{route('register_action')}}">
            @csrf
          <div class="name-area">
            <div class="name-label">Nome</div>
            <input type="text" class="@error('name') is-invalid @enderror" placeholder="Digite o seu nome" id="name" name="name" value="{{@old('name')}}"/>
            @error('name')
                <div class="errorTeste">
                    {{$message}}
                </div>
            @enderror
          </div>
          <div class="email-area">
            <div class="email-label">E-mail</div>
            <input type="email" class="@error('email') is-invalid @enderror" placeholder="Digite o seu e-mail"  id="email" name="email" value="{{@old('email')}}">
            @error('email')
                <div class="errorTeste">
                    {{$message}}
                </div>
            @enderror
          </div>
          <div class="password-area">
            <div class="password-label">Senha</div>
            <x-form.password-input name='password' placeholder='Digite a sua senha' id='confimeSenha' />
            @error('password')
                <div class="errorTeste">
                    {{$message}}
                </div>
            @enderror
          </div>
          <div class="password-area">
            <div class="password-label">Confirme a senha</div>
            <x-form.password-input name='password_confirmation' placeholder='Digite a sua senha Novamente' id='confimeSenhaNova' />
            @error('password_confirmation')
                <div class="errorTeste">
                    {{$message}}
                </div>
            @enderror
          </div>
          <button type="submit" class="login-button">Cadastrar</button>
        </form>
        <div class="register-area">
            Ja possui uma conta? <a href="{{route('login')}}">Faça login</a>
        </div>
      </div>
      <div class="terms">
        Ao continuar, você concorda com os <a href="">Termos de Uso</a> e a
        <a href="">Política de Privacidade</a>, e também, em receber
        comunicações via e-mail e push de todos os nossos parceiros.
      </div>
    </div>
    <x-base.footer />
  </body>
</html>
