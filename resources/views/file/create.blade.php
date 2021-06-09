@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-xl-8 offset-xl-2 col-lg-12 col-sm-12">
    <div class="card card-style">
      <form action="/file/store" method="post" class="form-horizontal" enctype ="multipart/form-data">
            <input type="file" id="input-file-now" class="dropify" data-show-errors="true">
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('scripts/plugins/dropify/js/dropify.min.js') }}"></script>
    
    <script>
            $(document).ready(function() {
                // Basic
                $('.dropify').dropify();
        
                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove: 'Supprimer',
                        error: 'Désolé, le fichier trop volumineux'
                    }
                });
        
                // Used events
                var drEvent = $('#input-file-events').dropify();
        
                drEvent.on('dropify.beforeClear', function(event, element) {
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });
        
                drEvent.on('dropify.afterClear', function(event, element) {
                    alert('File deleted');
                });
        
                drEvent.on('dropify.errors', function(event, element) {
                    console.log('Has Errors');
                });
        
                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e) {
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
    </script>
  @endpush