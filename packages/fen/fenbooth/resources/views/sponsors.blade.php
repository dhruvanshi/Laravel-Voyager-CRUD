@section('meta_title', $sponsor->title)
@section('meta_description', $sponsor->meta_description)
@section('page_title', $sponsor->title)
@section('page_subtitle', 'Sponsors // ' . $sponsor->created_at->format('jS M. Y'))

{!! $sponsor->body !!}
