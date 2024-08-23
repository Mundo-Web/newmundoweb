 {{-- whatssapp --}}
    <div class="flex justify-end w-11/12 mx-auto z-[100] relative">
        <div class="fixed bottom-6 sm:bottom-[2rem] lg:bottom-[4rem] z-20 cursor-pointer right-[20px] ">
            <a target="_blank" id="whatsapp-toggle" {{-- href="https://api.whatsapp.com/send?phone={{ $general[0]->whatsapp }}&text={{ $general[0]->mensaje_whatsapp }}" --}}>
                <img src="{{ asset('images/img/imgMundoWeb/WhatsApp.svg') }}" alt="whatsapp"
                    class="w-16 h-16 md:w-24 md:h-24">
            </a>
        </div>
    </div>

    <div class="fixed bottom-24 right-6 lg:bottom-40 z-[99] shadow-xl hidden animate-once animate-duration-1000"
        id="whatsapp-chat">
        <div class="w-72 h-auto rounded-xl">
            <div class="bg-green-500 font-roboto text-white text-center py-3 rounded-t-xl"> Whatsapp Chat </div>
            <div class="bg-white shadow-xl hover:bg-slate-100 cursor-pointer">
                <div class="flex flex-row p-3">
                    <div class="px-2">
                        <div class="flex flex-row justify-start items-center gap-3">
                            <img class="w-10" src="{{ asset('images/img/imgMundoWeb/asistente.png') }}" />
                            <div class="flex flex-col justify-start items-start">
                                <p class="text-slate-400 font-roboto text-text14 ">Agente Mundoweb</p>
                                <div class="flex flex-row items-center justify-start gap-2">
                                    <div class="w-2 h-2 bg-green-400 rounded-full ml-1"></div>
                                    <p class="text-slate-400 font-roboto text-text12">En Línea </p>
                                </div>
                            </div>
                        </div>

                        <form class="space-y-2 mt-3" id="dataWhatsapp">
                            @csrf
                            <input type="text" name="contact_name_wsp" placeholder="Nombre Completo" required
                                class="border-green-500 border-2 focus:!border-green-500 focus:!border-2 focus:!ring-0 focus:!ring-transparent
                              text-gray-600 font-montserrat w-full py-2 px-2 rounded-xl text-text16  placeholder-opacity-25 font-light  bg-white">

                            <input type="email" name="contact_email_wsp" id="email_wsp"
                                placeholder="Correo Electrónico" required
                                class="border-green-500 border-2 focus:!border-green-500 focus:!border-2 focus:!ring-0 focus:!ring-transparent
                                text-gray-600 font-montserrat w-full py-2 px-2 rounded-xl text-text16  placeholder-opacity-25 font-light  bg-white">

                            <input type="text" name="contact_phone_wsp" id="telefono_wsp" placeholder="Teléfono"
                                required
                                class="border-green-500 border-2 focus:!border-green-500 focus:!border-2 focus:!ring-0 focus:!ring-transparent
                                  text-gray-600 font-montserrat w-full py-2 px-2 rounded-xl text-text16  placeholder-opacity-25 font-light  bg-white">
                            <input type="hidden" name="source_wsp" id="source_wsp" value="Pauta">
                            <input type="hidden" name="origin_wsp" id="llegade_wsp" value="Pauta">
                            <input type="hidden" name="triggered_by_wsp" id="triggered_wsp"
                                value="Web Oficial/Btn Whatsapp">
                            <input type="hidden" name="client_width_wsp" id="anchodispositivo_wsp">
                            <input type="hidden" name="client_height_wsp" id="largodispositivo_wsp">
                            <input type="hidden" name="client_latitude_wsp" id="latitud_wsp">
                            <input type="hidden" name="client_longitude_wsp" id="longitud_wsp">
                            <input type="hidden" name="client_system_wsp" id="sistema_wsp">
                            <input type="hidden" name="message_wsp" id="mensaje" value="Lead de boton whatsapp">

                            <button id='procesarSolicitud2'
                                class="font-montserrat font-semibold text-white py-2 px-2 bg-green-500 justify-center items-center rounded-xl inline-flex text-text16 w-full">
                                <span>Enviar</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    document.getElementById('whatsapp-toggle').addEventListener('click', function() {
        var chatBox = document.getElementById('whatsapp-chat');
        if (chatBox.classList.contains('hidden')) {
            chatBox.classList.remove('hidden');
            chatBox.classList.add('animate-fade-up');
        } else {
            chatBox.classList.add('hidden');
            chatBox.classList.remove('animate-fade-up');
        }
    });
