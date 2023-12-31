<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">@yield("title")</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}">
                    @section("breadcrumbs")
                        <li class="breadcrumb-item"><a
                                href="{{ route("dashboard.dashboard") }}">{{ __("Dashboard") }}</a></li>
                    @show
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
