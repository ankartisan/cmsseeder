<div id="container-file-{{ $file->id }}"  class="file-box avatar-file-box image-container">
    <div class="file">
        <span class="corner"></span>
        <img src="{{ $file->url }}" />
        <div class="file-name">
            <div class="row">
                <div class="col-xs-12">
                    <a class="btn-delete-avatar pull-right" data-entity-id="{{$file->id}}" > Delete </a>
                </div>
            </div>
        </div>
    </div>
</div>