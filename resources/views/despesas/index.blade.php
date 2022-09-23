@extends('base')
@section('title', 'Despesas')
@section('content')
    @php $total = 0; @endphp
    <a href='/despesas/create' class="button is-fullwidth is-primary">Cadastrar Despesa</a>
    <ul>
        @foreach ($despesas as $despesa)
            <div class="is-flex is-flex-direction-row {{ $loop->first ? 'pt-5' : '' }}">
                <a href="/despesas/{{ $despesa->id }}" style="width: 100%;">
                    <li>
                        <div>
                            <p class="has-text-weight-semibold" style="color: #212121">
                                {{ $despesa->nome }} - {{ date('d/m/Y', strtotime($despesa->vencimento)) }}
                            </p>
                            <p class="is-subtitle is-5" style="color: dimgrey">
                                R$ {{ number_format($despesa->valor, 2) }}
                            </p>
                        </div>
                    </li>
                </a>
                <div id="modal-{{ $despesa->id }}" class="modal">
                    <div class="modal-background"></div>
                    <div class="modal-content" style="width: 350px">
                        <div class="box">
                            <div class="block">
                                <p class="title is-5">Tem certeza de que deseja apagar essa despesa?</p>
                                <p class="subtitle is-6">Essa ação não pode ser desfeita.</p>
                            </div>
                            <div class="columns">
                                <div class="column">
                                    <form action="/despesas/{{ $despesa->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="cursor: pointer"
                                            class="button is-fullwidth is-danger">
                                            Sim
                                        </button>
                                    </form>
                                </div>
                                <div class="column">
                                    <button id="btn-fechar-modal-apagar-despesa" class="button is-light is-fullwidth">
                                        Não
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="modal-close is-large" aria-label="close"></button>
                </div>
                <div class="is-flex is-flex-direction-row is-align-items-center" style="gap: 1rem">
                    <a href="/despesas/{{ $despesa->id }}/edit">
                        <button class="button is-rounded is-small is-outlined is-link p-2">
                            <i class="bi bi-pen" style="cursor: pointer"></i>
                        </button>
                    </a>
                    <button class="js-modal-trigger button is-rounded is-small is-outlined is-danger p-2"
                        data-target="modal-{{ $despesa->id }}">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
            <hr>
            @php $total += $despesa->valor; @endphp
        @endforeach
    </ul>
    <p>Total: R$ {{ number_format($total, 2) }}</p>
    <p>Valor negativo: R$ {{ number_format($total - 2650, 2) }}</p>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            $btn = document.getElementById('btn-fechar-modal-apagar-despesa');
            const $target = $btn.closest('.modal');

            $btn.addEventListener('click', () => {
                closeModal($target);
            });

            function openModal($el) {
                $el.classList.add('is-active');
            }

            function closeModal($el) {
                $el.classList.remove('is-active');
            }

            function closeAllModals() {
                (document.querySelectorAll('.modal') || []).forEach(($modal) => {
                    closeModal($modal);
                });
            }

            (document.querySelectorAll('.js-modal-trigger') || []).forEach(($trigger) => {
                const modal = $trigger.dataset.target;
                const $target = document.getElementById(modal);

                $trigger.addEventListener('click', () => {
                    openModal($target);
                });
            });

            (document.querySelectorAll(
                '.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button') || [])
            .forEach(($close) => {
                const $target = $close.closest('.modal');

                $close.addEventListener('click', () => {
                    closeModal($target);
                });
            });

            document.addEventListener('keydown', (event) => {
                const e = event || window.event;

                if (e.keyCode === 27) {
                    closeAllModals();
                }
            });
        });
    </script>
@endsection
