<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register.step2.post') }}">
            @csrf

            <div class="mt-4">
                <div class="mt-4">
                    <x-jet-label for="region" value="{{ __('Region') }}" />
                    <input type="hidden" name="region" wire:model="region"/>
                    <select id="region" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" {{-- wire:model="region"  --}}></select>
                </div>

                <div class="mt-4">
                    <x-jet-label for="province" value="{{ __('Province') }}" />
                    <input type="hidden" name="province" wire:model="province" />
                    <select id="province" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" {{-- wire:model="province"  --}}:value="old('province')" required autofocus autocomplete="province"></select>
                </div>

                <div class="mt-4">
                    <x-jet-label for="city" value="{{ __('City') }}" />
                    <input type="hidden" name="city" wire:model="city"/>
                    <select id="city" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" {{-- wire:model="city"  --}} :value="old('city')" required autofocus autocomplete="city"></select>
                </div>

                <div class="mt-4">
                    <x-jet-label for="barangay" value="{{ __('Barangay') }}" />
                    <input type="hidden" name="barangay" wire:model="barangay"/>
                    <select id="barangay" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" {{-- wire:model="barangay"  --}} :value="old('barangay')" required autofocus autocomplete="barangay"></select>
                </div>
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
        <!-- script type="text/javascript" src="../../jquery.ph-locations.js"></script -->
        <script type="text/javascript" src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations.js"></script>
        <script type="text/javascript">
            
            var my_handlers = {

                fill_provinces:  function(){

                    var region_code = $(this).val();
                    $('#province').ph_locations('fetch_list', [{"region_code": region_code}]);
                    
                },

                fill_cities: function(){

                    var province_code = $(this).val();
                    $('#city').ph_locations( 'fetch_list', [{"province_code": province_code}]);
                },


                fill_barangays: function(){

                    var city_code = $(this).val();
                    $('#barangay').ph_locations('fetch_list', [{"city_code": city_code}]);
                }
            };

            $(function(){
                $('#region').on('change', my_handlers.fill_provinces);
                $('#province').on('change', my_handlers.fill_cities);
                $('#city').on('change', my_handlers.fill_barangays);

                $('#region').ph_locations({'location_type': 'regions'});
                $('#province').ph_locations({'location_type': 'provinces'});
                $('#city').ph_locations({'location_type': 'cities'});
                $('#barangay').ph_locations({'location_type': 'barangays'});

                $('#region').ph_locations('fetch_list');
            });

            $(function(){
                // whenever the region dropdown change, update the value of hidden field
                $('#region').on('change', function(){
                    // we are getting the text() here, not val()
                    var selected_caption = $("#region option:selected").text();
                    // the hidden field will contain the name of the region, not the code
                    $('input[name=region]').val(selected_caption);
                }).ph_locations('fetch_list');
            });

            $(function(){
                // whenever the region dropdown change, update the value of hidden field
                $('#province').on('change', function(){
                    // we are getting the text() here, not val()
                    var selected_caption = $("#province option:selected").text();
                    // the hidden field will contain the name of the region, not the code
                    $('input[name=province]').val(selected_caption);
                }).ph_locations('fetch_list');
            });

            $(function(){
                // whenever the region dropdown change, update the value of hidden field
                $('#city').on('change', function(){
                    // we are getting the text() here, not val()
                    var selected_caption = $("#city option:selected").text();
                    // the hidden field will contain the name of the region, not the code
                    $('input[name=city]').val(selected_caption);
                }).ph_locations('fetch_list');
            });

            $(function(){
                // whenever the region dropdown change, update the value of hidden field
                $('#barangay').on('change', function(){
                    // we are getting the text() here, not val()
                    var selected_caption = $("#barangay option:selected").text();
                    // the hidden field will contain the name of the region, not the code
                    $('input[name=barangay]').val(selected_caption);
                }).ph_locations('fetch_list');
            });
            
        </script>

    </x-jet-authentication-card>

</x-guest-layout>
