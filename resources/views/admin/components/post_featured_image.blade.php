<div id="container-file-{{ $file->id }}"  class="file-box image-container">
    <div class="file">
        <span class="corner"></span>
        <div class="image" style="background-image:url('{{ $file->url }}')">

        </div>
        <div class="file-name">
            <div class="row">
                <div class="col-xs-12">
                    <a class="btn-delete-post-image pull-right" data-entity-id="{{$file->id}}" > Delete </a>
                </div>
            </div>
        </div>
    </div>
</div>