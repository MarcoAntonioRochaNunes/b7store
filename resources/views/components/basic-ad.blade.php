<div class="my-ad-item">
    <div class="ad-image-area">
        @if (!empty($canEdit))
            <div class="ad-buttons">
                <a href="{{ route('delete.ad', ['id' => $advertise->id]) }}" class="ad-button">
                    <img src="/assets/icons/deleteIcon.png" />
                </a>
                <div class="ad-button">
                    <img src="/assets/icons/editIcon.png" />
                </div>
            </div>
        @endif
        {{-- @dd(auth::user()); --}}
        @php
            $usuario = auth::user();
            isset($usuario) ? ($usuario = $usuario->id) : null;

        @endphp
        <div class="ad-image p_relative"
            style="background-image: url('{{ $advertise->images->where('featured', 1)->first()->url ?? 'https://placehold.it/300x300' }} ')">

            @if ($advertise->user_id == $usuario && empty($canEdit))
                <span class="tag">Meu Anúncio</span>
            @endif
        </div>
    </div>
    <div class="ad-title">{{ $advertise->title }}</div>
    <div class="ad-price">R$ {{ number_format($advertise->price, 2, ',', '.') }}</div>
</div>

<style>
    .tag {
        background-color: #5c7bfa;
        padding: 4px 15px;
        border-radius: 5px;
        position: absolute;
        right: -5px;
        top: -5px;
        font-size: 12px;
        font-weight: 500;
        color: #fafafa;
    }

    .p_relative {
        position: relative;
    }
</style>
