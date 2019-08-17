@foreach($assets as $asset)
    <div id="container-asset-{{$asset->id}}" class="file-box">
        <input type="hidden" name="assets[]" value="{{ $asset->id }}" />
        <div class="file">
            <span class="corner"></span>
            <a href="{{ $asset->url }}" target="_blank">
                <div class="image entity-image-container" style="background-image: url('{{ $asset->url }}')"></div>
            </a>
            <div class="file-name entity-image-name">
                <a href="{{ $asset->url }}" target="_blank">{{str_limit($asset->name, $limit = 55, $end = '...') }}</a>
            </div>
            <div class="entity-image-actions">
                <small>
                    <input id="checkbox-featured-{{$asset->id}}" value="1" class="chb-asset-featured-update" data-entity-id="{{$asset->id}}"
                           @if($asset->featured) checked @endif type="checkbox">
                    <label for="checkbox-featured-{{$asset->id}}">Featured</label>
                </small>
                <small class="pull-right">
                    <a class="btn-cursor btn-asset-delete" data-entity-id="{{$asset->id}}"><i class="fa fa-trash"></i> Delete</a>
                </small>
            </div>

        </div>
    </div>
@endforeach