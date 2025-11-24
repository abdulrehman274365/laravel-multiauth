<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ $title }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    @foreach($breadcrumbs as $label => $url)
                        <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}">
                            @if($loop->last)
                                {{ $label }}
                            @else
                                <a href="{{ $url }}">{{ $label }}</a>
                            @endif
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->
