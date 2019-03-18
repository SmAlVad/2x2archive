@if(Session::has('flash_message'))
    <div class="alert alert-info flash">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <span>{{ Session::get('flash_message') }}</span>
    </div>
@endif
