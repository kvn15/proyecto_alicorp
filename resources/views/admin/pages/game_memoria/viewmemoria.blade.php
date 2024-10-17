@php
    $project = $data["project"]; 
    $gameMemoria = $data["gameMemoria"]; 
    $premioSelect = $data["premio"]; 
    $idParticipante = $data["idParticipante"]; 
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/25bfdd98ec.js" crossorigin="anonymous"></script>
    <title>{{ $project->titulo_pestana }}</title>
    <link rel="icon" href="{{ '/storage/'.$project->ruta_fav }}" type="image/x-icon">
</head>
<style>
    .juego_memorio_content {
        width: 100%;
        height: 100vh;
        font-family: Arial, Helvetica, sans-serif;
    }
    .game {
        /* position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%); */
        max-width: 660px;
        margin: auto;
    }
    .controls {
        display: flex;
        gap: 20px;
        margin-top: 10px;
        padding: 0 1.2em;
    }
    button {
        background: #282A3A;
        color: #FFF;
        border-radius: 5px;
        padding: 10px 20px;
        border: 0;
        cursor: pointer;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 18pt;
        font-weight: bold;
    }
    .disabled {
        color: #757575;
    }
    .stats {
        color: #FFF;
        font-size: 14pt;
        font-weight: bold;
    }
    .board-container {
        position: relative;
    }
    .board,
    .win {
        border-radius: 5px;
        /* box-shadow: 0 25px 50px rgb(33 33 33 / 25%);
        background: linear-gradient(135deg,  #03001e 0%,#7303c0 0%,#ec38bc 50%, #fdeff9 100%); */
        transition: transform .6s cubic-bezier(0.4, 0.0, 0.2, 1);
        backface-visibility: hidden;
    }
    .board {
        padding: 20px;
        display: grid;
        grid-template-columns: repeat(4, auto);
        grid-gap: 20px;
    }
    .board-container.flipped .board {
        transform: rotateY(180deg) rotateZ(50deg);
    }
    .board-container.flipped .win {
        transform: rotateY(0) rotateZ(0);
    }
    .card {
        position: relative;
        width: 140px;
        height: 140px;
        cursor: pointer;
        background-color: transparent !important;
        border: 0;
    }
    .card-front,
    .card-back {
        position: absolute;
        border: 4px solid #fff;
        border-radius: 15px;
        width: 100%;
        height: 100%;
        /* background: #282A3A; */
        /* background: linear-gradient(190deg, #e71b1b 0%, #ff3434 0%, #991616 50%, #590202 100%); */
        background: radial-gradient(ellipse at top, #f13636 0%, #f13636 40%, #d10f0f 80%);
        transition: transform .6s cubic-bezier(0.4, 0.0, 0.2, 1);
        backface-visibility: hidden;
        overflow: hidden;
    }
    .card-back {
        transform: rotateY(180deg) rotateZ(50deg);
        font-size: 28pt;
        user-select: none;
        text-align: center;
        line-height: 100px;
        background: #FDF8E6;
    }
    .card.flipped .card-front {
        transform: rotateY(180deg) rotateZ(50deg);
    }
    .card.flipped .card-back {
        transform: rotateY(0) rotateZ(0);
    }
    .win {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        text-align: center;
        background: #FDF8E6;
        transform: rotateY(180deg) rotateZ(50deg);
    }
    .win-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 21pt;
        color: #282A3A;
    }
    .highlight {
        color: #7303c0;
    }

    .img-card {
        width: 100%;
        height: 100%;
    }

    .none-visibiliti {
        transform: scale(1);
        transition: transform 0.6s cubic-bezier(0.4, 0.0, 0.2, 1);
        visibility: hidden;
    }

    .scale-trans {
        transform: scale(1.2);
        transition: transform 0.6s cubic-bezier(0.4, 0.0, 0.2, 1);
    }

    .btn-top {
        background-color: #fff;
        padding: 0.5em;
        color: #e71b1b;
        font-weight: 900;
        border-radius: 36px;
        font-size: 0.9rem;
    }

    .btn-memoria {
        background-color: #fff;
        padding: 0.5em 1em;
        color: #d5542e;
        font-weight: 500;
        font-size: 13px !important;
        border-radius: 36px;
        font-size: 1rem;
        margin: 10px 0.2em;
        text-decoration: none;
    }

    .btn-memoria:hover {
        color: #d5542e;
    }
