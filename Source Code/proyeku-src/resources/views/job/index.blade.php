<table>
	<thead>
        <tr>
            <td>Judul</td>
            <td>Deskripsi</td>
            <td>Upah Max</td>
            <td>Upah Min</td>
        </tr>
    </thead>
    <tbody>
    @foreach($jobs as $a_job => $value)
        <tr>
            <td>{{ $value->judul }}</td>
            <td>{{ $value->deskripsi }}</td>
            <td>{{ $value->upah_max }}</td>
            <td>{{ $value->upah_min }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the job (uses the destroy method DESTROY /job/{id} -->
                {{ Form::open(array('url' => 'job/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this Job', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                <!-- show the job (uses the show method found at GET /job/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('job/' . $value->id) }}">Show this Job</a>

                <!-- edit this job (uses the edit method found at GET /job/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('job/' . $value->id . '/edit') }}">Edit this Job</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>