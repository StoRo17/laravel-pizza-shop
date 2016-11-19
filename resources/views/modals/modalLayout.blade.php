<div class="modal fade" hidden="true" id="{{ $modalName }}" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>{{ $modalTitle }}</h4>
            </div>
            <div class="panel panel-filled">
                <div class="panel-body">
                    <form action="{{ $formAction }}" id="{{ $formID }}" method="post" name="{{ $formName }}" {{ $attr ?? '' }}>
                        @yield('formContent')
                        <div>
                            <button class="btn btn-login center-block">{{ $modalButtonTitle }}</button>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>