</style>
<body>
    @php
    
        //imagenes
        $principal = isset($gameMemoria) ? $gameMemoria->principal : '';
        $premio = isset($gameMemoria) ? $gameMemoria->premio : '';
        $principalData = json_decode($principal, true);
        $premioData = json_decode($premio, true);
        $imgNulo = asset('backend/svg/img-null.svg');
    
        // Principal
        $bgMemoria = isset($principalData["banner"]) && !empty($principalData["banner"]) ? "background-image: url('".'/storage/'.$principalData["banner"]."');" : "background-color: #EFF2F6;" ;
        $imgLogo = isset($principalData["logo-subir"]) && !empty($principalData["logo-subir"]) ? $principalData["logo-subir"] : $imgNulo;
    
        // Premios
        $imgLogoPremio = isset($premioData["gano-subir"])  && !empty($premioData["gano-subir"]) ? $premioData["gano-subir"] : $imgNulo;
    
        // array memorias
        $jsonDataMemoria = json_decode($gameMemoria->premio_img, true);
    
        $img1 = isset($jsonDataMemoria[0]['img']) && !empty($jsonDataMemoria[0]['img']) ? "/storage/".$jsonDataMemoria[0]['img'] : $imgNulo;
        $img2 = isset($jsonDataMemoria[1]['img']) && !empty($jsonDataMemoria[1]['img']) ? "/storage/".$jsonDataMemoria[1]['img'] : $imgNulo;
        $img3 = isset($jsonDataMemoria[2]['img']) && !empty($jsonDataMemoria[2]['img']) ? "/storage/".$jsonDataMemoria[2]['img'] : $imgNulo;
        $img4 = isset($jsonDataMemoria[3]['img']) && !empty($jsonDataMemoria[3]['img']) ? "/storage/".$jsonDataMemoria[3]['img'] : $imgNulo;
        $img5 = isset($jsonDataMemoria[4]['img']) && !empty($jsonDataMemoria[4]['img']) ? "/storage/".$jsonDataMemoria[4]['img'] : $imgNulo;
        $img6 = isset($jsonDataMemoria[5]['img']) && !empty($jsonDataMemoria[5]['img']) ? "/storage/".$jsonDataMemoria[5]['img'] : $imgNulo;
    
        // valores
        $boldTitulo = isset($principalData["bold-titulo-parrafo"]) ? ($principalData["bold-titulo-parrafo"] == 1 ? "checked" : "") : "";
        $italicTitulo = isset($principalData["italic-titulo-parrafo"]) ? ($principalData["italic-titulo-parrafo"] == 1 ? "checked" : "") : "";
        $tituloTexto = isset($principalData["texto-header"]) ? $principalData["texto-header"]  : "";
        
        $tamanoTexto = isset($principalData["tamanoTexto"]) ? $principalData["tamanoTexto"] : "";
        $tamano1 = $tamanoTexto == 1 ? 'checked' : "";
        $tamano2 = $tamanoTexto == 2 ? 'checked' : "";
        $tamano3 = $tamanoTexto == 3 ? 'checked' : "";
        
        $alineacion = isset($principalData["alineacionTexto"]) ? $principalData["alineacionTexto"] : "";
        $alineacion1 = $alineacion == 1 ? 'checked' : "";
        $alineacion2 = $alineacion == 2 ? 'checked' : "";
        $alineacion3 = $alineacion == 3 ? 'checked' : "";
    
        $color = isset($principalData["color-texto-input"]) ? $principalData["color-texto-input"] : "#FFFFFF";
    
        // fw-bold
        $styleBold = isset($principalData["bold-titulo-parrafo"]) ? ($principalData["bold-titulo-parrafo"] == 1 ? "fw-bold" : "") : "";
        $italicTitulo = isset($principalData["italic-titulo-parrafo"]) ? ($principalData["italic-titulo-parrafo"] == 1 ? "fst-italic" : "") : "";
    
        $styleTamano = $tamanoTexto == 1 ? "fs-6" : ($tamanoTexto == 2 ? "fs-3"  :  ($tamanoTexto == 3 ? "fs-1"  : ""));
        $styleAlineacion = $alineacion == 1 ? "text-start" : ($alineacion == 2 ? "text-center"  :  ($alineacion == 3 ? "text-end"  : "text-center"));
    
    
        // Premios BOTONES
        $verBotones = isset($premioData["verBoton"]) ? $premioData["verBoton"] : "";
        $verBotones1 = $verBotones == 1 ? 'checked' : "";
        $verBotones2 = $verBotones == 2 ? 'checked' : "";
        $styleBotones =  $verBotones == 1 ? 'd-none' : 'd-flex';
    
        $btnBg = isset($premioData["color-btn-bg-input"]) ? $premioData["color-btn-bg-input"] : "#fff";
        $btnColor = isset($premioData["color-texto-btn"]) ? $premioData["color-texto-btn"] : "#d5542e";
        // premios img
        $imgPremio = isset($premioSelect["imagen"]) && !empty($premioSelect["imagen"]) ? "/storage/".$premioSelect["imagen"] : $imgNulo;
        $namePremio = isset($premioSelect["premio_nombre"]) && !empty($premioSelect["premio_nombre"]) ? $premioSelect["premio_nombre"] : '';
        
    @endphp
    

    <form action="{{ route('juego.ganador.memoria', $project->id) }}" method="POST" id="form_ganador">
        @csrf
        @method('POST')
        <input type="hidden" id="idParticipante" name="idParticipante" value="{{ $idParticipante }}">
        <input type="hidden" id="premio_id" name="premio_id" value="{{ $premioSelect['premio_id'] }}">
    </form>
    <div class="juego_memorio_content" id="juego_memorio_content" style="{{ $bgMemoria }} background-size: cover;">
        <div class="contenido_juego d-block" id="contenido_juego">
            <p class="{{ $styleAlineacion }} {{ $styleTamano }} w-100 mt-0 mb-0 pt-2 {{ $styleBold }} {{ $italicTitulo }}" id="parrafo-header" style="color: {{ $color }};">{{ $tituloTexto }}</p>
            <div class="d-flex justify-content-center pt-4">
                <img class="img-fluid" id="logo_memoria" src="{{ '/storage/'.$imgLogo }}" alt="">
            </div>
            <div class="game">
                <div class="controls">
                    <button style="display: none;">Start</button>
                    <div class="stats" style="display: none;">
                        <div class="moves">3 intentos</div>
                        <div class="timer">Time: 0 sec</div>
                    </div>
                    <div class="btn-top error">
                        ERRORES: 0
                    </div>
                    <div class="btn-top turno">
                        TURNOS: 0
                    </div>
                </div>
                <div class="board-container">
                    <div class="board" data-dimension="4"></div>
                    <!-- <div class="win">You won!</div> -->
                </div>
            </div>
        </div>
        <div class="win-game d-none" id="win-game">
            <div class="d-flex justify-content-center pt-4 w-100 mb-3">
                <img class="img-fluid" src="{{ '/storage/'.$imgLogoPremio }}" alt="" id="img-header-premio">
            </div>
            <div class="d-flex flex-column align-items-center justify-content-center w-100">
                <img class="img-fluid" src="{{ $imgPremio }}" alt="">
                <h4 class="text-white" style="font-weight: 700;">{{ $namePremio }}</h4>
            </div>
            <div class="{{ $styleBotones }} justify-content-center" id="btn_content">
                <a href="" class="btn-memoria" style="background-color: {{ $btnBg }}; color: {{ $btnColor }};">IR A REGISTRO</a>
                <a href="" class="btn-memoria" style="background-color: {{ $btnBg }}; color: {{ $btnColor }};">IR A HOME</a>
                <a href="" class="btn-memoria" style="background-color: {{ $btnBg }}; color: {{ $btnColor }};">VOLVER A JUGAR</a>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" defer
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>
</html>

