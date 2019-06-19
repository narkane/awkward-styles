@if(count($artworks)>0)
<table class="list-items table table-striped">
<tbody id="postList">
<tr>
<th>Artwork</th>
<th>Artwork Name</th>
<th>Is Accepted?</th>
<th>Is Rejected?</th>
<th>Reason?</th>
<th>&nbsp;</th>	
</tr>	
@foreach($artworks as $artwork)
<tr id="row_{{ $artwork->id }}">
<td>
<img src="{{ $artwork->artwork }}" width="90">
</td>
<td>
{{ $artwork->artname }}
</td>
<td>
<input type="radio" name="artwork_status_{{ $artwork->id }}" id="artwork_status_accept_{{ $artwork->id }}" value="accepted" onclick="checkEvent('{{ $artwork->id }}','accept')" required>
</td>
<td>
<input type="radio" name="artwork_status_{{ $artwork->id }}" id="artwork_status_reject_{{ $artwork->id }}" value="rejected" onclick="checkEvent('{{ $artwork->id }}','reject')" required>
</td>
<td>
<textarea rows="4" cols="20" name="reason_{{ $artwork->id }}" id="reason_{{ $artwork->id }}" disabled></textarea>
</td>
<td id="{{ $artwork->loadmore }}">
<button class="btn btn-primary" id="button_{{ $artwork->id }}" onclick="saveStatus('{{ $artwork->id }}')" disabled>Save</button>
</td>
</tr>
@endforeach
</tbody>
</table>
@if(count($artworks)>=15)
<div class="show_more_main text-center" id="show_more_main">
        <span class="show_more btn btn-primary" title="Load more posts">Show more</span>
        <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
</div>
@endif
@else
No artworks available
@endif

