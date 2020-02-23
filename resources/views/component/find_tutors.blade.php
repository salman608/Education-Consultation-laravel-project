@if(count($tutors))
<p class="uk-text-bold"><strong><em>Total Tutors : {{ $counter }}</em></strong></p>
<table class="uk-table uk-table-middle uk-table-divider">
    <thead>
        <tr>
            <th class="uk-table-shrink">ID</th>
            <th class="uk-table-shrink">Photo</th>
            <th class="uk-table-expand">Name</th>
            <th>Percentage</th>
            <th>E-mail</th>
            <th>Location</th>
            <th>Registration</th>
            <th class="uk-text-right">Action</th>
        </tr>
    </thead>
    <tbody>
	@foreach($tutors as $tutor)
    <tr>
        <td>{{ $tutor->relUser->id }}</td>
        <td>
        	<img class="uk-preserve-width uk-border-circle uk-box-shadow-small" src="{{ (!empty($tutor->photo)) ? asset('storage/upload/'.$tutor->photo.'') : asset('storage/upload/default-profile.png') }}" width="40" alt="">		            	
        </td>
        <td>
        	<p class="uk-text-emphasis uk-text-bold">{{ $tutor->relUser->name }}</p>
        	<p class="uk-text-meta uk-margin-remove-top">{{ $tutor->phone }}</p>
        </td>
        <td class="uk-text-truncate uk-text-emphasis">{{ App\TutorProfile::tutorProfilePercentage( $tutor ) }}%</td>
        <td class="uk-text-truncate uk-text-emphasis">{{ $tutor->relUser->email }}</td>
        <td class="uk-text-truncate uk-text-emphasis">{{ (!empty($tutor->relCity->name)) ? $tutor->relCity->name.' ,' : "" }} {{ (!empty($tutor->relLocation->name)) ? $tutor->relLocation->name : "" }}</td>
        <td class="uk-text-truncate uk-text-emphasis">{{ date('d-m-Y h:m:s a', strtotime($tutor->relUser->created_at)) }}</td>
        <td class="uk-text-right">
        	<a href="{{ route('tutors.show', $tutor->user_id) }}" class="uk-icon-link uk-margin-small-right" uk-icon="info"></a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@else
<p class="uk-text-center">
    <strong>No data found !</strong>
</p>
@endif