<script>

    let itemCard = [
        {
            valor: 1,
            img: '{{ $img1 }}'
        },
        {
            valor: 2,
            img: '{{ $img2 }}'
        },
        {
            valor: 3,
            img: '{{ $img3 }}'
        },
        {
            valor: 4,
            img: '{{ $img4 }}'
        },
        {
            valor: 5,
            img: '{{ $img5 }}'
        },
        {
            valor: 6,
            img: '{{ $img6 }}'
        }
    ]

    const maxTurno = 1;
    let nErrores = 0;

    const selectors = {
        boardContainer: document.querySelector('.board-container'),
        board: document.querySelector('.board'),
        moves: document.querySelector('.moves'),
        timer: document.querySelector('.timer'),
        start: document.querySelector('button'),
        win: document.querySelector('.win-game'),
        contenido_juego: document.querySelector('.contenido_juego')
    }

    const state = {
        gameStarted: false,
        flippedCards: 0,
        totalFlips: 0,
        totalTime: 0,
        loop: null
    }

    const shuffle = array => {
        const clonedArray = [...array]
        for (let i = clonedArray.length - 1; i > 0; i--) {
            const randomIndex = Math.floor(Math.random() * (i + 1))
            const original = clonedArray[i]

            clonedArray[i] = clonedArray[randomIndex]
            clonedArray[randomIndex] = original
        }

        return clonedArray
    }

    const pickRandom = (array, items) => {
        const clonedArray = [...array]
        const randomPicks = []

        for (let i = 0; i < items; i++) {
            const randomIndex = Math.floor(Math.random() * clonedArray.length)
            
            randomPicks.push(clonedArray[randomIndex])
            clonedArray.splice(randomIndex, 1)
        }

        return randomPicks
    }

    const generateGame = () => {
        const dimensions = selectors.board.getAttribute('data-dimension')  

        // const emojis = ['🥔', '🍒', '🥑', '🌽', '🥕', '🍇', '🍉', '🍌', '🥭', '🍍']
        const articulos = itemCard;
        const picks = pickRandom(articulos, (3 * dimensions) / 2) 
        const items = shuffle([...picks, ...picks])
       
        const cards = `
            <div class="board" style="grid-template-columns: repeat(${dimensions}, auto)">
                ${items.map(item => `
                    <div class="card" data-attr-valor="${item.valor}">
                        <div class="card-front"></div>
                        <div class="card-back">
                            <img src="${item.img}" class="img-card imagen_${item.valor}" />
                        </div>
                    </div>
                `).join('')}
        </div>
        `
        
        const parser = new DOMParser().parseFromString(cards, 'text/html')

        selectors.board.replaceWith(parser.querySelector('.board'))
    }

    const startGame = () => {
        state.gameStarted = true
        // selectors.start.classList.add('disabled')

        state.loop = setInterval(() => {
            state.totalTime++

            selectors.moves.innerText = `${state.totalFlips} moves`
            selectors.timer.innerText = `Time: ${state.totalTime} sec`
        }, 1000)
    }

    const flipBackCards = () => {
        document.querySelectorAll('.card:not(.matched)').forEach(card => {
            card.classList.remove('flipped')
        })

        state.flippedCards = 0
    }

    const flipCard = card => {
        state.flippedCards++
        state.totalFlips++
        if (!state.gameStarted) {
            startGame()
        }

        if (state.flippedCards <= 2) {
            card.classList.add('flipped')
        }

        if (state.flippedCards === 2) {
            const flippedCards = document.querySelectorAll('.flipped:not(.matched)')

            if (flippedCards[0].attributes.getNamedItem("data-attr-valor").value === flippedCards[1].attributes.getNamedItem("data-attr-valor").value) {
            // if (valor1 === valor2) {
                flippedCards[0].classList.add('matched')
                flippedCards[1].classList.add('matched')
                flippedCards[0].classList.add('scale-trans')
                flippedCards[1].classList.add('scale-trans')
                setTimeout(() => {
                    flippedCards[0].classList.add('none-visibiliti')
                    flippedCards[1].classList.add('none-visibiliti')
                    flippedCards[0].classList.remove('scale-trans')
                    flippedCards[1].classList.remove('scale-trans')
                }, 1500);
            } else {
                const turno = document.getElementsByClassName('turno');
                const error = document.getElementsByClassName('error');
                nErrores++
                error[0].innerHTML = `ERRORES: ${nErrores}`;
            }

            setTimeout(() => {
                flipBackCards()
                if (nErrores === 1) {
                    alert("Perdistes")
                    nErrores = 0;
                    const flippedCards2 = document.querySelectorAll('.card')
                    flippedCards2.forEach(value => { 
                        value.classList.remove("none-visibiliti")
                        value.classList.remove("matched")
                        value.classList.remove("flipped")
                    })
                    const error = document.getElementsByClassName('error');
                    error[0].innerHTML = `ERRORES: ${nErrores}`;
                    generateGame()
                    var urlCompleta = window.location.href;
                    window.location.href = urlCompleta+'/registro'
                }
            }, 1000)

        }
        if (!document.querySelectorAll('.card:not(.flipped)').length) {
            setTimeout(() => {
                selectors.boardContainer.classList.add('flipped')
                // selectors.win.innerHTML = `
                //     <span class="win-text">
                //         You won!<br />
                //         with <span class="highlight">${state.totalFlips}</span> moves<br />
                //         under <span class="highlight">${state.totalTime}</span> seconds
                //     </span>
                // `
                selectors.contenido_juego.classList.add('d-none')
                selectors.win.classList.remove('d-none')
                selectors.win.classList.add('d-block')
                ganador()

                clearInterval(state.loop)
            }, 1000)
        }
    }

    const attachEventListeners = () => {
        document.addEventListener('click', event => {
            const eventTarget = event.target
            const eventParent = eventTarget.parentElement
            if (event.target.classList.contains('card-front')) {
                if (eventTarget.className.includes('card') && !eventParent.className.includes('flipped')) {
                    flipCard(eventParent)
                } else if (eventTarget.nodeName === 'BUTTON' && !eventTarget.className.includes('disabled')) {
                    startGame()
                }
            }
        })
    }

    document.getElementsByClassName('turno')[0].innerHTML = `TURNOS: ${maxTurno}`;
    generateGame()
    attachEventListeners()

    function ganador() { 
        $('#form_ganador').submit();
    }

    $('#form_ganador').submit(function (e) { 
        e.preventDefault();
        
        var formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'), // URL de la ruta
            method: 'POST',
            data: formData,
            contentType: false, // Para enviar los datos como FormData
            processData: false, // No procesar los datos
            success: function(data) {
                // Procesar los datos devueltos
                console.log(data)
                $("#img-header-premio").remove();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
                toastr.error('Ocurrió un error al procesar la solicitud.');
            }
        });
    });
</script>