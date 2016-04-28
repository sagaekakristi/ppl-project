<p>{{$data['job_info']->judul}}</p>
<p>{{$data['job_info']->deskripsi}}</p>
<p>{{$data['job_info']->upah_max}}</p>
<p>{{$data['job_info']->upah_min}}</p>

@foreach ($data['category_array'] as $a_category)
<p>{{$a_category}}</p>
@endforeach