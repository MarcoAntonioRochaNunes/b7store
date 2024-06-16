<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&family=Open+Sans:ital@0;1&family=Oswald:wght@400;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="/assets/style.css" />
    <link rel="stylesheet" href="/assets/myAccountStyle.css" />

    <title>B7Store</title>
</head>

<body>
    <x-base.header />
    <main>
        <div class="my-account-page">
            <div class="sidebar">
                <div class="sidebar-top">
                    <a href="{{ route('my_account') }}" class="config"><img src="/assets/icons/configIcon.png" />
                        Configurações</a>
                    <a href="{{ route('my_ads') }}"><img src="/assets/icons/layersIonGray.png" /> Meus Anúncios</a>
                </div>
                <div class="sidebar-bottom">
                    <a href="{{ route('logout') }}"><img src="/assets/icons/logoutIcon.png" /> Sair</a>
                </div>
            </div>
            <div class="profile-area">
                <h3 class="profile-title">Meu perfil</h3>
                @if (session('success'))
                    <div class="alert alert-succes">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif
                <form method="POST" action="{{ route('my_account_action') }}">
                    @csrf
                    <div class="name-area">
                        <div class="name-label">Nome</div>
                        <input name="name" type="text" placeholder="Digite o seu nome"
                            value="{{ $user->name }}" />
                        @error('name')
                            <div class="errorTeste">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="email-area">
                        <div class="email-label">E-mail</div>
                        <input type="email" placeholder="Digite o seu e-mail" value="{{ $user->email }}"
                            name="email" id="email" />
                        @error('email')
                            <div class="errorTeste">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="state-area">
                        <div class="state-label">Selecione o seu estado</div>
                        <select class="states" name="state_id" id="state_id">
                            <option value="0">Selecione</option>
                            @foreach ($states as $estado)
                                <option value="{{ $estado->id }}"
                                    {{ $estado->id == $user->state_id ? 'selected' : '' }}>{{ $estado->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('state')
                            <div class="errorTeste">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <input type="submit" class="save-button" value="Salvar" />
                </form>
            </div>
        </div>
    </main>
    <x-base.footer />
</body>

</html>
