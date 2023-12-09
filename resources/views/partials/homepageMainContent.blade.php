<!-- Projects List -->
<div class="album py-5 bg-body-tertiary flex-grow-1">
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      @foreach ($projects as $project)
        @include('partials.projectCard')
      @endforeach
    </div>
  </div>
</div>