</script>


<script>
    function getParameterByName(name) {
        name = name.replace(/[\[\]]/g, '\\$&');
        let url = window.location.href;

        let regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)');
        let results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }
    let utmSource = getParameterByName('utm_source');

    if (utmSource) {
        let sourceInputWsp = document.getElementById('source_wsp');
        let sourceInput = document.getElementById('source');

        let sourceInputWspOrigin = document.getElementById('llegade_wsp');
        let sourceInputOrigin = document.getElementById('llegade');

        let currentValue = sourceInput.value;
        let currentValueWsp = sourceInputWsp.value;

        let currentValueOrigin = sourceInputOrigin.value;
        let currentValueWspOrigin = sourceInputWspOrigin.value;


        let nuevo = utmSource;
        let nuevoWsp = utmSource;


        sourceInput.value = nuevo;
        sourceInputWsp.value = nuevoWsp;

        sourceInputOrigin.value = nuevo;
        sourceInputWspOrigin.value = nuevoWsp;

        console.log(sourceInputOrigin.value);
        console.log(sourceInputWspOrigin.value);
    }
</script>


<script>
    // Obtener información del navegador y del sistema operativo
    const platform = navigator.platform;
    document.getElementById('sistema').value = platform;
    document.getElementById('sistema_wsp').value = platform;

    // Obtener la geolocalización del usuario (si se permite)
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            document.getElementById('latitud').value = position.coords.latitude;
            document.getElementById('longitud').value = position.coords.longitude;
            document.getElementById('latitud_wsp').value = position.coords.latitude;
            document.getElementById('longitud_Wsp').value = position.coords.longitude;
        });
    }

    // Obtener la resolución de la pantalla
    const screenWidth = window.screen.width;
    const screenHeight = window.screen.height;
    document.getElementById('anchodispositivo').value = screenWidth;
    document.getElementById('largodispositivo').value = screenHeight;
    document.getElementById('anchodispositivo_wsp').value = screenWidth;
    document.getElementById('largodispositivo_wsp').value = screenHeight;
</script>

<script>
    $('#procesarSolicitud2').on('click', function() {
        event.preventDefault();
        console.log('precionando btn envio');

        let formulario = $('#dataWhatsapp').serialize()
        
        fetch("{{ route('save.crm') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    _token: $('[name="_token"]').val(),
                    contact_name: $('[name="contact_name_wsp"]').val(),
                    contact_email: $('[name="contact_email_wsp"]').val(),
                    contact_phone: `51${$('[name="contact_phone_wsp"]').val()}`,
                    tradename: $('[name="name_wsp"]').val(),
                    sector: $('[name="sector_wsp"]').val(),
                    web_url: $('[name="web_url_wsp"]').val(),
                    source: $('[name="source_wsp"]').val(),
                    origin: $('[name="source_wsp"]').val(),
                    client_width: $('[name="client_width_wsp"]').val(),
                    client_height: $('[name="client_height_wsp"]').val(),
                    client_latitude: $('[name="client_latitude_wsp"]').val(),
                    client_longitude: $('[name="client_longitude_wsp"]').val(),
                    client_system: $('[name="client_system_wsp"]').val(),
                    message: $('[name="message_wsp"]').val(),
                    triggered_by: $('[name="triggered_by_wsp"]').val(),
                })
            })
            .then(async res => {
                const data = await res.json()
                if (!res.ok) throw new Error(data?.message ?? 'Ocurrio un error inesperado')
                return data
            })
            .then(response => {
                Swal.close();
                
                $('#dataWhatsapp')[0].reset();
                Swal.fire({
                    title: response.message,
                    icon: "success",
                }).then((result) => {
                    
                    if (result.isConfirmed) {
                        window.open("https://wa.link/txz27u", "_blank");
                        window.location.href = "https://mundoweb.pe/#whatsappListo";
                    }
                });
               
            }).catch((error) => {
                Swal.close();
                Swal.fire({
                    title: error,
                    icon: "error",
                });
            })

    })
</script>