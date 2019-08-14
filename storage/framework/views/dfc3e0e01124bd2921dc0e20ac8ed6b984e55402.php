<?php if(count($artworks)>0): ?>
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
<?php $__currentLoopData = $artworks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artwork): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr id="row_<?php echo e($artwork->id); ?>">
<td>
<img src="<?php echo e($artwork->artwork); ?>" width="90">
</td>
<td>
<?php echo e($artwork->artname); ?>

</td>
<td>
<input type="radio" name="artwork_status_<?php echo e($artwork->id); ?>" id="artwork_status_accept_<?php echo e($artwork->id); ?>" value="accepted" onclick="checkEvent('<?php echo e($artwork->id); ?>','accept')" required>
</td>
<td>
<input type="radio" name="artwork_status_<?php echo e($artwork->id); ?>" id="artwork_status_reject_<?php echo e($artwork->id); ?>" value="rejected" onclick="checkEvent('<?php echo e($artwork->id); ?>','reject')" required>
</td>
<td>
<textarea rows="4" cols="20" name="reason_<?php echo e($artwork->id); ?>" id="reason_<?php echo e($artwork->id); ?>" disabled></textarea>
</td>
<td id="<?php echo e($artwork->loadmore); ?>">
<button class="btn btn-primary" id="button_<?php echo e($artwork->id); ?>" onclick="saveStatus('<?php echo e($artwork->id); ?>')" disabled>Save</button>
</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>
<?php if(count($artworks)>=15): ?>
<div class="show_more_main text-center" id="show_more_main">
        <span class="show_more btn btn-primary" title="Load more posts">Show more</span>
        <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
</div>
<?php endif; ?>
<?php else: ?>
No artworks available
<?php endif; ?>

