<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.6/Sortable.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <script>
        toastr.options = {
    closeButton: true,
    progressBar: true,
    newestOnTop: true,
    positionClass: "toast-top-right",
    preventDuplicates: true,
    timeOut: 3000
};
</script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('vendor/formbuilder/js/builder/helper.js') }}"></script>

    <script src="{{ asset('vendor/formbuilder/js/builder/validation.js') }}"></script>

    <script src="{{ asset('vendor/formbuilder/js/builder/builder.js') }}"></script>

    <script src="{{ asset('vendor/formbuilder/js/builder/screens.js') }}"></script>

    <script src="{{ asset('vendor/formbuilder/js/builder/sections.js') }}"></script>

    <script src="{{ asset('vendor/formbuilder/js/builder/fields.js') }}"></script>

    <script src="{{ asset('vendor/formbuilder/js/builder/sortable.js') }}"></script>

</x-app-layout>