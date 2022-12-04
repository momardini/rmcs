<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ __('voyager::generic.is_rtl') == 'true' ? 'rtl' : 'ltr' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ setting('admin.title') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <wireui:scripts />
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
{{--    @if (session()->has('dialog'))--}}
{{--    <x-dialog z-index="z-50" blur="md" align="center" title="dialog" />--}}
{{--<x-notifications z-index="z-50" />--}}
{{--    @endif--}}
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
            <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
                <div class="relative w-auto my-6 mx-auto max-w-3xl w-1/2">
                    <!--content-->
                    <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                        <!--header-->
                        <div class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
                            <h3 class="text-3xl font-semibold">
                                {{ __('portal.patient.unregister-device-title') }}
                            </h3>
                            <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
          <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
            ×
          </span>
                            </button>
                        </div>
                        <!--body-->
                        <div class="relative p-6 flex-auto">
                            <p class="my-4 text-slate-500 text-lg leading-relaxed">
                                {{ __('portal.patient.unregister-description') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

<script>
    function toggleModal(modalID){
        document.getElementById(modalID).classList.toggle("hidden");
        document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
        document.getElementById(modalID).classList.toggle("flex");
        document.getElementById(modalID + "-backdrop").classList.toggle("flex");
    }
    document.addEventListener("DOMContentLoaded", () => {
        console.log({{session()->get('dialog')}});
        @if (session()->has('dialog'))
        // window.$wireui.notify({
        //     title: 'Profile saved!',
        //     description: 'Your profile was successfull saved',
        //     icon: 'success'
        // });
        // window.$wireui.dialog({
        //     title: 'Login From UnRegistered Device !',
        //     description: "Send Mail to info@shamclinic.com",
        //     icon: 'error'
        // });
        toggleModal('modal-id');
        @endif
    });

</script>
</html>
